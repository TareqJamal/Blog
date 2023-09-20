@extends('Admin.Layouts.index')
@section('title')
    Posts
@endsection
@section('main-content')
    @if(\Illuminate\Support\Facades\Auth::guard('web')->check())
    <table id="Table" class="table table-bordered">
        <thead>
        <tr>
            <th>Post No</th>
            <th>Post Title</th>
            <th>Writer</th>
            <th>Main Category</th>
            <th>Sub Category</th>
            <th>Image</th>

            <th>Comments</th>
            <th>Views</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    @elseif(\Illuminate\Support\Facades\Auth::guard('writer')->check())
        <table id="Table" class="table table-bordered">
            <thead>
            <tr>
                <th>Post No</th>
                <th>Post Title</th>
                <th>Main Category</th>
                <th>Sub Category</th>
                <th>Image</th>

                <th>Comments</th>
                <th>Views</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    @endif

    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="delete_form" data-action="{{ route('posts.destroy', '') }}" method="Post">
                    @csrf
                    @method('Delete')
                    <div class="modal-body">
                        <input type="text" hidden name="post_id" id="post_id">
                        Are You sure to delete this Post?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
                        <button type="submit" class="btn btn-primary confirmDeleteBtn">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@include('Admin.Includes.JS.Js_Post')
