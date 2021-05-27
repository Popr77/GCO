<div class="container ml-5 mt-4">
    <div class="col-12 mx-auto pl-0">
        <div class="text-left mb-4 pl-0 mt-3">
            <a class="btn btn-warning" href="{{ route('d-module-create')}}" role="button">Add Module</a>
        </div>
    </div>
    <table class="table table-hover table-bordered rounded col-5 ">
        <thead>
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col">Module Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($modules as $module)
            <tr class='clickable-row'  data-href='{{url('/dashboard/modules/' . $module->id)}}'>
                <th scope="row" class="text-center">{{$loop->index+1}}</th>
                <td class="px-4"><div class="d-flex justify-content-between">
                        <div class="pt-2">
                            <a class="text-decoration-none text-dark" href="{{url('dashboard/modules/'.$module->id)}}">
                                {{$module->name}}</a>
                        </div>
                        <div>
                            <a href="{{url('dashboard/modules/' . $module->id) . '/edit'}}">
                                <button class="btn btn-primary">Edit</button></a>
                        </div>
                    </div></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-center">
</div>
