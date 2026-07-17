@extends('admin.layouts.app')
@section('title', __('messages.site_settings'))

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div>
        <h1 class="page-title">{{ __('messages.site_settings') }}</h1>
        <p class="page-sub">إدارة كل نصوص وصور الموقع العامة (بالعربية والإنجليزية)</p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-3">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger mb-3">
        <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
@endif

<form action="{{ route('admin.site-settings.update') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="panel-card">
    <div class="panel-card-body">
        <ul class="nav nav-pills mb-4 flex-wrap gap-2" role="tablist">
            @foreach($groups as $groupKey => $group)
            <li class="nav-item" role="presentation">
                <button class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="pill"
                        data-bs-target="#tab-{{ $groupKey }}" type="button">{{ $group['label'] }}</button>
            </li>
            @endforeach
        </ul>

        <div class="tab-content">
            @foreach($groups as $groupKey => $group)
            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="tab-{{ $groupKey }}">
                <div class="row g-3">
                    @foreach($group['fields'] as $key => $def)
                        @php $current = $settings[$key] ?? null; @endphp

                        @if($def['type'] === 'image')
                            <div class="col-12 col-md-6">
                                <label class="form-label">{{ $def['label'] }}</label><br>
                                @if($current && $current->value_ar)
                                    <img src="{{ uploaded_image($current->value_ar, 'site') }}" alt=""
                                         style="height:70px;max-width:160px;object-fit:cover;border-radius:8px;border:1px solid #e2e8f0;margin-bottom:8px">
                                @endif
                                <input type="file" name="{{ str_replace('.', '_', $key) }}" accept="image/*" class="form-control">
                            </div>
                        @elseif($def['translatable'])
                            <div class="col-12 col-md-6">
                                <label class="form-label">{{ $def['label'] }} (عربي)</label>
                                @if($def['type'] === 'textarea')
                                    <textarea name="settings[{{ $key }}][ar]" rows="3" class="form-control">{{ old("settings.$key.ar", $current->value_ar ?? '') }}</textarea>
                                @else
                                    <input type="text" name="settings[{{ $key }}][ar]" class="form-control"
                                           value="{{ old("settings.$key.ar", $current->value_ar ?? '') }}">
                                @endif
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">{{ $def['label'] }} (English)</label>
                                @if($def['type'] === 'textarea')
                                    <textarea name="settings[{{ $key }}][en]" rows="3" class="form-control" dir="ltr">{{ old("settings.$key.en", $current->value_en ?? '') }}</textarea>
                                @else
                                    <input type="text" name="settings[{{ $key }}][en]" class="form-control" dir="ltr"
                                           value="{{ old("settings.$key.en", $current->value_en ?? '') }}">
                                @endif
                            </div>
                        @else
                            <div class="col-12 col-md-6">
                                <label class="form-label">{{ $def['label'] }}</label>
                                <input type="text" name="settings[{{ $key }}][raw]" class="form-control" dir="ltr"
                                       value="{{ old("settings.$key.raw", $current->value_ar ?? '') }}">
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-4">
            <button type="submit" class="btn-primary-sm">
                <i class="bi bi-save"></i> حفظ الإعدادات
            </button>
        </div>
    </div>
</div>
</form>

@endsection
