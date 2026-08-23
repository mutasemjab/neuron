@extends('admin.layouts.app')
@section('title', __('messages.role'))

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">{{ __('messages.roles_permissions') }}</h1>
        <p class="page-sub">إدارة الأدوار وصلاحيات الوصول للوحة التحكم</p>
    </div>
    @can('role-add')
    <a href="{{ route('admin.role.create') }}" class="btn-primary-sm">
        <i class="bi bi-plus-lg"></i> {{ __('messages.new_role') }}
    </a>
    @endcan
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-3">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="panel-card">
    <div class="panel-card-body p-0">
        @if($data->isEmpty())
            <div class="text-center py-5 text-muted">
                <i class="bi bi-shield-check" style="font-size:2.5rem;opacity:.3"></i>
                <p class="mt-2">لا توجد أدوار بعد</p>
            </div>
        @else
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>{{ __('messages.name_field') }}</th>
                        <th>{{ __('messages.permissions') }}</th>
                        <th style="width:130px">{{ __('messages.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $role)
                    <tr>
                        <td style="font-weight:500">{{ $role->name }}</td>
                        <td><span class="badge bg-light text-dark border">{{ $role->permissions->count() }} صلاحية</span></td>
                        <td>
                            <div class="d-flex gap-2">
                                @can('role-edit')
                                <a href="{{ route('admin.role.edit', $role->id) }}" class="btn-outline-sm"><i class="bi bi-pencil"></i></a>
                                @endcan
                                @can('role-delete')
                                <form action="{{ route('admin.role.delete') }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $role->id }}">
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
