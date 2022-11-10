<header class="header-style nav-on-top bg-white ">
    <div class="main-nav">
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav class="navbar navbar-expand-lg nav-secondary navbar-light nav-primary-hover nav-line-active">
                        <a class="navbar-brand" href="{{route('website.home')}}"><img class="nav-logo" src="{{asset('frontend/images/logo/sweet-home-logo.jpg')}}" alt="Image not found !"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class=" flaticon-menu flat-small text-primary"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('website.home')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('website.service')}}">Service</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('website.projects')}}">Projects</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('website.gallery')}}">Gallery</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('website.contact')}}">Contact</a>
                                </li>

                                @guest

                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                  @else

                                    <li class="nav-item dropdown">
                                        <a class="nav-link  dropdown-toggle" href="#"> {{ Auth::user()->name }}</a>
                                        <ul class="dropdown-menu">
                                            @if(Auth::user()->role_id == 2)
                                              <li><a class="dropdown-item" href="{{route('user.dashboard')}}">Dashboard</a></li>
                                            @elseif(Auth::user()->role_id == 1)
                                               <li><a class="dropdown-item" href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                            @else
                                              <li> <a class="dropdown-item" href="{{route('seller.dashboard')}}">Dashboard</a></li>
                                            @endif
                                               <li><a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
                                               </li>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                        </ul>
                                    </li>
                                @endguest

                            </ul>

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
