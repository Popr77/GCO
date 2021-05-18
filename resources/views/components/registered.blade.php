<!-- Username welcome -->

<div class="container-fluid col-lg-12 welcome-message d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="mt-3 text-center">
            <h1 class="welcome-user">Hello, {{ auth()->user()->userData->name }}</h1>
            <img src="https://i.pinimg.com/originals/7c/c7/a6/7cc7a630624d20f7797cb4c8e93c09c1.png" alt="..."
                 class="rounded-circle" style="width: 150px">
        </div>
    </div>
</div>

<!-- Courses title and categories button -->

<h1 class="title-courses text-center mt-5 mb-5">Enjoy our Courses</h1>

<!-- Courses grid -->

<div class="container">
    <div class="dropdown d-flex justify-content-end">
        <button class="btn btn-primary dropdown-toggle mb-3" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categories
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="/categories">See All</a>
            <a class="dropdown-item" href="#">Programming</a>
            <a class="dropdown-item" href="#">Music</a>
            <a class="dropdown-item" href="#">Networking</a>
            <a class="dropdown-item" href="#">Sports</a>
            <a class="dropdown-item" href="#">Marketing</a>
            <a class="dropdown-item" href="#">Finances</a>
        </div>
    </div>


    <course-list></course-list>
</div>
