<div class="grid-container ml-5 mt-4">
        <table class="table table-hover table-bordered rounded col-12 ">
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
                    <td>{{$module->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
</div>
<div class="d-flex justify-content-center">
</div>
