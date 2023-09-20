@extends('Admin.Layouts.index')
@section('title')
    Create Category
@endsection
@section('main-content')
    <div class="section-container">
        <h6 class="section-title">Add Category</h6>
        <div class="row justify-content-md-center gutters">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <form id="category_form" data-action="{{route('categories.store')}}" method="Post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-block">
                        <div class="form-block-header">
                            <h5>Add Category</h5>
                        </div>
                        <div class="form-block-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <textarea  class="form-control" id="description" name="description" placeholder="description" required></textarea>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label custom-file-label-primary" for="customFile2">Choose file</label>
                                </div>
                            </div>
                            <button type="submit" id="submit" class="btn btn-primary pull-right">Add Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@include('Admin.Includes.JS.Js_Category')
