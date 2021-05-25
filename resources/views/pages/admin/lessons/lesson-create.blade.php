@extends('master.main')

@section('content')

    @if (isset($title) && isset($lesson_number) && isset($module_id) && isset($quillItems))
        @component('components.lessons.lesson-form-create', ['num' => $num, 'modules' => $modules,
    'title' => $title, 'lesson_number' => $lesson_number,
    'module_id' => $module_id, 'quillItems' => $quillItems])
        @endcomponent
    @elseif(isset($module_id))
        @component('components.lessons.lesson-form-create', ['num' => $num, 'module_id' => $module_id, 'modules' => $modules])
        @endcomponent
    @else
        @component('components.lessons.lesson-form-create', ['num' => $num, 'modules' => $modules])
        @endcomponent
    @endif
@endsection


@section('scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script>
        let submitted = false;

        @for($i = 0; $i < $num; $i++)
        let {{'quill'. $i}} = new Quill('{{'#editor'. $i}}', {
            theme: 'snow'
        });

        var $a = document.querySelector('{{'#editor'. $i}}').innerHTML="@if(isset($quillItems[$i])){{$quillItems[$i]}}@else{{old('editor'.$i)}}@endif"
        @endfor

        function btnUpdateClick(){
            document.querySelector('#title').required=false
            document.querySelector('#lesson_number').required=false
            document.querySelector('#module_id').required=false
        }

        window.onbeforeunload = function() {
            if (!submitted)
                return "Are you sure you want to leave?";
        }

        const formEl = document.querySelector('form');

        formEl.addEventListener('submit', (e)=>{

            e.preventDefault()
            submitted = true;
        });


    </script>

@endsection

