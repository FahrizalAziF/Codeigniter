<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4"> <i class="fa fa-history" aria-hidden="true"></i> History Transaksi</h2>
            <div class="col-md-12 row">
                <div class="card text-white bg-info mb-3 mr-3" style="max-width: 18rem;">
                    <div class="card-header">Belum Diantar</div>
                    <div class="card-body">
                        <h5 class="card-title">Transaksi Belum Diantar</h5>
                        <a style="text-align: right; color:white" href="<?= base_url() ?>Admin/transaksi" class="btn btn-sm btn-warning">Lihat</a>
                    </div>
                </div>
                <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                    <div class="card-header">History</div>
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Transaksi</h5>
                        <p class="card-text"><?= $jumlah->jumlah ?></p>
                    </div>
                </div>
            </div>
            <div class="row col-md-4 mb-2">
                <select class="form-control" id="sel_status">
                    <?php
                    foreach ($status as $k) {
                    ?>
                        <option value="<?= $k->id_status ?>"><?= $k->nama_status ?></option>
                    <?php } ?>
                </select>
            </div>
            <?php echo $this->session->flashdata('message'); ?>
            <table class="table table-bordered" id='userTable'>
                <thead>
                    <tr>
                        <th width="5%" scope="col">No</th>
                        <th scope="col">Username</th>
                        <th width="5%" scope="col">Tanggal Checkout</th>
                        <th width="5%" scope="col">Total Bayar</th>
                        <th scope="col">Status</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Kurir</th>
                        <th scope="col" style="text-align: center;"><i class="fas fa-question-circle"></i> Bantuan</th>
                    </tr>
                </thead>
                <tbody>

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
    <div class="modal fade" id="modalStatus<?= $p->id_transaksi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <form method="post" action="<?= base_url() ?>Admin/editStatus">
                    <div class="modal-header">
                        <h5>Ubah Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label>Ubah Status</label>
                        <select class="form-control" name="status">
                            <?php foreach ($status as $k) { ?>
                                <option value="<?= $k->id_status ?>"><?= $k->nama_status ?></option>
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

<script type="text/javascript">
    $(document).ready(function() {
        var userDataTable = $('#userTable').DataTable({
            'bDestroy': true,
            'processing': true,
            'serverSide': true,
            'serverMethod': 'post',
            "searching": true,
            'ajax': {
                'url': '<?= base_url() ?>Admin/historyList',
                'data': function(data) {
                    data.searchStatus = $('#sel_status').val();
                    // data.searchBulan = $('#sel_bulan').val();
                    console.log(data);
                }

            },
            'columns': [{
                    data: 'no'
                },
                {
                    data: 'username'
                },
                {
                    data: 'tgl_checkout'
                },
                {
                    data: 'total_bayar'
                },
                {
                    data: 'nama_status'
                },
                {
                    data: 'datail'
                },
                {
                    data: 'nama_kurir'
                },
                {
                    data: 'bantuan'
                }
            ]
        });

        $('#sel_status').change(function() {
            userDataTable.draw();
        });
        $('#searchName').keyup(function() {
            userDataTable.draw();
        });
    });
</script>