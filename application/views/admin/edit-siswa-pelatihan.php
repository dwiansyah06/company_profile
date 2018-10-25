<div class="col-sm-12 col-md-12 col-xl-12">
  <?php 
  	foreach($edit_sis_p as $row): 
  	echo form_open_multipart('admin/updSisPel/');
  ?>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Data Siswa Pelatihan</h3>
    </div>
    <div class="card-body">
      <center>
      	<div id="hilang">
      		<img src="<?php echo base_url().'asset/admin/images/siswa_pelatihan/'.$row->foto ?>" style="margin-bottom: 15px;">
      	</div>
      	<div id="hasil" style="display: none;">
	        <img src="#" id="tampil" style="margin-bottom: 15px;">
	    </div>
      </center>
      <div class="form-group">
      	<label class="form-label">Nama Siswa</label>
        <input type="text" class="form-control" name="nama_siswa" value="<?= $row->nama_siswa ?>" autocomplete="off">
        <input type="hidden" name="id_siswa_pelatihan" value="<?= $row->id_siswa_pelatihan ?>">
      </div>
      <div class="form-group">
      	<label class="form-label">Perusahaan</label>
        <input type="text" class="form-control" name="nama_perusahaan" value="<?= $row->nama_perusahaan ?>" autocomplete="off">
      </div>
      <div class="form-group">
      	<label class="form-label">Alamat Perusahaan</label>
        <textarea class="form-control" name="alamat_perusahaan" style="height: 150px;resize: none;"><?= $row->alamat_perusahaan ?></textarea>
      </div>
      <div class="form-group">
      	<label class="form-label">No. Telp. Perusahaan</label>
        <input type="text" class="form-control" name="telp_perusahaan" value="<?= $row->telp_perusahaan ?>" autocomplete="off">
      </div>
      <div class="form-group">
      	<label class="form-label">Email Perusahaan</label>
        <input type="text" class="form-control" name="email_perusahaan" value="<?= $row->email_perusahaan ?>" autocomplete="off">
      </div>
      <div class="form-group">
      	<label class="form-label">Alamat Pribadi</label>
        <textarea class="form-control" name="alamat_p" style="height: 150px;resize: none;"><?= $row->alamat_pribadi ?></textarea>
      </div>
      <div class="form-group">
      	<label class="form-label">Email Pribadi</label>
        <input type="text" class="form-control" name="email_p" value="<?= $row->email_pribadi ?>" autocomplete="off">
      </div>
      <div class="form-group">
      	<label class="form-label">No. Telp. Pribadi</label>
        <input type="text" class="form-control" name="telp_p" value="<?= $row->telp_pribadi ?>" autocomplete="off">
      </div>
      <div class="form-group">
      	<label class="form-label">Tempat Lahir</label>
        <input type="text" class="form-control" name="tempat_lahir" value="<?= $row->tempat_lahir ?>" autocomplete="off">
      </div>
      <div class="form-group">
      	<label class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control" name="tanggal_lahir" value="<?= $row->tanggal_lahir ?>" autocomplete="off">
      </div>
      <div class="form-group">
	    <label class="form-label">Agama</label>
	    <input type="text" class="form-control" name="agama" value="<?= $row->agama ?>">
	  </div>
	  <div class="form-group">
	    <label class="form-label">Alergi</label>
	    <input type="text" class="form-control" name="alergi" value="<?= $row->alergi ?>">
	  </div>
	  <div class="form-group">
	    <label class="form-label">Jenis Pelatihan</label>
	    <label><?= $row->jenis_pelatihan ?></label>
	    <input type="hidden" name="pelatihan_lama" value="<?= $row->jenis_pelatihan ?>">
	  </div>
	  <div class="form-group">
	    <label class="form-label">Ganti Pelatihan</label>
	      <select class="form-control" name="pelatihan">
	      	<option disabled selected value="">Ganti Pelatihan</option>
			<?php  
				foreach($pelatihan as $value):
					echo "<option value='".$value->judul_pelatihan."'>$value->judul_pelatihan</option>";
				endforeach;
			?>
	      </select>
	  </div>
	  <div class="form-group">
	    <label class="form-label">Nama SMA</label>
	    <input type="text" class="form-control" name="nm_sma" value="<?= $row->nama_sma ?>">
	  </div>
	  <div class="form-group">
	    <label class="form-label">Nama Universitas</label>
	    <input type="text" class="form-control" name="nm_univ_d3" value="<?= $row->nama_d3 ?>">
	  </div>
	  <div class="form-group">
	    <label class="form-label">Nama Universitas</label>
	    <input type="text" class="form-control" name="nm_univ_s1" value="<?= $row->nama_s1 ?>">
	  </div>
	  <div class="form-group">
	    <label class="form-label">Nama Universitas</label>
	    <input type="text" class="form-control" name="nm_univ_s2" value="<?= $row->nama_s2 ?>">
	  </div>
	  <div class="form-group">
		    <label class="form-label">Tahun Masuk</label>
		    <input type="text" class="form-control" name="tahun_masuk" value="<?=  $row->tahun_masuk ?>">
	  	</div>
	  	<div class="form-group">
		    <label class="form-label">Tahun Selesai</label>
		    <input type="text" class="form-control" name="tahun_selesai" value="<?= $row->tahun_keluar ?>">
	  	</div>
	  	<div class="form-group">
		    <label class="form-label">Lama Kerja (Tahun)</label>
		    <input type="text" class="form-control" name="durasi" value="<?= $row->lama_kerja ?>">
	  	</div>
	  	<div class="form-group">
		    <label class="form-label">Jabatan</label>
		    <input type="text" class="form-control" name="jabatan" value="<?= $row->jabatan ?>">
	  	</div>
	  	<div class="form-group">
		    <label class="form-label">Proyek/Unit Kerja/Divisi/Biro</label>
		    <input type="text" class="form-control" name="unit" value="<?= $row->tahun_keluar ?>">
	  	</div>
	  	<div class="form-group">
		    <label class="form-label">Foto (<strong>Wajib</strong> Ukuran 300x400)</label>
		    <input type="file" class="form-control" name="berkas" id="foto">
		    <input type="hidden" name="berkas_lama" value="<?= $row->foto ?>">
		    <input type="hidden" name="tgl_daftar" value="<?= $row->tgl_daftar ?>">
		  </div>
	  </div>
	   <div class="card-footer">
	  	<input type="submit" name="upd_data" class="btn btn-primary btn-block" value="Update Data">
	  </div>
    </div>
  <?php 
  	echo form_close();
  	endforeach; 
  ?>
</div>