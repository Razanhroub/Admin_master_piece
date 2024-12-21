<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="home">
            <img src="{{ asset('Userassets') }}/images/logo_icon.png" alt="icon">
            <span>Dishlicious</span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item  @yield('home-active') "><a href="home" class="nav-link">Home</a></li>
                <li class="nav-item  @yield('menu-active') "><a href="menu" class="nav-link">Menu</a></li>
                <li class="nav-item  @yield('blog-active') "><a href="blog" class="nav-link">Blog</a></li>
                <li class="nav-item  @yield('contact-active') "><a href="contact" class="nav-link">Contact</a></li>
                <li class="nav-item  @yield('about-active') "><a href="about" class="nav-link">About us</a></li>
                <li class="nav-item  @yield('reservation-active') "><a href="reservation" class="nav-link">Book a table</a></li>

            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->