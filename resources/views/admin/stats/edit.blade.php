@extends('admin.layouts.app')
@section('title', 'تعديل الرقم')

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div><h1 class="page-title">تعديل الرقم</h1></div>
    <a href="{{ route('admin.stats.index') }}" class="btn-outline-sm"><i class="bi bi-arrow-left"></i> رجوع</a>
</div>

@if($errors->any())
    <div class="alert alert-danger mb-3">
        <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
@endif

<div class="row g-3">
<div class="col-12 col-xl-9">
<form action="{{ route('admin.stats.update', $stat->id) }}" method="POST">
@csrf @method('PUT')
@include('admin.stats._form')
</form>
</div>
</div>

@endsection
