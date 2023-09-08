@extends('Admin.Layouts.index')
@section('title')
    Add Writer
@endsection
@section('main-content')
    <div class="section-container">
        <h6 class="section-title"> Add Writer</h6>
        <div class="row justify-content-md-center gutters">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <form id="writer_form" data-action="{{route('writers.store')}}" method="Post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-block">
                        <div class="form-block-header">
                            <h5> Add Writer</h5>
                        </div>
                        <div class="form-block-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="email" name="phone" placeholder="Phone" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="Password" name="password" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="Confirm_Password" name="confirmPassword" placeholder="Confirm Password" required>
                            </div>

                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label custom-file-label-primary" for="customFile2">Choose file</label>
                                </div>
                            </div>
                            <button type="submit" id="submit" class="btn btn-primary pull-right">Add Writer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@include('Admin.Includes.JS.Js_Writer')
