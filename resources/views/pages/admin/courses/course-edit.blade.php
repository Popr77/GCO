@extends('master.dashboard.main')

@section('content')
    <div class="row mb-4">
        <div class="d-flex align-items-center">
            <h1>Edit Course</h1>
        </div>
    </div>
    <div class="row">
        @component('components.dashboard.courses.course-edit-form', ['course' => $course])
        @endcomponent
    </div>
@endsection
