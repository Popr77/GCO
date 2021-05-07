@extends('master.main')

@section('content')
    @component('components.quiz', ['questions' => $questions])
    @endcomponent
@endsection

@section('scripts')
    <script>
        document.querySelector('form').addEventListener('submit', (e)=>{
            e.preventDefault()
            console.log(e)
        })
    </script>
@endsection

