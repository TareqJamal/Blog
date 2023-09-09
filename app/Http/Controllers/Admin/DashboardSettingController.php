<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DashboardSetting;
use Illuminate\Http\Request;

class DashboardSettingController extends Controller
{
    public $path = 'Admin.Dashboard_Setting.';
    public $setting_data = ['name','icon','name_footer'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dashboardSetting = DashboardSetting::find(5);
        return view($this->path.'index')->with(['dashboardSetting'=>$dashboardSetting]);

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
       $settingData = $request->only($this->setting_data);
       if($request->hasFile('icon'))
       {
           $image = $request->file('icon');
           $imageName = $image->getClientOriginalName().uniqid();
           $imageLocation = $image->move('settingDashboard_Images',$imageName);
           $settingData['icon'] = $imageLocation;
       }
       DashboardSetting::create($settingData);
      return response()->json();

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $settingData = $request->only($this->setting_data);
        $settingDashboard = DashboardSetting::findorfail($id);
        if($request->hasFile('icon'))
        {
            $image = $request->file('icon');
            $imageName = $image->getClientOriginalName().uniqid();
            $imageLocation = $image->move('settingDashboard_Images',$imageName);
            $settingData['icon'] = $imageLocation;
        }
        $settingDashboard->update($settingData);
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
