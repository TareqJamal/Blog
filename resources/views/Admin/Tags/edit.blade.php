@extends('Admin.Layouts.index')
@section('title')
    Edit Tag
@endsection
@section('main-content')
    <div class="section-container">
        <h6 class="section-title">Tag : <span style="color:#063e7e;">{{$tag->name}}</span> </h6>
        <div class="row justify-content-md-center gutters">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <form id="tag_form_edit" data-action="{{route('tags.update',$tag->id)}}"  enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-block">
                        <div class="form-block-header">
                            <h5>Edit Tag</h5>
                        </div>
                        <div class="form-block-body">
                            <div class="form-group">
                                <input type="text" value="{{$tag->name}}" class="form-control" id="name" name="name" placeholder="Name" required>
                            </div>
                            <button type="submit" id="submit" class="btn btn-primary pull-right">Edit Tag</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@include('Admin.Includes.JS.Js_Tag')
