<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RecipeIngredient extends Pivot
{
    protected $table = 'recipeingredients';

    // Relationships
   // Relationships
   public function recipe()
   {
       return $this->belongsTo(Recipe::class);
   }

   public function ingredient()
   {
       return $this->belongsTo(Ingredient::class);
   }
}
