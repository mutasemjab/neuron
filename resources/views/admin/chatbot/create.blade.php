@extends('admin.layouts.app')
@section('title', 'إضافة معلومة للشات بوت')

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div><h1 class="page-title">إضافة معلومة جديدة</h1></div>
    <a href="{{ route('admin.chatbot.index') }}" class="btn-outline-sm"><i class="bi bi-arrow-right"></i> رجوع</a>
</div>

@if($errors->any())
    <div class="alert alert-danger mb-3">
        <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
@endif

<form action="{{ route('admin.chatbot.store') }}" method="POST">
    @csrf
    @include('admin.chatbot._form')
</form>

@endsection
