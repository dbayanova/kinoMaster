<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('user/create', [MyUserController::class, 'create']);
Route::get('users', [MyUserController::class, 'list']);
Route::get('user/{id}', [MyUserController::class, 'item']);
Route::put('user/{id}', [MyUserController::class, 'update']);
Route::delete('user/{id}', [MyUserController::class, 'delete']);
Route::get('user', [MyUserController::class, 'login']);
Route::post('user', [MyUserController::class, 'register']);