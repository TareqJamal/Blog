@extends('Admin.Layouts.index')
@section('title')
    Edit Writer
@endsection
@section('main-content')
    <div class="section-container">
        <h6 class="section-title">Writer : <span style="color:#063e7e;">{{$writer->name}}</span> </h6>
        <div class="row justify-content-md-center gutters">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <form id="writer_form_edit" data-action="{{route('writers.update',$writer->id)}}"  enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-block">
                        <div class="form-block-header">
                            <h5>Edit Writer</h5>
                        </div>
                        <div class="form-block-body">
                            <div class="form-group">
                                <input type="text" value="{{$writer->name}}" class="form-control" id="name" name="name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" value="{{$writer->email}}" class="form-control" id="name" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{$writer->phone}}" class="form-control" id="name" name="phone" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                @if($writer->image)
                                <img src="{{asset("").$writer->image}}" width="100px" height="100px" >
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
                            <button type="submit" id="submit" class="btn btn-primary pull-right">Edit Writer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@include('Admin.Includes.JS.Js_Writer')
