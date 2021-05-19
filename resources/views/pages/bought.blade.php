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
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="green" class="bi bi-check-circle-fill mt-2 mb-2" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </svg>
            <h1 class="mt-5 ">Thanks</h1>
            <h2 class="ql-color-blue mb-5">for your purchase!</h2>
            <div class="border-top col-8 mx-auto pt-3">
                <div class="col-8 mx-auto mt-3">
                    <h5>We'd love to hear your feedback. After you finish your
                course, don't forget to let us know about your experience!</h5>
                </div>
            </div>
        </div>
    </div>
@endsection



