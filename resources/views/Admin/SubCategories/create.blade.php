@extends('Admin.Layouts.index')
@section('title')
    Create Sub Category
@endsection
@section('main-content')
    <div class="section-container">
        <h6 class="section-title">Add Sub Category</h6>
        <div class="row justify-content-md-center gutters">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <form id="sub-category_form" data-action="{{route('sub-categories.store')}}" method="Post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-block">
                        <div class="form-block-header">
                            <h5>Add Sub Category</h5>
                        </div>
                        <div class="form-block-body">
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                       required>
                            </div>
                            <div class="form-group">
                                <label>Description:</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Description"
                                    required> </textarea>
                            </div>
                            <div class="form-group">
                                <label>Main Category :</label>
                                <select class="form-control" name="parent_id">
                                    <option>Choose</option>
                                    @foreach($main_categories as $main_category)
                                        <option value="{{$main_category->id}}">{{$main_category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label custom-file-label-primary" for="customFile2">Choose
                                        Image</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Add Sub Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@include('Admin.Includes.JS.Js_subCategory')
