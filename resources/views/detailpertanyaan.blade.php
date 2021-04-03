@php
$url = '/pertanyaan'.'/'.$question[0]->id;
@endphp

@extends('master')
@section('title')
{{ $question[0]->title }}
@endsection

@section('content')
<div class="container">
    <h3>{{ $question[0]->title }}</h3>
    <hr>
    <p>{{ $question[0]->content }}</p>
    <p>Asked {{ $question[0]->created_at }} | <a href="/pertanyaan/{{ $question[0]->id }}/edit">Edit question</a></p>
    <form action="{{ url($url) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-outline-danger">Delete question</button>
    </form>
    <hr>
    <h6>{{ count($answers) }} Answers</h6>
    <hr>

    @foreach ($answers as $ans)
    <div class="answer">
        <p>{{ $ans->content }}</p>
        <p>{{ $ans->full_name }} | Answered {{ $ans->created_at }}</p>
        <hr>
    </div>
    @endforeach
</div>
@endsection