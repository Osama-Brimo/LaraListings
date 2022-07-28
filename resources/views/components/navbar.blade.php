<header id="navbar">
    <div class="navbar-container">
        <div class="logo-container">
            <a href="/">
                <img height="52" width="50" class="logo-container-logo" src="{{ url('imgs/logo.png') }}"
                    alt="Laravel">
                <span class="logo-container-name">LaraListings</span>
            </a>
        </div>

        <nav>
            @auth
                <a href="/user/{{ auth()->user()->id }}"><strong>{{ auth()->user()->name }}</strong></a>
                <a href="/user/logout">Logout</a>
            @endauth

            @guest
                <ul>
                    <li>
                        <a href="/user/register">Register</a>
                    </li>
                    <li>
                        <a href="/user/login">Login</a>
                    </li>
                </ul>
            @endguest
        </nav>

    </div>
</header>
