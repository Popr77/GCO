<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SubSubCategoryController;

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
Route::get('/lesson', [App\Http\Controllers\HomeController::class, 'lesson']);
Route::get('/lessons', [App\Http\Controllers\HomeController::class, 'lesson']);


Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/registered', [App\Http\Controllers\HomeController::class, 'registered']);
Route::get('/lesson', [App\Http\Controllers\HomeController::class, 'lesson']);

Route::get('/lessons', [App\Http\Controllers\HomeController::class, 'lesson']);


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

Route::prefix('/categories')->group(function(){
    Route::get('', [CategoryController::class, 'index']);
    Route::post('', [CategoryController::class, 'store']);
    Route::get('create', [CategoryController::class, 'create']);
    Route::get('{category}', [CategoryController::class, 'show']);
    Route::get('{category}/edit', [CategoryController::class, 'edit']);
    Route::put('{category}', [CategoryController::class, 'update']);
    Route::delete('{category}', [CategoryController::class, 'destroy']);
    Route::get('{category}/subcategories', [CategoryController::class, 'subcategories']);
});

Route::prefix('/subcategories')->group(function(){
    Route::get('', [SubCategoryController::class, 'index']);
    Route::post('', [SubCategoryController::class, 'store']);
    Route::get('create', [SubCategoryController::class, 'create']);
    Route::get('{subcategory}', [SubCategoryController::class, 'show']);
    Route::get('{subcategory}/edit', [SubCategoryController::class, 'edit']);
    Route::put('{subcategory}', [SubCategoryController::class, 'update']);
    Route::delete('{subcategory}', [SubCategoryController::class, 'destroy']);
    Route::get('{subcategory}/subsubcategories', [SubCategoryController::class, 'subsubcategories']);
});


Route::prefix('/subsubcategories')->group(function(){
    Route::get('', [SubSubCategoryController::class, 'index']);
    Route::post('', [SubSubCategoryController::class, 'store']);
    Route::get('create', [SubSubCategoryController::class, 'create']);
    Route::get('{subsubcategory}', [SubSubCategoryController::class, 'show']);
    Route::get('{subsubcategory}/edit', [SubSubCategoryController::class, 'edit']);
    Route::put('{subsubcategory}', [SubSubCategoryController::class, 'update']);
    Route::delete('{subsubcategory}', [SubSubCategoryController::class, 'destroy']);
});
