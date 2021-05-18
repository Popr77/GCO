<!-- Course Categories, Sub and SubSub -->

<div class="container px-0">
    <ul class="d-flex text-decoration-none list-unstyled mt-5">
        <li><a href="{{url('categories/' . $course->subsubcategory->subcategory->category->id)}}">{{$course->subsubcategory->subcategory->category->name}}</a> > </li>
        <li><a href="{{url('subcategories/' . $course->subsubcategory->subcategory->id)}}">{{$course->subsubcategory->subcategory->name}}</a> > </li>
        <li><a href="{{url('subsubcategories/' . $course->subsubcategory->id)}}">{{$course->subsubcategory->name}}</a></li>
    </ul>
</div>

<!-- Course Info -->

<div class="container d-flex flex-column px-0">
    <div class="row">
        <div class="col-md-6">
            <h1 class="mt-4 mb-4">{{ $course->name }}</h1>
            <p  class="w-50">{{$course->description}}</p>

            <div class="d-flex">
                <p class="font-weight-bold mr-1">Rating:</p>
            </div>

            <div class="d-flex">
                <p class="font-weight-bold mr-1">Duration:</p>
                <p>{{$course->duration}} days</p>
            </div>

            <div class="d-flex align-items-center">
                <button class="btn btn-primary mr-2">Buy Now</button>
                <button class="btn btn-primary"><i class="bi bi-cart"></i></button>
                <p class="text-danger font-weight-bold ml-2 mb-0">{{$course->price/100}} €</p>
            </div>
        </div>

        <div class="col-md-6 d-flex justify-content-end">
            <img class="w-75 mt-5 rounded" src="https://miro.medium.com/max/12032/0*lPCw4WxmuDmUwf5O">
        </div>
    </div>
</div>

<!-- Goals -->

<div class="course-goals container d-flex align-items-center mt-4 rounded">Goals</div>

<div class="container">
    <p class="mt-2">{{$course->goals}}</p>
</div>

<!-- Requirements -->

<div class="course-goals container d-flex align-items-center mt-4 rounded">Requirements</div>

<div class="container">
    <p class="mt-2">{{$course->requirements}}</p>
</div>

<!-- Description -->

<div class="course-description container rounded py-3 px-3">
    <h2 class="text-center">Course Description</h2>
    <p class="mt-4">{{$course->description}}</p>
</div>

<!-- Content -->

<div class="course-goals container d-flex align-items-center mt-4 rounded">Content</div>

<div class="container px-0">
    <div id="accordion">
            @foreach($course->modules as $index => $module)
                <div class="card">
                    <div class="card-header" id="heading">
                        <h5 class="mb-0">
                            <button class="btn module-name" data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $index }}">{{ $module->name }}</button>
                        </h5>
                    </div>

                    <div id="collapse-{{$index}}" class="collapse" aria-labelledby="heading" data-parent="#accordion">
                        @foreach($module->lessons as $lesson)
                            <div class="card-body">
                                @hasCourse($course)
                                <a class="lesson-name text-decoration-none" href="{{url('lessons/' . $lesson->id)}}">{{$lesson->title}} </a>
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

<!-- Feedback -->

<div class="course-goals container-fluid d-flex justify-content-center align-items-center mt-4">Feedback</div>

<div class="course-feed">
    <div class="container">

    </div>
</div>

<!-- Related Courses -->
@hasCourse($course)
    @hasGrade($course)
        <p>cenas</p>
    @endhasGrade
@endhasCourse

<h2 class="container-fluid d-flex justify-content-center align-items-center mt-4">Related Courses</h2>
