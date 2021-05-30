<!-- Course Categories, Sub and SubSub -->

<div class="container">
    {{--    <div>--}}
    {{--        <ul class="d-flex text-decoration-none list-unstyled mt-5">--}}
    {{--            <li><a href="{{url('categories/' . $course->subsubcategory->subcategory->category->id . '/subcategories')}}">{{$course->subsubcategory->subcategory->category->name}}</a> > </li>--}}
    {{--            <li><a href="{{url('subcategories/' . $course->subsubcategory->subcategory->id . '/subsubcategories')}}">{{$course->subsubcategory->subcategory->name}}</a> > </li>--}}
    {{--            <li><a href="{{url('subsubcategories/' . $course->subsubcategory->id)}}">{{$course->subsubcategory->name}}</a></li>--}}
    {{--        </ul>--}}
    {{--    </div>--}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb pl-0 mt-5 mb-0">
            <li class="breadcrumb-item">
                <a href="{{url('categories/' . $course->subsubcategory->subcategory->category->id . '/subcategories')}}">
                    {{$course->subsubcategory->subcategory->category->name}}
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{url('subcategories/' . $course->subsubcategory->subcategory->id . '/subsubcategories')}}">
                    {{$course->subsubcategory->subcategory->name}}
                </a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ auth()->check() ? route('home', ['search' => $course->subsubcategory->name]) : url('/?search=' . $course->subsubcategory->name) }}">
                    {{$course->subsubcategory->name}}
                </a>
            </li>
        </ol>
    </nav>

    <!-- Course Info -->

    <div class="row d-md-flex justify-content-md-between">
        <div class="col-md-6">
            <h1 class="mt-4 mb-4 font-weight-bold">{{ $course->name }}</h1>

            <p class="mb-3">
                {!! implode('.', array_slice(explode('.', $course->description), 0, 2)) !!}...
            </p>

            <div class="d-flex align-items-center">
                <p class="font-weight-bold mr-2 mb-0">Rating:</p>
                <star-rating :increment="0.1"
                             :star-size="20"
                             read-only
                             :show-rating="false"
                             :inline="true"
                             class="mb-1"
                             :rating="{{ $course->students()->avg('feedback_stars') ?? 0 }}"
                ></star-rating>
                <span class="ml-1">({{ $course->students()->where('feedback_stars', '<>', null)->count() }})</span>
            </div>

            <div class="d-flex">
                <p class="font-weight-bold mr-1">Duration:</p>
                <p class="mb-2">{{$course->duration}} days</p>
            </div>

            @hasCourse($course)
            @else
                <div class="d-flex align-items-center">
                    <buy-course-btn :course="{{ $course }}" :buy-now="true" class="mr-1"></buy-course-btn>
                    <buy-course-btn :course="{{ $course }}"></buy-course-btn>
                    <p class="text-danger font-weight-bold ml-2 mb-0">{{ number_format($course->price/100, 2) }} €</p>
                </div>
                @endhasCourse
        </div>
        <div class="col-md-6 col-lg-5 col-xl-4 mt-4">
            <div class="col-12 course-image rounded shadow-sm"
                 style="background-image: url({{  asset('storage/img/courses/' . $course->photo) }})"></div>
        </div>
    </div>

    <!-- Goals -->
    <div class="course-goals d-flex align-items-center mt-4 rounded px-3 font-weight-bold">Goals</div>
    <div class="px-2 px-md-4">
        <p class="mt-3 mb-3">{!! $course->goals !!}</p>
    </div>

    <!-- Requirements -->
    <div class="course-goals d-flex align-items-center rounded px-3 font-weight-bold">Requirements</div>
    <div class="px-2 px-md-4">
        <p class="mt-3 mb-3">{!! $course->requirements!!}</p>
    </div>

    <!-- Description -->
    <div class="course-description rounded py-3 px-4 px-md-5">
        <h2 class="text-center font-weight-bold">Course Description</h2>
        <hr class="col-4">
        <p class="mt-4 mb-3">{!! $course->description !!}</p>
    </div>

    <!-- Content -->
    <div class="course-goals d-flex align-items-center mt-4 rounded px-3 font-weight-bold">Content</div>

    <div class="mb-5">
        <div id="accordion">
            @forelse($course->modules as $index => $module)
                <div class="card">
                    <div class="card-header" id="heading">
                        <h5 class="mb-0">
                            <button class="btn module-name" data-toggle="collapse" data-parent="#accordion"
                                    href="#collapse-{{ $index }}">{{ $index+1 . ' - ' . $module->name }}</button>
                        </h5>
                    </div>

                    <div id="collapse-{{$index}}" class="collapse" aria-labelledby="heading" data-parent="#accordion">
                        @foreach($module->lessons as $lesson)
                            <div class="card-body px-5">
                                @hasCourse($course)
                                <a class="lesson-name text-decoration-none"
                                   href="{{url('lessons/' . $lesson->id)}}">{{ $index+1 . '.' . ($loop->index + 1) . ' - ' . $lesson->title }} </a>
                                @hasQuiz($lesson)
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                     class="bi bi-check" viewBox="0 0 16 16">
                                    <path
                                        d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                </svg>
                                @endhasQuiz
                                @else
                                    <i class="bi bi-lock-fill text-dark"></i> <a
                                        class="lesson-name text-decoration-none">{{$lesson->title}} </a>
                                @endhasCourse
                            </div>
                        @endforeach
                    </div>
                </div>
            @empty
                <div class="card">
                    <p class="text-center mt-3">Lessons will be released soon...</p>
                </div>
            @endforelse
        </div>
    </div>
</div> <!-- End of container -->
<div class="container-fluid pt-3 pb-5" id="feedback-container-fluid">
    <h2 class="text-center font-weight-bold text-light mb-4 container">Feedback</h2>
    <div class="container" id="feedback-container">
        @hasGrade($course)
        @gaveFeedback($course)
        @else
            <div class="row">
                <feedback-form
                    action="{{ url('courses/' . $course->id . '/givefeedback') }}"
                    class="mb-5 col-12">
                    <div slot="token">
                        @csrf
                        @method('PUT')
                    </div>
                </feedback-form>
            </div>
            @endgaveFeedback
            @endhasGrade
            @component('components.courses.feedbacks', ['feedbacks' => $feedbacks])
            @endcomponent
    </div>
</div>
