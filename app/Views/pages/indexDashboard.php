<?= $this->extend('layout/LayoutDashboard') ?>
<?= $this->section('content') ?>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h5>Welcome Back <?= session()->get('name') ?> !</h5>
                                                    <p class="text-muted">SIPJP Dashboard</p>

                                                    <div class="mt-4">
                                                        <a href="#" class="btn btn-primary btn-sm">View more <i class="mdi mdi-arrow-right ml-1"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if(session()->get('role') != 'user'): ?>
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header bg-transparent p-3">
                                                        <h5 class="header-title mb-0">Status Data</h5>
                                                    </div>
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">
                                                            <div class="media my-2">
                                                                <div class="media-body">
                                                                    <p class="text-muted mb-2">Total Orders</p>
                                                                    <h5 class="mb-0"><?= $order ?></h5>
                                                                </div>
                                                                <div class="icons-lg ml-2 align-self-center">
                                                                    <i class="uim uim-layer-group"></i>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="media my-2">
                                                                <div class="media-body">
                                                                    <p class="text-muted mb-2">Total User</p>
                                                                    <h5 class="mb-0"><?= $allUser ?></h5>
                                                                </div>
                                                                <div class="icons-lg ml-2 align-self-center">
                                                                    <i class="uim uim-analytics"></i>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="media my-2">
                                                                <div class="media-body">
                                                                    <p class="text-muted mb-2">Pelanggan</p>
                                                                    <h5 class="mb-0"><?= $user ?></h5>
                                                                </div>
                                                                <div class="icons-lg ml-2 align-self-center">
                                                                    <i class="uim uim-ruler"></i>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endif ?>
                            </div>

                            <!-- end row -->
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<?= $this->endSection() ?>