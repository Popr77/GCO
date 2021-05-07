<div class="grid-container">
    @foreach($courses as $course)
    <div class="shadow-sm grid-item card">
        <h5 class="card-header">{{ $course->name }}</h5>

        <img class="w-100" src="{{ asset('storage/img/courses/' . $course->photo) }}" alt="">
        <div class="card-body">
            <p class="card-text">{{ $course->description }}</p>
        </div>

        <div class="card-body">
            <a href="{{ url('dashboard/courses/' . $course->id . '/edit')}}" class="btn btn-primary">Edit</a>
            <a href="#" class="btn btn-primary">View Course</a>
        </div>

        <div class="card-footer text-muted d-flex justify-content-between">
            <span>Last updated:</span>{{ $course->updated_at }}
        </div>
    </div>
    @endforeach
</div>
<div class="d-flex justify-content-center">
    {{ $courses->links() }}
</div>
