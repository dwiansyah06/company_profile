<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="section-header text-center sm-padding" style="padding-top: 150px;">
		<h2 class="title">Galeri</h2>
	</div>
</div>
<?php foreach($galeri->result() as $value): ?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 work">
	<img class="img-responsive" src="<?= base_url().'asset/admin/images/galeri/'.$value->foto ?> ?>" alt="">
	<div class="work-content">
		<div class="work-link">
			<a class="lightbox" href="<?= base_url().'asset/admin/images/galeri/'.$value->foto ?>"><i class="fa fa-search"></i></a>
		</div>
	</div>
</div>
<?php endforeach; ?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?php echo $pagination; ?>
    </div>
</div>