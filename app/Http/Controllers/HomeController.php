<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\ExamGrade;
use App\Models\User;
use App\Models\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->check())
            return redirect(route('home'));

        $categories = Category::orderBy('name')->take(10)->get();
        $search = $_GET["search"] ?? null;

        return view('pages.unregistered', [
            'categories' => $categories,
            'search'     => $search
        ]);
    }

    public function registered()
    {
        $categories = Category::orderBy('name')->take(10)->get();
        $search = $_GET["search"] ?? null;

        return view('pages.registered', [
            'categories' => $categories,
            'search'     => $search
        ]);
    }

    public function dashboard()
    {

        $coursesBought = Enrollment::where('payment_status', 1)->where('created_at', '>=', now()->subDays(7))->count();
        $registeredUsers = User::where('user_type_id', '<>', 1)->count();
        $avgFeedback = (float)number_format(Enrollment::where('feedback_stars', '<>', null)->where('feedback_is_approved', 1)->avg('feedback_stars'), 1);
        $avgExamGrades = (float)number_format(ExamGrade::avg('grade'), 1);
        $feedbacksToApprove = Enrollment::where('feedback_is_approved', 0)
            ->where('feedback_stars', '<>', null)
            ->orderBy('updated_at')
            ->get();

        $stats = [
            [
                'name'  => 'Courses Bought',
                'time'  => 'Last 7 Days',
                'value' => $coursesBought ?? 0,
                'icon'  => 'bi bi-book'
            ],
            [
                'name'  => 'Registered Users',
                'time'  => 'Total',
                'value' => $registeredUsers ?? 0,
                'icon'  => 'bi bi-people'
            ],
            [
                'name'  => 'Avg Feedback',
                'time'  => 'Total',
                'value' => $avgFeedback ?? 0,
                'icon'  => 'bi bi-star'
            ],
            [
                'name'  => 'Avg Exam Grades',
                'time'  => 'Total',
                'value' => $avgExamGrades ?? 0,
                'icon'  => 'bi bi-clipboard-check'
            ],
        ];

        return view('pages.admin.dashboard', compact('stats'), compact('feedbacksToApprove'));
    }

}
