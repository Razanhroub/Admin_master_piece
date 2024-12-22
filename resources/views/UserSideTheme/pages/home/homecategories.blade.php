<section class="ftco-section">
    <div class="container-fluid px-4">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Recipes</span>
                <h2 class="mb-4">Our Categories</h2>
            </div>
        </div>
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-6 col-lg-4 menu-wrap">
                    <div class="menus d-flex ftco-animate">
                        <div class="menu-img img" style="background-image: url({{ asset('assets/images/category/' . $category->category_image) }});"></div>
                        <div class="text">
                            <div class="d-flex">
                                <div class="one-half">
                                    <h3>{{ $category->category_name }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>