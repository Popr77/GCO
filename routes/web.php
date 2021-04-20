<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

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




Auth::routes();

Route::view('/dashboard', 'pages.admin.dashboard');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/unregistered', [App\Http\Controllers\HomeController::class, 'unregistered']);
Route::get('/lesson', [App\Http\Controllers\HomeController::class, 'lesson']);
Route::get('/lessons', [App\Http\Controllers\HomeController::class, 'lesson']);


Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/registered', [App\Http\Controllers\HomeController::class, 'registered']);
Route::get('/lesson', [App\Http\Controllers\HomeController::class, 'lesson']);

Route::get('/lessons', [App\Http\Controllers\HomeController::class, 'lesson']);
Route::get('/categories', [App\Http\Controllers\HomeController::class, 'categories']);

Route::prefix('/lesson')->group(function(){
    Route::get('', [App\Http\Controllers\LessonController::class, 'index']);
    Route::get('create', [App\Http\Controllers\LessonController::class,'create']);
    Route::post('', [App\Http\Controllers\LessonController::class,'store']);
    Route::get('{project}/edit', 'LessonController@edit');
    Route::put('{project}', 'LessonController@update');
    Route::delete('{project}', 'LessonController@destroy');
    Route::get('{project}', 'LessonController@show');
});

Route::prefix('/courses')->group(function(){
    Route::get('', [CourseController::class, 'index']);
    Route::post('', [CourseController::class, 'store']);
    Route::get('create', [CourseController::class, 'create']);
    Route::get('{course}', [CourseController::class, 'show']);
    Route::get('{course}/edit', [CourseController::class, 'edit']);
    Route::put('{course}', [CourseController::class, 'update']);
    Route::delete('{course}', [CourseController::class, 'destroy']);
});
