<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4"> <i class="fa fa-shopping-cart" aria-hidden="true"></i>Keranjang Belanja</h2>
            <p class="mb-5"> <i class="fa fa-shopping-cart" aria-hidden="true"></i>Daftar Pembelian Anda</p>
            <?php echo $this->session->flashdata('message'); ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Harga/Satuan</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Sub Total</th>
                        <th scope="col" style="text-align: center;">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $qty = 0;
                    foreach ($keranjang as $p) {
                        $this->db->where('id_satuan', $p->id_satuan);
                        $s = $this->db->get('tbl_satuan')->row();
                        $qty = $qty + $p->sub_total;
                    ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $p->nama_produk ?></td>
                            <td><img src="<?= base_url() ?>upload/<?= $p->foto_produk ?>" width="50px" height="50px"></td>
                            <td><?= $p->harga_produk ?>/<?= $s->nama_satuan ?></td>
                            <td>
                                <form method="POST" action="<?= base_url() ?>Keranjang/updateProduk">
                                    <input name="id_keranjang" hidden value="<?= $p->id_keranjang ?>">
                                    <input name="id_produk" hidden value="<?= $p->id_produk ?>">
                                    <input name="harga_produk" hidden value="<?= $p->harga_produk ?>">
                                    <input class="form-control mb-1" minlength="1" maxlength="2" style="width: 50px;" name="jumlah" value="<?= $p->jumlah ?>">
                                    <button class="btn btn-warning  btn-sm" type="submit">Ubah</button>
                                </form>
                            </td>
                            <td><?= $p->sub_total ?></td>
                            <td style=" text-align: center;">
                                <a class="btn btn-danger mb-1" href="<?= base_url('Keranjang/deleteProduk/' . $p->id_keranjang) ?>"><i class="fas fa-trash"></i> </a>
                            </td>
                        </tr>

                    <?php } ?>
                    <tr>
                        <td colspan="6"><b>Total Harga </b></td>
                        <td><b>Rp.<?= $qty ?></b></td>
                    </tr>
                    <tr>
                        <td colspan="7">

                            <button class="btn btn-success" data-toggle="modal" data-target="#modalBayar">Check Out</button>


                        </td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <div class="row">

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalBayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="post" action="<?= base_url('Keranjang/addTransaksi') ?> ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Total Bayar Rp.<?= number_format($qty) ?> </h5>
                </div>
                <div class="modal-body">
                    <div class="row col-md-12">
                        <input hidden name="total_bayar" value="<?= $qty ?>">
                        <p>
                            Biaya total pembelian barang tsb belum termasuk biaya ongkos kirimnya. Untuk biaya kirimnya silahkan transaksi langsung dengan pihak kurirnya
                        </p>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-success">Lanjut Checkout</button>

                </div>
            </form>
        </div>
    </div>
</div>