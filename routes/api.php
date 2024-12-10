<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TagsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Route::middleware("auth:sanctum")->group(function(){
//     Route::resource("/city", CityController::class);
// });
Route::get('/city/index', [CityController::class, 'index']);
Route::post('/city/create', [CityController::class, 'register']);
Route::put('/city/update/{id}', [CityController::class, 'update']);
Route::delete('/city/delete/{id}', [CityController::class, 'delete']);

Route::get('/post/index', [PostsController::class, 'index']);
Route::post('/post/create', [PostsController::class, 'register']);
Route::put('/post/update/{id}', [PostsController::class, 'update']);
Route::delete('/post/delete/{id}', [PostsController::class, 'delete']);

Route::get('/tags/index', [TagsController::class, 'index']);
Route::post('/tags/create', [TagsController::class, 'register']);
Route::put('/tags/update/{id}', [TagsController::class, 'update']);
Route::delete('/tags/delete/{id}', [TagsController::class, 'delete']);
