@extends('admin.layouts.app')
@section('title', __('messages.branches'))

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">{{ __('messages.branches') }}</h1>
        <p class="page-sub">فروع العيادة</p>
    </div>
    <a href="{{ route('admin.branches.create') }}" class="btn-primary-sm">
        <i class="bi bi-plus-lg"></i> إضافة فرع
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
        @if($branches->isEmpty())
            <div class="text-center py-5 text-muted">
                <i class="bi bi-geo-alt" style="font-size:2.5rem;opacity:.3"></i>
                <p class="mt-2">لا توجد فروع بعد</p>
            </div>
        @else
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width:60px">#</th>
                        <th>الاسم (عربي)</th>
                        <th>Name (English)</th>
                        <th>الهاتف</th>
                        <th style="width:90px">رئيسي</th>
                        <th style="width:100px">الحالة</th>
                        <th style="width:130px">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($branches as $branch)
                    <tr>
                        <td>{{ $branch->order_index }}</td>
                        <td>{{ $branch->name_ar }}</td>
                        <td dir="ltr">{{ $branch->name_en }}</td>
                        <td dir="ltr">{{ $branch->phone }}</td>
                        <td>@if($branch->is_main)<span class="badge bg-info">رئيسي</span>@else<span class="text-muted">—</span>@endif</td>
                        <td>
                            <form action="{{ route('admin.branches.toggle', $branch->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="badge border-0 {{ $branch->is_active ? 'bg-success' : 'bg-secondary' }}" style="cursor:pointer;font-size:12px;padding:5px 10px">
                                    {{ $branch->is_active ? 'نشط' : 'معطل' }}
                                </button>
                            </form>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.branches.edit', $branch->id) }}" class="btn-outline-sm"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.branches.destroy', $branch->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
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
