<?php

namespace App\Http\Controllers;

use App\Models\Course;
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
//            $user->courses()->syncWithoutDetaching($request->courses, ['user_id' => $user->id]);

            foreach($request->courses as $courseId) {
                $enrollment = new Enrollment();
                $enrollment->user_id = $user->id;
                $enrollment->course_id = $courseId;
                $enrollment->save();
            }

            return redirect(route('checkout-confirmation'))->with('status', true);
    }

    public function giveFeedback(Course $course, Request $request) {
        $enrollment = Enrollment::find($request->enrollment->id);

        $enrollment->feedback_stars = $request->feedback_stars;
        $enrollment->feedback_comment = $request->feedback_comment;

        $enrollment->save();

        return back();
    }

    public function feedbackApproval(Request $request) {

        $enrollment = Enrollment::find($request->enrollment);

        if(request()->approved) {
            $enrollment->feedback_is_approved = true;
            $enrollment->save();
            return redirect(route('d-index'))->with('status', 'Feedback approved successfully!');
        } else {
            $enrollment->feedback_stars = null;
            $enrollment->feedback_comment = null;
            $enrollment->save();
            return redirect(route('d-index'))->with('status', 'Feedback declined successfully!');

        }

    }
}
