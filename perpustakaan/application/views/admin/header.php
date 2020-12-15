  <!-- menu profile quick info -->
  <div class="profile clearfix">
      <div class="profile_pic">
          <img src="<?php echo base_url('admin/build/images/book.png') ?>" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
          <span>Selamat Datang</span>
          <h2>Admin</h2>
      </div>
  </div>
  <!-- /menu profile quick info -->

  <br />
  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
          <h3>General</h3>
          <ul class="nav side-menu">
              <li><a href="<?php echo base_url('admin/index') ?>"><i class="fa fa-home"></i> Beranda </span></a>
              </li>
              <li><a href="<?php echo base_url('admin/tambah_buku') ?>"><i class="fa fa-edit"></i> Tambah Buku </a>
              </li>
              <li><a><i class="fa fa-table"></i> Daftar Buku <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                      <?php
                        $data = $this->db->get('kategori')->result();
                        foreach ($data as $s) { ?>
                          <li><a href="<?php echo base_url('admin/getKategori/' . $s->id_kategori) ?>"><?= $s->kategori ?></a></li>
                      <?php } ?>
                  </ul>
              </li>
              <li><a><i class="fa fa-user"></i> Pengguna & Kategori <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('admin/siswa') ?>">Mahasiswa</a></li>
                      <li><a href="<?php echo base_url('admin/masyarakat') ?>">Masyarakat</a></li>
                      <li><a href="<?php echo base_url('admin/list_kategori') ?>">Kategori Buku</a></li>
                  </ul>
              </li>
              <li><a><i class="fa fa-home"></i> IAI Al-Khairat <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                      <!-- <li><a href="</?php echo base_url('admin/lokasi') ?>">Lokasi Institusi</a></li>-->
                      <li><a href="<?php echo base_url('admin/fakultas') ?>">Fakultas/Prodi</a></li>
                      <li><a href="<?php echo base_url('admin/adminPerpus') ?>">Admin Perpus</a></li>
                  </ul>
              </li>
          </ul>
      </div>
      <div class="menu_section">

      </div>

  </div>
  <!-- /sidebar menu -->
  <!-- /menu footer buttons -->
  <div class="sidebar-footer hidden-small">
      <a data-toggle="tooltip" data-placement="top" title="Settings">
          <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
          <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Lock">
          <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo base_url('admin/logout') ?>">
          <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
  </div>
  <!-- /menu footer buttons -->