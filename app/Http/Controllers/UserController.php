<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected TasksRepository $repository;

    public function __construct()
    {
        $this->repository = new TasksRepository;
    }

    function create()
    {
        return inertia('Auth/Register');
    }

    function store (Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|min:10',
            'password' => 'required|min:6'
        ]);

        $user = User::create($request->only('name','email','password'));

        $this->repository->createDefaultLists($user);

        Auth::login($user);

        return to_route('tarefas.index');
    }
}
