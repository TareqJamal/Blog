<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class WriterController extends Controller
{
    public $path = 'Admin.Writers.';
    public $writer_data = ['name','image','email','password','phone'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (\request()->ajax()) {
            $writers = Writer::all();
            return DataTables::of($writers)
                ->addIndexColumn()
                ->editColumn('name', function (Writer $writer) {
                    return $writer->name;
                })
                ->editColumn('email', function (Writer $writer) {
                    return $writer->email;
                })
                ->editColumn('phone', function (Writer $writer) {
                    return $writer->phone;
                })
                ->editColumn('image', 'Admin.Writers.Datatable.image')
                ->editColumn('is_active', 'Admin.Writers.Datatable.status')
                ->addColumn('action', 'Admin.Writers.Datatable.buttons')
                ->rawColumns(['name', 'email', 'action', 'image', 'phone','is_active'])
                ->toJson();
        }
        return view($this->path.'index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view($this->path.'create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if($request->password === $request->confirmPassword)
        {
            $email = $request->email;
            $emailCheck = Writer::where('email',$email)->exists();
            if($emailCheck)
            {
                return response()->json(['message'=>'Email is Already Exited']);
            }
            else
            {
                if( $request->hasFile('image'))
                {
                    $insertWriter = $request->only($this->writer_data);
                    $image = $request->file('image');
                    $imageName = $image->getClientOriginalName().uniqid();
                    $imageLocation = $image->move('writerImages',$imageName);
                    $insertWriter['image'] = $imageLocation;
                    $hashPassword = Hash::make($request->password);
                    $insertWriter['password'] = $hashPassword;
                    $data = Writer::create($insertWriter);
                    return response()->json(['added'=>'Writer Added Successfully']);
                }
                else
                {
                    return response()->json(['message'=>'Please Choose Image']);
                }

            }

        }
        else
        {
            return response()->json(['message'=>'Password Not Match']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $writer = Writer::findorfail($id);
        $writer->is_active = !$writer->is_active;
        $writer->save();
        return response()->json();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $writer = Writer::findorfail($id);
        return view($this->path.'edit')->with(['writer'=>$writer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updateData = $request->only($this->writer_data);
        $writer = Writer::findorfail($id);
        if($request->hasFile('image'))
        {
            $imaga = $request->file('image');
            $imageName = $imaga->getClientOriginalName().uniqid();
            $imageLocation = $imaga->move('writerImages',$imageName);
            $updateData['image'] = $imageLocation;
        }
        $writer->update($updateData);
        return response()->json(['message'=>'Writer Edited Successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Writer::destroy($request->writer_id);
        return response()->json(['success'=>'Writer Deleted Successful']);
    }
}
