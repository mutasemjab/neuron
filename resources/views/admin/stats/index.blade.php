@extends('admin.layouts.app')
@section('title', __('messages.stats'))

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">{{ __('messages.stats') }}</h1>
        <p class="page-sub">الأرقام المتحركة (الواجهة الرئيسية وقسم الإحصائيات)</p>
    </div>
    <a href="{{ route('admin.stats.create') }}" class="btn-primary-sm">
        <i class="bi bi-plus-lg"></i> إضافة رقم
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-3">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@foreach(['hero' => 'شرائط الواجهة الرئيسية (Hero)', 'main' => 'قسم الإحصائيات'] as $section => $label)
<div class="panel-card mb-3">
    <div class="panel-card-header"><h2 class="panel-card-title">{{ $label }}</h2></div>
    <div class="panel-card-body p-0">
        @php $rows = $stats[$section] ?? collect(); @endphp
        @if($rows->isEmpty())
            <div class="text-center py-4 text-muted">لا توجد أرقام بعد</div>
        @else
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width:60px">#</th>
                        <th>الرقم</th>
                        <th>التسمية (عربي)</th>
                        <th>Label (English)</th>
                        <th style="width:100px">الحالة</th>
                        <th style="width:130px">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rows as $stat)
                    <tr>
                        <td>{{ $stat->order_index }}</td>
                        <td dir="ltr">{{ $stat->number }}{{ $stat->suffix }}</td>
                        <td>{{ $stat->label_ar }}</td>
                        <td dir="ltr">{{ $stat->label_en }}</td>
                        <td>
                            <form action="{{ route('admin.stats.toggle', $stat->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="badge border-0 {{ $stat->is_active ? 'bg-success' : 'bg-secondary' }}" style="cursor:pointer;font-size:12px;padding:5px 10px">
                                    {{ $stat->is_active ? 'نشط' : 'معطل' }}
                                </button>
                            </form>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.stats.edit', $stat->id) }}" class="btn-outline-sm"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.stats.destroy', $stat->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
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
@endforeach

@endsection
