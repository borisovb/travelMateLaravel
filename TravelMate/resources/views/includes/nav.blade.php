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

    </ul>

    <ul class="authMenu">
        @guest

        <li class="register">
            @if (Route::has('register'))
                <a href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Register</a>
            @endif
        </li>
        <li class="login">
            <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
        </li>
        @else
        <li class="register">
                <a href="/stories/create"> <i class="fas fa-plus-circle"></i> New Story
                </a>
        </li>
        <li class="register">
            <a href="/dashboard"> <i class="fas fa-columns"></i> Dashboard </a>
        </li>
        @if (auth()->user()->isAdmin || auth()->user()->isEditor)
        <li class="register">
                <a href="/admin"> <i class="fas fa-cogs"></i> Admin Panel </a>
            </li>
        @endif

        <li class="register">
            <i class="fas fa-sign-out-alt"></i> <a href="{{ route('logout') }}" onclick="event.preventDefault();
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
