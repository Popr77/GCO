<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/unregistered', [App\Http\Controllers\HomeController::class, 'unregistered']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/registered', [App\Http\Controllers\HomeController::class, 'registered']);
Route::get('/lesson', [App\Http\Controllers\LessonController::class,'index']);



Route::prefix('/lessons')->group(function(){
    Route::get('', [App\Http\Controllers\LessonController::class, 'showAll']);
    Route::get('create', [App\Http\Controllers\LessonController::class,'create']);
    Route::post('', [App\Http\Controllers\LessonController::class,'store']);
    Route::get('{lesson}/edit', [App\Http\Controllers\LessonController::class,'edit']);
    Route::put('{lesson}', [App\Http\Controllers\LessonController::class,'update']);
    Route::delete('{lesson}', [App\Http\Controllers\LessonController::class,'destroy']);
    Route::get('{lesson}', [App\Http\Controllers\LessonController::class,'show']);
});
