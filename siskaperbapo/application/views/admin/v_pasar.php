<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <div class="alert alert-info">
                <p> Daftar Pasar</p>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col" style="width: 25%;">Nama Pasar</th>
                        <th scope="col" style="width: 50%;">Alamat</th>
                        <th scope="col" style="text-align: center;">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($pasar as $p) {
                    ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $p->nama_pasar ?></td>
                            <td><?= $p->alamat_pasar ?></td>
                            <td style="text-align: center;width:30%;">
                                <button class="btn btn-success mb-1" data-toggle="modal" data-target="#modalAkun<?= $p->id_pasar ?>"><i class="fas fa-user"></i> </button>

                                <button class="btn btn-danger mb-1" data-toggle="modal" data-target="#modalHapus<?= $p->id_pasar ?>"><i class="fas fa-trash"></i> </button>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <?php echo $this->session->flashdata('message'); ?>
            <form method="post" action="<?= base_url() ?>Admin/tambahPasar">
                <div class="card">

                    <div class="card-header">
                        Tambah Pasar
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Pasar</label>
                            <input class="form-control" minlength="1" maxlength="15" name="nama_pasar" placeholder="Nama Pasar" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat_pasar" placeholder="Alamat" required></textarea>
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
foreach ($pasar as $p) {
?>
    <div class="modal fade" id="modalAkun<?= $p->id_pasar ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Admin Pasar <?= $p->nama_pasar ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    $id_akun =  $p->id_akun;
                    if ($id_akun == null) {
                    ?>
                        <div style="text-align: center;">
                            <img src="<?= base_url() ?>assets/img/user.png" style="width: 100px;height:100px;">
                            <p><b>Admin pasar belum tersedia</b></p>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#buatAkun<?= $p->id_pasar ?>" data-dismiss="modal">Buat Admin</button>
                        </div>
                    <?php } else { ?>
                        <div class="form-group">
                            <label>Username</label>
                            <p><?= $p->username ?></p>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <p><?= $p->password ?></p>
                        </div>
                        <div>
                            <button type="button" class="btn btn-info" data-dismiss="modal" data-toggle="modal" data-target="#editAkun<?= $p->id_pasar ?>">Edit Akun</button>
                        </div>
                    <?php } ?>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<?php
foreach ($pasar as $p) {
?>
    <div class="modal fade" id="editAkun<?= $p->id_pasar ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Admin Pasar <?= $p->nama_pasar ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url() ?>Admin/editAkun">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" minlength="1" maxlength="15" value="<?= $p->username ?>" name="username" required>
                            <input class="form-control" hidden value="<?= $p->id_akun ?>" name="id_akun" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" minlength="1" maxlength="15" value="<?= $p->password ?>" name="password" required>
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

<!-- Modal Buat Akun -->
<?php
foreach ($pasar as $p) {
?>
    <div class="modal fade" id="buatAkun<?= $p->id_pasar ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Admin Pasar <?= $p->nama_pasar ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url() ?>Admin/tambahAdminPasar">
                    <div class="modal-body">
                        <input name="id_pasar" value="<?= $p->id_pasar ?>" hidden>
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" minlength="1" maxlength="15" name="username" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" minlength="1" maxlength="15" name="password" type="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<?php
foreach ($pasar as $p) {
?>
    <div class="modal fade" id="modalHapus<?= $p->id_pasar ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Hapus Pasar "<?= $p->nama_pasar ?>"</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Jika anda menghapus pasar ini, semua toko dan produk dari pasar akan terhapus juga</p>
                    <a class="btn btn-danger" href="<?= base_url('Admin/deletePasar/' . $p->id_pasar) ?>">Iya</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>