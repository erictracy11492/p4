<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserTasks;

class TaskManagerController extends Controller
{
    //
    
    public function index() 
    {
        $tasks = UserTasks::orderBy('user_task')->get();

        # Get from collection
        $newTasks = $tasks->sortByDesc('created_at');
        
        return view('tasks.index')->with([
            'tasks' => $tasks,
            'newTasks' => $newTasks,
        ]);

    }
    
    public function show($id)
    {
        $task = UserTasks::find($id);
        if (!$task) {
            return redirect('/tasks')->with('alert', 'Task not found');
        }
        return view('tasks.show')->with([
            'task' => $task,
        ]);
    }
    
    public function create(Request $request) 
    {
        return view('tasks.create');
    }
    
    public function store(Request $request) {

    # Validate the request data
        $this->validate($request, [
            'user_task' => 'required',
        ]);

    # Validation failure stuff will go here

    # Added task - will change database table to 'Tasks' rather than 'CompletedTasks'
        $task = new UserTasks();
        $task->user_task = $request->input('user_task');
        $task->save();
        dump($task->toArray());

        return redirect('/tasks')->with('alert', 'Task added.');
    }
    
    public function edit($id) {
        $task = UserTasks::find($id);
        
        if (!$task) {
        return redirect('/tasks')->with('alert', 'Task not found.');
        }
        
        return view('tasks.edit')->with([
            'task' => $task,
        ]);
    }
    
    public function update(Request $request, $id) {
    # Validate the request data
        $this->validate($request, [
            'user_task' => 'required',
        ]);      
        
        $task = UserTasks::find($id);
        
        $task->user_task = $request->input('user_task');
        
        $task->save();
        
        return redirect('/tasks')->with('alert', 'Your changes were saved.');
    }
}
