@extends('admin.layouts.app')
@section('title', 'العطل والأيام المغلقة')

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">العطل والأيام المغلقة</h1>
        <p class="page-sub">تواريخ لا يمكن للمرضى اختيارها بفورم حجز المواعيد داخل الأردن (بالإضافة للجمعة والتواريخ السابقة، المغلقة تلقائياً)</p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-3">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@can('closed-date-add')
<div class="panel-card mb-3">
    <div class="panel-card-header"><h2 class="panel-card-title">إضافة يوم مغلق</h2></div>
    <div class="panel-card-body">
        <form action="{{ route('admin.closed-dates.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-12 col-md-3">
                    <label class="form-label">التاريخ <span class="text-danger">*</span></label>
                    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}" required>
                    @error('date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-12 col-md-4">
                    <label class="form-label">السبب (عربي)</label>
                    <input type="text" name="label_ar" class="form-control" value="{{ old('label_ar') }}" placeholder="مثال: عيد الفطر">
                </div>
                <div class="col-12 col-md-4">
                    <label class="form-label">Reason (English)</label>
                    <input type="text" name="label_en" dir="ltr" class="form-control" value="{{ old('label_en') }}" placeholder="e.g. Eid al-Fitr">
                </div>
                <div class="col-12 col-md-1 d-flex align-items-end">
                    <button type="submit" class="btn-primary-sm w-100 justify-content-center"><i class="bi bi-plus-lg"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>
@endcan

<div class="panel-card">
    <div class="panel-card-body p-0">
        @if($closedDates->isEmpty())
            <div class="text-center py-5 text-muted">
                <i class="bi bi-calendar-x" style="font-size:2.5rem;opacity:.3"></i>
                <p class="mt-2">لا توجد أيام مغلقة مضافة بعد</p>
            </div>
        @else
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>التاريخ</th>
                        <th>السبب (عربي)</th>
                        <th>Reason (English)</th>
                        <th style="width:80px">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($closedDates as $closedDate)
                    <tr>
                        <td style="font-weight:500">{{ $closedDate->date->format('Y-m-d') }}</td>
                        <td>{{ $closedDate->label_ar ?: '—' }}</td>
                        <td dir="ltr">{{ $closedDate->label_en ?: '—' }}</td>
                        <td>
                            @can('closed-date-delete')
                            <form action="{{ route('admin.closed-dates.destroy', $closedDate) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-danger-sm"><i class="bi bi-trash"></i></button>
                            </form>
                            @endcan
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
