@extends('layouts.master')

@section('title')
    Delete task: {{ $task->title }}
@endsection

@section('content')

    <h1>{{ $task->user_task }}</h1>

    <p>Are you sure you want to delete this task?</p>

    <form method='POST' action='/tasks/{{ $task->id }}'>
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <input type='submit' value='Remove'>
    </form>

    <p><a href='/tasks/{{ $task->id }}'><-Back</a></p>

@endsection