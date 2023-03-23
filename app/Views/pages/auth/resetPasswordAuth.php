<?= $this->extend('layout/LayoutAuth') ?>
<?= $this->section('content') ?>
                                    <h5 class="mb-5 text-center">Reset Password</h5>
                                    <form class="form-horizontal" id="ResetPassword">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-warning alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    Enter your <b>Email</b> and instructions will be sent to you!
                                                </div>

                                                <div class="form-group form-group-custom mt-5">
                                                    <input type="email" class="form-control" id="email" required>
                                                    <label for="useremail">Email</label>
                                                </div>
                                                <div class="mt-4">
                                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Send Email</button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </form>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="<?= base_url('ajax/Auth/resetPassword.js') ?>"></script>
<script src="<?= base_url('ajax/main.js') ?>"></script>
<?= $this->endSection() ?>