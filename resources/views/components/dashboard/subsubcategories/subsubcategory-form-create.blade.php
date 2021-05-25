<h1 class="text-center mt-5">Create Sub Sub Category</h1>

<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            <form method="POST" action="{{ url('dashboard/subsubcategories') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        autocomplete="name"
                        class="form-control
                                @error('name') is-invalid @enderror"
                        value="{{ old('name') }}"
                        required
                        aria-describedby="nameHelp">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name">Choose Sub Category</label>
                    <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="sub_category_id">
                        <option></option>
                        @foreach($subcategories as $subcategory)
                            <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="mt-2 mb-5 mr-2 btn btn-outline-primary">Create</button>
                    <a href="{{url()->previous()}}" class="mt-2 mb-5 btn btn-outline-success">Go back</a>
                </div>
            </form>
        </div>
    </div>
</div>

