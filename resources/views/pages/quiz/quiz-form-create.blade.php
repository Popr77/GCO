@extends('master.main')

@section('content')
    @component('components.quiz.quiz-create', ['status' => $status, 'lesson' => $lesson])
    @endcomponent
@endsection


