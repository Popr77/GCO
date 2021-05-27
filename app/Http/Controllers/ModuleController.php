<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::with('lessons')
            ->OrderBy('id')
            ->paginate(10);

        return view('pages.admin.modules.module-lessons', ['modules' => $modules]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\int  $course_id
     * @return \Illuminate\Http\Response
     */
    public function indexOne($course_id)
    {
        $modules = Module::where('course_id', $course_id)
            ->OrderBy('id')
            ->get();

        return view('pages.admin.modules.modules', ['modules' => $modules]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();

        return view('pages.admin.modules.module-create', ['courses' => $courses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $module = new Module();
        $module->name = $request->input('name');
        $module->course_id = $request->input('course_id');
        $module->save();

        return redirect(route('d-module', $module->course_id)->with('status', 'Module created successfully!!'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        return view('pages.admin.modules.module-show', ['module' => $module]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        $courses = Course::all();

        return view('pages.admin.modules.module-edit',
            ['module' => $module, 'courses' => $courses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        if ($_POST['action'] == 'update'){
            $module->name = $request->input('name');
            $module->course_id = $request->input('course_id');
            $module->save();

            return redirect('dashboard/modules')->with('status', 'Module edited successfully!!');

        }
        $module->delete();

        return redirect('dashboard/modules')->with('status', 'Module deleted successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        $module->delete();
        return redirect('dashboard/modules')->with('status','Module deleted successfully!');;
    }
}
