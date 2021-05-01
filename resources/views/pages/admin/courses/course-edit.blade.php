@extends('master.dashboard.main')

@section('header')
    <h1>Edit Course</h1>
@endsection

@section('content')
    <div class="row">
        @component('components.dashboard.courses.course-edit-form', ['course' => $course])
        @endcomponent
    </div>
@endsection
