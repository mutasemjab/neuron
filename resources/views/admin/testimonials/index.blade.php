@extends('admin.layouts.app')
@section('title', __('messages.testimonials'))

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">{{ __('messages.testimonials') }}</h1>
        <p class="page-sub">آراء وقصص المرضى</p>
    </div>
    <a href="{{ route('admin.testimonials.create') }}" class="btn-primary-sm">
        <i class="bi bi-plus-lg"></i> إضافة شهادة
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
        @if($testimonials->isEmpty())
            <div class="text-center py-5 text-muted">
                <i class="bi bi-chat-quote" style="font-size:2.5rem;opacity:.3"></i>
                <p class="mt-2">لا توجد شهادات بعد</p>
            </div>
        @else
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width:60px">#</th>
                        <th>الصورة</th>
                        <th>اسم المريض (عربي)</th>
                        <th>Name (English)</th>
                        <th>الطبيب المعالج</th>
                        <th style="width:80px">التقييم</th>
                        <th style="width:100px">الحالة</th>
                        <th style="width:130px">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($testimonials as $testimonial)
                    <tr>
                        <td>{{ $testimonial->order_index }}</td>
                        <td>
                            @if($testimonial->avatar)
                                <img src="{{ $testimonial->avatar_url }}" alt="" style="height:44px;width:44px;object-fit:cover;border-radius:50%;border:1px solid #e2e8f0">
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td>{{ $testimonial->patient_name_ar }}</td>
                        <td dir="ltr">{{ $testimonial->patient_name_en }}</td>
                        <td>{{ $testimonial->doctor->name_ar ?? '—' }}</td>
                        <td>{{ str_repeat('★', $testimonial->rating) }}</td>
                        <td>
                            <form action="{{ route('admin.testimonials.toggle', $testimonial->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="badge border-0 {{ $testimonial->is_active ? 'bg-success' : 'bg-secondary' }}" style="cursor:pointer;font-size:12px;padding:5px 10px">
                                    {{ $testimonial->is_active ? 'نشط' : 'معطل' }}
                                </button>
                            </form>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="btn-outline-sm"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
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
