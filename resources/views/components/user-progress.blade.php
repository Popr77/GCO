<div class="d-flex justify-content-center mt-5 mb-5">
    <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="#00bc8c" class="bi bi-graph-up" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5z"/>
    </svg>
</div>

<h1 class="text-center mt-5">Here's your Progress, <strong>{{auth()->user()->userData->name}}</strong></h1>

<div class="d-flex justify-content-between mb-2 px-3 ml-5 mt-3">
    <a class="btn btn-primary" href="{{url('/home')}}" role="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
        </svg>
    </a>
</div>

<table class="table table-hover table-lessons col-6 mx-auto border mt-5 shadow-sm border text-center table-striped" style="margin-bottom: 110px">
    <thead>
    <tr>
        <th scope="col">Course</th>
        <th scope="col">Progress</th>
        <th scope="col">Exam</th>
        <th scope="col">Completed</th>
        <th scope="col">Expired</th>
        <th scope="col">Days Remaining</th>
    </tr>
    </thead>
    <tbody>
    @foreach($enrollments as $enrollment)
        <tr>
            <td scope="row" class="mt-2"><a class="course-name" href="{{url('/courses/' . $enrollment->course->id)}}">{{$enrollment->course->name}}</a></td>
            <td scope="row" class="mt-2">{{$progress[$loop->index]}}</td>

            @if($takeExam[$loop->index] == 'true')
                <td scope="row" class="mt-2">
                    <a href="" class="btn btn-warning">Take Exam</a>
                </td>
            @else
                <td scope="row" class="mt-2">
                    <a class="btn btn-warning disabled">Exam Locked</a>
                </td>
            @endif

            @if($enrollment->course->feedback_stars != null && $enrollment->course->feedback_comment != null)
                <td scope="row" class="mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-check-lg" viewBox="0 0 16 16">
                        <path d="M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z"/>
                    </svg>
                </td>
            @else
                <td scope="row" class="mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
                    </svg>
                </td>
            @endif

            @if($expired[$loop->index] == 'true')
                <td scope="row" class="mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-check-lg" viewBox="0 0 16 16">
                        <path d="M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z"/>
                    </svg>
                </td>
            @else
                <td scope="row" class="mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
                    </svg>
                </td>
            @endif

            <td scope="row" class="mt-2">{{$days[$loop->index]}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

