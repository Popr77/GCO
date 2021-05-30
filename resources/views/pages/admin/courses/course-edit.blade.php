@extends('master.dashboard.main')

@section('header')
    <dashboard-header title="Edit Course">
        <form slot="right" action="{{ route('d-course-destroy', ['course' => $course]) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="{{route('d-module-one',$course->id)}}"><button type="button" class="btn btn-primary">Modules</button>
            </a>
            <button type="submit" class="btn btn-secondary">Archive Course</button>
        </form>
    </dashboard-header>

@endsection

@section('content')
    <div class="row">
        @component('components.dashboard.courses.course-edit-form', ['course' => $course])
        @endcomponent
    </div>
@endsection


@section('scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script>


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

        @php $inputs = ['goals'] @endphp
        @php $inputs = ['description', 'goals', 'requirements'] @endphp

        @foreach($inputs as $input)
            let {{'quill'. $loop->index}} = new Quill('{{'#'. $input}}', {
                modules: { toolbar: { container: toolbarOptions } },
                theme: 'snow'
            });

            {{'quill'. $loop->index}}.on('text-change', function() {
                let inputQuill = document.querySelector('#{{'input-'. $input}}')
                inputQuill.value = {{'quill'. $loop->index}}.container.firstChild.innerHTML
            });

        {{'quill'. $loop->index}}.container.firstChild.innerHTML= `{!! $course[$input] !!}`
        @endforeach
    </script>
@endsection
