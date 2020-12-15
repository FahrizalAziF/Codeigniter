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
                        Jl. Jokotole No.199 Telp. (0324) 321497 Fax. 321497<br>
                        Kabupaten Pamekasan 69322
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
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });
</script>

</body>

</html>