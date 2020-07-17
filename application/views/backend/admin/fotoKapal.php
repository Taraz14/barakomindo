<style>
  .imgk {
    max-width: 100px !important;
    /* max-height: 200px !important; */
  }

  #myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
  }

  #myImg:hover {
    opacity: 0.7;
  }

  /* The Modal (background) */
  .modal {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    padding-top: 100px;
    /* Location of the box */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.9);
    /* Black w/ opacity */
  }

  /* Modal Content (image) */
  .modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
  }

  /* Caption of Modal Image */
  #caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
  }

  /* Add Animation */
  .modal-content,
  #caption {
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
  }

  @-webkit-keyframes zoom {
    from {
      -webkit-transform: scale(0)
    }

    to {
      -webkit-transform: scale(1)
    }
  }

  @keyframes zoom {
    from {
      transform: scale(0)
    }

    to {
      transform: scale(1)
    }
  }

  /* The Close Button */
  .close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
  }

  .close:hover,
  .close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
  }

  /* 100% Image Width on Smaller Screens */
  @media only screen and (max-width: 700px) {
    .modal-content {
      width: 100%;
    }
  }
</style>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">
            Upload foto kapal
          </h3>

        </div>
        <form id="form-kapal" method="post" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group row">
              <label for="kapal" class=" col-sm-2">Kapal</label>
              <div class="col-sm-10">
                <select class="form-control" name="kapal">
                  <option selected hidden>--Pilih Kapal--</option>
                  <?php foreach ($data_kapal as $val) : ?>
                    <option value="<?= $val->id_kapal ?>"><?= $val->nama_kapal ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="gambarKapal" class=" col-sm-2">Upload</label>
              <div class="col-sm-5">
                <input type="file" class="form-control" name="gambarKapal" accept="image/*">
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
            <div class="box-footer">
              <div id="mydiv">
                <h3 class="box-title">Galeri</h3>
                <div class="col-md-8">
                  <ul class="mailbox-attachments clearfix">
                    <?php
                    $i = 0;
                    foreach ($kapal as $valKapal) { ?>
                      <li>
                        <span class="mailbox-attachment-icon has-img"><img class="" src="<?= $valKapal->foto; ?>" alt="<?= $valKapal->nama_kapal . ' - ' . $valKapal->id_fkapal; ?>" id="myImg<?= $valKapal->id_fkapal; ?>"></span>

                        <div class="mailbox-attachment-info">
                          <div class="mailbox-attachment-name"><i class="fa fa-camera"></i> <?= $valKapal->nama_kapal; ?></div>
                          <span class="mailbox-attachment-size">
                            <a href="#">Hapus Foto</a>
                            <a href="<?= site_url('foto-download/') . $valKapal->foto ?>" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                          </span>
                        </div>
                      </li>
                    <?php } ?>
                  </ul>
                </div>
                <div class="col-md-4">
                  <h3 class="box-title">Fitur Pencarian</h3>
                  <hr />
                  <div class="form-group">
                    <label>Nama Kapal</label>
                    <input type="text" class="form-control" placeholder="Cari Nama Kapal">
                  </div>
                  <div class="form-group">
                    <button class="btn btn-warning"><i class="fa fa-search"></i> Cari</button>
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

<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close" style="margin-top:40px; margin-right:40px;">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<script>
  // Get the modal
  var modal = document.getElementById("myModal");

  // Get the image and insert it inside the modal - use its "alt" text as a caption
  var i = 0;

  $(function() {
    //ajax save
    $('#save').click(function() {
      var data = new FormData($('#form-kapal')[0]);
      $.ajax({
        type: 'post',
        url: '<?= site_url('admin/FotoKapal/uploadFotoKapal') ?>',
        contentType: false,
        processData: false,
        dataType: 'json',
        data: data,
        success: function(data) {
          console.log(data);
          if (data.status == true) {
            swal({
              title: 'Foto Kapal',
              text: 'Upload Foto Kapal Berhasil',
              icon: 'success'
            });
            $("#mydiv").load(location.href + " #mydiv");

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

  // $(document).ajaxStop(function() {
  //   window.location.reload();
  // });

  <?php foreach ($kapal as $val) {
    $idk = $val->id_fkapal;
  ?>
    var img = document.getElementById("myImg" + <?= $idk; ?>);
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function() {
      modal.style.display = "block";
      modalImg.src = this.src;
      captionText.innerHTML = this.alt;
    }
  <?php } ?>

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.display = "none";
  }
</script>