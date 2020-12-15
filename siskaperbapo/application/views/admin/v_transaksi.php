<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4"> <i class="fa fa-credit-card" aria-hidden="true"></i> Transaksi Belanja Pembeli</h2>
            <div class="col-md-12 row">
                <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                    <div class="card-header">Belum Diantar</div>
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Transaksi</h5>
                        <p class="card-text"><?= $jumlah->jumlah ?></p>
                    </div>
                </div>
                <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-header">History</div>
                    <div class="card-body">
                        <h5 class="card-title">History Transaksi</h5>
                        <div class="row col-md-12">
                            <a style="text-align: right;" href="<?= base_url() ?>Admin/history" class="btn btn-sm btn-info">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
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
                            <td><?= $p->nama_status ?></td>
                            <td><button class="btn btn-info mb-1" data-toggle="modal" data-target="#modalProduk<?= $p->id_transaksi ?>"><i class="fa fa-shopping-bag"></i> Produk </button>
                                <a class="btn btn-warning mb-1" style="color: white;" data-toggle="modal" data-target="#modalKurir<?= $p->id_transaksi ?>"><i class="fa fa-user"></i> Kirim Montir </a>
                            </td>
                            <td style=" text-align: center;">
                                <a class="mb-1" target="_blank" href="<?= base_url('Admin/hubungiPembeli/' . $p->no_hp) ?>">Hubungi Pembeli</a>
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
    <div class="modal fade bd-example-modal-lg" id="modalProduk<?= $p->id_transaksi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered" style="font-size: 12px;">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Sub Total</th>
                                <th scope="col">Nama Toko</th>
                                <th scope="col">Hubungi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($produk as $pr) {
                                $this->db->where('id_toko', $pr->id_toko);
                                $toko = $this->db->get('tbl_toko')->row();
                            ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $pr->nama_produk ?></td>
                                    <td><?= $pr->harga_produk ?></td>
                                    <td><?= $pr->jumlah ?></td>
                                    <td><?= $pr->sub_total ?></td>
                                    <td><?= $toko->nama_toko ?></td>
                                    <td><a href="<?= base_url('Admin/hubungiToko/' . $toko->no_hp_toko) ?>" target="_blank">Hubungi Toko</a>
                                    </td>
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
<?php
foreach ($transaksi as $p) {
?>
    <div class="modal fade" id="modalKurir<?= $p->id_transaksi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <form method="post" action="<?= base_url() ?>Admin/kirimKurir">
                    <div class="modal-header">
                        <h5>Kirim Kurir</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label>Pilih Kurir</label>
                        <select class="form-control" name="id_kurir">
                            <?php foreach ($kurir as $k) { ?>
                                <option value="<?= $k->id_kurir ?>"><?= $k->nama_kurir ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <input value="<?= $p->id_transaksi ?>" name="id_transaksi" hidden>
                        <button class="btn btn-info" type="submit">Kirim</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>