@extends('master.main')

@section('content')
    @component('components.lessons.lessons-list', ['lessons' => $lessons])
    @endcomponent
@endsection
