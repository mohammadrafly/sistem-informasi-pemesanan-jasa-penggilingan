<?= $this->extend('layout/LayoutDashboard') ?>
<?= $this->section('content') ?>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light mb-3" data-toggle="modal" data-target=".bs-example-modal-xl">Tambah User</button>
                                                            <div id="modal" class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-xl">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="myExtraLargeModalLabel">Tambah User</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true" class="close">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form id="form" >
                                                                                <div class="form-group form-group-custom mb-4">
                                                                                    <select class="custom-select" name="role" id="role" required>
                                                                                        <option selected>Role</option>
                                                                                        <option value="admin">Admin</option>
                                                                                        <option value="user">User</option>
                                                                                    </select>
                                                                                    <label for="role">Role</label>
                                                                                </div>
                                                                                <div class="form-group form-group-custom mb-4">
                                                                                    <input hidden name="id" id="id">
                                                                                    <input type="text" class="form-control" id="username" name="username" required>
                                                                                    <label for="username">Username</label>
                                                                                </div>
                                                                                <div class="form-group form-group-custom mb-4">
                                                                                    <input type="email" class="form-control" id="email" name="email" required>
                                                                                    <label for="email">Email</label>
                                                                                </div>
                                                                                <div class="form-group form-group-custom mb-4">
                                                                                    <input type="text" class="form-control" id="name" name="name" required>
                                                                                    <label for="name">Name</label>
                                                                                </div>
                                                                                <div id="pass" class="row">
                                                                                    <div class="col-sm-6">
                                                                                        <div class="form-group form-group-custom mb-4">
                                                                                            <input type="password" class="form-control" id="password" name="password" required>
                                                                                            <label for="password">Password</label> 
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <div class="form-group form-group-custom mb-4">
                                                                                            <input type="password" class="form-control" id="password_confirmation" required>
                                                                                            <label for="password_confirmation">Password Confirmation</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mt-4">
                                                                                    <button class="btn btn-primary waves-effect waves-light" onclick="saveUser()">Save User</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div><!-- /.modal -->
                                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                            <tr>
                                                                <th>Nama</th>
                                                                <th>Username</th>
                                                                <th>Email</th>
                                                                <th>Role</th>
                                                                <th>Join</th>
                                                                <th>Update</th>
                                                                <th>Opsi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($content as $data): ?>
                                                            <tr>
                                                                <td><?= $data['name'] ?></td>
                                                                <td><?= $data['username'] ?></td>
                                                                <td><?= $data['email'] ?></td>
                                                                <td><?= $data['role']?></td>
                                                                <td><?= $data['created_at'] ?></td>
                                                                <td><?= $data['updated_at'] ?></td>
                                                                <td>
                                                                    <button class="btn-sm btn-primary" onclick="editUser(<?= $data['id']?>)">
                                                                        <span>Update</span>
                                                                    </button>
                                                                    <button class="btn-sm btn-danger" onclick="deleteUser(<?= $data['id']?>)">
                                                                        <span>Delete</span>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            <?php endforeach ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                            </div>
                            <!-- end row -->
<?= $this->endSection() ?>
<?= $this->section('scripts') ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="<?= base_url('ajax/crudUser.js') ?>"></script>
<?= $this->endSection() ?>