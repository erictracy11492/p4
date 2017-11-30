<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompletedTasks;

class TaskManagerController extends Controller
{
    //
    
    public function index() 
    {
        $tasks = CompletedTasks::orderBy('completed_task')->get();

        # Get from collection
        $newTasks = $tasks->sortByDesc('created_at')->take(3);
        
        return view('tasks.index')->with([
            'tasks' => $tasks,
            'newTasks' => $newTasks,
        ]);

    }
    
    public function create(Request $request) 
    {
        return view('tasks.create');
    }
    
    public function store(Request $request) {

    # Validate the request data
    $this->validate($request, [
        'completed_task' => 'required',
    ]);

    # Validation failure stuff will go here

    # Added task - will change database table to 'Tasks' rather than 'CompletedTasks'
    $task = new CompletedTasks();
    $task->completed_task = $request->input('completed_task');
    $task->save();
    dump($book->toArray());

    return redirect('/')->with('alert', 'Task added.');
}
}
