@extends('master.dashboard.main')

@section('header')
    <dashboard-header class="ml-2 mt-2" title="Module - Lessons"></dashboard-header>
@endsection


@section('content')
    @component('components.quiz.quiz-create', ['status' => $status, 'lesson' => $lesson])
    @endcomponent
@endsection


