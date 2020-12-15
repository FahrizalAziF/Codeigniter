<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="row mb-5 ">
                <div class="container text-center">
                    <img src="<?= base_url() ?>assets/img/user-profile.png" style="width: 200px;height:200px;">
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
                <div class="col-md-4">
                    <div class="container text-center"> <i class="fa fa-user" aria-hidden="true"></i> </div>
                    <div class="container text-center">
                        <h4>Nama Lengkap</h4>
                        <p><?= $akun->nama_lengkap ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container text-center"> <i class="fa fa-road" aria-hidden="true"></i> </div>
                    <div class="container text-center">
                        <h4>Alamat</h4>
                        <p><?= $akun->alamat ?></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container text-center"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
                    <div class="container text-center">
                        <h4>No Hp</h4>
                        <p><?= $akun->no_hp ?></p>
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
            <form method="post" action="<?= base_url('Pembeli/editProfile') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input name="nama_lengkap" value="<?= $akun->nama_lengkap ?>" minlength="1" maxlength="35" class="form-control" required>
                        <input name="id_akun" value="<?= $akun->id_akun ?>" class="form-control" hidden required>
                    </div>
                    <div class="form-group">
                        <label>No Hp</label>
                        <input name="no_hp" minlength="1" maxlength="15"  value="<?= $akun->no_hp ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input name="alamat" style="height: 100px;" value="<?= $akun->alamat ?>" class="form-control" required>
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
            <form method="post" action="<?= base_url('Pembeli/editAkun') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" value="<?= $user->username ?>" minlength="1" maxlength="35" class="form-control" required>
                        <input name="id_akun" value="<?= $user->id_akun ?>" class="form-control" hidden required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" value="<?= $user->password ?>" minlength="1" maxlength="35" class="form-control" required>
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