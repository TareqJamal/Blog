<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image','description','parent_id'];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }

    public function postsSubCategores()
    {
        return $this->hasMany(Post::class, 'subCategory_id');
    }
}
