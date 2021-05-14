@extends('master.main')

@section('content')

    @component('components.profile', ['userData' => $userData])
    @endcomponent

@endsection
