<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = ['sub_category_name', 'category_id', 'is_deleted'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function recipes()
    {
        return $this->hasMany(Recipe::class, 'subcategory_id');
    }
}
