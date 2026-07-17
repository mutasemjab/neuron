@extends('admin.layouts.app')
@section('title', __('messages.appointments'))

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">{{ __('messages.appointments') }}</h1>
        <p class="page-sub">طلبات حجز المواعيد الواردة من الموقع</p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-3">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="d-flex gap-2 mb-3 flex-wrap">
    <a href="{{ route('admin.appointments.index') }}" class="badge {{ !request('status') ? 'bg-dark' : 'bg-light text-dark border' }}" style="padding:8px 14px">الكل</a>
    <a href="{{ route('admin.appointments.index', ['status' => 'new']) }}" class="badge {{ request('status')==='new' ? 'bg-dark' : 'bg-light text-dark border' }}" style="padding:8px 14px">جديد ({{ $counts['new'] }})</a>
    <a href="{{ route('admin.appointments.index', ['status' => 'contacted']) }}" class="badge {{ request('status')==='contacted' ? 'bg-dark' : 'bg-light text-dark border' }}" style="padding:8px 14px">تم التواصل ({{ $counts['contacted'] }})</a>
    <a href="{{ route('admin.appointments.index', ['status' => 'confirmed']) }}" class="badge {{ request('status')==='confirmed' ? 'bg-dark' : 'bg-light text-dark border' }}" style="padding:8px 14px">مؤكد ({{ $counts['confirmed'] }})</a>
    <a href="{{ route('admin.appointments.index', ['status' => 'cancelled']) }}" class="badge {{ request('status')==='cancelled' ? 'bg-dark' : 'bg-light text-dark border' }}" style="padding:8px 14px">ملغي ({{ $counts['cancelled'] }})</a>
</div>

<div class="panel-card">
    <div class="panel-card-body p-0">
        @if($appointments->isEmpty())
            <div class="text-center py-5 text-muted">
                <i class="bi bi-calendar-check" style="font-size:2.5rem;opacity:.3"></i>
                <p class="mt-2">لا توجد طلبات حجز بعد</p>
            </div>
        @else
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>الهاتف</th>
                        <th>الفرع</th>
                        <th>الطبيب</th>
                        <th>التاريخ المفضّل</th>
                        <th style="width:120px">الحالة</th>
                        <th style="width:130px">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $appointment)
                    <tr>
                        <td style="font-weight:500">{{ $appointment->name }}</td>
                        <td dir="ltr">{{ $appointment->phone }}</td>
                        <td>{{ $appointment->branch->name_ar ?? '—' }}</td>
                        <td>{{ $appointment->doctor->name_ar ?? '—' }}</td>
                        <td>{{ $appointment->preferred_date->format('Y-m-d') }} — {{ $appointment->preferred_time_slot }}</td>
                        <td>
                            <span class="badge bg-{{ ['new'=>'primary','contacted'=>'warning','confirmed'=>'success','cancelled'=>'secondary'][$appointment->status] ?? 'secondary' }}">{{ $appointment->status }}</span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.appointments.show', $appointment->id) }}" class="btn-outline-sm"><i class="bi bi-eye"></i></a>
                                <form action="{{ route('admin.appointments.destroy', $appointment->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
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
        <div class="p-3">{{ $appointments->links() }}</div>
        @endif
    </div>
</div>

@endsection
