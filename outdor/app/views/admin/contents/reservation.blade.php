@extends('admin.layouts.index')
@section('content')
<script>
    $(document).ready(function() {
        $('#res-tab a[href="#reservation"]').tab('show');
        $('#res-tab a[href="#reservation"] , a[href="#new-res"] ').click(function(e) {
            var tabId = $('#res-tab a[href="#edit_res"]').parents('li').children('a').attr('href');
            $('#res-tab  a[href="#edit_res"]').parents('li').remove('li');
            $(tabId).remove();
            $('#res-tab  a:first').tab('show');
        })
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
            <h3>Reservations</h3>
        </div>
    </div>
    <!-- /Page Header -->

    <!--=== Page Content ===-->
    <!--=== Box Tabs ===-->
    <div class="row">
        <div class="col-md-12">
            <div class="tabbable tabbable-custom tabbable-full-width">
                <ul class="nav nav-tabs" id="res-tab">
                    <li><a href="#reservation" data-toggle="tab" >Reservation</a></li>
                    <li><a href="#new-res" data-toggle="tab">Add New</a></li>

                </ul>
                <div class="tab-content" id="res-content">
                    <div class="tab-pane active" id="reservation">
                        <?php
                        $type = Datatable::table()
                                ->addColumn('Delete', 'Pick Up/Return', 'Type', 'Car', 'Client', 'Total Cost', 'Status', 'Action')       // these are the column headings to be shown
                                ->setUrl(route('api.reservation'))   // this is the route where data will be retrieved
                                ->noScript();
                        ?> 
                        {{ $type->render('admin.template.template') }} {{ $type->script('admin.template.javascript'); }}

                    </div>
                    <div class="tab-pane" id="new-res">
                        @section('new')
                        @include('admin.contents.reservation-new',array($selectbox,$selecttype))
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