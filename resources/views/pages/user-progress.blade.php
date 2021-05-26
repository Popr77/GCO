@extends('master.main')

@section('content')
    @component('components.user-progress', ['enrollments' => $enrollments, 'progress' => $progress])
    @endcomponent
@endsection
