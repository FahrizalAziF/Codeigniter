<!-- jQuery Library -->
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info row">
                <a href="<?= base_url('Pasar/bahan') ?>" class="btn btn-warning mb-1 mr-2" style="color:aliceblue"><i class="fa fa-file"></i> Lihat Bahan </a>
                <button class="btn btn-success mb-1" data-toggle="modal" data-target="#modalAdd"><i class="fa fa-file"></i> Tambah Data </button>
            </div>
        </div>
        <div class="row  col-md-12 mb-2">
            <input class="form-control col-md-4" type="date" id="sel_date" value="<?php echo date("Y-m-d"); ?>">
            <p class="col-md-8" style="text-align: right;">
                Tanggal Sekarang : <?= date("Y-m-d") ?>
            </p>
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
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="post" action="<?= base_url() ?>Pasar/addHarga" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="row col-md-12">
                            <div class="form-group col-md-6">
                                <label>Kategori</label>
                                <select class="form-control" name="id" id="id">

                                    <?php
                                    foreach ($kategori as $k) {
                                    ?>
                                        <option value="<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Bahan</label>

                                <select name="id_bahan" id="id_bahan" class=" form-control">
                                             
                                </select>
                                               
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="form-group col-md-6">
                                <label>Harga Produk</label>
                                <input class="form-control" name="harga_bahan" type="number" minlength="1" maxlength="11" placeholder="Harga Produk" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tgl Input</label>
                                <input class="form-control" name="tgl_input" type="date" value="<?= date("Y-m-d") ?>" placeholder="Harga Produk" required>
                            </div>
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
                                <input class="form-control" name="harga_bahan" minlength="1" maxlength="11" type="number" placeholder="Harga Produk" value="<?= $b->harga_bahan ?>" required>
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

<script type="text/javascript">
    $(document).ready(function() {
        getdata();
        $('#id').change(function() {

            getdata();
        });
    });

    function getdata() {
        var id = $("#id").val();
        $.ajax({
            url: "<?= base_url('Pasar/get_bahan'); ?>",
            method: "POST",
            data: {
                id: id
            },
            async: false,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<option  value=' + data[i].id_bahan + '>' + data[i].nama_bahan + '</option>';
                }
                $('#id_bahan').html(html);

            }
        })
    }
</script>
<script>
    $(document).ready(function() {
        bahanpokok();
        $("#sel_date").change(function() {
            // let a = $(this).val();
            // console.log(a);
            bahanpokok();
        });
    });

    function bahanpokok() {

        var date = $("#sel_date").val();
        $.ajax({
            url: "<?= base_url('Pasar/hargaList') ?>",
            data: "date=" + date,
            success: function(data) {
                // $("#datapokok tbody").html('<tr><td colspan="8" align="center">Tidak Ada Data</td></tr>')
                $("#datapokok tbody").html(data)
            }
        })
    }
</script>