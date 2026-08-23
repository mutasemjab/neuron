@extends('admin.layouts.app')
@section('title', __('messages.employee_title'))

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">{{ __('messages.employee_title') }}</h1>
        <p class="page-sub">إدارة موظفي لوحة التحكم وأدوارهم</p>
    </div>
    @can('employee-add')
    <a href="{{ route('admin.employee.create') }}" class="btn-primary-sm">
        <i class="bi bi-plus-lg"></i> {{ __('messages.new_employee') }}
    </a>
    @endcan
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-3">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show mb-3">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="panel-card">
    <div class="panel-card-body p-0">
        @if($data->isEmpty())
            <div class="text-center py-5 text-muted">
                <i class="bi bi-people" style="font-size:2.5rem;opacity:.3"></i>
                <p class="mt-2">لا يوجد موظفون بعد</p>
            </div>
        @else
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>{{ __('messages.name_field') }}</th>
                        <th>{{ __('messages.user_name_col') }}</th>
                        <th>البريد الإلكتروني</th>
                        <th>الأدوار</th>
                        <th style="width:130px">{{ __('messages.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $employee)
                    <tr>
                        <td style="font-weight:500">{{ $employee->name }}</td>
                        <td dir="ltr">{{ $employee->username }}</td>
                        <td dir="ltr">{{ $employee->email }}</td>
                        <td>
                            @forelse($employee->roles as $role)
                                <span class="badge bg-light text-dark border">{{ $role->name }}</span>
                            @empty
                                <span class="text-muted">—</span>
                            @endforelse
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                @can('employee-edit')
                                <a href="{{ route('admin.employee.edit', $employee->id) }}" class="btn-outline-sm"><i class="bi bi-pencil"></i></a>
                                @endcan
                                @can('employee-delete')
                                <form action="{{ route('admin.employee.destroy', $employee->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-danger-sm"><i class="bi bi-trash"></i></button>
                                </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-3">{{ $data->links() }}</div>
        @endif
    </div>
</div>

@endsection
