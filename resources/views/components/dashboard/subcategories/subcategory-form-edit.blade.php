<h1 class="text-center mt-5">Edit Sub Category</h1>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-6">
            <form method="POST" action="{{ url('dashboard/subcategories/' . $subcategory->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        autocomplete="name"
                        placeholder="Subcategory name"
                        class="form-control"
                        value="{{ $subcategory->name }}"
                        required
                        aria-describedby="nameHelp">
                </div>

                <div class="form-group">
                    <label for="name">Category</label>
                    <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{$subcategory->category->id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="mt-2 mb-5 mr-2 btn btn-outline-primary">Confirm changes</button>
                    <a href="{{ url()->previous() }}" class="mt-2 mb-5 mr-2 btn btn-outline-success">Go back</a>
                    <button type="submit" class="mt-2 mb-5 mr-2 btn btn-outline-danger" form="delete_form">Delete</button>
                </div>
            </form>

            <form method="POST" action="{{ url('dashboard/subcategories/' . $subcategory->id) }}" id="delete_form">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
</div>

<a type="button" href="{{url('dashboard/subsubcategories/create')}}" class="btn btn-primary btn-sm mt-2 ml-2 mr-2">Create Subsubcategory</a>

<div class="container-fluid mt-5">
    <div class="row mb-3 d-flex justify-content-center">
        @foreach($subcategory->subsubcategories as $subsubcategory)
            <div class="col-sm-3 py-2 d-flex align-items-center justify-content-center border border-primary rounded mx-1 mb-2 categories-select">
                <a href="{{url('dashboard/subsubcategories/' . $subsubcategory->id . '/edit')}}" class="text-center course-name">{{$subsubcategory->name}}</a>
            </div>
        @endforeach
    </div>
</div>
