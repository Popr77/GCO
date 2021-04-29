@extends('master.main')

@section('content')

    @if (isset($title) && isset($lesson_number) && isset($module_id) && isset($quillItems)){
        @component('components.lesson-form-create', ['num' => $num,
    'title' => $title, 'lesson_number' => $lesson_number,
    'module_id' => $module_id, 'quillItems' => $quillItems])
        @endcomponent
{{--    @elseif(isset($_GET['num']))--}}
{{--        @component('components.lessons-form-create', ['num' => $num])--}}
{{--        @endcomponent--}}
    @else
        @component('components.lesson-form-create', ['num' => $num])
        @endcomponent
    @endif
@endsection



