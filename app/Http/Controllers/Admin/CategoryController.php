<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CategoryStatus;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
class CategoryController extends Controller
{
    public $path = 'Admin.Categories.';
    public $category_data = ['name','image'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(\request()->ajax()) {
            $categories = Category::where('parent_id',null)->get();
            return DataTables::of($categories)
                ->addIndexColumn()
                ->editColumn('image','Admin.Categories.Datatable.image' )
                ->editColumn('status','Admin.Categories.Datatable.status' )
                ->addColumn('action' ,'Admin.Categories.Datatable.buttons')
                ->rawColumns(['action','image','status'])
                ->toJSON();
        }
        else
        {
            return view('Admin.Categories.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName().uniqid();
            $location = $image->move('categories_image',$image_name);
            $data['image'] = $location;
        }
        Category::create($data);
        toastr()->success('Data has been saved successfully!');

        return response()->json(['success'=>true]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findorfail($id);
        return view($this->path.'edit')->with(['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       $category = Category::findorfail($id);
       $updated_data = $request->only($this->category_data);
       if($request->hasFile('image'))
       {
           $image = $request->file('image');
           $image_name = $image->getClientOriginalName().uniqid();
           $location = $image->move('categories_images',$image_name);
           $updated_data['image'] = $location;
           $category->update($updated_data);
       }
       $category->update($updated_data);

       return redirect()->route('categories.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Category::destroy($request->category_id);
        return response()->json(['message'=>'sucess']);
    }


    public function status($id)
    {
       $category = Category::findorfail($id);
       if($category->status == 'active')
       {
           $category->status = CategoryStatus::Disactive;
           $category->save();
       }
       elseif($category->status == 'disactive')
       {
           $category->status = CategoryStatus::Active;
           $category->save();
       }
        return response()->json();

    }
}
