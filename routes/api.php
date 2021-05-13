<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\CourseResource;
use App\Http\Resources\CategoryResource;
use App\Models\Course;
use App\Models\Category;

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

Route::get('/courses', function (Request $request) {

    $search = $request->query('search');

    return CourseResource::collection(Course::with('subsubcategory')
        ->join('sub_sub_categories', 'courses.sub_sub_category_id', '=', 'sub_sub_categories.id')
        ->where('sub_sub_categories.name', 'LIKE', "%{$search}%")
        ->orWhere('courses.name', 'LIKE', "%{$search}%")
        ->orderBy('courses.created_at', 'desc')
        ->paginate(12, 'courses.*'));
});

Route::get('/categories', function () {
    return CategoryResource::collection(Category::all());
});
