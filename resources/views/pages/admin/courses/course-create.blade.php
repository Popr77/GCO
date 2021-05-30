@extends('master.dashboard.main')

@section('header')
    <dashboard-header title="Create Course"></dashboard-header>
@endsection

@section('content')
    <div class="row">
        @component('components.dashboard.courses.course-create-form')
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

        @php $inputs = ['requirements'] @endphp
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

            @if (old($input))
                setTimeout(function(){
                {{'quill'. $loop->index}}.container.firstChild.innerHTML=`{!! old($input) !!}`
                }, 100);
            @endif

{{--            {{$input}}.container.firstChild.innerHTML="{!! old($input) !!}"--}}
        @endforeach



        /*const form = document.querySelector('form')

        form.addEventListener('submit', (e) => {
            e.preventDefault()

            const formData = new FormData(form)
            if (formData.get('sub_sub_category_id')) {
                e.target.submit()
            }
        })*/
    </script>
@endsection
