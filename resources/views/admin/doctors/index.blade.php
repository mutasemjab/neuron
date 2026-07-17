@extends('admin.layouts.app')
@section('title', __('messages.doctors'))

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">{{ __('messages.doctors') }}</h1>
        <p class="page-sub">الكادر الطبي المعروض في الموقع</p>
    </div>
    <a href="{{ route('admin.doctors.create') }}" class="btn-primary-sm">
        <i class="bi bi-plus-lg"></i> إضافة طبيب
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
        @if($doctors->isEmpty())
            <div class="text-center py-5 text-muted">
                <i class="bi bi-person-badge" style="font-size:2.5rem;opacity:.3"></i>
                <p class="mt-2">لا يوجد أطباء بعد</p>
            </div>
        @else
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width:60px">#</th>
                        <th>الصورة</th>
                        <th>الاسم (عربي)</th>
                        <th>Name (English)</th>
                        <th>التخصص</th>
                        <th style="width:100px">الحالة</th>
                        <th style="width:130px">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($doctors as $doctor)
                    <tr>
                        <td>{{ $doctor->order_index }}</td>
                        <td>
                            @if($doctor->image)
                                <img src="{{ $doctor->image_url }}" alt="" style="height:50px;width:50px;object-fit:cover;border-radius:50%;border:1px solid #e2e8f0">
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td>{{ $doctor->name_ar }}</td>
                        <td dir="ltr">{{ $doctor->name_en }}</td>
                        <td>{{ $doctor->specialization_ar }}</td>
                        <td>
                            <form action="{{ route('admin.doctors.toggle', $doctor->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="badge border-0 {{ $doctor->is_active ? 'bg-success' : 'bg-secondary' }}" style="cursor:pointer;font-size:12px;padding:5px 10px">
                                    {{ $doctor->is_active ? 'نشط' : 'معطل' }}
                                </button>
                            </form>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn-outline-sm"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
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
