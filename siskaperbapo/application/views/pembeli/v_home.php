   <div class="jumbotron bg-top">


       <div class="container mt-4">
           <div style="position:fixed;right:20px;bottom:20px;">
               <a href="https://api.whatsapp.com/send?phone=+6281934006122&text=Halo" target="_blank">
                   <button class="btn" style="background:#32C03C;vertical-align:center;height:36px;border-radius:5px;color:white">
                       <img src="https://web.whatsapp.com/img/favicon/1x/favicon.png"> Whatsapp Kami</button></a>
           </div>
           <div class="row">
               <div id="carouselExampleIndicators" class="carousel slide col-md-6" data-ride="carousel">
                   <ol class="carousel-indicators">
                       <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                       <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                       <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                   </ol>
                   <div class="carousel-inner">
                       <div class="carousel-item active">
                           <img class="d-block " src="<?= base_url() ?>assets/img/bg1.jpg" style="border-radius: 10px;" alt="First slide">
                       </div>
                       <div class="carousel-item ">
                           <img class="d-block " src="<?= base_url() ?>assets/img/bg2.jpg" style="border-radius: 10px;" alt="Second slide">
                       </div>
                       <div class="carousel-item">
                           <img class="d-block " src="<?= base_url() ?>assets/img/bg3.jpeg" style="border-radius: 10px;" alt="Third slide">
                       </div>
                   </div>
                   <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                       <span class="sr-only">Previous</span>
                   </a>
                   <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                       <span class="carousel-control-next-icon" aria-hidden="true"></span>
                       <span class="sr-only">Next</span>
                   </a>
               </div>
               <div class="col-md-6">
                   <div class="card mb-1">
                       <div class="card-header" style="background-color: #427F9C; color:whitesmoke">
                           Apa itu E-Pasar Pamekasan?
                       </div>
                       <div class="card-body">
                           <h5 class="card-title">E-Pasar Pamekasan</h5>
                           <p class="card-text">Sistem informasi ketersediaan dan perkembangan harga bahan pokok untuk daerah madura, selain itu di <b>E-Pasar Pamekasan </b>kita juga bisa membeli produk-produk pasar.</p>
                       </div>
                   </div>
                   <p><b>Beberapa Pasar Kami :</b></p>
                   <div class="owl-carousel owl-theme">
                       <?php
                        foreach ($pasar as $k) {
                        ?>
                           <div class="" style="padding: 15px;display: block; margin: auto;">
                               <div class="full text_align_center ">

                                   <div class="center mb-2">
                                       <div class="icon"> <img src="<?= base_url() ?>assets/img/shop.png" alt="#" /> </div>
                                   </div>

                                   <a href="<?= base_url('Pasar/toko_pasar/' . $k->id_pasar) ?>">
                                       <p class="theme_color" style="text-align: center;font-size: 12px;color:black;"><?= $k->nama_pasar ?>
                                       </p>
                                   </a>
                                   <!-- <p>Menyediakan produk hasil usaha masyarakat</p> -->
                               </div>
                           </div>
                       <?php } ?>

                   </div>
               </div>
           </div>
       </div>
   </div>
   <section class="mt-5 mb-5">
       <div class="container" style="background-color: #f1f2f6; padding:1px ;border-radius: 10px;">
           <div class="mt-5 ml-5 ">
               <h2 style="color: black; font-size:25px">
                   Kategori Produk
               </h2>
               <p style="color: #718093;">
                   Cari produk dengan memilih kategori dibawah
               </p>
           </div>
           <hr class="mr-4 ml-4">
           <div class="owl-carousel owl-theme">
               <?php
                foreach ($kategori as $k) {
                ?>

                   <div class=" ">
                       <img class="" src="<?= base_url() ?>upload/<?= $k->foto_kategori ?>" style="border-radius: 150px; width:150px;height:150px; display: block; margin: auto;" alt="Card image cap">
                       <div class="mt-2" style="font-size: 18px;">

                           <p class="" style="text-align: center;"><b>( <a href="<?= base_url('Kategori/kategori_produk/' . $k->id_kategori) ?>" style="color:#718093"><?= $k->nama_kategori ?></a> )</b></p>
                       </div>
                   </div>
               <?php } ?>

           </div>
       </div>
   </section>
   <div class="jumbotron" style="background-color: #427F9C;">
       <div class="container">
           <div class="card-body row ">
               <div class="col-md-6">
                   <p style="padding: 10px; font-size:20px; color:whitesmoke">
                       E-Pasar Pamekasan dapat juga di akses melalui android anda, sehingga pembelian produk akan terasa lebih mudah
                   </p>
                   <a class="btn btn-info" data-target="#download" data-toggle="modal" data-dismiss="modal" style="padding-right: 10px;padding-left: 10px; color:white;">
                       Download Sekarang !
                   </a>
               </div>
               <div class="col-md-6" style="width: 50%;">
                   <img src="<?= base_url() ?>assets/img/img_app.png" style="width: 75%;height:75%;display: block; margin: auto;">
               </div>
           </div>
       </div>
   </div>
   <section class="mt-5  produk">
       <div class="container">
           <h2 style="text-align: center;"> Produk </h2>
           <p style="text-align: center;    color: #718093;">
               Cari produk dan masukkan ke dalam keranjang
           </p>

           <?php
            foreach ($kategori as $k) {
            ?>
               <div>
                   <hr>
                   <h3> <?= $k->nama_kategori ?></h3>
                   <hr>
               </div>
               <div class="col-md-12">

                   <div class="row">
                       <?php
                        $this->db->join('tbl_satuan', 'tbl_satuan.id_satuan=tbl_produk.id_satuan');
                        $this->db->where('id_kategori', $k->id_kategori);
                        $this->db->limit('8');
                        $this->db->group_by('id_produk');
                        $this->db->order_by('rand()');
                        $produk = $this->db->get('tbl_produk')->result();
                        if ($produk) {

                            $this->db->select('COUNT(id_produk) as total');
                            $this->db->where('id_kategori', $k->id_kategori);
                            $tes = $this->db->get('tbl_produk')->row_array();
                            foreach ($produk as $p) {
                        ?>
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

                           <?php
                            if ($tes['total'] > 6) { ?>
                               <a class="btn btn-warning" style="display: block; margin: auto;color:white;" href="<?= base_url("Kategori/kategori_produk/$k->id_kategori") ?>">Lihat Lebih >></a>
                           <?php }
                        } else { ?>
                           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin_bottom_30_all">
                               <img src="<?= base_url() ?>assets/img/shop.png" style="width: 100px;height:100px;display: block; margin: auto;">
                               <h4 class="mt-3" style="text-align: center;">Produk tidak ditemukan</h4>
                           </div>
                       <?php } ?>

                   </div>
               </div>
           <?php } ?>
       </div>
   </section>
   <!-- end section -->
   <div class="modal fade" id="download" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Download Aplikasi ?</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body center">
                   <a class="btn btn-info" href="<?= base_url('Home/downloadApp') ?>" style="padding-right: 10px;padding-left: 10px; color:white;" >
                       Iya
                   </a>
                   <button type="button" class="btn btn-danger" style="margin-left: 5px;" data-dismiss="modal">Batal</button>
               </div>
           </div>
       </div>
   </div>