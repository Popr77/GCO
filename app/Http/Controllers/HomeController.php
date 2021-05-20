<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\UserData;
use http\Client\Curl\User;
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
//        DB::table('user_data')->where('user_id', Auth::user()->id)->get();
//        dd(auth()->user()->userData->photo);
        return view('pages.unregistered');
    }

    public function registered()
    {
        $courses = Course::withCount('students')
            ->orderBy('students_count', 'desc')
            ->limit(9)
            ->get();

        $categories = Category::all();

        return view('pages.registered', ['courses' => $courses, 'categories' => $categories]);
    }

}
