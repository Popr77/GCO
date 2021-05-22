@extends('master.main')

@section('content')
    @component('components.lessons.lesson-form-show', ['lesson' => $lesson, 'modules'=>$modules])
    @endcomponent
@endsection

