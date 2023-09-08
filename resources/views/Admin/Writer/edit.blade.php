@extends('Admin.Layouts.index')
@section('title')
    Edit Admin
@endsection
@section('main-content')
    <div class="section-container">
        <h6 class="section-title">Admin : <span style="color:#063e7e;">{{$admin->name}}</span> </h6>
        <div class="row justify-content-md-center gutters">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <form id="admin_form_edit" data-action="{{route('admins.update',$admin->id)}}"  enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-block">
                        <div class="form-block-header">
                            <h5>Edit Admin</h5>
                        </div>
                        <div class="form-block-body">
                            <div class="form-group">
                                <input type="text" value="{{$admin->name}}" class="form-control" id="name" name="name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" value="{{$admin->email}}" class="form-control" id="name" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                @if($admin->image)
                                <img src="{{asset("").$admin->image}}" width="100px" height="100px" >
                                @else
                                    <img src="{{asset('')}}Admin/img/defaultadmin.jpg" width="100px" height="100px" >
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label custom-file-label-primary" for="customFile2">Choose file</label>
                                </div>
                            </div>
                            <button type="submit" id="submit" class="btn btn-primary pull-right">Edit Admin</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@include('Admin.Includes.JS.Js_Admin')
