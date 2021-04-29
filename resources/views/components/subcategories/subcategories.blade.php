<h1 class="text-center mt-5 mb-5">Subcategories</h1>


<div class="container-fluid mt-lg-5">
    <div class="row mb-3 d-flex justify-content-center">
        @foreach($subcategories as $subcategory)
            <div class="col-sm-3 py-2 d-flex align-items-center justify-content-center border border-primary rounded mx-1 mb-2 categories-select">
                <a href="{{url('subcategories/' . $subcategory->id . '/subsubcategories')}}" class="text-center course-name">{{$subcategory->name}}</a>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">
        <a href="{{url('categories')}}" class="mt-2 mb-5 mr-2 btn btn-outline-success">Go back to categories</a>
    </div>
</div>

