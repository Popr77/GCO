@extends('master.dashboard.main')

@section('content')
    <dashboard-header title="Dashboard"></dashboard-header>

    <div class="row">
        @component('components.dashboard.stats', ['stats' => $stats])
        @endcomponent
    </div>


@endsection

@section('styles')
    <style>
        .stat-result {
            font-size: 3rem;
            font-weight: bold;
            line-height: 3rem;
        }

        i {
            font-size: 3rem;
        }

        .circle {
            background-color: rgba(115, 176, 255, 0.1);
            padding: 20px;
            border-radius: 50%;
            width: 200px;
            height: 200px;
            position: absolute;
            top: -86px;
            left: -100px;
        }

        .circle i{
            position: absolute;
            bottom: 30px;
            right: 35px;
            transform: rotate(20deg);
        }

        @media (min-width: 1750px) {
            .stat {
                flex: 0 0 25%;
            }
        }
    </style>
@endsection
