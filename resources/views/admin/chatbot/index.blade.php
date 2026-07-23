@extends('admin.layouts.app')
@section('title', 'قاعدة معرفة الشات بوت')

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">قاعدة معرفة الشات بوت</h1>
        <p class="page-sub">المعلومات التي يستخدمها المساعد الذكي للإجابة على أسئلة المرضى</p>
    </div>
    <a href="{{ route('admin.chatbot.create') }}" class="btn-primary-sm">
        <i class="bi bi-plus-lg"></i> إضافة معلومة
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
        @if($entries->isEmpty())
            <div class="text-center py-5 text-muted">
                <i class="bi bi-robot" style="font-size:2.5rem;opacity:.3"></i>
                <p class="mt-2">لا توجد معلومات بعد — أضف معلومات لتغذية المساعد الذكي</p>
            </div>
        @else
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width:50px">#</th>
                        <th>العنوان</th>
                        <th style="width:130px">التصنيف</th>
                        <th style="width:200px">الكلمات المفتاحية</th>
                        <th style="width:90px">الحالة</th>
                        <th style="width:130px">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($entries as $entry)
                    <tr>
                        <td>{{ $entry->order_index }}</td>
                        <td>
                            <div class="fw-medium">{{ $entry->title_ar }}</div>
                            @if($entry->title_en)
                                <small class="text-muted" dir="ltr">{{ $entry->title_en }}</small>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-info text-dark">{{ $entry->category }}</span>
                        </td>
                        <td>
                            <small class="text-muted">{{ Str::limit($entry->tags, 60) }}</small>
                        </td>
                        <td>
                            <form action="{{ route('admin.chatbot.toggle', $entry->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="badge border-0 {{ $entry->is_active ? 'bg-success' : 'bg-secondary' }}" style="cursor:pointer;font-size:12px;padding:5px 10px">
                                    {{ $entry->is_active ? 'نشط' : 'معطل' }}
                                </button>
                            </form>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.chatbot.edit', $entry->id) }}" class="btn-outline-sm"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.chatbot.destroy', $entry->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
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
