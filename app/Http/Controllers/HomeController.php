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
        if (auth()->check())
            return redirect(route('home'));

        return view('pages.unregistered');
    }

    public function registered()
    {
        $categories = Category::all();

        return view('pages.registered', ['categories' => $categories]);
    }

}
