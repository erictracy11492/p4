@extends('layouts.master')

@section('content')
    <h1>Tasks:</h1>

    @foreach($tasks as $task)
        <div>
            <h3>{{ $task['user_task'] }}</h3>
            <p>View (will be link)</p>
            <p>Edit (will be link)</p>
            <p>Delete (will be link)</p>
        </div>
    @endforeach

@endsection