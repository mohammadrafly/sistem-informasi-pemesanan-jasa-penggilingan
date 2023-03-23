<?= $this->extend('layout/LayoutAuth') ?>
<?= $this->section('content') ?>
                                    <h5 class="mb-5 text-center">New Password</h5>
                                    <form class="form-horizontal" id="NewPassword">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <input hidden id="email" name="email" value="<?= $email ?>">
                                                <input hidden name="token" id="token" value="<?= $token ?>">
                                                <div class="form-group form-group-custom mt-5">
                                                    <input type="password" class="form-control" id="password" name="password" required>
                                                    <label for="password">Password</label>
                                                </div>
                                                <div class="form-group form-group-custom mt-5">
                                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                                    <label for="password_confirmation">Konfirmasi Password</label>
                                                </div>
                                                <div class="mt-4">
                                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Kirim</button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </form>
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="<?= base_url('ajax/Auth/newPassword.js') ?>"></script>
<script src="<?= base_url('ajax/main.js') ?>"></script>
<?= $this->endSection() ?>