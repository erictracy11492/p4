@extends('layouts.master')

@section('content')
    <h1>Tasks:</h1>

    @foreach($newTasks as $newTask)
        <div>
            <h3>{{ $newTask['user_task'] }}</h3>
            <p>View (will be link *above* to edit page where can view and delete)</p>
        </div>
    @endforeach

@endsection