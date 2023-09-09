<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebSiteSetting;
use Illuminate\Http\Request;

class WebSiteSettingController extends Controller
{
    public $path = 'Admin.Website_Setting.';
    public $setting_data = ['name','facebok_url','tweeter_url','instgram_url','mail_url','about_url','subscribe_url','advertise_url','careers_url','copyright'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $websiteSetting = WebSiteSetting::find(1);
        return view($this->path.'index')->with(['websiteSetting'=>$websiteSetting]);
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
        WebSiteSetting::create($settingData);
        return response()->json();

    }

    /**
     * Display the specified resource.
     */
    public function show(WebSiteSetting $webSiteSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WebSiteSetting $webSiteSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WebSiteSetting $webSiteSetting)
    {
        $settingData = $request->only($this->setting_data);
        $WebSiteSetting = WebSiteSetting::find(1);
        $WebSiteSetting->update($settingData);
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WebSiteSetting $webSiteSetting)
    {
        //
    }
}
