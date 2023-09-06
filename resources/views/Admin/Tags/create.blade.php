@extends('Admin.Layouts.index')
@section('title')
    Create Tag
@endsection
@section('main-content')
    <div class="section-container">
        <h6 class="section-title">Add Tag</h6>
        <div class="row justify-content-md-center gutters">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <form id="tag_form" data-action="{{route('tags.store')}}" method="Post" >
                    @csrf
                    @method('Post')
                    <div class="form-block">
                        <div class="form-block-header">
                            <h5>Add Tag</h5>
                        </div>
                        <div class="form-block-body">
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" data-validation="required">
                            </div>
                            <button type="submit" id="submit" class="btn btn-primary pull-right">Add Tag</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@include('Admin.Includes.JS.Js_Tag')
