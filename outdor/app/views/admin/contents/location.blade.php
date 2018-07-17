@extends('admin.layouts.index')
@section('content')
<div class="container">
    <!-- Breadcrumbs line -->
    <div class="crumbs">
        <ul id="breadcrumbs" class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="index.html">Dashboard</a>
            </li>
            <li class="current">
                <a href="pages_calendar.html" title="">Office Locations</a>
            </li>
        </ul>
    </div>
    <!-- /Breadcrumbs line -->

    <!--=== Page Header ===-->
    <div class="page-header">
        <div class="page-title">
            <h3>Office Locations</h3>
        </div>
    </div>
    <!-- /Page Header -->

    <!--=== Page Content ===-->
    <!--=== Box Tabs ===-->
    <div class="row">
        <div class="col-md-12">
            <div class="tabbable tabbable-custom tabbable-full-width">
                <ul class="nav nav-tabs" id="loc-tab">
                    <li><a href="#box_tab2" data-toggle="tab" >Locations</a></li>
                    <li><a href="#box_tab1" data-toggle="tab">Add New Location</a></li>

                </ul>
                <div class="tab-content" id="loc-content">
                    <div class="tab-pane active" id="box_tab2">
                        <div class="alert alert-info">
                            <strong>Office locations</strong><br/>
                            Below you can see a list with car rental office locations. Your clients will see office locations as Pick-up and Return Location options. To add new location, click on the 'Add New Location' tab above.
                        </div>
                        <button type="submit" class="btn btn-primary" id="save">Save Change</button>
                        <br/>
                        <br/>
                        <?php
                        $table = Datatable::table()
                                ->addColumn('Delete', 'Name', 'Address','Number of Cars', 'Status', 'Action')       // these are the column headings to be shown
                                ->setUrl(route('api.location'))   // this is the route where data will be retrieved
                                ->noScript();
                        ?> 
                        {{ $table->render('admin.template.template') }} {{ $table->script('admin.template.javascript'); }}
                    </div>
                    <div class="tab-pane" id="box_tab1">
                        <div class="alert alert-info">
                            <strong>Add New Location</strong><br/>
                            Fill in the form below and click on 'Save' button to add new location to your system.
                        </div>
                        {{ Form::open(array('route' => 'admin.location.store','class' => 'form-horizontal row-border','id' => 'validate-1')) }}
                        <div class="form-group">
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
                        <div class="form-actions">
                            {{ Form::submit('Save',array('class' => 'btn btn-primary pull-right')) }}
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
    <!-- /Box Tabs -->
    <!-- /Page Content -->
</div>
@stop