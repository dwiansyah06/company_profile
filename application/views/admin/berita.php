<div class="col-sm-12 col-md-12 col-lg-12">
  <button type="button" class="btn btn-pill btn-success" style="margin-bottom: 23px;" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="fe fe-plus"></span> Tambah Berita</button>
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

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">List Pelatihan</h3>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table card-table table-vcenter table-bordered text-nowrap" style="border: 1px solid #dee2e6">
          <thead>
            <tr>
              <th class="w-1">No.</th>
              <th>Judul Berita</th>
              <th class="text-center">Tanggal</th>
              <th class="text-center">Uploader</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
      <?php 
        $i = 1;
        foreach($berita as $row => $value): 
      ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $value->judul_berita ?></td>
              <td class="text-center"><?php echo date('d F Y', strtotime($value->tgl_upload)) ?></td>
              <?php foreach($a[$row] as $isi): ?>
              <td class="text-center"><?php echo $isi->username ?></td>
              <?php endforeach; ?>
              <td>
                <center><a href="<?php echo base_url().'admin/editBerita/'.$value->id_berita ?>" class="btn btn-icon btn-primary"><i class="fe fe-edit-3"></i></a>
                <a href="<?php echo base_url().'admin/delBerita/'.$value->id_berita ?>" class="btn btn-icon btn-danger" OnClick="return confirm('Yakin Mau Dihapus?')"><i class="fe fe-trash"></i></a></center>
              </td>
            </tr>
      <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Tambah Berita</h4>
        </div>
      <?php echo form_open_multipart('admin/addBerita') ?>
        <div class="modal-body">
            <div class="form-group">
              <label class="form-label">Judul Berita</label>
              <input type="text" class="form-control" name="judul_berita" placeholder="Judul Berita" autocomplete="off" required>
            </div>
            <div class="form-group">
              <label class="form-label">Konten Berita</label>
              <textarea class="form-control" id="berita" name="konten_berita" required></textarea>
            </div>
            <div class="form-group">
              <label class="form-label">Gambar</label>
              <div id="hilang"></div>
              <div id="hasil" style="display: none;">
                <img src="#" id="tampil" style="width: 100%;margin-bottom: 25px;">
              </div>
              <input type="file" class="form-control" name="berkas" id="foto" required>
            </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary btn-block" name="tambah_berita" value="Tambah">
        </div>
      <?php form_close(); ?>
    </div>
  </div>
</div>