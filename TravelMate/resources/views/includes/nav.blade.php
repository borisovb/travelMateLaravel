<nav>

    <div id="logo">
        <a href="/">
            <img src="{{ asset('img/logoText.png') }}" />
        </a>
    </div>

    <ul class="menu">
        <li class="home">
            <a href="/">Home</a>
        </li>
        <li class="stories">
            <a href="/stories">Stories</a>
        </li>
        <li class="info">
            <a href="/info">Useful Info</a>
        </li>
        <li class="about">
            <a href="/about">About</a>
        </li>
    </ul>

    <ul class="authMenu">
        @guest
        <li class="login">
            <a href="{{ route('login') }}">Login</a>
        </li>
        <li class="register">
            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
        </li>
        @else
        <li class="register">
            <a href="/dashboard"> <i class="far fa-user-circle"></i> {{ Auth::user()->name }} </a>
        </li>
        <li class="register">
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
        @endguest
    </ul>


</nav>
