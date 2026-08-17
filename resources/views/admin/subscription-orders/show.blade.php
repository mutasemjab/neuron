@extends('admin.layouts.app')
@section('title', 'تفاصيل طلب الاشتراك')

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div><h1 class="page-title">طلب اشتراك #{{ $subscriptionOrder->id }}</h1></div>
    <a href="{{ route('admin.subscription-orders.index') }}" class="btn-outline-sm"><i class="bi bi-arrow-left"></i> رجوع</a>
</div>

<div class="row g-3">
    <div class="col-12 col-lg-8">
        <div class="panel-card">
            <div class="panel-card-header"><h2 class="panel-card-title">بيانات المشترك</h2></div>
            <div class="panel-card-body">
                <div class="row g-3">
                    <div class="col-md-6"><label class="form-label">الاسم</label><p>{{ $subscriptionOrder->name }}</p></div>
                    <div class="col-md-6"><label class="form-label">الهاتف</label><p dir="ltr">{{ $subscriptionOrder->phone }}</p></div>
                    <div class="col-md-6"><label class="form-label">البريد الإلكتروني</label><p dir="ltr">{{ $subscriptionOrder->email ?: '—' }}</p></div>
                    <div class="col-md-6"><label class="form-label">الباقة</label><p>{{ $subscriptionOrder->plan->title_ar ?? '—' }}</p></div>
                    <div class="col-md-6"><label class="form-label">المبلغ</label><p dir="ltr">{{ number_format((float) $subscriptionOrder->amount, 2) }} {{ $subscriptionOrder->currency }}</p></div>
                    <div class="col-md-6"><label class="form-label">تاريخ الطلب</label><p>{{ $subscriptionOrder->created_at->format('Y-m-d H:i') }}</p></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-4">
        <div class="panel-card">
            <div class="panel-card-header"><h2 class="panel-card-title">حالة الدفع</h2></div>
            <div class="panel-card-body">
                <span class="badge bg-{{ ['pending'=>'warning','completed'=>'success','declined'=>'danger','failed'=>'secondary'][$subscriptionOrder->status] ?? 'secondary' }}" style="font-size:14px;padding:8px 14px">{{ $subscriptionOrder->status }}</span>
                @if($subscriptionOrder->gateway_response)
                <p class="text-muted mt-3 mb-1" style="font-size:.82rem">استجابة البوابة:</p>
                <pre style="font-size:.78rem;background:#f4f8f7;padding:10px;border-radius:8px;white-space:pre-wrap;word-break:break-all">{{ $subscriptionOrder->gateway_response }}</pre>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
