<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['category_name', 'category_image', 'is_deleted'];
    //my id is called category_id
    protected $primaryKey = 'category_id'; // Specify the custom primary key
    public $incrementing = true; // If the primary key is auto-incrementing
    protected $keyType = 'int'; // If the primary key is an integer
        public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'category_id');
    }
}
