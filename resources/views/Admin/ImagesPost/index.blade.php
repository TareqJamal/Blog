@extends('Admin.Layouts.index')
@section('title')
    Images Post
@endsection
@section('main-content')
    <table id="Table" class="table table-bordered">
        <thead>
        <tr>
            <th>Image No</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="delete_form" data-action="{{ route('images-post.destroy', '') }}" method="Post">
                    @csrf
                    @method('Delete')
                    <div class="modal-body">
                        <input type="text" hidden name="image_id" id="image_id">
                        Are You sure to delete this Image?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
                        <button type="submit" class="btn btn-primary confirmDeleteBtn">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal" id="model-edit-image" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Edit Image</label>
                            <input type="file" class="form-control">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection

@include('Admin.Includes.JS.Js_ImagesPost')
