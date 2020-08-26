<style>
  .header h2 {
    font-weight: lighter;
    text-align: center;
    margin: 0
  }

  .header h3 {
    font-weight: lighter;
    text-align: center;
    margin: 0
  }

  .number {
    text-align: right;
  }

  div.dataTables_wrapper {
    margin-bottom: 3em;
  }
</style>
<section class="content">
  <div class="row">
    <section class="col-lg-12 connectedSortable ui-sortable">
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?= $countPegawai ?></h3>
            <p>Pegawai</p>
          </div>
          <div class="icon">
            <i class="fa fa-users" style="font-size:80%;"></i>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?= $countCert; ?></h3>

            <p>Sertifikat</p>
          </div>
          <div class="icon">
            <i class="fa fa-file-text-o" style="font-size:80%;"></i>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?= $countFkapal ?></h3>

            <p>Foto Kapal</p>
          </div>
          <div class="icon">
            <i class="fa fa-picture-o" style="font-size:80%;"></i>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
          <div class="inner">
            <h3><?= date('M'); ?></h3>

            <p>Bulan</p>
          </div>
          <div class="icon">
            <i class="fa fa-bar-chart" style="font-size:80%;"></i>
          </div>
        </div>
      </div>
    </section>
    <section class="col-lg-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#ongoing" data-toggle="tab" aria-expanded="true">Ongoing</a></li>
          <li class=""><a href="#exp" data-toggle="tab" aria-expanded="false">Expired</a></li>
          <li class=""><a href="#del" data-toggle="tab" aria-expanded="false">Deleted</a></li>
        </ul>
        <!-- laporan -->
        <div class="tab-content">
          <div id="ongoing" class="tab-pane active">
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

              <table class="tbOngoing table table-hover table-bordered nowrap" style="width:100%" id="">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Kapal</th>
                    <th>Nama Sertifikat</th>
                    <th>Uploaded By</th>
                    <th>Tanggal Upload</th>
                    <!-- <th>#</th> -->
                  </tr>
                </thead>
              </table>
            </form>
          </div>
          <div id="exp" class="tab-pane">
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
            <table class="tbExp table table-hover table-bordered nowrap" style="width:100%" id="">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Kapal</th>
                  <th>Nama Sertifikat</th>
                  <th>Uploaded By</th>
                  <th>Tanggal Upload</th>
                  <!-- <th>#</th> -->
                </tr>
              </thead>
            </table>
          </div>
          <div id="del" class="tab-pane">
            <table class="tbDeleted table table-hover table-bordered nowrap" style="width:100%" id="">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Kapal</th>
                  <th>Nama Sertifikat</th>
                  <th>Uploaded By</th>
                  <th>Tanggal Upload</th>
                  <!-- <th>#</th> -->
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </section>
  </div>
</section>
<script type="text/javascript">
  $(function() {

    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
      var onGoing = $('table.tbOngoing').DataTable({
        "fixedHeader": true,
        "processing": true,
        "serverSide": true,
        "scrollX": true,
        "scrollY": "200px",
        "order": [],
        "ajax": {
          url: "<?= site_url('admin/LapBulanan/getCert') ?>",
          'responsive': true,
        },
        buttons: [
          'excel',
          'print'
        ],
        'paging': false,
        'searching': false
      })
      ongoing.columns.adjust().draw();
    });

    var exp = $('table.tbExp').DataTable({
      "fixedHeader": true,
      "processing": true,
      "serverSide": true,
      // "scrollX": true,
      "scrollY": "200px",
      "order": [],
      "ajax": {
        url: "<?= site_url('admin/LapBulanan/getExp') ?>",
        'responsive': true,
      },
      buttons: [
        'excel',
        'print'
      ],
      'paging': false,
      'searching': false
    })
    exp.columns.adjust().draw();

    // var deleted = $('table.tbDeleted').DataTable({
    //   "fixedHeader": true,
    //   "processing": true,
    //   "serverSide": true,
    //   "scrollX": true,
    //   "scrollY": "200px",
    //   "order": [],
    //   "ajax": {
    //     url: "<?= site_url('admin/LapBulanan/getDeleted') ?>",
    //     'responsive': true,
    //   },
    //   buttons: [
    //     'excel',
    //     'print'
    //   ],
    //   'paging': false,
    //   'searching': false
    // })
    // deleted.columns.adjust().draw();
  })
</script>