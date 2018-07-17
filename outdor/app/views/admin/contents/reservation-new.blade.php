<div class="alert alert-info">
    <strong>Rental details</strong><br/>
    In the Rental Details box below you can add details about the reservation - start and end date/time, car type, pick-up and return locations. As soon as you select car type the price for the selected rental period will be automatically calculated in the Price box. Use the Extras box at the bottom to add additional extras to the reservation. Their price will also be included in the total rental price.</div>
{{ Form::open(array('route' => 'admin.reservation.store','method' => 'post','class' => 'form-horizontal','id' => 'validate-2')) }}

<div class="row">
    <div class="col-md-6">
        <!--=== Headings ===-->
        <div class="widget box">
            <div class="widget-header">
                <h4><i class="icon-reorder"></i> Rental Details</h4>
            </div>
            <div class="widget-content" id="rental">
                <div class="form-group">
                    <label class="col-md-3 control-label">Status <span class="required">*</span></label>
                    <div class="col-md-9">
                        {{ Form::select('status',array('' => '-- Choose --','cancelled' => 'Cancelled','collected' => 'Collected','complete' => 'Complete','confirmed' => 'Confirmed','pending' => 'Pending'),'',array('class' => 'form-control required')) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">From <span class="required">*</span></label>
                    <div class="col-md-6">
                        {{ Form::text('start-date','',array('class' => 'form-control required datepicker','id' => 'from')) }}
                    </div>
                    <div class="col-md-3">
                        {{ Form::text('start-time','',array('class' => 'form-control required timepicker','id' => 'timefrom')) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">To <span class="required">*</span></label>
                    <div class="col-md-6">
                        {{ Form::text('end-date','',array('class' => 'form-control required datepicker','id' => 'to')) }}
                    </div>
                    <div class="col-md-3">
                        {{ Form::text('end-time','',array('class' => 'form-control required timepicker','id' => 'timeto')) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Type<span class="required">*</span></label>
                    <div class="col-md-5">
                        {{ Form::select('type', $selecttype,'',array('class' => 'form-control required','id' => 'selecttype','min' => '1')) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Select Cars<span class="required">*</span></label>
                    <div class="col-md-5">
                        {{ Form::select('car', array(0 => '-= Choose Car =-'),'',array('class' => 'form-control required','id' => 'selectcar','min' => '1')) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Pick Up Location<span class="required">*</span></label>
                    <div class="col-md-5">
                        {{ Form::select('loc_pick', $selectbox,'',array('class' => 'form-control required','min' => '1')) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Return Location<span class="required">*</span></label>
                    <div class="col-md-5">
                        {{ Form::select('loc_return', $selectbox,'',array('class' => 'form-control required','min' => '1')) }}
                    </div>
                </div>
                <div class="form-actions">
                    <a href='{{route('admin.car.index')}}' class='btn pull-right'>Cancel</a>
                    {{ Form::submit('Save',array('class' => 'btn btn-primary pull-right')) }}
                </div> 
            </div>
        </div>
        <div class="widget box">
            <div class="widget-header">
                <h4><i class="icon-reorder"></i> Extras</h4>
            </div>
            <div class="widget-content" id="extras">
                <div class="form-group">
                    <div class="col-md-9" id="extras">
                    </div>
                </div>
                <div class="form-actions" id="button-ex">
                </div> 
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="widget box">
            <div class="widget-header">
                <h4><i class="icon-reorder"></i> Price</h4>
            </div>
            <div class="widget-content" id="price">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info">
            <strong>Customer details</strong><br/>
            Enter customer details in the form below.
        </div>
        <div class="widget box">
            <div class="widget-header">
                <h4><i class="icon-reorder"></i> Customer Details</h4>
            </div>
            <div class="widget-content" id="customer">
                <div class="form-group">
                    <label class="col-md-3 control-label">Title <span class="required">*</span></label>
                    <div class="col-md-3">
                        {{ Form::select('title',array('' => '-- Choose --','Dr'=>'Dr','Mr'=>'Mr','Mrs'=>'Mrs','Ms'=>'Ms','Other'=>'Other','Prof' =>'Prof','Rev' => 'Rev'),'',array('class' => 'form-control required')) }}
                    </div>
                </div>
                <div  class="form-group">
                    {{ Form::label('name', 'Name', array('class' => 'col-md-3 control-label')); }}
                    <div class="col-md-4">
                        {{ Form::text('name','',array('class' => 'form-control required')) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('email', 'Email', array('class' => 'col-md-3 control-label')); }}
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            {{ Form::text('email','',array('class' => 'form-control required email')) }}
                        </div>
                    </div>
                    <p for="email" generated="true" class="has-error help-block" style="display:none;"></p>
                </div>
                <div class="form-group">
                    {{ Form::label('phone', 'Phone', array('class' => 'col-md-3 control-label')); }}
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-addon"><i class='icon-phone'></i></span>
                            {{ Form::text('phone','',array('class' => 'form-control required digits')) }}
                        </div>
                        <p for="phone" generated="true" class="has-error help-block" style="display:none;"></p>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('country', 'Country', array('class' => 'col-md-3 control-label')); }}
                    <div class="col-md-5">
                        {{ Form::select('country', array('Indonesia' => 'Indonesia'), '',array('class' => 'select2-select-00 col-md-12 full-width-fix required')); }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('state', 'State', array('class' => 'col-md-3 control-label')); }}
                    <div class="col-md-5">
                        {{ Form::text('state','',array('class' => 'form-control required')) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('city', 'City', array('class' => 'col-md-3 control-label')); }}
                    <div class="col-md-5">
                        {{ Form::text('city','',array('class' => 'form-control required')) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('address', 'Address', array('class' => 'col-md-3 control-label')); }}
                    <div class="col-md-5">
                        {{ Form::text('address','',array('class' => 'form-control required')) }}
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('zip', 'ZIP', array('class' => 'col-md-3 control-label')); }}
                    <div class="col-md-2">
                        {{ Form::text('zip','',array('class' => 'form-control required digits')) }}
                    </div>
                </div>
            </div>
            <div class="form-actions">
                {{ Form::submit('Save',array('class' => 'btn btn-primary pull-right')) }}
            </div>
        </div>
    </div>
</div>
{{ Form::close() }} 
<script>
    $(document).ready(function() {
        $("#rental").on('change', '#selectcar', function(e) {
            getPrice();
        });
        $("#from, #to, #timefrom, #timeto").on('change keyup paste', function(e) {
            var start = $('#from').val() + ' ' + $('#timefrom').val();
            var end = $('#to').val() + ' ' + $('#timeto').val();
            if ($('#selectcar').val() !== '0') {
                getPrice();
                if (moment(end).isBefore(start)) {
                    alert('telo');
                }
            }
            e.preventDefault();
        });
        $('#extras').on('change', '#ex-option', function(e) {
            if ($('#selectcar').val() !== '0') {
                getPrice();
            }
        });
        var peradd = 1;
        $('#extras').on('click', '#addex-new', function(e) {
            peradd += 1;
            $.get("{{ route('car')}}", {id: $('#selecttype').val(), 'add': true, 'addid': peradd})
                    .done(function(data) {
                        $(data).insertBefore("#button-ex");
                    }, 'json');
            e.preventDefault();
        });
        $('#extras-edit').on('click', '#addex-edit', function(e) {
            peradd += 1;
            $.get("{{ route('car')}}", {id: $('#selecttype').val(), 'add': true, 'addid': peradd})
                    .done(function(data) {
                        $(data).insertBefore("#buttonex-edit");
                    }, 'json');
            e.preventDefault();
        });
        $('#extras').on('click', '.delex', function(e) {
            data = $(this).attr('id').split('-');
            id = data[1];
            $("#add-" + id).remove(); //decrement textbox
            getPrice();
        });
        $("#from").datepicker({
            changeMonth: true,
            numberOfMonths: 1,
            showOtherMonths: true,
            autoSize: true,
            appendText: '<span class="help-block">(yyyy-mm-dd)</span>',
            dateFormat: 'yy-mm-dd',
            onClose: function(selectedDate) {
                $("#to").datepicker("option", "minDate", selectedDate);
            }
        });
        $("#to").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            showOtherMonths: true,
            autoSize: true,
            appendText: '<span class="help-block">(yyyy-mm-dd)</span>',
            dateFormat: 'yy-mm-dd',
            onClose: function(selectedDate) {
                $("#from").datepicker("option", "maxDate", selectedDate);
            }
        });
        $('.timepicker').pickatime();
        $('#selecttype').on('change', function() {

            $.ajax({
                type: "GET",
                url: "{{ route('car')}}",
                data: {id: $(this).val()},
                dataType: "json",
                success: function(response) {
                    //do some logic

                    $('#selectcar').find('option').remove();
                    $('#button-ex').find('input[type=button]').remove();
                    if (response['car'] === undefined) {
                        $('#selectcar').append($('<option>', {
                            value: 0,
                            text: '-= Choose Car =-',
                        }));
                    }
                    else if (response['car'].length > 0) {
                        $('#selectcar').append($('<option>', {
                            value: 0,
                            text: '-= Choose Car =-',
                        }));
                        $.each(response['car'], function(i, item) {
                            $('#selectcar').append($('<option>', {
                                value: response['car'][i].id,
                                text: response['car'][i].make + ' ' + response['car'][i].model
                            }));
                        });
                    }
                    if (response['extra'] !== undefined) {
                        if (response['extra'].length > 0) {
                            $("#extras").html(response['extra']);
                        }
                    }
                },
                error: function() {
                    //do logic for error
                }
            });
        });
        $('#loc-tab a[href="#box_tab1"]').click(function(e) {
            var tabId = $('#loc-tab a[href="#edit_tab"]').parents('li').children('a').attr('href');
            $('#loc-tab a[href="#edit_tab"]').parents('li').remove('li');
            $(tabId).remove();
            $('#loc-tab a:first').tab('show');
        })
        function getPrice() {
            $.post("{{ route('price') }}", $('#validate-2').serialize())
                    .done(function(data) {
                        $("#price").html(data);
                    });
        }
    }
    );
</script>
