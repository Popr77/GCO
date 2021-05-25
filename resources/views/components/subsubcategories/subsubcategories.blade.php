<h1 class="text-center mt-5 mb-5">Sub Sub categories</h1>


<div class="container-fluid mt-lg-5">
    <div class="row mb-3 d-flex justify-content-center">
        @foreach($subsubcategories as $subsubcategory)
            <div class="col-sm-3 py-2 d-flex align-items-center justify-content-center border border-primary rounded mx-1 mb-2 categories-select">
                <a href="#" class="text-center course-name">{{$subsubcategory->name}}</a>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">
        <a href="{{url('categories/' . $subsubcategories[0]->subcategory->category->id . '/subcategories')}}" class="mt-2 mb-5 mr-2 btn btn-outline-success">Go back to subcategories</a>
    </div>
</div>
