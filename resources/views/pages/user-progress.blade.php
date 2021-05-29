@extends('master.main')

@section('content')
    @component('components.user-progress', ['enrollments' => $enrollments, 'progress' => $progress,
    'takeQuiz' => $takeQuiz, 'takeExam' => $takeExam, 'finalGrades' => $finalGrades, 'days' => $days])
    @endcomponent
@endsection
