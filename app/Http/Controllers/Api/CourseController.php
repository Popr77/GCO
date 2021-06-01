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
        $showdeleted = $request->query('showdeleted');

        if($showdeleted == 'false') {
            return CourseResource::collection(Course::with('subsubcategory')
                ->join('sub_sub_categories', 'courses.sub_sub_category_id', '=', 'sub_sub_categories.id')
                ->join('sub_categories', 'sub_sub_categories.sub_category_id', '=', 'sub_categories.id')
                ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
                ->where(function ($query) use ($search) {
                    $query->where('courses.name', 'ILIKE', "%{$search}%")
                        ->orWhere('sub_sub_categories.name', 'ILIKE', "%{$search}%")
                        ->orWhere('sub_categories.name', 'ILIKE', "%{$search}%")
                        ->orWhere('categories.name', 'ILIKE', "%{$search}%");
                })
                ->orderBy('courses.created_at')
                ->paginate(12, 'courses.*'));
        }

        return CourseResource::collection(Course::onlyTrashed()
            ->with('subsubcategory')
            ->join('sub_sub_categories', 'courses.sub_sub_category_id', '=', 'sub_sub_categories.id')
            ->join('sub_categories', 'sub_sub_categories.sub_category_id', '=', 'sub_categories.id')
            ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
            ->where(function ($query) use ($search) {
                $query->where('courses.name', 'ILIKE', "%{$search}%")
                    ->orWhere('sub_sub_categories.name', 'ILIKE', "%{$search}%")
                    ->orWhere('sub_categories.name', 'ILIKE', "%{$search}%")
                    ->orWhere('categories.name', 'ILIKE', "%{$search}%");
            })
            ->orderBy('courses.deleted_at')
            ->paginate(12, 'courses.*'));
    }

    public function recommended(Request $request)
    {

        $num = $request->query('num');
        $userid = $request->query('userid');
        $search = $request->query('search');
        $currentCourse = $request->query('currentcourse');

        if ($userid)
        {
            return CourseResource::collection(Course::withCount(['students' => function ($query) {
                    $query->where('payment_status', 1);
                }])
                ->join('sub_sub_categories', 'courses.sub_sub_category_id', '=', 'sub_sub_categories.id')
                ->join('sub_categories', 'sub_sub_categories.sub_category_id', '=', 'sub_categories.id')
                ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
                ->where('status', 1)
                ->whereNotIn('courses.id', function ($query) use ($userid) {
                    $query->select('course_id')
                        ->from('enrollments')
                        ->join('courses', 'courses.id', '=', 'enrollments.course_id')
                        ->whereRaw("user_id = ? AND enrollments.created_at >= now() - (courses.duration || ' DAY')::INTERVAL", [$userid]);
                })
                ->where(function ($query) use ($search) {
                    $query->where('courses.name', 'ILIKE', "%{$search}%")
                        ->orWhere('sub_sub_categories.name', 'ILIKE', "%{$search}%")
                        ->orWhere('sub_categories.name', 'ILIKE', "%{$search}%")
                        ->orWhere('categories.name', 'ILIKE', "%{$search}%");
                })
                ->when($currentCourse != null, function($query) use ($currentCourse) {
                    $query->where('courses.id', '<>', $currentCourse);
                })
                ->orderBy('students_count', 'desc')
                ->distinct()
                ->paginate($num, 'courses.*'));
        }

        return CourseResource::collection(Course::withCount(['students' => function ($query) {
            $query->where('payment_status', 1);
        }])
            ->join('sub_sub_categories', 'courses.sub_sub_category_id', '=', 'sub_sub_categories.id')
            ->join('sub_categories', 'sub_sub_categories.sub_category_id', '=', 'sub_categories.id')
            ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
            ->where('status', 1)
            ->where(function ($query) use ($search) {
                $query->where('courses.name', 'ILIKE', "%{$search}%")
                    ->orWhere('sub_sub_categories.name', 'ILIKE', "%{$search}%")
                    ->orWhere('sub_categories.name', 'ILIKE', "%{$search}%")
                    ->orWhere('categories.name', 'ILIKE', "%{$search}%");
            })
            ->when($currentCourse, function($query) use ($currentCourse) {
                $query->where('courses.id', '<>', $currentCourse);
            })
            ->orderBy('students_count', 'desc')
            ->distinct()
            ->paginate($num, 'courses.*'));
    }

    public function userCourses(Request $request) {

        $userid = $request->query('userid');

        return CourseResource::collection(Course::join('enrollments', 'enrollments.course_id', '=', 'courses.id' )
            ->where('user_id', $userid)
            ->whereRaw("enrollments.created_at >= now() - (courses.duration || ' DAY')::INTERVAL")
            ->get('courses.*'));
    }
}
