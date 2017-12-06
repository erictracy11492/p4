@extends('layouts.master')

@section('title')
    Add new task
@endsection

@section('content')

    <form method='POST' action='/'>
    {{ csrf_field() }}
        
        <h2>Add task here:</h2>
        <textarea name='user_task' id='user_task' rows="6" cols="70"></textarea><br>
          
        <input id="submit" type="submit" value="Add Task">
    </form>


@endsection