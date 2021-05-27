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

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->check())
            return redirect(route('home'));

        return view('pages.unregistered');
    }

    public function registered()
    {
        $categories = Category::all();

        return view('pages.registered', ['categories' => $categories]);
    }

    public function dashboard() {

        $coursesBought = Enrollment::where('payment_status', 1)->where('created_at', '>=', now()->subDays(7))->count();
        $registeredUsers = User::where('user_type_id', '<>', 1)->count();
        $avgFeedback = (float)number_format(Enrollment::where('feedback_stars', '<>', null)->avg('feedback_stars'), 1);
        $avgExamGrades = ExamGrade::avg('grade');

        return view('pages.admin.dashboard', [
            'coursesBought' => $coursesBought ?? 0,
            'registeredUsers' => $registeredUsers ?? 0,
            'avgFeedback' => $avgFeedback ?? 0,
            'avgExamGrades' => $avgExamGrades ?? 0
        ]);
    }

}
