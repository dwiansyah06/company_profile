<div class="col-sm-12 col-md-12 col-lg-12">
  <button type="button" class="btn btn-pill btn-success" style="margin-bottom: 23px;" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="fe fe-plus"></span> Tambah Galeri</button>

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

<?php foreach($galeri->result() as $row => $value): ?>
<div class="col-sm-6 col-lg-4">
  <div class="card p-3">
    <a href="javascript:void(0)" class="mb-3">
      <img src="<?php echo base_url().'asset/admin/images/galeri/'.$value->foto ?>" class="rounded">
    </a>
    <div class="d-flex align-items-center px-2">
      <?php foreach($a[$row] as $baris): ?>
      <div class="avatar avatar-md mr-3" style="background-image: url(<?php echo base_url().'asset/admin/images/foto/'.$baris->foto ?>)"></div>
      <div>
        <div><?php echo $baris->username ?></div>
      <?php endforeach; ?>
        <small class="d-block text-muted"><?php echo date('d F Y', strtotime($value->tanggal_upload)) ?></small>
      </div>
      <div class="ml-auto text-muted">
        <a href="<?php echo base_url().'admin/delGaleri/'.$value->id_galeri ?>" class="icon" OnClick="return confirm('Yakin mau dihapus?');"><i class="fe fe-trash mr-1"></i></a>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<div class="col-sm-12 col-md-12 col-lg-12">
  <?php echo $pagination; ?>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Tambah Galeri</h4>
          </div>
        <?php echo form_open_multipart('admin/addGaleri') ?>
          <div class="modal-body">    
            <div class="form-group">
              <label class="form-label">Foto</label>
              <div id="hilang"></div>
              <div id="hasil" style="display: none;">
                <img src="#" id="tampil" style="width: 100%;margin-bottom: 25px;">
              </div>
              <input type="file" class="form-control" name="berkas" id="foto" required>
            </div>
          </div>
          <div class="modal-footer">
            <input type="submit" class="btn btn-primary btn-block" name="tambah_galeri" value="Tambah">
          </div>
        <?php form_close(); ?>
      </div>
    </div>
  </div>