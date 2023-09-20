@include('Admin.Includes.JS.js_links')
<script>
    var myTable;
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(function () {
        myTable = $('#Table').DataTable({
            processing: true,
            serverSide: true,
            ajax:"{{ route('comments.index') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name',name:'name'},
                {data: 'email',name:'email'},
                {data: 'message', name: 'message'},
                {data: 'postTitle', name: 'postTitle'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action',
                    orderable: false,
                    searchable: false},
            ]
        });
    });
    $(document).on('click', '#btn', function(e) {
        e.preventDefault()
        var comment_id = $(this).val();
        $('#confirmModal').modal('show');
        $('#category_id').val(comment_id);
        $('#delete_form').attr('data-action', "{{ route('comments.destroy', '') }}" + "/" + comment_id);
    })

    $(document).ready(function () {
        $('#delete_form').on('submit', function (e) {
            var url = $(this).attr('data-action');
            e.preventDefault();
            $.ajax({
                url: url,
                method: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function (responce) {
                    $('#confirmModal').modal('hide');
                    toastr.success('Comment Deleted successfully!');
                    myTable.ajax.reload();
                },
                error: function (response) {
                    console.log(response);
                }
            })
        })
    })

</script>
