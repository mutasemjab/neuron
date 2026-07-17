@extends('admin.layouts.app')
@section('title', __('messages.articles'))

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">{{ __('messages.articles') }}</h1>
        <p class="page-sub">المدوّنة الطبية</p>
    </div>
    <a href="{{ route('admin.articles.create') }}" class="btn-primary-sm">
        <i class="bi bi-plus-lg"></i> إضافة مقال
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
        @if($articles->isEmpty())
            <div class="text-center py-5 text-muted">
                <i class="bi bi-journal-text" style="font-size:2.5rem;opacity:.3"></i>
                <p class="mt-2">لا توجد مقالات بعد</p>
            </div>
        @else
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>الصورة</th>
                        <th>العنوان (عربي)</th>
                        <th>Title (English)</th>
                        <th>التصنيف</th>
                        <th style="width:130px">تاريخ النشر</th>
                        <th style="width:100px">الحالة</th>
                        <th style="width:130px">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                    <tr>
                        <td>
                            @if($article->image)
                                <img src="{{ $article->image_url }}" alt="" style="height:44px;width:70px;object-fit:cover;border-radius:8px;border:1px solid #e2e8f0">
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td>{{ $article->title_ar }}</td>
                        <td dir="ltr">{{ $article->title_en }}</td>
                        <td>{{ $article->category_ar }}</td>
                        <td>{{ $article->published_at?->format('Y-m-d') }}</td>
                        <td>
                            <form action="{{ route('admin.articles.toggle', $article->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="badge border-0 {{ $article->is_active ? 'bg-success' : 'bg-secondary' }}" style="cursor:pointer;font-size:12px;padding:5px 10px">
                                    {{ $article->is_active ? 'منشور' : 'مسودة' }}
                                </button>
                            </form>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn-outline-sm"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
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
