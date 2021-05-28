@extends('master.main')

@section('content')
    @component('components.user-purchase', ['enrollments' => $enrollments])
    @endcomponent
@endsection
