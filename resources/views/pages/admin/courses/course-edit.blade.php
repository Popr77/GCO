@extends('master.dashboard.main')

@section('header')
    <dashboard-header title="Edit Course">
        <form slot="right" action="{{ route('d-course-destroy', ['course' => $course]) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="{{route('d-module',$course->id)}}"><button type="button" class="btn btn-primary">Modules</button>
            </a>
            <button type="submit" class="btn btn-secondary">Archive Course</button>
        </form>
    </dashboard-header>

@endsection

@section('content')
    <div class="row">
        @component('components.dashboard.courses.course-edit-form', ['course' => $course])
        @endcomponent
    </div>
@endsection
