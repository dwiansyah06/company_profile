<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="section-header text-center sm-padding" style="padding-top: 150px;">
		<h2 class="title">Form Kursus</h2>
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
	<form class="form-horizontal" action="<?= base_url().'user/daftarkursus' ?>" method="post" enctype="multipart/form-data">
	<?php  
      echo form_hidden($this->security->get_csrf_token_name(), $this->security->get_csrf_hash());
    ?>
	  <div class="form-group">
	    <label for="nama" class="col-xs-4 col-sm-4 col-md-4">Nama Lengkap</label>
	    <div class="col-xs-8 col-sm-8 col-md-8">
	      <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama Anda" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="nama" class="col-xs-4 col-sm-4 col-md-4">Tempat Lahir</label>
	    <div class="col-xs-8 col-sm-8 col-md-8">
	      <input type="text" name="tempat_lahir" class="form-control" id="nama" placeholder="Masukan Tempat Lahir Anda" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="TL" class="col-xs-4 col-sm-4 col-md-4">Tanggal Lahir</label>
	    <div class="col-xs-8 col-sm-8 col-md-8">
	      <input type="date" name="tanggal_lahir" class="form-control" id="TL" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="pelatihan" class="col-xs-4 col-sm-4 col-md-4">Jenis Kelamin</label>
	    <div class="col-xs-8 col-sm-8 col-md-8">
	      <select class="form-control" name="jk" required>
	      	<option disabled selected value>Jenis Kelamin</option>
	      	<option value="laki-laki">Laki Laki</option>
	      	<option value="perempuan">Perempuan</option>
	      </select>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="nama" class="col-xs-4 col-sm-4 col-md-4">Alamat</label>
	    <div class="col-xs-8 col-sm-8 col-md-8">
	      <textarea class="form-control" name="alamat" style="height: 150px;resize: none;" placeholder="Alamat Anda" required></textarea>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="nama" class="col-xs-4 col-sm-4 col-md-4">No. HP</label>
	    <div class="col-xs-8 col-sm-8 col-md-8">
	      <input type="text" name="no_hp" class="form-control" id="nama" placeholder="Masukan Nomor Hp Anda" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="nama" class="col-xs-4 col-sm-4 col-md-4">Email</label>
	    <div class="col-xs-8 col-sm-8 col-md-8">
	      <input type="email" name="email" class="form-control" id="nama" placeholder="Masukan Email Anda" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="pelatihan" class="col-xs-4 col-sm-4 col-md-4">Jenis Kursus</label>
	    <div class="col-xs-8 col-sm-8 col-md-8">
	      <select class="form-control" name="jenis_kursus" required>
	      	<option disabled selected value>Jenis Kursus</option>
	      	<?php 
	      		foreach($kursus as $value):
	      			echo "<option value='".$value->judul_kursus."'>".$value->judul_kursus."</option>";
	      		endforeach;
	      	?>
	      </select>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="foto" class="col-xs-4 col-sm-4 col-md-4">Foto</label>
	    <div class="col-xs-8 col-sm-8 col-md-8">
	      <input type="file" name="foto" class="form-control" id="foto" required>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-xs-12 col-sm-12 col-md-12">
	      <input type="submit" name="daftar" class="btn btn-primary btn-block" value="Daftar">
	    </div>
	  </div>
	</form>
</div>