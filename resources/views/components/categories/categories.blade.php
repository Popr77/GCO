@if (session('status'))
    <div class="alert alert-success alert-dismissible fade show container text-center" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<h1 class="text-center mt-5">Categories</h1>

<div class="d-flex justify-content-between mb-2 px-3 ml-5 mt-3">
    <a class="btn btn-primary" href="{{ url('/')}}" role="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
        </svg>
    </a>
</div>

{{--<img src="img/category.png" alt="" class="rounded-circle w-50 h-25 p-0 mx-auto d-block mb-5 img-fluid">--}}

<form class="my-2 my-lg-0 mx-lg-auto d-flex justify-content-center">
    <div class="form-control mr-sm-2 rounded-pill w-25 mt-2" id="search-input">
        <i class="bi bi-search"></i>
        <input type="text" class="border-0" placeholder="Search" name="search" id="search-category">
    </div>
</form>

<div class="container mt-5 mb-5 d-flex justify-content-center">
    <div class="row mr-0">
        @foreach($categories as $category)
            <div class="card ml-5 my-2 my-card-shadow" style="width: 20rem;">
                <img class="card-img-top" src="{{asset('img/category.png')}}" alt="Category Image">
                <div class="card-body categories-select text-center">
                    <a href="{{url('categories/' . $category->id . '/subcategories')}}" class="course-name">{{$category->name}}</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
