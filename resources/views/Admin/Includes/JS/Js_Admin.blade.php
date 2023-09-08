
@include('Admin.Includes.JS.js_links')
<script>
    var myTable;
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(function () {
        myTable = $('.table').DataTable({
            processing: true,
            serverSide: true,
            ajax:"{{ route('admins.index') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name',name:'name'},
                {data: 'email',name:'status'},
                {data: 'image', name: 'image'},
                {data: 'action', name: 'action',
                    orderable: false,
                    searchable: false},
            ]
        });
    });
    $(document).ready(function ()
    {
        $('#admin_form').on('submit',function (e)
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
                    if(responce.added)
                    {
                       toastr.success(responce.added);
                       window.location.href ='/admins';
                    }
                    else if(responce.message)
                    {
                        toastr.error(responce.message);
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            })
        })

    });
    $(document).ready(function ()
    {
        $('#admin_form_edit').on('submit',function (e)
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
                    toastr.success(responce.message);
                    window.location.href = '/admins';
                },
                error: function(response) {
                    console.log(response);
                }
            })
        })

    });

    $(document).on('click', '#btn', function(e) {
        e.preventDefault()
        var admin_id = $(this).val();
        $('#confirmModal').modal('show');
        $('#admin_id').val(admin_id);
        $('#delete_form').attr('data-action', "{{ route('admins.destroy', '') }}" + "/" + admin_id);
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
                    toastr.success(responce.message);
                    myTable.ajax.reload();
                },
                error: function(response) {
                    console.log(response);
                }
            })
        })

    });





</script>
