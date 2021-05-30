<!-- Username welcome -->

<div class="container-fluid welcome-message">
    <div class="row d-flex justify-content-center align-items-center h-100" style="background-color: rgba(255, 255, 255, 0.9);">
        <div class="mt-3 d-flex flex-column align-items-center">
            <h1 class="welcome-user">Hello, {{ auth()->user()->userData->name }}</h1>
            <div class="user-photo rounded-circle shadow mt-2" style="background-image: url({{ asset('storage/img/users/' . auth()->user()->userData->photo) }})"></div>
        </div>
    </div>
</div>

<!-- Courses title and categories button -->

@if($search == null)
    <h1 class="title-courses text-center mt-5">Enjoy our Courses</h1>
@endif

<div class="container mb-5 mt-5">
    <div class="dropdown d-flex {{$search != null ? 'justify-content-between' : 'justify-content-end'}}">
        @if($search != null)
            <h4>Search Results for: <strong class="title-courses">{{$search}}</strong></h4>
        @endif
        <div>
            <button class="btn btn-primary dropdown-toggle mb-3" type="button" id="dropdownMenuButton"
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

<!-- Course List -->

    <course-list search-query-string="{{ request()->query('search') ?? '' }}" user-id="{{ auth()->check() ? auth()->user()->id : null }}"></course-list>
</div>
