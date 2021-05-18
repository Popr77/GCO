@extends('master.main')

@section('content')

    @if (isset($title) && isset($lesson_number) && isset($module_id) && isset($quillItems)){
        @component('components.lesson-form-create', ['num' => $num, 'modules' => $modules,
    'title' => $title, 'lesson_number' => $lesson_number,
    'module_id' => $module_id, 'quillItems' => $quillItems])
        @endcomponent
    @else
        @component('components.lesson-form-create', ['num' => $num, 'modules' => $modules])
        @endcomponent
    @endif
@endsection


@section('scripts')
    
@endsection

