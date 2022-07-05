<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Rencava | Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/feather/feather.css">
    <link rel="stylesheet" href="/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/typicons/typicons.css">
    <link rel="stylesheet" href="/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <!-- endinject -->
    <!-- Core CSS -->
    <link rel="stylesheet" href="/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="/vendor/libs/apex-charts/apex-charts.css" />
    <!-- Plugin css for this page -->
    {{-- <link rel="stylesheet" href="/datatables.net-bs4/dataTables.bootstrap4.css"> --}}
    <link rel="stylesheet" href="/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/css/vertical-layout-light/style.css">
    <link rel="stylesheet" href="/select2/select2.min.css">
    <link rel="stylesheet" href="/select2-bootstrap-theme/select2-bootstrap.min.css">
    {{-- dataTables --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css" />
    <!-- endinject -->
    <link rel="shortcut icon" href="/images/favicon.png" />
    <script src="/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/js/config.js"></script>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('dashboard.layouts.header')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper bg-light">
            @include('dashboard.layouts.sidebar')
            <!-- partial:partials/_sidebar.html -->
            <!-- main-panel starts -->
            <div class="main-panel">
                @yield('container')
                <!-- partial:partials/_footer.html -->
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/chart.js/Chart.min.js"></script>
    <script src="/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="/progressbar.js/progressbar.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/js/off-canvas.js"></script>
    <script src="/js/hoverable-collapse.js"></script>
    <script src="/js/template.js"></script>
    <script src="/js/settings.js"></script>
    <script src="/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="/js/dashboard.js"></script>
    <script src="/js/Chart.roundedBarCharts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script> --}}
    <!-- End custom js for this page-->
    {{-- SweetAlert --}}
    @include('sweetalert::alert')
</body>

</html>
