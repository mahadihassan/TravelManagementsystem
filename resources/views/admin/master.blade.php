<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Travel Management Apps</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/bower_components/Ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/dist/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/bower_components/morris.js/morris.css')}}">
    <link rel="stylesheet" href="{{asset('backend/bower_components/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="{{asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!--header-->
    @include('admin.header')

        <!--sidebar for admin-->
   @include('admin.sidebar')


    <div class="content-wrapper">

        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>


      <!-- section of dashboard -->
    @yield('content')

    </div>
    <!-- footer -->
    @include('admin.footer')

    <aside class="control-sidebar control-sidebar-dark" style="display: none;">
    </aside>

</div>


<script src="{{asset('backend/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('backend/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<script>$.widget.bridge('uibutton', $.ui.button);</script>
<script src="{{asset('backend/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('backend/bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{asset('backend/bower_components/morris.js/morris.min.js')}}"></script>
<script src="{{asset('backend/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('backend/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<script src="{{asset('backend/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('backend/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{asset('backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('backend/bower_components/fastclick/lib/fastclick.js')}}"></script>
<script src="{{asset('backend/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('backend/dist/js/pages/dashboard.js')}}"></script>
<script src="{{asset('backend/dist/js/demo.js')}}"></script>

@yield('jsscript')

<script>
    @if(Session::has('success'))
      toastr.success("{{ Session::get('success') }}")
    @elseif(Session::has('info'))
      toastr.info("{{ Session::get('info') }}")
    @elseif(Session::has('warning'))
      toastr.warning("{{ Session::get('warning') }}")
    @elseif(Session::has('error'))
      toastr.error("{{ Session::get('error') }}")
    @endif
  </script>

<script>
        $(document).ready(function() {
            $("#reservation").datepicker({
                format: 'yyyy-mm-dd'
            });
        });
    </script>           

</body>
</html>
