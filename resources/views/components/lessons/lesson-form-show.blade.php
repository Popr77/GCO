<div class="d-flex container-fluid justify-content-between px-0">
    <div class="div-backButton-lesson text-left mb-2 p">
        <a class="btn btn-primary d-flex justify-content-center align-items-center" href="javascript:history.back()" role="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
            </svg>
        </a>
    </div>
    <div class="btn-lessons-menu text-right">
        <button class="btn btn-primary px-2 py-0" border rounded type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            <i class="bi bi-list-check"></i>
        </button>
    </div>
</div>
<div class="container-fluid mx-auto mt-2 text-center">
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
                            // videoId: "H0vzoYSr3nk"
                            videoId: res2[0]
                        });
                    }
                </script>
        @elseif($content->type->name == "text")
                <div class="container container-lesson-text mx-auto ml-1 mt-5  mb-5 rounded">
                    <p>{!! $content->content !!}</p>
                </div>
        @else
                <div class="p-2 col-lg-5"><img class="col-12" src="asset('{{$content->content}}')" alt=""></div>
            @endif
    @endforeach

        {{--    <iframe id="ytplayer" class="mx-auto iframe-lessons" type="text/html" width="640" height="360"--}}
    {{--            src="http://www.youtube.com/embed/M7lc1UVf-VE?autoplay=1&origin=http://example.com"--}}
    {{--            frameborder="0"/>--}}


    <div class="collapse" id="collapseExample">
        <div class="card card-body lessons-menu rounded col-lg-2 py-3 px-4" id="lesson-menu">
            <h4 class="text-primary text-center mt-4">Lessons</h4>
            <div class=" d-flex flex-column container-fluid mt-5">
                @foreach($modules as $module)
                <div>
                    <h5 class="ml-2 mt-3">{{$module->name}}</h5>
                    @foreach($module->lessons as $lesson2)
                        <a class="a-lessons text-decoration-none text-dark"
                           href="{{url('/lessons/'.$lesson2->id)}}">
                            <p class="ml-4">{{$lesson2->lesson_number}}. {{$lesson2->title}}</p>
                        </a>
                    @endforeach
                </div>
                @endforeach
            </div>
            <div class="lesson-menu-quiz mt-0 container-fluid text-left
position-fixed py-3  my-auto">
                <button class="btn btn-primary {{$flag ? 'disabled' : null}}" >
                    <a class="{{$flag ? 'disabled' : null}}" style="text-decoration: none; color: white" href="{{route('quiz', ['lesson' => $lesson->id])}}">Take Quizz</a>
                </button>
            </div>
        </div>
    </div>

    <div class="lessons-menu2 rounded col-2 py-3 px-4" >
            @foreach($modules as $module)
                <div class="text-left">
                    <h5 class="ml-2 mt-3">{{$module->name}}</h5>
                    @foreach($module->lessons as $lesson2)
                        <a class="a-lessons text-decoration-none text-dark" href="{{url('/lessons/'.$lesson2->id)}}"><p class="ml-4">{{$lesson2->lesson_number}}. {{$lesson2->title}}</p></a>
                    @endforeach
                </div>
            @endforeach


        <div class="lesson-menu-quizz2 mt-0 container-fluid col-2 text-center
    position-fixed bg-light py-3">
            <button class="btn btn-primary {{$flag ? 'disabled' : null}}" >
                <a class="{{$flag ? 'disabled' : null}}" style="text-decoration: none; color: white" href="{{route('quiz', ['lesson' => $lesson->id])}}">Take Quizz</a>
            </button>
        </div>

    </div>
</div>
