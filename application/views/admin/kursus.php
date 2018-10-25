<div class="col-sm-12 col-md-12 col-lg-12">
  <button type="button" class="btn btn-pill btn-success" style="margin-bottom: 23px;" data-toggle="modal" data-target=".bd-example-modal-lg"><span class="fe fe-plus"></span> Tambah List Kursus</button>

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
      <h3 class="card-title">List Kursus</h3>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table card-table table-vcenter table-bordered text-nowrap" style="border: 1px solid #dee2e6">
          <thead>
            <tr>
              <th class="w-1">No.</th>
              <th>Judul Kursus</th>
              <th class="text-center">Biaya Pendaftaran</th>
              <th class="text-center">Biaya Kursus</th>
              <th class="text-center">Pelaksanaan</th>
              <th class="text-center">Icon</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
              <?php  
                $i = 1;
                foreach($kursus as $value):
              ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $value->judul_kursus ?></td>
                <td class="text-center">Rp <?php echo number_format($value->biaya_pendaftaran, 0, ",", ".") ?></td>
                <td class="text-center">Rp <?php echo number_format($value->biaya_kursus, 0, ",", ".") ?></td>
                <td class="text-center"><?php echo $value->pelaksanaan ?> Pertemuan</td>
                <td><center><img src="<?php echo base_url().'asset/admin/images/kursus/'.$value->icon ?>" style="width: 80px;"></center></td>
                <td>
                  <center><a id="edit" class="btn btn-icon btn-primary" 
                    data-toggle="modal" data-target="#modal-edit"
                    data-id = "<?php echo $value->id_kursus ?>" 
                    data-judul="<?php echo $value->judul_kursus ?>" 
                    data-pen="<?php echo $value->biaya_pendaftaran ?>" 
                    data-kur="<?php echo $value->biaya_kursus ?>"
                    data-pel="<?php echo $value->pelaksanaan ?>"
                    data-icon="<?php echo $value->icon ?>" style="color: #fff;"><i class="fe fe-edit-3"></i></a>

                  <a href="<?php echo base_url().'admin/delKursus/'.$value->id_kursus ?>" class="btn btn-icon btn-danger" OnClick="return confirm('Yakin Mau Dihapus?')"><i class="fe fe-trash"></i></a></center>
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
            <h4 class="modal-title">Tambah List Kursus</h4>
          </div>
        <?php echo form_open_multipart('admin/addKursus/') ?>
          <div class="modal-body">    
            <div class="form-group">
                <label class="form-label">Judul Kursus</label>
                <input type="text" class="form-control" name="judul_kursus" placeholder="Judul Kursus" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label class="form-label">Biaya Pendaftaran</label>
                <input type="number" class="form-control" name="biaya_pend" placeholder="Biaya Pendaftaran" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label class="form-label">Biaya Kursus</label>
                <input type="number" class="form-control" name="biaya_kursus" placeholder="Biaya Kursus" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label class="form-label">Pelaksanaan(Pertemuan)</label>
                <input type="number" class="form-control" name="pelaksanaan" placeholder="Berapa Kali Pertemuan" autocomplete="off" required>
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
            <input type="submit" class="btn btn-primary btn-block" name="tambah_kursus" value="Tambah">
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
            <h4 class="modal-title">Edit List Kursus</h4>
          </div>
        <?php echo form_open_multipart('admin/updKursus/'); ?>
          <div class="modal-body" id="modal-edit">    
        
        <div class="form-group">
            <label class="form-label">Judul Pelatihan</label>
            <input type="text" class="form-control" name="judul_kursus" autocomplete="off" id="judul">
            <input type="hidden" name="id_kursus" id="id_kur">
        </div>
        <div class="form-group">
            <label class="form-label">Harga Pendaftaran</label>
            <input type="number" class="form-control" name="biaya_pend" min="0" autocomplete="off" id="pen">
        </div>
        <div class="form-group">
            <label class="form-label">Harga Kursus</label>
            <input type="number" class="form-control" name="biaya_kursus" min="0" autocomplete="off" id="kur">
        </div>
        <div class="form-group">
            <label class="form-label">Pelaksanaan (Pertemuan)</label>
            <input type="number" class="form-control" name="pelaksanaan" min="0" autocomplete="off" id="pel">
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

<script>

  $(document).on("click", "#edit", function(){
    var id    = $(this).data('id');
    var judul = $(this).data('judul');
    var pen   = $(this).data('pen');
    var kur   = $(this).data('kur');
    var pel  = $(this).data('pel');
    var icon  = $(this).data('icon');

    $("#modal-edit #id_kur").val(id);
    $("#modal-edit #judul").val(judul);
    $("#modal-edit #pen").val(pen);
    $("#modal-edit #kur").val(kur);
    $("#modal-edit #pel").val(pel);
    $("#modal-edit #pict").attr("src","<?php echo base_url().'asset/admin/images/kursus/' ?>"+icon);
    $("#modal-edit #gambar").val(icon);
    
    
  });
</script>