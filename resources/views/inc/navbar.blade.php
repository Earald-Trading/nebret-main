<header role="banner">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'MENORIYA') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="/listings">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/listings">AVAILABLE LISTINGS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">ABOUT US</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/listings">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/listings">AVAILABLE LISTINGS</a>
                        </li>
                        <li class="nav-item">
                            <!-- Needs to have a parameter, request-type, 'sell', along with userId -->
                            <a class="nav-link" href="/request-upload">SELL</a>
                        </li>
                        <li class="nav-item">
                            <!-- Needs to have a parameter, request-type, 'rent', along with userId -->
                            <a class="nav-link" href="/request-listing">RENT</a>
                        </li>
                        <li class="nav-item">
                            <!-- Needs to have the userId passed as a param -->
                            <a class="nav-link" href="/dashboard">MY LISTINGS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">ABOUT US</a>
                        </li>
                    @endguest
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
                                <a class="nav-link nav-link-auth" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <a class="dropdown-item" href="/users/{{ Auth::user()->id }}/edit">Edit My Profile</a>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>

