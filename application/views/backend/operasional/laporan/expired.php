<section class="content">
  <div class="row">

    <div class="col-lg-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">
            Expired
          </h3>

        </div>
        <div class="box-body">
          <form action="">
            <div class="form-group col-md-3 pull-right">
              <!-- <label>Date:</label> -->
              <!-- <div class="input-group date">
                  <input type="text" class="form-control pull-right" id="s" style="cursor:pointer" readonly>
                  <div class="input-group-addon">
                    <a href="#" style="color:#0073b7" id="search">
                      <i class="fa fa-search"></i>
                    </a>
                  </div>
                </div> -->
              <!-- /.input group -->
            </div>

            <table class="table table-hover table-bordered nowrap" style="width:100%" id="exp">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Kapal</th>
                  <th>Nama Sertifikat</th>
                  <th>Diunggah Oleh</th>
                  <th>Tanggal Expired</th>
                  <!-- <th>#</th> -->
                </tr>
              </thead>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  $(function() {
    var ongoing = $('#exp').DataTable({
      "dom": "<'row'<'col-sm-12 col-md-6'lB><'col-sm-12 col-md-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
      "fixedHeader": true,
      "processing": true,
      "serverSide": true,
      "scrollX": true,
      "scrollY": "200px",
      "order": [],
      "ajax": {
        url: "<?= site_url('operasional/LapExpired/getExp') ?>",
        'responsive': true,
      },
      buttons: [
        'excel',
        'print'
      ],
    });
  })
</script>