<section class="content">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">
          Data Kapal
        </h3>
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
        url: "<?= site_url('kecab/DataKapal/getKapal') ?>",
        'responsive': true
      },
      buttons: [
        'excel',
        'print'
      ],
    });
  });
</script>