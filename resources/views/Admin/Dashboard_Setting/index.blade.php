@extends('Admin.Layouts.index')
@section('title')
    Dashboard Setting
@endsection
@section('main-content')
    <div class="section-container">
        <h6 class="section-title"> Dashboard Setting</h6>
        <div class="row justify-content-md-center gutters">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <form id="settingDashboard_form" data-action="{{isset($dashboardSetting) ? route('dashboard-settings.update',$dashboardSetting->id) : route('dashboard-settings.store') }}" method="Post" enctype="multipart/form-data">
                    @csrf
                    @if($dashboardSetting)
                        @method('Put')
                    @endif
                    <div class="form-block">
                        <div class="form-block-header">
                            <h5> Dashboard Setting</h5>
                        </div>
                        <div class="form-block-body">
                            <div class="form-group">
                                <label>Name: </label>
                                <input type="text" value="{{isset($dashboardSetting) ? $dashboardSetting->name : '' }}" class="form-control" id="name" name="name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <label> Footer Name: </label>
                                <input type="text" value="{{isset($dashboardSetting) ? $dashboardSetting->name_footer : '' }}" class="form-control" id="email" name="name_footer" placeholder="Footer Name" required>
                            </div>
                            @if(isset($dashboardSetting))
                                <div class="form-group">
                                   <img src="{{asset('').$dashboardSetting->icon}}" width="150px" height="150px">
                                </div>
                            @else
                                <div class="form-group">

                                    <img src="{{asset('Admin')}}/img/logo.png">
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" name="icon" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label custom-file-label-primary" for="customFile2">Choose Icon</label>
                                </div>
                            </div>
                            <button type="submit" id="submit" class="btn btn-primary pull-right">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@include('Admin.Includes.JS.Js_DashboardSetting')
