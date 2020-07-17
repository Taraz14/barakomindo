<section class="content">
  <div class="row">

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">
            Tambah Pegawai
          </h3>
        </div>
        <form action="" method="post" id="form-pegawai">
          <div class="box-body">
            <div class="form-group row">
              <label for="nama_pegawai" class=" col-sm-2">Nama Lengkap</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_p" placeholder="Nama Lengkap" id="nama">
                <small class="nama"></small>
              </div>
            </div>
            <div class="form-group row">
              <label for="tempat_lahir" class=" col-sm-2">Tempat/Tanggal Lahir</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" id="tlahir" onkeyup="this.value=this.value.replace(/[^a-z]\/[^A-Z]/g,'');">
              </div>
              <div class="col-sm-5">
                <div class="input-group">
                  <input type="text" class="form-control" id="lahirPegawai" name="tanggal_lahir" value="<?= date('d-m-Y') ?>" placeholder="20-02-2020" readonly>
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="alamat" class=" col-sm-2">Alamat</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap">
              </div>
            </div>
            <div class="form-group row">
              <label for="pendidikan" class=" col-sm-2">Pendidikan Terakhir</label>
              <div class="col-sm-10">
                <select class="form-control" name="pendidikan">
                  <option value="" selected hidden>--Pilih Pendidikan Terakhir--</option>
                  <option value="1">SMA/SMK</option>
                  <option value="2">D3</option>
                  <option value="3">D4</option>
                  <option value="4">S1</option>
                  <option value="5">S2</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="agama" class=" col-sm-2">Agama</label>
              <div class="col-sm-10">
                <select class="form-control" name="agama">
                  <option value="" selected hidden>--Pilih Agama--</option>
                  <option value="1">Islam</option>
                  <option value="2">Kristen Protestan</option>
                  <option value="3">Katolik</option>
                  <option value="4">Hindu</option>
                  <option value="5">Budha</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="gender" class=" col-sm-2">Gender</label>
              <div class="col-sm-10">
                <select class="form-control" name="gender">
                  <option value="" selected hidden>--Pilih Gender--</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="status" class=" col-sm-2">Status</label>
              <div class="container row">
                <div class="col-sm-2">
                  <input type="radio" name="status" value="Sudah Menikah" checked> Sudah Menikah
                </div>
                <div class="col-sm-2">
                  <input type="radio" name="status" vlaue="Belum Menikah"> Belum Menikah
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="nik" class=" col-sm-2">NIK</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK 16 digit" onblur="ifExistsNik();">
                <small class="nik"></small>
              </div>
            </div>
            <div class="form-group row">
              <label for="npwp" class=" col-sm-2">NPWP</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="npwp" id="npwp" placeholder="NPWP 15 digit" onblur="ifExistsNpwp();">
                <small class="npwp"></small>
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class=" col-sm-2">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" placeholder="barakomindo@gmail.com">
              </div>
            </div>
            <div class="form-group row">
              <label for="no_hp" class=" col-sm-2">Nomor HP</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="no_hp" placeholder="+62-812-3456-7890">
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
  function ifExistsNik() {

    var nik = $("#nik").val();

    $.ajax({
      type: "post",
      url: "<?php echo base_url(); ?>admin/DataPegawai/exists",
      data: {
        nik: nik
      },
      success: function(response) {
        if (nik == '') {
          $('.nik').html('<i style="color:red">NIK wajib diisi</i>');
        } else {
          if (nik.length < 16) {
            $('.nik').html('<i style="color:red">NIK tidak lengkap</i>');
          } else {
            if (response == true) {
              $('.nik').html('<i style="color:green">NIK dapat digunakan</i>');
            } else {
              $('.nik').html('<i style="color:red">NIK sudah terdaftar</i>');
            }

          }
        }
      }
    });
  }

  function ifExistsNpwp() {

    var npwp = $("#npwp").val();

    $.ajax({
      type: "post",
      url: "<?php echo base_url(); ?>admin/DataPegawai/exists",
      data: {
        npwp: npwp
      },
      success: function(response) {
        if (npwp == '') {
          $('.npwp').html('<i style="color:red">NPWP wajib diisi</i>');
        } else {
          if (npwp.length < 15) {
            $('.npwp').html('<i style="color:red">NPWP tidak lengkap</i>');
          } else {
            if (response == true) {
              $('.npwp').html('<i style="color:green">NPWP dapat digunakan</i>');
            } else {
              $('.npwp').html('<i style="color:red">NPWP sudah terdaftar</i>');
            }

          }
        }
      }
    });
  }

  $(function() {
    //ajax save
    $('#save').click(function() {
      var data = new FormData($('#form-pegawai')[0]);
      $.ajax({
        type: 'post',
        url: '<?= site_url('admin/DataPegawai/savePegawai') ?>',
        contentType: false,
        processData: false,
        dataType: 'json',
        data: data,
        success: function(data) {
          console.log(data);
          if (data.status == true) {
            swal.fire({
              title: 'Tambah Pegawai',
              text: 'Pegawai berhasil ditambahkan',
              icon: 'success',
              showConfirmButton: false,
              timer: 1500
            });
          } else {
            var datax = [data.npwp, data.nik, data.gender, data.alamat,
              data.tempat_lahir, data.nama_lengkap, data.id_agama, data.id_pendidikan
            ];
            if (data.npwp == "") {
              swal.fire({
                title: 'Gagal',
                text: 'Harap isi data lengkap',
                icon: 'error',
                dangerMode: 'true',
                showConfirmButton: false,
                timer: 1500
              });
            } else {
              swal.fire({
                title: 'Gagal',
                text: 'Pegawai sudah terdaftar',
                icon: 'error',
                dangerMode: 'true',
                showConfirmButton: false,
                timer: 1500
              })

            }
          }
        }

      })
    })
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

  $('#form-pegawai').validate();
  setTimeout(function() {
    $('#nama').rules('add', {
      required: true
    })
    // $('#nama, #tlahir').validate({
    //   rules: {
    //     myField: {
    //       lettersonly: true
    //     }
    //   }
    // });
  }, 0);
</script>