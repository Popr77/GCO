@extends('master.main')

@section('content')
    @component('components.lesson-form-create', ['num' => $num])
    @endcomponent
@endsection
