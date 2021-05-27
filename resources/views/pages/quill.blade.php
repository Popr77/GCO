@extends('master.dashboard.main')

@section('header')
    <dashboard-header class="ml-2 mt-2" title="Module - Lessons"></dashboard-header>
@endsection
@section('content')

    <quill-item></quill-item>
@endsection
<script>
    import QuillItem from "../../js/components/lessons/QuillItem";
    export default {
        components: {QuillItem}
    }
</script>
