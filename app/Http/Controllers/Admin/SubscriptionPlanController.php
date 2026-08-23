<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;

class SubscriptionPlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:subscription-plan-table')->only(['index']);
        $this->middleware('permission:subscription-plan-add')->only(['create', 'store']);
        $this->middleware('permission:subscription-plan-edit')->only(['edit', 'update', 'toggleActive']);
        $this->middleware('permission:subscription-plan-delete')->only(['destroy']);
    }

    public function index()
    {
        $subscriptionPlans = SubscriptionPlan::orderBy('order_index')->get();
        return view('admin.subscription-plans.index', compact('subscriptionPlans'));
    }

    public function create()
    {
        return view('admin.subscription-plans.create');
    }

    private function rules(): array
    {
        return [
            'title_ar'         => 'required|string|max:150',
            'title_en'         => 'required|string|max:150',
            'subtitle_ar'      => 'nullable|string|max:255',
            'subtitle_en'      => 'nullable|string|max:255',
            'price'            => 'required|numeric|min:0',
            'price_suffix_ar'  => 'nullable|string|max:100',
            'price_suffix_en'  => 'nullable|string|max:100',
            'features_ar'      => 'nullable|string',
            'features_en'      => 'nullable|string',
            'badge_ar'         => 'nullable|string|max:100',
            'badge_en'         => 'nullable|string|max:100',
            'button_text_ar'   => 'nullable|string|max:100',
            'button_text_en'   => 'nullable|string|max:100',
            'order_index'      => 'nullable|integer',
        ];
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active']   = $request->boolean('is_active', true);
        $data['order_index'] = $data['order_index'] ?? 0;

        SubscriptionPlan::create($data);

        return redirect()->route('admin.subscription-plans.index')->with('success', 'تمت إضافة باقة الاشتراك بنجاح.');
    }

    public function edit(SubscriptionPlan $subscription_plan)
    {
        return view('admin.subscription-plans.edit', ['subscriptionPlan' => $subscription_plan]);
    }

    public function update(Request $request, SubscriptionPlan $subscription_plan)
    {
        $data = $request->validate($this->rules());

        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_active']   = $request->boolean('is_active');
        $data['order_index'] = $data['order_index'] ?? 0;

        $subscription_plan->update($data);

        return redirect()->route('admin.subscription-plans.index')->with('success', 'تم تحديث باقة الاشتراك بنجاح.');
    }

    public function destroy(SubscriptionPlan $subscription_plan)
    {
        $subscription_plan->delete();
        return back()->with('success', 'تم حذف باقة الاشتراك.');
    }

    public function toggleActive(SubscriptionPlan $subscription_plan)
    {
        $subscription_plan->update(['is_active' => ! $subscription_plan->is_active]);
        return back()->with('success', 'تم تحديث الحالة.');
    }
}
