@extends('admin.layouts.app')
@section('title', __('messages.subscription_plans'))

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">{{ __('messages.subscription_plans') }}</h1>
        <p class="page-sub">باقات الاشتراك المعروضة في الموقع</p>
    </div>
    <a href="{{ route('admin.subscription-plans.create') }}" class="btn-primary-sm">
        <i class="bi bi-plus-lg"></i> إضافة باقة
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-3">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="panel-card">
    <div class="panel-card-body p-0">
        @if($subscriptionPlans->isEmpty())
            <div class="text-center py-5 text-muted">
                <i class="bi bi-credit-card-2-front" style="font-size:2.5rem;opacity:.3"></i>
                <p class="mt-2">لا توجد باقات اشتراك بعد</p>
            </div>
        @else
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width:60px">#</th>
                        <th>العنوان (عربي)</th>
                        <th>Title (English)</th>
                        <th>السعر</th>
                        <th style="width:90px">مميزة</th>
                        <th style="width:100px">الحالة</th>
                        <th style="width:130px">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subscriptionPlans as $plan)
                    <tr>
                        <td>{{ $plan->order_index }}</td>
                        <td>{{ $plan->title_ar }}</td>
                        <td dir="ltr">{{ $plan->title_en }}</td>
                        <td>{{ number_format((float) $plan->price, 2) }} {{ $plan->price_suffix_ar }}</td>
                        <td>
                            @if($plan->is_featured)
                                <span class="badge bg-warning text-dark">مميزة</span>
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.subscription-plans.toggle', $plan->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="badge border-0 {{ $plan->is_active ? 'bg-success' : 'bg-secondary' }}" style="cursor:pointer;font-size:12px;padding:5px 10px">
                                    {{ $plan->is_active ? 'نشط' : 'معطل' }}
                                </button>
                            </form>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.subscription-plans.edit', $plan->id) }}" class="btn-outline-sm"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.subscription-plans.destroy', $plan->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-danger-sm"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>

@endsection
