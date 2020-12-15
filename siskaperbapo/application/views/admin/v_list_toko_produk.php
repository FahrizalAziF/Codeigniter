<!-- jQuery Library -->

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info">
                <p> Daftar Produk <b>"<?= $toko['nama_toko'] ?>"</b></p>
                <p>Pasar<b>"<?= $toko['nama_pasar'] ?>"</b></p>
                <div style="text-align: right;">
                    <button class="btn btn-success mb-1" data-toggle="modal" data-target="#modalProduk"><i class="fa fa-file"></i> Tambah Produk </button>
                </div>
            </div>
            <div class="row col-md-4 mb-2">
                <select class="form-control" id="sel_kategori">
                    <?php
                    foreach ($kategori as $k) {
                    ?>
                        <option value="<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
                    <?php } ?>
                </select>
            </div>
            <?php echo $this->session->flashdata('message'); ?>
            <div class="table-responsive">
                <table class="table table-bordered" id='userTable'>
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Foto Produk</th>

                            <th scope="col" style="text-align: center;">Detail</th>
                        </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal Akun-->
<div class="modal fade" id="modalProduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="post" action="<?= base_url() ?>Toko/addProduk" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Admin "<?= $toko['nama_toko'] ?>"</h5>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label>Kategori Produk</label>
                            <select class="form-control" name="id_kategori">
                                <?php
                                foreach ($kategori as $k) {
                                ?>
                                    <option value="<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nama Produk</label>
                            <input class="form-control" name="nama_produk" minlength="1" maxlength="15" placeholder="Nama Produk" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Harga Produk</label>
                            <input class="form-control" name="harga_produk" minlength="1" maxlength="11" type="number" placeholder="Harga Produk" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Pilih Satuan</label>
                            <select class="form-control" name="id_satuan">
                                <?php
                                foreach ($satuan as $s) {
                                ?>
                                    <option value="<?= $s->id_satuan ?>"><?= $s->nama_satuan ?></option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Jumlah Stok</label>
                            <input class="form-control" name="stok_produk" minlength="1" maxlength="11" type="number" placeholder="Stok Produk" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Foto Produk</label>
                            <input class="form-control" name="foto_produk" type="file" placeholder="Stok Produk" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit" style="float: right;">
                        Tambah
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </form>
        </div>
    </div>
</div>
<?php
foreach ($produk as $p) {
?>
    <div class="modal fade" id="modalEdit<?= $p->id_produk ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="post" action="<?= base_url() ?>Toko/editProduk" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Admin "<?= $toko['nama_toko'] ?>"</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label>Kategori Produk</label>
                                <select class="form-control" name="id_kategori">
                                    <?php
                                    foreach ($kategori as $k) {
                                        $selected = ($k->id_kategori == $p->id_kategori) ? 'selected' : '';
                                    ?>
                                        <option value="<?= $k->id_kategori ?>" <?= $selected; ?>><?= $k->nama_kategori ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nama Produk</label>
                                <input class="form-control" name="nama_produk" minlength="1" maxlength="15" placeholder="Nama Produk" value="<?= $p->nama_produk ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Harga Produk</label>
                                <input class="form-control" name="harga_produk" placeholder="Harga Produk" type="number" minlength="1" maxlength="11" value="<?= $p->harga_produk ?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Jumlah Stok</label>
                                <input class="form-control" name="stok_produk" placeholder="Stok Produk" minlength="1" maxlength="11" type="number" value="<?= $p->stok_produk ?>" required>
                            </div>

                        </div>


                        <div class="form-group">
                            <label>Foto Produk </label>
                            <input class="form-control" name="foto_produk" required type="file">
                        </div>
                        <input name="id_produk" hidden value="<?= $p->id_produk ?>">
                        <input name="id_toko" hidden value="<?= $p->id_toko ?>">

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit" style="float: right;">
                            Simpan
                        </button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<script type="text/javascript">
    $(document).ready(function() {
        var userDataTable = $('#userTable').DataTable({
            //   'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            //'searching': false, // Remove default Search Control
            'ajax': {
                'url': '<?= base_url() ?>Toko/produkList',
                'data': function(data) {
                    data.searchKategori = $('#sel_kategori').val();
                    // data.searchBulan = $('#sel_bulan').val();
                    console.log(data);
                }

            },
            'columns': [{
                    data: 'id_produk'
                },
                {
                    data: 'nama_produk'
                },
                {
                    data: 'harga_produk'
                },
                {
                    data: 'nama_satuan'
                },
                {
                    data: 'stok_produk'
                },
                {
                    data: 'foto_produk'
                },
                {
                    data: 'detail'
                }
            ]
        });

        $('#sel_kategori').change(function() {
            userDataTable.draw();
        });
        $('#searchName').keyup(function() {
            userDataTable.draw();
        });
    });
</script>