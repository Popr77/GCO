<div class="d-flex justify-content-between mb-2 px-3 ml-5 mt-5">
    <a class="btn btn-primary" href="{{url('/home')}}" role="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
        </svg>
    </a>
</div>
<div class="d-flex justify-content-center mt-2 mb-5">
    <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="#325d88" class="bi bi-credit-card" viewBox="0 0 16 16">
        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
        <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
    </svg>
</div>

<h1 class="text-center mt-5">Here's your Purchases, <strong>{{auth()->user()->userData->name}}</strong></h1>


<table class="table table-hover table-lessons col-6 mx-auto mt-5 shadow-sm border text-center table-striped" style="margin-bottom: 110px">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Course</th>
        <th scope="col">Date</th>
        <th scope="col">Amount</th>
        <th scope="col">Is Active</th>
        <th scope="col">Watch</th>
    </tr>
    </thead>
    <tbody>

    @php
    $enrollmentCount = $enrollments->count();
    @endphp

    @foreach($enrollments as $enrollment)
        <tr>
            <td scope="row" class="mt-2">{{$enrollmentCount--}}</td>
                <td scope="row" class="mt-2"><a href="{{url('/courses/' . $enrollment->course->id)}}" class="a-hover text-dark {{$enrollment->course->trashed()?'disabled':''}}">{{$enrollment->course->name}}</a></td>
            <td scope="row" class="mt-2">{{$enrollment->created_at->toDateString()}}</td>
            <td scope="row" class="mt-2">{{$enrollment->course->price/100}} €</td>

            <td scope="row" class="mt-2">
                @if($enrollment->course->status == 1)
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green" class="bi bi-check-lg" viewBox="0 0 16 16">
                        <path d="M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z"/>
                    </svg>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
                    </svg>
                @endif
            </td>

            <td scope="row" class="mt-2">
                    <a href="{{url('/courses/' . $enrollment->course->id)}}" class="btn btn-warning {{$enrollment->course->trashed()?'disabled':''}}">{{$enrollment->course->trashed()?'Deleted':'+'}}</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
