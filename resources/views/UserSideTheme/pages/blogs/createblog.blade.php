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
                    <h2 class="mb-4">Create Your Own Blog</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ route('createblog.store') }}" method="POST" enctype="multipart/form-data"
                        onsubmit="return filterEmptyIngredients() && validateYouTubeLink()">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="category">Category</label>
                                <select required id="category" name="category"
                                    class="form-control form-control-sm custom-input">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="subcategory">Subcategory</label>
                                <select required id="subcategory" name="subcategory"
                                    class="form-control form-control-sm custom-input">
                                    <option value="">Select Subcategory</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="recipe_name">Recipe Name</label>
                                <input type="text" id="recipe_name" name="recipe_name"
                                    class="form-control form-control-sm custom-input" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="recipe_time">Recipe Time (in minutes)</label>
                                <input type="text" id="recipe_time" name="recipe_time"
                                    class="form-control form-control-sm custom-input" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="instructions">Instructions</label>
                            <textarea id="instructions" name="instructions" class="form-control form-control-sm custom-input" required></textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="ppl_number">Number of People</label>
                                <input required type="number" id="ppl_number" name="ppl_number"
                                    class="form-control form-control-sm custom-input">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="calories">Calories per Person</label>
                                <input required type="number" id="calories" name="calories"
                                    class="form-control form-control-sm custom-input">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="oven_heat">Oven Temperature</label>
                                <input required type="number" id="oven_heat" name="oven_heat"
                                    class="form-control form-control-sm custom-input">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="recipe_img" >Recipe Image</label>
                                <input type="file" id="recipe_img" name="recipe_img"
                                    required class="form-control form-control-sm custom-input">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ingredients">Ingredients</label>
                            <div id="ingredients">
                                <input required type="text" name="ingredients[]"
                                    class="form-control form-control-sm custom-input mb-2">
                            </div>
                            <button type="button" id="add-ingredient" class="btn btn-custom-primary">Add
                                Ingredient</button>
                        </div>
                        <div class="form-group">
                            <label for="youtube_link">YouTube Video (Optional)</label>
                            <input type="text" id="youtube_link" name="youtube_link"
                                class="form-control form-control-sm custom-input" placeholder="Paste YouTube iframe here">
                        </div>
                        <input type="hidden" name="role" value="user">
                        <button type="submit" class="btn btn-custom-primary">Create Blog</button>
                    </form>
                </div>
            </div>
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

        var ingredientButton = document.getElementById('add-ingredient');
        ingredientButton.addEventListener('click', function() {
            var ingredientsDiv = document.getElementById('ingredients');
            var newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = 'ingredients[]';
            newInput.className = 'form-control form-control-sm custom-input mb-2';
            newInput.placeholder = 'Enter ingredient';
            ingredientsDiv.appendChild(newInput);
        });

        function filterEmptyIngredients() {
            var ingredientInputs = document.querySelectorAll('input[name="ingredients[]"]');
            ingredientInputs.forEach(input => {
                if (input.value.trim() === '') {
                    input.parentNode.removeChild(input);
                }
            });
            return true;
        }

        function isValidYouTubeUrl(url) {
            const regex = /^(https?\:\/\/)?(www\.youtube\.com|youtu\.?be)\/.+$/;
            return regex.test(url);
        }

        function validateYouTubeLink() {
            const youtubeLinkInput = document.getElementById('youtube_link');
            const youtubeLink = youtubeLinkInput.value.trim();

            if (youtubeLink && !isValidYouTubeUrl(youtubeLink)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Link',
                    text: 'Please enter a valid YouTube video link.',
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: ' btn btn-custom-primary' // Add your custom class here
                    }
                });

                return false;
            }


            return true;
        }
    </script>
    <style>
        .custom-input {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
        }
    </style>
@endsection
