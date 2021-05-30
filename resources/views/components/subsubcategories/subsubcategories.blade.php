<h1 class="text-center mt-5 mb-5">Sub Sub categories</h1>

<div class="d-flex justify-content-between mb-2 px-3 ml-5 mt-3">
    <a class="btn btn-primary"
       href="{{url('categories/' . $subsubcategories[0]->subcategory->category->id . '/subcategories')}}" role="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-arrow-left-short"
             viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                  d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
        </svg>
    </a>
</div>

<div class="container mt-5 mb-5 d-flex justify-content-center">
    <div class="row mr-0">
        @foreach($subsubcategories as $subsubcategory)
            <a class="category-card" href="{{auth()->check() ? route('home', ['search'=>$subsubcategory->name]) : url('/?search=' . $subsubcategory->name)}}">
                <div class="card ml-5 my-2 my-card-shadow" style="width: 20rem;">
                    <img class="card-img-top" src="{{asset('img/category.png')}}" alt="Category Image">
                    <div class="card-body categories-select text-center">
                        <span class="course-name">{{$subsubcategory->name}}</span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
