@extends('admin.layouts.index')
@section('content')
<script>
    $(document).ready(function() {
        $('#loc-tab a[href="#types"]').tab('show');
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
            <h3>Types & Extras</h3>
        </div>
    </div>
    <!-- /Page Header -->

    <!--=== Page Content ===-->
    <!--=== Box Tabs ===-->
    <div class="row">
        <div class="col-md-12">
            <div class="tabbable tabbable-custom tabbable-full-width">
                <ul class="nav nav-tabs" id="loc-tab">
                    <li><a href="#types" data-toggle="tab" >Types</a></li>
                    <li><a href="#extras" data-toggle="tab">Extras</a></li>

                </ul>
                <div class="tab-content" id="loc-content">
                    <div class="tab-pane active" id="types">
                        @section('type')
                        <div class="alert alert-info">
                            <strong>Car Types</strong><br/>
                            Your clients view and reserve car types, not specific vehicles, and the system assigns automatically a vehicle/car from the chosen car type to each reservation made. You can manage vehicles/cars under Car Inventory menu and assign them to different car types. To add a new type, click on the 'Add +' button below. You need at least 1 car assigned to each car type so clients can book it.
                        </div>
                        <a href='{{route('admin.type.create')}}' type="submit" class="btn btn-success" id="new">Add New</a>
                        <button type="submit" class="btn btn-primary" id="save-type">Save Change</button>
                        <br/>
                        <br/>
                        <?php
                        $type = Datatable::table()
                                ->addColumn('Delete', 'Image', 'Type', 'Car Models','Number of Cars', 'Status', 'Action')       // these are the column headings to be shown
                                ->setUrl(route('api.type'))   // this is the route where data will be retrieved
                                ->noScript();
                        ?> 
                        {{ $type->render('admin.template.template-type') }} {{ $type->script('admin.template.javascript-type'); }}
                        @show
                    </div>
                    <div class="tab-pane" id="extras">
                        @section('extra')
                        <div class="alert alert-info">
                            <strong>Extras</strong><br/>
                            Change extra name, set its price and click on Save button.
                        </div>
                        <a href='{{route('admin.extra.create')}}' type="submit" class="btn btn-success" id="new">Add New</a>
                        <button type="submit" class="btn btn-primary" id="save-extra">Save Change</button>
                        <br/>
                        <br/>
                        <?php
                        $table = Datatable::table()
                                ->addColumn('Delete', 'Name', 'Price', 'Status', 'Action')       // these are the column headings to be shown
                                ->setUrl(route('api.extra'))   // this is the route where data will be retrieved
                                ->noScript();
                        ?> 
                        {{ $table->render('admin.template.template-extra') }} {{ $table->script('admin.template.javascript'); }}
                        @show
                    </div>
                </div>
            </div>
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
    <!-- /Box Tabs -->
    <!-- /Page Content -->
</div>
@endsection