@extends('admin.contents.extra')
@section('extra')
<script>
    $(document).ready(function() {
        $('#loc-tab a[href="#extras"]').tab('show');
    });
</script>
<div class="alert alert-info">
    <strong>Add an extra</strong><br/>
    Fill in the form below to add an extra, then click Save. Tip: Enter 0 if you want to add a free extra.
</div>
{{ Form::open(array('route' => 'admin.extra.store','method' => 'post','class' => 'form-horizontal row-border','id' => 'validate-2')) }}
<div class="form-group">
    {{ Form::label('name', 'Name', array('class' => 'col-md-3 control-label')); }}
    <div class="col-md-4">
        {{ Form::text('name','',array('class' => 'form-control required')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('email', 'Email', array('class' => 'col-md-3 control-label')); }}
    <div class="col-md-2">
        <div class="input-group">
            <span class="input-group-addon">Rp.</span>
            {{ Form::text('price','',array('class' => 'form-control required digits')) }}
        </div>
    </div>
    <div class="col-md-2">
        {{ Form::select('type',array('day' => 'Per day','reservation' => 'Per reservation'),'',array('class' => 'form-control required ')) }}
    </div>
</div>
<div class="form-actions">
        <a href='{{route('admin.extra.index')}}' class='btn pull-right'>Cancel</a>
    {{ Form::submit('Save',array('class' => 'btn btn-primary pull-right')) }}
</div>
{{ Form::close() }}
@stop