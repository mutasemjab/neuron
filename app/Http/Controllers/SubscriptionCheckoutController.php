<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionOrder;
use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SubscriptionCheckoutController extends Controller
{
    public function store(Request $request, SubscriptionPlan $subscriptionPlan)
    {
        $isAr = app()->getLocale() === 'ar';

        $validated = $request->validate([
            'name'  => 'required|string|max:150',
            'phone' => 'required|string|max:30',
            'email' => 'nullable|email|max:150',
        ]);

        $order = SubscriptionOrder::create([
            'subscription_plan_id' => $subscriptionPlan->id,
            'name'     => $validated['name'],
            'phone'    => $validated['phone'],
            'email'    => $validated['email'] ?? null,
            'amount'   => $subscriptionPlan->price,
            'currency' => 'JOD',
            'status'   => 'pending',
        ]);

        $env = config('services.bank_etihad.env');
        $url = config("services.bank_etihad.capture_context_url.{$env}");

        $response = Http::withHeaders([
            'Content-Type'  => 'application/json',
            'Accept'        => 'application/json',
            'Authorization' => config('services.bank_etihad.auth_token'),
        ])->post($url, [
            'targetOrigins' => [$request->getSchemeAndHttpHost()],
            'totalAmount'   => number_format((float) $subscriptionPlan->price, 2, '.', ''),
            'currency'      => $order->currency,
            'withDecode'    => true,
        ]);

        if (! $response->successful()) {
            Log::error('Bank al Etihad capture-context failed', [
                'order_id' => $order->id,
                'status'   => $response->status(),
                'body'     => $response->body(),
            ]);

            $order->update(['status' => 'failed', 'gateway_response' => $response->body()]);

            return response()->json([
                'message' => $isAr ? 'تعذّر بدء عملية الدفع، حاول مرة أخرى.' : 'Could not start the payment, please try again.',
            ], 422);
        }

        $data = $response->json();

        $order->update(['checkout_token' => $data['token'] ?? null]);

        return response()->json([
            'order_id'               => $order->id,
            'token'                  => $data['token'] ?? null,
            'clientLibrary'          => $data['clientLibrary'] ?? null,
            'clientLibraryIntegrity' => $data['clientLibraryIntegrity'] ?? null,
        ]);
    }

    public function result(Request $request, SubscriptionOrder $subscriptionOrder)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:COMPLETED,DECLINED,FAILED',
        ]);

        $subscriptionOrder->update([
            'status'            => strtoupper($validated['status']) === 'COMPLETED' ? 'completed' : 'declined',
            'gateway_response'  => json_encode($validated),
        ]);

        return response()->json(['ok' => true]);
    }
}
