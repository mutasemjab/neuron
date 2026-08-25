<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ConsultationCheckoutController extends Controller
{
    public function store(Request $request, Consultation $consultation)
    {
        $isAr = app()->getLocale() === 'ar';

        $amount = (float) sett_raw('booking_page.price_amount');

        if ($amount <= 0) {
            return response()->json([
                'message' => $isAr ? 'سعر الحجز غير مُعرّف حالياً.' : 'The booking price is not configured yet.',
            ], 422);
        }

        $consultation->update([
            'amount'         => $amount,
            'currency'       => 'JOD',
            'payment_status' => 'pending',
        ]);

        $env = config('services.bank_etihad.env');
        $url = config("services.bank_etihad.capture_context_url.{$env}");

        $response = Http::withHeaders([
            'Content-Type'  => 'application/json',
            'Accept'        => 'application/json',
            'Authorization' => config('services.bank_etihad.auth_token'),
        ])->post($url, [
            'targetOrigins' => [$request->getSchemeAndHttpHost()],
            'totalAmount'   => number_format($amount, 2, '.', ''),
            'currency'      => $consultation->currency,
            'withDecode'    => true,
        ]);

        if (! $response->successful()) {
            Log::error('Bank al Etihad capture-context failed (consultation)', [
                'consultation_id' => $consultation->id,
                'status'          => $response->status(),
                'body'            => $response->body(),
            ]);

            $consultation->update(['payment_status' => 'failed', 'gateway_response' => $response->body()]);

            return response()->json([
                'message' => $isAr ? 'تعذّر بدء عملية الدفع، حاول مرة أخرى.' : 'Could not start the payment, please try again.',
            ], 422);
        }

        $data = $response->json();

        $consultation->update(['checkout_token' => $data['token'] ?? null]);

        return response()->json([
            'order_id'               => $consultation->id,
            'token'                  => $data['token'] ?? null,
            'clientLibrary'          => $data['clientLibrary'] ?? null,
            'clientLibraryIntegrity' => $data['clientLibraryIntegrity'] ?? null,
        ]);
    }

    public function result(Request $request, Consultation $consultation)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:COMPLETED,DECLINED,FAILED',
        ]);

        $consultation->update([
            'payment_status'   => strtoupper($validated['status']) === 'COMPLETED' ? 'completed' : 'declined',
            'gateway_response' => json_encode($validated),
        ]);

        return response()->json(['ok' => true]);
    }
}
