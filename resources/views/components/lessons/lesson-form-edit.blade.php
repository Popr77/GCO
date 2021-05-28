<div class="container col-lg-12 mx-auto mt-5" >
    <h2 class="text-center">Lesson Edit</h2>
    <div class="d-flex justify-content-between mb-2 px-3 ml-4 mt-1">
        <a class="btn btn-primary" href="{{url('/dashboard/modules/')}}" role="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
            </svg>
        </a>
        <a class="btn btn-primary" href="{{ url('/dashboard/quiz/'.$lesson->id.'/edit')}}" role="button">Edit Quiz</a>
    </div>
    <form method="post"  action="{{ url('dashboard/lessons/' . $lesson->id)}}">
        @csrf
        @method('PUT')
        <div class="form-group col-6 form-show mx-auto">
            @if(!isset($num) && isset($lesson))
                <label for="containers" class="mt-5">Nº of Containers</label>
                <select
                    id="containers"
                    name="containers"
                    required
                    class="browser-default custom-select form-control
            @error('containers') is-invalid @enderror">
                    @for($i=1; $i<=10; $i++)
                        <option
                            @if(count($lesson->contents) == $i) selected="" @endif
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
                    value="@if(isset($lesson->title)){{$lesson->title}}@else{{ old('title')}}@endif"
                    required
                    aria-describedby="nameHelp">
                @error('title')
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
                    @foreach($modules as $module)
                        <option
                            @if($module->id == $lesson->module_id) selected="" @endif
                        value="{{$module->id}}">{{$module->name}}</option>
                    @endforeach
                </select>
                @error('module_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            <h5 class="ql-color-blue mt-5" mb-3 pl-2> - Content will appear in the same order on the page!</h5>
            @foreach($lesson->contents as $content)
                    <label for="{{'editor' . $loop->index}}" class="mt-3">{{'Content '.($loop->index+1)}}</label>

                    <div
                        id="{{'editor' . $loop->index}}"
                        class="form-control quill-editor
                @error('editor' . $loop->index) is-invalid @enderror"
                        aria-describedby="nameHelp">
{{--                    @if(isset($content->content)){{$content->content}}@else{{old('editor'.$loop->index)}}@endif--}}
                    </div>
                    @error('editor' . $loop->index)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input id="{{'inputQuill' . $loop->index}}" name="{{'editor' . $loop->index}}" type="hidden"></input>


                @endforeach
                <div class="div-show text-right mt-3">
                    <button type="submit" value="delete" name="action" onclick="submitted = true;"
                            class="mt-2 mb-5 btn btn-danger mx-auto">Delete Lesson</button>
                    <button value="save" name="action" onclick="submitted = true;"
                            class="mt-2 mb-5 btn btn-primary mx-auto">Save</button>
                </div>
            @else
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
                            {{--                        onclick="addTolink()"--}}
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

                <label for="module_id" class="mt-3">Module</label>
                <select
                    id="module_id"
                    name="module_id"
                    required
                    class="browser-default custom-select form-control
                @error('module_id') is-invalid @enderror">
                    @foreach($modules as $module)
                        <option
                            @if($module_id == $module->id) selected="" @endif
                        value="{{$module->id}}">{{$module->name}}</option>
                    @endforeach
                </select>
                @error('module_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <h5 class="ql-color-blue mt-5" mb-3 pl-2> - Content will appear in the same order on the page!</h5>
                @for($i = 0; $i < $num; $i++)

                    <label for="{{'editor' . $i}}" class="mt-3">{{'Content '.($i+1)}}</label>
                    <div
                        id="{{'editor' . $i}}"
                        class="form-control quill-editor
                    @error('editor' . $i) is-invalid @enderror"
                        aria-describedby="nameHelp">@if(isset($quillItems[$i])){{$quillItems[$i]}}@else{{old('editor'.$i)}}@endif</div>
                    @error('editor' . $i)
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <input id="{{'inputQuill' . $i}}" name="{{'editor' . $i}}" type="hidden"></input>
                @endfor

                <div class="div-show text-right mt-3">
                    <button type="submit" value="delete" name="action" onclick="submitted = true;"
                            class="mt-2 mb-5 btn btn-danger mx-auto">Delete Lesson</button>
                    <button value="save" name="action" onclick="submitted = true;"
                            class="mt-2 mb-5 btn btn-primary mx-auto">Save</button>
                </div>
            @endif
        </div>
    </form>
</div>

