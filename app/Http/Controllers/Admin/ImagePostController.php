<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImagesPost;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ImagePostController extends Controller
{
    public $path = 'Admin.ImagesPost.';
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

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
        if ($request->ajax()) {
            $imagesPost = ImagesPost::all()->where('post_id','=' , $id);
            return DataTables::of($imagesPost)
                ->addIndexColumn()
                ->editColumn('image', 'Admin.ImagesPost.Datatable.image')
                ->addColumn('action', 'Admin.ImagesPost.Datatable.buttons')
                ->rawColumns(['action', 'image'])
                ->toJson();
        }
        return view($this->path . 'index' , compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {



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
    public function destroy( $id)
    {
       ImagesPost::destroy($id);
       return response()->json(['success'=>'Image removed from this Post ']);
    }
}
