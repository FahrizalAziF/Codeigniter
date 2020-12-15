<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4"> <i class="fas fa-store" aria-hidden="true"></i> Kategori <?= $kategori->nama_kategori ?></h2>
            <hr>
            <div class="row">
                <?php
                if ($kategori->jml > 0) {
                ?>
                    <?php foreach ($produk as $p) { ?>
                        <div class="col-md-3 mb-1">
                            <div class="card ">
                                <img class="card-img-top bg-light " src="<?= base_url() ?>upload/<?= $p->foto_produk ?>" height="150px" alt="Card image cap">
                                <div class="card-body ">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <p class="card-text" style="font-size: 12px;">
                                                <small>Nama Produk</small><br>
                                                <?= $p->nama_produk ?>
                                            </p>
                                        </div>


                                        <div class="col-md-6">
                                            <?php
                                            if ($p->stok_produk > 0) {

                                            ?>
                                                <form method="post" action="<?= base_url() ?>Keranjang/addProduk">
                                                    <input name="id_produk" value="<?= $p->id_produk ?>" hidden>
                                                    <input name="harga_produk" value="<?= $p->harga_produk ?>" hidden>
                                                    <button class="btn btn-info" type="submit"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                                                </form>
                                            <?php } else { ?>
                                                <pt style="color: red;"><i>Stok Habis</i></pt>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <p class="card-text" style="font-size: 12px;">
                                                <small>Satuan</small><br>
                                                <?= $p->nama_satuan ?>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="card-text" style="font-size: 12px;">
                                                <small>Harga Produk</small><br>
                                                <?= $p->harga_produk ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                <?php } else { ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin_bottom_30_all">
                        <img src="<?= base_url() ?>assets/img/shop.png" style="width: 100px;height:100px;display: block; margin: auto;">
                        <h4 class="mt-3" style="text-align: center;">Produk belum tersedia</h4>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>