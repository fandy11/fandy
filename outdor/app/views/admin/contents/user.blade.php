@extends('admin.layouts.index')
@section('content')
<script>
    $(function() {
        $('#user-tab a[href="#users"]').tab('show');
    });
</script>
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
            <h3>Users</h3>
        </div>
    </div>
    <!-- /Page Header -->

    <!--=== Page Content ===-->
    <!--=== Box Tabs ===-->
    <div class="row">
        <div class="col-md-12">
            <div class="tabbable tabbable-custom tabbable-full-width">
                <ul class="nav nav-tabs" id="user-tab">
                    <li><a href="#users" data-toggle="tab" >Users</a></li>
                    <li><a href="#new-user" data-toggle="tab">Add New User</a></li>

                </ul>
                <div class="tab-content" id="user-content">
                    <div class="tab-pane active" id="users">
                        <div class="alert alert-info">
                            <strong>Users</strong><br/>
                            Add and manage system users. You can have unlimited number of users. You can set users as 'Inactive' if you wish to restrict their access to the system without deleting the user.</div>
                        <button type="submit" class="btn btn-primary" id="save">Save Change</button>
                        <br/>
                        <br/>
                        <?php
                        $table = Datatable::table()
                                ->addColumn('Delete', 'Full Name', 'Email', 'Registration Date', 'Roles', 'Status', 'Action')       // these are the column headings to be shown
                                ->setUrl(route('api.user'))   // this is the route where data will be retrieved
                                ->noScript();
                        ?> 
                        {{ $table->render('admin.template.template') }} {{ $table->script('admin.template.javascript'); }}
                    </div>
                    <div class="tab-pane" id="new-user">
                        @include('admin.contents.user-new',array($groups,$status))
                    </div>
                </div>
            </div>
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
    <!-- /Box Tabs -->
    <!-- /Page Content -->
</div>
@stop