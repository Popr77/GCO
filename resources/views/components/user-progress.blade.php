<h1 class="text-center mt-5">Progress</h1>

<table class="table table-hover table-lessons col-6 mx-auto mb-5 border mt-5 text-center">
    <thead>
    <tr>
        <th scope="col">Course</th>
        <th scope="col">Progress</th>
        <th scope="col">Completed</th>
    </tr>
    </thead>
    <tbody>
{{--    @foreach(auth()->user()->courses as $course)--}}
    @foreach($enrollments as $enrollment)
        <tr>
            <td scope="row" class="mt-2">{{$enrollment->course->name}}</td>
            <td scope="row" class="mt-2">
                {{$progress[$loop->index]}}
            </td>

{{--            @if($course->feedback_stars != null && $course->feedback_comment != null)--}}
                <td scope="row" class="mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-check-lg" viewBox="0 0 16 16">
                        <path d="M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z"/>
                    </svg>
                </td>
{{--                @else--}}
                <td scope="row" class="mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
                    </svg>
                </td>
{{--            @endif--}}
        </tr>
    @endforeach
    </tbody>
</table>

