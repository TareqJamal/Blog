@include('Admin.Includes.JS.js_links')
<script>

    $(document).ready(function ()
    {
        $('#category_form').on('submit',function (e)
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
                    toastr.success('Category Added successfully!');
                    window.location.href = '/categories';
                },
                error: function(response) {
                    console.log(response);
                }
            })
        })

    });
</script>

<script>
    var myTable;
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(function () {
        myTable = $('.table').DataTable({
            processing: true,
            serverSide: true,
            ajax:"{{ route('categories.index') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name',name:'name'},
                {data: 'status',name:'status'},
                {data: 'description',name:'description'},
                {data: 'image', name: 'image'},
                {data: 'action', name: 'action',
                    orderable: false,
                    searchable: false},
            ]
        });
    });
</script>
<script>

    $(document).ready(function ()
    {
        $('#category_form_edit').on('submit',function (e)
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
                    toastr.success('Category Edited successfully!');
                    window.location.href = '/categories';
                },
                error: function(response) {
                    console.log(response);
                }
            })
        })

    });
</script>
<script>
    $(document).on('click', '#btn', function(e) {
        e.preventDefault()
        var category_id = $(this).val();
        $('#confirmModal').modal('show');
        $('#category_id').val(category_id);
        $('#delete_form').attr('data-action', "{{ route('sub-categories.destroy', '') }}" + "/" + category_id);
    })

    $(document).on('click', '.btn_status', function(e) {
        e.preventDefault()
        var category_id = $(this).val();
        $.ajax({
            url : 'categories/status/'+ category_id,
            method : "GET",
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(responce)
            {
                toastr.success('Category Status Changed successfully!');
                myTable.ajax.reload();
            },
            error: function(response) {
                console.log(response);
            }
        })
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
                    toastr.success('Category Deleted successfully!');
                    myTable.ajax.reload();
                },
                error: function(response) {
                    console.log(response);
                }
            })
        })

    });
</script>

