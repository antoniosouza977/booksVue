<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\TaskList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TasksRepository extends Controller
{
    public function saveTask(Request $request)
    {
        $task = new Task;
        $task->title = $request->title;
        $task->priority = $request->priority;
        $task->list_id = $request->list;
        $task->user_id = Auth::id();

        $task->save();
    }

    public function getTasksFromUser($user)
    {
        $tasks = $user->tasks;
        
        return $tasks;
    }

    public function getListsFromUser($user)
    {
        $lists = $user->lists;

        return $lists;
    }

    public function createDefaultLists($user)
    {
        DB::table('lists')->insert([
            ['title' => 'Principal', 'user_id' => $user->id],
            ['title' => 'Trabalho', 'user_id' => $user->id],
            ['title' => 'Compras', 'user_id' => $user->id],
        ]);
    }
}
