@extends('master.main')

@section('content')
    @component('components.quiz.quiz-edit', ['lesson_id' => $lesson_id,'questions' => $questions])
    @endcomponent
@endsection

