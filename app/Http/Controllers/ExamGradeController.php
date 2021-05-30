<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\ExamGrade;
use App\Models\Lesson;
use App\Models\LessonGrade;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Course  $course
     * @return \Illuminate\Http\Response
     */
    public function index(Course $course, Request $request)
    {
        $enrollment = $request->input('enrollment');

        $questions = [];
        foreach ($enrollment->course->modules as $module){
            foreach ($module->lessons as $lesson){
                foreach ($lesson->questions as $question)
                    array_push($questions, $question);
            }
        }
        $tQuestions = count($questions) * 0.8;
        if ($tQuestions < 5)
            $tQuestions = 5;

        $questions = collect($questions)->shuffle()->take($tQuestions);

        return view("pages.finalExam.finalExam", ['questions' => $questions]);

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
    public function store(Course $course, Request $request)
    {
        try{
            $questionsID = explode(",", $request->questionInput);
            $answersQuiz = explode(",", $request->anwserInput);

            $questions = [];
            foreach ($questionsID as $questionID){
                array_push($questions, Question::find($questionID));
            }

            $total=0;
            foreach ($questions as $question){
                foreach ($question->answers as $answer){
                    if($answer->is_correct == 1){
                        if(in_array($answer->id, $answersQuiz))
                            $total++;
                    }
                }
            }

            $grade = $total*100/count($questionsID);
            $dateTime = now()->toDateTimeString();

            $lesson = Lesson::find($questions[0]->lesson_id);
            $course_id = $lesson->module->course_id;
            $user_id = auth()->user()->id;

            $enrollment = Enrollment::where('user_id', $user_id)
                ->where('course_id', $course_id)
                ->get();

            $examGrade = new ExamGrade();
            $examGrade->enrollment_id = $enrollment[0]->id;
            $examGrade->grade = $grade;
            $examGrade->created_at = $dateTime;
            $examGrade->save();

            $lessonGrades = [];
            foreach ($enrollment[0]->grades as $lesson){
                array_push($lessonGrades, $lesson->pivot->grade);
            }
            $avgLessonGrades = round(collect($lessonGrades)->avg(), 2);
            $finalGrade = round(0.4*$avgLessonGrades + 0.6*$grade, 2);

            return view('pages.finalExam.finalExam-result',
                ['examGrade' => $examGrade, 'lessonGrades' => $lessonGrades, 'avgLessonGrades' => $avgLessonGrades,'finalGrade'=> $finalGrade]);


        }catch (\Exception  $e){
            abort(403);
        }
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
