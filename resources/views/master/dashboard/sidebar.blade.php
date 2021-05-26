<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">GCO</div>
    <div class="list-group list-group-flush" id="sidebar-menu">
        <a href="#" class="list-group-item list-group-item-action bg-light nav-link">Dashboard</a>
        <a href="{{ route('d-course-index') }}" class="list-group-item list-group-item-action bg-light nav-link">Courses</a>
        <a href="{{ route('d-module') }}" class="list-group-item list-group-item-action bg-light nav-link">Module - Lessons</a>
        <a href="" id="accordion" class="list-group-item list-group-item-action bg-light nav-link" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapse">Categories</a>

            <div id="collapse" class="collapse list-group list-group-flush" data-parent="#accordion">
                <a type="button" href="{{url('dashboard/categories/create')}}" class="btn btn-primary btn-sm mt-2 ml-2 mr-2">Add Category</a>

                    @foreach($categories as $category)
                    <a class="text-decoration-none ml-5 mt-2" href="{{url('dashboard/categories/' . $category->id . '/edit')}}" >{{$category->name}}</a>                    @endforeach
            </div>

        <a href="{{ route('home') }}" class="py-4 px-5 list-group-item list-group-item-action bg-light nav-link" id="back-to-site-btn">Go Back to Website</a>
    </div>
</div>
