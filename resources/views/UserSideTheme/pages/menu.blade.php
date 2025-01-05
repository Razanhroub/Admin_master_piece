@extends('UserSideTheme.masters.master')

@section('herotitle')
    Recipes
@endsection

@section('breadcrumbs')
    Recipes
@endsection

@section('menu-active', 'active')

@section('content')
    <div class="container">
        <section class="ftco-section">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Categories</span>
                    <h2 class="mb-4">Recipes</h2>
                </div>
            </div>
            <div class="container-fluid px-4">
                <div class="row">
                    <!-- Dropdown for Categories -->
                    <div class="col-md-3 mb-3">
                        <select style="text-align: center" id="categoryDropdown" class="form-select dropend custom-dropdown">
                            <option value="">All Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->category_id }}"
                                    {{ $category->category_id == $categoryId ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Dropdown for Subcategories -->
                    <div class="col-md-3 mb-3" id="subcategoryDropdownContainer">
                        <select style="text-align: center" id="subcategoryDropdown"
                            class="form-select dropend custom-dropdown">
                            <option value="">All Subcategories</option>
                            @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->subcategory_id }}">{{ $subcategory->sub_category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Search Field -->
                    <div class="col-md-3 mb-3">
                        <input type="text" id="searchInput" class="form-control custom-input"
                            placeholder="Search recipes...">
                    </div>

                    <!-- Ingredient Search Field with Button -->
                    <div class="col-md-3 mb-3">
                        <div class="input-group">
                            <input type="text" id="ingredientInput" class="form-control custom-input"
                                placeholder="Add ingredient...">
                            <button id="addIngredientButton" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </div>

                <!-- Display Added Ingredients -->
                <div class="row mb-3">
                    <div class="col-md-12 d-flex align-items-center" id="ingredientListContainer">
                        <div id="ingredientList" class="flex-grow-1"></div>
                        <button id="resetIngredientsButton" class="badge bg-primary me-2 mb-2 x-button"
                            style="display: none;">x</button>
                    </div>
                </div>

                <!-- Recipes List -->
                <div class="row" id="recipesList"></div>

                <!-- Pagination Controls -->
                <div class="d-flex justify-content-center">
                    <button id="prevPage" class="btn btn-primary mx-2">Previous</button>
                    <div id="paginationNumbers" class="mx-2"></div>
                    <button id="nextPage" class="btn btn-primary mx-2">Next</button>
                </div>
            </div>
        </section>
    </div>
    <script>
        let currentPage = 1;
        const recipesPerPage = 9;
        let allRecipes = [];
        let ingredients = [];

        function fetchRecipes() {
            var categoryId = document.getElementById('categoryDropdown').value;
            var subcategoryId = document.getElementById('subcategoryDropdown').value;
            var searchTerm = document.getElementById('searchInput').value;
            var ingredientSearchTerm = ingredients.join(',');

            fetch(
                    `/filter-recipes?category=${categoryId}&subcategory=${subcategoryId}&search=${searchTerm}&ingredient=${ingredientSearchTerm}`
                )
                .then(response => response.json())
                .then(data => {
                    allRecipes = data.recipes;
                    currentPage = 1;
                    displayRecipes();
                    displayPagination();
                })
                .catch(error => console.error('Error:', error));
        }

        document.getElementById('categoryDropdown').addEventListener('change', function() {
            var categoryId = this.value;

            if (categoryId === "") {
                document.getElementById('subcategoryDropdownContainer').style.display = 'none';
                fetchRecipes();
            } else {
                document.getElementById('subcategoryDropdownContainer').style.display = 'block';

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
                        fetchRecipes();
                    });
            }
        });

        document.getElementById('subcategoryDropdown').addEventListener('change', fetchRecipes);
        document.getElementById('searchInput').addEventListener('input', fetchRecipes);
        document.getElementById('ingredientInput').addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                addIngredient();
            }
        });
        document.getElementById('addIngredientButton').addEventListener('click', addIngredient);
        document.getElementById('resetIngredientsButton').addEventListener('click', resetIngredients);

        function addIngredient() {
            var ingredientInput = document.getElementById('ingredientInput');
            var ingredient = ingredientInput.value.trim();
            if (ingredient && !ingredients.includes(ingredient)) {
                ingredients.push(ingredient);
                displayIngredients();
                fetchRecipes();
            }
            ingredientInput.value = '';
        }

        function resetIngredients() {
            ingredients = [];
            displayIngredients();
            fetchRecipes();
        }

        function displayIngredients() {
            const ingredientList = document.getElementById('ingredientList');
            const resetButton = document.getElementById('resetIngredientsButton');
            ingredientList.innerHTML = '';
            ingredients.forEach(ingredient => {
                var ingredientBox = document.createElement('span');
                ingredientBox.classList.add('badge', 'bg-primary', 'me-2', 'mb-2');
                ingredientBox.textContent = ingredient;
                var removeButton = document.createElement('button');
                removeButton.classList.add('btn-close', 'btn-close-white', 'ms-1');
                removeButton.addEventListener('click', function() {
                    ingredients = ingredients.filter(i => i !== ingredient);
                    displayIngredients();
                    fetchRecipes();
                });
                ingredientBox.appendChild(removeButton);
                ingredientList.appendChild(ingredientBox);
            });
            resetButton.style.display = ingredients.length > 0 ? 'block' : 'none';
        }

        document.getElementById('prevPage').addEventListener('click', function() {
            if (currentPage > 1) {
                currentPage--;
                displayRecipes();
                displayPagination();
            }
        });

        document.getElementById('nextPage').addEventListener('click', function() {
            if (currentPage * recipesPerPage < allRecipes.length) {
                currentPage++;
                displayRecipes();
                displayPagination();
            }
        });

        function displayRecipes() {
    const recipesList = document.getElementById('recipesList');
    recipesList.innerHTML = '';
    const start = (currentPage - 1) * recipesPerPage;
    const end = start + recipesPerPage;
    const paginatedRecipes = allRecipes.slice(start, end);

    paginatedRecipes.forEach(recipe => {
        const recipeDiv = document.createElement('div');
        recipeDiv.classList.add('col-md-4', 'mb-4');
        const imageUrl = `{{ asset('Userassets/images/recipes/') }}/${recipe.recipe_img}`;
        
        recipeDiv.innerHTML = `
            <div class="custom-card horizontal-card">
                <div class="custom-card-img-wrapper">
                    <img src="${imageUrl}" class="custom-menu-img" alt="${recipe.recipe_name}">
                </div>
                <div class="custom-card-body">
                    <div class="role-text">${recipe.role}</div>
                    <h5 class="custom-card-title">${recipe.recipe_name}</h5>
                    <div class="custom-card-details d-flex justify-content-between align-items-center flex-wrap">
                        <p class="custom-card-text"><i class="fas fa-user"></i> ${recipe.ppl_number}</p>
                        ${recipe.oven_heat ? `<p class="custom-card-text"><i class="fas fa-thermometer-half"></i> ${recipe.oven_heat}</p>` : ''}
                        <p class="custom-card-text"><i class="fas fa-clock"></i> ${recipe.recipe_time} </p>
                        <p class="custom-card-text"><i class="fas fa-fire"></i> ${recipe.calories}  per serving</p>
                    </div>
                    <div class="d-flex justify-content-center custom-card-actions mt-3">
                        <a href="/recipedetails/${recipe.recipe_id}" class="btn btn-primary">Recipe Details</a>
                     
                    </div>
                </div>
            </div>
        `;
        recipesList.appendChild(recipeDiv);
    });
}




        function displayPagination() {
            const paginationNumbers = document.getElementById('paginationNumbers');
            paginationNumbers.innerHTML = '';
            const totalPages = Math.ceil(allRecipes.length / recipesPerPage);

            for (let i = 1; i <= totalPages; i++) {
                const pageButton = document.createElement('button');
                pageButton.classList.add('btn', 'btn-secondary', 'mx-1');
                pageButton.textContent = i;
                pageButton.addEventListener('click', function() {
                    currentPage = i;
                    displayRecipes();
                    displayPagination();
                });
                if (i === currentPage) {
                    pageButton.classList.add('active');
                }
                paginationNumbers.appendChild(pageButton);
            }
        }

        // Fetch initial data on page load
        document.addEventListener('DOMContentLoaded', fetchRecipes);
    </script>
    <style>
        .custom-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }


        .custom-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .custom-card-img-wrapper {
            height: 200px;
            overflow: hidden;
            border-bottom: 1px solid #ddd;
        }

        .custom-menu-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .custom-card-body {
            padding: 15px;
            flex-grow: 1;
        }

        .role-text {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }



        .custom-card-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .custom-card-details {
            margin-bottom: 15px;
        }


        .custom-card-text {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
        }


        .custom-card-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 15px;
            border-top: 1px solid #ddd;
        }

        .badge {
            display: inline-block;
            padding: 0.5em 0.75em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.375rem;
        }

        .bg-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-close {
            padding: 0.25em 0.5em;
            font-size: 0.75rem;
            line-height: 1;
            border: none;
            background: transparent;
            color: #fff;
        }

        .btn-close-white {
            filter: invert(1);
        }

        .dropend .dropdown-menu {
            top: 100%;
            left: 0;
            margin-top: 0.125rem;
        }

        .custom-dropdown,
        .custom-input {
            height: 100%;
            /* Adjust the height as needed */
            width: 100%;
            /* Ensure full width */
            border: 1px solid black;
        }

        .x-button {
            border: 0;
        }
    </style>
@endsection
