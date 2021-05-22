<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EnrollmentController extends Controller
{

    public function create() {
        return view('pages.checkout.checkout');
    }

    public function store(Request $request) {

            $user = auth()->user();
            $user->courses()->syncWithoutDetaching($request->courses, ['user_id' => $user->id]);

            return redirect(route('checkout-confirmation'))->with('status', true);
    }
}
