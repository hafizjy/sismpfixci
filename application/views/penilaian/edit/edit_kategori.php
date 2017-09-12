
<div class="modal fade bs-example-modal-lg" id="">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      

        <form class="form-horizontal formmapel" action="<?php echo base_url("index.php/penilaian/ubah_katnilai"); ?>" method="post">
        <?php foreach($kategori_nilai as $a) ?>
          <div class="bigbox-mapel" > 
            <div class="box-mapel">

              <div class="form-group formgrup jarakform">
                <label for="inputKurikulum" class="col-sm-2 control-label">Nama Kategori Nilai</label>
                <div class="col-sm-4">
                  <input type="hidden" name="id" value="<?php echo $a->id_kategorinilai; ?>"> 
                  <input type="text" name="katnilai" class="form-control"  value="<?php echo $a->kategori_nilai ; ?>">
                </div>
              </div>

              <div class="form-group formgrup jarakform">
                <label for="inputKurikulum" class="col-sm-2 control-label">Bobot Nilai</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control"  name="bobot" value="<?php echo $a->bobot; ?>">
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <td><button class="btn btn-danger"><a style="color: white;" href="<?php echo base_url("index.php/penilaian/ubah_katnilai/".$a->id_kategorinilai); ?>" >Submit</td>
            </button>
            <td> <button class="btn btn-danger" data-dismiss="modal" href="#lihatkategori" data-toggle="tab">Back</button></td>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
