@extends('master.dashboard.main')

@section('content')
    <courses></courses>
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

