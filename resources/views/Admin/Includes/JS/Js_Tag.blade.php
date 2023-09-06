@include('Admin.Includes.JS.js_links')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="{{asset('')}}Js/form-validator/jquery.form-validator.min.js"></script>
<script>
    $.formUtils.loadModules('customModule otherCustomModule', 'js/validation-modules/');
    $.validate({
        modules: 'security, date',
    });
</script>
<script>
    $(document).ready(function ()
    {
        $('#tag_form').on('submit',function (e)
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
                    toastr.success('New Tag Added successfully!');
                    window.location.href = '/tags';
                },
                error: function(response) {
                    console.log(response);
                }
            })
        })
    });
    $(document).ready(function ()
    {
        $('#tag_form_edit').on('submit',function (e)
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
                    toastr.success('Tag Edited successfully!');
                    window.location.href = '/tags';
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
            ajax:"{{ route('tags.index') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name',name:'name'},
                {data: 'action', name: 'action',
                    orderable: false,
                    searchable: false},
            ]
        });
    });
    $(document).on('click', '.delete-btn', function(e) {
        e.preventDefault()
        var tag_id = $(this).val();
        $('#confirmModal').modal('show');
        $('#tag_id').val(tag_id);
        $('#delete_form').attr('data-action', "{{ route('tags.destroy', '') }}" + "/" + tag_id);
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
                    toastr.success('Tag Deleted successfully!');
                    myTable.ajax.reload();
                },
                error: function(response) {
                    console.log(response);
                }
            })
        })

    });


</script>
