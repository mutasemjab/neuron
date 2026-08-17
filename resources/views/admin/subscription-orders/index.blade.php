@extends('admin.layouts.app')
@section('title', __('messages.subscription_orders'))

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">{{ __('messages.subscription_orders') }}</h1>
        <p class="page-sub">طلبات الاشتراك ومدفوعاتها عبر بوابة بنك الاتحاد</p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-3">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="d-flex gap-2 mb-3 flex-wrap">
    <a href="{{ route('admin.subscription-orders.index') }}" class="badge {{ !request('status') ? 'bg-dark' : 'bg-light text-dark border' }}" style="padding:8px 14px">الكل</a>
    <a href="{{ route('admin.subscription-orders.index', ['status' => 'pending']) }}" class="badge {{ request('status')==='pending' ? 'bg-dark' : 'bg-light text-dark border' }}" style="padding:8px 14px">قيد الانتظار ({{ $counts['pending'] }})</a>
    <a href="{{ route('admin.subscription-orders.index', ['status' => 'completed']) }}" class="badge {{ request('status')==='completed' ? 'bg-dark' : 'bg-light text-dark border' }}" style="padding:8px 14px">مكتمل ({{ $counts['completed'] }})</a>
    <a href="{{ route('admin.subscription-orders.index', ['status' => 'declined']) }}" class="badge {{ request('status')==='declined' ? 'bg-dark' : 'bg-light text-dark border' }}" style="padding:8px 14px">مرفوض ({{ $counts['declined'] }})</a>
    <a href="{{ route('admin.subscription-orders.index', ['status' => 'failed']) }}" class="badge {{ request('status')==='failed' ? 'bg-dark' : 'bg-light text-dark border' }}" style="padding:8px 14px">فشل ({{ $counts['failed'] }})</a>
</div>

<div class="panel-card">
    <div class="panel-card-body p-0">
        @if($subscriptionOrders->isEmpty())
            <div class="text-center py-5 text-muted">
                <i class="bi bi-credit-card-2-front" style="font-size:2.5rem;opacity:.3"></i>
                <p class="mt-2">لا توجد طلبات اشتراك بعد</p>
            </div>
        @else
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>الهاتف</th>
                        <th>الباقة</th>
                        <th>المبلغ</th>
                        <th style="width:120px">الحالة</th>
                        <th>التاريخ</th>
                        <th style="width:130px">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subscriptionOrders as $order)
                    <tr>
                        <td style="font-weight:500">{{ $order->name }}</td>
                        <td dir="ltr">{{ $order->phone }}</td>
                        <td>{{ $order->plan->title_ar ?? '—' }}</td>
                        <td dir="ltr">{{ number_format((float) $order->amount, 2) }} {{ $order->currency }}</td>
                        <td>
                            <span class="badge bg-{{ ['pending'=>'warning','completed'=>'success','declined'=>'danger','failed'=>'secondary'][$order->status] ?? 'secondary' }}">{{ $order->status }}</span>
                        </td>
                        <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.subscription-orders.show', $order->id) }}" class="btn-outline-sm"><i class="bi bi-eye"></i></a>
                                <form action="{{ route('admin.subscription-orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
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
        <div class="p-3">{{ $subscriptionOrders->links() }}</div>
        @endif
    </div>
</div>

@endsection
