<?php

namespace App\Http\Controllers;

use App\Models\Answer;
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
            ->inRandomOrder()
            ->take(5)
            ->get();

        return view("pages.quiz.quiz", ['questions' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lesson = Lesson::find(1);
        return view("pages.quiz.quiz-form-create",  ['status' => 'alright', 'lesson' => $lesson] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Lesson $lesson, Request $request)
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

            $enrollment_id = DB::table('enrollments')
                ->where('user_id', $user_id)
                ->where('course_id', $course_id)
                ->get();

            $lessonGrade = DB::table('lesson_grades')
                ->where('lesson_id', $questions[0]->lesson_id)
                ->where('enrollment_id',$enrollment_id[0]->id)
                ->get();


            if (isset($lessonGrade) && !$lessonGrade->isEmpty()){

                $lessonGrade = LessonGrade::find($lessonGrade[0]->id);
                $lessonGrade->lesson_id = $questions[0]->lesson_id;
                $lessonGrade->grade = $grade;
                $lessonGrade->date = $dateTime;
                $lessonGrade->created_at = $dateTime;
                $lessonGrade->enrollment_id = $enrollment_id[0]->id;
                $lessonGrade->save();

            }else{

                $lessonGrade = new  LessonGrade();
                $lessonGrade->lesson_id = $questions[0]->lesson_id;
                $lessonGrade->grade = $grade;
                $lessonGrade->date = $dateTime;
                $lessonGrade->created_at = $dateTime;
                $lessonGrade->enrollment_id = $enrollment_id[0]->id;
                $lessonGrade->save();

            }
            return view('pages.quiz.quiz-result', ['lessonGrade'=> $lessonGrade]);


        }catch (\Exception  $e){

            abort(403);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nQuestions = (count($request->all())-2)/6;

        for ($i = 1; $i <= $nQuestions; $i++){

            $correct = $request->input('correct'.$i);

            $question = new  Question();
            $question->lesson_id = $request->input('lessonID');
            $question->question = $request->input('question'.$i);
            $question->save();

//            dd($question->id);
            for ($i2 = 1; $i2 <= 4; $i2++) {

                $answer = new  Answer();
                $answer->question_id = $question->id;
                $answer->answer = $request->input('answer'.$i.'_'.$i2);

                if ($correct == $i2)
                    $answer->is_correct = 1;
                else
                    $answer->is_correct = 0;

                $answer->save();
            }
        }

        return redirect(route('d-lessons'))->with('status', 'Lesson created successfully!');
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
     * @param  Lesson  $lesson_id
     * @return \Illuminate\Http\Response
     */
    public function edit($lesson_id)
    {
        $questions = Question::where('lesson_id',$lesson_id)->get();
//        dd($questions->toArray());

        return view('pages.quiz.quiz-form-edit', ['lesson_id' => $lesson_id,'questions' => $questions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $lesson_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lesson_id)
    {
        $nQuestions = (count($request->all())-3)/6;
            $questions = Question::where('lesson_id', $lesson_id)->get();

        $i = 0;
        while($request->input('question'.$i) != null){

            if ($i+1 > count($questions)){
                $question = new  Question();
                $question->lesson_id = $request->input('lessonID');
                $question->question = $request->input('question'.$i);
            }else{
                $question = $questions[$i];
                $question->lesson_id = $request->input('lessonID');
                $question->question = $request->input('question'.$i);
            }
            $question->save();

            $answers = Answer::where("question_id",$question->id)
                ->get();
            $correct = $request->input('correct'.$i);


            if ($nQuestions >= count($questions)){
                if (count($answers)>0){
                    $i2 = 0;
                    foreach ($answers as $answer) {
                        $answer->question_id = $question->id;
                        $answer->answer = $request->input('answer' . $i . '_' . $i2);
                        if ($correct == $i2)
                            $answer->is_correct = 1;
                        else
                            $answer->is_correct = 0;
                        $answer->save();
                        $i2++;
                    }
                }else{
                    for ($i3=0; $i3<4; $i3++){
                        $answer = new  Answer();
                        $answer->question_id = $question->id;
                        $answer->answer = $request->input('answer' . $i . '_' . $i3);
                        if ($correct == $i3)
                            $answer->is_correct = 1;
                        else
                            $answer->is_correct = 0;
                        $answer->save();
                    }
                }
            }
            $i++;
        }
        if ($nQuestions < count($questions)){
            while(isset($questions[$i])){
                $answers = Answer::where('question_id',$questions[$i]->id)->get();
                foreach ($answers as $answer)
                    $answer->delete();
                $questions[$i]->delete();
                $i++;
            }
        }

        return redirect('dashboard/lessons')->with('status','Quiz edited successfully!');;
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
