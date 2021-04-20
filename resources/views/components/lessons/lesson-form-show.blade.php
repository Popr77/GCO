<div class="container col-lg-12 mx-auto mt-5 text-center">
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <h2 class="text-center">{{$lesson->lesson_number . '. ' . $lesson->title}}</h2>

    @foreach($lesson->contents as $content)
        @if($content->type->name == "link")
                <div class="master-video-container col-md-7 mt-5 mb-5 rounded">
                    <div class="video-container">
                        <div id="ytplayer" class="mx-auto mb-3 iframe-lesson"></div>
                    </div>
                </div>
                <script>
                    // Load the IFrame Player API code asynchronously.
                    let tag = document.createElement('script');
                    tag.src = "https://www.youtube.com/player_api";
                    let firstScriptTag = document.getElementsByTagName('script')[0];
                    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

                    // Replace the 'ytplayer' element with an <iframe> and
                    // YouTube player after the API code downloads.
                    let player;
                    let width =  window.innerWidth*0.5;
                    let height =  window.innerWidth/2.5;
                    console.log(width)
                    console.log(height)

                    let res = "{{$content->content}}".split("https://www.youtube.com/watch?v=");
                    let res2 = res[1].split("&");

                    function onYouTubePlayerAPIReady() {
                        player = new YT.Player('ytplayer', {
                            videoId: "H0vzoYSr3nk"
                        });
                    }
                </script>
        @elseif($content->type->name == "text")
                <div class="container container-lesson-text w-75 ml-1 mt-5  mb-5 rounded">
                    <p>{{$content->content}}</p>
                </div>
        @else
                <div class="p-2 col-lg-5"><img class="col-12" src="asset('{{$content->content}}')" alt=""></div>
            @endif
    @endforeach

        {{--    <iframe id="ytplayer" class="mx-auto iframe-lessons" type="text/html" width="640" height="360"--}}
    {{--            src="http://www.youtube.com/embed/M7lc1UVf-VE?autoplay=1&origin=http://example.com"--}}
    {{--            frameborder="0"/>--}}


    <div class="btn-lessons-menu float-right">
        <button class="btn btn-primary px-2 py-0 mt-2 mr-2" border rounded type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <i class="bi bi-list-check"></i>
        </button>
    </div>


    <div class="collapse" id="collapseExample">
        <div class="card card-body lessons-menu rounded col-lg-2 py-3 px-4" id="lesson-menu">
            <h4 class="text-primary text-center">Lessons</h4>
            <div class=" d-flex flex-row container-fluid">
                <div>
                    <h5 class="ml-2 mt-3">Module 1</h5>
                    <p class="ml-4">Lesson 1</p>
                    <p class="ml-4">Lesson 2</p>
                    <p class="ml-4">- Quizz</p>
                </div>
                <div>
                    <h5 class="ml-2 mt-3">Module 2</h5>
                    <p class="ml-4">Lesson 3</p>
                    <p class="ml-4">Lesson 4</p>
                    <p class="ml-4">Lesson 5</p>
                    <p class="ml-4">- Quizz</p>
                </div>
                <div>
                    <h5 class="ml-2 mt-3">Module 3</h5>
                    <p class="ml-4">Lesson 6</p>
                    <p class="ml-4">Lesson 7</p>
                    <p class="ml-4">- Quizz</p>
                </div>
                <div>

                    <h5 class="ml-2 mt-3">Module 4</h5>
                    <p class="ml-4">Lesson 8</p>
                    <p class="ml-4">- Quizz</p>
                </div>
                <div>
                    <h5 class="ml-2 mt-3">Module 5</h5>
                    <p class="ml-4">Lesson 9</p>
                    <p class="ml-4">Lesson 10</p>
                    <p class="ml-4">Lesson 11</p>
                    <p class="ml-4">- Quizz</p>
                </div>
            </div>

            <div class="lesson-menu-quizz bg-light mt-0 container-fluid text-center
    position-fixed py-3  my-auto">
                <button class="btn btn-primary">Take Quizz</button>
            </div>
        </div>


    </div>

    <div class="lessons-menu2 rounded col-2 py-3 px-4" >

        <h4 class="text-primary text-center">Lessons</h4>
        <h5 class="ml-2 mt-3">Module 1</h5>
        <p class="ml-4">Lesson 1</p>
        <p class="ml-4">Lesson 2</p>
        <p class="ml-4">- Quizz</p>

        <h5 class="ml-2 mt-3">Module 2</h5>
        <p class="ml-4">Lesson 3</p>
        <p class="ml-4">Lesson 4</p>
        <p class="ml-4">Lesson 5</p>
        <p class="ml-4">- Quizz</p>

        <h5 class="ml-2 mt-3">Module 3</h5>
        <p class="ml-4">Lesson 6</p>
        <p class="ml-4">Lesson 7</p>
        <p class="ml-4">- Quizz</p>

        <h5 class="ml-2 mt-3">Module 4</h5>
        <p class="ml-4">Lesson 8</p>
        <p class="ml-4">- Quizz</p>

        <h5 class="ml-2 mt-3">Module 5</h5>
        <p class="ml-4">Lesson 9</p>
        <p class="ml-4">Lesson 10</p>
        <p class="ml-4">Lesson 11</p>
        <p class="ml-4">- Quizz</p>
        <h5 class="ml-2 mt-3">Module 5</h5>
        <p class="ml-4">Lesson 9</p>
        <p class="ml-4">Lesson 10</p>
        <p class="ml-4">Lesson 11</p>
        <p class="ml-4">- Quizz</p>
        <h5 class="ml-2 mt-3">Module 5</h5>
        <p class="ml-4">Lesson 9</p>
        <p class="ml-4">Lesson 10</p>
        <p class="ml-4">Lesson 11</p>
        <p class="ml-4">- Quizz</p>
        <h5 class="ml-2 mt-3">Module 5</h5>
        <p class="ml-4">Lesson 9</p>
        <p class="ml-4">Lesson 10</p>
        <p class="ml-4">Lesson 11</p>
        <p class="ml-4">- Quizz</p>
        <h5 class="ml-2 mt-3">Module 5</h5>
        <p class="ml-4">Lesson 9</p>
        <p class="ml-4">Lesson 10</p>
        <p class="ml-4">Lesson 11</p>
        <p class="ml-4">- Quizz</p>
        <h5 class="ml-2 mt-3">Module 5</h5>
        <p class="ml-4">Lesson 9</p>
        <p class="ml-4">Lesson 10</p>
        <p class="ml-4">Lesson 11</p>
        <p class="ml-4">- Quizz</p>

        <div class="lesson-menu-quizz2 mt-0 container-fluid col-2 text-center
    position-fixed bg-light py-3">
            <button class="btn btn-primary ">Take Quizz</button>
        </div>

    </div>
    {{--    <div class="lessons-menu-quizz container-fluid col-2 text-center--}}
    {{--    position-fixed bg-light py-3">--}}
    {{--        <button class="btn btn-primary ">Take Quizz</button>--}}
    {{--    </div>--}}





</div>
