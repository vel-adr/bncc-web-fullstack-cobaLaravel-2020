@php
$url = '/pertanyaan'.'/'.$question->id;
@endphp

@extends('master')
@section('title', 'Edit your question')

@section('content')
<div class="container">
    <h1>Edit Your Question</h1>
    <form method="POST" action="{{ url($url) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label" for="title">Title : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input class="form-control" type="text" name="title" id="title"
                placeholder="Write your question's title here" maxlength="45" size="45" value="{{ $question->title }}"
                required>
        </div>
        @error('title')
        <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label class="form-label" for="content">Question : </label>
            <textarea class="form-control" name="content" id="content" maxlength="255" cols="51" rows="5"
                placeholder="Write your question here" required>{{ $question->content }}</textarea>
        </div>
        @error('content')
        <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-outline-success">Edit</button>
    </form>
</div>
@endsection