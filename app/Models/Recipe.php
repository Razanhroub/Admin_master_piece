<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'sub_category_id',
        'recipe_name',
        'instructions',
        'recipe_img',
        'ppl_number',
        'calories',
        'oven_heat',
        'recipe_time',
        'role',
        'is_deleted'
    ];
    protected $primaryKey = 'recipe_id'; // Update this if your primary key is named differently


    // Relationships

    public function likes()
    {
        return $this->hasMany(Like::class, 'recipe_id', 'recipe_id');
    }
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'recipe_id', 'recipe_id');
    }
   
    public function ingredients()
    {
        return $this->hasMany(Ingredient::class, 'recipe_id', 'recipe_id')->where('is_deleted', 0);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id')->where('is_deleted', 0);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'sub_category_id', 'subcategory_id')->where('is_deleted', 0);
    }
}

