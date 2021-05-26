<div class="container col-lg-12 mx-auto mt-5" >
    <h2 class="text-center">Create Module</h2>
    <div class="d-flex justify-content-between mb-2  ml-5 mt-1">
        <a class="btn btn-primary" href="{{ route('d-module')}}" role="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
            </svg>
        </a>
    </div>
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



