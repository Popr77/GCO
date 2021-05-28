@extends('master.dashboard.main')

@section('header')
    <dashboard-header class="ml-2 mt-2" title="Module - Lessons"></dashboard-header>
@endsection
@section('content')

    @if (isset($title) && isset($module_id) && isset($quillItems))
            @component('components.lessons.lesson-form-edit', ['lesson' => $lesson, 'num' => $num,
    'title' => $title, 'modules' => $modules,
    'module_id' => $module_id, 'quillItems' => $quillItems])
            @endcomponent
    @else
        @component('components.lessons.lesson-form-edit', ['lesson' => $lesson, 'modules' => $modules])
        @endcomponent
    @endif
@endsection


@section('scripts')

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script>
        let submitted = false;
        let toolbarOptions = [
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
        @if(!isset($num) && isset($lesson))
            @foreach($lesson->contents as $content)
                let {{'quill'. $loop->index}} = new Quill('{{'#editor'. $loop->index}}', {
                    modules: { toolbar: { container: toolbarOptions } },
                    theme: 'snow'
                })

                {{'quill'. $loop->index}}.on('text-change', function() {
                    let inputQuill = document.querySelector('#{{'inputQuill'. $loop->index}}')
                    inputQuill.value = {{'quill'. $loop->index}}.container.firstChild.innerHTML
                })

                {{'quill'. $loop->index}}.container.firstChild.innerHTML= `{!! $content->content !!}`
            @endforeach
        @else
            @for($i = 0; $i < $num; $i++)

                let {{'quill'. $i}} = new Quill('{{'#editor'. $i}}', {
                    modules: { toolbar: { container: toolbarOptions } },
                    theme: 'snow'
                });

                {{'quill'. $i}}.on('text-change', function() {
                    let inputQuill = document.querySelector('#{{'inputQuill'. $i}}')
                    inputQuill.value = {{'quill'. $i}}.container.firstChild.innerHTML

                });
                @if(isset($quillItems[$i]))
                    {{'quill'. $i}}.container.firstChild.innerHTML= `{!! $quillItems[$i] !!}`
                @endif

            @endfor
        @endif

        window.onbeforeunload = function() {

            if (!submitted)
                return "Are you sure you want to leave?";
        }

        const formEl = document.querySelector('form');

        formEl.addEventListener('submit', (e)=>{
            submitted = true;
        });

    </script>

@endsection
