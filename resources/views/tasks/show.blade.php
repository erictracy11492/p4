@extends('layouts.master')

@section('title')
    Show task
@endsection

@section('content')


    <h2 id="showtitle">{{ $task->user_task }}</h2>

    <div id="showtext">
    <p><a href='/tasks/{{ $task['id'] }}/edit'>Edit Task</a></p>
    <p><a href='/tasks/{{ $task->id }}/delete'>Delete</a></p>
    <p><a href='/tasks'><-Back</a></p>
    </div>



@endsection