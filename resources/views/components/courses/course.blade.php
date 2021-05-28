<!-- Course Categories, Sub and SubSub -->

<div class="container">
    <div>
        <ul class="d-flex text-decoration-none list-unstyled mt-5">
            <li><a href="{{url('categories/' . $course->subsubcategory->subcategory->category->id . '/subcategories')}}">{{$course->subsubcategory->subcategory->category->name}}</a> > </li>
            <li><a href="{{url('subcategories/' . $course->subsubcategory->subcategory->id . '/subsubcategories')}}">{{$course->subsubcategory->subcategory->name}}</a> > </li>
            <li><a href="{{url('subsubcategories/' . $course->subsubcategory->id)}}">{{$course->subsubcategory->name}}</a></li>
        </ul>
    </div>

    <!-- Course Info -->

    <div class="row d-md-flex justify-content-md-between">
        <div class="col-md-6">
            <h1 class="mt-4 mb-4 font-weight-bold">{{ $course->name }}</h1>
            <p>{{$course->description}}</p>

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
                <p>{{$course->duration}} days</p>
            </div>

            @hasCourse($course)
            @else
                <div class="d-flex align-items-center">
                    <buy-course-btn :course="{{ $course }}" :buy-now="true" class="mr-1"></buy-course-btn>
                    <buy-course-btn :course="{{ $course }}"></buy-course-btn>
                    <p class="text-danger font-weight-bold ml-2 mb-0">{{$course->price/100}} €</p>
                </div>
            @endhasCourse
        </div>
        <div class="col-md-6 col-lg-5 col-xl-4 mt-4">
            <div class="col-12 course-image rounded shadow-sm" style="background-image: url({{  asset('storage/img/courses/' . $course->photo) }})"></div>
        </div>
    </div>

    <!-- Goals -->
    <div class="course-goals d-flex align-items-center mt-4 rounded px-3 font-weight-bold">Goals</div>
    <div class="px-2 px-md-4">
        <p class="mt-2">{{$course->goals}}</p>
    </div>

    <!-- Requirements -->
    <div class="course-goals d-flex align-items-center mt-4 rounded px-3 font-weight-bold">Requirements</div>
    <div class="px-2 px-md-4">
        <p class="mt-2">{{$course->requirements}}</p>
    </div>

    <!-- Description -->
    <div class="course-description rounded py-3 px-4 px-md-5">
        <h2 class="text-center font-weight-bold">Course Description</h2>
        <hr class="col-4">
{{--        <p class="mt-4">{{$course->description}}</p>--}}
        <p class="mt-4"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquam autem dicta dolorem, earum eius incidunt magnam maiores nam natus optio pariatur reiciendis rem repellendus reprehenderit, tempore totam unde, velit?</span><span>Delectus eum officia qui? Amet aperiam aspernatur at dicta distinctio dolores error et excepturi laborum laudantium magni odio officiis, quia sed sit suscipit voluptas voluptatum? Asperiores hic iure officiis qui!</span><span>Amet aperiam deleniti, dolorem exercitationem expedita in itaque, libero minus neque odit perspiciatis placeat quae qui quia ratione, sapiente soluta ut velit vitae voluptates! Asperiores cum minus necessitatibus odit repellendus?</span><span>Dolorem eaque expedita laudantium nihil ratione sed! Consequuntur dicta, dignissimos dolor ducimus est harum, ipsa ipsam itaque odit omnis quasi quia quidem ratione repellendus sint sit suscipit ut vel voluptate.</span><span>A debitis dignissimos doloremque iste necessitatibus nulla quae quia totam? Explicabo facilis fugiat necessitatibus nulla reprehenderit vero voluptatibus! Aliquid atque beatae earum maxime molestiae odit possimus quidem reiciendis suscipit voluptas.</span><span>Asperiores doloribus iure voluptatum. Architecto commodi ex fugit ipsa nulla porro quae. Accusantium, consequuntur corporis cupiditate dolor eius, error exercitationem ipsum magnam maiores, pariatur quasi quibusdam rerum totam unde voluptatum?</span><span>Aliquid aperiam architecto asperiores at aut culpa, cum deserunt distinctio dolorum eius error fugit illo iste nam natus praesentium quibusdam quos sapiente similique suscipit tempore ullam unde vitae voluptatem voluptates?</span><span>Accusamus deserunt earum exercitationem illum iure, laboriosam natus, perferendis ratione rem reprehenderit saepe sequi sit vero? A adipisci amet consectetur cum eaque, necessitatibus numquam odio recusandae, repellendus, sequi ullam unde.</span><span>Ad deserunt est facilis illo ipsam magni nobis odit praesentium qui quos ratione, rem sint sit, voluptas voluptates. Accusantium perspiciatis quam quibusdam tempora voluptatibus. Fugiat ipsam placeat sequi sint temporibus?</span><span>Adipisci alias animi assumenda at blanditiis corporis cum enim expedita explicabo facere facilis ipsam ipsum maxime minus necessitatibus nesciunt nobis non, nostrum nulla obcaecati quod recusandae reiciendis repellendus soluta tempora?</span></p>
    </div>

    <!-- Content -->
    <div class="course-goals d-flex align-items-center mt-4 rounded px-3 font-weight-bold">Content</div>

    <div class="mb-5">
        <div id="accordion">
            @foreach($course->modules as $index => $module)
                <div class="card">
                    <div class="card-header" id="heading">
                        <h5 class="mb-0">
                            <button class="btn module-name" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $index }}">{{ $index+1 . ' - ' . $module->name }}</button>
                        </h5>
                    </div>

                    <div id="collapse-{{$index}}" class="collapse" aria-labelledby="heading" data-parent="#accordion">
                        @foreach($module->lessons as $lesson)
                            <div class="card-body px-5">
                                @hasCourse($course)
                                <a class="lesson-name text-decoration-none" href="{{url('lessons/' . $lesson->id)}}">{{ $index+1 . '.' . ($loop->index + 1) . ' - ' . $lesson->title }} </a>
                                @else
                                    <i class="bi bi-lock-fill text-dark"></i> <a class="lesson-name text-decoration-none">{{$lesson->title}} </a>
                                    @endhasCourse
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
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
