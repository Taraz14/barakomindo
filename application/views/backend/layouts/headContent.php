<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $title; ?>
      |<small>Barakomindo Shipping</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php if ($this->session->userdata('role') == 99) {
                      echo site_url('admin');
                    }
                    if ($this->session->userdata('role') == 88) {
                      echo site_url('operasional');
                    }
                    // if ($userdata == 77) {
                    //   redirect('sekretaris', 'refresh');
                    ?>"><i class="fa fa-home"></i> Home</a></li>
      <li class="active"><?= $title; ?></li>
    </ol>
  </section>