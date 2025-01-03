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
   

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'sub_category_id', 'subcategory_id');
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class, 'recipe_id', 'recipe_id');
    }
}
