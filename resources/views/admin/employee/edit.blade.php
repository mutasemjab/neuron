@extends('admin.layouts.app')
@section('title', __('messages.edit_employee'))

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div><h1 class="page-title">{{ __('messages.edit_employee') }}</h1></div>
    <a href="{{ route('admin.employee.index') }}" class="btn-outline-sm"><i class="bi bi-arrow-left"></i> رجوع</a>
</div>

@if($errors->any())
    <div class="alert alert-danger mb-3">
        <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
@endif

<form action="{{ route('admin.employee.update', $admin->id) }}" method="POST">
    @csrf
    @method('PATCH')

    <div class="panel-card mb-3">
        <div class="panel-card-header"><h2 class="panel-card-title">{{ __('messages.employee_title') }}</h2></div>
        <div class="panel-card-body">
            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <label class="form-label">{{ __('messages.name_field') }} <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $admin->name) }}" required>
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label">{{ __('messages.username_label') }} <span class="text-danger">*</span></label>
                    <input type="text" name="username" dir="ltr" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $admin->username) }}" required>
                    @error('username')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label">البريد الإلكتروني <span class="text-danger">*</span></label>
                    <input type="email" name="email" dir="ltr" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $admin->email) }}" required>
                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label">{{ __('messages.password_label') }}</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="اتركه فارغاً لعدم التغيير">
                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
        </div>
    </div>

    <div class="panel-card">
        <div class="panel-card-header"><h2 class="panel-card-title">الأدوار</h2></div>
        <div class="panel-card-body">
            <div class="d-flex flex-wrap gap-3">
                @forelse($roles as $role)
                <label class="d-flex align-items-center gap-2" style="cursor:pointer">
                    <input type="checkbox" name="roles[]" value="{{ $role->id }}" {{ in_array($role->id, old('roles', $adminRole)) ? 'checked' : '' }}>
                    {{ $role->name }}
                </label>
                @empty
                <p class="text-muted mb-0">لا توجد أدوار — أنشئ دوراً أولاً من صفحة الأدوار والصلاحيات.</p>
                @endforelse
            </div>
            @error('roles')<div class="text-danger mt-2" style="font-size:.85rem">{{ $message }}</div>@enderror
        </div>
    </div>

    <div class="mt-3">
        <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> {{ __('messages.Save') }}</button>
        <a href="{{ route('admin.employee.index') }}" class="btn-outline-sm">{{ __('messages.Cancel') }}</a>
    </div>
</form>

@endsection
