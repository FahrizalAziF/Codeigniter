<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="row mb-5 ">
                <div class="container text-center">
                    <img src="<?= base_url() ?>upload/<?= $akun->foto_toko  ?>" style="width: 200px;height:200px;">
                </div>
                <div class="container mt-2" style="text-align: center;">
                    <a href="" style="color:black" data-toggle="modal" data-target="#exampleModal  ">
                        <b>Edit Profile</b>
                    </a> or
                    <a href="" style="color:black" data-toggle="modal" data-target="#modalAkun  ">
                        <b>Edit Akun</b>
                    </a>
                </div>
            </div>
            <?php echo $this->session->flashdata('message'); ?>
            <div class="row">
                <div class="col-md-3">
                    <div class="container text-center"> <i class="fas fa-store" aria-hidden="true"></i> </div>
                    <div class="container text-center">
                        <h4>Nama Toko</h4>
                        <p><?= $akun->nama_toko ?></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="container text-center"> <i class="fa fa-home" aria-hidden="true"></i> </div>
                    <div class="container text-center">
                        <h4>Nama Pasar</h4>
                        <p><?= $akun->nama_pasar ?></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="container text-center"> <i class="fa fa-user" aria-hidden="true"></i> </div>
                    <div class="container text-center">
                        <h4>Nama Pemilik</h4>
                        <p><?= $akun->nama_pemilik_toko ?></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="container text-center"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
                    <div class="container text-center">
                        <h4>No Hp</h4>
                        <p><?= $akun->no_hp_toko ?></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('Toko/editProfile') ?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Nama Toko</label>
                            <input name="nama_toko" value="<?= $akun->nama_toko ?>" minlength="1" maxlength="15" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nama Pemilik</label>
                            <input name="nama_pemilik_toko" value="<?= $akun->nama_pemilik_toko ?>" minlength="1" maxlength="15" class="form-control" required>
                            <input name="id_toko" value="<?= $akun->id_toko ?>" class="form-control" hidden required>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>No Hp</label>
                            <input name="no_hp_toko" value="<?= $akun->no_hp_toko ?>" minlength="1" maxlength="15"  class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Pilih Foto</label>
                            <input name="foto_toko" type="file" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modalAkun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('Toko/editAkun') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" value="<?= $user->username ?>" minlength="1" maxlength="15" class="form-control" required>
                        <input name="id_akun" value="<?= $user->id_akun ?>" class="form-control" hidden required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" value="<?= $user->password ?>" minlength="1" maxlength="15" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </form>
        </div>
    </div>
</div>