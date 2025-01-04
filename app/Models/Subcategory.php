<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    protected $table = 'subcategories';
    protected $primaryKey = 'subcategory_id'; // Specify the primary key

    protected $fillable = ['sub_category_name', 'category_id', 'is_deleted'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function recipes()
    {
        return $this->hasMany(Recipe::class, 'sub_category_id', 'subcategory_id');
    }
}

