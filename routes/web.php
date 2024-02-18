<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function() {
  return view('welcome');
});


Route::controller(AdminController::class)->prefix('admin')->group(function() {
  Route::get('search', 'search');
  Route::get('deep', 'deepRelationships');
});

Route::resource('user', UserController::class);
Route::resource('post', PostController::class);
Route::resource('comment', CommentController::class);
