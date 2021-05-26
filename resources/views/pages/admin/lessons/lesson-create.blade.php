@extends('master.dashboard.main')

@section('header')
    <dashboard-header class="ml-2 mt-2" title="Module - Lessons"></dashboard-header>
@endsection


@section('content')

    @if (isset($title) && isset($lesson_number) && isset($module_id) && isset($quillItems))
        @component('components.lessons.lesson-form-create', ['num' => $num, 'courses' => $courses,
    'title' => $title,
    'module_id' => $module_id, 'quillItems' => $quillItems])
        @endcomponent
    @elseif(isset($module_id))
        @component('components.lessons.lesson-form-create', ['num' => $num, 'module_id' => $module_id, 'courses' => $courses])
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
        let a

        let options = {
            debug: 'info',
            modules: {
                toolbar: '#toolbar'
            },
            placeholder: 'Compose an epic...',
            readOnly: true,
            theme: 'snow'
        };

        @for($i = 0; $i < $num; $i++)
            let {{'quill'. $i}} = new Quill('{{'#editor'. $i}}', {
                theme: 'snow'
            });

            $a = document.querySelector('{{'#editor'. $i}}').innerHTML="@if(isset($quillItems[$i])){{$quillItems[$i]}}@else{{old('editor'.$i)}}@endif"
        @endfor



        window.onbeforeunload = function() {
            if (!submitted)
                return "Are you sure you want to leave?";
        }

        const formEl = document.querySelector('form');

        formEl.addEventListener('submit', (e)=>{

            e.preventDefault()
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

