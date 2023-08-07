<?php

use App\Http\Controllers\LoginController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

Route::middleware('auth')->group(function () {
    
    Route::get('/',[TaskController::class,'index'])
    ->name('tarefas.index');
    Route::get('/criar',[TaskController::class,'create'])
    ->name('tarefas.create');
    Route::post('/tarefas/criar',[TaskController::class,'store'])
    ->name('tarefas.store');
    Route::post('/tarefas/deletar/{id}',[TaskController::class,'destroy'])
    ->name('tarefas.destroy');
    Route::get('/editar/{task}',[TaskController::class,'show'])
    ->name('tarefas.show');
    Route::post('/tarefas/editar/{task}',[TaskController::class,'edit'])
    ->name('tarefas.edit');
    Route::post('/tarefas/completar/{task}',[TaskController::class,'completeTask'])
    ->name('tarefas.complete');
});

Route::get('/login',[LoginController::class,'create'])
->name('login');
Route::post('/login',[LoginController::class,'store'])
->name('login.post');

Route::get('/registrar',[UserController::class,'create'])
->name('register'); 
Route::post('/registrar',[UserController::class,'store'])
->name('register.post');  

Route::get('user',[UserController::class,'edit'])
->name('user.edit');

Route::post('/logout',[LoginController::class,'destroy'])
->name('logout');