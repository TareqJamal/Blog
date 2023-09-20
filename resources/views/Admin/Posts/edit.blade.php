@extends('Admin.Layouts.index')
@section('title')
    Edit Post
@endsection
@section('main-content')
    <div class="section-container">
        <h6 class="section-title">Post : <span style="color:#063e7e;">{{$post->title}}</span> </h6>
        <div class="row justify-content-md-center gutters">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <form id="post_form_edit" data-action="{{route('posts.update',$post->id)}}"  enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-block">
                        <div class="form-block-header">
                            <h5>Edit Post</h5>
                        </div>
                        <div class="form-block-body">
                            <div class="form-group">
                                <label>Post Title</label>
                                <input type="text" class="form-control" value="{{$post->title}}" id="name" name="title" placeholder="title" >
                            </div>
                            <div class="form-group">
                                <label>Main Category :</label>
                                <select class="form-control" name="category_id">
                                    <option>Choose</option>
                                    @foreach($mainCategories as $mainCategory)
                                        <option value="{{$mainCategory->id}}" {{$mainCategory->id == $post->category_id ? 'selected' : ''}}>{{$mainCategory->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Sub Category :</label>
                                <select class="form-control" name="subCategory_id">
                                    <option>Choose</option>
                                    @foreach($subCategories as $subCategory)
                                        <option value="{{$subCategory->id}}" {{$subCategory->id == $post->subCategory_id ? 'selected' : ''}}>{{$subCategory->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                   <img src="{{asset('').$post->image}}" width="150px" height="150px">
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label custom-file-label-primary" for="customFile2">Choose Main Image</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="body"></label>
                                <textarea id="body" name="body" required> {{$post->body}} </textarea>
                            </div>
                            <button type="submit" id="submit" class="btn btn-primary pull-right">Edit Post</button>
                        </div>
                    </div>
                </form>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function ()
        {
            $('#post_form_edit').on('submit',function (e)
            {
                var url = $(this).attr('data-action');
                e.preventDefault();
                $.ajax({
                    url : url,
                    method : "POST",
                    data : new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(responce)
                    {
                        toastr.success('Post Edited successfully!');
                        window.location.href = '/posts';
                    },
                    error: function(response) {
                        console.log(response);
                    }
                })
            })
        });
    </script>
@endsection
