<section class="content">
  <div class="row">

    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">
            Tambah Kapal
          </h3>
        </div>
        <form action="" method="post" id="form-kapal">
          <div class="box-body">
            <div class="form-group row">
              <label for="nama_kapal" class=" col-sm-2">Nama Kapal<br><i>Ship Name</i></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_kapal" placeholder="Nama Kapal">
              </div>
            </div>
            <div class="form-group row">
              <label for="nama_pemilik" class=" col-sm-2">Nama Pemilik<br><i>Ship Owner</i></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_pemilik" placeholder="Nama Pemilik">
              </div>
            </div>
            <div class="form-group row">
              <label for="kebangsaan" class=" col-sm-2">Bendera Kebangsaan<br><i>Nationality Flag</i></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="kebangsaan" placeholder="Negara Kebangsaan">
              </div>
            </div>
            <div class="form-group row">
              <label for="gt" class=" col-sm-2">Tonnase Kotor<br><i>Gross Tonnage</i></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="gt" id="gt" placeholder="Gross Tonnage Value">
              </div>
            </div>
            <div class="form-group row">
              <label for="call_sign" class=" col-sm-2">Nama Panggilan<br><i>Call Sign</i></label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="call_sign" placeholder="Call Sign">
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
                    <a href="<?= site_url('data-kapal'); ?>" class="btn btn-danger btn-block">Kembali <i class="fa fa-chevron-left"></i></a>
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
  $("#gt").inputFilter(function(value) {
    return /^\d*$/.test(value) && (value === "" || parseInt(value.length) <= 10);
  });

  $(function() {
    $('#save').click(function() {
      var data = new FormData($('#form-kapal')[0]);
      $.ajax({
        type: 'post',
        url: '<?= site_url('admin/DataKapal/kapal') ?>',
        contentType: false,
        processData: false,
        dataType: 'json',
        data: data,
        success: function(data) {
          console.log(data);
          if (data.status == true) {
            swal({
              title: 'Tambah Kapal',
              text: 'Kapal berhasil ditambahkan',
              icon: 'success'
            });

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
  })
</script>