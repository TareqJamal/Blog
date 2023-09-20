<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function categories()
    {
        return $this->belongsTo(Category::class ,'category_id');
    }
    public function subCategories()
    {
        return $this->belongsTo(Category::class ,'subCategory_id');
    }
    public function writers()
    {
        return $this->belongsTo(Writer::class ,'writer_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class ,'tags_posts');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class,'post_id');
    }
    public function views()
    {
        return $this->hasMany(View::class,'post_id');
    }
}
