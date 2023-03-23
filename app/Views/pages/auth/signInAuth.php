<?= $this->extend('layout/LayoutAuth') ?>
<?= $this->section('content') ?>
                                <h5 class="mb-5 text-center">Sign in to continue to Xoric.</h5>
                                    <form class="form-horizontal" id="SignIn">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" class="form-control" name="username" id="username" required>
                                                    <label for="username">Username/Email</label>
                                                </div>

                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="password" class="form-control" name="password" id="userpassword" required>
                                                    <label for="userpassword">Password</label>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                            <label class="custom-control-label" for="customControlInline">Remember me</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="text-md-right mt-3 mt-md-0">
                                                            <a href="<?= base_url('reset-password') ?>" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Log In</button>
                                                </div>
                                                <div class="mt-4 text-center">
                                                    <a href="<?= base_url('register') ?>" class="text-muted"><i class="mdi mdi-account-circle mr-1"></i> Create an account</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="<?= base_url('ajax/Auth/signIn.js') ?>"></script>
<script src="<?= base_url('ajax/main.js') ?>"></script>
<?= $this->endSection() ?>