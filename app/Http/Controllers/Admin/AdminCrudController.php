<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class AdminCrudController extends Controller
{
    public $path = 'Admin.Admins.';
    public $admin_data = ['name','image','email','password','confirm_password'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(\request()->ajax())
        {
            $admins = User::all();
            return DataTables::of($admins)
                ->addIndexColumn()
                ->editColumn('name',function (User $admin)
                {
                    return $admin->name;
                })
                ->editColumn('email',function (User $admin)
                {
                    return $admin->email;
                })
                ->editColumn('image','Admin.Admins.Datatable.image')
                ->addColumn('action','Admin.Admins.Datatable.buttons')
                ->rawColumns(['name','email','action','image'])
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
            $existed = User::where('email',$request->email)->exists();
             if ($existed)
               {
                   return response()->json(['message'=>'Email is already exited']);
               }
             else
             {
                 $insertData = $request->only($this->admin_data);
                 if($request->hasFile('image'))
                 {
                     $image = $request->file('image');
                     $image_name = $image->getClientOriginalName().uniqid();
                     $location = $image->move('admins_images',$image_name);
                     $insertData['image'] = $location;
                     $insertData['password'] = Hash::make($request->password);
                     $data = User::create($insertData);
                     return response()->json(['added'=>'New Admin Added Successfully']);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = User::findorfail($id);
        return view($this->path.'edit')->with(['admin'=>$admin]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updateData = $request->only($this->admin_data);
        $admin = User::findorfail($id);
        if($request->hasFile('image'))
        {
            $imaga = $request->file('image');
            $imageName = $imaga->getClientOriginalName().uniqid();
            $imageLocation = $imaga->move('admins_images',$imageName);
            $updateData['image'] = $imageLocation;
        }
        $admin->update($updateData);
        return response()->json(['message'=>'Admin Edited Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
       User::destroy($request->admin_id);
       return response()->json(['success'=>'Admin Deleted Successful']);
    }
}
