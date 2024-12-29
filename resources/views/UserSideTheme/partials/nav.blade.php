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

        <div  id="ftco-nav">
            <ul class="navbar-nav ml-auto navitemswhite">
                <li class=" text-white navbar-brand @yield('userhome-active') "><a href="userhome" class="nav-link">Home</a></li>
                <li class=" navbar-brand @yield('menu-active') "><a href="menu" class="nav-link">Menu</a></li>
                <li class=" navbar-brand @yield('blog-active') "><a href="blog" class="nav-link">Blog</a></li>
                <li class=" navbar-brand @yield('contact-active') "><a href="contact" class="nav-link">Contact</a></li>
                <li class=" navbar-brand @yield('about-active') "><a href="about" class="nav-link">About us</a></li>
                <li class=" navbar-brand @yield('p-active') "><a href="p" class="nav-link">profile</a></li>
                {{-- <li class=" navbar-brand "><a href="p" class="nav-link">Logout</a></li> --}}
                <form action="{{ route('user.userlogout') }}" method="POST">
                    @csrf
                    <button  type="submit">Logout</button>
                </form>

            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->