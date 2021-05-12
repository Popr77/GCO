<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\LessonGrade;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\LessonL;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Lesson  $questions
     * @return \Illuminate\Http\Response
     */
    public function index(Lesson $lesson)
    {
        $questions = Question::with("answers")
            ->where('lesson_id',$lesson->id)
            ->get();

//        dd($questionsAll);
//        $questions = $questionsAll->random(5);
//        dd($questions);

        return view("pages.quiz.quiz", ['questions' => $questions]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Lesson  $questions
     * @return \Illuminate\Http\Response
     */
    public function quiz(Lesson $lesson)
    {
        $questions = Question::with("answers")
            ->where('lesson_id',$lesson->id)
            ->get();

//        dd($questionsAll);
//        $questions = $questionsAll->random(5);
//        dd($questions);

        return view("pages.quiz.quiz", ['questions' => $questions]);
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
    public function save(Request $request)
    {
//        dd($request);
//        try{
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

            $enrollment_id = DB::table('enrollments')
                ->where('user_id', $user_id)
                ->where('course_id', $course_id)
                ->get();


           $lessonGrade = DB::table('lesson_grades')
                ->where('lesson_id', $questions[0]->lesson_id)
                ->where('enrollment_id',$enrollment_id[0]->id)
                ->get();

//            dd($questions[0]->lesson_id);


        if (isset($lessonGrade)){
                dd("update");
                $lessonGrade = LessonGrade::find($lessonGrade[0]->id);
                $lessonGrade->lesson_id = $questions[0]->lesson_id;
                $lessonGrade->grade = $grade;
                $lessonGrade->date = $dateTime;
                $lessonGrade->created_at = $dateTime;
                $lessonGrade->enrollment_id = $enrollment_id[0]->id;
                $lessonGrade->save();

            }else{
            dd("create");

                $lessonGrade = new  LessonGrade();
                $lessonGrade->lesson_id = $questions[0]->lesson_id;
                $lessonGrade->grade = $grade;
                $lessonGrade->date = $dateTime;
                $lessonGrade->created_at = $dateTime;
                $lessonGrade->enrollment_id = $enrollment_id[0]->id;
                $lessonGrade->save();

            }

//        }catch (\Exception  $e){

//            abort(403);
//        }

        return view('pages.quiz.quiz-result', ['lessonGrade'=> $lessonGrade]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
//        try{
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

            $enrollment_id = DB::table('enrollments')
                ->where('user_id', $user_id)
                ->where('course_id', $course_id)
                ->get();


           $lessonGrade = DB::table('lesson_grades')
                ->where('lesson_id', $questions[0]->lesson_id)
                ->where('enrollment_id',$enrollment_id[0]->id)
                ->get();

//            dd($questions[0]->lesson_id);


        if (isset($lessonGrade)){
                dd("update");
                $lessonGrade = LessonGrade::find($lessonGrade[0]->id);
                $lessonGrade->lesson_id = $questions[0]->lesson_id;
                $lessonGrade->grade = $grade;
                $lessonGrade->date = $dateTime;
                $lessonGrade->created_at = $dateTime;
                $lessonGrade->enrollment_id = $enrollment_id[0]->id;
                $lessonGrade->save();

            }else{
            dd("create");

                $lessonGrade = new  LessonGrade();
                $lessonGrade->lesson_id = $questions[0]->lesson_id;
                $lessonGrade->grade = $grade;
                $lessonGrade->date = $dateTime;
                $lessonGrade->created_at = $dateTime;
                $lessonGrade->enrollment_id = $enrollment_id[0]->id;
                $lessonGrade->save();

            }

//        }catch (\Exception  $e){

//            abort(403);
//        }

        return view('pages.quiz.quiz-result', ['lessonGrade'=> $lessonGrade]);

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
