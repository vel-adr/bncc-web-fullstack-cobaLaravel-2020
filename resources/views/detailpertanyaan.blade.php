@php
$url = '/pertanyaan'.'/'.$question->id;
@endphp

@extends('layouts.app')
@section('title')
{{ $question->title }}
@endsection

@section('content')
<div class="container">
    <h3>{{ $question->title }}</h3>
    <hr>
    <p>{{ $question->content }}</p>
    <p>Asked by {{ $question->user->name }} at {{ $question->created_at }} | <a
            href="/pertanyaan/{{ $question->id }}/edit">Edit question</a></p>
    <form action="{{ url($url) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-outline-danger">Delete question</button>
    </form><br>

    <p>Tags:
        @if (count($question->tags) > 0)
        @foreach ($question->tags as $t)
        <span class="badge bg-primary">{{ $t->tag_name }}</span>
        @endforeach
        @else
        -
        @endif
    </p>

    <hr>
    <h6>{{ count($answers) }} Answers</h6>
    <hr>

    @if ($correctAnswer != null)
    <div class="answer">
        <table class="col-6 table table-secondary table-borderless align-middle">
            <tr>
                <td rowspan="2" class="text-center">&#10004</td>
                <td>{{ $correctAnswer->content }}</td>
            </tr>
            <tr>
                <td>{{ $correctAnswer->user->full_name }} | Answered {{ $correctAnswer->created_at }}</td>
            </tr>
        </table>
    </div>
    <hr>
    @endif

    @foreach ($answers as $ans)
    @if ($ans->id != $question->correct_answer_id)
    <div class="answer">
        <p>{{ $ans->content }}</p>
        <p>{{ $ans->user->full_name }} | Answered {{ $ans->created_at }}</p>
        <hr>
    </div>
    @endif
    @endforeach
</div>
@endsection