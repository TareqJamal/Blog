@extends('Admin.Layouts.index')
@section('title')
    Edit Sub Category
@endsection
@section('main-content')
    <div class="section-container">
        <h6 class="section-title">Sub Category : <span style="color:#063e7e;">{{$sub_category->name}}</span> </h6>
        <div class="row justify-content-md-center gutters">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <form id="sub_category_form_edit" data-action="{{route('sub-categories.update',$sub_category->id)}}"  enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-block">
                        <div class="form-block-header">
                            <h5>Edit Category</h5>
                        </div>
                        <div class="form-block-body">
                            <div class="form-group">
                                <input type="text" value="{{$sub_category->name}}" class="form-control" id="name" name="name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <label>Description:</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Description"
                                          required>{{$sub_category->description}} </textarea>
                            </div>
                            <div class="form-group">
                                <label>Main Category :</label>
                                <select class="form-control" name="parent_id">
                                    @foreach($main_categories as $main_category)
                                        <option value="{{$main_category->id}}" {{$main_category->id == $sub_category->parent_id ?'selected':''}}>{{$main_category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <img src="{{asset("").$sub_category->image}}" width="100px" height="100px" >
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label custom-file-label-primary" for="customFile2">Choose file</label>
                                </div>
                            </div>
                            <button type="submit" id="submit" class="btn btn-primary pull-right">Edit Sub Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@include('Admin.Includes.JS.Js_subCategory')
