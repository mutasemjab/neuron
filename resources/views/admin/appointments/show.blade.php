@extends('admin.layouts.app')
@section('title', 'تفاصيل طلب الحجز')

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div><h1 class="page-title">طلب حجز #{{ $appointment->id }}</h1></div>
    <a href="{{ route('admin.appointments.index') }}" class="btn-outline-sm"><i class="bi bi-arrow-left"></i> رجوع</a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-3">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row g-3">
    <div class="col-12 col-lg-8">
        <div class="panel-card">
            <div class="panel-card-header"><h2 class="panel-card-title">بيانات المريض</h2></div>
            <div class="panel-card-body">
                <div class="row g-3">
                    <div class="col-md-6"><label class="form-label">الاسم</label><p>{{ $appointment->name }}</p></div>
                    <div class="col-md-6"><label class="form-label">الهاتف</label><p dir="ltr">{{ $appointment->phone }}</p></div>
                    <div class="col-md-6"><label class="form-label">الفرع</label><p>{{ $appointment->branch->name_ar ?? '—' }}</p></div>
                    <div class="col-md-6"><label class="form-label">الطبيب / التخصص</label><p>{{ $appointment->doctor->name_ar ?? '—' }}</p></div>
                    <div class="col-md-6"><label class="form-label">التاريخ المفضّل</label><p>{{ $appointment->preferred_date->format('Y-m-d') }}</p></div>
                    <div class="col-md-6"><label class="form-label">الوقت المفضّل</label><p>{{ $appointment->preferred_time_slot }}</p></div>
                    <div class="col-12"><label class="form-label">ملاحظات</label><p>{{ $appointment->notes ?: '—' }}</p></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-4">
        <div class="panel-card">
            <div class="panel-card-header"><h2 class="panel-card-title">حالة الطلب</h2></div>
            <div class="panel-card-body">
                <form action="{{ route('admin.appointments.status', $appointment->id) }}" method="POST">
                    @csrf
                    <select name="status" class="form-select mb-3">
                        <option value="new" @selected($appointment->status === 'new')>جديد</option>
                        <option value="contacted" @selected($appointment->status === 'contacted')>تم التواصل</option>
                        <option value="confirmed" @selected($appointment->status === 'confirmed')>مؤكد</option>
                        <option value="cancelled" @selected($appointment->status === 'cancelled')>ملغي</option>
                    </select>
                    <button type="submit" class="btn-primary-sm w-100 justify-content-center"><i class="bi bi-save"></i> تحديث الحالة</button>
                </form>
                <p class="text-muted mt-3" style="font-size:.85rem">تاريخ الطلب: {{ $appointment->created_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>
    </div>
</div>

@endsection
