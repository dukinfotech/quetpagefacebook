<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>AdminLTE 3 | Starter</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/assets/lib/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/lib/adminlte/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="/assets/lib/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/assets/lib/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/lib/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="/assets/lib/adminlte/plugins/toastr/toastr.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="/assets/lib/adminlte/plugins/select2/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/lib/adminlte/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('components/admin/navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('components/admin/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <!-- Content Header (Page header) -->
	  @include('components/admin/content_header')
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        @yield('content')
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  @include('components/admin/control_sidebar')
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('components/admin/footer')
</div>
<!-- ./wrapper -->
@if(session()->has('success'))
<div id="success-message" data-message="{{ session()->get('success') }}"></div>
@endif

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="/assets/lib/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/assets/lib/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Toastr -->
<script src="/assets/lib/adminlte/plugins/toastr/toastr.min.js"></script>
<!-- DataTables -->
<script src="/assets/lib/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/lib/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/lib/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/lib/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="/assets/lib/adminlte/dist/js/adminlte.min.js"></script>
<!-- jquery-validation -->
<script src="/assets/lib/adminlte/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="/assets/lib/adminlte/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="/assets/js/admin.js"></script>
<script>
  $(document).ready(function () {
    var successTag = $('#success-message');
    if (successTag.length > 0) {
      var msg = successTag.data('message');
      toastr.success(msg)
    }
  });
</script>
@stack('scripts')
</body>
</html>
