@extends('admin.layouts.app')
@section('title', __('messages.create_role'))

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div><h1 class="page-title">{{ __('messages.create_role') }}</h1></div>
    <a href="{{ route('admin.role.index') }}" class="btn-outline-sm"><i class="bi bi-arrow-left"></i> رجوع</a>
</div>

@if($errors->any())
    <div class="alert alert-danger mb-3">
        <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
@endif

<form action="{{ route('admin.role.store') }}" method="POST">
    @csrf

    <div class="panel-card mb-3">
        <div class="panel-card-body">
            <div class="col-12 col-md-6">
                <label class="form-label">{{ __('messages.name_field') }} <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
        </div>
    </div>

    <div class="panel-card">
        <div class="panel-card-header"><h2 class="panel-card-title">{{ __('messages.permissions') }}</h2></div>
        <div class="panel-card-body">
            @include('admin.roles._permission_groups', ['checked' => old('perms', [])])
        </div>
    </div>

    <div class="mt-3">
        <button type="submit" class="btn-primary-sm"><i class="bi bi-save"></i> {{ __('messages.Save') }}</button>
        <a href="{{ route('admin.role.index') }}" class="btn-outline-sm">{{ __('messages.Cancel') }}</a>
    </div>
</form>

@endsection
