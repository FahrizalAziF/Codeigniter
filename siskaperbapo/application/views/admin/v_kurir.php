<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <div class="alert alert-info">
                <p> Kurir Anda</p>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col" style="">Nama Kurir</th>
                        <th scope="col" style="">Alamat</th>
                        <th scope="col" style="">No Hp</th>
                        <th scope="col" style="text-align: center;">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($kurir as $p) {
                    ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $p->nama_kurir ?></td>
                            <td><?= $p->alamat_kurir ?></td>
                            <td><?= $p->no_hp_kurir ?></td>
                            <td style="text-align: center;">
                                <button class="btn btn-success mb-1" data-toggle="modal" data-target="#modalUbah<?= $p->id_kurir ?>"><i class="fas fa-user"></i> </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <?php echo $this->session->flashdata('message'); ?>
            <form method="post" action="<?= base_url() ?>Admin/addKurir">
                <div class="card">

                    <div class="card-header">
                        Tambah Kurir
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Kurir</label>
                            <input class="form-control" name="nama_kurir" minlength="1" maxlength="35" placeholder="Nama Pasar" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat_kurir" placeholder="Alamat" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>No Wa</label>
                            <input class="form-control" name="no_hp_kurir" minlength="1" maxlength="15" placeholder="Nama Pasar" required>
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
foreach ($kurir as $p) {
?>
    <div class="modal fade" id="modalUbah<?= $p->id_kurir ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="post" action="<?= base_url() ?>Admin/editKurir">
                    <div class="modal-header">
                        <h5>Ubah Data Kurir</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Kurir</label>
                            <input class="form-control" minlength="1" maxlength="35" value="<?= $p->nama_kurir ?>" name="nama_kurir">
                            <input class="form-control" hidden value="<?= $p->id_kurir ?>" name="id_kurir">
                        </div>
                        <div class="form-group">
                            <label>Alamat Kurir</label>
                            <input class="form-control" value="<?= $p->alamat_kurir ?>" name="alamat_kurir">
                        </div>
                        <div class="form-group">
                            <label>No Wa Kurir</label>
                            <input class="form-control" value="<?= $p->no_hp_kurir ?>" minlength="1" maxlength="15" name="no_hp_kurir">
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