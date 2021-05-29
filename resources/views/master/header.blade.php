<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm justify-content-between">
    <a class="navbar-brand text-primary font-weight-bold" href="/">GCO</a>

    <div class="d-flex align-items-center order-md-2" id="navToggleBtnAndCart">
        <cart id="cart" class="mr-4 order-lg-2" user-id="{{ auth()->check() ? auth()->user()->id : null }}"></cart>
        <button class="navbar-toggler order-lg-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>

    <search-bar
        :has-dropdown="{{ request()->is('home') || request()->is('/') ? 'false' : 'true' }}"
        class="search-div order-md-1 mx-auto"
        action="{{ route('home') }}"
        search-query-string="{{ request()->query('search') ?? '' }}">
    </search-bar>

    <div class="collapse navbar-collapse d-lg-flex justify-content-between order-md-2 flex-lg-grow-0" id="navbarCollapse">
        <ul class="navbar-nav d-lg-flex flex-lg-row align-items-lg-center">
            @guest
                <li class="nav-item mx-sm-1 flex-fill">
                    <a href="{{ route('login') }}" class="btn btn-primary my-1 my-lg-0 w-100">Log In</a>
                </li>
                <li class="nav-item mx-sm-1 flex-fill">
                    <a href="{{ route('register') }}" class="btn btn-primary my-1 my-lg-0 w-100">Register</a>
                </li>
            @else
                @admin
                <li class="nav-item mx-sm-1 flex-fill">
                    <a href="{{ url('dashboard') }}" class="btn btn-primary my-1 my-lg-0 w-100">Admin Dashboard</a>
                </li>
                @endadmin

                <li class="nav-item mx-sm-1 flex-fill">
                    <a href="#" class="btn btn-primary my-1 my-lg-0 w-100" data-toggle="dropdown">My Courses</a>
                    <div class="dropdown-menu p-4 shadow my-courses-dropdown">
                        <div class="form-group">
                            @foreach($myCourses as $course)
                            <div class="row px-3">
                                <a class="text-decoration-none a-hover " href="{{ url('courses/' . $course->id) }}">{{ $course->name }}</a>
                            </div>
                            <hr>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{ url('progress') }}" class="btn btn-primary ">My Progress</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item mx-sm-1 flex-fill dropdown">
                    <a class="nav-link dropdown-toggle w-100 d-none d-lg-block" id="nav-username" data-toggle="dropdown" href="#"
                       role="button" aria-haspopup="true" aria-expanded="false"><i class="bi bi-person-fill"></i> {{ auth()->user()->userData->name }}</a>
                    <div class="dropdown-menu dropdown-menu-right" id="navUserMenu">
                        <div id="navUserMenuInfo" class="d-flex align-items-center">
                            <img class="rounded-circle" src="{{ asset('storage/img/users/'. auth()->user()->userData->photo)}}" alt="">
                            <div class="ml-2">
                                <h4 class="mb-0">{{auth()->user()->userData->name}}</h4>
                                <h6>{{auth()->user()->userData->email}}</h6>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('profile/'.auth()->user()->id).'/edit' }}">Edit Profile</a>
                        <a class="dropdown-item" href="/purchases">Purchase History</a>
                        <a class="dropdown-item" href="/progress">My Progress</a>
                        <a class="dropdown-item" href="/help">Help</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
