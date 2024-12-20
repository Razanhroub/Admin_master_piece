@extends('UserSideTheme.masters.masterwithslider')
@section('home-active','active')
@section('content')
    <section class="ftco-section ftco-wrap-about ftco-no-pb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-10 wrap-about ftco-animate text-center">
                    <div class="heading-section mb-4 text-center">
                        <span class="subheading">About us</span>
                        <h2 class="mb-4">DishLecious</h2>
                    </div>
                    <p>“An inspiring community for passionate food lovers to dive into diverse flavors, uncover hidden
                        culinary gems, and share cherished recipes from every corner of the globe—where every dish tells
                        a story and every cook becomes a part of something deliciously bigger.”</p>

                    <div class="video justify-content-center">
                        <a href="https://www.youtube.com/watch?v=nf4R6XHCU4Q"
                            class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
                            <span class="ion-ios-play"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section ftco-counter img" id="section-counter"
        style="background-image: url({{ asset('Userassets') }}/images/bg_4.jpeg);" data-stellar-background-ratio="0.5">
        <!-- <section class="ftco-section ftco-counter img ftco-no-pt" id="section-counter"> -->
        <div class="container">
            <div class="row d-md-flex align-items-center justify-content-center">
                <div class="col-lg-10">
                    <div class="row d-md-flex align-items-center">
                        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="text">
                                    <strong class="number" data-number="18">0</strong>
                                    <span>Years of Experienced</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="text">
                                    <strong class="number" data-number="15000">0</strong>
                                    <span>Happy Customers</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="text">
                                    <strong class="number" data-number="100">0</strong>
                                    <span>Menus</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="text">
                                    <strong class="number" data-number="20">0</strong>
                                    <span>Staffs</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Services</span>
                    <h2 class="mb-4">Catering Services</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 d-flex align-self-stretch ftco-animate text-center">
                    <div class="media block-6 services d-block">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="flaticon-cake"></span>
                        </div>
                        <div class="media-body p-2 mt-3">
                            <h3 class="heading">Birthday Party</h3>
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                                unorthographic.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-self-stretch ftco-animate text-center">
                    <div class="media block-6 services d-block">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="flaticon-meeting"></span>
                        </div>
                        <div class="media-body p-2 mt-3">
                            <h3 class="heading">Business Meetings</h3>
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                                unorthographic.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-self-stretch ftco-animate text-center">
                    <div class="media block-6 services d-block">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="flaticon-tray"></span>
                        </div>
                        <div class="media-body p-2 mt-3">
                            <h3 class="heading">Wedding Party</h3>
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                                unorthographic.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container-fluid px-4">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Specialties</span>
                    <h2 class="mb-4">Our Menu</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 menu-wrap">
                    <div class="heading-menu text-center ftco-animate">
                        <h3>Breakfast</h3>
                    </div>
                    <div class="menus d-flex ftco-animate">
                        <div class="menu-img img"
                            style="background-image: url({{ asset('Userassets') }}/images/breakfast-1.jpg);"></div>
                        <div class="text">
                            <div class="d-flex">
                                <div class="one-half">
                                    <h3>Grilled Beef with potatoes</h3>
                                </div>
                                <div class="one-forth">
                                    <span class="price">$29</span>
                                </div>
                            </div>
                            <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                        </div>
                    </div>
                    <div class="menus d-flex ftco-animate">
                        <div class="menu-img img"
                            style="background-image: url({{ asset('Userassets') }}/images/breakfast-2.jpg);"></div>
                        <div class="text">
                            <div class="d-flex">
                                <div class="one-half">
                                    <h3>Grilled Crab with Onion</h3>
                                </div>
                                <div class="one-forth">
                                    <span class="price">$29</span>
                                </div>
                            </div>
                            <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                        </div>
                    </div>
                    <div class="menus d-flex ftco-animate">
                        <div class="menu-img img"
                            style="background-image: url({{ asset('Userassets') }}/images/breakfast-3.jpg);"></div>
                        <div class="text">
                            <div class="d-flex">
                                <div class="one-half">
                                    <h3>Grilled Crab with Onion</h3>
                                </div>
                                <div class="one-forth">
                                    <span class="price">$29</span>
                                </div>
                            </div>
                            <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 menu-wrap">
                    <div class="heading-menu text-center ftco-animate">
                        <h3>Lunch</h3>
                    </div>
                    <div class="menus d-flex ftco-animate">
                        <div class="menu-img img"
                            style="background-image: url({{ asset('Userassets') }}/images/lunch-1.jpg);"></div>
                        <div class="text">
                            <div class="d-flex">
                                <div class="one-half">
                                    <h3>Grilled Beef with potatoes</h3>
                                </div>
                                <div class="one-forth">
                                    <span class="price">$29</span>
                                </div>
                            </div>
                            <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                        </div>
                    </div>
                    <div class="menus d-flex ftco-animate">
                        <div class="menu-img img"
                            style="background-image: url({{ asset('Userassets') }}/images/lunch-2.jpg);"></div>
                        <div class="text">
                            <div class="d-flex">
                                <div class="one-half">
                                    <h3>Grilled Crab with Onion</h3>
                                </div>
                                <div class="one-forth">
                                    <span class="price">$29</span>
                                </div>
                            </div>
                            <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                        </div>
                    </div>
                    <div class="menus d-flex ftco-animate">
                        <div class="menu-img img"
                            style="background-image: url({{ asset('Userassets') }}/images/lunch-3.jpg);"></div>
                        <div class="text">
                            <div class="d-flex">
                                <div class="one-half">
                                    <h3>Grilled Crab with Onion</h3>
                                </div>
                                <div class="one-forth">
                                    <span class="price">$29</span>
                                </div>
                            </div>
                            <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 menu-wrap">
                    <div class="heading-menu text-center ftco-animate">
                        <h3>Dinner</h3>
                    </div>
                    <div class="menus d-flex ftco-animate">
                        <div class="menu-img img"
                            style="background-image: url({{ asset('Userassets') }}/images/dinner-1.jpg);"></div>
                        <div class="text">
                            <div class="d-flex">
                                <div class="one-half">
                                    <h3>Grilled Beef with potatoes</h3>
                                </div>
                                <div class="one-forth">
                                    <span class="price">$29</span>
                                </div>
                            </div>
                            <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                        </div>
                    </div>
                    <div class="menus d-flex ftco-animate">
                        <div class="menu-img img"
                            style="background-image: url({{ asset('Userassets') }}/images/dinner-2.jpg);"></div>
                        <div class="text">
                            <div class="d-flex">
                                <div class="one-half">
                                    <h3>Grilled Crab with Onion</h3>
                                </div>
                                <div class="one-forth">
                                    <span class="price">$29</span>
                                </div>
                            </div>
                            <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                        </div>
                    </div>
                    <div class="menus d-flex ftco-animate">
                        <div class="menu-img img"
                            style="background-image: url({{ asset('Userassets') }}/images/dinner-3.jpg);"></div>
                        <div class="text">
                            <div class="d-flex">
                                <div class="one-half">
                                    <h3>Grilled Crab with Onion</h3>
                                </div>
                                <div class="one-forth">
                                    <span class="price">$29</span>
                                </div>
                            </div>
                            <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                        </div>
                    </div>
                </div>

                <!--  -->
                <div class="col-md-6 col-lg-4 menu-wrap">
                    <div class="heading-menu text-center ftco-animate">
                        <h3>Desserts</h3>
                    </div>
                    <div class="menus d-flex ftco-animate">
                        <div class="menu-img img"
                            style="background-image: url({{ asset('Userassets') }}/images/dessert-1.jpg);"></div>
                        <div class="text">
                            <div class="d-flex">
                                <div class="one-half">
                                    <h3>Grilled Beef with potatoes</h3>
                                </div>
                                <div class="one-forth">
                                    <span class="price">$29</span>
                                </div>
                            </div>
                            <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                        </div>
                    </div>
                    <div class="menus d-flex ftco-animate">
                        <div class="menu-img img"
                            style="background-image: url({{ asset('Userassets') }}/images/dessert-2.jpg);"></div>
                        <div class="text">
                            <div class="d-flex">
                                <div class="one-half">
                                    <h3>Grilled Crab with Onion</h3>
                                </div>
                                <div class="one-forth">
                                    <span class="price">$29</span>
                                </div>
                            </div>
                            <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                        </div>
                    </div>
                    <div class="menus d-flex ftco-animate">
                        <div class="menu-img img"
                            style="background-image: url({{ asset('Userassets') }}/images/dessert-3.jpg);"></div>
                        <div class="text">
                            <div class="d-flex">
                                <div class="one-half">
                                    <h3>Grilled Crab with Onion</h3>
                                </div>
                                <div class="one-forth">
                                    <span class="price">$29</span>
                                </div>
                            </div>
                            <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 menu-wrap">
                    <div class="heading-menu text-center ftco-animate">
                        <h3>Wine Card</h3>
                    </div>
                    <div class="menus d-flex ftco-animate">
                        <div class="menu-img img"
                            style="background-image: url({{ asset('Userassets') }}/images/wine-1.jpg);"></div>
                        <div class="text">
                            <div class="d-flex">
                                <div class="one-half">
                                    <h3>Grilled Beef with potatoes</h3>
                                </div>
                                <div class="one-forth">
                                    <span class="price">$29</span>
                                </div>
                            </div>
                            <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                        </div>
                    </div>
                    <div class="menus d-flex ftco-animate">
                        <div class="menu-img img"
                            style="background-image: url({{ asset('Userassets') }}/images/wine-2.jpg);"></div>
                        <div class="text">
                            <div class="d-flex">
                                <div class="one-half">
                                    <h3>Grilled Crab with Onion</h3>
                                </div>
                                <div class="one-forth">
                                    <span class="price">$29</span>
                                </div>
                            </div>
                            <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                        </div>
                    </div>
                    <div class="menus d-flex ftco-animate">
                        <div class="menu-img img"
                            style="background-image: url({{ asset('Userassets') }}/images/wine-3.jpg);"></div>
                        <div class="text">
                            <div class="d-flex">
                                <div class="one-half">
                                    <h3>Grilled Crab with Onion</h3>
                                </div>
                                <div class="one-forth">
                                    <span class="price">$29</span>
                                </div>
                            </div>
                            <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 menu-wrap">
                    <div class="heading-menu text-center ftco-animate">
                        <h3>Drinks</h3>
                    </div>
                    <div class="menus d-flex ftco-animate">
                        <div class="menu-img img"
                            style="background-image: url({{ asset('Userassets') }}/images/drink-1.jpg);"></div>
                        <div class="text">
                            <div class="d-flex">
                                <div class="one-half">
                                    <h3>Grilled Beef with potatoes</h3>
                                </div>
                                <div class="one-forth">
                                    <span class="price">$29</span>
                                </div>
                            </div>
                            <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                        </div>
                    </div>
                    <div class="menus d-flex ftco-animate">
                        <div class="menu-img img"
                            style="background-image: url({{ asset('Userassets') }}/images/drink-2.jpg);"></div>
                        <div class="text">
                            <div class="d-flex">
                                <div class="one-half">
                                    <h3>Grilled Crab with Onion</h3>
                                </div>
                                <div class="one-forth">
                                    <span class="price">$29</span>
                                </div>
                            </div>
                            <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                        </div>
                    </div>
                    <div class="menus d-flex ftco-animate">
                        <div class="menu-img img"
                            style="background-image: url({{ asset('Userassets') }}/images/drink-3.jpg);"></div>
                        <div class="text">
                            <div class="d-flex">
                                <div class="one-half">
                                    <h3>Grilled Crab with Onion</h3>
                                </div>
                                <div class="one-forth">
                                    <span class="price">$29</span>
                                </div>
                            </div>
                            <p><span>Meat</span>, <span>Potatoes</span>, <span>Rice</span>, <span>Tomatoe</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container-fluid px-0">
            <div class="row d-flex no-gutters">
                <div class="col-md-6 ftco-animate makereservation p-4 p-md-5 pt-5 pt-md-0">
                    <div class="heading-section ftco-animate mb-5">
                        <span class="subheading">Book a table</span>
                        <h2 class="mb-4">Make Reservation</h2>
                    </div>
                    <form action="#">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" id="book_date" placeholder="Date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Time</label>
                                    <input type="text" class="form-control" id="book_time" placeholder="Time">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Person</label>
                                    <div class="select-wrap one-third">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="" id="" class="form-control">
                                            <option value="">Person</option>
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4+</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <input type="submit" value="Make a Reservation" class="btn btn-primary py-3 px-5">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 d-flex align-items-stretch pb-5 pb-md-0">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Chef</span>
                    <h2 class="mb-4">Our Master Chef</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="staff">
                        <div class="img" style="background-image: url({{ asset('Userassets') }}/images/chef-4.jpg);">
                        </div>
                        <div class="text pt-4">
                            <h3>John Smooth</h3>
                            <span class="position mb-2">Restaurant Owner</span>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                            <div class="faded">
                                <!-- <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p> -->
                                <ul class="ftco-social d-flex">
                                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a>
                                    </li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a>
                                    </li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a>
                                    </li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="staff">
                        <div class="img" style="background-image: url({{ asset('Userassets') }}/images/chef-2.jpg);">
                        </div>
                        <div class="text pt-4">
                            <h3>Rebeca Welson</h3>
                            <span class="position mb-2">Head Chef</span>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                            <div class="faded">
                                <!-- <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p> -->
                                <ul class="ftco-social d-flex">
                                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a>
                                    </li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a>
                                    </li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a>
                                    </li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="staff">
                        <div class="img" style="background-image: url({{ asset('Userassets') }}/images/chef-3.jpg);">
                        </div>
                        <div class="text pt-4">
                            <h3>Kharl Branyt</h3>
                            <span class="position mb-2">Chef</span>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                            <div class="faded">
                                <!-- <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p> -->
                                <ul class="ftco-social d-flex">
                                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a>
                                    </li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a>
                                    </li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a>
                                    </li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="staff">
                        <div class="img" style="background-image: url({{ asset('Userassets') }}/images/chef-1.jpg);">
                        </div>
                        <div class="text pt-4">
                            <h3>Luke Simon</h3>
                            <span class="position mb-2">Chef</span>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                            <div class="faded">
                                <!-- <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p> -->
                                <ul class="ftco-social d-flex">
                                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a>
                                    </li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a>
                                    </li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a>
                                    </li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="ftco-section testimony-section" style="background-image: url(images/bg_5.jpg);" data-stellar-background-ratio="0.5"> -->
    <section class="ftco-section testimony-section img"
        style="background-image: url({{ asset('Userassets') }}/images/bg_5.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Testimony</span>
                    <h2 class="mb-4">Happy Customer</h2>
                </div>
            </div>
            <div class="row ftco-animate justify-content-center">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel ftco-owl">
                        <div class="item">
                            <div class="testimony-wrap text-center pb-5">
                                <div class="user-img mb-4"
                                    style="background-image: url({{ asset('Userassets') }}/images/person_1.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text p-3">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Jason McClean</p>
                                    <span class="position">Customer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap text-center pb-5">
                                <div class="user-img mb-4"
                                    style="background-image: url({{ asset('Userassets') }}/images/person_2.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text p-3">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Mark Stevenson</p>
                                    <span class="position">Customer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap text-center pb-5">
                                <div class="user-img mb-4"
                                    style="background-image: url({{ asset('Userassets') }}/images/person_3.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text p-3">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Art Leonard</p>
                                    <span class="position">Customer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap text-center pb-5">
                                <div class="user-img mb-4"
                                    style="background-image: url({{ asset('Userassets') }}/images/person_4.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text p-3">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Rose Henderson</p>
                                    <span class="position">Customer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap text-center pb-5">
                                <div class="user-img mb-4"
                                    style="background-image: url({{ asset('Userassets') }}/images/person_3.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text p-3">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Ian Boner</p>
                                    <span class="position">Customer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container-fluid px-0">
            <div class="row no-gutters">
                <div class="col-md">
                    <a href="#" class="instagram img d-flex align-items-center justify-content-center"
                        style="background-image: url({{ asset('Userassets') }}/images/insta-1.jpg);">
                        <span class="ion-logo-instagram"></span>
                    </a>
                </div>
                <div class="col-md">
                    <a href="#" class="instagram img d-flex align-items-center justify-content-center"
                        style="background-image: url({{ asset('Userassets') }}/images/insta-2.jpg);">
                        <span class="ion-logo-instagram"></span>
                    </a>
                </div>
                <div class="col-md">
                    <a href="#" class="instagram img d-flex align-items-center justify-content-center"
                        style="background-image: url({{ asset('Userassets') }}/images/insta-3.jpg);">
                        <span class="ion-logo-instagram"></span>
                    </a>
                </div>
                <div class="col-md">
                    <a href="#" class="instagram img d-flex align-items-center justify-content-center"
                        style="background-image: url({{ asset('Userassets') }}/images/insta-4.jpg);">
                        <span class="ion-logo-instagram"></span>
                    </a>
                </div>
                <div class="col-md">
                    <a href="#" class="instagram img d-flex align-items-center justify-content-center"
                        style="background-image: url({{ asset('Userassets') }}/images/insta-5.jpg);">
                        <span class="ion-logo-instagram"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection