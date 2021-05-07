@extends('master.dashboard.main')

@section('header')
    <div class="d-flex align-items-center">
        <h1>Courses</h1>
        <a href="{{ route('d-course-create') }}" class="btn btn-primary ml-4">Add Course</a>
    </div>
    <div class="d-flex">
        <form action="">
            <div class="dropdown show mr-3">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Filter By Category
                </a>

                <div class="dropdown-menu px-3" style="width: 300px;" aria-labelledby="dropdownMenuLink">
                    <category-select></category-select>
                </div>
            </div>
        </form>

        <form class="form-inline my-2 my-lg-0">
            <input name="search" class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>

@endsection

@section('content')
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

@section('scripts')

@endsection

