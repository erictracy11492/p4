@extends('layouts.master')

@section('content')
    <h1>Tasks:</h1>

    @foreach($newTasks as $newTask)
        <div>
            <h3 id='tasktext'><a href='/tasks/{{ $newTask['id'] }}'>{{ $newTask['user_task'] }}</a></h3>
        </div>
    @endforeach

@endsection