<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>Admin - Dashboard</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('admin/css/vendors_css.css') }}">
    <link rel="stylesheet" href="{{ asset('font-awesome/css/all.css') }}">
    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/skin_color.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

<div class="wrapper">

    @include('admin.dashboard.body.header')

    <!-- Left side column. contains the logo and sidebar -->
    @include('admin.dashboard.body.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">




@yield('content')











    </div>
    <!-- /.content-wrapper -->
    @include('admin.dashboard.body.footer')
    <!-- /.control-sidebar -->

    <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->


<!-- Vendor JS -->
<script src="{{ asset('admin/js/vendors.min.js') }}"></script>
<script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
<script src="{{ asset('assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
<script src="{{ asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
<script src="{{ asset('assets/vendor_components/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js') }}"></script>
<script src="{{ asset('admin/js/pages/editor.js') }}"></script>
<!-- Sunny Admin App -->
<script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('admin/js/pages/data-table.js') }}"></script>
<script src="{{ asset('admin/js/template.js') }}"></script>
<script src="{{ asset('admin/js/pages/dashboard.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



<script>
    @if( Session::has('message') )
    var type = "{{ Session::get('alert_type','info') }}";
    switch(type){
        case 'success':
            toastr.info("{{ Session::get('message') }}")
            break;

        case 'info':
            toastr.success("{{ Session::get('message') }}")
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}")
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}")
            break;
    }

    @endif
</script>


</body>
</html>
