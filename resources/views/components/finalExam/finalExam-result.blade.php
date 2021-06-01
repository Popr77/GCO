<div class="col-12 text-center mt-5 py-5 ">
    <div class="text-left ml-5 px-5 mt-1">
        <a class="btn btn-primary" href="{{ route('home')}}" role="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
            </svg>
        </a>
    </div>
    <div class="pt-3">
        @if($finalGrade >= 50)
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="green" class="bi bi-check-circle-fill mt-2 mb-2" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </svg>
            <h1 class="my-5 ">Congratulations, you passed!!</h1>

        @else
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="red" class="bi bi-check-circle-fill mt-2 mb-2" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
            </svg>
            <h1 class="my-5 ">Sorry, you didn't pass!!</h1>
        @endif
    </div>
    <div class="py-3">
        <h5 class="mt-5">You achieved the following result:</h5>
        <div class="col-6 d-flex align-items-center justify-content-around bg-primary mx-auto mt-4 rounded-sm py-3 ">
            <h5 class="text-white pt-2">Exam Grade: </h5><h3 class="text-white mb-0">{{$examGrade->grade}} %</h3>
        </div>
        </div>
    <div id="accordion" class="col-6 mx-auto  px-0">
        <div class="card ">
            <button class="btn btn-link py-3 container-fluid text-decoration-none  d-flex align-items-center border-top justify-content-around bg-primary mx-auto rounded-sm " data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                <h5 class="text-white pt-2">Final Grade: </h5><h3 class="text-white mb-0">{{$finalGrade}} %</h3>
            </button>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                <table class="table table-borderless">
                    <thead>
                    <tr class="border-bottom">
                        <th scope="col">Lesson Name</th>
                        <th scope="col">Grade</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($examGrade->enrollment->grades as $lesson)
                        <tr>
                            <td class="w-50">{{$lesson->title}}</td>
                            <td class="w-50">{{$lesson->pivot->grade}} %</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="w-50 font-weight-bold text-secondary">Average</td>
                        <td class="w-50">{{$avgLessonGrades}} %</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if($finalGrade < 50)
        <div class="container mb-5 mt-4 text-right mr-5">
            <a href="{{route('finalExam', $examGrade->enrollment->course->id)}}"><button type="button" class="btn btn-primary float-right mr-4">Repeat Exam</button></a>
        </div>
    @endif
</div>

