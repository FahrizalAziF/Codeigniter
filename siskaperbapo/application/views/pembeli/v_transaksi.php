<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4"> <i class="fa fa-credit-card" aria-hidden="true"></i> Transaksi Belanja</h2>
            <p class="mb-5"> <i class="fa fa-credit-card" aria-hidden="true"></i> Daftar transaksi Anda</p>
            <?php echo $this->session->flashdata('message'); ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal Checkout</th>
                        <th scope="col">Total Bayar</th>
                        <th scope="col">Status</th>
                        <th scope="col">Detail</th>
                        <th scope="col" style="text-align: center;"><i class="fas fa-question-circle"></i> Bantuan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $qty = 0;
                    foreach ($transaksi as $p) {
                    ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $p->tgl_checkout ?></td>
                            <td><?= $p->total_bayar ?></td>
                            <td><?= $p->nama_status ?>
                                <?php
                                if ($p->id_status == "2") {
                                ?>
                                    <br>
                                    <a class="mb-1" style="font-size: 12px;" target="_blank" href="<?= base_url('Admin/hubungiKurir/' . $p->no_hp_kurir) ?>">( Hubungi Kurir ) </a>
                                <?php } ?>
                            </td>
                            <td><button class="btn btn-info mb-1" data-toggle="modal" data-target="#modalProduk<?= $p->id_transaksi ?>"><i class="fa fa-shopping-bag"></i> Produk </button></td>
                            <td style=" text-align: center;">
                                <a class="mb-1" target="_blank" href="<?= base_url('Keranjang/hubungiAdmin') ?>">Hubungi Admin</a>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
            <hr>
            <div class="row">

            </div>
        </div>
    </div>
</div>
<?php
foreach ($transaksi as $p) {
    $this->db->join('tbl_produk', 'tbl_produk.id_produk=tbl_keranjang.id_produk');
    $this->db->where('id_trans', $p->id_transaksi);
    $produk = $this->db->get('tbl_keranjang')->result();
?>
    <div class="modal fade" id="modalProduk<?= $p->id_transaksi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($produk as $pr) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $pr->nama_produk ?></td>
                                    <td><?= $pr->harga_produk ?></td>
                                    <td><?= $pr->jumlah ?></td>
                                    <td><?= $pr->sub_total ?></td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>