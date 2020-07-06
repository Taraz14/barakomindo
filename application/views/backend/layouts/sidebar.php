<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?= $profile->foto == NULL ? base_url('assets/uploads/profile/noimage.png') : $profile->foto; ?>" class="img-circle" id="prof3" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?= $profile->nama; ?></p>
        <i class="fa fa-calendar"></i> <?= date("Y-m-d"); ?>
      </div>
    </div>
    <!-- search form -->
    <!-- <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form> -->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">NAVIGASI UTAMA</li>
      <li class="<?php if ($this->uri->segment(1) == 'admin' || $this->uri->segment(1) == 'profile') {
                    echo 'active';
                  } ?>">
        <a href="<?= site_url('admin') ?>">
          <i class="fa fa-home"></i> <span>Home</span>
        </a>
      </li>
      <li class="<?php if ($this->uri->segment(1) == 'data-pegawai') {
                    echo 'active';
                  } ?>">
        <a href="<?= site_url('data-pegawai') ?>">
          <i class="fa fa-users"></i>
          <span>Data Pegawai</span>
        </a>
      </li>
      <li class="<?php if ($this->uri->segment(1) == 'cert') {
                    echo 'active';
                  } ?>">
        <a href="<?= site_url('cert') ?>">
          <i class="fa fa-files-o"></i> <span>Sertifikat Kapal</span>
        </a>
      </li>
      <li class="<?php if ($this->uri->segment(1) == 'foto-kapal') {
                    echo 'active';
                  } ?>">
        <a href="<?= site_url('foto-kapal') ?>">
          <i class="fa fa-ship"></i>
          <span>Foto Kapal</span>
        </a>
      </li>
      <li class="<?php if ($this->uri->segment(1) == 'lap-bulanan') {
                    echo 'active';
                  } ?>">
        <a href="<?= site_url('lap-bulanan') ?>">
          <i class="fa fa-laptop"></i>
          <span>Laporan Bulanan</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>