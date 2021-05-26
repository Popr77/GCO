@extends('master.dashboard.main')

@section('header')
    <dashboard-header class="ml-2 mt-2" title="Module - Lessons"></dashboard-header>
@endsection
@section('content')

    @if (isset($title) && isset($lesson_number) && isset($module_id) && isset($quillItems))
            @component('components.lessons.lesson-form-edit', ['lesson' => $lesson, 'num' => $num,
    'title' => $title, 'lesson_number' => $lesson_number,
    'module_id' => $module_id, 'quillItems' => $quillItems])
            @endcomponent
    @else
        @component('components.lessons.lesson-form-edit', ['lesson' => $lesson])
        @endcomponent
    @endif
@endsection
