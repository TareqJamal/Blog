@extends('Admin.Layouts.index')
@section('title')
    Admins
@endsection
@section('main-content')
    <table id="Table" class="table table-bordered">
        <thead>
        <tr>
            <th>Admin No</th>
            <th>Admin Name</th>
            <th>Admin Email</th>
            <th>Admin Image</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Delete Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="delete_form" data-action="{{ route('admins.destroy', '') }}" method="Post">
                    @csrf
                    @method('Delete')
                    <div class="modal-body">
                        <input type="text" hidden name="admin_id" id="admin_id">
                        Are You sure to delete this Admin ?
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
@include('Admin.Includes.JS.Js_Admin')
