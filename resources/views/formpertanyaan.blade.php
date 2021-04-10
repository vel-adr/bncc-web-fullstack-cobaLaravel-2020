@extends('master')

@section('title', 'Create a question')

@section('content')
<div class="container">
    <h1>Create a question</h1>
    <form method="POST" action="{{ url('/pertanyaan') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="title">Title : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input class="form-control" type="text" name="title" id="title"
                placeholder="Write your question's title here" maxlength="45" size="45" required>
        </div>
        @error('title')
        <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label class="form-label" for="content">Question : </label>
            <textarea class="form-control" name="content" id="content" maxlength="255" cols="51" rows="5"
                placeholder="Write your question here" required></textarea>
        </div>
        @error('content')
        <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror

        {{-- sementara profileid selalu 1 karena belum ada login --}}
        <input type="hidden" name="profile_id" value="1">

        <button type="submit" class="btn btn-outline-success">Submit</button>
    </form>
</div>

@endsection