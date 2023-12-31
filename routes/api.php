<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TodolistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });f

/// Api Resource 
Route::apiResource('todo-list', TodolistController::class);

Route::get('tasks', [TaskController::class, "index"])
    ->name("tasks.index");

Route::post('tasks', [TaskController::class, 'store'])
    ->name('tasks.store');

Route::delete('tasks/{task}', [TaskController::class, 'destroy'])
    ->name("tasks.destroy");
