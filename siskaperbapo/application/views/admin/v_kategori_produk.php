<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <h2> Kategori Produk</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col" style="width: 25%;">Kategori Produk</th>
                        <th scope="col" style="text-align: center;">Foto</th>
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
                            <td><?= $p->nama_kategori ?></td>
                            <td><img src="<?= base_url() ?>upload/<?= $p->foto_kategori ?>" width="50px" height="50px"></td>
                            <td style="text-align: center;">
                                <button class="btn btn-info mb-1" data-toggle="modal" data-target="#modalEdit<?= $p->id_kategori ?>"><i class="fa fa-pencil-square-o"></i> </button>
                                <a class=" btn btn-danger mb-1" href="<?= base_url('Admin/hapusKategori/' . $p->id_kategori) ?>"><i class="fa fa-trash"></i> </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <?php echo $this->session->flashdata('message'); ?>
            <form method="post" action="<?= base_url() ?>Admin/tambahKategori" enctype="multipart/form-data">
                <div class="card">

                    <div class="card-header">
                        Tambah Kategori
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input class="form-control" name="nama_kategori" minlength="1" maxlength="15" placeholder="Nama Kategori" required>
                        </div>
                        <div class="form-group">
                            <label>Foto Kategori</label>
                            <input class="form-control" type="file" name="foto_kategori" placeholder="Nama Kategori" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success" type="submit" style="float: right;">
                            Tambah
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-8">
            <h2> Jenis Satuan</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col" style="width: 25%;">Kategori Satuan</th>
                        <th scope="col" style="text-align: center;">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($satuan as $p) {
                    ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $p->nama_satuan ?></td>
                            <td style="text-align: center;">
                                <button class="btn btn-info mb-1" data-toggle="modal" data-target="#satuanEdit<?= $p->id_satuan ?>"><i class="fa fa-pencil-square-o"></i> </button>
                                <a class=" btn btn-danger mb-1" href="<?= base_url('Admin/hapusSatuan/' . $p->id_satuan) ?>"><i class="fa fa-trash"></i> </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <?php echo $this->session->flashdata('message2'); ?>
            <form method="post" action="<?= base_url() ?>Admin/tambahSatuan" enctype="multipart/form-data">
                <div class="card">

                    <div class="card-header">
                        Tambah Stauan
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Satuan</label>
                            <input class="form-control" name="nama_satuan" minlength="1" maxlength="15 placeholder=" Nama Kategori" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success" type="submit" style="float: right;">
                            Tambah
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Akun-->
<?php
foreach ($kategori as $p) {
?>
    <div class="modal fade" id="modalEdit<?= $p->id_kategori ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">


            <div class="modal-content">
                <form method="post" action="<?= base_url() ?>Admin/editKategori">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Kategori</h5>
                    </div>
                    <div class="modal-body">
                        <label>Nama Kategori</label>
                        <input class="form-control" name="nama_kategori" minlength="1" maxlength="15 placeholder=" Nama Kategori" value="<?= $p->nama_kategori ?>" required>
                        <input class="form-control" name="id_kategori" value="<?= $p->id_kategori ?>" hidden required>
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
foreach ($satuan as $p) {
?>
    <div class="modal fade" id="satuanEdit<?= $p->id_satuan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">


            <div class="modal-content">
                <form method="post" action="<?= base_url() ?>Admin/editSatuan">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Satuan</h5>
                    </div>
                    <div class="modal-body">
                        <label>Nama Satuan</label>
                        <input class="form-control" name="nama_satuan" minlength="1" maxlength="15 placeholder=" Nama Kategori" value="<?= $p->nama_satuan ?>" required>
                        <input class="form-control" name="id_satuan" value="<?= $p->id_satuan ?>" hidden required>
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