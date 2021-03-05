<header role="banner">
    <span class="position-absolute trigger">
        <!-- hidden trigger to apply 'stuck' styles -->
    </span>
    <nav class="navbar sticky-top navbar-expand-md navbar-light bg-light shadow-sm" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('homepage') }}" style="color: red !important;" title="{{ config('app.name', 'NEBRET') }}">
                <img class="img-fluid mr-4" src="../../images/FINAL.png" alt="{{ config('app.name', 'NEBRET') }}" style="width: 7rem !important; object-fit: cover !important;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('homepage') }}">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('listings') }}">AVAILABLE LISTINGS</a>
                    </li>
                    @auth
                        @user
                            <li class="nav-item">
                                <!-- Needs to have a parameter, request-type, 'sell', along with userId -->
                                <a class="nav-link" href="/request">SELL/RENT</a>
                            </li>
                        @enduser

                        @agent
                                <li class="nav-item">
                                    <!-- Needs to have a parameter, request-type, 'rent', along with userId -->
                                    <a class="nav-link" href="{{ route('listings.store') }}">UPLOAD</a>
                                </li>
                        @endagent

                        @admin
                            <li class="nav-item">
                                <!-- Needs to have the userId passed as a param -->
                                <a class="nav-link" href="{{ route('users') }}">USERS</a>
                            </li>
                        @endadmin
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">ABOUT US</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link nav-link-auth" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link nav-link-auth"
                                    href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link  nav-link-auth dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}

                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a>
                                <a class="dropdown-item" href="{{ route('user.edit') }}">Preferences</a>
                                <a class="dropdown-item" href="{{ route('user.likes') }}"> Likes</a>
                                <a class="dropdown-item" href="{{ route('user.listings') }}">Your Listings</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
