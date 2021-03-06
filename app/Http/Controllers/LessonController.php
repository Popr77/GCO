<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\ContentType;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Lesson;
use App\Models\LessonGrade;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\Types\Integer;
use PhpParser\Node\Expr\AssignOp\Mod;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::paginate(15);

        return view('pages.admin.lessons.lessons', ['lessons' => $lessons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::with('modules')->get();

        if (isset($_GET['num']) && isset($_GET['title'])  && isset($_GET['module_id'])){

            $quillItems  = [];
            for ($i=0; $i<count($_GET); $i++){
                if (isset($_GET['editor'.$i])){
                    array_push($quillItems, $_GET['editor'.$i]); //array
                }
            }

            $num = $_GET['num'];
            $title = $_GET['title'];
            $course_id = $_GET['course_id'];
            $module_id = $_GET['module_id'];

            return view('pages.admin.lessons.lesson-create', ['num' => $num, 'courses' => $courses,
                'title' => $title, 'course_id' => $course_id, 'module_id' => $module_id, 'quillItems' => $quillItems]);

        }elseif(isset($_GET['num'])){

            $course_id = $_GET['course_id'];
            $module_id = $_GET['module_id'];
            $num = $_GET['num'];

            return view('pages.admin.lessons.lesson-create', ['num' => $num, 'module_id' => $module_id,
                'course_id' => $course_id, 'courses' => $courses]);

        }else{
            $num = 3;
            return view('pages.admin.lessons.lesson-create', ['num' => $num, 'courses' => $courses]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($_POST['action'] == 'update') {

            $courses = Course::with('modules')->get();

            $num = $request->containers;
            $title = $request->title;
            $course_id = $request->course_id;
            $module_id = $request->module_id;


            $index = 0;
            $quillItems  = [];
            foreach ($request as $item) {
                $quillItem = $request->input(('editor'.$index));
                if (!is_null($quillItem)){
                    array_push($quillItems, $quillItem); //array
                }
                $index++;
            }

            return view('pages.admin.lessons.lesson-create', ['num' => $num, 'courses' => $courses,
                'title' => $title, 'course_id' => $course_id,'module_id' => $module_id, 'quillItems' => $quillItems]);

        } else if ($_POST['action'] == 'create') {

            $lesson_number = Lesson::Select('id')
                ->where('module_id', $request->module_id)
                ->count();
            $lesson_number++;

            Lesson::create([
                'title' => $request->title,
                'lesson_number' => $lesson_number,
                'module_id' => $request->module_id
            ]);

            $lesson = Lesson::latest('id')->first();

            $index = 0;
            foreach ($request as $item) {
                $quillItem = $request->input(('editor'.$index));
                if (!is_null($quillItem)){
                    $contains = Str::contains($quillItem, 'youtube.com');

                    if ($contains){
                        $nameType = 'link';
                    }else{
                        $nameType = 'text';
                    }
                    $dom_desc = new Crawler($quillItem);
                    $images = $dom_desc->filterXPath('//img')->extract(array('src')); // extract images

                    $index2 = 0;
                    foreach ($images as $key => $value) {
                        if (strpos($value, 'base64') !== false) {
                            $name = $lesson->id.'-'.$index2.'-'.time().'.' . explode('/',
                                    explode(':', substr($value, 0, strpos($value, ';')))[1])[1];
                            $path = public_path('img/lessons/'.$name);
                            $img = Image::make($value)->save($path);
                            $path = asset('img/lessons/'.$name);
                            $quillItem = str_replace($value, $path, $quillItem); // replace src of converted file to fs path
                        }
                        $index2++;
                    }

                    $content_type = ContentType::select('id')->where('name', $nameType)->first();

                    Content::create([
                        'content_type_id' => (integer)$content_type->id,
                        'lesson_id' => $lesson->id,
                        'content' => $quillItem
                    ]);
                }
                $index++;

            }
            return view("pages.quiz.quiz-form-create", ['status' => 'Lesson created successfully!', 'lesson' => $lesson]);

        }

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        $modules = Module::with('lessons')
            ->where('course_id', $lesson->module->course->id)->get();

        $enrollment = Enrollment::where('user_id', Auth::user()->id)
            ->where('course_id', $lesson->module->course->id)
            ->OrderBy('created_at', 'DESC')
            ->first();


        $flag = false;

        if($enrollment) {
            $lessonGrade = LessonGrade::where('lesson_id',$lesson->id)
                ->where('enrollment_id',$enrollment->id)->get();
        }else
            $flag = true;

        if (isset($lessonGrade) && !$lessonGrade->isEmpty()){
            foreach ($lessonGrade as $grade){
                if ($grade->grade >= 50 ){
                    $flag = true;
                }
            }
        }

        return view('pages.admin.lessons.lesson-show',
            ['lesson' => $lesson, 'modules'=> $modules, 'flag' => $flag]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        $course_id = $lesson->module->course->id;
        $modules = Module::where('course_id', $course_id)
            ->with('lessons')->get();

        if (isset($_GET['num']) && isset($_GET['title']) && isset($_GET['module_id'])){

            $quillItems  = [];
            for ($i=0; $i<count($_GET); $i++){
                if (isset($_GET['editor'.$i])){
                    array_push($quillItems, $_GET['editor'.$i]); //array
                }
            }
            $num = $_GET['num'];
            $title = $_GET['title'];
            $module_id = $_GET['module_id'];

            return view('pages.admin.lessons.lesson-edit', ['num' => $num,
                'title' => $title, 'modules' => $modules,
                'module_id' => $module_id, 'quillItems' => $quillItems]);

        }else{
            return view('pages.admin.lessons.lesson-edit', ['lesson' => $lesson, 'modules' => $modules]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {

         function updateContent($content, $content_type, $quillItem){
            $content->content_type_id = (integer)$content_type->id;
            $content->content = $quillItem;
            $content->save();
        }

        $course_id = $lesson->module->course->id;
        $modules = Module::where('course_id', $course_id)
            ->with('lessons')->get();

        if ($_POST['action'] == 'update') {

            $num = $request->containers;
            $title = $request->title;
            $module_id = $request->module_id;

            $index = 0;
            $quillItems = [];
            foreach ($request as $item) {
                $quillItem = $request->input(('editor' . $index));
                if (!is_null($quillItem)) {
                    array_push($quillItems, $quillItem); //array
                }
                $index++;
            }
            return view('pages.admin.lessons.lesson-edit', ['lesson' => $lesson,'num' => $num,
                'title' => $title, 'modules' => $modules,
                'module_id' => $module_id, 'quillItems' => $quillItems]);

        } else if ($_POST['action'] == 'save') {

            $lesson->title = $request->title;
            $lesson->module_id = $request->module_id;
            $lesson->save();

            $index = 0;
            foreach ($request as $item) {
                $quillItem = $request->input(('editor' . $index));
//                $total_quillItems = count($quillItem);
                $contents = Content::find(Content::select('id')->where('lesson_id', $lesson->id)->get());
                if (!is_null($contents)){
                    if (!is_null($quillItem)) {

                        $contains = Str::contains($quillItem, 'youtube.com');

                        if ($contains) {
                            $nameType = 'link';
                        } else {
                            $nameType = 'text';
                        }

                        $content_type = ContentType::select('id')->where('name', $nameType)->first();
                        if (isset($contents)) {
                            if ($request->containers > count($contents)) {
                                if ($index+1 > count($contents)) {

                                    Content::create([
                                        'content_type_id' => (integer)$content_type->id,
                                        'lesson_id' => $lesson->id,
                                        'content' => $quillItem
                                    ]);
                                } else {
                                    updateContent($contents[$index], $content_type, $quillItem);
                                }

                            } elseif ($request->containers < count($contents)) {
                                if ($index <= count($contents)) {
                                    updateContent($contents[$index], $content_type, $quillItem);
                                }
                            } else {
                                updateContent($contents[$index], $content_type, $quillItem);
                            }
                            $index++;
                        }
                    }
                }
            }
            if (!is_null($contents)){
                if($request->containers < count($contents)){
                    while($index !=  count($contents)){
                        $contents[$index]->delete();
                        $index++;
                    }
                }
            }

        }else if ($_POST['action'] == 'delete'){
            $module_id = $lesson->module_id;
            $lesson_number = $lesson->lesson_number;
            $lesson->delete();

            $lessons = Lesson::where('module_id',$module_id)
                    ->where('lesson_number','>', $lesson_number)->get();
            foreach ($lessons as $lesson){
                $lesson->lesson_number = $lesson->lesson_number-1;
                $lesson->save();
            }

            return redirect(route('d-module'))->with('status','Lesson deleted successfully!');;

        }
        return redirect(route('d-module'))->with('status', 'Lesson edited successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        $module_id = $lesson->module_id;
        $lesson_number = $lesson->lesson_number;
        $lesson->delete();

        $lessons = Lesson::where('module_id',$module_id)
            ->where('lesson_number','>', $lesson_number)->get();
        foreach ($lessons as $lesson){
            $lesson->lesson_number = $lesson->lesson_number-1;
            $lesson->save();
        }
        return redirect(route('d-module'))->with('status','Lesson deleted successfully!');;
    }
}
