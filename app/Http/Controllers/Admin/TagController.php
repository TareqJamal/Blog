<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Tag;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TagController extends Controller
{
    public $path = 'Admin.Tags.';
    public $tag_data = ['name'];

    public function index()
    {
        if (\request()->ajax()) {
            $tags = Tag::all();
            return DataTables::of($tags)
                ->addIndexColumn()
                ->addColumn('action', 'Admin.Tags.Datatable.buttons')
                ->rawColumns(['action'])
                ->toJSON();
        } else {
            return view('Admin.tags.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->path . 'create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Insert_data = $request->only($this->tag_data);
        Tag::create($Insert_data);
        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tag = Tag::findorfail($id);
        return view($this->path . 'edit')->with(['tag' => $tag]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated_data = $request->only($this->tag_data);
        $tag = Tag::findorfail($id);
        $tag->update($updated_data);
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Tag::destroy($id);
        return response()->json(['success'=>true]);
    }
}
