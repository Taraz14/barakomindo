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
          <table class="table table-bordered table-hover nowrap" id="kapal">
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
  $(function() {
    tableKapal = $('#kapal').DataTable({
      "processing": true,
      "serverSide": true,
      // "scrollX": true,
      "scrollY": "200px",
      "order": [],
      "ajax": {
        url: "<?= site_url('admin/DataKapal/getKapal') ?>",
        'responsive': true
      }
    });
  })
</script>