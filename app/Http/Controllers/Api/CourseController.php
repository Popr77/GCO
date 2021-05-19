<?php


namespace App\Http\Controllers\Api;

use App\Http\Resources\CourseResource;
use Illuminate\Database\Eloquent\Builder;
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

    public function recommended(Request $request) {

        $num = $request->query('num');
        $userId = $request->query('userid');

        if ($userId) {
            return CourseResource::collection(Course::withCount(['students' => function ($query) {
                $query->where('payment_status', 1);
            }])->whereDoesntHave('students', function (Builder $query) use ($userId) {
                $query->where('user_id', 'LIKE', $userId);
            })
                ->orderBy('students_count', 'desc')->take($num)->get('courses.*'));
        }

        return CourseResource::collection(Course::withCount(['students' => function ($query) {
            $query->where('payment_status', 1);
        }])->orderBy('students_count', 'desc')->take($num)->get('courses.*'));
    }
}
