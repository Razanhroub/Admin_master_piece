<nav class="navbar navbar-expand-lg  ftco_navbar  ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="home">
            <img src="{{ asset('Userassets') }}/images/logo_icon.png" alt="icon">
            <span class="my-logo">Dishlicious</span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div id="ftco-nav">
            <ul class="navbar-nav ml-auto navitemswhite">
                <li class="nav-item @yield('userhome-active')"><a href="userhome" class="nav-link">Home</a></li>
                <li class="nav-item @yield('menu-active')"><a href="menu" class="nav-link">Menu</a></li>
                <li class="nav-item @yield('blog-active')"><a href="blog" class="nav-link">Blog</a></li>
                <li class="nav-item @yield('contact-active')"><a href="contact" class="nav-link">Contact</a></li>
                <li class="nav-item @yield('about-active')"><a href="about" class="nav-link">About us</a></li>
                
                @if(session('username'))
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i> {{ session('username') }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" style="color: black !important" href="p">Profile</a>
                            <form action="{{ route('user.userlogout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item @yield('login-active')"><a href="{{ route('user.userlogin') }}" class="nav-link">Login</a></li>
                @endif
            </ul>
            {{-- <ul class="navbar-nav ml-auto navitemswhite">
                <li class=" text-white navbar-brand @yield('userhome-active') "><a href="userhome" class="nav-link">Home</a></li>
                <li class=" navbar-brand @yield('menu-active') "><a href="menu" class="nav-link">Menu</a></li>
                <li class=" navbar-brand @yield('blog-active') "><a href="blog" class="nav-link">Blog</a></li>
                <li class=" navbar-brand @yield('contact-active') "><a href="contact" class="nav-link">Contact</a></li>
                <li class=" navbar-brand @yield('about-active') "><a href="about" class="nav-link">About us</a></li>
                <li class=" navbar-brand @yield('p-active') "><a href="p" class="nav-link">profile</a></li>
                <form action="{{ route('user.userlogout') }}" method="POST">
                    @csrf
                    <button  type="submit">Logout</button>
                </form>

            </ul> --}}
        </div>
    </div>
</nav>
<!-- END nav -->
