
@if (session('status'))
    <div class="alert alert-success alert-dismissible fade container show text-center mt-4 mb-0" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="col-12 text-center mb-5">
    <h1 class="mt-5">Lesson List</h1>
    <div class="text-left mb-2 px-5 ml-5 mt-1">
        <a class="btn btn-primary" href="{{ url('dashboard/')}}" role="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
            </svg>
        </a>
    </div>
    <div class="text-right mb-5 mr-5 mt-1">
        <a class="btn btn-warning" href="{{ url('dashboard/lessons/create')}}" role="button">Create</a>
    </div>
    <table class="table table-hover table-lessons col-6 mx-auto mb-5 border">
        <thead>
        <tr>
            <th scope="col">Lesson Nº</th>
            <th scope="col">Name</th>
            <th scope="col">Module</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($lessons as $lesson)
           <tr class='clickable-row' data-href='{{url('/lessons/' . $lesson->id)}}'>
                <td scope="row" class="mt-2 font-weight-bold">{{$lesson->id}}</td>
                   <a href="{{url('dashboard/lessons/' . $lesson->id)}}" ><td>{{$lesson->title}}</td></a>
                <td  style=" " class="text-center">{{$lesson->module_id}}</td>
                <td>
                    <a href="{{url('dashboard/lessons/' . $lesson->id) . '/edit'}}">
                        <button class="btn btn-primary">Edit</button>
                    </a>
                </td>
               </tr>
        @endforeach
        </tbody>
    </table>
    <nav>
        <ul class="pagination justify-content-center">
            {{ $lessons->links() }}
        </ul>
    </nav>

</div>


