@extends('master.main')

@section('content')

    @if (isset($title) && isset($lesson_number) && isset($module_id) && isset($quillItems)){
        @component('components.lessons.lesson-form-edit', ['num' => $num,
    'title' => $title, 'lesson_number' => $lesson_number,
    'module_id' => $module_id, 'quillItems' => $quillItems])
        @endcomponent

    @else
        @component('components.lessons.lesson-form-edit', ['lesson' => $lesson])
        @endcomponent
    @endif
@endsection
