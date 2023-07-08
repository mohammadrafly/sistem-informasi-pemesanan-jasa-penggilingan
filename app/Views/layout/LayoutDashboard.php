<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>SIPJP | <?= $page ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico') ?>">
    <link href="<?= base_url('assets/libs/air-datepicker/css/datepicker.min.css') ?>" rel="stylesheet" type="text/css" />

    <link href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/rowreorder/1.4.0/css/rowReorder.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css" integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="<?= base_url('assets/libs/air-datepicker/css/datepicker.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/libs/selectize/css/selectize.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/libs/jqvmap/jqvmap.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/libs/sweetalert2/sweetalert2.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="<?= base_url('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url('assets/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url('assets/css/app.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
</head>

<body data-topbar="colored" data-layout="horizontal" data-layout-size="boxed">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <?= $this->include('layout/partials/Header') ?>

        <div class="main-content">
            <div class="page-content">

                <!-- Page-Title -->
                <?= $this->include('layout/partials/Breadcrumb') ?>
                <!-- end page title end breadcrumb -->

                <div class="page-content-wrapper">
                    <div class="container-fluid">
                        <?= $this->renderSection('content') ?>
                    </div> <!-- container-fluid -->
                </div>
                <!-- end page-content-wrapper -->
            </div>
            <!-- End Page-content -->
            <?= $this->include('layout/partials/Footer') ?>
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.4.0/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <?= $this->renderSection('scripts') ?>
    <script src="<?= base_url('ajax/main.js') ?>"></script>
    <script src="<?= base_url('assets/libs/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/metismenu/metisMenu.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/simplebar/simplebar.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/node-waves/waves.min.js') ?>"></script>

    <script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>

    <!-- datepicker -->
    <script src="<?= base_url('assets/libs/air-datepicker/js/datepicker.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/air-datepicker/js/i18n/datepicker.en.js') ?>"></script>

    <script src="<?= base_url('assets/libs/jquery-knob/jquery.knob.min.js') ?>"></script> 
    <!-- Sweet Alerts js -->
    <script src="<?= base_url('assets/libs/sweetalert2/sweetalert2.min.js') ?>"></script>

    <!-- Sweet alert init js-->
    <script src="<?= base_url('assets/js/pages/sweet-alerts.init.js') ?>"></script>
    <!-- Jq vector map -->
    <script src="<?= base_url('assets/libs/air-datepicker/js/datepicker.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/air-datepicker/js/i18n/datepicker.en.js') ?>"></script>
    <script src="<?= base_url('assets/libs/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/selectize/js/standalone/selectize.min.js') ?>"></script>
    <!-- Form Advanced init -->
    <script src="<?= base_url('assets/js/app.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js" integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                responsive: true,
                rowReorder: {
                    selector: 'td:nth-child(2)'
                }
            });
        });
    </script>
</body>
</html>
