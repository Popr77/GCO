<div class="col-12 text-center">
    <h1 class="my-5 ">Final Exam</h1>

    <questions-container :questions="{{$questions}}"
                         link="{{route('finalExam-result', $questions[0]->lesson->module->course->id)}}">
    </questions-container>
</div>
