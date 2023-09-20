<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ImagesPost;
use App\Models\Post;
use App\Models\Tag;
use App\Models\TagsPost;
use App\Models\User;
use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class PostController extends Controller
{
    public $path = 'Admin.Posts.';
    public $postData = ['title','body','category_id','subCategory_id','image','writer_id'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(\request()->ajax())
        {
            if(Auth::guard('writer')->check())
            {
                $posts = Post::where('writer_id', Auth::guard('writer')->user()->id)->get();
                return DataTables::of($posts)
                    ->addIndexColumn()
                    ->editColumn('title',function (Post $post)
                    {
                        return $post->title;
                    })
                    ->editColumn('category_id',function (Post $post)
                    {
                        return $post->categories->name;
                    })
                    ->editColumn('subCategory_id',function (Post $post)
                    {
                        return $post->subCategories->name;
                    })
                    ->editColumn('created_at',function (Post $post)
                    {
                        return $post->created_at;
                    })
                    ->addColumn('comments',function (Post $post)
                    {
                        return $post->comments()->count();
                    })
                    ->addColumn('views',function (Post $post)
                    {
                        return $post->views()->count();
                    })
                    ->editColumn('image','Admin.Posts.Datatable.image')
                    ->addColumn('action','Admin.Posts.Datatable.buttons')
                    ->rawColumns(['title','action','category_id','created_at','subCategory_id','image','comments','views'])
                    ->toJson();
            }
            elseif (Auth::guard('web')->check())
            {
                $posts = Post::all();
                return DataTables::of($posts)
                    ->addIndexColumn()
                    ->editColumn('title',function (Post $post)
                    {
                        return $post->title;
                    })
                    ->
                    editColumn('writer_id',function (Post $post)
                    {
                        return $post->writers->name;
                    })
                    ->editColumn('category_id',function (Post $post)
                    {
                        return $post->categories->name;
                    })
                    ->editColumn('subCategory_id',function (Post $post)
                    {
                        return $post->subCategories->name;
                    })
                    ->editColumn('created_at',function (Post $post)
                    {
                        return $post->created_at;
                    })
                    ->addColumn('comments',function (Post $post)
                    {
                        return $post->comments()->count();
                    })
                    ->addColumn('views',function (Post $post)
                    {
                        return $post->views()->count();
                    })
                    ->editColumn('image','Admin.Posts.Datatable.image')
                    ->addColumn('action','Admin.Posts.Datatable.buttons')
                    ->rawColumns(['title','writer_id','action','category_id','created_at','subCategory_id','image','comments','views'])
                    ->toJson();
            }
        }
        return view($this->path.'index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        $mainCategories = Category::where('parent_id', null)->get();
        $subCategories = Category::where('parent_id','!=',null)->get();
        return view($this->path.'create')
            ->with([
                'tags'=>$tags ,
                'mainCategories'=>$mainCategories ,
                'subCategories'=>$subCategories ,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $postData = $request->only($this->postData);
       if($request->hasFile('image') && $request->hasFile('images'))
       {
           $image = $request->file('image');
           $imageName = $image->getClientOriginalName().uniqid();
           $imageLocation = $image->move('postsImages',$imageName);
           $postData['image'] = $imageLocation;
           $post = Post::create($postData);
           $images = $request->file('images');
           foreach ($images as $image) {
               $imageName = $image->getClientOriginalName() . uniqid();
               $imageLocation = $image->move('postsImages', $imageName);
               ImagesPost::create([
                   'image' => $imageLocation,
                   'post_id' => $post->id,
               ]);
           }
           foreach ($request->tags as $tag)
           {
               TagsPost::create([
                   'tag_id'=>$tag,
                   'post_id'=>$post->id,
               ]);
           }
           return response()->json(['added'=>'New Post Added Successfully']);
       }
       else
       {
           return response()->json(['message'=>'Please Choose Image']);
       }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::findorfail($id);
        $mainCategories = Category::where('parent_id', null)->get();
        $subCategories = Category::where('parent_id','!=',null)->get();
        return view($this->path.'edit')
            ->with([
                'post'=>$post,
                'mainCategories'=>$mainCategories ,
                'subCategories'=>$subCategories ,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $postData = $request->only($this->postData);
        $post = Post::findorfail($id);
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName().uniqid();
            $imageLocation = $image->move('postsImages',$imageName);
            $postData['image'] = $imageLocation;
        }
        $post->update($postData);
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Post::destroy($request->post_id);
        return response()->json(['success'=>'Post Deleted Successful']);
    }
}
