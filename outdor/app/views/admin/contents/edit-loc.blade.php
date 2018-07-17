<div class="tab-pane" id="edit_tab">
    <div class="alert alert-info">
        <strong>Add New Location</strong><br/>
        Fill in the form below and click on 'Save' button to add new location to your system.
    </div>
    {{ Form::open(array('route' => array('admin.location.update', $loc->id),'method' => 'put','class' => 'form-horizontal row-border','id' => 'validate-2')) }}
    <div class="form-group">
        {{ Form::label('name', 'Name', array('class' => 'col-md-3 control-label')); }}
        <div class="col-md-4">
            {{ Form::text('name',$loc->name,array('class' => 'form-control required')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('email', 'Email', array('class' => 'col-md-3 control-label')); }}
        <div class="col-md-5">
            <div class="input-group">
                <span class="input-group-addon">@</span>
                {{ Form::text('email',$loc->email,array('class' => 'form-control required email')) }}
            </div>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('phone', 'Phone', array('class' => 'col-md-3 control-label')); }}
        <div class="col-md-5">
            <div class="input-group">
                <span class="input-group-addon"><i class='icon-phone'></i></span>
                {{ Form::text('phone',$loc->phone,array('class' => 'form-control required digits')) }}
            </div>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('country', 'Country', array('class' => 'col-md-3 control-label')); }}
        <div class="col-md-5">
            {{ Form::select('country', array('Indonesia' => 'Indonesia'), $loc->country ,array('class' => 'form-control  required')); }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('state', 'State', array('class' => 'col-md-3 control-label')); }}
        <div class="col-md-5">
            {{ Form::text('state',$loc->state,array('class' => 'form-control required')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('city', 'City', array('class' => 'col-md-3 control-label')); }}
        <div class="col-md-5">
            {{ Form::text('city',$loc->city,array('class' => 'form-control required')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('address', 'Address', array('class' => 'col-md-3 control-label')); }}
        <div class="col-md-5">
            {{ Form::text('address',$loc->address,array('class' => 'form-control required')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('zip', 'ZIP', array('class' => 'col-md-3 control-label')); }}
        <div class="col-md-2">
            {{ Form::text('zip',$loc->zip,array('class' => 'form-control required digits')) }}
        </div>
    </div>
    <div class="form-actions">
        {{ Form::submit('Update',array('class' => 'btn btn-primary pull-right')) }}
    </div>
</form>
</div>

<script>
    $(document).ready(function(){

	//===== Validation =====//
	// @see: for default options, see assets/js/plugins.form-components.js (initValidation())

	$.extend( $.validator.defaults, {
		invalidHandler: function(form, validator) {
			var errors = validator.numberOfInvalids();
			if (errors) {
				var message = errors == 1
				? 'You missed 1 field. It has been highlighted.'
				: 'You missed ' + errors + ' fields. They have been highlighted.';
				noty({
					text: message,
					type: 'error',
					timeout: 2000
				});
			}
		}
	});

	$("#validate-1").validate();
	$("#validate-2").validate();
	$("#validate-3").validate();
	$("#validate-4").validate();

});
</script>