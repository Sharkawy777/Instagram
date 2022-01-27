<?php

use App\Http\Controllers\postController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\commentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [userController::class, 'index']);
Route::get('home', [userController::class, 'index']);

Route::get('signup', [userController::class, 'create']);
Route::post('register', [userController::class, 'store']);

Route::get('login', [userController::class, 'login']);
Route::post('DoLogin', [userController::class, 'doLogin']);

Route::get('/edit/{id}', [userController::class, 'edit']);
Route::post('update', [userController::class, 'update']);

Route::get('logout', [userController::class, 'logout']);

Route::get('Destroy/{id}', [userController::class, 'destroy']);

Route::get('follow/{id}', [userController::class, 'follow']);
Route::get('unfollow/{id}', [userController::class, 'unfollow']);


Route::post('comment/{id}', [commentController::class, 'store']);
Route::post('comment/{id}/remove', [commentController::class, 'destroy']);

Route::resource('Post',postController::class);
