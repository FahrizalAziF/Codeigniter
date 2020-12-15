<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <div class="alert alert-info">
                <p> Daftar Bahan</p>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10%;">No</th>
                        <th scope="col">Nama Bahan</th>
                        <th scope="col">Satuan</th>
                        <th scope="col" style="text-align: center;">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $i = 1;
                    foreach ($kategori as $p) {
                    ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td colspan="3"><?= $p->nama_kategori ?></td>

                            <?php
                            $this->db->join('tbl_satuan', 'tbl_satuan.id_satuan=tbl_bahan.id_satuan');
                            $this->db->where('id_kategori', $p->id_kategori);
                            $data = $this->db->get('tbl_bahan')->result();
                            foreach ($data as $d) {
                            ?>
                        <tr>
                            <td></td>
                            <td> -<?= $d->nama_bahan ?></td>
                            <td><?= $d->nama_satuan ?></td>
                            <td style="text-align: center;">
                                <button class="btn btn-success mb-1 btn-sm" data-toggle="modal" data-target="#editBahan<?= $d->id_bahan ?>"><i class="fa fa-pencil"></i> </button>
                                <button class="btn btn-danger mb-1 btn-sm" data-toggle="modal" data-target="#modalHapus<?= $d->id_bahan ?>"><i class="fas fa-trash"></i> </button>

                        </tr>
                    <?php } ?>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <?php echo $this->session->flashdata('message'); ?>
            <form method="post" action="<?= base_url() ?>Pasar/addBahan">
                <div class="card">

                    <div class="card-header">
                        Tambah Bahan
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Bahan</label>
                            <input class="form-control" name="nama_bahan" placeholder="Nama Bahan" required>
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control" name="id_kategori">
                                <?php
                                foreach ($kategori as $k) {
                                ?>
                                    <option value="<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Satuan</label>
                            <select class="form-control" name="id_satuan">
                                <?php
                                foreach ($satuan as $s) {
                                ?>
                                    <option value="<?= $s->id_satuan ?>"><?= $s->nama_satuan ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success" type="submit" style="float: right;">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Akun-->
<?php
$this->db->join('tbl_satuan', 'tbl_satuan.id_satuan=tbl_bahan.id_satuan');
$data = $this->db->get('tbl_bahan')->result();
foreach ($data as $p) {
?>
    <div class="modal fade" id="editBahan<?= $p->id_bahan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Admin Pasar <?= $p->nama_bahan ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url() ?>Pasar/editBahan">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Bahan</label>
                            <input class="form-control" value="<?= $p->nama_bahan ?>" minlength="1" maxlength="15" name="nama_bahan" required>
                            <input class="form-control" hidden value="<?= $p->id_bahan ?>" name="id_bahan" required>
                        </div>
                        <div class="form-group">
                            <label>Satuan</label>
                            <select class="form-control" name="id_satuan">
                                <?php
                                foreach ($satuan as $k) {
                                    $selected = ($k->id_satuan == $p->id_satuan) ? 'selected' : '';
                                ?>
                                    <option value="<?= $k->id_satuan ?>" <?= $selected; ?>><?= $k->nama_satuan ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<?php
$this->db->join('tbl_satuan', 'tbl_satuan.id_satuan=tbl_bahan.id_satuan');
$data = $this->db->get('tbl_bahan')->result();
foreach ($data as $p) {
?>
    <div class="modal fade" id="modalHapus<?= $p->id_bahan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Hapus Bahan "<?= $p->nama_bahan ?>"</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Jika anda menghapus bahan ini, semua produk dari bahan tersebut akan terhapus </p>
                    <a class="btn btn-danger" href="<?= base_url('Pasar/deleteBahan/' . $p->id_bahan) ?>">Iya</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>