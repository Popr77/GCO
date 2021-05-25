
@if (session('status'))
    <div class="alert alert-success alert-dismissible fade container show text-center mt-4 mb-0" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<edit-questions   :questions="{{json_encode($questions)}}"
                  :lesson-id="{{intval($lesson_id)}}"
                  link="{{route('quiz-update', $lesson_id)}}">

</edit-questions>


