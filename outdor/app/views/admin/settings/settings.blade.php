@extends('admin.layouts.index')
@section('content')
<script>
    $(function() {
        $('#setting-tab a[href="#rental-setting"]').tab('show');
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
            <h3>Settings</h3>
        </div>
    </div>
    <!-- /Page Header -->

    <!--=== Page Content ===-->
    <!--=== Box Tabs ===-->
    <div class="row">
        <div class="col-md-12">
            <div class="tabbable tabbable-custom tabbable-full-width">
                <ul class="nav nav-tabs" id="setting-tab">
                    <li><a href="#rental-setting" data-toggle="tab" >Rental Settings</a></li>
                    <li><a href="#payment-setting" data-toggle="tab" >Payment</a></li>
                    <li><a href="#form-setting" data-toggle="tab">Checkout Form</a></li>

                </ul>
                <div class="tab-content" id="setting-content">
                    <div class="tab-pane active" id="rental-setting">
                        @include('admin.settings.rental-setting',$rental)
                    </div>
                    <div class="tab-pane" id="payment-setting">
                        @include('admin.settings.payment-setting',$payment)
                    </div>
                    <div class="tab-pane" id="form-setting">
                        @include('admin.settings.form-setting',$form)
                    </div>
                </div>
            </div>
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
    <!-- /Box Tabs -->
    <!-- /Page Content -->
</div>
@stop