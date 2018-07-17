<div class="tab-pane" id="edit_res">
    <div class="tabbable tabbable-custom tabbable-full-width">
        <ul class="nav nav-tabs" id="reservation-edit">
            <li><a href="#detail" data-toggle="tab" >Detail</a></li>
            <li><a href="#pickup" data-toggle="tab">Pick Up</a></li>
            <li><a href="#return" data-toggle="tab">Return</a></li>
            <li><a href="#payment" data-toggle="tab">Payment</a></li>
        </ul>
        <div class="tab-content" id="reservation-detail">
            <div class="tab-pane active" id="detail">
                <div class="alert alert-info">
                    <strong>Rental details</strong><br/>
                    In the Rental Details box below you can add details about the reservation - start and end date/time, car type, pick-up and return locations. As soon as you select car type the price for the selected rental period will be automatically calculated in the Price box. Use the Extras box at the bottom to add additional extras to the reservation. Their price will also be included in the total rental price.</div>
                {{ Form::open(array('route' => array('admin.reservation.update',$reservation->id),'method' => 'put','class' => 'form-horizontal','id' => 'validate-edit')) }}
                <div class="row">
                    <div class="col-md-6">
                        <!--=== Headings ===-->
                        <div class="widget box">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> Rental Details</h4>
                            </div>
                            <div class="widget-content" id="rental">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Reservation ID </label>
                                    <div class="col-md-9">
                                        <label class="form-control-static">{{ $reservation->id }}</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Date Created </label>
                                    <div class="col-md-9">
                                        <label class="form-control-static">{{ $reservation->created_at }}</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Status <span class="required">*</span></label>
                                    <div class="col-md-9">
                                        {{ Form::select('status',array('' => '-- Choose --','cancelled' => 'Cancelled','collected' => 'Collected','complete' => 'Complete','confirmed' => 'Confirmed','pending' => 'Pending'),$reservation->status,array('class' => 'form-control required')) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">From <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        {{ Form::text('start-date',date('Y-m-d',strtotime($reservation->start)),array('class' => 'form-control required datepicker','id' => 'from-edit')) }}
                                    </div>
                                    <div class="col-md-3">
                                        {{ Form::text('start-time',date('g:i A',strtotime($reservation->start)),array('class' => 'form-control required timepicker','id' => 'timefrom-edit')) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">To <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        {{ Form::text('end-date',date('Y-m-d',strtotime($reservation->end)),array('class' => 'form-control required datepicker','id' => 'to-edit')) }}
                                    </div>
                                    <div class="col-md-3">
                                        {{ Form::text('end-time',date('g:i A',strtotime($reservation->end)),array('class' => 'form-control required timepicker','id' => 'timeto-edit')) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Type<span class="required">*</span></label>
                                    <div class="col-md-5">
                                        {{ Form::select('type', $selecttype,$reservation->type_id,array('class' => 'form-control required','id' => 'selecttype-edit','min' => '1')) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Select Cars<span class="required">*</span></label>
                                    <div class="col-md-5">
                                        {{ Form::select('car', array(0 => '-= Choose Car =-'),'',array('class' => 'form-control required','id' => 'selectcar-edit','min' => '1')) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Pick Up Location<span class="required">*</span></label>
                                    <div class="col-md-5">
                                        {{ Form::select('loc_pick', $selectbox,$reservation->loc_pick,array('class' => 'form-control required','min' => '1')) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Return Location<span class="required">*</span></label>
                                    <div class="col-md-5">
                                        {{ Form::select('loc_return', $selectbox,$reservation->loc_return,array('class' => 'form-control required','min' => '1')) }}
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
                            <div class="widget-content" id="extras-edit">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="widget box">
                            <div class="widget-header">
                                <h4><i class="icon-reorder"></i> Price</h4>
                            </div>
                            <div class="widget-content" id="price-edit">
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
                                        {{ Form::select('title',array('' => '-- Choose --','Dr'=>'Dr','Mr'=>'Mr','Mrs'=>'Mrs','Ms'=>'Ms','Other'=>'Other','Prof' =>'Prof','Rev' => 'Rev'),$reservation->customer->title,array('class' => 'form-control required')) }}
                                    </div>
                                </div>
                                <div  class="form-group">
                                    {{ Form::label('name', 'Name', array('class' => 'col-md-3 control-label')); }}
                                    <div class="col-md-4">
                                        {{ Form::text('name',$reservation->customer->name,array('class' => 'form-control required')) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('email', 'Email', array('class' => 'col-md-3 control-label')); }}
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <span class="input-group-addon">@</span>
                                            {{ Form::text('email',$reservation->customer->email,array('class' => 'form-control required email')) }}
                                        </div>
                                    </div>
                                    <p for="email" generated="true" class="has-error help-block" style="display:none;"></p>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('phone', 'Phone', array('class' => 'col-md-3 control-label')); }}
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class='icon-phone'></i></span>
                                            {{ Form::text('phone',$reservation->customer->telephone,array('class' => 'form-control required digits')) }}
                                        </div>
                                        <p for="phone" generated="true" class="has-error help-block" style="display:none;"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('country', 'Country', array('class' => 'col-md-3 control-label')); }}
                                    <div class="col-md-5">
                                        {{ Form::select('country', array('Indonesia' => 'Indonesia'), $reservation->customer->country,array('class' => 'form-control required')); }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('state', 'State', array('class' => 'col-md-3 control-label')); }}
                                    <div class="col-md-5">
                                        {{ Form::text('state',$reservation->customer->state,array('class' => 'form-control required')) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('city', 'City', array('class' => 'col-md-3 control-label')); }}
                                    <div class="col-md-5">
                                        {{ Form::text('city',$reservation->customer->city,array('class' => 'form-control required')) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('address', 'Address', array('class' => 'col-md-3 control-label')); }}
                                    <div class="col-md-5">
                                        {{ Form::text('address',$reservation->customer->address,array('class' => 'form-control required')) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('zip', 'ZIP', array('class' => 'col-md-3 control-label')); }}
                                    <div class="col-md-2">
                                        {{ Form::text('zip',$reservation->customer->zip,array('class' => 'form-control required digits')) }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <a class="btn btn-danger pull-right" href="{{ route('admin.reservation.index') }}">Cancel</a>
                                {{ Form::submit('Save',array('class' => 'btn btn-primary pull-right')) }}
                            </div>
                        </div>
                    </div>
                </div>
                {{ Form::close() }} 
            </div>
            <div class="tab-pane" id="pickup">
                @include('admin.contents.reservation-pickup',$reservation)
            </div>
            <div class="tab-pane" id="return">
            </div>
            <div class="tab-pane" id="payment">
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#reservation-edit a[href="#detail"]').tab('show');
        getCar();
        $('.timepicker').pickatime();
        $("#from-edit, #to-edit, #timefrom-edit, #timeto-edit").on('change keyup paste', function(e) {
            getPriceEdit();
        });
        $("#detail").on('change', '#selectcar-edit', function(e) {
            getPriceEdit();
        });
        $('#extras-edit').on('change', '#ex-option', function(e) {
            if ($('#selectcar-edit').val() !== '0') {
                getPriceEdit();
            }
        });
        var addex = parseInt("{{ rand(1,9) }}");
        $('#extras-edit').on('click', '#addex-edit', function(e) {
            addex += 1;
            $.get("{{ route('car')}}", {id: $('#selecttype-edit').val(), 'add': true, 'addid': addex})
                    .done(function(data) {
                        $(data).insertBefore("#buttonex-edit");
                    }, 'json');
            e.preventDefault();
        });
        $("#from-edit").datepicker({
            changeMonth: true,
            numberOfMonths: 1,
            showOtherMonths: true,
            autoSize: true,
            appendText: '<span class="help-block">(yyyy-mm-dd)</span>',
            dateFormat: 'yy-mm-dd',
            onClose: function(selectedDate) {
                $("#to-edit").datepicker("option", "minDate", selectedDate);
            }
        });
        $("#to-edit").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            showOtherMonths: true,
            autoSize: true,
            appendText: '<span class="help-block">(yyyy-mm-dd)</span>',
            dateFormat: 'yy-mm-dd',
            onClose: function(selectedDate) {
                $("#from-edit").datepicker("option", "maxDate", selectedDate);
            }
        });
        $('#extras-edit').on('click', '.delex', function(e) {
            data = $(this).attr('id').split('-');
            id = data[1];
            $("#add-" + id).remove(); //decrement textbox
            getPriceEdit();
        });
    });
    function getCar() {
        $.get("{{ route('car')}}", {id: $("#selecttype-edit").val(), id_res: "{{ $reservation->id }}"}, function(response) {
            $('#selectcar-edit').find('option').remove();
            $('#button-ex-edit').find('input[type=button]').remove();
            if (response['car'] === undefined) {
                $('#selectcar-edit').append($('<option>', {
                    value: 0,
                    text: '-= Choose Car =-',
                }));
            }
            else if (response['car'].length > 0) {
                $('#selectcar-edit').append($('<option>', {
                    value: 0,
                    text: '-= Choose Car =-',
                }));
                $.each(response['car'], function(i, item) {
                    $('#selectcar-edit').append($('<option>', {
                        value: response['car'][i].id,
                        text: response['car'][i].make + ' ' + response['car'][i].model,
                    }));
                });
            }

            if (response['extra'] !== undefined) {
                if (response['extra'].length > 0) {
                    $("#extras-edit").html(response['extra']);
                }
            }
        }, 'json').done(function(e) {
            $('#selectcar-edit').val("{{ $reservation->car_id }}");
            getPriceEdit();
        });
    }
    ;
    function getPriceEdit() {
        $.post("{{ route('price') }}", $('#validate-edit').serialize())
                .done(function(data) {
                    $("#price-edit").html(data);
                });
    }
    ;
</script>
