<div class="alert alert-info">
    <strong>Add new car</strong><br/>
    Fill in the form below to add a new car. Please note that your clients are able to book a car type not a specific car/vehicle, so each car you add must be assigned to at least one car type. To add your cars/vehicles you need to have car types and locations added first.
</div>
{{ Form::open(array('route' => 'admin.car.store','method' => 'post','class' => 'form-horizontal row-border','id' => 'validate-2')) }}
<div class="form-group">
    {{ Form::label('make', 'Make', array('class' => 'col-md-3 control-label')); }}
    <div class="col-md-4">
        {{ Form::text('make','',array('class' => 'form-control required')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('model', 'Model', array('class' => 'col-md-3 control-label')); }}
    <div class="col-md-4">
        {{ Form::text('model','',array('class' => 'form-control required')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('reg_num', 'Registration Number', array('class' => 'col-md-3 control-label')); }}
    <div class="col-md-4">
        {{ Form::text('registration_num','',array('class' => 'form-control required')) }}
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">Mileage</label>
    <div class="col-md-3">
        {{ Form::text('mileage','',array('class' => 'form-control spinner required','min' => 0)) }}
        <span class="help-block">You can manage vehicle mileage data. Set the current mileage here and use the options on pick-up and return to keep this data up to date.</span>
        <label for="spinner-validation" generated="true" class="has-error help-block" style="display:none;"></label>
    </div>
    <label class="col-md-3">KM</label>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">Default Location</label>
    <div class="col-md-5">
        {{ Form::select('location_id', $selectbox,'',array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">Types </label>
    <div class="col-md-3">
        @foreach($types as $type)
        <label class="checkbox">
            {{Form::checkbox('type[]', $type['id'])}}
            {{ $type['type'] }}
        </label> 
        @endforeach
    </div>
</div>
<div class="form-actions">
    <a href='{{route('admin.car.index')}}' class='btn pull-right'>Cancel</a>
    {{ Form::submit('Save',array('class' => 'btn btn-primary pull-right')) }}
</div>
{{ Form::close() }}