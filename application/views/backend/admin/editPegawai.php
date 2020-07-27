<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">
            Edit Pegawai
          </h3>
        </div>
        <form action="" method="post" id="form-pegawai">
          <input type="hidden" name="id" value="<?= $this->uri->segment(4) ?>">
          <div class="box-body">
            <div class="form-group row">
              <label for="nama_p" class=" col-sm-2">Nama Lengkap</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_p" placeholder="Nama Lengkap" id="nama" value="<?= $peg->nama_lengkap ?>" onkeydown="alphaOnly(event);">
                <small class="nama"></small>
              </div>
            </div>
            <div class="form-group row">
              <label for="tempat_lahir" class=" col-sm-2">Tempat/Tanggal Lahir</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" id="tlahir" value="<?= $peg->tempat_lahir ?>" onkeyup="this.value=this.value.replace(/[^a-z]\/[^A-Z]/g,'');">
              </div>
              <div class="col-sm-5">
                <div class="input-group">
                  <input type="text" class="form-control" id="lahirPegawai" name="tanggal_lahir" value="<?= date("d-m-Y", strtotime($peg->tanggal_lahir)) ?>" readonly>
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="alamat" class=" col-sm-2">Alamat</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="alamat" value="<?= $peg->alamat ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="pendidikan" class=" col-sm-2">Pendidikan Terakhir</label>
              <div class="col-sm-10">
                <select class="form-control" name="pendidikan">
                  <option value="" selected hidden>--Pilih Pendidikan Terakhir--</option>
                  <option <?php if ($peg->id_pendidikan == 1) {
                            echo 'selected';
                          } ?> value="1">SMA/SMK</option>
                  <option <?php if ($peg->id_pendidikan == 2) {
                            echo 'selected';
                          } ?> value="2">D3</option>
                  <option <?php if ($peg->id_pendidikan == 3) {
                            echo 'selected';
                          } ?> value="3">D4</option>
                  <option <?php if ($peg->id_pendidikan == 4) {
                            echo 'selected';
                          } ?> value="4">S1</option>
                  <option <?php if ($peg->id_pendidikan == 5) {
                            echo 'selected';
                          } ?> value="5">S2</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="agama" class=" col-sm-2">Agama</label>
              <div class="col-sm-10">
                <select class="form-control" name="agama">
                  <option value="" selected hidden>--Pilih Agama--</option>
                  <option <?php if ($peg->id_agama == 1) {
                            echo 'selected';
                          } ?> value="1">Islam</option>
                  <option <?php if ($peg->id_agama == 2) {
                            echo 'selected';
                          } ?> value="2">Kristen Protestan</option>
                  <option <?php if ($peg->id_agama == 3) {
                            echo 'selected';
                          } ?> value="3">Katolik</option>
                  <option <?php if ($peg->id_agama == 4) {
                            echo 'selected';
                          } ?> value="4">Hindu</option>
                  <option <?php if ($peg->id_agama == 5) {
                            echo 'selected';
                          } ?> value="5">Budha</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="gender" class=" col-sm-2">Gender</label>
              <div class="col-sm-10">
                <select class="form-control" name="gender">
                  <option value="" selected hidden>--Pilih Gender--</option>
                  <option <?php if ($peg->gender == 'Laki-laki') {
                            echo 'selected';
                          } ?> value="Laki-laki">Laki-laki</option>
                  <option <?php if ($peg->gender == 'Perempuan') {
                            echo 'selected';
                          } ?> value="Perempuan">Perempuan</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="status" class=" col-sm-2">Status</label>
              <div class="container row">
                <div class="col-sm-2">
                  <input type="radio" name="status" value="Sudah Menikah" <?php if ($peg->status == 'Sudah Menikah') {
                                                                            echo 'checked';
                                                                          } ?>> Sudah Menikah
                </div>
                <div class="col-sm-2">
                  <input type="radio" name="status" vlaue="Belum Menikah" <?php if ($peg->status == 'Belum Menikah') {
                                                                            echo 'checked';
                                                                          } ?>> Belum Menikah
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="nik" class=" col-sm-2">NIK</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK 16 digit" value="<?= $peg->nik; ?>">
                <small class="nik"></small>
              </div>
            </div>
            <div class="form-group row">
              <label for="npwp" class=" col-sm-2">NPWP</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="npwp" id="npwp" placeholder="NPWP 15 digit" value="<?= $peg->npwp; ?>">
                <small class="npwp"></small>
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class=" col-sm-2">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" placeholder="barakomindo@gmail.com" value="<?= $peg->email; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="no_hp" class=" col-sm-2">Nomor HP</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="no_hp" id="hp" placeholder="08123456789" value="<?= $peg->no_hp; ?>">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label class="col-sm-4 "></label>
                <div class="row">
                  <div class="col-sm-2">
                    <a class="btn btn-success btn-block" id="save">Simpan <i class="fa fa-send"></i></a>
                    <!-- <button class="btn btn-success btn-block">Simpan <i class="fa fa-send"></i></button> -->
                  </div>
                  <div class="col-sm-2">
                    <a href="<?= site_url('data-pegawai'); ?>" class="btn btn-danger btn-block">Kembali <i class="fa fa-chevron-left"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</section>
<script>
  function alphaOnly(event) {
    var key = event.keyCode;
    return ((key >= 65 && key <= 90) || key == 8);
  };

  $(function() {
    //ajax save
    $('#save').click(function() {
      var data = new FormData($('#form-pegawai')[0]);
      $.ajax({
        type: 'post',
        url: '<?= site_url('admin/EditPegawai/updatePegawai/') ?>',
        contentType: false,
        processData: false,
        dataType: 'json',
        data: data,
        success: function(data) {
          console.log(data.id_pegawai);
          if (data.status == true) {
            swal.fire({
              title: 'Edit Pegawai',
              text: '1 Pegawai berhasil diubah',
              icon: 'success',
              showConfirmButton: false,
              timer: 1500
            });
          }
          if (data.status == false) {
            swal.fire({
              title: 'Gagal',
              text: 'Harap periksa lagi',
              icon: 'error',
              dangerMode: 'true',
              showConfirmButton: false,
              timer: 1500
            });
          }
        },
      })
    });
    //pegawai borndate
    $('#lahirPegawai').datepicker({
      format: "dd-mm-yyyy"
    });

  });

  $('#form-pegawai').keypress(function(e) {
    if (e.which == 13) {
      return false;
    }
  });

  $("#nik").inputFilter(function(value) {
    return /^\d*$/.test(value) && (value === "" || parseInt(value.length) <= 16);
  });

  $("#npwp").inputFilter(function(value) {
    return /^\d*$/.test(value) && (value === "" || parseInt(value.length) <= 15);
  });

  $("#hp").inputFilter(function(value) {
    return /^\d*$/.test(value) && (value === "" || parseInt(value.length) <= 13);
  });

  $('#form-pegawai').validate({
    rules: {
      nama_p: {
        required: true,
        lettersonly: true
      },
      tempat_lahir: {
        required: true,
        lettersonly: true
      }
    },
    messages: {
      nama_p: {
        required: "<small style='color:red'><i>Nama wajib diisi</i></small>",
        lettersonly: "<small style='color:red'><i>Hanya dapat diisi huruf</i></small>"
      },
      tempat_lahir: {
        required: "<small style='color:red'><i>Nama wajib diisi</i></small>",
        lettersonly: "<small style='color:red'><i>Hanya dapat diisi huruf</i></small>"
      }
    }
  });
</script>