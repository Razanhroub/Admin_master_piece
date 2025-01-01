<nav class="navbar navbar-expand-lg  ftco_navbar  ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/userhome') }}">
            <img src="{{ asset('Userassets') }}/images/logo_icon.png" alt="icon">
            <span class="my-logo">Dishlicious</span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div id="ftco-nav">
            <ul class="navbar-nav ml-auto navitemswhite">
                <li class="nav-item @yield('userhome-active')"><a href="{{ url('/userhome') }}" class="nav-link">Home</a></li>
                <li class="nav-item @yield('menu-active')"><a href="{{ url('/menu') }}" class="nav-link">Recipes</a></li>
                <li class="nav-item @yield('categories-active')"><a href="{{ url('/categories') }}" class="nav-link">Categories</a></li>
                <li class="nav-item @yield('blog-active')"><a href="{{ url('/blog') }}" class="nav-link">Blog</a></li>
                <li class="nav-item @yield('contact-active')"><a href="{{ url('/contact') }}" class="nav-link">Contact</a></li>
                <li class="nav-item @yield('about-active')"><a href="{{ url('/about') }}" class="nav-link">About us</a></li>
                
                @if(session('username'))
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i> {{ session('username') }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" style="color: black !important" href="{{ url('/profile') }}">Profile</a>
                            <form action="{{ route('user.userlogout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-lock"></i> 
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" style="color: black !important " href="{{ route('user.userlogin') }}">Login</a>
                            <a class="dropdown-item"  style="color: black !important " href="{{ route('user.userregister') }}">Register</a>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>