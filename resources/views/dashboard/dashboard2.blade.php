
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard 2</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('bootstrap')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('bootstrap')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('bootstrap')}}/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="{{asset('bootstrap')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('bootstrap')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('bootstrap')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <script src="{{asset('bootstrap')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{asset('bootstrap')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('bootstrap')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('bootstrap')}}/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- DataTables  & Plugins -->
<script src="{{asset('bootstrap')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('bootstrap')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('bootstrap')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('bootstrap')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('bootstrap')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('bootstrap')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('bootstrap')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('bootstrap')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('bootstrap')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('bootstrap')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('bootstrap')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('bootstrap')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- jQuery Mapael -->
<script src="{{asset('bootstrap')}}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="{{asset('bootstrap')}}/plugins/raphael/raphael.min.js"></script>
<script src="{{asset('bootstrap')}}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="{{asset('bootstrap')}}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('bootstrap')}}/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
{{-- <script src="{{asset('bootstrap')}}/dist/js/demo.js"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('bootstrap')}}/dist/js/pages/dashboard2.js"></script>
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{asset('bootstrap')}}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  @include('dashboard.layout.navbar')
  @include('dashboard.layout.sidebar')
  @include('dashboard.layout.content')



  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->

</body>
</html>
