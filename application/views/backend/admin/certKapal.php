<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">
            Upload Sertifikat Kapal
          </h3>

        </div>
        <form id="form-sertifikat" method="post" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group row">
              <label for="namaKapal" class=" col-sm-2">Nama Kapal</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="namaKapal" placeholder="Nama Kapal">
              </div>
            </div>
            <div class="form-group row">
              <label for="namaCert" class=" col-sm-2">Nama Sertifikat</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="namaCert" placeholder="Masukkan Nama Sertifikat">
              </div>
            </div>
            <div class="form-group row">
              <label for="certFile" class=" col-sm-2">Upload</label>
              <div class="col-sm-5">
                <input type="file" class="form-control" name="certFile" accept="application/pdf">
              </div>
              <div class=" col-sm-5">
                <div class="input-group">
                  <input type="text" class="form-control" name="tanggal_upload" value="<?= date('d-m-Y'); ?>" readonly>
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <label class="col-sm-2 "></label>
                <div class="row">
                  <div class="col-sm-2 pull-right">
                    <a class="btn btn-success btn-block" id="save">Simpan <i class="fa fa-send"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>


    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">
            List Data Sertifikat Kapal
          </h3>
        </div>
        <form action="">
          <div class="box-body">
            <table class="table table-bordered table-hover nowrap" id="certKapal" style="width:100%">
              <thead>
                <th>No.</th>
                <th>Nama Kapal</th>
                <th>Nama Sertifikat</th>
                <th>Tanggal Upload</th>
                <th>File Upload</th>
                <th>Aksi</th>
              </thead>
            </table>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<script>
  var tableCert;

  function reload_table() {
    tableCert.ajax.reload(null, false); //reload datatable ajax 
  }

  $(function() {
    //ajax save
    $('#save').click(function() {
      var data = new FormData($('#form-sertifikat')[0]);
      $.ajax({
        type: 'post',
        url: '<?= site_url('admin/CertKapal/uploadCert') ?>',
        contentType: false,
        processData: false,
        dataType: 'json',
        data: data,
        success: function(data) {
          console.log(data);
          if (data.status == true) {
            swal({
              title: 'Tambah Sertifikat',
              text: 'Sertifikat berhasil ditambahkan',
              icon: 'success'
            });
            reload_table();
          } else {
            swal({
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

  $(function() {
    tableCert = $('#certKapal').DataTable({
      "processing": true,
      "serverSide": true,
      "scrollX": true,
      "scrollY": "200px",
      "order": [],
      "ajax": {
        url: "<?= site_url('admin/CertKapal/getCert') ?>",
        'responsive': true
      }
    });
  })

  function hapusCert(id) {
    swal({
        title: "Yakin hapus Sertifikat?",
        text: "Jika sudah terhapus maka, tidak dapat dikembalikan!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            url: "<?= site_url('admin/CertKapal/hapusCert/') ?>" + id,
            type: "post",
            dataType: "json",
            success: function(data) {
              swal("Satu Sertifikat telah dihapus!", {
                icon: "success",
              });
              reload_table();
            }
          });
        } else {
          swal("Satu Sertifikat batal dihapus!");
        }
      });
  }

  $('#tanggalUpload').datepicker({
    format: "dd-mm-yyyy"
  });
</script>