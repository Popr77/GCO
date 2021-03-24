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
      <ul class="navbar-nav d-lg-flex flex-lg-row">
        @guest
          <li class="nav-item mx-sm-1 flex-fill">
            <a href="{{ route('login') }}" class="btn btn-primary my-1 my-lg-0 w-100">Log In</a>
          </li>
          <li class="nav-item mx-sm-1 flex-fill">
            <a href="{{ route('register') }}" class="btn btn-primary my-1 my-lg-0 w-100">Register</a>
          </li>
        @else
          <li class="nav-item mx-sm-1 flex-fill">
            <a href="#" class="btn btn-primary my-1 my-lg-0 w-100">My Courses</a>
          </li>
          <li class="nav-item mx-sm-1 flex-fill dropdown">
              <a class="nav-link dropdown-toggle w-100 d-none d-lg-block" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Username</a>
              <div class="dropdown-menu dropdown-menu-right" id="navUserMenu">
                <div id="navUserMenuInfo" class="d-flex align-items-center">
                  <img class="rounded-circle" src="{{ asset('img/avatar.jpeg')}}" alt="">
                  <div class="ml-2">
                    <h4 class="mb-0">First Last</h4>
                    <h6>@username</h6>
                  </div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Profile</a>
                <a class="dropdown-item" href="#">Edit Profile</a>
                <a class="dropdown-item" href="#">Account Settings</a>
                <a class="dropdown-item" href="#">Purchase History</a>
                <a class="dropdown-item" href="#">Help</a>
                <a class="dropdown-item" href="#">Logout</a>
              </div>
          </li>
        @endguest
      </ul>
    </div>
</nav>
