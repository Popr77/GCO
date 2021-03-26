<div class="container col-lg-12 mx-auto mt-5" >
    <h2 class="text-center">Create Lesson</h2>
    <form method="post"  action="{{ url('lesson')}}">
        @csrf
        <div class="form-group col-6 form-show mx-auto">
            <label for="title" class="mt-3">Name</label>
            <input
                type="text"
                id="title"
                name="title"
                autocomplete="title"
                placeholder="Lesson name"

                class="form-control
            @error('title') is-invalid @enderror"
                value="{{ old('title') }}"
                required
                aria-describedby="nameHelp">
            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label for="lesson_number" class="mt-3">Number of the Lesson</label>
            <input
                type="text"
                id="lesson_number"
                name="lesson_number"
                autocomplete="Lesson Number"
                placeholder="Lesson Number"

                class="form-control
            @error('lesson_number') is-invalid @enderror"
                value="{{ old('lesson_number') }}"
                required
                aria-describedby="nameHelp">
            @error('lesson_number')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label for="module_id" class="mt-3">Module Number</label>
            <input
                type="text"
                id="module_id"
                name="module_id"
                autocomplete="Module Number"
                placeholder="Module Number"

                class="form-control
            @error('module_id') is-invalid @enderror"
                value="{{ old('module_id') }}"
                required
                aria-describedby="nameHelp">
            @error('module_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label for="name" class="mt-3">Video Link</label>
            <input
                type="text"
                id="video-link"
                name="video-link"
                autocomplete="video-link"
                placeholder="Youtube Video Link"
                class="form-control
            @error('video-link') is-invalid @enderror"
                value="{{ old('video-link') }}"
                required
                aria-describedby="nameHelp">
            @error('video-link')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <input
                type="text"
                id="lol"
                name="lol"
                autocomplete="video-link"
                placeholder="Youtube Video Link"
                class="form-control
            @error('lol') is-invalid @enderror"
                value="{{ old('video-link') }}"
                aria-describedby="nameHelp">

            @for($i = 0; $i < $num; $i++)
                <label for="{{'editor' . $i}}" class="mt-3">{{'Content '.($i+1)}}</label>

                <textarea
                    rows="7"
                    id="{{'editor' . $i}}"
                    name="{{'editor' . $i}}"
                    class="form-control
            @error('editor' . $i) is-invalid @enderror"
                    required
                    aria-describedby="nameHelp"> {{ old('editor'.$i) }} </textarea>
                @error('editor' . $i)
                <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
                @enderror

{{--                <div type="text" id="{{'editor' . $i}}" name="{{'editor' . $i}}" class="quill-box rounded"></div>--}}
            @endfor
            <div class="div-show text-right mt-3">
                <button type="submit" class="mt-2 mb-5 btn btn-primary mx-auto">Create</button>
            </div>
        </div>

    </form>


</div>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>


    @for($i = 0; $i < $num; $i++)
        let {{'quill'. $i}} = new Quill('{{'#editor'. $i}}', {
            theme: 'snow'
        });
    @endfor


</script>
