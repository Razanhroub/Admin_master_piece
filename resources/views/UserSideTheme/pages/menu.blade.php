@extends('UserSideTheme.masters.master')

@section('herotitle')
    menu
@endsection

@section('breadcrumbs')
    menu
@endsection

@section('menu-active', 'active')

@section('content')
<div class="container">
    <h1>Recipes</h1>

    <!-- Dropdown for Categories -->
    <select id="categoryDropdown">
        @foreach($categories as $category)
            <option value="{{ $category->category_id }}" {{ $category->category_id == $categoryId ? 'selected' : '' }}>
                {{ $category->category_name }}
            </option>
        @endforeach
    </select>

    <!-- Dropdown for Subcategories -->
    <select id="subcategoryDropdown">
        <option value="">All Subcategories</option>
        @foreach($subcategories as $subcategory)
            <option value="{{ $subcategory->subcategory_id }}">{{ $subcategory->sub_category_name }}</option>
        @endforeach
    </select>

    <!-- Recipes List -->
    <div id="recipesList">
        @foreach($recipes as $recipe)
            <div class="recipe">
                <h2>{{ $recipe->recipe_name }}</h2>
                <p>{{ $recipe->instructions }}</p>
            </div>
        @endforeach
    </div>
</div>

<script>
    document.getElementById('categoryDropdown').addEventListener('change', function() {
        var categoryId = this.value;

        fetch(`/get-subcategories?category=${categoryId}`)
            .then(response => response.json())
            .then(data => {
                var subcategoryDropdown = document.getElementById('subcategoryDropdown');
                subcategoryDropdown.innerHTML = '<option value="">All Subcategories</option>';
                data.subcategories.forEach(subcategory => {
                    var option = document.createElement('option');
                    option.value = subcategory.subcategory_id;
                    option.textContent = subcategory.sub_category_name;
                    subcategoryDropdown.appendChild(option);
                });

                // Fetch recipes for the selected category
                fetch(`/filter-recipes?category=${categoryId}`)
                    .then(response => response.json())
                    .then(data => {
                        var recipesList = document.getElementById('recipesList');
                        recipesList.innerHTML = '';
                        data.recipes.forEach(recipe => {
                            var recipeDiv = document.createElement('div');
                            recipeDiv.classList.add('recipe');
                            recipeDiv.innerHTML = `<h2>${recipe.recipe_name}</h2><p>${recipe.instructions}</p>`;
                            recipesList.appendChild(recipeDiv);
                        });

                        // Update the URL without reloading the page
                        const newUrl = `/menu?category=${categoryId}`;
                        window.history.pushState({ path: newUrl }, '', newUrl);
                    });
            });
    });

    document.getElementById('subcategoryDropdown').addEventListener('change', function() {
        var subcategoryId = this.value;
        var categoryId = document.getElementById('categoryDropdown').value;

        fetch(`/filter-recipes?subcategory=${subcategoryId}&category=${categoryId}`)
            .then(response => response.json())
            .then(data => {
                var recipesList = document.getElementById('recipesList');
                recipesList.innerHTML = '';
                data.recipes.forEach(recipe => {
                    var recipeDiv = document.createElement('div');
                    recipeDiv.classList.add('recipe');
                    recipeDiv.innerHTML = `<h2>${recipe.recipe_name}</h2><p>${recipe.instructions}</p>`;
                    recipesList.appendChild(recipeDiv);
                });

                // Update the URL without reloading the page
                const newUrl = `/menu?category=${categoryId}&subcategory=${subcategoryId}`;
                window.history.pushState({ path: newUrl }, '', newUrl);
            })
            .catch(error => console.error('Error:', error));
    });
</script>
@endsection

{{-- @section('content')

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
                    <div id="map" class="border"></div>
                </div>
            </div>
        </div>
    </section>
@endsection --}}


