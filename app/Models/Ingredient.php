<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'ingredient_name',
        'is_deleted'
    ];

    // Relationships
    public function recipes()
    {
        return $this->belongsToMany(Recipe::class, 'recipeingredients');
    }
}
