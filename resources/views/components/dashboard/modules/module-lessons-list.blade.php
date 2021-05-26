<div class="container mx-auto mt-2">

    <div class="col-10 mx-auto ">
        <div class="text-right mb-4  mt-1">
            <a class="btn btn-primary" href="{{ route('d-module-create')}}" role="button">Create Module</a>
            <a class="btn btn-warning" href="{{ url('dashboard/lessons/create')}}" role="button">Create Lesson</a>
        </div>
    </div>
    <table class="table table-hover table-bordered col-10 rounded mx-auto">
        <thead>
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="px-4">Module Name</th>
            <th scope="col" class="px-4">Lesson Name</th>
        </tr>
        </thead>
        <tbody>

        @foreach($modules as $module)
            <tr>
                <th scope="row" class="text-center align-middle">{{$module->id}}</th>
                <td class="text-center align-middle">
                    <a class="text-decoration-none text-dark" href="{{url('dashboard/modules/'.$module->id)}}">{{$module->name}}</a>
                </td>
                <td class="px-4 py-4">
                    @foreach($module->lessons as $lesson)
                        <div class="d-flex justify-content-between ">
                            <div class="pt-2"><a class="text-decoration-none text-dark" href="{{url('/lessons/'.$lesson->id)}}">
                                    {{$lesson->title}}</a>
                            </div>
                            <div>
                                <a href="{{url('dashboard/lessons/' . $lesson->id) . '/edit'}}">
                                    <button class="btn btn-primary">Edit</button></a>
                            </div>
                        </div>
                        @if(!$loop->last)<hr>@endif
                    @endforeach
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <nav>
        <ul class="pagination justify-content-center">
            {{ $modules->links() }}
        </ul>
    </nav>
</div>

