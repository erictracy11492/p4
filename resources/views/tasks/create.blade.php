@extends('layouts.master')

@section('title')
    Add new task
@endsection

        @if(count($errors) > 0)
        <ul>
        @foreach ($errors->all() as $error)
        <li id="errormessage">{{ $error }}</li>
        @endforeach
        </ul>
        @endif

@section('content')

    <form method='POST' action='/tasks'>
    {{ csrf_field() }}
        
        <h2>Add task here:</h2>
        <textarea name='user_task' id='user_task' rows="6" cols="70"></textarea><br>
          
        <input id="submit" type="submit" value="Add Task">
    </form>

    <p><a href='/tasks'><-Back</a></p>


@endsection