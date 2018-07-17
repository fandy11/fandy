<div class="tab-pane" id="edit_user">
    <div class="alert alert-info">
        <strong>Add user</strong><br/>
        Fill out the fields and click on 'Save' button to add new user to the system. 'Editors' have a limited access to the system back-end. They can only view Reservations menu.
    </div>
    {{ Form::open(array('route' => array('admin.user.update',$user->id),'method' => 'put','class' => 'form-horizontal row-border','id' => 'user-form')) }}
    <div class="form-group">
        <label class="col-md-3 control-label">Roles</label>
        <div class="col-md-3">
            {{ Form::select('group', $groups,$user->getGroups()[0]->id,array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Email <span class="required">*</span></label>
        <div class="col-md-3">
            <div class="input-group">
                <span class="input-group-addon">@</span>
                {{ Form::text('email',$user->email,array('class' => 'form-control required email')) }}
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Password <span class="required">*</span></label>
        <div class="col-md-3">
            <div class="input-group">
                <span class="input-group-addon"><i class=' icon-lock'></i></span>
                {{ Form::password('password',array('class' => 'form-control required')) }}
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">First Name <span class="required">*</span></label>
        <div class="col-md-4">
            {{ Form::text('first_name',$user->first_name,array('class' => 'form-control required')) }}
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Last Name <span class="required">*</span></label>
        <div class="col-md-4">
            {{ Form::text('last_name',$user->last_name,array('class' => 'form-control required')) }}
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Phone <span class="required">*</span></label>
        <div class="col-md-3">
            <div class="input-group">
                <span class="input-group-addon"><i class=' icon-phone'></i></span>
                {{ Form::text('phone',$user->phone,array('class' => 'form-control required')) }}
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Status</label>
        <div class="col-md-3">
            {{ Form::select('group', $status,$user->activated,array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-actions">
        {{ Form::submit('Save',array('class' => 'btn btn-primary pull-right')) }}
    </div>
    {{ Form::close() }}
</div>