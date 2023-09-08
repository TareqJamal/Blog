@include('Admin.Includes.JS.js_links')
<script>
    var myTable;
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(function () {
        myTable = $('.table').DataTable({
            processing: true,
            serverSide: true,
            ajax:"{{ route('writers.index') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name',name:'name'},
                {data: 'email',name:'status'},
                {data: 'image', name: 'image'},
                {data: 'is_active', name: 'image'},
                {data: 'action', name: 'action',
                    orderable: false,
                    searchable: false},
            ]
        });
    });
    $(document).ready(function ()
    {
        $('#writer_form').on('submit',function (e)
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
                        window.location.href ='/writers';
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
        $('#writer_form_edit').on('submit',function (e)
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
                    window.location.href = '/writers';
                },
                error: function(response) {
                    console.log(response);
                }
            })
        })

    });
    $(document).on('click', '.btn_status', function(e) {
        e.preventDefault()
        var writer_id = $(this).val();
        var url = "{{ route('writers.show', ':id') }}";
        url = url.replace(':id', writer_id);
        $.ajax({
            url :  url,
            method : "GET",
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(responce)
            {
                toastr.success('Writer Status Changed successfully!');
                myTable.ajax.reload();
            },
            error: function(response) {
                console.log(response);
            }
        })
    })

    $(document).on('click', '.delete-btn', function(e) {
        e.preventDefault()
        var writer_id = $(this).val();
        $('#confirmModal').modal('show');
        $('#writer_id').val(writer_id);
        $('#delete_form').attr('data-action', "{{ route('writers.destroy', '') }}" + "/" + writer_id);
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
                    toastr.success('Writer Deleted successfully!');
                    myTable.ajax.reload();
                },
                error: function(response) {
                    console.log(response);
                }
            })
        })

    });
</script>
