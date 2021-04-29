<h1 class="text-center mt-5">Edit Sub Category</h1>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-6">
            <form method="POST" action="{{ url('subcategories/' . $subcategory->id) }}">
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
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="mt-2 mb-5 mr-2 btn btn-outline-primary">Confirm changes</button>
                    <a href="{{url('subcategories')}}" class="mt-2 mb-5 mr-2 btn btn-outline-success">Go back</a>
                    <button type="submit" class="mt-2 mb-5 mr-2 btn btn-outline-danger" form="delete_form">Delete</button>
                </div>
            </form>

            <form method="POST" action="{{ url('subcategories/' . $subcategory->id) }}" id="delete_form">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
</div>
