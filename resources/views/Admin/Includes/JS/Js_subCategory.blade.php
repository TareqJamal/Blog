@include('Admin.Includes.JS.js_links')
<script>

    $(document).ready(function ()
    {
        $('#sub-category_form').on('submit',function (e)
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
                    toastr.success('New Sub Category Added successfully!');
                    window.location.href = '/sub-categories';
                },
                error: function(response) {
                    console.log(response);
                }
            })
        })
    });


    $(document).ready(function ()
    {
        $('#sub_category_form_edit').on('submit',function (e)
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
                    toastr.success('Sub Category Edited successfully!');
                    window.location.href = '/sub-categories';
                },
                error: function(response) {
                    console.log(response);
                }
            })
        })

    });

    var myTable;
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(function () {
        myTable = $('.table').DataTable({
            processing: true,
            serverSide: true,
            ajax:"{{ route('sub-categories.index') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name',name:'name'},
                {data: 'description',name:'description'},
                {data: 'status',name:'status'},
                {data: 'parent_id',name:'status'},
                {data: 'image', name: 'image'},
                {data: 'action', name: 'action',
                    orderable: false,
                    searchable: false},
            ]
        });
    });


    $(document).on('click', '.btn_status', function(e) {
        e.preventDefault()
        var category_id = $(this).val();
        var url = "{{ route('sub-categories.show', ':id') }}";
        url = url.replace(':id', category_id);
        $.ajax({
            url :  url,
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

    $(document).on('click', '.delete-btn', function(e) {
        e.preventDefault()
        var subcategory_id = $(this).val();
        $('#confirmModal').modal('show');
        $('#subcategory_id').val(subcategory_id);
        $('#delete_form').attr('data-action', "{{ route('sub-categories.destroy', '') }}" + "/" + subcategory_id);
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
                    toastr.success('Sub Category Deleted successfully!');
                    myTable.ajax.reload();
                },
                error: function(response) {
                    console.log(response);
                }
            })
        })

    });
</script>
