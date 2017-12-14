@extends('layouts.master')

@section('title')
    Edit this task
@endsection

        @if(count($errors) > 0)
        <ul>
        @foreach ($errors->all() as $error)
        <li id="errormessage">{{ $error }}</li>
        @endforeach
        </ul>
        @endif

@section('content')

    <form method='POST' action='/tasks/{{ $task->id }}'>
        
    {{ method_field('put') }}
    {{ csrf_field() }}
        
        <h2>Modify task:</h2>
        <textarea name='user_task' id='user_task' value='{{ old('user_task', $task->user_task) }}' rows="6" cols="70">{{ $task->user_task }}</textarea><br>
        
            @foreach ($tagsForCheckboxes as $id => $name)
                <input
                type='checkbox'
                value='{{ $id }}'
                name='tags[]'
                {{ (isset($tagsForThisTask) and in_array($name, $tagsForThisTask)) ? 'CHECKED' : '' }}
                >
                {{ $name }} <br>
            @endforeach
        
            <h2>Is this task complete?</h2>
        
            <input type="radio" name="complete" value="0" checked>Incomplete<br>
            <input type="radio" name="complete" value="1">Complete<br><br>
          
        <input id="submit" type="submit" value="Save Changes">
    </form>

    <p><a href='/tasks/{{ $task->id }}'><-Back</a></p>


@endsection