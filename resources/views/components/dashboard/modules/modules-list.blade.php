<div class="grid-container">
        <table class="table table-hover table-bordered col-6 mx-auto">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
            </tr>
            </thead>
            <tbody>
            @foreach($modules as $module)
                <tr class='clickable-row'  data-href='{{url('/dashboard/modules/' . $module->id)}}'>
                    <th scope="row">1</th>
                    <td>{{$module->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
</div>
<div class="d-flex justify-content-center">
</div>
