@extends('admin.layouts.app')
@section('title', 'تفاصيل طلب الاستشارة')

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div><h1 class="page-title">طلب استشارة #{{ $consultation->id }}</h1></div>
    <a href="{{ route('admin.consultations.index') }}" class="btn-outline-sm"><i class="bi bi-arrow-left"></i> رجوع</a>
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
                    <div class="col-md-6"><label class="form-label">الاسم</label><p>{{ $consultation->name }}</p></div>
                    <div class="col-md-6"><label class="form-label">البريد الإلكتروني</label><p dir="ltr">{{ $consultation->email }}</p></div>
                    <div class="col-md-6"><label class="form-label">الهاتف / واتساب</label><p dir="ltr">{{ $consultation->phone_country_code }} {{ $consultation->phone }}</p></div>
                    <div class="col-md-6"><label class="form-label">بلد الإقامة</label><p>{{ $consultation->country_of_residence }}</p></div>
                    <div class="col-md-6"><label class="form-label">تاريخ الميلاد</label><p>{{ $consultation->date_of_birth->format('Y-m-d') }}</p></div>
                    <div class="col-md-6"><label class="form-label">الموافقة على سياسة الخصوصية</label><p>{{ $consultation->privacy_consent ? 'نعم' : 'لا' }}</p></div>
                    <div class="col-md-6"><label class="form-label">الأيام المناسبة</label><p>{{ $consultation->preferred_days_label ?: '—' }}</p></div>
                    <div class="col-md-6"><label class="form-label">الفترة المناسبة</label><p>{{ $consultation->preferred_periods_label ?: '—' }}</p></div>
                    <div class="col-12"><label class="form-label">وصف الحالة / الاستفسار الطبي</label><p style="white-space:pre-line">{{ $consultation->condition_description }}</p></div>
                    @if(!empty($consultation->attachment_urls))
                    <div class="col-12">
                        <label class="form-label">التقارير والصور الطبية المرفقة</label>
                        <div class="d-flex gap-2 flex-wrap">
                            @foreach($consultation->attachment_urls as $i => $url)
                            <a href="{{ $url }}" target="_blank" class="btn-outline-sm"><i class="bi bi-file-earmark-text"></i> ملف {{ $i + 1 }}</a>
                            @endforeach
                        </div>
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
                <form action="{{ route('admin.consultations.status', $consultation) }}" method="POST">
                    @csrf
                    <select name="status" class="form-select mb-3">
                        <option value="new" @selected($consultation->status === 'new')>جديد</option>
                        <option value="contacted" @selected($consultation->status === 'contacted')>تم التواصل</option>
                        <option value="scheduled" @selected($consultation->status === 'scheduled')>تم الجدولة</option>
                        <option value="closed" @selected($consultation->status === 'closed')>مغلق</option>
                    </select>
                    <button type="submit" class="btn-primary-sm w-100 justify-content-center"><i class="bi bi-save"></i> تحديث الحالة</button>
                </form>
                <p class="text-muted mt-3" style="font-size:.85rem">تاريخ الطلب: {{ $consultation->created_at->format('Y-m-d H:i') }}</p>

                <form action="{{ route('admin.consultations.destroy', $consultation) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')" class="mt-3">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn-danger-sm w-100 justify-content-center"><i class="bi bi-trash"></i> حذف الطلب</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
