<?php

use App\Http\Controllers\LoginController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect('/tarefas');
    });
    
    Route::get('/tarefas',[TaskController::class,'index'])
    ->name('tarefas.index');
    Route::post('/tarefas/criar',[TaskController::class,'store'])
    ->name('tarefas.store');
});

Route::get('/login',[LoginController::class,'create'])
->name('login');
Route::post('/login',[LoginController::class,'store'])
->name('login.post');

Route::get('/registrar',[UserController::class,'create'])
->name('register'); 
Route::post('/registrar',[UserController::class,'store'])
->name('register.post');   

Route::post('/logout',[LoginController::class,'destroy'])
->name('logout');