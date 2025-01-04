<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;
    protected $primaryKey = 'ingredient_id';
    protected $fillable = [
        'ingredient_name',
        'is_deleted',
        'recipe_id'
    ];

    // Relationships
    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'recipe_id', 'recipe_id')->where('is_deleted', 0);
    }
}
