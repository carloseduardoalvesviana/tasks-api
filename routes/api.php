<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Route;

Route::post("/login", [AuthController::class, 'login']);
Route::post("/register", [AuthController::class, 'register']);

Route::post('/tasks', [TaskController::class, 'store'])->middleware(['auth:sanctum']);
Route::get('/tasks', [TaskController::class, 'index'])->middleware(['auth:sanctum']);
Route::get('/tasks/{id}', [TaskController::class, 'show'])->middleware(['auth:sanctum']);
Route::put('/tasks/{id}', [TaskController::class, 'update'])->middleware(['auth:sanctum']);
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->middleware(['auth:sanctum']);
