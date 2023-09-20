@include('Admin.Includes.JS.js_links')
@if(\Illuminate\Support\Facades\Auth::guard('web')->check())
<script>
    var myTable;
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(function () {
        myTable = $('#Table').DataTable({
            processing: true,
            serverSide: true,
            ajax:"{{ route('posts.index') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'title',name:'title'},
                {data: 'writer_id',name:'writer_id'},
                {data: 'category_id', name: 'category_id'},
                {data: 'subCategory_id', name: 'subCategory_id'},
                {data: 'image', name: 'image'},
                {data: 'comments', name: 'comments'},
                {data: 'views', name: 'views'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action',
                    orderable: false,
                    searchable: false},
            ]
        });
    });
</script>
@elseif(\Illuminate\Support\Facades\Auth::guard('writer')->check())
    <script>
        var myTable;
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(function () {
            myTable = $('#Table').DataTable({
                processing: true,
                serverSide: true,
                ajax:"{{ route('posts.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title',name:'title'},
                    {data: 'category_id', name: 'category_id'},
                    {data: 'subCategory_id', name: 'subCategory_id'},
                    {data: 'image', name: 'image'},
                    {data: 'comments', name: 'comments'},
                    {data: 'views', name: 'views'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action',
                        orderable: false,
                        searchable: false},
                ]
            });
        });
    </script>
@endif
<script>
    $(document).on('click', '#btn', function(e) {
        e.preventDefault()
        var post_id = $(this).val();
        $('#confirmModal').modal('show');
        $('#post_id').val(post_id);
        $('#delete_form').attr('data-action', "{{ route('posts.destroy', '') }}" + "/" + post_id);
    })

    $(document).ready(function ()
    {
        $('#delete_form').on('submit',function (e)
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
                    $('#confirmModal').modal('hide');
                    toastr.success(responce.success);
                    myTable.ajax.reload();
                },
                error: function(response) {
                    console.log(response);
                }
            })
        })

    });
</script>


