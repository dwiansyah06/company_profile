<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="section-header text-center sm-padding" style="padding-top: 150px;">
		<h2 class="title">Form Pelatihan</h2>
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
	<div id="hilang">
		<img src="<?= base_url().'asset/img/tambah.png' ?>" style="width: 100%;">
	</div>
	<div id="hasil" style="display: none;">
		<img src="#" id="tampil" style="width: 100%;">
	</div>
	<p>
		Keterangan: <br> 
		* = Diisi jika ada,<br>
		foto ukuran 300*400 dengan latar belakang warna merah,<br>
		Setelah klik tombol daftar maka akan ditampilkan formulir beserta data anda dan jangan lupa untuk <strong>DOWNLOAD</strong> formulirnya.
	</p>
</div>
<div class="registrasi col-xs-12 col-sm-12 col-md-7 col-lg-7">
	<?php 
		$sukses = $this->session->flashdata('success');
		if ($sukses) {
			echo "<div class='alert alert-info'>
					<p>$sukses</p>
				  </div>";
		}

		$message = $this->session->flashdata('error');
		if($message){
			echo "<div class='alert alert-danger'>";
			foreach ($message as $value) {
				echo "<p>$value</p>";
			}
			echo "</div>";
		}
	?>
	<form class="form-horizontal" action="<?= base_url().'user/daftarpelatihan' ?>" method="post" enctype="multipart/form-data">
		<?php  
          echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
        ?>
	  <div class="form-group">
	    <label for="nama" class="col-xs-4 col-sm-4 col-md-4">Nama (Gelar)</label>
	    <div class="col-xs-8 col-sm-8 col-md-8">
	      <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Anda" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="prshn" class="col-xs-4 col-sm-4 col-md-4">Perusahaan*</label>
	    <div class="col-xs-8 col-sm-8 col-md-8">
	      <input type="text" name="prshn" class="form-control" id="prshn" placeholder="Nama Perusahaan (Jika Ada)">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="alamatP" class="col-xs-4 col-sm-4 col-md-4">Alamat Perusahaan*</label>
	    <div class="col-xs-8 col-sm-8 col-md-8">
	      <textarea class="form-control" name="alamat_p" id="alamatP" style="height: 150px;resize: none;" placeholder="Alamat Perusahaan (Jika Ada)"></textarea>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="telpP" class="col-xs-4 col-sm-4 col-md-4">No. Telp. Perusahaan*</label>
	    <div class="col-xs-8 col-sm-8 col-md-8">
	      <input type="text" name="telp_p" class="form-control" id="telpP" placeholder="Telepon Perusahaan (Jika Ada)">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="emailP" class="col-xs-4 col-sm-4 col-md-4">Email Perusahaan*</label>
	    <div class="col-xs-8 col-sm-8 col-md-8">
	      <input type="email" name="email_p" class="form-control" id="emailP" placeholder="Email Perusahaan (Jika Ada)">
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="alamat" class="col-xs-4 col-sm-4 col-md-4">Alamat Pribadi</label>
	    <div class="col-xs-8 col-sm-8 col-md-8">
	      <textarea class="form-control" name="alamat_pri" id="alamat" style="height: 150px;resize: none;" placeholder="Alamat Pribadi" required></textarea>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="email" class="col-xs-4 col-sm-4 col-md-4">Email Pribadi</label>
	    <div class="col-xs-8 col-sm-8 col-md-8">
	      <input type="email" name="email_pri" class="form-control" id="email" placeholder="Email anda" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="telp" class="col-xs-4 col-sm-4 col-md-4">No. Telp. Pribadi</label>
	    <div class="col-xs-8 col-sm-8 col-md-8">
	      <input type="number" name="telp_pri" class="form-control" id="telp" placeholder="Nomor Telepon Pribadi" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="tempat_lahir" class="col-xs-4 col-sm-4 col-md-4">Tempat Lahir</label>
	    <div class="col-xs-8 col-sm-8 col-md-8">
	      <input type="text" name="tmpt_lahir" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir Anda" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="TL" class="col-xs-4 col-sm-4 col-md-4">Tanggal Lahir</label>
	    <div class="col-xs-8 col-sm-8 col-md-8">
	      <input type="date" name="tgl" class="form-control" id="TL" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="agama" class="col-xs-4 col-sm-4 col-md-4">Agama</label>
	    <div class="col-xs-8 col-sm-8 col-md-8">
	      <input type="text" name="agama" class="form-control" id="agama" placeholder="Agama Anda" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="alergi" class="col-xs-4 col-sm-4 col-md-4">Alergi*</label>
	    <div class="col-xs-8 col-sm-8 col-md-8">
	      <input type="text" name="alergi" class="form-control" id="alergi" placeholder="Alergi anda (Jika Ada)">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-xs-4 col-sm-4 col-md-4">Jenis Pelatihan</label>
	    <div class="col-xs-8 col-sm-8 col-md-8">
	      <select class="form-control" name="pelatihan" required>
	      	<option disabled selected value="">Jenis Pelatihan</option>
	      	<?php 
	      		foreach($pelatihan as $value):
	      			echo "<option value='".$value->judul_pelatihan."'>".$value->judul_pelatihan."</option>";
	      		endforeach;
	      	?>
	      </select>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="foto" class="col-xs-4 col-sm-4 col-md-4">Foto</label>
	    <div class="col-xs-8 col-sm-8 col-md-8">
	      <input type="file" class="form-control" name="berkas" id="foto" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-xs-4 col-sm-4 col-md-4">Riwayat Pendidikan</label>
	    <div class="col-xs-8 col-sm-8 col-md-8">
	      <input type="checkbox" onClick="sma(this)">SMA &nbsp; 
	      <input type="checkbox" onClick="d3(this)">D3 &nbsp;
	      <input type="checkbox" onClick="s1(this)">S1 &nbsp;
	      <input type="checkbox" onClick="s2(this)">S2 
	    </div>
	  </div>
	  <div class="form-group hide" id="sma">
	    <label class="col-xs-4 col-sm-4 col-md-4">Nama SMA</label>
	    <div class="col-xs-8 col-sm-8 col-md-8">
	      <input type="text" name="nm_sma" class="form-control" id="nm_sma" placeholder="Nama SMA">
	    </div>
	  </div>
	  <div class="form-group hide" id="d3">
	    <label class="col-xs-4 col-sm-4 col-md-4">Nama Universitas</label>
	    <div class="col-xs-8 col-sm-8 col-md-8">
	      <input type="text" name="nm_univ_d3" class="form-control" id="nm_univ_d3" placeholder="Nama Universitas (D3)">
	    </div>
	  </div>
	  <div class="form-group hide" id="s1">
	    <label class="col-xs-4 col-sm-4 col-md-4">Nama Universitas</label>
	    <div class="col-xs-8 col-sm-8 col-md-8">
	      <input type="text" name="nm_univ_s1" class="form-control" id="nm_univ_s1" placeholder="Nama Universitas (S1)">
	    </div>
	  </div>
	  <div class="form-group hide" id="s2">
	    <label class="col-xs-4 col-sm-4 col-md-4">Nama Universitas</label>
	    <div class="col-xs-8 col-sm-8 col-md-8">
	      <input type="text" name="nm_univ_s2" class="form-control" id="nm_univ_s2" placeholder="Nama Universitas (S2)">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-xs-4 col-sm-4 col-md-4">Pengalaman Kerja*</label>
	    <div class="col-xs-8 col-sm-8 col-md-8">
	      <input type="checkbox" onClick="penglmn(this)"> Ada
	    </div>
	  </div>
	  <div class="hide" id="pengalaman">
  		<div class="form-group">
		    <label for="masuk" class="col-xs-4 col-sm-4 col-md-4">Tahun Masuk</label>
		    <div class="col-xs-8 col-sm-8 col-md-8">
		      <input type="text" class="form-control" id="masuk" name="tahun_masuk" placeholder="Tahun Masuk">
		    </div>
	  	</div>
	  	<div class="form-group">
		    <label for="selesai" class="col-xs-4 col-sm-4 col-md-4">Tahun Selesai</label>
		    <div class="col-xs-8 col-sm-8 col-md-8">
		      <input type="text" name="tahun_selesai" class="form-control" id="selesai" placeholder="Tahun Selesai">
		    </div>
	  	</div>
	  	<div class="form-group">
		    <label for="durasi" class="col-xs-4 col-sm-4 col-md-4">Lama Kerja (Tahun)</label>
		    <div class="col-xs-8 col-sm-8 col-md-8">
		      <input type="text" name="durasi" class="form-control" id="durasi" placeholder="Durasi Kerja (Tahun)">
		    </div>
	  	</div>
	  	<div class="form-group">
		    <label for="jabatan" class="col-xs-4 col-sm-4 col-md-4">Jabatan</label>
		    <div class="col-xs-8 col-sm-8 col-md-8">
		      <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Jabatan">
		    </div>
	  	</div>
	  	<div class="form-group">
		    <label for="divisi" class="col-xs-4 col-sm-4 col-md-4">Proyek/Unit Kerja/Divisi/Biro</label>
		    <div class="col-xs-8 col-sm-8 col-md-8">
		      <input type="text" name="unit" class="form-control" id="divisi" placeholder="Proyek/Unit Kerja/Divisi/Biro">
		    </div>
	  	</div>
	  </div>

	  <div class="form-group">
	    <div class="col-xs-12 col-sm-12 col-md-12">
	      <input type="submit" name="daftar" class="btn btn-primary btn-block" value="Daftar">
	    </div>
	  </div>
	</form>
</div>