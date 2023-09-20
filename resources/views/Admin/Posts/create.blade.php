@extends('Admin.Layouts.index')
@section('title')
    Add Post
@endsection

@section('main-content')
    <div class="section-container">
        <h6 class="section-title">Add Post</h6>
        <div class="row justify-content-md-center gutters">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <form id="post_form" data-action="{{route('posts.store')}}" method="Post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-block">
                        <div class="form-block-header">
                            <h5>Add Post</h5>
                        </div>
                        <div class="form-block-body">
                            <div class="form-group">
                                <label>Post Title</label>
                                <input type="text" class="form-control" id="name" name="title" placeholder="title" >
                            </div>
                            <div class="form-group">
                                <label>Main Category :</label>
                                <select class="form-control" name="category_id">
                                    <option>Choose</option>
                                    @foreach($mainCategories as $mainCategory)
                                        <option value="{{$mainCategory->id}}">{{$mainCategory->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Sub Category :</label>
                                <select class="form-control" name="subCategory_id">
                                    <option>Choose</option>
                                    @foreach($subCategories as $subCategory)
                                        <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tag:</label>
                                <select class="form-control js-example-basic-multiple" name="tags[]" multiple="multiple">
                                    <option>Choose</option>
                                    @foreach($tags as $tag)
                                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label custom-file-label-primary" for="customFile2">Choose Main Image</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" multiple name="images[]" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label custom-file-label-primary" for="customFile2">Choose Sub Images</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="body"></label>
                                <textarea id="body" name="body" required> </textarea>
                            </div>
                            <input hidden name="writer_id" value="{{\Illuminate\Support\Facades\Auth::guard('writer')->id()}}">
                            <button type="submit" id="submit" class="btn btn-primary pull-right">Add Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function ()
        {
            $('#post_form').on('submit',function (e)
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
                        if(responce.added)
                        {
                            toastr.success(responce.added);
                        }
                        else if(responce.message)
                        {
                            toastr.error(responce.message);
                        }
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

