<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TasksRepository extends Controller
{
    public function saveTask(Request $request)
    {
        $request->validate([
            'title' => 'required|bail|min:3',
            'priority' => 'required'
        ]);

        $task = new Task;
        $task->title = $request->title;
        $task->priority = $request->priority;
        $task->user_id = Auth::id();

        $task->save();

    }

    public function updateTask(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|bail|min:3',
            'priority' => 'required'
        ]);
        
        $task->update([
            'title' => $request->title,
            'priority' => $request->priority,
        ]);
    }

    public function completeTask(Task $task)
    {
        if ($task->done === 0) {
            DB::table('tasks')
            ->where('id','=',$task->id)
            ->update(['done' => true]);
        } else {
            DB::table('tasks')
            ->where('id','=',$task->id)
            ->update(['done' => false]);
        }

    }

    public function getTasksFromUser($user)
    {
        $tasks = DB::table('tasks')
        ->where('user_id','=',$user->id)
        ->orderBy('priority','asc')
        ->get();
        
    
        return $tasks;
    }


}
