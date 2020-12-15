<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info">
                <p> Daftar Toko <b>"Pasar <?= $pasar->nama_pasar ?>"</b></p>
                <p> Alamat Pasar : <b><?= $pasar->alamat_pasar ?></b></p>
            </div>
            <?php echo $this->session->flashdata('message'); ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Toko</th>
                        <th scope="col">Nama Pemilik</th>
                        <th scope="col">No Wa</th>
                        <th scope="col">Foto Toko</th>
                        <th scope="col">Status</th>
                        <th scope="col" style="text-align: center;">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($toko as $p) {
                    ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $p->nama_toko ?></td>
                            <td><?= $p->nama_pemilik_toko ?></td>
                            <td><?= $p->no_hp_toko ?></td>
                            <td><img src="<?= base_url() ?>upload/<?= $p->foto_toko ?>" width="50px" height="50px"></td>
                            <td><?= $p->status ?></td>
                            <td style="text-align: center;">
                                <button class="btn btn-success mb-1" data-toggle="modal" data-target="#modalAkun<?= $p->id_toko ?>"><i class="fas fa-user"></i> </button>
                                <button class="btn btn-danger mb-1" data-toggle="modal" data-target="#modalHapus<?= $p->id_toko ?>"><i class="fas fa-trash"></i> </button>
                            </td>
                        </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal Akun-->
<?php
foreach ($toko as $p) {
?>
    <div class="modal fade" id="modalAkun<?= $p->id_toko ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Admin Toko "<?= $p->nama_toko ?>"</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    $status =  $p->status;
                    if ($status == "Belum Dikonfirmasi") {
                    ?>
                        <div style="text-align: center;">
                            <img src="<?= base_url() ?>assets/img/user.png" style="width: 100px;height:100px;">
                            <p><b>Toko belum dikonfirmasi</b></p>
                        </div>
                        <div class="form-control mt-2">
                            <p><b>
                                    Akun Admin Toko
                                </b>
                            </p>
                            <div class="form-group">
                                <label><b>Username</b></label>
                                <p><?= $p->username ?></p>
                                <label><b>Password</b></label>
                                <p><?= $p->password ?></p>
                                <form method="post" action="Toko/konfirmasi">
                                    <div style="text-align: right;">
                                        <input name="id_toko" value="<?= $p->id_toko ?>" hidden>
                                        <input name="username" value="<?= $p->username ?>" hidden>
                                        <input name="password" value="<?= $p->password ?>" hidden>
                                        <input name="no_wa" value="<?= $p->no_hp_toko ?>" hidden>
                                        <button class="btn btn-primary" type="submit">Konfirmasi Sekarang</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php } else if ($status == "Sudah Dikonfirmasi") { ?>
                        <div style="text-align: center;">
                            <img src="<?= base_url() ?>assets/img/check.png" style="width: 100px;height:100px;">
                            <p><b>Toko telah dikonfirmasi</b></p>
                        </div>
                    <?php } ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalEdit<?= $p->id_toko ?>" data-dismiss="modal">Edit Pasar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php
foreach ($toko as $p) {
?>
    <div class="modal fade" id="modalHapus<?= $p->id_toko ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Hapus Toko "<?= $p->nama_toko ?>"</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Jika anda menghapus toko ini, semua produk dari toko akan terhapus juga</p>
                    <a class="btn btn-danger" href="<?= base_url('Toko/deleteToko/' . $p->id_toko) ?>">Iya</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php
foreach ($toko as $p) {
?>
    <div class="modal fade" id="modalEdit<?= $p->id_toko ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="post" action="<?= base_url('Toko/editToko') ?>" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Toko "<?= $p->nama_toko ?>"</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nama Toko</label>
                                <input class="form-control" required minlength="1" maxlength="15" name="nama_toko" value="<?= $p->nama_toko ?>">
                                <input class="form-control" hidden required name="id_toko" value="<?= $p->id_toko ?>">
                            </div>
                            <div class="col-md-6">
                                <label>Nama Pemilik</label>
                                <input class="form-control" required name="nama_pemilik_toko" minlength="1" maxlength="15" value="<?= $p->nama_pemilik_toko ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>No Wa</label>
                                <input class="form-control" required name="no_hp_toko" minlength="1" maxlength="15" value="<?= $p->no_hp_toko ?>">
                            </div>
                            <div class="col-md-6">
                                <label>Foto Toko</label>
                                <input class="form-control" type="file" required name="foto_toko">
                            </div>
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