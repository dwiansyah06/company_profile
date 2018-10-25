<div class="col-sm-12 col-md-12 col-lg-12">
	<button class="btn btn-pill btn-success" style="margin-bottom: 23px;" data-toggle="modal" data-target="#modal-default"><span class="fe fe-plus"></span> Tambah Daftar Pelatihan</button>
	
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
	    <h3 class="card-title">List Pelatihan</h3>
	  </div>
	  <div class="card-body">
	    <div class="table-responsive">
		    <table class="table card-table table-vcenter table-bordered text-nowrap" style="border: 1px solid #dee2e6">
		      <thead>
		        <tr>
		          <th class="w-1">No.</th>
		          <th>Judul Pelatihan</th>
		          <th class="text-center">Minimal Peserta</th>
		          <th class="text-center">Hari Latihan</th>
		          <th class="text-center">Harga In House</th>
		          <th class="text-center">Harga Off House</th>
		          <th class="text-center">Icon</th>
		          <th class="text-center">Action</th>
		        </tr>
		      </thead>
		      <tbody>
			<?php 
				$i = 1;
				foreach($pelatihan as $row): 
			?>
		        <tr>
		          <td><?php echo $i++; ?></td>
		          <td><?php echo $row->judul_pelatihan ?></td>
		          <td class="text-center"><?php echo $row->min_peserta ?></td>
		          <td class="text-center"><?php echo $row->hari_latihan ?></td>
		          <td class="text-center">Rp <?php echo number_format($row->harga_in_house, 0, ",", ".") ?></td>
		          <td class="text-center">Rp <?php echo number_format($row->harga_off_house, 0, ",", ".") ?></td>
		          <td><center><img src="<?php echo base_url().'asset/admin/images/pelatihan/'.$row->icon ?>" style="width: 80px;"></center></td>
		          <td>
		          	<center><a id="edit" class="btn btn-icon btn-primary" 
		          	  data-toggle="modal" data-target="#modal-edit"
		          	  data-id = "<?php echo $row->id_pelatihan ?>" 
		          	  data-judul="<?php echo $row->judul_pelatihan ?>" 
		          	  data-min="<?php echo $row->min_peserta ?>" 
		          	  data-hari="<?php echo $row->hari_latihan ?>" 
		          	  data-in="<?php echo $row->harga_in_house ?>" 
		          	  data-off="<?php echo $row->harga_off_house ?>" 
		          	  data-icon="<?php echo $row->icon ?>" style="color: #fff;"><i class="fe fe-edit-3"></i></a>

		          	<a href="<?php echo base_url().'admin/delPel/'.$row->id_pelatihan ?>" class="btn btn-icon btn-danger" OnClick="return confirm('Yakin Mau Dihapus?')"><i class="fe fe-trash"></i></a></center>
		          </td>
		        </tr>
		 	<?php endforeach; ?>
		      </tbody>
		    </table>
		  </div>
	  </div>
	</div>

	<!-- OPEN MODAL -->
		<div class="modal fade" id="modal-default">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h4 class="modal-title">Tambah List Pelatihan</h4>
		      </div>
			  <?php echo form_open_multipart('admin/addPelatihan'); ?>
		      <div class="modal-body">    
				
				<div class="form-group">
	                <label class="form-label">Judul Pelatihan</label>
	                <input type="text" class="form-control" name="judul_pelatihan" placeholder="Judul Pelatihan" autocomplete="off" required>
	            </div>
	            <div class="form-group">
	                <label class="form-label">Minimal Peserta</label>
	                <input type="number" class="form-control" name="min_peserta" placeholder="Minimal Peserta" min="0" autocomplete="off" required>
	            </div>
	            <div class="form-group">
	                <label class="form-label">Hari Latihan</label>
	                <input type="number" class="form-control" name="hari_latihan" placeholder="Hari Latihan" min="0" autocomplete="off" required>
	            </div>
	            <div class="form-group">
	                <label class="form-label">Harga In-House</label>
	                <input type="number" class="form-control" name="hrg_in_house" placeholder="Harga In-House" min="0" autocomplete="off" required>
	            </div>
	            <div class="form-group">
	                <label class="form-label">Harga Off-House</label>
	                <input type="number" class="form-control" name="hrg_of_house" placeholder="Harga Off-House" min="0" autocomplete="off" required>
	            </div>
	            <div class="form-group">
	                <label class="form-label">Icon</label>
	                <input type="file" class="form-control" name="icon" required>
	                <p style="margin-top: 10px; font-size: 12px; margin-bottom: 0">
	                	Ket: <br>
	                	- Ukuran Icon <strong>Wajib</strong> 256x256
	                </p>
	            </div>

		      </div>
		      <div class="modal-footer">
		        <input type="submit" name="add_pelatihan" class="btn btn-primary btn-block" value="Tambah Pelatihan">
		      </div>
			<?php echo form_close(); ?>
		    </div>
		  </div>
		</div>
		<!-- CLOSE MODAL -->

		<!-- OPEN MODAL -->
		<div class="modal fade" id="modal-edit">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h4 class="modal-title">Edit List Pelatihan</h4>
		      </div>
			  <?php echo form_open_multipart('admin/updPelatihan'); ?>
		      <div class="modal-body" id="modal-edit">    
				
				<div class="form-group">
	                <label class="form-label">Judul Pelatihan</label>
	                <input type="text" class="form-control" name="judul_pelatihan" autocomplete="off" id="judul">
	                <input type="hidden" name="id_pelatihan" id="id_pel">
	            </div>
	            <div class="form-group">
	                <label class="form-label">Minimal Peserta</label>
	                <input type="number" class="form-control" name="min_peserta" min="0" autocomplete="off" id="min">
	            </div>
	            <div class="form-group">
	                <label class="form-label">Hari Latihan</label>
	                <input type="number" class="form-control" name="hari_latihan" min="0" autocomplete="off" id="hari">
	            </div>
	            <div class="form-group">
	                <label class="form-label">Harga In-House</label>
	                <input type="number" class="form-control" name="hrg_in_house" min="0" autocomplete="off" id="inh">
	            </div>
	            <div class="form-group">
	                <label class="form-label">Harga Off-House</label>
	                <input type="number" class="form-control" name="hrg_of_house" min="0" autocomplete="off" id="off">
	            </div>
	            <div class="form-group">
	                <label class="form-label">Icon</label>
	                <center>
	                	<div id="hilang"><img id="pict" style="width: 30%; margin-bottom: 15px"></div>
	                	<div id="hasil" style="display: none;">
			                <img src="#" id="tampil" style="width: 30%; margin-bottom: 15px">
			              </div>
	                </center>
	                <input type="file" id="foto" class="form-control" name="icon">
	                <input type="hidden" name="icon_lama" id="gambar">
	                <p style="margin-top: 10px; font-size: 12px; margin-bottom: 0">
	                	Ket: <br>
	                	- Ukuran Icon <strong>Wajib</strong> 256x256
	                </p>
	            </div>

		      </div>
		      <div class="modal-footer">
		        <input type="submit" name="upd_pelatihan" class="btn btn-primary btn-block" value="Update Pelatihan">
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
    var judul 	= $(this).data('judul');
    var min 	= $(this).data('min');
    var hari 	= $(this).data('hari');
    var inh 	= $(this).data('in');
    var off 	= $(this).data('off');
    var icon 	= $(this).data('icon');

    $("#modal-edit #id_pel").val(id);
    $("#modal-edit #judul").val(judul);
    $("#modal-edit #min").val(min);
    $("#modal-edit #hari").val(hari);
    $("#modal-edit #inh").val(inh);
    $("#modal-edit #off").val(off);
    $("#modal-edit #pict").attr("src","<?php echo base_url().'asset/admin/images/pelatihan/' ?>"+icon);
    $("#modal-edit #gambar").val(icon);
    
    
  });
</script>