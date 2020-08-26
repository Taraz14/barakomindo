<section class="content">
  <div class="row">


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
                <!-- <th>Aksi</th> -->
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
    //Date range picker
    $('#reservation').daterangepicker()

    //ajax save
    $('#save').click(function() {
      var data = new FormData($('#form-sertifikat')[0]);
      $.ajax({
        type: 'post',
        url: '<?= site_url('kecab/CertKapal/uploadCert') ?>',
        contentType: false,
        processData: false,
        dataType: 'json',
        data: data,
        success: function(data) {
          console.log(data);
          if (data.status == true) {
            swal.fire({
              title: 'Tambah Sertifikat',
              text: 'Sertifikat berhasil ditambahkan',
              icon: 'success'
            });
            reload_table();
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

  $(function() {
    tableCert = $('#certKapal').DataTable({
      "processing": true,
      "serverSide": true,
      "scrollX": true,
      // "scrollY": "200px",
      "order": [],
      "ajax": {
        url: "<?= site_url('kecab/CertKapal/getCert') ?>",
        'responsive': true
      }
    });
  })

  function hapusCert(id) {
    swal.fire({
        title: "Yakin hapus Sertifikat?",
        text: "Jika sudah terhapus maka, tidak dapat dikembalikan!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            url: "<?= site_url('kecab/CertKapal/hapusCert/') ?>" + id,
            type: "post",
            dataType: "json",
            success: function(data) {
              swal.fire("Satu Sertifikat telah dihapus!", {
                icon: "success",
              });
              reload_table();
            }
          });
        } else {
          swal.fire("error", "Satu Sertifikat batal dihapus!");
        }
      });
  }

  $('#tanggalUpload').datepicker({
    format: "dd-mm-yyyy"
  });
</script>