<div class="col-6 mx-auto">
    <h2>{{$module->name}}</h2>
    <table class="table table-hover table-bordered col-6 mx-auto">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
        </tr>
        </thead>
        <tbody>
            @foreach($module->lessons as $lesson)
                <tr class='clickable-row'  data-href='{{url('/lessons/' . $lesson->id)}}'>
                    <th scope="row">1</th>
                    <td>{{$lesson->title}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

