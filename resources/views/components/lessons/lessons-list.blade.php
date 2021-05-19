
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
    <div class="text-right mb-5 mr-5 mt-1">
        <a class="btn btn-warning" href="{{ url('lessons/create')}}" role="button">Create</a>
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
           <tr class='clickable-row' data-href='{{url('lessons/' . $lesson->id)}}'>
                <td scope="row" class="mt-2 font-weight-bold">{{$lesson->id}}</td>
                   <a href="{{url('lessons/' . $lesson->id)}}" ><td>{{$lesson->title}}</td></a>
                <td  style=" " class="text-center">{{$lesson->module_id}}</td>
                <td>
                    <a href="{{url('lessons/' . $lesson->id) . '/edit'}}">
                        <button class="btn btn-primary">Edit</button>
                    </a>
                </td>
               </tr>
        @endforeach
        </tbody>
    </table>
{{--    <nav>--}}
{{--        <ul class="pagination justify-content-center">--}}
{{--            {{ $lesson->links() }}--}}
{{--        </ul>--}}
{{--    </nav>--}}

</div>


