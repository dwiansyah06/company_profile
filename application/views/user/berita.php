<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="section-header text-center sm-padding" style="padding-top: 150px;">
		<h2 class="title">Berita</h2>
	</div>
</div>
<?php foreach($berita->result() as $baris => $fill): ?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
	<div class="blog">
		<div class="blog-img">
			<img class="img-responsive" src="<?= base_url().'asset/admin/images/berita/'.$fill->gambar ?>">
		</div>
		<div class="blog-content">
			<ul class="blog-meta">
				<?php foreach($a[$baris] as $fill2): ?>
				<li><i class="fa fa-user"></i><?= $fill2->username ?></li>
				<?php endforeach; ?>
				<li><i class="fa fa-clock-o"></i><?= date('d M', strtotime($fill->tgl_upload)) ?></li>
			</ul>
			<h3 style="margin-bottom: 10px;"><?= $fill->judul_berita ?></h3>
			<?php
				$kalimat = $fill->konten_berita;
				$result=substr($kalimat, 0, 190);
				echo "$result ...";
			?>
			<a href="<?= base_url().'user/detailBerita/'.$fill->id_berita ?>">Read more</a>
		</div>
	</div>
</div>
<?php endforeach; ?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?php echo $pagination; ?>
    </div>
</div>