<div class="container mt-4 mb-5">
    <div class="row">
        <div class="col-md-8">
            <?php echo $this->session->flashdata('message'); ?>
            <form method="post" action="<?= base_url() ?>Daftar/addToko" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        Daftar Sebagai Admin Toko
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <h5 class="col-md-6">
                                Biodata Toko
                            </h5>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Pilih Pasar</label>
                            <select class="form-control" name="id_pasar">
                                <?php
                                foreach ($pasar as $p) {
                                ?>
                                    <option value="<?= $p->id_pasar ?>"><?= $p->nama_pasar ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label>Nama Toko</label>
                                <input class="form-control" minlength="1" maxlength="15" name="nama_toko" placeholder="Nama Toko" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nama Pemilik</label>
                                <input class="form-control" name="nama_pemilik_toko" minlength="1" maxlength="35" placeholder="Nama Pemilik" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>No Wa</label>
                                <input class="form-control" name="no_hp_toko" minlength="1" maxlength="15" placeholder="No Wa" required>
                            </div>
                            <div class="col-md-6">
                                <label>Foto Toko</label>
                                <div class="custom-file">
                                    <input type="file" name="foto_toko" class="form-control">
                                </div>
                            </div>
                        </div>
                        <h5>
                            Akun Admin Toko
                        </h5>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Username</label>
                                <input class="form-control" minlength="1" maxlength="15" name="username" placeholder="Username" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Password</label>
                                <input class="form-control" name="password" minlength="1" maxlength="15" placeholder="Password" required>
                            </div>
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
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Daftar Pasar
                </div>
                <ul class="list-group list-group-flush">
                    <?php
                    foreach ($pasar as $p) {
                    ?>
                        <li class="list-group-item"><b><?= $p->nama_pasar ?></b>
                            <p style="font-size: 12px;"><?= $p->alamat_pasar ?></p>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>