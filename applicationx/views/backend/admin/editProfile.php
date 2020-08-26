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
          <!-- <div class="pull-right box-tools">
          <a href="<?= site_url('add-pegawai'); ?>" class="btn btn-success">Tambah <i class="fa fa-users"></i></a>
        </div> -->
        </div>
        <form id="profileUpdate" method="post" enctype="multipart/form-data">
          <div class="box-body">
            <div class="col-md-8">
              <div class="form-group row">
                <label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" value="<?= $profile->nama; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="username" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="username" value="<?= $profile->username; ?>" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" name="email" value="<?= $profile->email; ?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="tempat_lahir" class="col-sm-2 control-label">Tempat Lahir</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="tempat_lahir" value="<?= $profile->tempat_lahir; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="tanggal_lahir" class="col-sm-2 control-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                  <div class="input-group">
                    <input type="text" class="form-control" id="tgl_lahir" name="tanggal_lahir" value="<?= date("d-m-Y", strtotime($profile->tanggal_lahir)) ?>" readonly>
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group row">
                <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="alamat" value="<?= $profile->alamat; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="hp" class="col-sm-2 control-label">Nomor HP</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="no_hp" value="<?= $profile->no_hp; ?>">
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle prof" src="<?= $profile->foto == NULL ? base_url('assets/uploads/profile/noimage.png') : $profile->foto; ?>" alt="User profile picture" onClick="triggerClick()" style="cursor:pointer" id="profileDisplay">
                <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;" value="<?= $profile->foto; ?>">
                <h3 class="profile-username text-center"><?= $profile->nama; ?></h3>

                <p type="text" class="text-muted text-center"><?php if ($profile->role == 99) {
                                                                echo 'Admin';
                                                              } ?></p>

                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                    <b>Terakhir Login</b> <a class="pull-right"><?= date("d-m-Y H:i:s", $profile->last_login); ?></a>
                  </li>
                </ul>
                <a href="<?= site_url('profile') ?>" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                <a class="btn btn-success pull-right" id="save">Simpan Perubahan</a>
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
<script>
  $('#tgl_lahir').datepicker({
    format: "dd-mm-yyyy"
  });

  function triggerClick(e) {
    document.querySelector('#profileImage').click();
  }

  function displayImage(e) {
    if (e.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
      }
      reader.readAsDataURL(e.files[0]);
    }
  }

  $(function() {
    var href = '<?= site_url('profile'); ?>';
    //ajax save
    $('#save').click(function() {
      var data = new FormData($('#profileUpdate')[0]);
      $.ajax({
        type: 'post',
        url: '<?= site_url('admin/Profile/editProfile') ?>',
        contentType: false,
        processData: false,
        dataType: 'json',
        data: data,
        success: function(data) {
          console.log(data);
          if (data.status == true) {
            setTimeout(function() {
              swal.fire({
                title: 'Ubah Profile',
                text: 'Profile berhasil diubah',
                icon: 'success'
              }).then(function() {
                window.location = href
              });
            }, 1000)
            // $("#prof1, #prof2, #prof3, #profileDisplay").load(location.href + " #profileDisplay");
          } else {
            swal.fire({
              title: 'Gagal',
              text: 'Tidak diketahui',
              icon: 'error',
              dangerMode: 'true'
            })
          }
        }

      });
    });
  });
</script>