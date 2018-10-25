<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="section-header text-center sm-padding" style="padding-top: 150px;">
		<h2 class="title" style="color: #000;">Detail Berita</h2>
	</div>
</div>
<main id="main" class="col-md-9">
	<?php foreach($berita as $row => $value): ?>
	<div class="blog2">
		<div class="blog-img">
			<img class="img-responsive" src="<?= base_url().'asset/admin/images/berita/'.$value->gambar ?>">
		</div>
		<div class="blog-content">
			<ul class="blog-meta">
				<?php foreach($a[$row] as $isi): ?>
				<li><i class="fa fa-user"></i><?= $isi->username ?></li>
				<?php endforeach; ?>
				<li><i class="fa fa-clock-o"></i><?= date('d M', strtotime($value->tgl_upload)) ?></li>
			</ul>
			<h3><?= $value->judul_berita ?></h3>
			<?= $value->konten_berita ?>
		</div>
	</div>
	<?php endforeach; ?>
</main>

<aside id="aside" class="col-md-3">
	<div class="widget">
		<h3 class="title">Berita Terbaru</h3>
		<?php foreach($berita_terbaru as $fill): ?>
		<div class="widget-post">
			<a href="#">
				<img src="<?= base_url().'asset/admin/images/berita/'.$fill->gambar ?>" style="width: 100px;"> <?= $fill->judul_berita ?>
			</a>
			<ul class="blog-meta">
				<li><?= date('M d, Y', strtotime($fill->tgl_upload)) ?></li>
			</ul>
		</div>
		<?php endforeach; ?>
	</div>
</aside>