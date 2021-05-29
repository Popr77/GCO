@extends('master.main')

@section('content')
    @component('components.finalExam.finalExam-result',
        ['examGrade' => $examGrade,'lessonGrades' => $lessonGrades,
         'avgLessonGrades' => $avgLessonGrades, 'finalGrade'=> $finalGrade])
    @endcomponent
@endsection
