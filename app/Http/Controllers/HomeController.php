<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.unregistered');
    }

    public function registered()
    {
        return view('pages.registered');
    }

    public function categories()
    {
        return view('pages.categories');
    }

}
