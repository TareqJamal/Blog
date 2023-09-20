@include('Admin.Includes.JS.js_links')
<script>
    var myTable;
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(function () {
        myTable = $('#Table').DataTable({
            processing: true,
            serverSide: true,
            ajax:"{{ route('images-post.show',$id) }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'image',name: 'image'},
                {data: 'action', name: 'action',
                    orderable: false,
                    searchable: false},
            ],
        });
    });
    </script>
<script>
    $(document).on('click', '#btn', function(e) {
        e.preventDefault()
        var image_id = $(this).val();
        $('#confirmModal').modal('show');
        $('#image_id').val(image_id);
        $('#delete_form').attr('data-action', "{{ route('images-post.destroy', '') }}" + "/" + image_id);
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

    {{--$('#Table').on('click','.btn-edit',function() {--}}
    {{--    var id = $(this).data('id');--}}
    {{--    $.ajax({--}}
    {{--        url: "{{ route('images-post.edit')}}" + id,--}}
    {{--        type: 'Post',--}}
    {{--        data: {_token: CSRF_TOKEN, id: id},--}}
    {{--        success: function (response) {--}}
    {{--            $('#modal-product-edit').html(response.html);--}}
    {{--            $('#modal-product-edit').modal('show');--}}
    {{--        }--}}
    {{--    });--}}
    {{--});--}}
</script>
