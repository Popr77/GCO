@extends('master.main')

@section('content')
    @component('components.user-progress', ['enrollments' => $enrollments, 'progress' => $progress, 'takeExam' => $takeExam, 'expired' => $expired, 'days' => $days])
    @endcomponent
@endsection
