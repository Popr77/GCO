<div class="container col-lg-12 mx-auto mt-5" >
    <form method="post"  action="{{ url('/dashboard/modules')}}">
        @csrf
        <div class="form-group col-6 form-show mx-auto">

            <label for="name" class="mt-3">Name</label>
            <input
                type="text"
                id="name"
                name="name"
                autocomplete="name"
                placeholder="Module name"

                class="form-control
            @error('name') is-invalid @enderror"
                value="{{ old('name')}}"
                required
                aria-describedby="nameHelp">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label for="module_id" class="mt-3">Course</label>
            <select
                id="course_id"
                name="course_id"
                required
                class="browser-default custom-select form-control
            @error('course_id') is-invalid @enderror">
                @foreach($courses as $course)
                    <option
                        @if($loop->first) selected="" @endif
                    value="{{$course->id}}">{{$course->name}}</option>
                @endforeach
            </select>
            @error('course_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="div-show text-right mt-3">
                <button type="submit" value="create" name="action" onclick="submitted = true;"
                        class="mt-2 mb-5 btn btn-primary mx-auto">Create</button>
            </div>
        </div>
    </form>
</div>



