<!-- jQuery Library -->

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <form action="<?= base_url('Pasar/cetakHarga') ?>" method="post" target="_blank">

                <div class="alert alert-info row">
                    <input class="form-control col-md-4 mr-2" type="date" name="tgl_input" id="sel_date" value="<?php echo date("Y-m-d"); ?>">
                    <select name="id_pasar" id="sel_pasar" class="form-control col-md-4 mr-2">

                        <?php
                        foreach ($pasar as $p) {
                        ?>
                            <option value="<?= $p->id_pasar ?>">
                                <?= $p->nama_pasar ?>
                            </option>
                        <?php } ?>
                    </select>
                    <button class="btn btn-success" type="submit">
                        Cetak
                    </button>
                </div>

            </form>
        </div>
        <div class="row  col-md-12 mb-2">

        </div>
        <?php echo $this->session->flashdata('message'); ?>
        <div class="table-responsive">
            <table class="table table-bordered" id='datapokok'>
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Bahan</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Harga Kemarin</th>
                        <th scope="col">Harga Sekarang</th>
                        <th scope="col">Perubahan (Rp)</th>
                        <th scope="col">Perubahan (%)</th>
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
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="post" action="<?= base_url() ?>Pasar/addHarga" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data</h5>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label>Bahan</label>
                            <select class="form-control" name="id_bahan">
                                <?php
                                foreach ($bahan as $k) {
                                ?>
                                    <option value="<?= $k->id_bahan ?>"><?= $k->nama_bahan ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Harga Produk</label>
                            <input class="form-control" name="harga_bahan" placeholder="Harga Produk" required>
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
foreach ($pokok as $b) {
?>
    <div class="modal fade" id="modalEdit<?= $b->id_bahan_pokok ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="post" action="<?= base_url() ?>Pasar/addHarga" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label>Bahan</label>
                                <select class="form-control" name="id_bahan">
                                    <?php
                                    foreach ($bahan as $k) {
                                        $selected = ($k->id_bahan == $b->id_bahan) ? 'selected' : '';
                                    ?>
                                        <option value="<?= $k->id_bahan ?>" <?= $selected; ?>><?= $k->nama_bahan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Harga Produk</label>
                                <input class="form-control" name="harga_bahan" placeholder="Harga Produk" value="<?= $b->harga_bahan ?>" required>
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
<?php } ?>
<script>
    $(document).ready(function() {
        bahanpokok();
        $("#sel_date").change(function() {
            // let a = $(this).val();
            // console.log(a);
            bahanpokok();
        });
        $("#sel_pasar").change(function() {
            // let a = $(this).val();
            // console.log(a);
            bahanpokok();
        });
    });

    function bahanpokok() {
        var date = $("#sel_date").val();
        var pasar = $("#sel_pasar").val();
        $.ajax({
            url: "<?= base_url('Pasar/hargaPasar') ?>",
            data: {
                date: date,
                pasar: pasar
            },
            success: function(data) {
                // $("#datapokok tbody").html('<tr><td colspan="8" align="center">Tidak Ada Data</td></tr>')
                $("#datapokok tbody").html(data)
            }
        })
    }
</script>