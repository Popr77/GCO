{{--@extends('master.dashboard.main')--}}

{{--@section('header')--}}
{{--    <dashboard-header class="ml-2 mt-2" title="Module - Lessons"></dashboard-header>--}}
{{--@endsection--}}
{{--@section('content')--}}

{{--    <quill-item></quill-item>--}}
{{--@endsection--}}
{{--<script>--}}
{{--    import QuillItem from "../../js/components/lessons/QuillItem";--}}
{{--    export default {--}}
{{--        components: {QuillItem}--}}
{{--    }--}}
{{--</script>--}}

<div class="horizontal">
    <div id="editor-container1">
        <div id="editor1">
        </div>
    </div>
    <div id="editor-container2">
        <div id="editor2">
        </div>
    </div>
</div>

<script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script>
    var toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
        ['blockquote', 'code-block'],

        [{ 'header': 1 }, { 'header': 2 }],               // custom button values
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
        [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
        [{ 'direction': 'rtl' }],                         // text direction

        [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
        [ 'link', 'image', 'video', 'formula' ],          // add's image support
        [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
        [{ 'font': [] }],
        [{ 'align': [] }],

        ['clean']                                         // remove formatting button
    ];
    var editor1 = new Quill('#editor1', {
    });
    var editor2 = new Quill('#editor2', {
        modules: { toolbar: { container: toolbarOptions } },
        theme: 'snow'
    });
    var content = "test\ntest\ntest\ntest\ntest\ntest\ntest\ntest\ntest\ntest\ntest\ntest\ntest\ntest\ntest";
    editor1.setContents([{ insert: content }]);
    editor2.setContents([{ insert: content }]);
</script>
