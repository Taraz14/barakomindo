<section class="content">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">
          Data Kapal
        </h3>
        <div class="pull-right box-tools">
          <a href="<?= site_url('add-kapal'); ?>" class="btn btn-success">Tambah <i class="fa fa-ship"></i></a>
        </div>
      </div>
      <form action="">
        <div class="box-body">
          <table class="table table-bordered table-hover nowrap" style="width:100%;" id="kapal">
            <thead>
              <th>No.</th>
              <th>Nama Kapal</th>
              <th>Nama Pemilik</th>
              <th>Kebangsaan</th>
              <th>Gross Tonnage</th>
              <th>Call Sign</th>
              <th>Tanggal Input</th>
              <th>Aksi</th>
            </thead>
          </table>
        </div>
      </form>
    </div>
  </div>
</section>
<script>
  var tableKapal;

  function reload_table() {
    tableKapal.ajax.reload(null, false); //reload datatable ajax 
  }
  $(function() {
    tableKapal = $('#kapal').DataTable({
      "dom": "<'row'<'col-sm-2'l ><'col-sm-5' B><'col-sm-5' <'datesearchbox'>><'col-sm-5'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
      "processing": true,
      "serverSide": true,
      // "scrollX": true,
      // "scrollY": "200px",
      "order": [],
      "ajax": {
        url: "<?= site_url('admin/DataKapal/getKapal') ?>",
        'responsive': true
      },
      buttons: [
        'excel',
        'print'
      ],
    });
  });

  function hapusKapal(id) {
    swal.fire({
        title: "Yakin hapus kapal?",
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
            url: "<?= site_url('admin/DataKapal/hapusKapal/') ?>" + id,
            type: "post",
            dataType: "json",
            success: function(data) {
              swal.fire("Sukses", "Satu kapal telah dihapus!", {
                icon: "success",
              });
              reload_table();
            }
          });
        } else {
          swal.fire("Batal", "Satu kapal batal dihapus!", "error");
        }
      });
  }
</script>