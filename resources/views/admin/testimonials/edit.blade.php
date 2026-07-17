@extends('admin.layouts.app')
@section('title', 'تعديل الشهادة')

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div><h1 class="page-title">تعديل الشهادة</h1></div>
    <a href="{{ route('admin.testimonials.index') }}" class="btn-outline-sm"><i class="bi bi-arrow-left"></i> رجوع</a>
</div>

@if($errors->any())
    <div class="alert alert-danger mb-3">
        <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
@endif

<div class="row g-3">
<div class="col-12 col-xl-9">
<form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
@csrf @method('PUT')
@include('admin.testimonials._form')
</form>
</div>
</div>

@endsection
