
@if (session('status'))
    <div class="alert alert-success alert-dismissible fade container show text-center mt-4 mb-0" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="container col-lg-12 mx-auto mt-5" >
    <h2 class="text-center">Lesson Edit</h2>
    <div class="d-flex justify-content-between mb-2 px-3 ml-4 mt-1">
        <a class="btn btn-primary" href="{{ url('/dashboard/lessons/'.$lesson_id.'/edit')}}" role="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
            </svg>
        </a>
    </div>

    <edit-questions   :questions="{{json_encode($questions)}}"
                      :lesson-id="{{intval($lesson_id)}}"
                      link="{{route('quiz-update', $lesson_id)}}">

    </edit-questions>
</div>

