@extends('admin.layouts.app')
@section('title', 'طلبات التوظيف')

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">طلبات التوظيف</h1>
        <p class="page-sub">طلبات التقديم على الوظائف الواردة من الموقع</p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-3">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="d-flex gap-2 mb-3 flex-wrap">
    <a href="{{ route('admin.job-applications.index') }}" class="badge {{ !request('status') ? 'bg-dark' : 'bg-light text-dark border' }}" style="padding:8px 14px">الكل</a>
    <a href="{{ route('admin.job-applications.index', ['status' => 'new']) }}" class="badge {{ request('status')==='new' ? 'bg-dark' : 'bg-light text-dark border' }}" style="padding:8px 14px">جديد ({{ $counts['new'] }})</a>
    <a href="{{ route('admin.job-applications.index', ['status' => 'reviewed']) }}" class="badge {{ request('status')==='reviewed' ? 'bg-dark' : 'bg-light text-dark border' }}" style="padding:8px 14px">تمت المراجعة ({{ $counts['reviewed'] }})</a>
    <a href="{{ route('admin.job-applications.index', ['status' => 'contacted']) }}" class="badge {{ request('status')==='contacted' ? 'bg-dark' : 'bg-light text-dark border' }}" style="padding:8px 14px">تم التواصل ({{ $counts['contacted'] }})</a>
    <a href="{{ route('admin.job-applications.index', ['status' => 'rejected']) }}" class="badge {{ request('status')==='rejected' ? 'bg-dark' : 'bg-light text-dark border' }}" style="padding:8px 14px">مرفوض ({{ $counts['rejected'] }})</a>
</div>

<div class="panel-card">
    <div class="panel-card-body p-0">
        @if($applications->isEmpty())
            <div class="text-center py-5 text-muted">
                <i class="bi bi-person-badge" style="font-size:2.5rem;opacity:.3"></i>
                <p class="mt-2">لا توجد طلبات توظيف بعد</p>
            </div>
        @else
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>الهاتف</th>
                        <th>البريد الإلكتروني</th>
                        <th>الوظيفة</th>
                        <th style="width:120px">الحالة</th>
                        <th style="width:130px">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applications as $application)
                    <tr>
                        <td style="font-weight:500">{{ $application->name }}</td>
                        <td dir="ltr">{{ $application->phone }}</td>
                        <td dir="ltr">{{ $application->email }}</td>
                        <td>{{ $application->careerJob->title_ar ?? '—' }}</td>
                        <td>
                            <span class="badge bg-{{ ['new'=>'primary','reviewed'=>'info','contacted'=>'warning','rejected'=>'secondary'][$application->status] ?? 'secondary' }}">{{ $application->status }}</span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.job-applications.show', $application) }}" class="btn-outline-sm"><i class="bi bi-eye"></i></a>
                                <form action="{{ route('admin.job-applications.destroy', $application) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
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
        <div class="p-3">{{ $applications->links() }}</div>
        @endif
    </div>
</div>

@endsection
