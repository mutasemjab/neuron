@extends('admin.layouts.app')
@section('title', __('messages.insurance_companies'))

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">{{ __('messages.insurance_companies') }}</h1>
        <p class="page-sub">شركات التأمين المعتمدة</p>
    </div>
    <a href="{{ route('admin.insurance-companies.create') }}" class="btn-primary-sm">
        <i class="bi bi-plus-lg"></i> إضافة شركة
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
        @if($insuranceCompanies->isEmpty())
            <div class="text-center py-5 text-muted">
                <i class="bi bi-shield-check" style="font-size:2.5rem;opacity:.3"></i>
                <p class="mt-2">لا توجد شركات تأمين بعد</p>
            </div>
        @else
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th style="width:60px">#</th>
                        <th>الاسم (عربي)</th>
                        <th>Name (English)</th>
                        <th style="width:100px">الحالة</th>
                        <th style="width:130px">إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($insuranceCompanies as $company)
                    <tr>
                        <td>{{ $company->order_index }}</td>
                        <td>{{ $company->name_ar }}</td>
                        <td dir="ltr">{{ $company->name_en }}</td>
                        <td>
                            <form action="{{ route('admin.insurance-companies.toggle', $company->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="badge border-0 {{ $company->is_active ? 'bg-success' : 'bg-secondary' }}" style="cursor:pointer;font-size:12px;padding:5px 10px">
                                    {{ $company->is_active ? 'نشط' : 'معطل' }}
                                </button>
                            </form>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.insurance-companies.edit', $company->id) }}" class="btn-outline-sm"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('admin.insurance-companies.destroy', $company->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
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
