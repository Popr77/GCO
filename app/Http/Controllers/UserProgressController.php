<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\LessonGrade;
use Illuminate\Http\Request;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\DeclareDeclare;

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
        $days = [];
        $takeQuiz = [];
        $finalGrades = [];

        foreach ($enrollments as $enrollment) {

            $totalGrades = 0;
            $endDate = $enrollment->created_at->addDays($enrollment->course->duration);
            $daysRemaining = now()->diffInDays($endDate, false);

            if($daysRemaining > 0) {
                array_push($days, $daysRemaining);
            } else {
                array_push($days, '-');
            }


            $totalLessons = 0;
            foreach ($enrollment->course->modules as $module) {
                $totalLessons += Lesson::where('module_id', $module->id)->count();
            }

            $lessonGrades = [];
            $lessons = [];
            $lessonsNotCompleted = [];

            foreach ($enrollment->grades as $lesson) {
                if (count(collect($lesson->pivot->grade)) > 0){
                    if ($lesson->pivot->grade >= 50){
                        array_push($lessonGrades, $lesson->pivot->grade);
                        array_push($lessons, $lesson);
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
                    if ($finalGrade >= 50){
                        $courseFinished = true;
                        array_push($finalGrades, collect(['enrollment'=> $enrollment, 'finalGrade' => $finalGrade,
                            'examGrade'=> $grade->grade, 'avgGrades' => $avgLessonGrades, 'lessons'=> $lessons]));
                        break;
                    }
                }
            }else{
                if ($lessonsNotCompleted == null)
                    array_push($takeQuiz, $enrollment->course->modules[0]->lessons[0]);
                else
                    array_push($takeQuiz,collect($lessonsNotCompleted)->sortBy('id')->first());
            }

            if ($courseFinished)
                array_push($takeExam, 'done');
            elseif($totalLessons == $totalGrades)
                array_push($takeExam, 'true');
            else
                array_push($takeExam, 'false');

            array_push($progress, $totalGrades . ' / ' . $totalLessons);
        }

        return view('pages.user-progress', ['enrollments' => $enrollments, 'progress' => $progress,
            'takeQuiz' => $takeQuiz, 'finalGrades' => $finalGrades, 'takeExam' => $takeExam, 'days' => $days]);
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
