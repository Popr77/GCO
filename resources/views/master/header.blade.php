<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <a class="navbar-brand" href="#">GCO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse d-lg-flex justify-content-between" id="navbarColor03">
      <form class="my-2 my-lg-0 mx-lg-auto">
        <div class="form-control mr-sm-2 rounded-pill w-100 w-md-50" id="search-input">
          <i class="bi bi-search"></i>
          <input type="text" class="border-0" placeholder="Search">
        </div>
      </form>
      <ul class="navbar-nav d-sm-flex flex-sm-row">
        @guest
          <li class="nav-item mx-sm-1 flex-fill">
            <a href="#" class="btn btn-primary my-1 my-lg-0 w-100">Log In</a>
          </li>
          <li class="nav-item mx-sm-1 flex-fill">
            <a href="#" class="btn btn-primary my-1 my-lg-0 w-100">Register</a>
          </li>
        @else
          <li class="nav-item mx-sm-1 flex-fill">
            <a href="#" class="btn btn-primary my-1 my-lg-0 w-100">My Courses</a>
          </li>
          <li class="nav-item mx-sm-1 flex-fill dropdown">
              <a class="nav-link dropdown-toggle w-100" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Username</a>
              <div class="dropdown-menu dropdown-menu-right" id="userMenu">
                <img class="rounded-circle" src="{{ asset('img/avatar.jpeg')}}" alt="">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>
              </div>
          </li>
        @endguest
      </ul> 
    </div>
</nav>
