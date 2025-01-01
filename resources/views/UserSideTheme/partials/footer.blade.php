<footer class="ftco-footer ftco-section">
    <div class="container-fluid px-md-5 px-3">
        <div class="row mb-5">
            <!-- Dishlicious Section -->
            <div class="col-md-4">
                <div class="ftco-footer-widget mb-4">
                    <h5 class="ftco-heading-custome">Dishlicious</h5>
                    <div class="line"></div>
                    <p>
                        In a land of culinary wonders, beyond the hills of flavor and the valleys of taste, lies a realm
                        where recipes come to life. Journey with us through the enchanted kitchens of Dishlicious, where
                        every dish tells a story and every ingredient has a secret to share.
                    </p>
                </div>
            </div>

            <!-- Quick Links Section -->
            <div class="col-md-4">
                <div class="ftco-footer-widget mb-4">
                    <h5 class="ftco-heading-custome">Quick Links</h5>
                    <div class="line"></div>
                    <div class="row">
                        <div class="col-6">
                            <ul class="list-unstyled">
                                <li><a href="{{ url('/userhome') }}">Home</a></li>
                                <li><a href="{{ url('/menu') }}">Recipes</a></li>
                                <li><a href="{{ url('/categories') }}">Categories</a></li>
                                <li><a href="{{ url('/blog') }}">Blog</a></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="list-unstyled">
                                <li><a href="{{ url('/contact') }}">Contact</a></li>
                                <li><a href="{{ url('/about') }}">About Us</a></li>
                                <li><a href="{{ url('/profile') }}">Profile</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="col-md-4">
                <div class="ftco-footer-widget mb-4">
                    <h5 class="ftco-heading-custome">Contact Us</h5>
                    <div class="line"></div>
                    <ul class="list-unstyled">
                        <li>
                            <span class="icon-phone"></span> +9628855120
                        </li>
                        <li>
                            <a href="mailto:razan.b.alhroub@gmail.com">
                                <span class="icon-envelope"></span> razan.b.alhroub@gmail.com
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/in/razan-alhroub-67857a2a7/">
                                <span class="icon-linkedin"></span> LinkedIn
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/Razanhroub">
                                <span class="icon-github"></span> GitHub
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Row -->
        <div class="row">
            <div class="col-md-12 text-center">
                <p>
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved for Dishlicious. <i class="icon-heart" aria-hidden="true"></i>
                </p>
            </div>
        </div>
    </div>
</footer>

<style>
    .ftco-footer {
        background: #111; /* Original footer background color */
        color: #fff;
        padding: 4rem 0;
        font-family: Arial, sans-serif;
    }

    .ftco-footer h5 {
        font-size: 1.625rem; /* Increased text size */
        margin-bottom: 0.5rem;
        color: #fff; /* White color for headings */
    }

    .ftco-footer .line {
        height: 0.1875rem;
        width: 3.125rem;
        background-color: #ff5733;
        margin-bottom: 1rem;
    }

    .ftco-footer p,
    .ftco-footer ul {
        color: #ccc;
        font-size: 1.125rem; /* Increased text size */
    }

    .ftco-footer ul {
        list-style: none;
        padding: 0;
    }

    .ftco-footer ul li {
        margin-bottom: 0.75rem; /* Increased margin */
    }

    .ftco-footer ul li a {
        color: #fff;
        text-decoration: none;
        transition: color 0.3s;
        font-size: 1.125rem; /* Increased text size */
    }

    .ftco-footer ul li a:hover {
        color: #ff5733;
    }

    .ftco-footer .icon-phone,
    .ftco-footer .icon-envelope,
    .ftco-footer .icon-linkedin,
    .ftco-footer .icon-github {
        margin-right: 0.625rem;
        font-size: 1.25rem; /* Increased icon size */
    }

    .ftco-footer .text-center p {
        margin: 0;
        color: #ccc;
        font-size: 1.125rem; /* Increased text size */
    }

    .ftco-heading-custome {
        color: white;
    }
</style>