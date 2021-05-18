<?php


namespace App\Http\Controllers\Api;

use App\Http\Resources\CourseResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;

class CourseController extends Controller {

    public function index(Request $request) {
        $search = $request->query('search');

        return CourseResource::collection(Course::with('subsubcategory')
            ->join('sub_sub_categories', 'courses.sub_sub_category_id', '=', 'sub_sub_categories.id')
            ->join('sub_categories', 'sub_sub_categories.sub_category_id', '=', 'sub_categories.id')
            ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
            ->where('sub_sub_categories.name', 'ILIKE', "%{$search}%")
            ->orWhere('sub_categories.name', 'ILIKE', "%{$search}%")
            ->orWhere('categories.name', 'ILIKE', "%{$search}%")
            ->orWhere('courses.name', 'ILIKE', "%{$search}%")
            ->orderBy('courses.created_at', 'desc')
            ->paginate(12, 'courses.*'));
    }

    public function recommended() {

        return CourseResource::collection(Course::withCount(['students' => function ($query) {
            $query->where('payment_status', 1);
        }])->orderBy('students_count', 'desc')->take(9)->get());
    }
}
