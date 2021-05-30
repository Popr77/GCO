<!-- Initial Message -->

<div class="container-fluid welcome-message">
    <div class="row justify-content-center align-items-center h-100" style="background-color: rgba(255, 255, 255, 0.9);">
        <div class="text-center col-lg-6 col-md-8 col-sm-10 col-12">
            <h1>Learn today, teach tomorrow</h1>
            <h5 class="mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci cupiditate deleniti labore laudantium quae quia quod recusandae rem repellendus unde. Accusamus ea impedit incidunt iusto laboriosam omnis quia reprehenderit, sunt.</h5>
        </div>
    </div>
</div>

<!-- Recommended courses -->

<div class="container-fluid py-5">
    @if($search == null)
        <h1 class="text-center">Recommended Courses</h1>
    @endif
</div>

<!-- Cards -->
<div class="container pb-5">
    <div class="dropdown d-flex {{$search != null ? 'justify-content-between' : 'justify-content-end'}}">
        @if($search != null)
            <h4>Search Results for: <strong class="title-courses">{{$search}}</strong></h4>
        @endif
        <div>
            <button class="btn btn-primary dropdown-toggle mb-3" data-flip='false' type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categories
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="/categories">See All</a>
                @foreach($categories as $category)
                    <a href="{{url('categories/' . $category->id . '/subcategories')}}" class="dropdown-item">{{$category->name}}</a>
                @endforeach
            </div>
        </div>
    </div>
    <course-list search-query-string="{{ request()->query('search') ?? '' }}" :num-courses="3" user-id="{{ auth()->check() ? auth()->user()->id : null }}"/>
</div>


<!-- Join us -->

<div class="container-fluid col-lg-12" style="background-color: whitesmoke; border: none">
    <div class="row" style="font-family: Poppins; display: flex; justify-content: center">
        <div style="margin: 50px; text-align: center">
            <h1>Join Us</h1>
            <h5 style="text-align: center; margin-top: 30px">Learning keeps you ahead. Acquire new skills that will impress everyone.</h5>
            <a href="{{ route('register') }}" class="btn btn-primary" style="margin-top: 50px">Get Started</a>
        </div>
    </div>
</div>
