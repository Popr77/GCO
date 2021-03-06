<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SubSubCategoryController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\Dashboard\CourseController as DCourseController;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\UserProgressController;
use \App\Http\Controllers\UserPurchaseController;
use App\Http\Controllers\ExamGradeController;

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

Route::get('/home', [HomeController::class, 'registered'])
    ->middleware('auth')
    ->name('home');

Route::get('/', [HomeController::class, 'index']);

Route::prefix('/categories')->group(function(){
    Route::get('', [CategoryController::class, 'index']);
    Route::get('{category}/subcategories', [CategoryController::class, 'subcategories']);
});

Route::prefix('/subcategories')->group(function(){
    Route::get('', [SubCategoryController::class, 'index']);
    Route::get('{subcategory}/subsubcategories', [SubCategoryController::class, 'subsubcategories']);
});

Route::prefix('/subsubcategories')->group(function(){
    Route::get('', [SubSubCategoryController::class, 'index']);
});

Route::prefix('/lessons')->middleware(['auth'])->group(function(){
    Route::get('{lesson}', [App\Http\Controllers\LessonController::class,'show'])
        ->middleware(['checkCourse', 'IsCourseActive'])->name('lesson');
});

Route::prefix('/courses')->group(function(){
    Route::get('', [CourseController::class, 'index']);
    Route::get('{course}', [CourseController::class, 'show'])->middleware('IsCourseActive');
    Route::put('{course}/givefeedback', [EnrollmentController::class, 'giveFeedback'])
        ->middleware(['checkCourse', 'canGiveFeedback'])
        ->name('post-feedback');
});

// Admin Dashboard Routes
Route::prefix('dashboard')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [HomeController::class, 'dashboard'])->name('d-index');
    Route::prefix('/courses')->group(function () {
        Route::get('/', [DCourseController::class, 'index'])->name('d-course-index');
        Route::view('/create', 'pages.admin.courses.course-create')->name('d-course-create');
        Route::get('/{course}/edit', [DCourseController::class, 'edit']);
        Route::get('/{course}/restore', [DCourseController::class, 'restore']);
        Route::post('/', [DCourseController::class, 'store'])->name('d-course-store');
        Route::put('/{course}', [DCourseController::class, 'update'])->name('d-course-update');
        Route::delete('/{course}', [DCourseController::class, 'destroy'])->name('d-course-destroy');
    });

    Route::prefix('/categories')->group(function () {
        Route::post('', [CategoryController::class, 'store']);
        Route::get('create', [CategoryController::class, 'create']);
        Route::get('{category}', [CategoryController::class, 'show']);
        Route::get('{category}/edit', [CategoryController::class, 'edit']);
        Route::put('{category}', [CategoryController::class, 'update']);
        Route::delete('{category}', [CategoryController::class, 'destroy']);
    });
    Route::prefix('/subcategories')->group(function () {
        Route::post('', [SubCategoryController::class, 'store']);
        Route::get('create', [SubCategoryController::class, 'create']);
        Route::get('{subcategory}', [SubCategoryController::class, 'show']);
        Route::get('{subcategory}/edit', [SubCategoryController::class, 'edit']);
        Route::put('{subcategory}', [SubCategoryController::class, 'update']);
        Route::delete('{subcategory}', [SubCategoryController::class, 'destroy']);
    });
    Route::prefix('/subsubcategories')->group(function() {
        Route::post('', [SubSubCategoryController::class, 'store']);
        Route::get('create', [SubSubCategoryController::class, 'create']);
        Route::get('{subsubcategory}', [SubSubCategoryController::class, 'show']);
        Route::get('{subsubcategory}/edit', [SubSubCategoryController::class, 'edit']);
        Route::put('{subsubcategory}', [SubSubCategoryController::class, 'update']);
        Route::delete('{subsubcategory}', [SubSubCategoryController::class, 'destroy']);
    });

    Route::prefix('/lessons')->group(function () {
        Route::get('', [App\Http\Controllers\LessonController::class, 'index'])->name('d-lessons');
        Route::get('/create', [App\Http\Controllers\LessonController::class, 'create'])->name('d-lesson-create');
        Route::post('', [App\Http\Controllers\LessonController::class, 'store']);
        Route::get('{lesson}/edit', [App\Http\Controllers\LessonController::class, 'edit']);
        Route::put('{lesson}', [App\Http\Controllers\LessonController::class, 'update']);
        Route::delete('{lesson}', [App\Http\Controllers\LessonController::class, 'destroy'])->name('d-lesson-destroy');
    });
    Route::prefix('/modules')->group(function () {
        Route::get('', [App\Http\Controllers\ModuleController::class, 'index'])->name('d-module');
        Route::get('{course}/one', [App\Http\Controllers\ModuleController::class, 'indexOne'])->name('d-module-one');
        Route::get('create', [App\Http\Controllers\ModuleController::class, 'create'])->name('d-module-create');
        Route::get('{course}/create', [App\Http\Controllers\ModuleController::class, 'create']);
        Route::get('{module}', [App\Http\Controllers\ModuleController::class, 'show']);
        Route::post('', [App\Http\Controllers\ModuleController::class, 'store']);
        Route::get('{module}/edit', [App\Http\Controllers\ModuleController::class, 'edit']);
        Route::put('{module}', [App\Http\Controllers\ModuleController::class, 'update']);
        Route::delete('{module}', [App\Http\Controllers\ModuleController::class, 'destroy']);
    });

    Route::prefix('/quiz')->group(function () {
        Route::post('/', [QuestionController::class, 'store'])->name('quiz-save');
        Route::get('/{lesson}/edit', [QuestionController::class, 'edit'])->name('quiz-edit');
        Route::put('/{lesson}', [QuestionController::class, 'update'])->name('quiz-update');
    });

    Route::put('/feedbackapproval', [EnrollmentController::class, 'feedbackApproval'])->name('feedbackApproval');
});

Route::prefix('/profile')->middleware(['auth', 'checkProfile'])->group(function () {
    Route::get('{userData}/edit', [UserDataController::class, 'edit']);
    Route::put('{userData}', [UserDataController::class, 'update']);
});

Route::get('change-password', [ChangePasswordController::class, 'index']);
Route::post('change-password', [ChangePasswordController::class, 'store'])->name('change.password');


Route::prefix('/quiz')->middleware(['auth', 'checkCourse', 'IsCourseActive'])->group(function () {
    Route::get('/take/{lesson}', [QuestionController::class, 'index'])
        ->middleware('checkHasDoneQuiz')->name('quiz');
    Route::post('/take/{lesson}', [QuestionController::class, 'save']);
});

Route::prefix('checkout')->middleware('auth')->group(function () {
    Route::get('', [EnrollmentController::class, 'create']);
    Route::post('/submit', [EnrollmentController::class, 'store']);
    Route::view('/confirmation', 'pages.checkout.confirmation')->name('checkout-confirmation');
});

Route::prefix('')->middleware('auth')->group(function () {
    Route::get('progress', [UserProgressController::class, 'index']);
    Route::get('purchases', [UserPurchaseController::class, 'index']);
    Route::view('help', 'pages.user-help');
});

Route::prefix('finalExam')->middleware(['auth', 'checkCourse', 'IsCourseActive'])->group(function () {
    Route::get('{course}', [ExamGradeController::class, 'index'])
            ->middleware(['checkCourse', 'IsCourseActive','checkHasDoneAllQuizzes'])
            ->name('finalExam');
    Route::post('{course}', [ExamGradeController::class, 'store'])
            ->middleware(['checkCourse', 'IsCourseActive','checkHasDoneAllQuizzes'])
            ->name('finalExam-result');
});




