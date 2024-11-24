<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'blog_id',
        'sub_category_id',
        'ingredient_id',
        'role',
        'recipe_name',
        'instructions',
        'is_deleted'
    ];

    // Relationships
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'recipeingredients');
    }
}
