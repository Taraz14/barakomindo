<?php
$ttl = $profile->tempat_lahir . ', ' . date("d-m-Y", strtotime($profile->tanggal_lahir));
?>
<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <!-- Profil -->
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">
            Profile
          </h3>
        </div>
        <form action="">
          <div class="box-body">
            <div class="col-md-8">

              <div class="form-group row">
                <label for="username" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-10">
                  <p class="form-control"><?= $profile->username; ?></p>
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <p class="form-control"><?= $profile->email; ?></p>
                </div>
              </div>

              <div class="form-group row">
                <label for="ttl" class="col-sm-2 control-label">Tempat/Tanggal Lahir</label>
                <div class="col-sm-10">
                  <p class="form-control"><?= $ttl == NULL ? '-' : $ttl; ?></p>
                </div>
              </div>
              <div class="form-group row">
                <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-10">
                  <p class="form-control"><?= $profile->alamat == null ? '-' : $profile->alamat; ?></p>
                </div>
              </div>
              <div class="form-group row">
                <label for="hp" class="col-sm-2 control-label">Nomor HP</label>
                <div class="col-sm-10">
                  <p class="form-control"><?= $profile->no_hp == null ? '-' : $profile->no_hp; ?></p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="<?= $profile->foto == NULL ? base_url('assets/uploads/profile/noimage.png') : $profile->foto; ?>" alt="User profile picture">

                <h3 class="profile-username text-center"><?= $profile->nama; ?></h3>

                <p class="text-muted text-center"><?php if ($profile->role == 99) {
                                                    echo 'Admin';
                                                  } ?></p>

                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                    <b>Terakhir Aktif</b> <a class="pull-right"><?= date("d-m-Y H:i:s", $profile->last_login); ?></a>
                  </li>
                </ul>
                <a href="<?= site_url('edit-profile') ?>" class="btn btn-primary btn-block"><b>Ubah Profile</b></a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->