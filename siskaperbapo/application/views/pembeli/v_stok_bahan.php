<!-- jQuery Library -->

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info row">
                <input class="form-control col-md-4 mr-2" type="date" id="sel_date" value="<?php echo date("Y-m-d"); ?>">
                <select name="id_pasar" id="sel_pasar" class="form-control col-md-4">

                    <?php
                    foreach ($pasar as $p) {
                    ?>
                        <option value="<?= $p->id_pasar ?>">
                            <?= $p->nama_pasar ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="row  col-md-12 mb-2">

        </div>
        <?php echo $this->session->flashdata('message'); ?>
        <div class="table-responsive">
            <table class="table table-bordered" id='datapokok'>
                <thead>
                    <tr>
                        <th scope="col" style="width: 5%;">No</th>
                        <th scope="col">Nama Bahan</th>
                        <th scope="col">Jumlah Stok</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
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
            url: "<?= base_url('Stok/stokList') ?>",
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