@extends('master.main')

@section('content')
    @component('components.courses.course', ['course' => $course, 'feedbacks' => $feedbacks])
    @endcomponent
@endsection

@section('styles')
    <style>
        #feedback-container-fluid {
            background-color: var(--blue);
        }

        #feedback-container-fluid .user-img {
            height: 50px;
            width: 50px;
            border-radius: 50%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }

        #feedback-container {
            max-width: 700px!important;
        }


    </style>
@endsection
