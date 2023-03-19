<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>SIPJP | <?= $page ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico') ?>">

        <link href="<?= base_url('assets/libs/sweetalert2/sweetalert2.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Css -->
        <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?= base_url('assets/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?= base_url('assets/css/app.min.css') ?>" rel="stylesheet" type="text/css" />

    </head>

    <body class="bg-primary bg-pattern">
        <div class="home-btn d-none d-sm-block">
            <a href="<?= base_url('/') ?>"><i class="mdi mdi-home-variant h2 text-white"></i></a>
        </div>

        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">
                            <a href="<?= base_url('login') ?>" class="logo"><img src="<?= base_url('assets/images/logo-light.png') ?>" height="24" alt="logo"></a>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-xl-5 col-sm-8">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="p-2">
                                    <?= $this->renderSection('content') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end Account pages -->

        <!-- JAVASCRIPT -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <?= $this->renderSection('scripts') ?>
        <script src="<?= base_url('assets/libs/jquery/jquery.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/metismenu/metisMenu.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/simplebar/simplebar.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/node-waves/waves.min.js') ?>"></script>
        <!-- Sweet Alerts js -->
        <script src="<?= base_url('assets/libs/sweetalert2/sweetalert2.min.js') ?>"></script>

        <!-- Sweet alert init js-->
        <script src="<?= base_url('assets/js/pages/sweet-alerts.init.js') ?>"></script>
        
        <script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>

        <script src="<?= base_url('assets/js/app.js') ?>"></script>

    </body>
</html>
