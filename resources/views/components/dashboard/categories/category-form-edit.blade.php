<h1 class="text-center mt-5">Edit Category</h1>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-6">
                    <form method="POST" action="{{ url('dashboard/categories/' . $category->id) }}">
                    @csrf
                    @method('PUT')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                autocomplete="name"
                                placeholder="Category name"
                                class="form-control"
                                value="{{ $category->name }}"
                                required
                                aria-describedby="nameHelp">
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="mt-2 mb-5 mr-2 btn btn-outline-primary">Confirm changes</button>
                            <a href="{{url('dashboard')}}" class="mt-2 mb-5 mr-2 btn btn-outline-success">Go back</a>
                            <button type="submit" class="mt-2 mb-5 mr-2 btn btn-outline-danger" form="delete_form">Delete</button>
                        </div>
                    </form>

                    <form method="POST" action="{{ url('dashboard/categories/' . $category->id) }}" id="delete_form">
                        @csrf
                        @method('DELETE')
                    </form>
        </div>
    </div>
</div>

<a type="button" href="{{url('dashboard/subcategories/create')}}" class="btn btn-primary btn-sm mt-2 ml-2 mr-2">Create Subcategory</a>

<div class="container-fluid mt-5">
    <div class="row mb-3 d-flex justify-content-center">
        @foreach($category->subcategories as $subcategory)
            <div class="col-sm-3 py-2 d-flex align-items-center justify-content-center border border-primary rounded mx-1 mb-2 categories-select">
                <a href="{{url('dashboard/subcategories/' . $subcategory->id . '/edit')}}" class="text-center course-name">{{$subcategory->name}}</a>
            </div>
        @endforeach
    </div>
</div>
