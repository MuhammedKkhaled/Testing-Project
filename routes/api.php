<?php

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
// });

Route::get("todo-list", [TodolistController::class, 'index'])
                ->name('todo-list.index');

Route::get("todo-list/{todolist}", [TodolistController::class, 'show'])
                ->name('todo-list.show');

Route::post("todo-list", [TodolistController::class, 'store'])
                ->name('todo-list.store');