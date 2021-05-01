<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller {

    public function index(Request $request) {

        $search = $request->query('search');

        $courses = Course::where('name', 'LIKE', "%{$search}%")->orderBy('created_at', 'desc')->paginate(12);

        return view('pages.admin.courses.course-index', compact('courses'));
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
        $course->price = (int)str_replace('.', '', $request->price);
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
        $course->price                  = (int)str_replace('.', '', $request->price);
        $course->sub_sub_category_id    = $request->sub_sub_category_id;
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

        return redirect('dashboard/courses')->with('status', 'Course edited successfully!');
    }
}
