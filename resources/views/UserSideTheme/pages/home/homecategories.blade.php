<section class="ftco-section">
    <div class="container-fluid px-4">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Categories</span>
                <h2 class="mb-4">Recipes From</h2>
            </div>
        </div>
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-3 custom-menu-wrap">
                    <h3 class="custom-category-title">{{ $category['category_name'] }}</h3>
                    <a href="{{ url('/menu?category=' . $category['category_id']) }}" class="custom-card-link">
                        <div class="custom-card ftco-animate">
                            <div class="custom-menu-img" style="background-image: url({{ asset('assets/images/category/' . $category['category_image']) }});">
                                <div class="custom-overlay">
                                    <h3 class="custom-card-title">{{ $category['category_name'] }}</h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
.custom-menu-img {
    position: relative;
    width: 100%;
    height: 200px; /* Adjust the height as needed */
    background-size: cover;
    background-position: center;
    overflow: hidden;
    border-radius: 10px; /* Rounded edges */
}

.custom-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 87, 51, 0);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    opacity: 0;
    transition: background-color 0.3s ease, opacity 0.3s ease;
    border-radius: 10px; /* Rounded edges */
}

.custom-menu-img:hover .custom-overlay {
    background-color: rgba(255, 87, 51, 0.7);
    opacity: 1;
}

.custom-card {
    margin-bottom: 20px;
    border-radius: 10px; /* Rounded edges */
}

.custom-card-body {
    padding: 15px;
}

.custom-card-title {
    margin: 0;
    font-size: 1.25rem;
    text-align: center;
    color: white; /* Ensures the text color is white */
}

.custom-category-title {
    text-align: center;
    margin-bottom: 10px;
    font-size: 1.5rem;
}

.custom-card-link {
    text-decoration: none;
    color: inherit;
}
</style>