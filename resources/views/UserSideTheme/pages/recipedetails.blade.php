@extends('UserSideTheme.masters.master')
@section('herotitle')
    Contact us
@endsection
@section('breadcrumbs')
    contact
@endsection
@section('contact-active', 'active')

@section('content')
<div class="container">
    <section class="ftco-section">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Recipe</span>
                <h2 class="mb-4">{{ $recipe->recipe_name }}</h2>
            </div>
        </div>
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-md-12">
                    <img src="{{ asset('Userassets/images/recipes/' . $recipe->recipe_img) }}" alt="{{ $recipe->recipe_name }}" class="img-fluid">
                    <h3>Details</h3>
                    <ul>
                        <li><strong>Recipe ID:</strong> {{ $recipe->recipe_id }}</li>
                        <li><strong>Blog ID:</strong> {{ $recipe->blog_id }}</li>
                        <li><strong>Subcategory ID:</strong> {{ $recipe->sub_category_id }}</li>
                        <li><strong>Role:</strong> {{ $recipe->role }}</li>
                        <li><strong>Calories:</strong> {{ $recipe->calories }}</li>
                        <li><strong>Serves:</strong> {{ $recipe->ppl_number }} people</li>
                        <li><strong>Oven Heat:</strong> {{ $recipe->oven_heat }}°F</li>
                        <li><strong>Cooking Time:</strong> {{ $recipe->recipe_time }}</li>
                        <li><strong>Created At:</strong> {{ $recipe->created_at }}</li>
                        <li><strong>Updated At:</strong> {{ $recipe->updated_at }}</li>
                    </ul>
                    <h3>Instructions</h3>
                    <p>{{ $recipe->instructions }}</p>
                    <h3>Ingredients</h3>
                    <ul>
                        @foreach ($ingredients as $ingredient)
                            <li>{{ $ingredient->quantity }} {{ $ingredient->unit }} of {{ $ingredient->ingredient_name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
