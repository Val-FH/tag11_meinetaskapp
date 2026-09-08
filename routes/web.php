<?php

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function() {
//     return view('welcome');
// });
Route::view('/', 'welcome')->name('welcome'); // Kurzschreibform

//Tasks
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('tasks/create', [TaskController::class, 'create']);
Route::post('tasks/create', [TaskController::class, 'store']);
Route::get('/tasks/{task}', [TaskController::class,'show']); // name mit variabler??
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit']);
Route::put('/tasks/{task}', [TaskController::class, 'update']);
Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);


//Registrierung
Route::get('auth.register', [RegistrationController::class, 'index']);
Route::get('/register', [RegistrationController::class, 'create'])->name('register');
Route::post('/register', [RegistrationController::class, 'store']);
Route::get('/register/{registration}', [RegistrationController::class, 'show']);
Route::get('/register/{registration}/edit', [RegistrationController::class, 'edit']);
Route::put('/register/{registration}', [RegistrationController::class, 'update']);
Route::delete('/register/{registration}', [RegistrationController::class, 'destroy']);

//Session
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');