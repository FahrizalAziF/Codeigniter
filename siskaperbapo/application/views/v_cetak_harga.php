<title>Admin Toko Pupuk</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<!-- site icons -->
<link rel="icon" href="<?= base_url() ?>assets/customer/images/fevicon/fevicon.png" type="image/gif" />
<link href="<?= base_url() ?>assets/css/style_cetak.css" rel="stylesheet">
<h4 style="text-align: center;">Laporan Harian Harga Bahan Pasar <?= $pasar->nama_pasar ?></h4>
<p style="text-align: center;">Tanggal <?= $tgl_input ?></p><br>
<div class="">
    <table class="table table-bordered">
        <thead style="font-size: 12px;">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Bahan</th>
                <th scope="col">Satuan</th>
                <th scope="col">Harga Kemarin</th>
                <th scope="col">Harga Sekarang</th>
                <th scope="col">Perubahan (Rp)</th>
                <th scope="col">Perubahan (%)</th>
            </tr>
        </thead>
        <tbody style="font-size: 12px;">
            <?php
            $i = 1;
            $date = $tgl_input;
            $id_pasar = $id_pasar;
            $tgl = date('Y-m-d', strtotime('-1 days', strtotime($date)));
            $kategori = $this->db->get('tbl_kategori')->result();
            foreach ($kategori as $k) { ?>
                <tr>
                    <th scope="row"><?= $i++ ?></th>
                    <td colspan="7"><?= $k->nama_kategori ?></td>
                    <?php
                    //-----------------------------------------------------------------------------

                    $this->db->join('tbl_satuan', 'tbl_satuan.id_satuan=tbl_bahan_pokok.id_satuan');
                    $this->db->join('tbl_bahan', 'tbl_bahan.id_bahan=tbl_bahan_pokok.id_bahan');
                    $this->db->where('tbl_bahan_pokok.id_kategori', $k->id_kategori);
                    $this->db->where('tbl_bahan_pokok.id_pasar', $id_pasar);
                    $this->db->where('tgl_input', $date);
                    $bahan = $this->db->get('tbl_bahan_pokok')->result();
                    foreach ($bahan as $b) {
                        $this->db->where('id_kategori', $k->id_kategori);
                        $this->db->where('id_pasar', $id_pasar);
                        $this->db->where('tgl_input', $tgl);
                        $this->db->where('id_bahan', $b->id_bahan);
                        $prev = $this->db->get('tbl_bahan_pokok')->row_array();
                    ?>
                <tr>
                    <td></td>
                    <td>-<?= $b->nama_bahan ?></td>
                    <td><?= $b->nama_satuan ?></td>
                    <td>Rp. <?= number_format($prev['harga_bahan'], 0, ',', '.') ?></td>
                    <td>Rp. <?= number_format($b->harga_bahan, 0, ',', '.') ?></td>
                    <td>Rp. <?= number_format($b->harga_bahan - $prev['harga_bahan'], 0, ',', '.') ?></td>
                    <td <?php
                        if ($prev['harga_bahan'] < $b->harga_bahan) {
                        ?> style="color:red" <?php
                                            } else if ($prev['harga_bahan'] > $b->harga_bahan) {
                                                ?> style="color:green<?php } ?>"><b><?php
                                                                                    $jml = ($b->harga_bahan - $prev['harga_bahan']);
                                                                                    if ($prev['harga_bahan'] > 0) {
                                                                                        $q = ($jml / $prev['harga_bahan']) * 100;
                                                                                        echo round($q);
                                                                                    } else {
                                                                                        echo "100";
                                                                                    }

                                                                                    ?>%</b></td>


                </tr>
            <?php } ?>
            </tr>
        <?php } ?>

        </tbody>
    </table>
</div>
<script>
    window.print();
</script>