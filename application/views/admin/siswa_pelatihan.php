<div class="col-sm-12 col-md-12 col-lg-12">
	<button type="button" class="btn btn-pill btn-success" style="margin-bottom: 23px;" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="fe fe-plus"></span> Tambah Siswa Pelatihan</button>

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
	    <h3 class="card-title">List Siswa Pelatihan</h3>
	  </div>
	  <div class="card-body">
	    <div class="table-responsive">
		    <table class="table card-table table-vcenter table-bordered text-nowrap" style="border: 1px solid #dee2e6">
		      <thead>
		        <tr>
		          <th class="w-1">No.</th>
		          <th>Nama Siswa</th>
		          <th>Nomor Telfon</th>
		          <th>Jenis Pelatihan</th>
		          <th>Tanggal Daftar</th>
		          <th class="text-center">foto</th>
		          <th class="text-center">Status</th>
		          <th class="text-center">action</th>
		        </tr>
		      </thead>
		      <tbody>
				<?php  
					$i = 1;
					foreach($siswa as $row):
				?>
		        <tr>
		          <td><?php echo $i++ ?></td>
		          <td><?php echo $row->nama_siswa ?></td>
		          <td><?php echo $row->telp_pribadi ?></td>
		          <td><?php echo $row->jenis_pelatihan ?></td>
		          <td class="text-center"><?php echo $row->tgl_daftar ?></td>
		          <td><center><span class="avatar avatar-xl" style="background-image: url(<?= base_url().'asset/admin/images/siswa_pelatihan/'.$row->foto; ?>)"></span></center></td>
		          <td>
		          	<a href="#" class="btn btn-square btn-secondary">Belum dibayar</a>
		          </td>
		          <td>
		          	<center><a href="<?php echo base_url().'admin/editSiswaPelatihan/'.$row->id_siswa_pelatihan ?>" class="btn btn-icon btn-primary"><i class="fe fe-edit-3"></i></a>
		          	<a href="<?php echo base_url().'admin/delSisPel/'.$row->id_siswa_pelatihan ?>" class="btn btn-icon btn-danger" OnClick="return confirm('Yakin Mau Dihapus?')"><i class="fe fe-trash"></i></a></center>
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
		        <h4 class="modal-title">Tambah Siswa Pelatihan</h4>
		      </div>
			  <?php echo form_open_multipart('admin/addSiswaPelatihan/') ?>
		      <div class="modal-body">    
				
				<div class="form-group">
	                <label class="form-label">Nama(Gelar)</label>
	                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" autocomplete="off" required>
	            </div>
	            <div class="form-group">
				    <label class="form-label">Perusahaan*</label>
				    <input type="text" class="form-control" name="prshn" placeholder="Nama Perusahaan (Jika Ada)">
				  </div>
				  <div class="form-group">
				    <label class="form-label">Alamat Perusahaan*</label>
				    <textarea class="form-control" name="alamat_p" style="height: 150px;resize: none;" placeholder="Alamat Perusahaan (Jika Ada)"></textarea>
				  </div>
				  <div class="form-group">
				    <label class="form-label">No. Telp. Perusahaan*</label>
				    <input type="text" class="form-control" name="telp_p" placeholder="Telepon Perusahaan (Jika Ada)">
				  </div>
				  <div class="form-group">
				    <label class="form-label">Email Perusahaan*</label>
				    <input type="email" class="form-control" name="email_p" placeholder="Email Perusahaan (Jika Ada)">
				  </div>
				  <div class="form-group">
				    <label class="form-label">Alamat Pribadi</label>
				    <textarea class="form-control" name="alamat_pri" style="height: 150px;resize: none;" placeholder="Alamat Pribadi" required></textarea>
				  </div>
				  <div class="form-group">
				    <label class="form-label">Email Pribadi</label>
				    <input type="email" class="form-control" name="email_pri" placeholder="Email anda" required>
				  </div>
				  <div class="form-group">
				    <label class="form-label">No. Telp. Pribadi</label>
				    <input type="number" class="form-control" name="telp_pri" placeholder="Nomor Telepon Pribadi" required>
				  </div>
				  <div class="form-group">
				    <label class="form-label">Tempat Lahir</label>
				    <input type="text" class="form-control" name="tmpt_lahir" placeholder="Tempat Lahir Anda" required>
				  </div>
				  <div class="form-group">
				    <label class="form-label">Tanggal Lahir</label>
				    <input type="date" class="form-control" name="tgl" required>
				  </div>
				  <div class="form-group">
				    <label class="form-label">Agama</label>
				    <input type="text" class="form-control" name="agama" placeholder="Agama Anda" required>
				  </div>
				  <div class="form-group">
				    <label class="col-xs-4 col-sm-4 col-md-4">Alergi*</label>
				    <input type="text" class="form-control" name="alergi" placeholder="Alergi anda (Jika Ada)">
				  </div>
				  <div class="form-group">
				    <label class="form-label">Jenis Pelatihan</label>
				      <select class="form-control" name="pelatihan" required>
				      	
						<?php  
							foreach($pelatihan as $value):
								echo "<option value='".$value->judul_pelatihan."'>$value->judul_pelatihan</option>";
							endforeach;
						?>

				      </select>
				  </div>
				  <div class="form-group">
				    <label class="form-label">Riwayat Pendidikan</label>
				    <input type="checkbox" onClick="sma(this)">SMA &nbsp; 
				    <input type="checkbox" onClick="d3(this)">D3 &nbsp;
				    <input type="checkbox" onClick="s1(this)">S1 &nbsp;
				    <input type="checkbox" onClick="s2(this)">S2
				  </div>
				  <div class="form-group hide" id="sma">
				    <label class="form-label">Nama SMA</label>
				    <input type="text" class="form-control" id="nm_sma" name="nm_sma" placeholder="Nama SMA">
				  </div>
				  <div class="form-group hide" id="d3">
				    <label class="form-label">Nama Universitas</label>
				    <input type="text" class="form-control" id="nm_univ_d3" name="nm_univ_d3" placeholder="Nama Universitas (D3)">
				  </div>
				  <div class="form-group hide" id="s1">
				    <label class="form-label">Nama Universitas</label>
				    <input type="text" class="form-control" id="nm_univ_s1" name="nm_univ_s1" placeholder="Nama Universitas (S1)">
				  </div>
				  <div class="form-group hide" id="s2">
				    <label class="form-label">Nama Universitas</label>
				    <input type="text" class="form-control" id="nm_univ_s2" name="nm_univ_s2" placeholder="Nama Universitas (S2)">
				  </div>
				  <div class="form-group">
				    <label class="form-label">Pengalaman Kerja*</label>
				    <input type="checkbox" onClick="penglmn(this)"> Ada
				  </div>
				  <div class="hide" id="pengalaman">
			  		<div class="form-group">
					    <label class="form-label">Tahun Masuk</label>
					    <input type="text" class="form-control" id="masuk" name="tahun_masuk" placeholder="Tahun Masuk">
				  	</div>
				  	<div class="form-group">
					    <label class="form-label">Tahun Selesai</label>
					    <input type="text" class="form-control" id="selesai" name="tahun_selesai" placeholder="Tahun Selesai">
				  	</div>
				  	<div class="form-group">
					    <label class="form-label">Lama Kerja (Tahun)</label>
					    <input type="text" class="form-control" id="durasi" name="durasi" placeholder="Durasi Kerja (Tahun)">
				  	</div>
				  	<div class="form-group">
					    <label class="form-label">Jabatan</label>
					    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan">
				  	</div>
				  	<div class="form-group">
					    <label class="form-label">Proyek/Unit Kerja/Divisi/Biro</label>
					    <input type="text" class="form-control" id="divisi" name="unit" placeholder="Proyek/Unit Kerja/Divisi/Biro">
				  	</div>
				  </div>
				  <div class="form-group">
				    <label class="form-label">Foto (<strong>Wajib</strong> Ukuran 300x400)</label>
				    <input type="file" class="form-control" name="berkas" id="foto" required>
				  </div>

		      </div>
		      <div class="modal-footer">
		        <input type="submit" class="btn btn-primary btn-block" name="tambah_siswa" value="Tambah">
		      </div>
			<?php form_close(); ?>
	    </div>
	  </div>
	</div>

</div>