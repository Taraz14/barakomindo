<section class="content">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">
          Data Pegawai
        </h3>
      </div>
      <form action="">
        <div class="box-body">
          <table class="table table-bordered table-hover nowrap" id="pegawai">
            <thead>
              <th>No.</th>
              <th>Nama</th>
              <th>TTL</th>
              <th>Alamat</th>
              <th>Agama</th>
              <th>Jenis Kelamin</th>
              <th>Pend. Terakhir</th>
              <th>Status</th>
              <th>NIK</th>
              <th>NPWP</th>
              <th>Email</th>
              <th>Nomor Hp</th>
            </thead>
          </table>
        </div>
      </form>
    </div>
  </div>
</section>
<script>
  var tablePegawai;

  function reload_table() {
    tablePegawai.ajax.reload(null, false); //reload datatable ajax 
  }

  $(function() {
    tablePegawai = $('#pegawai').DataTable({
      "processing": true,
      "serverSide": true,
      "scrollX": true,
      "order": [],
      "ajax": {
        url: "<?= site_url('operasional/DataPegawai/getPegawai') ?>",
        'responsive': true
      }
    });
  })

  function hapusPegawai(id) {
    swal.fire({
        title: "Yakin hapus pegawai?",
        text: "Jika sudah terhapus maka, tidak dapat dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
      })
      .then((willDelete) => {
        if (willDelete.value) {
          $.ajax({
            url: "<?= site_url('operasional/DataPegawai/hapusPegawai/') ?>" + id,
            type: "post",
            dataType: "json",
            success: function(data) {
              swal.fire("Sukses", "Satu pegawai telah dihapus!", {
                icon: "success",
              });
              reload_table();
            }
          });
        } else {
          swal.fire("Batal", "Satu pegawai batal dihapus!", "error");
        }
      });
  }
</script>