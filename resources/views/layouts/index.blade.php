<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon"/>
  <title>TEST</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- css -->
  @include('layouts.css')
  <!-- end css -->
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    @include('layouts.nav-bar.index')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('layouts.mainsidebar')
    <!-- Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
    @include('layouts.contentWrapper')
    <!-- /.content-wrapper -->

    <!-- footer -->
    @include('layouts.footer')
    <!-- end footer -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- Scripts -->
  @include('layouts.scripts')
  @yield('codigo')
  <!-- End Scripts -->

</body>

</html>