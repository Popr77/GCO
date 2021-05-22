@extends('master.main')

@section('content')
    <div class="col-12 text-center mt-5 py-5 mb-5">
        <div class="text-left ml-5 px-5 mb-5 mt-1">
            <a class="btn btn-primary" href="{{ url('home')}}" role="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
                </svg>
            </a>
        </div>

        <div class="pt-3 mb-5 mt-3" style="">
            @if (session('status'))
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="green" class="bi bi-emoji-laughing" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path d="M12.331 9.5a1 1 0 0 1 0 1A4.998 4.998 0 0 1 8 13a4.998 4.998 0 0 1-4.33-2.5A1 1 0 0 1 4.535 9h6.93a1 1 0 0 1 .866.5zM7 6.5c0 .828-.448 0-1 0s-1 .828-1 0S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 0-1 0s-1 .828-1 0S9.448 5 10 5s1 .672 1 1.5z"/>
                </svg>

                <h1 class="mt-5 ">Thanks</h1>
                <h2 class="ql-color-blue mb-5">for your purchase!</h2>
                <div class="border-top col-8 mx-auto pt-3">
                    <div class="col-8 mx-auto mt-3">
                        <h5>We'd love to hear your feedback. After you finish your
                    course, don't forget to let us know about your experience!</h5>
                    </div>
                </div>
            @else
                <h1>Oops... Something went wrong.</h1>
            @endif
        </div>
    </div>
@endsection



