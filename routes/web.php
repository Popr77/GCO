<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\Dashboard\CourseController as DCourseController;
use Illuminate\Support\Facades\Request;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/unregistered', [App\Http\Controllers\HomeController::class, 'unregistered']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/registered', [App\Http\Controllers\HomeController::class, 'registered']);


Route::get('/lesson', [App\Http\Controllers\LessonController::class,'lesson']);




Route::prefix('/lessons')->group(function(){
    Route::get('', [App\Http\Controllers\LessonController::class, 'index']);
    Route::get('create', [App\Http\Controllers\LessonController::class,'create']);
    Route::post('', [App\Http\Controllers\LessonController::class,'store']);
    Route::get('{lesson}/edit', [App\Http\Controllers\LessonController::class,'edit']);
    Route::put('{lesson}', [App\Http\Controllers\LessonController::class,'update']);
    Route::delete('{lesson}', [App\Http\Controllers\LessonController::class,'destroy']);
    Route::get('{lesson}', [App\Http\Controllers\LessonController::class,'show']);
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

// Admin Dashboard Routes
Route::prefix('dashboard')->middleware(['auth', 'admin'])->group(function () {
    Route::view('/', 'pages.admin.dashboard');
    Route::prefix('courses')->group(function () {
        Route::get('/', [DCourseController::class, 'index'])->name('d-course-index');
        Route::view('/create', 'pages.admin.courses.course-create')->name('d-course-create');
        Route::post('/', [DCourseController::class, 'store'])->name('d-course-store');
    });
});

