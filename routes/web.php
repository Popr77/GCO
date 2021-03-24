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
Route::get('/lesson', [App\Http\Controllers\HomeController::class, 'lesson']);
//Route::get('/lessons', [App\Http\Controllers\HomeController::class, 'lesson']);

Route::prefix('/lesson')->group(function(){
    Route::get('', 'LessonController@index');
    Route::get('create', 'LessonController@create');
    Route::post('', 'LessonController@store');
    Route::get('{project}/edit', 'LessonController@edit');
    Route::put('{project}', 'LessonController@update');
    Route::delete('{project}', 'LessonController@destroy');
    Route::get('{project}', 'LessonController@show');
});
