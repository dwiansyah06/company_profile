<div class="col-sm-12 col-md-12 col-lg-12">
	<button type="button" class="btn btn-pill btn-success" style="margin-bottom: 23px;" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="fe fe-plus"></span> Tambah Siswa Kursus</button>
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

<div class="card">
  <div class="card-header">
    <h3 class="card-title">List Siswa Kursus</h3>
  </div>
  <div class="card-body">
    <div class="table-responsive">
	    <table class="table card-table table-vcenter table-bordered text-nowrap" style="border: 1px solid #dee2e6">
	      <thead>
	        <tr>
	          <th class="w-1">No.</th>
	          <th>Nama Siswa</th>
	          <th class="text-center">Nomor Telfon</th>
	          <th class="text-center">Jenis Kursus</th>
	          <th class="text-center">Tanggal Daftar</th>
	          <th class="text-center">foto</th>
	          <th class="text-center">Status</th>
	          <th class="text-center">action</th>
	        </tr>
	      </thead>
	      <tbody>
	        <?php  
	        	$i = 1;
	        	foreach($siswa_kursus as $value):
	        ?>
	         <tr>
	        	<td><?php echo $i++; ?></td>
	        	<td><?php echo $value->nama; ?></td>
	        	<td class="text-center"><?php echo $value->nmr_hp; ?></td>
	        	<td><?php echo $value->jenis_kursus; ?></td>
	        	<td class="text-center"><?php echo date('d F Y', strtotime($value->tanggal_daftar)) ?></td>
	        	<td><center><span class="avatar avatar-xl" style="background-image: url(<?= base_url().'asset/admin/images/siswa_kursus/'.$value->foto; ?>)"></span></center></td>
	        	<td><center><a href="#" class="btn btn-square btn-sm btn-secondary">Belum dibayar</a></center></td>
	        	<td>
	        		<center><a id="edit" class="btn btn-icon btn-primary" 
		          	  data-toggle="modal" data-target="#modal-edit"
		          	  data-id = "<?php echo $value->id_siswa_kursus ?>" 
		          	  data-nama="<?php echo $value->nama ?>" 
		          	  data-tmpt="<?php echo $value->tempat_lahir ?>" 
		          	  data-tgl="<?php echo $value->tanggal_lahir ?>" 
		          	  data-jk="<?php echo $value->jenis_kelamin ?>" 
		          	  data-almt="<?php echo $value->alamat ?>" 
		          	  data-nmr="<?php echo $value->nmr_hp ?>" 
		          	  data-email="<?php echo $value->email ?>" 
		          	  data-jkur="<?php echo $value->jenis_kursus ?>"
		          	  data-tgldftr="<?php echo $value->tanggal_daftar ?>"
		          	  data-foto="<?php echo $value->foto ?>" 
		          	  style="color: #fff;"><i class="fe fe-edit-3"></i></a>

		          	<a href="<?php echo base_url().'admin/delSisKur/'.$value->id_siswa_kursus ?>" class="btn btn-icon btn-danger" OnClick="return confirm('Yakin Mau Dihapus?')"><i class="fe fe-trash"></i></a></center>
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
	        <h4 class="modal-title">Tambah Siswa Kursus</h4>
	      </div>
	    <?php echo form_open_multipart('admin/addSiswaKursus/') ?>
	      <div class="modal-body">    
	        <div class="form-group">
	            <label class="form-label">Nama Lengkap</label>
	            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" autocomplete="off" required>
	        </div>
	        <div class="form-group">
	            <label class="form-label">Tempat Lahir</label>
	            <input type="text" class="form-control" name="tmpt_lahir" placeholder="Tempat Lahir" autocomplete="off" required>
	        </div>
	        <div class="form-group">
	            <label class="form-label">Tanggal Lahir</label>
	            <input type="date" class="form-control" name="tgl_lahir" autocomplete="off" required>
	        </div>
	        <div class="form-group">
	            <label class="form-label">Jenis Kelamin</label>
	            <select class="form-control" name="jk" required>
	            	<option disabled selected>Jenis Kelamin</option>
	            	<option value="laki-laki">Laki-Laki</option>
	            	<option value="perempuan">Perempuan</option>
	            </select>
	        </div>
	        <div class="form-group">
	            <label class="form-label">Alamat</label>
	            <textarea class="form-control" placeholder="Alamat" name="alamat" style="height: 150px;resize: none;" required></textarea>
	        </div>
	        <div class="form-group">
	            <label class="form-label">Nomor Hp</label>
	            <input type="number" class="form-control" name="no_hp" placeholder="Nomor Hp" autocomplete="off" required>
	        </div>
	        <div class="form-group">
	            <label class="form-label">Email</label>
	            <input type="email" class="form-control" name="email" placeholder="Email" autocomplete="off" required>
	        </div>
	        <div class="form-group">
	            <label class="form-label">Jenis Kursus</label>
	            <select class="form-control" name="jenis_kursus" required>
	            	<option disabled selected>Jenis Kursus</option>
	            	<?php  
	            		foreach ($list_kursus as $row) {
	            			echo "<option value='".$row->judul_kursus."'>".$row->judul_kursus."</option>";
	            		}
	            	?>
	            </select>
	        </div>
	        <div class="form-group">
	            <label class="form-label">Foto</label>
	            <input type="file" class="form-control" name="foto" required>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <input type="submit" class="btn btn-primary btn-block" name="tambah_sispel" value="Tambah">
	      </div>
	    <?php echo form_close(); ?>
	  </div>
	</div>
</div>

<!-- OPEN MODAL -->
<div class="modal fade" id="modal-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit List Pelatihan</h4>
      </div>
	  <?php echo form_open_multipart('admin/updSiswaKursus'); ?>
      <div class="modal-body" id="modal-edit">    
		
		<input type="hidden" name="id_siswa_kursus" id="id_sisKur">
		<input type="hidden" name="tgl_daftar" id="tgldftr">
		<input type="hidden" name="jk_lama" id="jk_lama">
		<input type="hidden" name="jkur_lama" id="jkur_lama">
		<div class="form-group">
            <label class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" autocomplete="off" id="nm_sis">
        </div>
        <div class="form-group">
            <label class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" name="tmpt_lahir" autocomplete="off" id="tmpt">
        </div>
        <div class="form-group">
            <label class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir" autocomplete="off" id="tgl">
        </div>
        <div class="form-group">
            <label class="form-label">Jenis Kelamin</label>
            <label class="form-label" id="jk"></label>
        </div>
        <div class="form-group">
            <label class="form-label">Ubah Jenis Kelamin</label>
            <select class="form-control" name="jk" required>
            	<option disabled selected>Ubah Jenis Kelamin</option>
            	<option value="laki-laki">Laki-Laki</option>
            	<option value="perempuan">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat" style="height: 150px;resize: none;" id="alamat"></textarea>
        </div>
        <div class="form-group">
            <label class="form-label">Nomor Hp</label>
            <input type="number" class="form-control" name="no_hp" autocomplete="off" id="nmr">
        </div>
        <div class="form-group">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" autocomplete="off" id="email">
        </div>
        <div class="form-group">
            <label class="form-label">Jenis Kursus</label>
            <label class="form-label" id="jkur"></label>
        </div>
        <div class="form-group">
            <label class="form-label">Ubah Jenis Kursus</label>
            <select class="form-control" name="jenis_kursus" required>
            	<option disabled selected>Ubah Jenis Kursus</option>
            	<?php  
	            		foreach ($list_kursus as $row) {
	            			echo "<option value='".$row->judul_kursus."'>".$row->judul_kursus."</option>";
	            		}
	            	?>
            </select>
        </div>
        <div class="form-group">
            <label class="form-label">Foto</label>
            <div id="hilang"><center><img src="" id="pict" style="margin-bottom: 15px;"></center></div>
			<div id="hasil" style="display: none;">
	        	<center><img src="#" id="tampil" style="margin-bottom: 15px"></center>
	        </div>
            <input type="file" class="form-control" id="foto" name="foto">
            <input type="hidden" name="foto_lama" id="gambar">
        </div>

      </div>
      <div class="modal-footer">
        <input type="submit" name="upd_siswa_kursus" class="btn btn-primary btn-block" value="Update Pelatihan">
      </div>
	<?php echo form_close(); ?>
    </div>
  </div>
</div>
<!-- CLOSE MODAL -->

</div>
<script>
  $(document).on("click", "#edit", function(){
  	var id 		= $(this).data('id');
    var nama 	= $(this).data('nama');
    var tmpt 	= $(this).data('tmpt');
    var tgl 	= $(this).data('tgl');
    var jk 		= $(this).data('jk');
    var almt 	= $(this).data('almt');
    var nmr 	= $(this).data('nmr');
    var email 	= $(this).data('email');
    var jkur 	= $(this).data('jkur');
    var tgldftr = $(this).data('tgldftr');
    var foto 	= $(this).data('foto');

    $("#modal-edit #id_sisKur").val(id);
    $("#modal-edit #nm_sis").val(nama);
    $("#modal-edit #tmpt").val(tmpt);
    $("#modal-edit #tgl").val(tgl);
    $("#modal-edit #jk_lama").val(jk);
    document.getElementById("jk").innerHTML=jk;
    $("#modal-edit #alamat").val(almt);
    $("#modal-edit #nmr").val(nmr);
    $("#modal-edit #email").val(email);
    $("#modal-edit #jkur_lama").val(jkur);
    document.getElementById("jkur").innerHTML=jkur;
    $("#modal-edit #tgldftr").val(tgldftr);

    $("#modal-edit #pict").attr("src","<?php echo base_url().'asset/admin/images/siswa_kursus/' ?>"+foto);
    $("#modal-edit #gambar").val(foto);
    
    
  });
</script>