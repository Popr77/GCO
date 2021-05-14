@extends('master.main')

@section('content')
    @component('components.courses.course', ['course' => $course])
    @endcomponent
@endsection
