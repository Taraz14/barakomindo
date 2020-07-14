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
                <input type="text" class="form-control" name="nama_p" placeholder="Nama Lengkap">
              </div>
            </div>
            <div class="form-group row">
              <label for="tempat_lahir" class=" col-sm-2">Tempat/Tanggal Lahir</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir">
              </div>
              <div class="col-sm-5">
                <div class="input-group">
                  <input type="text" class="form-control" id="lahirPegawai" name="tanggal_lahir" placeholder="20-02-2020" readonly>
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
                  <input type="radio" name="status" value="Sudah Menikah"> Sudah Menikah
                </div>
                <div class="col-sm-2">
                  <input type="radio" name="status" vlaue="Belum Menikah"> Belum Menikah
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="nik" class=" col-sm-2">NIK</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK 16 digit">
              </div>
            </div>
            <div class="form-group row">
              <label for="npwp" class=" col-sm-2">NPWP</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="npwp" id="npwp" placeholder="NPWP 15 digit">
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
            swal({
              title: 'Tambah Pegawai',
              text: 'Pegawai berhasil ditambahkan',
              icon: 'success'
            });
            // window.location.href = "<?= site_url('data-pegawai'); ?>")
          } else {
            swal({
              title: 'Gagal',
              text: 'Tidak diketahui',
              icon: 'error',
              dangerMode: 'true'
            })
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
</script>