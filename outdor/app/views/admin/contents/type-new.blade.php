@extends('admin.contents.extra')
@section('type')
<div class="alert alert-info">
    <strong>Add new car type</strong><br/>
    Fill in the form below to add a new car type. Please, note that your clients view and book car types not a specific vehicle/car, so it's very important to fill in the specification details carefully. Using the 'Available extras' drop down field you can choose which extras are available with the car type and can be selected by clients when making a reservation. If you have multiple language versions of your car rental system do not forget to fill in the car type title and description in all languages that you use.
</div>
{{ Form::open(array('route' => 'admin.type.store','method' => 'post','class' => 'form-horizontal row-border','id' => 'validate-2','enctype' => 'multipart/form-data')) }}
<div class="form-group">
    <label class="col-md-3 control-label">Type <span class="required">*</span></label>
    <div class="col-md-4">
        {{ Form::text('type','',array('class' => 'form-control required')) }}
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">Description</label>
    <div class="col-md-5">
        {{ Form::textarea('description','',array('class' => 'auto form-control','rows' => '5')) }}
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">Price per day <span class="required">*</span></label>
    <div class="col-md-3">
        <div class="input-group">
            <span class="input-group-addon">Rp.</span>
            {{ Form::text('price_day','',array('class' => 'form-control spinner required','min' => 0)) }}
        </div>
        <span class="help-block">This is the default daily price for renting this car type.</span>
        <label for="spinner-validation" generated="true" class="has-error help-block" style="display:none;"></label>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">Price per hour <span class="required">*</span></label>
    <div class="col-md-3">
        <div class="input-group">
            <span class="input-group-addon">Rp.</span>
            {{ Form::text('price_hour','',array('class' => 'form-control spinner required','min' => 0)) }}
        </div>
        <span class="help-block">This is the default hourly price for renting this car type.</span>
        <label for="spinner-validation" generated="true" class="has-error help-block" style="display:none;"></label>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">File <span class="required">*</span></label>
    <div class="col-md-5">
        {{ Form::file('image',array('class' => '','accept' => 'image/*','data-style' => 'fileinput','data-inputsize' => 'medium')) }}
        <p class="help-block">Images only (image/*)</p>
        <label for="file1" class="has-error help-block" generated="true" style="display:none;"></label>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">Passengers <span class="required">*</span></label>
    <div class="col-md-2">
        {{ Form::text('passengers','',array('class' => 'form-control spinner required','min' => 0)) }}
        <label for="spinner-validation" generated="true" class="has-error help-block" style="display:none;"></label>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">Bags <span class="required">*</span></label>
    <div class="col-md-2">
        {{ Form::text('bags','',array('class' => 'form-control spinner required','min' => 0)) }}
        <label for="spinner-validation" generated="true" class="has-error help-block" style="display:none;"></label>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">Doors <span class="required">*</span></label>
    <div class="col-md-2">
        {{ Form::text('doors','',array('class' => 'form-control spinner required','min' => 0)) }}
        <label for="spinner-validation" generated="true" class="has-error help-block" style="display:none;"></label>
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">Available Extras</label>
    <div class="col-md-5">
        {{ Form::select('transmission', array('auto' => 'Automatic' ,'manual' => 'Manual'),'',array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">Available Extras</label>
    <div class="col-md-5">
        {{ Form::select('extra[]', $extra,'',array('class' => 'multiselect','multiple' => 'multiple')) }}
    </div>
</div>
<div class="form-actions">
    <a href='{{route('admin.extra.index')}}' class='btn pull-right'>Cancel</a>
    {{ Form::submit('Save',array('class' => 'btn btn-primary pull-right')) }}
</div>
{{ Form::close() }}
@stop