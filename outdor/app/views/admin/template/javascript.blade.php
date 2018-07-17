<script type="text/javascript">
    jQuery(document).ready(function(){
        var divClone = $("#extras").clone();
        $('#loc-tab a[href="#box_tab2"]').tab('show');
        // dynamic table
        oTable = jQuery('#{{ $id }}').dataTable({
        @foreach ($options as $k => $o)
            {{ json_encode($k) }}: {{ json_encode($o) }},
        @endforeach

        @foreach ($callbacks as $k => $o)
            {{ json_encode($k) }}: {{ $o }},
        @endforeach
        "aoColumnDefs": [
              { "bSortable": false, "aTargets": [ 0 ] }
            ],
        });
        $('button#save').click( function() {
            save('{{ route('bulk_loc') }}');
            return false;
        });
        $('button#save-car').click( function() {
            save('{{ route('bulk_car') }}');
            return false;
        });
        $('button#save-extra').click( function() {
            save('{{ route('bulk_extra') }}');
            return false;
        });
        $('button#save-type').click( function() {
            save('{{ route('bulk_type') }}');
            return false;
        });
        $(document).on('click', '#edit', function(e) {
            url = $(this).attr('href');
            $.ajax({
               type : 'GET',
               url : url,
               success: function(e){
                   $('#loc-tab').append('<li><a href="#edit_tab" data-toggle="tab">Edit Location</a></li>');
                   $('#loc-content').append(e);
                   $('#loc-tab a:last').tab('show');
                }
            });
            e.preventDefault();
        });
        $(document).on('click','#edit-user',function(e){
            url = $(this).attr('href');
            $.get(url)
                    .done(function(data) {
                        $('#user-tab').append('<li><a href="#edit_user" data-toggle="tab">Edit User</a></li>');
                        $('#user-content').append(data);
                        $('#user-tab a:last').tab('show');
                        NProgress.done();
                    }, 'html');
            e.preventDefault();
        });
        $(document).on('click','#edit-res',function(e){
            url = $(this).attr('href');
            $.get(url)
                    .done(function(data) {
                        $('#res-tab').append('<li><a href="#edit_res" data-toggle="tab">Edit Reservation</a></li>');
                        $('#res-content').append(data);
                        $('#res-tab a:last').tab('show');
                        NProgress.done();
                    }, 'html');
            e.preventDefault();
        });
        $('#user-tab a[href="#users"]').click(function (e) {
                var tabId = $('#user-tab a[href="#edit_user"]').parents('li').children('a').attr('href');
                $('#user-tab a[href="#edit_user"]').parents('li').remove('li');
                $(tabId).remove();
                $('#user-tab a:first').tab('show');
          })
        $('#user-tab a[href="#new-user"]').click(function (e) {
                var tabId = $('#user-tab a[href="#edit_user"]').parents('li').children('a').attr('href');
                $('#user-tab a[href="#edit_user"]').parents('li').remove('li');
                $(tabId).remove();
                $('#user-tab a:first').tab('show');
          })
        $('#loc-tab a[href="#box_tab1"]').click(function (e) {
                var tabId = $('#loc-tab a[href="#edit_tab"]').parents('li').children('a').attr('href');
                $('#loc-tab a[href="#edit_tab"]').parents('li').remove('li');
                $(tabId).remove();
                $('#loc-tab a:first').tab('show');
          })
        $('#loc-tab a[href="#box_tab2"]').click(function (e) {
                var tabId = $('#loc-tab a[href="#edit_tab"]').parents('li').children('a').attr('href');
                $('#loc-tab a[href="#edit_tab"]').parents('li').remove('li');
                $(tabId).remove();
                $('#loc-tab a:first').tab('show');
          })
          function save(url){
            var recordsToDelete = [];
            $("#{{ $id }} tbody tr").each(function() {
                var id = {
                    'id' : $(this).find("input:hidden").val(),
                    'delete' : $(this).find("input:checkbox").is(':checked'),
                    'status' : $(this).find("select").val()
                }
                recordsToDelete.push(id);
            });
            var json = JSON.stringify(recordsToDelete);
            $.ajax({
                type: 'POST',
                url : url,
                data: {data : json},
                success: function(e){
                    oTable.fnDeleteRow( 0 );
                    var message = 'Save Changes Successful';
                    noty({
                            text: message,
                            type: 'success',
                            timeout: 2000
                    });                     
                }
            });
          }
    });
</script>
