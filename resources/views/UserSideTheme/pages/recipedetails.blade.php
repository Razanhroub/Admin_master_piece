@extends('UserSideTheme.masters.master')
@section('herotitle')
   Recipe Details
@endsection
@section('breadcrumbs')
    Recipe Details
@endsection
@section('menu-active', 'active')

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
                    <!-- Recipe Summary and Role in the same row -->
                    <div class="d-flex justify-content-between mb-4">
                        <div class="d-flex flex-wrap">
                            <p class="custom-card-text mr-3"><i class="fas fa-user"></i> {{ $recipe->ppl_number }}</p>
                            @if($recipe->oven_heat)
                                <p class="custom-card-text mr-3"><i class="fas fa-thermometer-half"></i> {{ $recipe->oven_heat }}</p>
                            @endif
                            <p class="custom-card-text mr-3"><i class="fas fa-clock"></i> {{ $recipe->recipe_time }}</p>
                            <p class="custom-card-text mr-3"><i class="fas fa-fire"></i> {{ $recipe->calories }} per serving</p>
                        </div>
                        <div>
                            <h5>Role: {{ $recipe->role }}</h5>
                        </div>
                    </div>
                    
                    <!-- Image on the left and instructions with vertical line on the right -->
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('Userassets/images/recipes/' . $recipe->recipe_img) }}" alt="{{ $recipe->recipe_name }}" class="img-fluid mb-4" style="width: 300px; height: 300px; object-fit: cover; border-radius: 5px;">
                        </div>
                        <div class="flex-grow-1 ml-4" style="border-left: 2px solid #ccc; padding-left: 15px;">
                            <h3>Instructions</h3>
                            @php
                                $instructions = preg_split('/(?<!\d)\.(?!\d)/', $recipe->instructions);
                            @endphp
                            @foreach ($instructions as $instruction)
                                <p>{{ trim($instruction) }}.</p>
                            @endforeach
                        </div>
                        <div class="ml-4" style="background-color: rgb(255,87,51); padding: 15px; border-radius: 5px; color: white;">
                            <h3>Ingredients</h3>
                            <div style="list-style-type: none; padding-left: 0;">
                                @foreach ($ingredients as $ingredient)
                                    <p>{{ $ingredient->quantity }} {{ $ingredient->unit }} of {{ $ingredient->ingredient_name }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <hr class="my-4" style="background-color: rgb(255,87,51)">
                </div>
            </div>
        </div>
    </section>
</div>
@endsection