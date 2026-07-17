@extends('admin.layouts.app')
@section('title', __('messages.services'))

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">{{ __('messages.services') }}</h1>
        <p class="page-sub">الخدمات العلاجية المعروضة في الموقع</p>
    </div>
    <a href="{{ route('admin.services.create') }}" class="btn-primary-sm">
        <i class="bi bi-plus-lg"></i> إضافة خدمة
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
        @if($services->isEmpty())
            <div class="text-center py-5 text-muted">
                <i class="bi bi-heart-pulse" style="font-size:2.5rem;opacity:.3"></i>
                <p class="mt-2">لا توجد خدمات بعد</p>
            </div>
        @else
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width:60px">#</th>
                        <th>الصورة</th>
                        <th>العنوان (عربي)</th>
                        <th>Title (English)</th>
                        <th style="width:100px">مميزة</th>
                        <th style="width:100px">الحالة</th>
                        <th style="width:130px">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                    <tr>
                        <td>{{ $service->order_index }}</td>
                        <td>
                            @if($service->image)
                                <img src="{{ $service->image_url }}" alt="" style="height:50px;width:80px;object-fit:cover;border-radius:8px;border:1px solid #e2e8f0">
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td>{{ $service->title_ar }}</td>
                        <td dir="ltr">{{ $service->title_en }}</td>
                        <td>
                            @if($service->is_featured)<span class="badge bg-info">مميزة</span>@else<span class="text-muted">—</span>@endif
                        </td>
                        <td>
                            <form action="{{ route('admin.services.toggle', $service->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="badge border-0 {{ $service->is_active ? 'bg-success' : 'bg-secondary' }}" style="cursor:pointer;font-size:12px;padding:5px 10px">
                                    {{ $service->is_active ? 'نشط' : 'معطل' }}
                                </button>
                            </form>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.services.edit', $service->id) }}" class="btn-outline-sm"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
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
