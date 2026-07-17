@extends('admin.layouts.app')
@section('title', __('messages.career_jobs'))

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">{{ __('messages.career_jobs') }}</h1>
        <p class="page-sub">الوظائف الشاغرة المعروضة في الموقع</p>
    </div>
    <a href="{{ route('admin.career-jobs.create') }}" class="btn-primary-sm">
        <i class="bi bi-plus-lg"></i> إضافة وظيفة
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
        @if($jobs->isEmpty())
            <div class="text-center py-5 text-muted">
                <i class="bi bi-briefcase" style="font-size:2.5rem;opacity:.3"></i>
                <p class="mt-2">لا توجد وظائف بعد</p>
            </div>
        @else
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width:60px">#</th>
                        <th>المسمى (عربي)</th>
                        <th>Title (English)</th>
                        <th>الدوام</th>
                        <th style="width:100px">الحالة</th>
                        <th style="width:130px">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobs as $job)
                    <tr>
                        <td>{{ $job->order_index }}</td>
                        <td>{{ $job->title_ar }}</td>
                        <td dir="ltr">{{ $job->title_en }}</td>
                        <td>{{ $job->type_ar }}</td>
                        <td>
                            <form action="{{ route('admin.career-jobs.toggle', $job->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="badge border-0 {{ $job->is_active ? 'bg-success' : 'bg-secondary' }}" style="cursor:pointer;font-size:12px;padding:5px 10px">
                                    {{ $job->is_active ? 'نشط' : 'معطل' }}
                                </button>
                            </form>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.career-jobs.edit', $job->id) }}" class="btn-outline-sm"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.career-jobs.destroy', $job->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
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
