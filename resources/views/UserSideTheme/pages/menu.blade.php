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
                        <select id="categoryDropdown" class="form-select">
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
                        <select id="subcategoryDropdown" class="form-select">
                            <option value="">All Subcategories</option>
                            @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->subcategory_id }}">{{ $subcategory->sub_category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Search Field -->
                    <div class="col-md-3 mb-3">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search recipes...">
                    </div>

                    <!-- Ingredient Search Field -->
                    <div class="col-md-3 mb-3">
                        <input type="text" id="ingredientInput" class="form-control" placeholder="Add ingredient...">
                        <button id="addIngredientButton" class="btn btn-primary mt-2">Add Ingredient</button>
                    </div>
                </div>

                <!-- Display Added Ingredients -->
                <div class="row mb-3">
                    <div class="col-md-12 d-flex align-items-center" id="ingredientListContainer">
                        <div id="ingredientList" class="flex-grow-1"></div>
                        <button id="resetIngredientsButton" class="btn btn-danger ms-3" style="display: none;">Reset Ingredients</button>
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

            fetch(`/filter-recipes?category=${categoryId}&subcategory=${subcategoryId}&search=${searchTerm}&ingredient=${ingredientSearchTerm}`)
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
                var recipeDiv = document.createElement('div');
                recipeDiv.classList.add('col-md-4', 'mb-4');
                var imageUrl = `{{ asset('Userassets/images/recipes/') }}/${recipe.recipe_img}`;
                recipeDiv.innerHTML = `
                    <div class="custom-card">
                        <div class="custom-card-img-wrapper">
                            <img src="${imageUrl}" class="custom-menu-img" alt="${recipe.recipe_name}">
                        </div>
                        <div class="custom-card-body">
                            <h5 class="custom-card-title">${recipe.recipe_name}</h5>
                            <p class="custom-card-text"><small class="text-muted">Role: ${recipe.role}</small></p>
                            <p class="custom-card-text"><small class="text-muted">Calories: ${recipe.calories}</small></p>
                            <p class="custom-card-text"><small class="text-muted">Serves: ${recipe.ppl_number}</small></p>
                            <p class="custom-card-text"><small class="text-muted">Oven Heat: ${recipe.oven_heat}</small></p>
                            <p class="custom-card-text"><small class="text-muted">Time: ${recipe.recipe_time}</small></p>
                        </div>
                    </div>`;
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
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
            transition: background-color 0.3s ease;
            width: 100%;
            max-width: 300px;
            height: 400px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .custom-card:hover {
            background-color: #FF5733
        }

        .custom-card-img-wrapper {
            position: relative;
            width: 100px;
            height: 100px;
            overflow: hidden;
            border-radius: 50%;
            margin: 10px auto;
        }

        .custom-menu-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .custom-card-body {
            padding: 15px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .custom-card-title {
            font-size: 1.25rem;
            margin-bottom: 10px;
            text-align: center;
        }

        .custom-card-text {
            font-size: 0.875rem;
            margin-bottom: 5px;
            text-align: center;
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
    </style>
@endsection