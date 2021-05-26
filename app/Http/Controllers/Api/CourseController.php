<?php


namespace App\Http\Controllers\Api;

use App\Http\Resources\CourseResource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;

class CourseController extends Controller {

    public function index(Request $request)
    {
        $search = $request->query('search');

        return CourseResource::collection(Course::withTrashed()
            ->with('subsubcategory')
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

    public function recommended(Request $request)
    {

        $num = $request->query('num');
        $userid = $request->query('userid');

        if ($userid)
        {
            return CourseResource::collection(Course::
            withCount(['students' => function ($query) {
                $query->where('payment_status', 1);
            }])
                ->whereNotIn('id', function ($query) use ($userid) {

                    $query->select('course_id')
                        ->from('enrollments')
                        ->join('courses', 'courses.id', '=', 'enrollments.course_id')
                        ->whereRaw("user_id = ? AND enrollments.created_at >= now() - (courses.duration || ' DAY')::INTERVAL", [$userid]);
                })
                ->where('status', 1)
                ->orderBy('students_count', 'desc')
                ->take($num)
                ->get('courses.*'));
        }

        return CourseResource::collection(Course::withCount(['students' => function ($query) {
            $query->where('payment_status', 1);
        }])
            ->where('status', 1)
            ->orderBy('students_count', 'desc')
            ->take($num)
            ->get('courses.*'));
    }

    public function userCourses(Request $request) {

        $userid = $request->query('userid');

        return CourseResource::collection(Course::join('enrollments', 'enrollments.course_id', '=', 'courses.id' )
            ->where('user_id', $userid)
            ->whereRaw("enrollments.created_at >= now() - (courses.duration || ' DAY')::INTERVAL")
            ->get('courses.*'));
    }
}
