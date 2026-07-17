@extends('admin.layouts.app')
@section('title', 'تعديل السؤال')

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div><h1 class="page-title">تعديل السؤال</h1></div>
    <a href="{{ route('admin.faqs.index') }}" class="btn-outline-sm"><i class="bi bi-arrow-left"></i> رجوع</a>
</div>

@if($errors->any())
    <div class="alert alert-danger mb-3">
        <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
@endif

<div class="row g-3">
<div class="col-12 col-xl-9">
<form action="{{ route('admin.faqs.update', $faq->id) }}" method="POST">
@csrf @method('PUT')
@include('admin.faqs._form')
</form>
</div>
</div>

@endsection
