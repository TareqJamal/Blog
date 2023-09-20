@extends('Admin.Layouts.index')
@section('title')
    Comments
@endsection
@section('main-content')
    <table id="Table" class="table table-bordered">
        <thead>
        <tr>
            <th>Comment No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Post Title</th>
            <th>Commented At</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Comment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="delete_form" data-action="{{ route('comments.destroy', '') }}" method="Post">
                    @csrf
                    @method('Delete')
                    <div class="modal-body">
                        <input type="text" hidden name="post_id" id="post_id">
                        Are You sure to delete this Comment?
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

@include('Admin.Includes.JS.Js_comments')
