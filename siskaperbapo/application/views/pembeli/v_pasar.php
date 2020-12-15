<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4"> <i class="fas fa-store" aria-hidden="true"></i> Pasar <?= $pasar->nama_pasar ?></h2>
            <p class="mb-5"> <i class="fas fa-store" aria-hidden="true"></i> Daftar Toko Pasar <?= $pasar->nama_pasar ?> </p>
            <hr>
            <div class="row">
                <?php
                if ($pasar->jml > 0) {
                ?>
                    <?php foreach ($toko as $p) { ?>
                        <div class="col-md-3 mb-2">
                            <div class="card">
                                <img class="card-img-top bg-light " src="<?= base_url() ?>upload/<?= $p->foto_toko ?>" height="150px" alt="Card image cap">
                                <div class="card-body row">
                                    <div class="col-md-6">
                                        <p class="card-text" style="font-size: 12px;">
                                            <small>Nama Pemilik</small><br>
                                            <?= $p->nama_pemilik_toko ?>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="card-text" style="font-size: 12px;">
                                            <small>Kunjungi</small><br>
                                            <a href="<?= base_url('Pasar/produk_toko/' . $p->id_toko) ?>"><i class="fas fa-eye" aria-hidden="true"></i> Lihat Toko</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-footer  bg-info" style="text-align: center; color:aliceblue">
                                    <?= $p->nama_toko ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                <?php } else { ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin_bottom_30_all">
                        <img src="<?= base_url() ?>assets/img/shop.png" style="width: 100px;height:100px;display: block; margin: auto;">
                        <h4 class="mt-3" style="text-align: center;">Toko belum tersedia</h4>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>