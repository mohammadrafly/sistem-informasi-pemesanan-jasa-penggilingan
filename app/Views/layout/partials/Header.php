            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="container-fluid">
                        <div class="float-right">
                            <?php if(!session()->get('LoginTrue')): ?>
                            <button class="btn header-item">
                                <i class="mdi mdi mdi-login mr-1"></i><a href="<?= base_url('login') ?>" style="color: white">Login</a>
                            </button>
                            <?php else: ?>
                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="rounded-circle header-profile-user" src="<?= base_url('assets/images/users/avatar-1.jpg') ?>" alt="Header Avatar">
                                    <span class="d-none d-sm-inline-block ml-1"><?= session()->get('username') ?></span>
                                    <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="javascript:void(0);" onclick="Logout()"><i class="mdi mdi-logout font-size-16 align-middle mr-1"></i> Logout</a>
                                </div>
                            </div>
                            <?php endif ?>
                        </div>

                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="<?= base_url('/') ?>" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="<?= base_url('assets/images/logo-sm-dark.png') ?>" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= base_url('assets/images/logo-dark.png') ?>" alt="" height="20">
                                </span>
                            </a>

                            <a href="<?= base_url('/') ?>" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?= base_url('assets/images/logo-sm-light.png') ?>" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= base_url('assets/images/logo-light.png') ?>" alt="" height="20">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm mr-2 font-size-16 d-lg-none header-item waves-effect waves-light" data-toggle="collapse" data-target="#topnav-menu-content">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <div class="topnav">
                            <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                                <div class="collapse navbar-collapse" id="topnav-menu-content">
                                    <ul class="navbar-nav">
                                        <?php if(session()->get('role') == 'user' && session()->get('LoginTrue')): ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url('/') ?>">
                                                Home
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url('dashboard/client/'.session()->get('username')) ?>">
                                                My Orders
                                            </a>
                                        </li>
                                        <?php elseif(!session()->get('LoginTrue')): ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url('/') ?>">
                                                Home
                                            </a>
                                        </li>
                                        <?php else: ?>
                                            <?php if(session()->get('role') == 'admin'): ?>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="<?= base_url('dashboard') ?>">
                                                        Dashboard
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="<?= base_url('dashboard/orders') ?>">
                                                        Data Orders
                                                    </a>
                                                </li>
                                            <?php elseif(session()->get('role') == 'superadmin'): ?>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="<?= base_url('dashboard') ?>">
                                                        Dashboard
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="<?= base_url('dashboard/users') ?>">
                                                        Data Users
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="<?= base_url('dashboard/orders') ?>">
                                                        Data Orders
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="<?= base_url('dashboard/jenis') ?>">
                                                        Data Jenis Tanaman
                                                    </a>
                                                </li>
                                            <?php endif ?>
                                        <?php endif ?>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>

            </header>