@extends('master.dashboard.main')

@section('content')
    <dashboard-header title="Dashboard"></dashboard-header>

    <div class="row">
        <div class="col-sm-6 col-xl-3 p-2">
            <div class="col-12 card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <p class="stat-result mb-0 text-primary">{{ $coursesBought }}</p>
                    </div>
                    <div class="col-md-8 d-flex justify-content-center align-items-center">
                        <div class="card-body">
                            <h5 class="card-title text-danger mb-0 font-weight-bold">Courses Bought</h5>
                            <p class="text-dark mb-0">Last 7 Days</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3 p-2">
            <div class="col-12 card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <p class="stat-result mb-0 text-primary">{{ $registeredUsers }}</p>
                    </div>
                    <div class="col-md-8 d-flex justify-content-center align-items-center">
                        <div class="card-body">
                            <h5 class="card-title text-danger mb-0 font-weight-bold">Registered Users</h5>
                            <p class="text-dark mb-0">Total</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3 p-2">
            <div class="col-12 card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <p class="stat-result mb-0 text-primary">{{ $avgFeedback }}</p>
                    </div>
                    <div class="col-md-8 d-flex justify-content-center align-items-center">
                        <div class="card-body">
                            <h5 class="card-title text-danger mb-0 font-weight-bold">Avg Feedback</h5>
                            <p class="text-dark mb-0">Total</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3 p-2">
            <div class="col-12 card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <p class="stat-result mb-0 text-primary">{{ $avgExamGrades }}</p>
                    </div>
                    <div class="col-md-8 d-flex justify-content-center align-items-center">
                        <div class="card-body">
                            <h5 class="card-title text-danger mb-0 font-weight-bold">Exam Grades Avg</h5>
                            <p class="text-dark mb-0">Total</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection

@section('styles')
    <style>
        .stat-result {
            font-size: 4rem;
            font-weight: bold;
        }
    </style>
@endsection
