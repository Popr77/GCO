<div class="container col-lg-12 mx-auto mt-5" style="width:auto; border: none">
    <h1>Create Lesson</h1>
    <form method="post" action="{{ url('lesson')}}">
        @csrf
        <div class="form-group col-6 form-show">
            <label for="name">Name</label>
            <input
                type="text"
                id="name"
                name="name"
                autocomplete="name"
                placeholder="Your name"
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
            <label for="name">Details</label>
            <textarea
                rows="7"
                id="details"
                name="details"
                class="form-control
            @error('details') is-invalid @enderror"
                required
                aria-describedby="nameHelp"> {{ old('details') }} </textarea>
            @error('details')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
            <label for="name">Project</label>
            <select
                id="project_id"
                name="project_id"
                required
                class="browser-default custom-select form-control
            @error('project') is-invalid @enderror">
                @foreach($projects as $project)
                    <option @if($loop->first) selected="" @endif value="{{$project->id}}">{{$project->name}}</option>
                @endforeach
            </select>
            @error('project')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label for="name">Category</label>
            <select
                id="category_id"
                name="category_id"
                required
                class="browser-default custom-select form-control
            @error('category') is-invalid @enderror">
                @foreach($categories as $category)
                    <option @if($loop->first) selected="" @endif value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('category')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="div-show">
            <button type="submit" class="mt-2 mb-5 btn btn-primary">Create</button>
        </div>
    </form>

</div>
