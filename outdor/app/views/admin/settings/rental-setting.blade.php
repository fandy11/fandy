<div class="alert alert-info">
    <strong>Rental Settings</strong><br/>
    On this page you can set car rental settings related to how price is being calculated for each reservation. You can choose between 3 types of rental prices: daily, hourly or both daily and hourly. Here is an example if clients rents a car for 1 day and 6 hours. If 'Calculate rental fee' option is set to 'Per day only', then depending on 'Free of charge tolerance' setting the system will calculate the price based on 1 day or 2 days daily prices. If 'Per hour only' is chosen then the system will calculate the price based on 30 hours car usage. If 'Per day and per hour' is chosen then the price will be calculated for 1 day and 6 hours. You can set rates for each car type under Edit Car type page. Please, pay attention when you fill in daily and hourly rates for car types, especially if you have set the system to 'Per day and per hour'. In any of the 3 cases, the system will let clients select their pick-up and return time. So if the system is set to 'Per day only' rental fee then you can manage how the system will calculate the 'extra hours' for each reservation through 'Free of charge tolerance' option.
</div>
{{ Form::open(array('route' => 'admin.rental.store','method' => 'post','class' => 'form-horizontal row-border','id' => 'validate-2')) }}
@foreach($rental as $r => $values)
@if($values->options == 'calculate_rental_fee')
<div class="form-group">
    <label class="col-md-3 control-label">Calculate rental fee
        <span class="help-block">
            Set how the system should calculate the price for each reservation.
        </span>
    </label>
    <div class="col-md-3">
        {{ Form::select($values->options, array('d' => 'Per Day Only','h' => 'Per Hour Only','dh' => 'Per Day And Per Hour'),$values->values,array('class' => 'form-control')) }}
    </div>
</div>
@elseif($values->options == 'min_booking_length')
<div class="form-group">
    <label class="col-md-3 control-label">Minimal Booking Length <span class="required">*</span>
        <span class="help-block">
            Users will not be able to rent a car for less time than set here.
        </span>
    </label>
    <div class="col-md-2">
        <div>
            {{ Form::text($values->options,$values->values,array('class' => 'form-control spinner required')) }}
        </div>
        <label for="spinner-validation" generated="true" class="has-error help-block" style="display:none;"></label>
    </div>
    <label class="col-md-3"> Hour(s)
    </label>
</div>
@elseif($values->options == 'on_hold_pending')
<div class="form-group">
    <label class="col-md-3 control-label">Car 'On hold' while pending <span class="required">*</span>
        <span class="help-block">
            A specific car is assigned to each new reservation. If reservation is not confirmed within X hours then this car will be available for booking again for the same date and time.
        </span>
    </label>
    <div class="col-md-2">
        <div>
            {{ Form::text($values->options,$values->values,array('class' => 'form-control spinner required')) }}
        </div>
        <label for="spinner-validation" generated="true" class="has-error help-block" style="display:none;"></label>
    </div>
    <label class="col-md-3"> Hour(s)
    </label>
</div>
@elseif($values->options == 'rental_terms')
<div class="form-group">
    <label class="col-md-3 control-label">Rental Terms
    </label>
    <div class="col-md-9">
        {{ Form::textarea($values->options,$values->values,array('class' => 'form-control')) }}
    </div>
</div>
@endif
@endforeach
<div class="form-actions">
    <a href='{{route('admin.car.index')}}' class='btn pull-right'>Cancel</a>
    {{ Form::submit('Save',array('class' => 'btn btn-primary pull-right')) }}
</div>
{{ Form::close() }}