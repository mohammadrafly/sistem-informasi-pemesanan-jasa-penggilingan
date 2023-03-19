<?= $this->extend('layout/LayoutDashboard') ?>
<?= $this->section('content') ?>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light mb-3" data-toggle="modal" data-target=".bs-example-modal-xl">Tambah Jenis</button>
                                                            <div id="modal" class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-xl">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="myExtraLargeModalLabel">Tambah Jenis</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true" class="close">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form id="form" >
                                                                                <div class="form-group form-group-custom mb-4">
                                                                                    <input hidden name="id" id="id">
                                                                                    <input type="text" class="form-control" id="nama_tanaman" name="nama_tanaman" required>
                                                                                    <label for="jenisname">Jenis Tanaman</label>
                                                                                </div>
                                                                                <div class="mt-4">
                                                                                    <button class="btn btn-primary waves-effect waves-light" onclick="saveJenis()">Save Jenis</button>
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
                                                                <th>Created</th>
                                                                <th>Updated</th>
                                                                <th>Opsi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($content as $data): ?>
                                                            <tr>
                                                                <td><?= $data['nama_tanaman'] ?></td>
                                                                <td><?= $data['created_at'] ?></td>
                                                                <td><?= $data['updated_at'] ?></td>
                                                                <td>
                                                                    <button class="btn-sm btn-primary" onclick="editJenis(<?= $data['id']?>)">
                                                                        <span>Update</span>
                                                                    </button>
                                                                    <button class="btn-sm btn-danger" onclick="deleteJenis(<?= $data['id']?>)">
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
<script src="<?= base_url('ajax/crudJenis.js') ?>"></script>
<?= $this->endSection() ?>