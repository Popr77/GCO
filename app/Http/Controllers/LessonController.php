<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\ContentType;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Integer;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.lesson');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Integer $num)
    {
//        $num = $request->input('name');

//        $num  = ContentType::select('id')->where('name','text')->first();
//        $lesson_id = Lesson::latest('id')->first();
//        dd($lesson_id);

        $num = $_GET['num'];
//        dd('okay');
        return view('pages.admin.create-lesson', ['num' => $num]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Lesson::create([
            'title' => $request->title,
            'lesson_number' => $request->lesson_number,
            'module_id' => $request->module_id
        ]);

        $lesson_id = Lesson::latest('id')->first();

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

                //Id from ContentType Table
                $content_type_id = ContentType::select('id')->where('name', $nameType)->first();

              Content::create([
                  'content_type_id' => (integer)$content_type_id->id,
                  'lesson_id' => $lesson_id->id,
                  'content' => $quillItem
              ]);
            }
            $index++;
        }
        return redirect('lesson')->with('status', 'Lesson created successfully!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}
