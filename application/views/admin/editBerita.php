<?php 
  foreach($edit_berita as $value):
  echo form_open_multipart('admin/updBerita');
?>
<div class="col-sm-12 col-md-12 col-xl-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Judul Berita</h3>
    </div>
    <div class="card-body">
      <div class="form-group">
        <input type="text" class="form-control" name="judul_berita" value="<?php echo $value->judul_berita ?>" autocomplete="off">
        <input type="hidden" name="id_berita" value="<?php echo $value->id_berita ?>">
      </div>
    </div>
  </div>
</div>
<div class="col-sm-12 col-md-12 col-xl-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Gambar Headline</h3>
    </div>
    <div class="card-body">
      <div id="hilang">
        <img src="<?php echo base_url().'asset/admin/images/berita/'.$value->gambar ?>" style="width: 100%;margin-bottom: 15px;">
      </div>
      <div class="form-group">
        <div id="hasil" style="display: none;">
          <img src="#" id="tampil" style="width: 100%;margin-bottom: 25px;">
        </div>
        <input type="file" class="form-control" name="berkas" id="foto">
        <input type="hidden" name="berkas_lama" value="<?php echo $value->gambar ?>">
      </div>
    </div>
  </div>
</div>
<div class="col-sm-12 col-md-12 col-xl-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Konten Berita</h3>
    </div>
    <div class="card-body">
      <div class="form-group">
        <textarea class="form-control" id="berita" name="konten"><?php echo $value->konten_berita ?></textarea>
      </div>
    </div>
  </div>
</div>
<div class="col-sm-12 col-md-12 col-xl-12">
  <input type="submit" class="btn btn-primary btn-block" value="Update" name="update_brta">
</div>

<?php 
  echo form_close();
  endforeach; 
?>