<div class="alert alert-info">
    <strong>Booking form</strong><br/>
Select the available and required fields on the front-end. Select 'Yes' if you want to include the field in the booking form, otherwise select No'.
</div>
{{ Form::open(array('route' => 'admin.settings.store','method' => 'post','class' => 'form-horizontal row-border','id' => 'validate-2')) }}
@foreach($form as $f)
<div class="form-group">
    <label class="col-md-3 control-label">{{ $f->options }}</label>
    <div class="col-md-3">
        {{ Form::select($f->options, array('no' => 'No','yes' => 'Yes' , 'required' => 'Yes(Required)'),$f->values,array('class' => 'form-control')) }}
    </div>
</div>
@endforeach
<div class="form-actions">
    <a href='{{route('admin.car.index')}}' class='btn pull-right'>Cancel</a>
    {{ Form::submit('Save',array('class' => 'btn btn-primary pull-right')) }}
</div>
{{ Form::close() }}