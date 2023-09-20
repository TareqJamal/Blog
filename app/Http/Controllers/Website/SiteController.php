<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\ImagesPost;
use App\Models\Post;
use App\Models\View;

class SiteController extends Controller
{
    public $path = 'Site.Pages.';

    public function home()
    {
        $posts = Post::all();
        return view($this->path . 'home', compact('posts'));

    }

    public function mainCategory($id)
    {
        $mainCategory = Category::findorfail($id);
        $subCategories = Category::all()->where('parent_id', '=', $id);
        return view($this->path . 'Main_Category', compact('mainCategory', 'subCategories'));
    }

    public function subCategory($id)
    {
        $subCategory = Category::findorfail($id);
        $posts = Post::all()->where('subCategory_id', '=', $id);
        return view($this->path . 'Sub_Category', compact('subCategory', 'posts'));
    }
    public function SinglePost($id)
    {
        $post = Post::findorfail($id);
        $comments = Comment::all()->where('post_id',$id);
        $imagesPost = ImagesPost::all()->where('post_id','=',$id);
        View::create(['post_id'=>$id]);
        return view($this->path . 'Single_Post',compact('post','imagesPost','comments'));

    }
}
