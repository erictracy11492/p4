@extends('layouts.master')

@section('title')
    Show task
@endsection

@section('content')


    <h2>{{ $task->user_task }}</h2>
    <p><a href='/tasks/{{ $task['id'] }}/edit'>Edit Task</a></p>



@endsection