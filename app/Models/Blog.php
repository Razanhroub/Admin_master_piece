<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $primaryKey = 'blog_id';

    protected $fillable = [
        'user_id',
        'recipe_id',
        'iframelink',
        'accepted',
        'is_deleted'
    ];
    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    
    public function recipe()
{
    return $this->belongsTo(Recipe::class, 'recipe_id', 'recipe_id');
}
public function likes()
{
    return $this->hasMany(Like::class, 'blog_id', 'blog_id');
}

   
}
