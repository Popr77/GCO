@extends('master.dashboard.main')

@section('content')
    <courses></courses>
@endsection



@section('scripts')
    <script>
        document.querySelector('.dropdown-menu').addEventListener('click', (e) => {
            e.stopPropagation()
        })
    </script>
@endsection

