<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubCategoryController extends Controller
{
    public $path = 'Admin.SubCategories.';
    public $sub_category_data = ['name', 'image', 'parent_id'];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (\request()->ajax()) {
            $subcategories = Category::where('parent_id', '!=', null)->get();
            return DataTables::of($subcategories)
                ->addIndexColumn()
                ->editColumn('image', 'Admin.SubCategories.Datatable.image')
                ->editColumn('parent_id', function (Category $category) {
                    return $category->categories->name;

                })
                ->editColumn('status', 'Admin.SubCategories.Datatable.status')
                ->addColumn('action', 'Admin.SubCategories.Datatable.buttons')
                ->rawColumns(['action', 'image', 'status', 'parent_id'])
                ->toJSON();
        } else {
            return view($this->path . 'index');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $main_categories = Category::where('parent_id', null)->get();
        return view($this->path . 'create')->with(['main_categories' => $main_categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sub_category = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName() . uniqid();
            $sub_category['image'] = $image->move('sub-categories_image', $image_name);
        }
        $data = Category::create($sub_category);

        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findorfail($id);
        if ($category->status == 'active') {
            $category->status = 'disactive';
            $category->save();
        } elseif ($category->status == 'disactive') {
            $category->status = 'active';
            $category->save();
        }
        return response()->json();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sub_category = Category::findorfail($id);
        $main_categories = Category::where('parent_id', null)->get();
        return view($this->path . 'edit')->with(['sub_category' => $sub_category, 'main_categories' => $main_categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findorfail($id);
        $sub_category = $request->only($this->sub_category_data);
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName() . uniqid();
            $sub_category['image'] = $image->move('sub-categories_image', $image_name);
            $category->update($sub_category);
        }
        $category->update($sub_category);
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Request $request)
    {
        Category::destroy($request->category_id);
        return response()->json();
    }
}
