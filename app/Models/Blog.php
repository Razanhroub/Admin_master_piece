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

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function recipe()
{
    return $this->belongsTo(Recipe::class, 'recipe_id', 'recipe_id');
}

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function saveForLaters()
    {
        return $this->hasMany(SaveForLater::class);
    }
}
