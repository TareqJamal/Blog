@include('Admin.Includes.JS.js_links')
<script>
    $(document).ready(function ()
    {
        $('#websiteDashboard_form').on('submit',function (e)
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
                    toastr.success('WebSite Setting Saved successfully!');
                },
                error: function(response) {
                    console.log(response);
                }
            })
        })

    });
</script>
