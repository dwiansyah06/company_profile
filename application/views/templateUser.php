<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $judul ?></title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="<?= base_url().'asset/css/bootstrap.min.css' ?>" />
	<link type="text/css" rel="stylesheet" href="<?= base_url().'asset/css/magnific-popup.css' ?>" />
	<link rel="stylesheet" href="<?= base_url().'asset/css/font-awesome.min.css' ?>">
	<link type="text/css" rel="stylesheet" href="<?= base_url().'asset/css/style.css' ?>" />
</head>

<body>
	<header>
	  <nav id="nav" class="navbar fixed-nav">
	    <div class="container">
	      <?php echo $_header; ?>
	    </div>
	  </nav>
	</header>

	<div class="container" style="margin-bottom: 60px;">
		<div class="row">
			<?php echo $_content; ?>
		</div>
	</div>	
	
	<?php echo $_footer; ?>

	<div id="back-to-top"></div>
	<div id="preloader">
		<div class="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<script type="text/javascript" src="<?= base_url().'asset/js/jquery.min.js' ?>"></script>
	<script type="text/javascript" src="<?= base_url().'asset/js/bootstrap.min.js' ?>"></script>
	<script type="text/javascript" src="<?= base_url().'asset/js/jquery.magnific-popup.js' ?>"></script>
	<script type="text/javascript" src="<?= base_url().'asset/js/custom.js' ?>"></script>
	<script type="text/javascript">
	  function readURL(input){
	    if(input.files && input.files[0]){
	          var reader = new FileReader();
	          reader.onload = function(e){
	            $('#tampil').attr('src', e.target.result);
	          }
	          reader.readAsDataURL(input.files[0]);
	        }
	  }
	  $("#foto").change(function(){
	    readURL(this);
	        $('#hasil').show();
	        $('#hilang').hide();
	  });
	</script>

</body>
</html>