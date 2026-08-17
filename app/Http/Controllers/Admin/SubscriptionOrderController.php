<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionOrder;
use Illuminate\Http\Request;

class SubscriptionOrderController extends Controller
{
    public function index(Request $request)
    {
        $subscriptionOrders = SubscriptionOrder::with('plan')
            ->when($request->status, fn ($q, $s) => $q->where('status', $s))
            ->when($request->search, fn ($q, $s) => $q
                ->where('name', 'like', "%{$s}%")
                ->orWhere('phone', 'like', "%{$s}%")
            )
            ->latest()
            ->paginate(15)
            ->withQueryString();

        $counts = [
            'pending'   => SubscriptionOrder::where('status', 'pending')->count(),
            'completed' => SubscriptionOrder::where('status', 'completed')->count(),
            'declined'  => SubscriptionOrder::where('status', 'declined')->count(),
            'failed'    => SubscriptionOrder::where('status', 'failed')->count(),
        ];

        return view('admin.subscription-orders.index', compact('subscriptionOrders', 'counts'));
    }

    public function show(SubscriptionOrder $subscriptionOrder)
    {
        $subscriptionOrder->load('plan');
        return view('admin.subscription-orders.show', compact('subscriptionOrder'));
    }

    public function destroy(SubscriptionOrder $subscriptionOrder)
    {
        $subscriptionOrder->delete();
        return back()->with('success', 'تم حذف طلب الاشتراك.');
    }
}
