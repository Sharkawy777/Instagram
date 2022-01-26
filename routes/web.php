<?php

use App\Http\Controllers\postController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

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

Route::post('comment/{id}', [userController::class, 'comment']);

Route::resource('Post',postController::class);

// /Post         (GET)            ==  Route::get('Post',[PostController::class,'index']);
// /Post/create  (GET)            ==  Route::get('Post/create',[PostController::class,'create']);
// /Post         (post)           ==  Route::post('Post',[PostController::class,'store']);
// /Post/{id}    (GET)            ==  Route::get('Post/{id}',[PostController::class,'show']);
// /Post/{id}/edit    (GET)       ==  Route::get('Post/{id}/edit',[PostController::class,'edit']);
// /Post/{id}    (put)            ==  Route::put('Post/{id}',[PostController::class,'update']);
// /Post/{id}    (delete)         ==  Route::delete('Post/{id}',[PostController::class,'destory']);


