<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImagesPost;
use App\Models\Post;
use App\Models\TagsPost;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TagsPostController extends Controller
{
    public $path = 'Admin.TagsPost.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request , $id)
    {
        $post = Post::findorfail($id);
        if ($request->ajax()) {
            $tags = $post->tags()->get();
            return DataTables::of($tags)
                ->addIndexColumn()
                ->editColumn('tagName',function ($row)
                {
                    return $row->name;
                })
                ->rawColumns(['tagName'])
                ->toJson();
        }
        return view($this->path .'index',compact('post','id'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        dd($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

    }
}
