<div class="container col-lg-12 mx-auto mt-5" >
    <h2 class="text-center">Create Lesson</h2>
    <form method="post"  action="{{ url('lesson')}}">
        @csrf
        <div class="form-group col-6 form-show mx-auto">
            <label for="name" class="mt-3">Name</label>
            <input
                type="text"
                id="name"
                name="name"
                autocomplete="name"
                placeholder="Lesson name"
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

            <label for="name" class="mt-3">Video Link</label>
            <input
                type="text"
                id="videoLink"
                name="videoLink"
                autocomplete="videoLink"
                placeholder="Youtube Video Link"
                class="form-control
            @error('videoLink') is-invalid @enderror"
                value="{{ old('videoLink') }}"
                required
                aria-describedby="nameHelp">
            @error('videoLink')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label for="text1" class="mt-3">Text 1</label>
            <textarea
                rows="7"
                id="text1"
                name="text1"
                class="form-control
            @error('text1') is-invalid @enderror"
                required
                aria-describedby="nameHelp"> {{ old('text1') }} </textarea>
            @error('text1')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label for="text2" class="mt-3">Text 2</label>
            <textarea
                rows="7"
                id="text2"
                name="text2"
                class="form-control
            @error('text2') is-invalid @enderror"
                required
                aria-describedby="nameHelp"> {{ old('text2') }} </textarea>
            @error('text2')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label for="text3" class="mt-3">Text 3</label>
            <textarea
                rows="7"
                id="text3"
                name="text3"
                class="form-control
            @error('text3') is-invalid @enderror"
                required
                aria-describedby="nameHelp"> {{ old('text3') }} </textarea>
            @error('text3')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

{{--            <label for="text4" class="mt-3">Text 4fdfd</label>--}}
{{--            <div id="editor"></div>--}}


{{--            <label for="text5" class="mt-3">Text 5</label>--}}
{{--            <div id="editor2"></div>--}}


            <div class="div-show text-right mt-3">
                <button type="submit" class="mt-2 mb-5 btn btn-primary mx-auto">Create</button>
            </div>
        </div>

    </form>

</div>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>

    // var quill = new Quill('#editor', {
    //     theme: 'snow'
    // });
    // var quill = new Quill('#editor2', {
    //     theme: 'snow'
    // });

</script>
