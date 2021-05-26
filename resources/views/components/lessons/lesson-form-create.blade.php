<div class="container col-lg-12 mx-auto mt-5" >
    <h2 class="text-center">Create Lesson</h2>
    <div class="text-left mb-2 px-5 ml-5 mt-1">
        <a class="btn btn-primary" href="{{ route('d-module')}}" role="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
            </svg></a>
    </div>
    <form method="post"  action="{{ url('/dashboard/lessons')}}">
        @csrf
        <div class="form-group col-6 form-show mx-auto">

            <label for="containers" class="mt-5">Nº of Containers</label>
            <select
                id="containers"
                name="containers"
                required
                class="browser-default custom-select form-control
            @error('containers') is-invalid @enderror">
                    @for($i=1; $i<=10; $i++)
                        <option
                            @if($num == $i) selected="" @endif
                        value="{{$i}}">{{$i}}</option>
                    @endfor
            </select>
            @error('containers')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="div-show text-right mt-2">
                <button type="submit" value="update" name="action" onclick="submitted = true;"
                        class="mt-2 mb-5 btn btn-warning mx-auto">Update</button>
            </div>

            <label for="title" class="mt-3">Name</label>
            <input
                type="text"
                id="title"
                name="title"
                autocomplete="title"
                placeholder="Lesson name"

                class="form-control
            @error('title') is-invalid @enderror"
                value="@if(isset($title)){{$title}}@else{{ old('title')}}@endif"
                required
                aria-describedby="nameHelp">
            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label for="course_id" class="mt-3">Course</label>
            <select
                id="course_id"
                name="course_id"
                required
                onchange="updateModules()"
                class="browser-default custom-select form-control
            @error('course_id') is-invalid @enderror">
                @foreach($courses as $course)
                    <option
                        @if(isset($course_id)) @if($course->id == $course_id  ) selected="" @endif @endif
                    value="{{$course->id}}">{{$course->name}}</option>
                @endforeach
            </select>
            @error('course_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label for="module_id" class="mt-3">Module</label>
            <select
                id="module_id"
                name="module_id"
                required
                class="browser-default custom-select form-control
            @error('module_id') is-invalid @enderror">
                @foreach($courses[0]->modules as $module)
                    <option
                        @if(isset($module_id)) @if($module->id == $module_id  ) selected="" @endif @endif
                        value="{{$module->id}}">{{$module->name}}</option>
                @endforeach
            </select>
            @error('module_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <h5 class="ql-color-blue mt-5" mb-3 ml-3 pl-2> - Content will appear in the same order on the page!</h5>
            @for($i = 0; $i < $num; $i++)
                <label for="{{'editor' . $i}}" class="mt-3">{{'Content '.($i+1)}}</label>

                <textarea
                    rows="7"
                    id="{{'editor' . $i}}"
                    name="{{'editor' . $i}}"
                    class="form-control
            @error('editor' . $i) is-invalid @enderror"
                    aria-describedby="nameHelp">@if(isset($quillItems[$i])){{$quillItems[$i]}}@else{{old('editor'.$i)}}@endif</textarea>
                @error('editor' . $i)
                <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
                @enderror

            @endfor
            <div class="div-show text-right mt-3">
                <button type="submit" value="create" name="action" onclick="submitted = true;"
                        class="mt-2 mb-5 btn btn-primary mx-auto">Create</button>
            </div>
        </div>
    </form>
</div>




