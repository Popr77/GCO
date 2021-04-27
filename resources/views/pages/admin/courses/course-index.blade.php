@extends('master.dashboard.main')

@section('content')
    <div class="row d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center">
            <h1>Courses</h1>
            <a href="{{ route('d-course-create') }}" class="btn btn-primary ml-4">Add Course</a>
        </div>
        <form class="form-inline my-2 my-lg-0">
            <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    @component('components.dashboard.courses.course-list', ['courses' => $courses])
    @endcomponent
@endsection

@section('styles')
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: 1fr;
            grid-row-gap: 20px;
            grid-column-gap: 20px;
        }

        h5 {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        @media (min-width: 576px) {

        }

        @media (min-width: 768px) {

        }

        @media (min-width: 992px) {
            .grid-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1200px) {
            .grid-container {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (min-width: 1400px) {
            .grid-container {
                grid-template-columns: repeat(4, 1fr);
            }
        }
    </style>
@endsection