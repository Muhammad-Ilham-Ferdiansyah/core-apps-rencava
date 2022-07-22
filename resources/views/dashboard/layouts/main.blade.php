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
    <link rel="stylesheet" href="/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <!-- endinject -->
    <!-- Core CSS -->
    {{-- <link rel="stylesheet" href="/vendor/css/core.css" class="template-customizer-core-css" /> --}}
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
    <script src="autoNumeric.min.js" type="text/javascript"></script>
    <!-- ...or, you may also directly use a CDN :-->
    <script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script>
    <!-- ...or -->
    <script src="https://unpkg.com/autonumeric"></script>
    <!-- inject:js -->
    <script src="/js/off-canvas.js"></script>
    <script src="/js/hoverable-collapse.js"></script>
    <script src="/js/template.js"></script>
    <script src="/js/settings.js"></script>
    <script src="/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/js/dashboard.js"></script>
    <script src="/js/Chart.roundedBarCharts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
        integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script> --}}
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
        //sweetalert function activated user
        $('.deactive').click(function() {
            let userId = $(this).attr('data-id');
            Swal.fire({
                title: "Are you sure, change activate user id " + userId + "",
                padding: '2em',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, change it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/dashboard/admin/users/activate/" + userId + ""
                    Swal.fire({
                        title: 'Updated!',
                        padding: '2em',
                        text: 'Your user status has been updated.',
                        icon: 'success'
                    })
                }
            })
        });

        //sweetalert function delete role
        $('.delete-role').click(function() {
            let roleId = $(this).attr('data-id');
            let roleName = $(this).attr('data-name');
            Swal.fire({
                title: "Are you sure, delete role " + roleName + "",
                padding: '2em',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/dashboard/admin/roles/delete/" + roleId + ""
                    Swal.fire({
                        title: 'Deleted!',
                        padding: '2em',
                        text: 'Role has been deleted.',
                        icon: 'success'
                    })
                }
            })
        });
        //Delete menu
        $('.delete-menu').click(function() {
            let menuId = $(this).attr('data-id');
            let menuName = $(this).attr('data-name');
            Swal.fire({
                title: "Are you sure, delete menu " + menuName + "",
                padding: '2em',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/dashboard/admin/menu/delete/" + menuId + ""
                    Swal.fire({
                        title: 'Deleted!',
                        padding: '2em',
                        text: 'Menu has been deleted.',
                        icon: 'success'
                    })
                }
            })
        });
        //Delete Product
        $('.delete-product').click(function() {
            let productId = $(this).attr('data-id');
            let productName = $(this).attr('data-name');
            Swal.fire({
                title: "Are you sure, delete product " + productName + "",
                padding: '2em',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/dashboard/admin/products/delete/" + productId + ""
                    Swal.fire({
                        title: 'Deleted!',
                        padding: '2em',
                        text: 'Product has been deleted.',
                        icon: 'success'
                    })
                }
            })
        });
        //Delete Client
        $('.delete-client').click(function() {
            let clientId = $(this).attr('data-id');
            let clientName = $(this).attr('data-name');
            Swal.fire({
                title: "Are you sure, delete client " + clientName + "",
                padding: '2em',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/dashboard/admin/clients/delete/" + clientId + ""
                    Swal.fire({
                        title: 'Deleted!',
                        padding: '2em',
                        text: 'Client has been deleted.',
                        icon: 'success'
                    })
                }
            })
        });
        //Delete Client
        $('.delete-project').click(function() {
            let projectId = $(this).attr('data-id');
            let projectName = $(this).attr('data-name');
            Swal.fire({
                title: "Are you sure, delete project " + projectName + "",
                padding: '2em',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/dashboard/admin/projects/delete/" + projectId + ""
                    Swal.fire({
                        title: 'Deleted!',
                        padding: '2em',
                        text: 'Project has been deleted.',
                        icon: 'success'
                    })
                }
            })
        });
        $('.delete-detail-project').click(function() {
            let detailProjectId = $(this).attr('data-id');
            let detailProjectName = $(this).attr('data-name');
            Swal.fire({
                title: "Are you sure, delete detail project " + detailProjectName + "",
                padding: '2em',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/dashboard/admin/detail_projects/delete/" + detailProjectId + ""
                    Swal.fire({
                        title: 'Deleted!',
                        padding: '2em',
                        text: 'Detail Project has been deleted.',
                        icon: 'success'
                    })
                }
            })
        });
        //autonumeric
        new AutoNumeric('#budget', {
            // currencySymbol: 'Rp. ',
            decimalPlaces: '0',
            decimalCharacter: ',',
            digitGroupSeparator: '.'
        });
        //sidebar active
    </script>
    <script>
        $(document).ready(function() {
            $('#add_btn').on('click', function() {
                let html = '';

                // console.log(test);
                html += '<tr>';
                html += '<td><input type="text" name="module_name[]" class="form-control"></td>';
                html += '<td><select name="user_id[]" class="form-control text-dark">'
                $("#mySelectionBox option").each(function() {
                    html += '<option value="' + this.value + '">' +
                        this
                        .text +
                        '</option>';
                });
                html += '</select></td>';
                html += `<td><input type="text" name="jobdesc[]" class="form-control"></td>`;
                html += `<td><input type="date" name="startdate[]" class="form-control"></td>`;
                html += `<td><input type="date" name="enddate[]" class="form-control"></td>`;
                html += `<td> <button type="button" class="btn btn-sm btn-danger" id="remove"><i
                                                class="ti-close fw-bold"></i></button></td>`;
                html += '</tr>';
                $('tbody').append(html)
            });
        });
        $(document).on('click', '#remove', function() {
            $(this).closest('tr').remove();
        });
    </script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script> --}}
    <!-- End custom js for this page-->
    {{-- SweetAlert --}}
    @include('sweetalert::alert')
</body>

</html>
