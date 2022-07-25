<header id="navbar">
    <div class="navbar-container">
        <div class="logo-container">
            <a href="/">
                <img class="logo-container-logo" src="{{ url('imgs/logo.png') }}" alt="Laravel">
                <span class="logo-container-name">LaraListings.</span>
            </a>
        </div>

        {{-- <nav>
            <ul>
                <li>
                    <a href="/user/register">Register</a>
                </li>
                <li>
                    <a href="/user/login">Login</a>
                </li>
            </ul>
        </nav> --}}
        <div class="searchbar-container">

            @include('partials._searchbar')
    
    
        </div>
    </div>

    {{-- <div class="searchbar-container">

        @include('partials._searchbar')


    </div> --}}
</header>
