@extends('master.main')

@section('content')

@component('components.registered', ['courses' => $courses])
@endcomponent

@endsection
