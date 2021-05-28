@extends('master.dashboard.main')

@section('header')
    <dashboard-header class="ml-2 mt-2" title="Module - Lessons"></dashboard-header>
@endsection


@section('content')
    @if (isset($title) && isset($module_id) && isset($quillItems))
        @component('components.lessons.lesson-form-create', ['num' => $num, 'courses' => $courses,
    'title' => $title, 'course_id' => $course_id,
    'module_id' => $module_id, 'quillItems' => $quillItems])
        @endcomponent
    @elseif(isset($module_id) && isset($course_id))
        @component('components.lessons.lesson-form-create', ['num' => $num, 'course_id' => $course_id, 'module_id' => $module_id, 'courses' => $courses])
        @endcomponent
    @else
        @component('components.lessons.lesson-form-create', ['num' => $num, 'courses' => $courses])
        @endcomponent
    @endif
@endsection


@section('scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script>

        let submitted = false;
        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],
            ['blockquote', 'code-block'],
            [{ 'header': 1 }, { 'header': 2 }],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'indent': '-1'}, { 'indent': '+1' }],
            [{ 'direction': 'rtl' }],
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
            [ 'link', 'image'],
            [{ 'color': [] }, { 'background': [] }],
            [{ 'font': [] }],
            [{ 'align': [] }],
        ];
        @for($i = 0; $i < $num; $i++)
            let {{'quill'. $i}} = new Quill('{{'#editor'. $i}}', {
                modules: { toolbar: { container: toolbarOptions } },
                theme: 'snow'
            });

            {{'quill'. $i}}.on('text-change', function() {
                let inputQuill = document.querySelector('#{{'inputQuill'. $i}}')
                inputQuill.value = {{'quill'. $i}}.container.firstChild.innerHTML

            });

           {{'quill'. $i}}.container.firstChild.innerHTML="@if(isset($quillItems[$i])){!! $quillItems[$i] !!}@else{!! old('editor'.$i) !!}@endif"
        @endfor

        window.onbeforeunload = function() {
            if (!submitted)
                return "Are you sure you want to leave?";
        }

        const formEl = document.querySelector('form');

        formEl.addEventListener('submit', (e)=>{
            submitted = true;
        });

        function updateModules(){
            let selected_id = document.querySelector('#course_id').value
            let moduleSelec = document.querySelector('#module_id').options

            @foreach($courses as $course)
                if({{$course->id}} == selected_id){
                    @foreach($course->modules as $module)
                        moduleSelec[{{$loop->index}}].text = '{{$module->name}}'
                        moduleSelec[{{$loop->index}}].value = '{{$module->id}}'
                    @endforeach
                }
            @endforeach
        }
    </script>

@endsection

