@extends('admin.layouts.app')
@section('title', __('messages.faqs'))

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">{{ __('messages.faqs') }}</h1>
        <p class="page-sub">الأسئلة الشائعة المعروضة في الموقع</p>
    </div>
    <a href="{{ route('admin.faqs.create') }}" class="btn-primary-sm">
        <i class="bi bi-plus-lg"></i> إضافة سؤال
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
        @if($faqs->isEmpty())
            <div class="text-center py-5 text-muted">
                <i class="bi bi-question-circle" style="font-size:2.5rem;opacity:.3"></i>
                <p class="mt-2">لا توجد أسئلة بعد</p>
            </div>
        @else
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width:60px">#</th>
                        <th>السؤال (عربي)</th>
                        <th>Question (English)</th>
                        <th style="width:100px">الحالة</th>
                        <th style="width:130px">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($faqs as $faq)
                    <tr>
                        <td>{{ $faq->order_index }}</td>
                        <td>{{ $faq->question_ar }}</td>
                        <td dir="ltr">{{ $faq->question_en }}</td>
                        <td>
                            <form action="{{ route('admin.faqs.toggle', $faq->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="badge border-0 {{ $faq->is_active ? 'bg-success' : 'bg-secondary' }}" style="cursor:pointer;font-size:12px;padding:5px 10px">
                                    {{ $faq->is_active ? 'نشط' : 'معطل' }}
                                </button>
                            </form>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn-outline-sm"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
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
