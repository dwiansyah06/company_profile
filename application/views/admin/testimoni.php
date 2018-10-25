<div class="col-sm-12 col-md-12 col-lg-12">
  <button type="button" class="btn btn-pill btn-success" style="margin-bottom: 23px;" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="fe fe-user-plus"></span> Tambah Testimoni</button>
  <?php  
    $message = $this->session->userdata('success');
    if ($message) {
      echo "<div class='alert alert-icon alert-primary' role='alert'>
            <i class='fe fe-check mr-2' aria-hidden='true'></i> $message
          </div>";
    }

    $message_error = $this->session->flashdata('error');
    if($message_error){
      echo "<div class='alert alert-icon alert-danger' role='alert'>";
      foreach ($message_error as $pesan) {
        echo "<i class='fe fe-alert-triangle mr-2' aria-hidden='true'></i> $pesan";
      }
      echo "</div>";
    }
  ?>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Tambah Testimoni</h4>
        </div>
      <?php echo form_open('','name="coba"') ?>
        <div class="modal-body">
        	<div class="form-group">
              <label class="custom-control custom-checkbox">
                <input type="checkbox" id="testi_pelatihan" class="custom-control-input" onClick="testiPelatihan(this)" required>
                <span class="custom-control-label">Pelatihan</span>
              </label>
              <label class="custom-control custom-checkbox">
                <input type="checkbox" id="testi_kursus" class="custom-control-input" onClick="testiKursus(this)" required>
                <span class="custom-control-label">Kursus</span>
              </label>
            </div>
            <div class="form-group hide" id="txtPelatihan">
              <label class="form-label">Nama Siswa Pelatihan</label>
              <input type="text" id="autocomplete1" class="form-control" name="" placeholder="Nama Siswa Pelatihan" autocomplete="off">
            </div>
            <div class="form-group hide" id="txtKursus">
              <label class="form-label">Nama Siswa Kursus</label>
              <input type="text" id="autocomplete2" class="form-control" name="" placeholder="Nama Siswa Kursus" autocomplete="off">
            </div>

            <div class="form-group">
              <label class="form-label">Pesan</label>
              <textarea class="form-control" name="" style="height: 150px;resize: none;" placeholder="Pesan Testimoni" required></textarea>
            </div>
            <div class="form-group">
              <label class="form-label">Foto</label>
              <input type="hidden" name="" id="id">
              <input type="hidden" name="" id="txt_foto">
              <center><img class="hide" id="foto" style="width: 20%;"></center>
            </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary btn-block" name="" value="Tambah">
        </div>
      <?php form_close(); ?>
    </div>
  </div>
</div>