<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Models\Lesson;

class UserProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enrollments = Enrollment::where('user_id', auth()->user()->id)
            ->where('payment_status', 1)
            ->get();

        $progress = [];

        foreach ($enrollments as $enrollment) {
            $totalGrades = 0;
            foreach ($enrollment->grades as $grade) {
                if ($grade->grade != null)
                    if ($grade->grade > 49)
                        $totalGrades++;
            }

            $totalLessons = 0;

            foreach ($enrollment->course->modules as $module) {
                $totalLessons += Lesson::where('module_id', $module->id)->count();
            }

            array_push($progress, $totalGrades . ' / ' . $totalLessons);
        }

        return view('pages.user-progress', ['enrollments' => $enrollments, 'progress' => $progress]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
