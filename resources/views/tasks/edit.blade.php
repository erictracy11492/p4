@extends('layouts.master')

@section('title')
    Edit this task
@endsection

@section('content')

    <form method='POST' action='/tasks/{{ $task->id }}'>
        
    {{ method_field('put') }}
    {{ csrf_field() }}
        
        <h2>Modify task:</h2>
        <textarea name='user_task' id='user_task' value='{{ old('user_task', $task->user_task) }}' rows="6" cols="70">{{ $task->user_task }}</textarea><br>
          
        <input id="submit" type="submit" value="Save Changes">
    </form>


@endsection