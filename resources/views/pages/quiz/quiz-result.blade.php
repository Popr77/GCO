@extends('master.main')

@section('content')
    @component('components.quiz.quiz-result', ['lessonGrade' => $lessonGrade])
    @endcomponent
@endsection


