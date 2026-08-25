@extends('admin.layouts.app')
@section('title', 'طلبات الاستشارة الأونلاين')

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">طلبات الاستشارة الأونلاين</h1>
        <p class="page-sub">طلبات المرضى من خارج الأردن</p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-3">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="d-flex gap-2 mb-3 flex-wrap">
    <a href="{{ route('admin.consultations.index') }}" class="badge {{ !request('status') ? 'bg-dark' : 'bg-light text-dark border' }}" style="padding:8px 14px">الكل</a>
    <a href="{{ route('admin.consultations.index', ['status' => 'new']) }}" class="badge {{ request('status')==='new' ? 'bg-dark' : 'bg-light text-dark border' }}" style="padding:8px 14px">جديد ({{ $counts['new'] }})</a>
    <a href="{{ route('admin.consultations.index', ['status' => 'contacted']) }}" class="badge {{ request('status')==='contacted' ? 'bg-dark' : 'bg-light text-dark border' }}" style="padding:8px 14px">تم التواصل ({{ $counts['contacted'] }})</a>
    <a href="{{ route('admin.consultations.index', ['status' => 'scheduled']) }}" class="badge {{ request('status')==='scheduled' ? 'bg-dark' : 'bg-light text-dark border' }}" style="padding:8px 14px">تم الجدولة ({{ $counts['scheduled'] }})</a>
    <a href="{{ route('admin.consultations.index', ['status' => 'closed']) }}" class="badge {{ request('status')==='closed' ? 'bg-dark' : 'bg-light text-dark border' }}" style="padding:8px 14px">مغلق ({{ $counts['closed'] }})</a>
</div>

<div class="panel-card">
    <div class="panel-card-body p-0">
        @if($consultations->isEmpty())
            <div class="text-center py-5 text-muted">
                <i class="bi bi-camera-video" style="font-size:2.5rem;opacity:.3"></i>
                <p class="mt-2">لا توجد طلبات استشارة بعد</p>
            </div>
        @else
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>البريد الإلكتروني</th>
                        <th>الهاتف</th>
                        <th>بلد الإقامة</th>
                        <th style="width:120px">الحالة</th>
                        <th style="width:100px">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($consultations as $consultation)
                    <tr>
                        <td style="font-weight:500">{{ $consultation->name }}</td>
                        <td dir="ltr">{{ $consultation->email }}</td>
                        <td dir="ltr">{{ $consultation->phone_country_code }} {{ $consultation->phone }}</td>
                        <td>{{ $consultation->country_of_residence }}</td>
                        <td>
                            <span class="badge bg-{{ ['new'=>'primary','contacted'=>'warning','scheduled'=>'success','closed'=>'secondary'][$consultation->status] ?? 'secondary' }}">{{ $consultation->status }}</span>
                        </td>
                        <td>
                            <a href="{{ route('admin.consultations.show', $consultation) }}" class="btn-outline-sm"><i class="bi bi-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-3">{{ $consultations->links() }}</div>
        @endif
    </div>
</div>

@endsection
