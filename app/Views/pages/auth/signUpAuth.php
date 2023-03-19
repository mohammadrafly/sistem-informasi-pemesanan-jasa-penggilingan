<?= $this->extend('layout/LayoutAuth') ?>
<?= $this->section('content') ?>
                                    <h5 class="mb-5 text-center">Register Account to Xoric.</h5>
                                    <form class="form-horizontal" id="SignUp">
                                    <?= csrf_field() ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                            <div class="form-group form-group-custom mb-4">
                                                    <input type="text" class="form-control" id="name" name="name" required>
                                                    <label for="name">Name</label>
                                                </div>
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" class="form-control" id="username" name="username" required>
                                                    <label for="username">Username</label>
                                                </div>
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="email" class="form-control" id="email" name="email" required>
                                                    <label for="email">Email</label> 
                                                </div>
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="password" class="form-control" name="password" id="password" required>
                                                    <label for="password">Password</label>
                                                </div>
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
                                                    <label for="password_confirmation">Ketik Ulang Password</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="term-conditionCheck">
                                                    <label class="custom-control-label font-weight-normal" for="term-conditionCheck">I accept <a href="#" class="text-primary">Terms and Conditions</a></label>
                                                </div>
                                                <div class="mt-4">
                                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Register</button>
                                                </div>
                                                <div class="mt-4 text-center">
                                                    <a href="<?= base_url('login') ?>" class="text-muted"><i class="mdi mdi-account-circle mr-1"></i> Already have account?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="<?= base_url('ajax/Auth/signUp.js') ?>"></script>
<script src="<?= base_url('ajax/main.js') ?>"></script>
<?= $this->endSection() ?>