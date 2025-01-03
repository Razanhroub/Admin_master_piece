@extends('UserSideTheme.masters.master')
@section('herotitle')
    Create Blog
@endsection
@section('breadcrumbs')
    blogs
@endsection
@section('blog-active', 'active')
@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Blogs</span>
                    <h2 class="mb-4">create your own blog</h2>
                </div>
            </div>
            <h1>Create Blog</h1>
            <form action="{{ route('createblog.store') }}" method="POST" enctype="multipart/form-data"
                onsubmit="return filterEmptyIngredients()">
                @csrf
                <div class="form-group">
                    <label for="category">Category</label>
                    <select id="category" name="category" class="form-control">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="subcategory">Subcategory</label>
                    <select id="subcategory" name="subcategory" class="form-control">
                        <option value="">Select Subcategory</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="recipe_name">Recipe Name</label>
                    <input type="text" id="recipe_name" name="recipe_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="instructions">Instructions</label>
                    <textarea id="instructions" name="instructions" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="recipe_img">Recipe Image</label>
                    <input type="file" id="recipe_img" name="recipe_img" class="form-control">
                </div>
                <div class="form-group">
                    <label for="ppl_number">Number of People</label>
                    <input type="number" id="ppl_number" name="ppl_number" class="form-control">
                </div>
                <div class="form-group">
                    <label for="calories">Calories per Person</label>
                    <input type="number" id="calories" name="calories" class="form-control">
                </div>
                <div class="form-group">
                    <label for="oven_heat">Oven Temperature</label>
                    <input type="number" id="oven_heat" name="oven_heat" class="form-control">
                </div>
                <div class="form-group">
                    <label for="recipe_time">Recipe Time</label>
                    <input type="text" id="recipe_time" name="recipe_time" class="form-control">
                </div>
                <div class="form-group">
                    <label for="ingredients">Ingredients</label>
                    <div id="ingredients">
                        <input type="text" name="ingredients[]" class="form-control mb-2">
                    </div>
                    <button type="button" id="add-ingredient" class="btn btn-secondary">Add Ingredient</button>
                </div>
                <input type="hidden" name="role" value="user">
                <button type="submit" class="btn btn-custom-primary">Create Blog</button>
            </form>
        </div>
    </section>
    <script>
        document.getElementById('category').addEventListener('change', function() {
            var categoryId = this.value;
            fetch(`/get-subcategories?category=${categoryId}`)
                .then(response => response.json())
                .then(data => {
                    var subcategorySelect = document.getElementById('subcategory');
                    subcategorySelect.innerHTML = '<option value="">Select Subcategory</option>';
                    data.subcategories.forEach(subcategory => {
                        var option = document.createElement('option');
                        option.value = subcategory.subcategory_id;
                        option.textContent = subcategory.sub_category_name;
                        subcategorySelect.appendChild(option);
                    });
                });
        });

        // Add ingredients dynamically
        var ingredientButton = document.getElementById('add-ingredient');
        ingredientButton.addEventListener('click', function() {
            var ingredientsDiv = document.getElementById('ingredients');
            var newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = 'ingredients[]';
            newInput.className = 'form-control mb-2';
            newInput.placeholder = 'Enter ingredient';
            ingredientsDiv.appendChild(newInput);
        });

        // Filter empty ingredients on form submission
        function filterEmptyIngredients() {
            var ingredientInputs = document.querySelectorAll('input[name="ingredients[]"]');
            ingredientInputs.forEach(input => {
                if (input.value.trim() === '') {
                    input.parentNode.removeChild(input);
                }
            });
            return true;
        }
    </script>
@endsection
