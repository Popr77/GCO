
@if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="col-12 text-center">
    <h1 class="mt-5">Lesson List</h1>
    <div class="text-right mb-5 mr-5 mt-1">
        <a class="btn btn-warning" href="{{ url('lessons/create')}}" role="button">Create</a>
    </div>
    <table class="table table-hover col-6 mx-auto border">
        <thead>
        <tr>
            <th scope="col">Lessons Nº</th>
            <th scope="col">Name</th>
            <th scope="col">Module</th>
            {{--            <th scope="col">Project</th>--}}
            {{--            <th scope="col">Category</th>--}}
        </tr>
        </thead>
        <tbody>
        @foreach($lessons as $lesson)
           <tr class='clickable-row' data-href='{{url('lessons/' . $lesson->id) . '/edit'}}'>
                <th scope="row">{{$lesson->id}}</th>
                   <a href="{{url('$lessons/' . $lesson->id)}}" ><td>{{$lesson->title}}</td></a>
                <td class="text-center">{{$lesson->module_id}}</td>
                {{--                <td> @if($product->project) {{$product->project->name}} @else {{''}} @endif </td>--}}
                {{--                <td>@if($product->category) {{$product->category->name}} @else {{''}} @endif </td>--}}
                {{--                <td class="td-center">--}}
                {{--                    <form action="{{url('products/' . $product->id)}}" method="POST">--}}
                {{--                        @csrf--}}
                {{--                        @method('DELETE')--}}

                {{--                        <a href="{{url('products/' . $product->id)}}" type="button"--}}
                {{--                           class="btn btn-success">Show</a>--}}
                {{--                        <a href="{{url('products/' . $product->id . '/edit')}}" type="button"--}}
                {{--                           class="btn btn-primary">Edit</a>--}}
                {{--                        <button type="submit" class="btn btn-danger">Delete</button>--}}
                {{--                    </form>--}}
                </td>
               </tr>
        @endforeach
        </tbody>
    </table>
{{--    <nav>--}}
{{--        <ul class="pagination justify-content-center">--}}
{{--            {{ $products->links() }}--}}
{{--        </ul>--}}
{{--    </nav>--}}
    <div class="container ">

    </div>
</div>

<script>
    jQuery(document).ready(function($) {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    });
</script>

