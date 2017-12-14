<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserTask;
use App\Tag;

class TaskManagerController extends Controller
{
    //
    
    public function index() 
    {
        $tasks = UserTask::orderBy('user_task')->get();

        # Get from collection
        $newTasks = $tasks->sortByDesc('created_at');
        
        return view('tasks.index')->with([
            'tasks' => $tasks,
            'newTasks' => $newTasks,
        ]);

    }
    
    public function show($id)
    {
        $task = UserTask::find($id);
        if (!$task) {
            return redirect('/tasks')->with('alert', 'Task not found');
        }
        return view('tasks.show')->with([
            'task' => $task,
        ]);
    }
    
    public function create(Request $request) 
    {
        $tagsForCheckboxes = Tag::getForCheckboxes();
        
        return view('tasks.create')->with([
            'tagsForCheckboxes' => $tagsForCheckboxes,
        ]);
    }
    
    public function store(Request $request) 
    {

    # Validate the request data
        $this->validate($request, [
            'user_task' => 'required',
        ]);

    # Added task
        $task = new UserTask();
        $task->user_task = $request->input('user_task');
        #define tag, request tag input, sync tag to task;
        $task->save();

        return redirect('/tasks')->with('alert', 'Task added.');
    }
    
    public function edit($id) 
    {
        $task = UserTask::find($id);
        
        $tagsForCheckboxes = Tag::getForCheckboxes();
        
        $tagsForThisTask = [];
        foreach ($task->tags as $tag) {
            $tagsForThisTask[] = $tag->name;
        }
        
        if (!$task) {
        return redirect('/tasks')->with('alert', 'Task not found.');
        }
        
        if (isset($request->complete)) {
        return redirect('/tasks')->with('complete_task');
        }
        
        return view('tasks.edit')->with([
            'task' => $task,
            'tagsForCheckboxes' => $tagsForCheckboxes,
            'tagsForThisTask' => $tagsForThisTask,
        ]);
    }
    
    public function update(Request $request, $id) 
    {
    # Validate the request data
        $this->validate($request, [
            'user_task' => 'required',
        ]);      
        
        $task = UserTask::find($id);
        
        $task->tags()->sync($request->input('tags'));
        
        $task->user_task = $request->input('user_task');
        $task->complete = $request->input('complete');
        
        $task->save();
        
        return redirect('/tasks')->with('alert', 'Your changes were saved.');
    }
    
    public function delete($id)
    {
        $task = UserTask::find($id);
        
        if (!$task) {
        return redirect('/tasks')->with('alert', 'Task not found.');
        }
        
        $task->tags()->detach();
        
        return view('tasks.delete')->with(['task' => $task]);
    }
    
    public function destroy(Request $request, $id)
    {
        $task = UserTask::find($id)->delete();
        return redirect('/tasks')->with('alert', 'Task removed.');
    }
}
