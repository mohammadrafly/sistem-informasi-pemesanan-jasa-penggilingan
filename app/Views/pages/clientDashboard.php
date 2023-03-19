<?= $this->extend('layout/LayoutDashboard') ?>
<?= $this->section('content') ?>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light mb-3" data-toggle="modal" data-target=".bs-example-modal-xl">Tambah Order Saya</button>
                                                <div id="modal" class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-xl">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="myExtraLargeModalLabel">Tambah Order</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true" class="close">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form id="form">
                                                                                <input hidden name="id" id="id"/>
                                                                                <input hidden value="<?= session()->get('username') ?>" name="username" id="username"/>
                                                                                <div class="form-group form-group mb-4">
                                                                                    <label for="input">Tanggal DB</label>
                                                                                    <input type="date" class="form-control datepicker-here" data-language="en" name="tanggal_db" id="tanggal_db" required/>
                                                                                </div>
                                                                                <div class="form-group form-group mb-4">
                                                                                    <label for="input">Alamat DB</label>
                                                                                    <textarea type="text" class="form-control" name="alamat_db" id="alamat_db" required></textarea>
                                                                                </div>
                                                                                <div class="form-group form-group mb-4">
                                                                                    <label for="input">Nomor Pemesan</label>
                                                                                    <input type="text" class="form-control" id="nomor_user" name="nomor_user" required>
                                                                                </div>
                                                                                <div class="form-group form-group mb-4">
                                                                                    <label for="input">Luas Sawah</label>
                                                                                    <input type="text" class="form-control" id="luas_sawah" name="luas_sawah" required> 
                                                                                </div>
                                                                                <div class="form-group form-group mb-4">
                                                                                    <label for="input">Jenis Tanaman</label>
                                                                                    <select class="custom-select" name="jenis_tanaman" id="jenis_tanaman" required>
                                                                                        <option selected>Pilih Jenis Tanaman</option>
                                                                                        <?php foreach($jenis as $data): ?>
                                                                                        <option value="<?= $data['id'] ?>"><?= $data['nama_tanaman'] ?></option>
                                                                                        <?php endforeach ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group form-group mb-4">
                                                                                    <label for="input">Admin Eksekusi</label>
                                                                                    <select class="custom-select" name="admin" id="admin" required>
                                                                                        <option selected>Pilih Admin</option>
                                                                                        <?php foreach($admin as $data): ?>
                                                                                        <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
                                                                                        <?php endforeach ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="mt-4">
                                                                                    <button class="btn btn-primary waves-effect waves-light" onclick="saveOrder()">Save Order</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div><!-- /.modal -->
                                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                        <thead>
                                                            <tr>
                                                                <th>Alamat</th>
                                                                <th>Tanggal Eksekusi</th>
                                                                <th>Nomor HP</th>
                                                                <th>Status</th>
                                                                <th>Update</th>
                                                                <th>Opsi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($content as $data): ?>
                                                            <tr>
                                                                <td><?= $data->alamat_db ?></td>
                                                                <td><?= $data->tanggal_db ?></td>
                                                                <td><?= $data->nomor_user ?></td>
                                                                <td>
                                                                    <?php if($data->status == 'menunggu_konfirmasi'): ?>
                                                                        <span class="badge-pill badge-warning"> Menunggu Konfirmasi</span>
                                                                    <?php elseif($data->status == 'dalam_progres'): ?>
                                                                        <span class="badge-pill badge-primary"> Dalam Progres</span>
                                                                    <?php elseif($data->status == 'selesai'): ?>
                                                                        <span class="badge-pill badge-success"> Selesai</span>
                                                                    <?php endif ?>
                                                                </td>
                                                                <td><?= $data->updated_at ?></td>
                                                                <td>
                                                                    <button class="btn-sm btn-primary" onclick="editOrder(<?= $data->id?>)">
                                                                        <span>Update</span>
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
<script src="<?= base_url('ajax/crudClient.js') ?>"></script>
<?= $this->endSection() ?>