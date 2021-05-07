@extends('master.dashboard.main')

@section('header')
    <h1>Edit Course</h1>
    <form action="{{ route('d-course-destroy', ['course' => $course]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-secondary">Archive Course</button>
    </form>
@endsection

@section('content')
    <div class="row">
        @component('components.dashboard.courses.course-edit-form', ['course' => $course])
        @endcomponent
    </div>
@endsection
