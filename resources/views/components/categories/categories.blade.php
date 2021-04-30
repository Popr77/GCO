<h1 class="text-center mt-5 mb-5">What do you want to learn?</h1>

@if (session('status'))
    <div class="alert alert-success alert-dismissible fade show container" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div id="carouselExampleIndicators" class="carousel slide container" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="https://cdn2.hubspot.net/hubfs/202339/canvas/images/parallax/Website-Design-Background.png" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="https://cdn2.hubspot.net/hubfs/202339/canvas/images/parallax/Website-Design-Background.png" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="https://cdn2.hubspot.net/hubfs/202339/canvas/images/parallax/Website-Design-Background.png" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<h1 class="text-center mt-5">Categories</h1>

<form class="my-2 my-lg-0 mx-lg-auto d-flex justify-content-center">
    <div class="form-control mr-sm-2 rounded-pill w-25 mt-2" id="search-input">
        <i class="bi bi-search"></i>
        <input type="text" class="border-0" placeholder="Search" name="search">
    </div>
</form>

<div class="container-fluid mt-5">
    <div class="row mb-3 d-flex justify-content-center">
        @foreach($categories as $category)
        <div class="col-sm-3 py-2 d-flex align-items-center justify-content-center border border-primary rounded mx-1 mb-2 categories-select">
            <a href="{{url('categories/' . $category->id . '/subcategories')}}" class="text-center course-name">{{$category->name}}</a>
        </div>
        @endforeach
    </div>
</div>
