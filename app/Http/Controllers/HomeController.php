<?php

namespace App\Http\Controllers;

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
        return view('pages.registered');
    }

}
