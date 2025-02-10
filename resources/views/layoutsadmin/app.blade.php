<!DOCTYPE html>
<html>

<head>
    @include('layoutsadmin.head')
</head>

<body class="hold-transition sidebar-mini"></body>
    <div class="wrapper">
        <!-- Navbar -->
            @include('layoutsadmin.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
            @include('layoutsadmin.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @yield('contentadmin')
        </div>
        <!-- /.content -->
    </div>

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 1
        </div>
        <strong>Copyright &copy; 2023 Template By <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
        reserved.
    </footer>

    @include('layoutsadmin.footer')

</body>

</html>
