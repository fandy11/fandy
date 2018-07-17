@extends('admin.contents.extra')
@section('extra')
<script>
    $(document).ready(function() {
        $('#loc-tab a[href="#extras"]').tab('show');
    });
</script>
<div class="alert alert-info">
    <strong>Update extra</strong><br/>
    Change extra name, set its price and click on Save button.
</div>
{{ Form::open(array('route' => array('admin.extra.update',$extra->id),'method' => 'put','class' => 'form-horizontal row-border','id' => 'validate-2')) }}
<div class="form-group">
    {{ Form::label('name', 'Name', array('class' => 'col-md-3 control-label')); }}
    <div class="col-md-4">
        {{ Form::text('name',$extra->name,array('class' => 'form-control required')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('email', 'Email', array('class' => 'col-md-3 control-label')); }}
    <div class="col-md-2">
        <div class="input-group">
            <span class="input-group-addon">Rp.</span>
            {{ Form::text('price',$extra->price,array('class' => 'form-control required ')) }}
        </div>
    </div>
    <div class="col-md-2">
        {{ Form::select('type',array('day' => 'Per day','reservation' => 'Per reservation'),$extra->type,array('class' => 'form-control required ')) }}
    </div>
</div>
<div class="form-actions">
        <a href='{{route('admin.extra.index')}}' class='btn pull-right'>Cancel</a>
    {{ Form::submit('Update',array('class' => 'btn btn-primary pull-right')) }}
</div>
{{ Form::close() }}
@stop