@include('Admin.Includes.JS.js_links')
<script>
    var myTable;
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(function () {
        myTable = $('#Table').DataTable({
            processing: true,
            serverSide: true,
            ajax:"{{ route('tags-post.show',$id) }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'tagName',name: 'tagName'},
            ],
        });
    });
</script>
