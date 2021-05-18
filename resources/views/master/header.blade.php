<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <a class="navbar-brand" href="/">GCO</a>
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
                <li class="nav-item mx-sm-1 flex-fill order-1">
                    <a href="{{ url('dashboard') }}" class="btn btn-primary my-1 my-lg-0 w-100">Admin Dashboard</a>
                </li>
                @endadmin

                <li class="nav-item mx-sm-1 flex-fill order-1">
                    <a href="#" class="btn btn-primary my-1 my-lg-0 w-100">My Courses</a>
                </li>
                <li class="nav-item mx-sm-1 flex-fill dropdown order-1">
                    <a class="nav-link dropdown-toggle w-100 d-none d-lg-block" data-toggle="dropdown" href="#"
                       role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->userData->name }}</a>
                    <div class="dropdown-menu dropdown-menu-right" id="navUserMenu">
                        <div id="navUserMenuInfo" class="d-flex align-items-center">
{{--                            <p>@php dd(auth()->user()->userData->photo)@endphp</p>--}}
                            <img class="rounded-circle" src="{{ asset('storage/img/users/'. auth()->user()->userData->photo)}}" alt="">
                            <div class="ml-2">
                                <h4 class="mb-0">{{auth()->user()->userData->name}}</h4>
                                <h6>{{auth()->user()->userData->email}}</h6>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('profile/'.auth()->user()->id).'/edit' }}">Edit Profile</a>
                        <a class="dropdown-item" href="#">Account Settings</a>
                        <a class="dropdown-item" href="#">Purchase History</a>
                        <a class="dropdown-item" href="#">Help</a>
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
    <cart></cart>
</nav>
