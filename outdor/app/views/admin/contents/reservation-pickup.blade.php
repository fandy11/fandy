{{ Form::open(array('route' => 'admin.reservation.store','method' => 'post','class' => 'form-horizontal','id' => 'validate-2')) }}
<div class="alert alert-info">
    <strong>Customer details</strong><br/>
    Enter customer details in the form below.
</div>
<div class="widget box">
    <div class="widget-header">
        <h4><i class="icon-reorder"></i> Pick Up</h4>
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
{{ Form::close() }} 

