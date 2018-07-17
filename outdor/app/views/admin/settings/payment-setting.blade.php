<div class="alert alert-info">
    <strong>Payment Options</strong><br/>
    Here you can choose your payment methods and set payment gateway accounts and payment preferences. Note that for cash payments the system will not be able to collect deposit amount online.
</div>
{{ Form::open(array('route' => 'admin.payment.store','method' => 'post','class' => 'form-horizontal row-border','id' => 'validate-2')) }}
@foreach($payment as $f => $values)
@if($values->options == 'deposit_payment[]')
<div class="form-group">
    <label class="col-md-3 control-label">Deposit Payment
        <span class="help-block">If you'd like to charge the full amount, just enter 100.</span>
    </label>
    <div class="col-md-3">
        {{ Form::text($values->options,$values->values,array('class' => 'form-control')) }}
    </div>
    <label class="col-md-3">{{ $values->values_2 }}
    </label>
</div>
@elseif($values->options == 'tax_payment[]')
<div class="form-group">
    <label class="col-md-3 control-label">Tax Payment
        <span class="help-block">If there is no tax for payments, just enter 0. You can also add a fixed tax value or % of the total price.</span>
    </label>
    <div class="col-md-3">
        {{ Form::text($values->options,$values->values,array('class' => 'form-control')) }}
    </div>
    <div class="col-md-2">
        {{ Form::select($values->options, array('%' => 'Percent','$' => 'Amount'),$values->values_2_2,array('class' => 'form-control')) }}
    </div>
</div>
@elseif($values->options == 'insurance_payment[]')
<div class="form-group">
    <label class="col-md-3 control-label">Insurance Payment
        <span class="help-block">Add an insurance fee for each booking or just leave it 0. You can choose if the fee is per day, per reservation or percentage of the rental amount.</span>
    </label>
    <div class="col-md-3">
        {{ Form::text($values->options,$values->values,array('class' => 'form-control')) }}
    </div>
    <div class="col-md-2">
        {{ Form::select($values->options, array('%' => 'Percent','d' => 'Per Day','r' => 'Per Reservation'),$values->values_2,array('class' => 'form-control')) }}
    </div>
</div>
@elseif($values->options == 'bank_account[]')
<div class="form-group">
    <label class="col-md-3 control-label">Bank Account</label>
    <div class="col-md-5">
        {{ Form::textarea($values->options,$values->values,array('class' => 'form-control')) }}
    </div>
</div>
@elseif($values->options == 'cash_payment[]')
<div class="form-group">
    <label class="col-md-3 control-label">Allow Cash Payment</label>
    <div class="col-md-3">
        {{ Form::select($values->options,array('yes' => 'Yes','no' => 'No'),$values->values,array('class' => 'form-control')) }}
    </div>
</div>
@endif

@endforeach
<div class="form-actions">
    <a href='{{route('admin.car.index')}}' class='btn pull-right'>Cancel</a>
    {{ Form::submit('Save',array('class' => 'btn btn-primary pull-right')) }}
</div>
{{ Form::close() }}