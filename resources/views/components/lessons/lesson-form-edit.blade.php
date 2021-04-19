<div class="container col-lg-12 mx-auto mt-5" >
    <h2 class="text-center">Lesson Overview</h2>
    <form method="post"  action="{{ url('lessons/' . $lesson->id)}}">
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
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
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
                    value="@if(isset($lesson->title)){{$lesson->title}}@else{{ old('title')}}@endif"
                    required
                    aria-describedby="nameHelp">
                @error('title')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror

                <label for="lesson_number" class="mt-3">Number of the Lesson</label>
                <input
                    type="number"
                    id="lesson_number"
                    name="lesson_number"
                    autocomplete="Lesson Number"
                    placeholder="Lesson Number"

                    class="form-control
            @error('lesson_number') is-invalid @enderror"
                    value="@if(isset($lesson->lesson_number)){{$lesson->lesson_number}}@else{{old('lesson_number')}}@endif"
                    required
                    aria-describedby="nameHelp">
                @error('lesson_number')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror

                <label for="module_id" class="mt-3">Module Number</label>
                <input
                    type="number"
                    id="module_id"
                    name="module_id"
                    autocomplete="Module Number"
                    placeholder="Module Number"

                    class="form-control
            @error('module_id') is-invalid @enderror"
                    value="@if(isset($lesson->module_id)){{$lesson->module_id}}@else{{old('module_id')}}@endif"
                    required
                    aria-describedby="nameHelp">
                @error('module_id')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror

                @foreach($lesson->contents as $content)
                    <label for="{{'editor' . $loop->index}}" class="mt-3">{{'Content '.($loop->index+1)}}</label>

                    <textarea
                        rows="7"
                        id="{{'editor' . $loop->index}}"
                        name="{{'editor' . $loop->index}}"
                        class="form-control
                @error('editor' . $loop->index) is-invalid @enderror"
                        aria-describedby="nameHelp">
                    @if(isset($content->content)){{$content->content}}@else{{old('editor'.$loop->index)}}@endif</textarea>
                    @error('editor' . $loop->index)
                    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
                    @enderror

                                    <div type="text" id="{{'editor' . $loop->index}}" name="{{'editor' . $loop->index}}" class="quill-box rounded"></div>
                @endforeach
                <div class="div-show text-right mt-3">
                    <button type="submit" value="save" name="action" onclick="submitted = true;"
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
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
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

                <label for="lesson_number" class="mt-3">Number of the Lesson</label>
                <input
                    type="number"
                    id="lesson_number"
                    name="lesson_number"
                    autocomplete="Lesson Number"
                    placeholder="Lesson Number"

                    class="form-control
            @error('lesson_number') is-invalid @enderror"
                    value="@if(isset($lesson_number)){{$lesson_number}}@else{{old('lesson_number')}}@endif"
                    required
                    aria-describedby="nameHelp">
                @error('lesson_number')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror

                <label for="module_id" class="mt-3">Module Number</label>
                <input
                    type="number"
                    id="module_id"
                    name="module_id"
                    autocomplete="Module Number"
                    placeholder="Module Number"

                    class="form-control
            @error('module_id') is-invalid @enderror"
                    value="@if(isset($module_id)){{$module_id}}@else{{old('module_id')}}@endif"
                    required
                    aria-describedby="nameHelp">
                @error('module_id')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror


                @for($i = 0; $i < $num; $i++)

                <label for="{{'editor' . $i}}" class="mt-3">{{'Content '.($i+1)}}</label>

                    <textarea
                        rows="7"
                        id="{{'editor' . $i}}"
                        name="{{'editor' . $i}}"
                        class="form-control
            @error('editor' . $i) is-invalid @enderror"
                        aria-describedby="nameHelp">
                    @if(isset($quillItems[$i])){{$quillItems[$i]}}@else{{old('editor'.$i)}}@endif</textarea>
                    @error('editor' . $i)
                    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
                    @enderror

                                    <div type="text" id="{{'editor' . $i}}" name="{{'editor' . $i}}" class="quill-box rounded"></div>
                @endfor
                <div class="div-show text-right mt-3">
                    <button type="submit" value="save" name="action" onclick="submitted = true;"
                            class="mt-2 mb-5 btn btn-primary mx-auto">Save</button>
                </div>
            @endif


        </div>

    </form>


</div>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    let submitted = false;
    @if(!isset($num) && isset($lesson))
{{--    {{dd($lesson->contents)}}--}}

        @foreach($lesson->contents as $content)
            let {{'quill'. $loop->index}} = new Quill('{{'#editor'. $loop->index}}', {
                theme: 'snow'
            });
            @if ($loop->index == 0)
                document.querySelector('#containers').selectedIndex = {{count($lesson->contents)-1}};
            @endif
            document.querySelector('{{'#editor'. $loop->index}}').innerHTML="@if(isset($content->content)){{$content->content}}@else{{old('editor'.$loop->index)}}@endif"

        @endforeach


    @else
        @for($i = 0; $i < $num; $i++)
            let {{'quill'. $i}} = new Quill('{{'#editor'. $i}}', {
                theme: 'snow'
            });

            @if ($i == 0)
                document.querySelector('#containers').selectedIndex = {{$num-1}};
            @endif
            document.querySelector('{{'#editor'. $i}}').innerHTML="@if(isset($quillItems[$i])){{$quillItems[$i]}}@else{{old('editor'.$i)}}@endif"

    @endfor


    @endif


{{--    @if(!isset($num) && isset($lesson))--}}
{{--        @if ($i == 0)--}}
{{--            document.querySelector('#containers').selectedIndex = {{count($lesson->contents)-1}};--}}
{{--        @endif--}}

{{--    @else--}}
{{--        --}}

{{--         document.querySelector('{{'#editor'. $i}}').innerHTML="@if(isset($quillItems[$i])){{$quillItems[$i]}}@else{{old('editor'.$i)}}@endif"--}}
{{--    @endif--}}





    // impedir o refresh por f5
    window.onbeforeunload = function() {
        //      // addTolink();
        //         console.log("clicou")
        if (!submitted)
            return "Are you sure you want to leave?";

    }

    const formEl = document.querySelector('form');

    formEl.addEventListener('submit', (e)=>{
        // Impedir o envio do formulario
        e.preventDefault()

        console.log("flag")
        // $(window).off('beforeunload');
        // warnBeforeUnload = false;
        submitted = true;
    });


</script>
