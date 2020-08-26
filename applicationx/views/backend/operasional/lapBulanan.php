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

              <table class="table table-bordered table-hover nowrap" style="width:100%" id="lapBulanan">
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
            <h2>Expired</h2>
          </div>
          <div id="del" class="tab-pane">
            <h2>Deleted</h2>
          </div>
        </div>
      </div>
    </section>
  </div>
</section>
<script type="text/javascript">
  //fungsi untuk filtering data berdasarkan tanggal 
  var start_date;
  var end_date;
  var DateFilterFunction = (function(oSettings, aData, iDataIndex) {
    var dateStart = parseDateValue(start_date);
    var dateEnd = parseDateValue(end_date);
    //Kolom tanggal yang akan kita gunakan berada dalam urutan 2, karena dihitung mulai dari 0
    //nama depan = 0
    //nama belakang = 1
    //tanggal terdaftar =2
    var evalDate = parseDateValue(aData[4]);
    if ((isNaN(dateStart) && isNaN(dateEnd)) ||
      (isNaN(dateStart) && evalDate <= dateEnd) ||
      (dateStart <= evalDate && isNaN(dateEnd)) ||
      (dateStart <= evalDate && evalDate <= dateEnd)) {
      return true;
    }
    return false;
  });

  // fungsi untuk converting format tanggal dd/mm/yyyy menjadi format tanggal javascript menggunakan zona aktubrowser
  function parseDateValue(rawDate) {
    var dateArray = rawDate.split("/");
    var parsedDate = new Date(dateArray[2], parseInt(dateArray[1]) - 1, dateArray[0]); // -1 because months are from 0 to 11   
    return parsedDate;
  }

  $(document).ready(function() {
    //konfigurasi DataTable pada tabel dengan id lapBulanan dan menambahkan  div class dateseacrhbox dengan dom untuk meletakkan inputan daterangepicker
    var $dTable = $('#lapBulanan').DataTable({
      "dom": "<'row'<'col-sm-4'lB><'col-sm-5' <'datesearchbox'>><'col-sm-3'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
      "fixedHeader": true,
      "processing": true,
      "serverSide": true,
      "scrollX": true,
      "scrollY": "200px",
      "order": [],
      "ajax": {
        url: "<?= site_url('operasional/LapBulanan/getCert') ?>",
        'responsive': true,
      },
      buttons: [
        'excel',
        'print'
      ],
    });

    //menambahkan daterangepicker di dalam datatables
    $("div.datesearchbox").html('<div class="input-group"> <div class="input-group-addon"> <i class="glyphicon glyphicon-calendar"></i> </div><input type="text" class="form-control pull-right" id="datesearch" placeholder="Cari tanggal..." style="cursor:pointer" readonly> </div>');

    document.getElementsByClassName("datesearchbox")[0].style.textAlign = "right";

    //konfigurasi daterangepicker pada input dengan id datesearch
    $('#datesearch').daterangepicker({
      autoUpdateInput: false
    });

    //menangani proses saat apply date range
    $('#datesearch').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
      start_date = picker.startDate.format('DD/MM/YYYY');
      end_date = picker.endDate.format('DD/MM/YYYY');
      $.fn.dataTableExt.afnFiltering.push(DateFilterFunction);
      $dTable.draw();
      console.log(start_date + '-' + end_date);
    });

    $('#datesearch').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
      start_date = '';
      end_date = '';
      $.fn.dataTable.ext.search.splice($.fn.dataTable.ext.search.indexOf(DateFilterFunction, 1));
      $dTable.draw();
    });
  });
</script>