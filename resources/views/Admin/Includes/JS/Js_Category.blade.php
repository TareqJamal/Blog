<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
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

