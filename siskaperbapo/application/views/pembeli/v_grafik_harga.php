<!-- jQuery Library -->

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info row">
                <div class="col-md-3">
                    <label>Tanggal : </label>
                    <input class="form-control mr-2" type="date" id="sel_date" value="<?php echo date("Y-m-d"); ?>">
                </div>
                <div class="col-md-3">
                    <label>Kategori :</label>
                    <select class="form-control" name="id_kategori" id="id">

                        <?php
                        foreach ($kategori as $k) {
                        ?>
                            <option value="<?= $k->id_kategori ?>"><?= $k->nama_kategori ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Komoditas :</label>
                    <select name="sel_bahan" id="sel_bahan" class="form-control"></select>
                </div>
            </div>
        </div>
        <div class="row  col-md-12 mb-2">

        </div>
        <?php echo $this->session->flashdata('message'); ?>
        <div class="card text-center " style="width: 100%;">
            <div class="card-header">
                Grafik
            </div>

            <div class="card-body">
                <div id="container"></div>
            </div>
            <div class="card-footer text-muted">
                2 days ago
            </div>
        </div>
    </div>
</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

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
                $('#sel_bahan').html(html);

            }
        })
    }
</script>

<script type="text/javascript">
    // globally available
    $(document).ready(function() {
        grafik();
        $('#sel_date').change(function() {

            grafik();
        });
        $("#id").change(function() {
            // let a = $(this).val();
            // console.log(a);
            grafik();
        });
        $("#sel_bahan").change(function() {
            // let a = $(this).val();
            // console.log(a);
            grafik();
        });

    });

    function grafik() {
        var date = $("#sel_date").val();
        // var kategori = $("#id").val();
        var bahan = $("#sel_bahan").val();
        var chart1;
        $.ajax({
            url: "<?= base_url('Pasar/grafikHarga') ?>",
            data: {
                date: date,
                // kategori: kategori,
                bahan: bahan,
            },
            success: function(response) {
                let arrSales = [];
                arrSales = JSON.parse(response);
                var options = {
                    chart: {
                        renderTo: 'container',
                        type: 'spline'
                    },
                    title: {
                        text: 'Harga Bahan Pasar',
                        x: -20 //center
                    },
                    // subtitle: {
                    //     text: 'Source: WorldClimate.com',
                    //     x: -20
                    // },
                    yAxis: {
                        title: {
                            text: 'Harga Bahan'
                        },
                        plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#808080'
                        }]
                    },
                    tooltip: {
                        valueSuffix: ''
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle',
                        borderWidth: 0
                    }
                };

                options.series = arrSales.series;
                options.xAxis = arrSales.xAxis;
                var chart = new Highcharts.Chart(options);

            }
        })


    }
</script>