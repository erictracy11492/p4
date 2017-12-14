@extends('layouts.master')

@section('content')
    <h1 id="indexheader">Tasks:</h1>

    <h2 id="instructions">Tasks are listed below. Click on each task to edit or delete. Create new task with 'Add New Task' above.</h2><br>

    @foreach($newTasks as $newTask)
        <div>
            @if( $newTask['complete'] == false )
            <h3 id='tasktext'><a href='/tasks/{{ $newTask['id'] }}'>{{ $newTask['user_task'] }}</a></h3>
            @else
            <h3 id='tasktextcomplete'><a href='/tasks/{{ $newTask['id'] }}'>{{ $newTask['user_task'] }}</a></h3>
            @endif
        </div>
    @endforeach

@endsection