@extends('Admin.Layouts.index')
@section('title')
    WebSite Setting
@endsection
@section('main-content')
    <div class="section-container">
        <h6 class="section-title"> WebSite Setting</h6>
        <div class="row justify-content-md-center gutters">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <form id="websiteDashboard_form"
                      data-action="{{isset($websiteSetting) ? route('website-settings.update',$websiteSetting->id) : route('website-settings.store') }}"
                      method="Post" enctype="multipart/form-data">
                    @csrf
                    @if($websiteSetting)
                        @method('Put')
                    @endif
                    <div class="form-block">
                        <div class="form-block-header">
                            <h5> WebSite Setting</h5>
                        </div>
                        <div class="form-block-body">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>Website Name: </label>
                                    <input type="text"
                                           value="{{isset($websiteSetting) ? $websiteSetting->name : '' }}"
                                           class="form-control" id="name" name="name" placeholder="Name" required>
                                </div>
                                <div class="form-group col-12">
                                    <label>Facebook Link: </label>
                                    <input type="url"
                                           value="{{isset($websiteSetting) ? $websiteSetting->facebok_url : '' }}"
                                           class="form-control" id="name" name="facebok_url" placeholder="Name" required>
                                </div>
                                <div class="form-group col-6">
                                    <label>Twitter Link: </label>
                                    <input type="url"
                                           value="{{isset($websiteSetting) ? $websiteSetting->tweeter_url : '' }}"
                                           class="form-control" id="name" name="tweeter_url" placeholder="Name" required>
                                </div>
                                <div class="form-group col-6">
                                    <label>Instagram Link: </label>
                                    <input type="url"
                                           value="{{isset($websiteSetting) ? $websiteSetting->instgram_url : '' }}"
                                           class="form-control" id="name" name="instgram_url" placeholder="Name" required>
                                </div>
                                <div class="form-group col-6">
                                    <label>Mail Link: </label>
                                    <input type="url"
                                           value="{{isset($websiteSetting) ? $websiteSetting->mail_url : '' }}"
                                           class="form-control" id="name" name="mail_url" placeholder="Name" required>
                                </div>
                                <div class="form-group col-6">
                                    <label>About Us Link </label>
                                    <input type="url"
                                           value="{{isset($websiteSetting) ? $websiteSetting->about_url : '' }}"
                                           class="form-control" id="name" name="about_url" placeholder="About Url" required>
                                </div>
                                <div class="form-group col-6">
                                    <label>Subscribes Link </label>
                                    <input type="url"
                                           value="{{isset($websiteSetting) ? $websiteSetting->subscribe_url : '' }}"
                                           class="form-control" id="name" name="subscribe_url" placeholder="Name" required>
                                </div>
                                <div class="form-group col-6">
                                    <label>Advertise Link </label>
                                    <input type="url"
                                           value="{{isset($websiteSetting) ? $websiteSetting->advertise_url : '' }}"
                                           class="form-control" id="name" name="advertise_url" placeholder="Name" required>
                                </div>
                                <div class="form-group col-12">
                                    <label>Career Link: </label>
                                    <input type="url"
                                           value="{{isset($websiteSetting) ? $websiteSetting->careers_url : '' }}"
                                           class="form-control" id="name" name="careers_url" placeholder="Name" required>
                                </div>
                                <div class="form-group col-12">
                                    <label>CopyRight: </label>
                                    <input type="text"
                                           value="{{isset($websiteSetting) ? $websiteSetting->copyright : '' }}"
                                           class="form-control" id="name" name="copyright" placeholder="Name" required>
                                </div>
                                <div class="form-group col-12">
                                    <button type="submit" id="submit" class="btn btn-primary pull-right">Save</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@include('Admin.Includes.JS.Js_WebsiteSetting')
