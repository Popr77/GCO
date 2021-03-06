<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller {

    public function index() {

        return view('pages.admin.courses.course-index');
    }

    public function store(Request $request) {
        $customMessages = [
            "sub_sub_category_id.required" => 'You need to select a category.'
        ];

        $request->validate([
           'name' => 'required|max:60',
           'description' => 'required',
           'goals' => 'required',
           'requirements' => 'required',
           'status' => 'boolean',
           'duration' => 'required',
           'price' => 'required',
           'sub_sub_category_id' => 'required'
        ], $customMessages);

        $course = new Course();
        $course->name = $request->name;
        $course->description = $request->description;
        $course->goals = $request->goals;
        $course->requirements = $request->requirements;
        $course->status = $request->status ?? 0;
        $course->duration = $request->duration;
        $course->price = $request->price * 100;
        $course->sub_sub_category_id = $request->sub_sub_category_id;
        $course->save();

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|nullable|max:2048'
            ]);

            $filename = $course->id;
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameToStore = $filename . '.' . $extension;
            $request->file('photo')->storeAs('public/img/courses', $filenameToStore);
            $course->photo = $filenameToStore;
            $course->save();
        }


        return redirect('dashboard/courses')->with('status', 'Course created successfully!');
    }

    public function edit(Course $course) {

        return view('pages.admin.courses.course-edit', compact('course'));
    }

    public function update(Request $request, Course $course) {
        $customMessages = [
            "sub_sub_category_id.required" => 'You need to select a category.'
        ];

        $request->validate([
            'name' => 'required|max:60',
            'description' => 'required',
            'goals' => 'required',
            'requirements' => 'required',
            'status' => 'boolean',
            'duration' => 'required',
            'price' => 'required',
            'sub_sub_category_id' => 'required'
        ], $customMessages);

        $course->name                   = $request->name;
        $course->description            = $request->description;
        $course->goals                  = $request->goals;
        $course->requirements           = $request->requirements;
        $course->status                 = $request->status ?? 0;
        $course->duration               = $request->duration;
        $course->price                  = $request->price * 100;
        $course->sub_sub_category_id    = $request->sub_sub_category_id;
        $course->save();

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|nullable|max:2048'
            ]);

            if ($course->photo != 'placeholder.png')
                Storage::delete('public/img/courses/' . $course->photo);

            $filename = $course->id;
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameToStore = $filename . '.' . $extension;
            $request->file('photo')->storeAs('public/img/courses', $filenameToStore);
            $course->photo = $filenameToStore;
            $course->save();
        }

        return redirect('dashboard/courses/' . $course->id . '/edit')->with('status', 'Course edited successfully!');
    }

    public function destroy(Course $course) {

        if($course->students()->where('enrollments.created_at', '>=', now()->subDays($course->duration))->count() > 0) {
            return redirect(route('d-course-index'))->with('status', 'Couldn\'t delete course. There are active enrollments!');
        }

        $course->delete();

        return redirect(route('d-course-index'))->with('status', 'Course archived successfully!');
    }

    public function restore($id) {

        Course::onlyTrashed()->findOrFail($id)->restore();

        return redirect(route('d-course-index'))->with('status', 'Course restored successfully!');
    }
}
