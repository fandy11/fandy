<script type="text/javascript">
    jQuery(document).ready(function(){
        var divClone = $("#extras").clone();
        $('#loc-tab a[href="#box_tab2"]').tab('show');
        // dynamic table
        type = jQuery('#{{ $id }}').dataTable({
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
        $('button#save-type').click( function() {
            var dataDelete = [];
            $("#{{ $id }} tbody tr").each(function() {
                var id = {
                    'id' : $(this).find("input:hidden").val(),
                    'delete' : $(this).find("input:checkbox").is(':checked'),
                    'status' : $(this).find("select").val()
                }
                dataDelete.push(id);
            });
            var json = JSON.stringify(dataDelete);
            $.ajax({
                type: 'POST',
                url : '{{ route('bulk_type') }}',
                data: {data : json},
                success: function(e){
                    type.fnDeleteRow( 0 );
                    var message = 'Save Changes Successful';
                    noty({
                            text: message,
                            type: 'success',
                            timeout: 2000
                    });                                       
                }
            });
            return false;
        });
    });
</script>
