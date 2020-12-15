<!-- jQuery Library -->

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="<?= base_url('Pasar/display_harga') ?>">
                <div class="alert alert-info row">
                    <div class="col-md-3">
                        <label>Tanggal : </label>
                        <input class="form-control mr-2" name="tgl_input" type="date" id="sel_date"><br>
                        <?= 'Tanggal Input : ' . $date ?>
                    </div>
                    <div class="col-md-3">
                        <label>Pasar :</label>
                        <select name="id_pasar" id="sel_pasar" class="form-control ">

                            <?php
                            foreach ($pasar as $p) {
                            ?>
                                <option value="<?= $p->id_pasar ?>">
                                    <?= $p->nama_pasar ?>
                                </option>
                            <?php } ?>
                        </select><br>
                        <?php
                        $this->db->where('id_pasar', $id_pasar);
                        $qry = $this->db->get('tbl_pasar')->row();
                        echo 'Nama Pasar : '  . $qry->nama_pasar ?>
                    </div>
                    <div class="col-md-3">
                        <label>Tampilkan : </label><br>
                        <button class="btn btn-success" type="submit" onclick="tampilkan()">
                            Tampilkan
                        </button>
                    </div>

                </div>
            </form>
        </div>


        <div class="col-md-12">

            <div class="owl-carousel owl-theme">
                <?php
                if ($bahan) {
                ?>
                    <?php
                    foreach ($bahan as $k) {
                    ?>
                        <div class="card ">
                            <div class="card-body bg-info " style="padding-top:150px;padding-bottom:150px;">
                                <div class=" container align-self-center ">

                                    <h1 class="card-text" style="text-align: center;color:white "><b><?= $k->nama_bahan ?></b></h1>
                                    <h3 class="card-text" style="text-align: center;color:white "><b><?= $k->nama_kategori ?></b></h3>
                                    <h3 class="card-text" style="text-align: center;color:white "><b>Rp. <?= number_format($k->harga_bahan) . '/' . $k->nama_satuan ?></b></h3>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php  } else { ?>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin_bottom_30_all">
                <img src="<?= base_url() ?>assets/img/shop.png" style="width: 100px;height:100px;display: block; margin: auto;">
                <h4 class="mt-3" style="text-align: center;">Data Tidak Ada</h4>
            </div>
        <?php } ?>
        </div>
    </div>
</div>
<footer class=" page-footer font-small teal pt-4 mt-5" style="background: gainsboro;">

    <!-- Footer Text -->
    <div class="container">

        <div class="container-fluid text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-6 mt-md-0 mt-3">

                    <!-- Content -->
                    <h5 class="text-uppercase font-weight-bold">E-Pasar Pamekasan</h5>
                    <p>Sistem informasi ketersediaan dan perkembangan harga bahan pokok untuk daerah madura, selain itu di <b>E-Pasar Pamekasan </b>kita juga bisa membeli produk-produk pasar.</p>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none pb-3">

                <!-- Grid column -->
                <div class="col-md-6 mb-md-0 mb-3">

                    <!-- Content -->
                    <h5 class="text-uppercase font-weight-bold">Informasi</h5>
                    <p>Alamat :<br>
                        Jln. Joko Tole NO.199 Telp.0324-321497 FAX. 321497<br>
                        PAMEKASAN 69322
                    </p>


                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
    </div>
    <!-- Footer Text -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3" style="background-color: white;">© 2020 Copyright:
        Pemerintah Kabupaten Pamekasan
    </div>

    <!-- Copyright -->

</footer>
<!-- section -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script>
    window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')
</script>

<script src="<?= base_url() ?>assets/js/vendor/popper.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery-3.3.1.min.js"></script>


<!-- Datatable JS -->
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/js/vendor.bundle.base.js'); ?>"></script>
<script src="<?= base_url('assets/js/vendor.bundle.addons.js'); ?>"></script>
<script src="<?= base_url() ?>assets/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/owl.carousel.min.js"></script>


<script>
    $('.carousel').carousel({
        interval: 2000
    })
</script>
<script>
    $('.owl-carousel').owlCarousel({
        autoplay: true,
        margin: 10,
        autoplayHoverPause: true,
        items: 3,
        nav: true,
        dots: true,
        loop: true,
        responsive: {
            0: {
                items: 1
            }
        }
    });
</script>


</body>

</html>
<!-- 
<script>
    $(document).ready(function() {
        displayharga();
        $("#sel_date").change(function() {
            // let a = $(this).val();
            // console.log(a);
            displayharga();
        });
        $("#sel_pasar").change(function() {
            // let a = $(this).val();
            // console.log(a);
            displayharga();
        });
    });

    function displayharga() {
        var date = $("#sel_date").val();
        var pasar = $("#sel_pasar").val();
        $.ajax({
            url: "<?= base_url('Pasar/displayHarga') ?>",
            data: {
                date: date,
                pasar: pasar
            },
            success: function(data) {
                // $("#datapokok tbody").html('<tr><td colspan="8" align="center">Tidak Ada Data</td></tr>')
                $(".display").html(data)
            }
        })
    }
</script> 