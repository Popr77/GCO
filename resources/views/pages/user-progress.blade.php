@extends('master.main')

@section('content')
    @component('components.user-progress', ['enrollments' => $enrollments, 'progress' => $progress,
    'takeQuiz' => $takeQuiz, 'takeExam' => $takeExam, 'finalGrades' => $finalGrades, 'days' => $days])
    @endcomponent
@endsection

@section('scripts')
    <script>
        function moreInfo(id){

            @foreach($finalGrades as $finalGrade)

                enrollment_id = {{$finalGrade['enrollment']->id}}

                if(enrollment_id == id){
                    document.querySelector('#more-Info-Container').innerHTML = ' ' +
                        '<table class="table table-borderless">'+
                        '<thead>' +
                        '<tr class="border-bottom">' +
                        '<th scope="col" style="color: #325d88">Lesson Name</th>' +
                        '<th scope="col" style="color: #325d88">Grade</th>' +
                        '</tr>' +
                        '</thead>' +
                        '<tbody>'+
                        '@foreach($finalGrade['lessons'] as $lesson)'+
                        '<tr>'+
                        '<td class="w-50">{{$lesson->title}}</td>'+
                        '<td class="w-50">{{$lesson->pivot->grade}} %</td>'+
                        '</tr>'+
                        '@endforeach'+
                        '<tr class="border-top pt-5">'+
                        '<td class="w-50 font-weight-bold text-secondary">Average</td>'+
                        '<td class="w-50">{{$finalGrade['avgGrades']}} %</td>'+
                        '</tr>'+
                        '<tr>'+
                        '<td class="w-50 font-weight-bold text-secondary">Final Exam</td>'+
                        '<td class="w-50">{{$finalGrade['examGrade']}} %</td>'+
                        '</tr>'+
                        '<tr>'+
                        '<td class="w-50 font-weight-bold text-secondary">Final Grade</td>'+
                        '<td class="w-50 font-weight-bold" style="color: #00bc8c">{{$finalGrade['finalGrade']}} %</td>'+
                        '</tr>'+
                        '</tbody>'+
                        '</table>'
                }
            @endforeach
        }
    </script>

@endsection
