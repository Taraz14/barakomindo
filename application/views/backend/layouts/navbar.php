<?php
if ($profile->role == 99) {
  $site = site_url('admin');
  $prof = site_url('profile');
} else if ($profile->role == 88) {
  $site = site_url('operasional');
  $prof = site_url('op/profile');
} else if ($profile->role == 77) {
  $site = site_url('kecab');
  $prof = site_url('profile');
}
?>
<header class="main-header">
  <!-- Logo -->
  <a href="<?= $site; ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>B</b>KM</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">Barakomindo</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?= $profile->foto == NULL ? base_url('assets/uploads/profile/noimage.png') : $profile->foto; ?>" class="user-image" id="prof1" alt="User Image">
            <span class="hidden-xs"><?= $profile->nama; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="<?= $profile->foto == NULL ? base_url('assets/uploads/profile/noimage.png') : $profile->foto; ?>" class="img-circle" id="prof2" alt="User Image">

              <p>
                <?= $profile->nama; ?> - <?php if ($profile->role == 99) {
                                            echo 'Admin';
                                          } else if ($profile->role == 88) {
                                            echo 'Operasional';
                                          } else if ($profile->role == 77) {
                                            echo 'Kepala Cabang';
                                          } ?>
                <small><?= $profile->email; ?></small>
              </p>
            </li>
            <!-- Menu Body -->

            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="<?= $prof; ?>" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="<?= site_url('logout'); ?>" class="btn btn-danger btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->

      </ul>
    </div>
  </nav>
</header>