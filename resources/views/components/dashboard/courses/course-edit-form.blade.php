<form class="col-12 pl-0" method="POST" action="{{ route('d-course-store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text"
               class="form-control @error('name') is-invalid @enderror"
               id="name"
               name="name"
               placeholder="Enter course name"
               value="{{ $course->name }}"
               required>

        @error('name')
        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror"
                  name="description"
                  id="description"
                  rows="3"
                  required>{{ $course->description }}</textarea>
        @error('description')
        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="goals">Goals</label>
        <textarea class="form-control @error('goals') is-invalid @enderror"
                  name="goals"
                  id="goals"
                  rows="3"
                  required>{{ $course->goals }}</textarea>
        @error('goals')
        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="requirements">Requirements</label>
        <textarea class="form-control @error('requirements') is-invalid @enderror"
                  name="requirements"
                  id="requirements"
                  rows="3"
                  required>{{ $course->requirements }}</textarea>
        @error('requirements')
        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="duration">Duration</label>
        <input type="number"
               class="form-control @error('duration') is-invalid @enderror"
               name="duration"
               id="duration"
               value="{{ $course->duration }}"
               required>
        @error('duration')
        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number"
               min="0"
               step="0.01"
               class="form-control @error('price') is-invalid @enderror"
               name="price"
               id="price"
               value="{{ $course->price }}"
               required>
        @error('price')
        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
        @enderror
    </div>
    <category-select
        :cat="{{ $course->subsubcategory->subcategory->category->id }}"
        :subcat="{{ $course->subsubcategory->subcategory->id }}"
        :subsubcat="{{ $course->subsubcategory->id }}"
        @error('sub_sub_category_id') errormsg="{{ $message }}" @enderror
    ></category-select>

    <div class="form-group">
        <label class="d-block" for="photo">Photo</label>
        <img class="mb-2" src="{{ url('storage/img/courses/' . $course->photo) }}" alt="">
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
                   {{ $course->status ? 'checked' : ''}}>
            <label class="custom-control-label" for="status">Active</label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>
