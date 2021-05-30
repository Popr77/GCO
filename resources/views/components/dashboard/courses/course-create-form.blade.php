<form class="col-12 col-xl-6 mx-auto px-lg-0" method="POST" action="{{ route('d-course-store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text"
               class="form-control @error('name') is-invalid @enderror"
               id="name"
               name="name"
               placeholder="Enter course name"
               value="{{ old('name') }}"
               required>

        @error('name')
        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <div class="form-control course-quill @error('description') is-invalid @enderror"
                  id="description"
                  >{{ old('description') }}</div>
        @error('description')
        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
        @enderror
        <input id="input-description" required name="description" type="hidden" ></input>
    </div>
    <div class="form-group">
        <label for="goals">Goals</label>
        <div class="form-control course-quill @error('goals') is-invalid @enderror"
                  id="goals"
                  >{{ old('goals') }}</div>
        @error('goals')
        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
        @enderror
        <input id="input-goals" required name="goals" type="hidden" ></input>
    </div>
    <div class="form-group">
        <label for="requirements">Requirements</label>
        <div class="form-control course-quill @error('requirements') is-invalid @enderror"
                  id="requirements">{{ old('requirements') }}</div>
        @error('requirements')
        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
        @enderror
        <input id="input-requirements" required name="requirements" type="hidden" ></input>
    </div>
    <div class="row">
        <div class="form-group col-6 pl-0">
            <label for="duration">Duration</label>
            <input type="number"
                   class="form-control @error('duration') is-invalid @enderror"
                   name="duration"
                   id="duration"
                   value="{{ old('duration') }}"
                   required>
            @error('duration')
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
        </div>
        <div class="form-group col-6 px-0">
            <label for="price">Price</label>
            <input type="number"
                   min="0"
                   step="0.01"
                   class="form-control @error('price') is-invalid @enderror"
                   name="price"
                   id="price"
                   value="{{ old('price') }}"
                   required>
            @error('price')
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
        </div>
    </div>

    <category-select
        @error('sub_sub_category_id') errormsg="{{ $message }}" @enderror
    ></category-select>

    <div class="form-group">
        <label for="photo">Photo</label>
        <input type="file" class="form-control-file" name="photo" id="photo" aria-describedby="fileHelp">
        <small id="fileHelp" class="form-text text-muted">Maximum size: 2MB</small>
    </div>

    <div class="form-group">
        <div class="custom-control custom-checkbox">
            <input type="checkbox"
                   class="custom-control-input"
                   name="status"
                   id="status"
                   value="1"
                   checked>
            <label class="custom-control-label" for="status">Active</label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>
