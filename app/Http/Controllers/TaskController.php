<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    protected TasksRepository $repository;

    public function __construct()
    {
        $this->repository = new TasksRepository;
    }

    public function index()
    {
        $user = Auth::user();

        $tasks = $this->repository->getTasksFromUser($user);

        return inertia('App',
        compact('tasks','user'));
    }

    public function create()
    {
        $user = Auth::user();

        $tasks = $this->repository->getTasksFromUser($user);

        return inertia('CRUD/CreateTask',
        compact('tasks','user'));
    }

    public function store(Request $request)
    {

        $this->repository->saveTask($request);

        return back();

    }

    public function show(Task $task)
    {
        $user = Auth::user();

        $tasks = $this->repository->getTasksFromUser($user);

        return inertia('CRUD/EditTask',
        compact('task','tasks','user'));
    }

    public function edit(Request $request, Task $task)
    {
        $this->repository->updateTask($request, $task);

        return back();
    }

    public function completeTask(Task $task)
    {
        $this->repository->completeTask($task);
        
        return back();
    }
    public function destroy(string $id)
    {
        Task::destroy($id);

        return redirect('/');
    }
}
