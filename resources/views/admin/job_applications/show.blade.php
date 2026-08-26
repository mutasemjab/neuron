@extends('admin.layouts.app')
@section('title', 'تفاصيل طلب التوظيف')

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div><h1 class="page-title">طلب توظيف #{{ $jobApplication->id }}</h1></div>
    <a href="{{ route('admin.job-applications.index') }}" class="btn-outline-sm"><i class="bi bi-arrow-left"></i> رجوع</a>
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
            <div class="panel-card-header"><h2 class="panel-card-title">بيانات المتقدم</h2></div>
            <div class="panel-card-body">
                <div class="row g-3">
                    <div class="col-md-6"><label class="form-label">الاسم</label><p>{{ $jobApplication->name }}</p></div>
                    <div class="col-md-6"><label class="form-label">الهاتف</label><p dir="ltr">{{ $jobApplication->phone }}</p></div>
                    <div class="col-md-6"><label class="form-label">البريد الإلكتروني</label><p dir="ltr">{{ $jobApplication->email }}</p></div>
                    <div class="col-md-6"><label class="form-label">الوظيفة المتقدم لها</label><p>{{ $jobApplication->careerJob->title_ar ?? '—' }}</p></div>
                    <div class="col-md-6"><label class="form-label">الفرع</label><p>{{ $jobApplication->branch->name_ar ?? '—' }}</p></div>
                    <div class="col-12"><label class="form-label">الرسالة التعريفية</label><p>{{ $jobApplication->message ?: '—' }}</p></div>
                    @if($jobApplication->cv)
                    <div class="col-12">
                        <label class="form-label">السيرة الذاتية</label>
                        <p><a href="{{ $jobApplication->cv_url }}" target="_blank" class="btn-outline-sm"><i class="bi bi-file-earmark-text"></i> عرض / تحميل السيرة الذاتية</a></p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-4">
        <div class="panel-card">
            <div class="panel-card-header"><h2 class="panel-card-title">حالة الطلب</h2></div>
            <div class="panel-card-body">
                <form action="{{ route('admin.job-applications.status', $jobApplication) }}" method="POST">
                    @csrf
                    <select name="status" class="form-select mb-3">
                        <option value="new" @selected($jobApplication->status === 'new')>جديد</option>
                        <option value="reviewed" @selected($jobApplication->status === 'reviewed')>تمت المراجعة</option>
                        <option value="contacted" @selected($jobApplication->status === 'contacted')>تم التواصل</option>
                        <option value="rejected" @selected($jobApplication->status === 'rejected')>مرفوض</option>
                    </select>
                    <button type="submit" class="btn-primary-sm w-100 justify-content-center"><i class="bi bi-save"></i> تحديث الحالة</button>
                </form>
                <p class="text-muted mt-3" style="font-size:.85rem">تاريخ الطلب: {{ $jobApplication->created_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>
    </div>
</div>

@endsection
