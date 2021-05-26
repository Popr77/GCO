<div class="container col-lg-12 mx-auto mt-5" >
    <h2 class="text-center">Edit Module</h2>
    <div class="text-left mb-2 px-5 ml-5 mt-1">
        <a class="btn btn-primary" href="{{ route('d-module')}}" role="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
            </svg></a>
    </div>
    <form method="post"  action="{{ url('/dashboard/modules/'.$module->id)}}">
        @csrf
        @method('put')
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
                value="{{isset($module->name)?$module->name:old('name')}}"
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
                        @if($module->course_id == $course->id) selected="" @endif
                    value="{{$course->id}}">{{$course->name}}</option>
                @endforeach
            </select>
            @error('course_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="div-show text-right mt-3">
                <button type="submit" value="delete" name="action"
                        class="mt-2 mb-5 btn btn-danger mx-auto">Delete Module</button>
                <button type="submit" value="update" name="action"
                        class="mt-2 mb-5 btn btn-primary mx-auto">Save</button>
            </div>
        </div>
    </form>
</div>



