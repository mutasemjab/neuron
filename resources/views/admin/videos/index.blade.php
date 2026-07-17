@extends('admin.layouts.app')
@section('title', __('messages.videos'))

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">{{ __('messages.videos') }}</h1>
        <p class="page-sub">مكتبة الفيديو</p>
    </div>
    <a href="{{ route('admin.videos.create') }}" class="btn-primary-sm">
        <i class="bi bi-plus-lg"></i> إضافة فيديو
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
        @if($videos->isEmpty())
            <div class="text-center py-5 text-muted">
                <i class="bi bi-play-circle" style="font-size:2.5rem;opacity:.3"></i>
                <p class="mt-2">لا توجد فيديوهات بعد</p>
            </div>
        @else
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width:60px">#</th>
                        <th>الصورة المصغرة</th>
                        <th>العنوان (عربي)</th>
                        <th>Title (English)</th>
                        <th style="width:90px">رئيسي</th>
                        <th style="width:100px">الحالة</th>
                        <th style="width:130px">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($videos as $video)
                    <tr>
                        <td>{{ $video->order_index }}</td>
                        <td>
                            @if($video->thumbnail)
                                <img src="{{ $video->thumbnail_url }}" alt="" style="height:50px;width:80px;object-fit:cover;border-radius:8px;border:1px solid #e2e8f0">
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td>{{ $video->title_ar }}</td>
                        <td dir="ltr">{{ $video->title_en }}</td>
                        <td>@if($video->is_main)<span class="badge bg-info">رئيسي</span>@else<span class="text-muted">—</span>@endif</td>
                        <td>
                            <form action="{{ route('admin.videos.toggle', $video->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="badge border-0 {{ $video->is_active ? 'bg-success' : 'bg-secondary' }}" style="cursor:pointer;font-size:12px;padding:5px 10px">
                                    {{ $video->is_active ? 'نشط' : 'معطل' }}
                                </button>
                            </form>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.videos.edit', $video->id) }}" class="btn-outline-sm"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.videos.destroy', $video->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
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
