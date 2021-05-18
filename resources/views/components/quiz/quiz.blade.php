
@if (session('status'))
    <div class="alert alert-success alert-dismissible fade container show text-center mt-4 mb-0" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="col-12 text-center">
    <h1 class="my-5 ">Quiz </h1>

        <questions-container class="mb-5"
                             :questions="{{$questions}}"
                             link="{{url('quiz/take/'.$questions[0]->lesson->id)}}">
        </questions-container>
</div>


