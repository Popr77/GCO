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
    <script>
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
