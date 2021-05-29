<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;

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
        $takeExam = [];
        $expired = [];
        $days = [];
        $takeQuiz = [];

        foreach ($enrollments as $enrollment) {

            $totalGrades = 0;
            $endDate = $enrollment->created_at->addDays($enrollment->course->duration);
            $daysRemaining = $endDate->diffInDays(now());

            // Check the remaining days to complete the course
            if($daysRemaining > 0) {
                array_push($days, $daysRemaining);
            } else {
                array_push($days, '-');
            }

            // Check if the duration of the course is not expired
            if($endDate < now()) {
                array_push($expired, 'true');
            } else {
                array_push($expired, 'false');
            }


            $totalLessons = 0;
            foreach ($enrollment->course->modules as $module) {
                $totalLessons += Lesson::where('module_id', $module->id)->count();
            }

            //count completed quizzes and puts in an array
            $lessonGrades = [];
            $lessonsNotCompleted = [];
            foreach ($enrollment->grades as $lesson) {
                if ($lesson->pivot->grade != null){
                    if ($lesson->pivot->grade == 1)
                        dd('adeus');
                    if ($lesson->pivot->grade > 49){
                        array_push($lessonGrades, $lesson->pivot->grade);
                        $totalGrades++;
                    }else
                        array_push($lessonsNotCompleted, $lesson);
                }
            }
            $courseFinished = false;
            if ($totalLessons == count($lessonGrades)){
                foreach($enrollment->examGrades as $grade){
                    $avgLessonGrades = round(collect($lessonGrades)->avg(), 2);
                    $finalGrade = round(0.4*$avgLessonGrades + 0.6*$grade->grade, 2);
                    if ($finalGrade >= 50)
                        $courseFinished = true;
                }
            }else{
                if ($lessonsNotCompleted == null)
                    array_push($takeQuiz,1);
                else
                    array_push($takeQuiz,collect($lessonsNotCompleted)->sortBy('id')->first());
            }

            // Check if the user have the total quiz done to do the exam
            if ($courseFinished)
                array_push($takeExam, 'done');
            elseif($totalLessons == $totalGrades)
                array_push($takeExam, 'true');
            else
                array_push($takeExam, 'false');

            // User progress
            array_push($progress, $totalGrades . ' / ' . $totalLessons);
        }
        dd($lessonsNotCompleted);

        return view('pages.user-progress', ['enrollments' => $enrollments, 'progress' => $progress, 'takeExam' => $takeExam, 'expired' => $expired, 'days' => $days]);
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
