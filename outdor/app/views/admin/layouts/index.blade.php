<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <title>Admin Page</title>

        <!--=== CSS ===-->

        <!-- Bootstrap -->
        <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- jQuery UI -->
        <!--<link href="{{ asset('plugins/jquery-ui/jquery-ui-1.10.2.custom.css') }}" rel="stylesheet" type="text/css" />-->
        <!--[if lt IE 9]>
                <link rel="stylesheet" type="text/css" href="{{ asset('plugins/jquery-ui/jquery.ui.1.10.2.ie.css') }}"/>
        <![endif]-->

        <!-- Theme -->
        <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="{{ asset('assets/css/fontawesome/font-awesome.min.css') }}">
        <!--[if IE 7]>
                <link rel="stylesheet" href="{{ asset('assets/css/fontawesome/font-awesome-ie7.min.css') }}">
        <![endif]-->

        <!--[if IE 8]>
                <link href="{{ asset('assets/css/ie8.css') }}" rel="stylesheet" type="text/css" />
        <![endif]-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

        <!--=== JavaScript ===-->

        <script type="text/javascript" src="{{ asset('assets/js/libs/jquery-1.10.2.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/libs/lodash.compat.min.js') }}"></script>

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
                <script src="{{ asset('assets/js/libs/html5shiv.js') }}"></script>
        <![endif]-->

        <!-- Smartphone Touch Events -->
        <script type="text/javascript" src="{{ asset('plugins/touchpunch/jquery.ui.touch-punch.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/event.swipe/jquery.event.move.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/event.swipe/jquery.event.swipe.js') }}"></script>

        <!-- General -->
        <script type="text/javascript" src="{{ asset('assets/js/libs/breakpoints.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/respond/respond.min.js') }}"></script> <!-- Polyfill for min/max-width CSS3 Media Queries (only for IE8) -->
        <script type="text/javascript" src="{{ asset('plugins/cookie/jquery.cookie.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/slimscroll/jquery.slimscroll.horizontal.min.js') }}"></script>

        <!-- Page specific plugins -->
        <!-- Charts -->
        <script type="text/javascript" src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('plugins/daterangepicker/moment.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/blockui/jquery.blockUI.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/fullcalendar/fullcalendar.min.js') }}"></script>

        <!-- Pickers -->
        <script type="text/javascript" src="{{ asset('plugins/pickadate/picker.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/pickadate/picker.date.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/pickadate/picker.time.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>

        <!-- Form Validation -->
        <script type="text/javascript" src="{{ asset('plugins/validation/jquery.validate.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/validation/additional-methods.min.js') }}"></script>

        <!-- Noty -->
        <script type="text/javascript" src="{{ asset('plugins/noty/jquery.noty.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/noty/layouts/top.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/noty/themes/default.js') }}"></script>

        <!-- Slim Progress Bars -->
        <script type="text/javascript" src="{{ asset('plugins/nprogress/nprogress.js') }}"></script>

        <!-- DataTables -->
        <script type="text/javascript" src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/datatables/DT_bootstrap.js') }}"></script>

        <!-- Forms -->
        <script type="text/javascript" src="{{ asset('plugins/typeahead/typeahead.min.js') }}"></script> <!-- AutoComplete -->
        <script type="text/javascript" src="{{ asset('plugins/autosize/jquery.autosize.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/inputlimiter/jquery.inputlimiter.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/uniform/jquery.uniform.min.js') }}"></script> <!-- Styled radio and checkboxes -->
        <script type="text/javascript" src="{{ asset('plugins/tagsinput/jquery.tagsinput.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/select2/select2.min.js') }}"></script> <!-- Styled select boxes -->
        <script type="text/javascript" src="{{ asset('plugins/fileinput/fileinput.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/duallistbox/jquery.duallistbox.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/bootstrap-inputmask/jquery.inputmask.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/bootstrap-wysihtml5/wysihtml5.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('plugins/bootstrap-multiselect/bootstrap-multiselect.min.js') }}"></script>

        <!-- App -->
        <script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/plugins.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/plugins.form-components.js') }}"></script>

        <script>
$(document).ready(function() {
    "use strict";
    App.init(); // Init layout and core plugins
    Plugins.init(); // Init all plugins
    FormComponents.init(); // Init all form-specific plugins
});
$(document).ajaxComplete(function() {
    NProgress.done();
});
$(document).ajaxStart(function() {
    NProgress.start();
});
        </script>

        <!-- Demo JS -->
        <script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/demo/form_validation.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/demo/form_components.js') }}"></script>

    </head>

    <body>

        <!-- Header -->
        <header class="header navbar navbar-fixed-top" role="banner">
            @include('admin.layouts.header')
        </header> <!-- /.header -->

        <div id="container">
            <div id="sidebar" class="sidebar-fixed">
                @include('admin.layouts.sidebar')
            </div>
            <!-- /Sidebar -->

            <div id="content">
                @yield('content')
            </div>
        </div>
    </body>

</html>