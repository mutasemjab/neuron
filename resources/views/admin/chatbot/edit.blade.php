@extends('admin.layouts.app')
@section('title', 'تعديل معلومة الشات بوت')

@section('content')

<div class="page-header d-flex align-items-start justify-content-between flex-wrap gap-3">
    <div><h1 class="page-title">تعديل: {{ $chatbot->title_ar }}</h1></div>
    <a href="{{ route('admin.chatbot.index') }}" class="btn-outline-sm"><i class="bi bi-arrow-right"></i> رجوع</a>
</div>

@if($errors->any())
    <div class="alert alert-danger mb-3">
        <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
@endif

<form action="{{ route('admin.chatbot.update', $chatbot->id) }}" method="POST">
    @csrf @method('PUT')
    @include('admin.chatbot._form')
</form>

@endsection
