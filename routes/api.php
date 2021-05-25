<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/recommended', [CourseController::class, 'recommended']);
Route::get('/courses/user-courses', [CourseController::class, 'userCourses']);

Route::get('/categories', [CategoryController::class, 'index']);
