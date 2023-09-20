@extends('Admin.Layouts.index')
@section('title')
Tags Post
@endsection
@section('main-content')
    <h3 style="text-align: center">The Tags of Post {{$post->title}}</h3>
    <table id="Table" class="table table-bordered">
        <thead>
        <tr>
            <th>Tag No</th>
            <th>Tag</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="delete_form" data-action="{{ url('delete/tagsPost/{tag_id}/{post_id}') }}" method="Post">
                    @csrf
                    @method('Delete')
                    <div class="modal-body">
                        <input type="text" hidden name="tag_id" id="tag_id">
                        Are You sure to delete this Tag?
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

@include('Admin.Includes.JS.Js_TagsPost')
