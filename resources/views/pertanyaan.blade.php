@extends('layouts.app')

@section('title', 'Questions List')

@section('content')
<div class="container">
    <h1>List Pertanyaan</h1>
    <hr>
    <table class="table table-hover table-striped text-center">
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Questioner</th>
            <th scope="col">Last Update</th>
            <th scope="col">Solved</th>
        </tr>
        @foreach ($questions as $q)
        <tr>
            <td scope="row"><a href="/pertanyaan/{{ $q->id }}">{{ $q->title }}</a></td>
            <td>{{ $q->user->name }}</td>
            <td>{{ $q->updated_at }}</td>
            @if ($q->correct_answer_id != NULL)
            <td>&#10004</td>
            @else
            <td>&#10005</td>
            @endif
        </tr>
        @endforeach
    </table>
    <a href="/pertanyaan/create" class="btn btn-primary">Create new question</a>
</div>
@endsection