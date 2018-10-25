$(document).ready(function() {
	var path = window.location.href;
      $('ul li a').each(function(){
        if (this.href === path) {
          $(this).closest('li').addClass('active');
        }
      });

	$(window).on('load', function() {
		$("#preloader").delay(600).fadeOut();
	});

	$('#nav .nav-collapse2').on('click', function() {
		$('#nav').toggleClass('open');
	});

	$('.work').magnificPopup({
		delegate: '.lightbox',
		gallery:{
				  enabled:true
				},
		type: 'image',
	});

	sma = function(val){
		var a = $("#sma");
		if (val.checked == true) {
			a.removeClass('hide');
			document.getElementById('nm_sma').setAttribute('required','required');
		} else {
			a.addClass('hide');
			document.getElementById('nm_sma').required = false;
		}
	}

	d3 = function(val){
		var b = $("#d3");
		if (val.checked == true) {
			b.removeClass('hide');
			document.getElementById('nm_univ_d3').setAttribute('required','required');
		} else {
			b.addClass('hide');
			document.getElementById('nm_univ_d3').required = false;
		}
	}

	s1 = function(val){
		var c = $("#s1");
		if (val.checked == true) {
			c.removeClass('hide');
			document.getElementById('nm_univ_s1').setAttribute('required','required');
		} else {
			c.addClass('hide');
			document.getElementById('nm_univ_s1').required = false;
		}
	}

	s2 = function(val){
		var d = $("#s2");
		if (val.checked == true) {
			d.removeClass('hide');
			document.getElementById('nm_univ_s2').setAttribute('required','required');
		} else {
			d.addClass('hide');
			document.getElementById('nm_univ_s2').required = false;
		}
	}

	penglmn = function(val){
		var f = $("#pengalaman");
		if (val.checked == true) {
			f.removeClass('hide');
			document.getElementById('masuk').setAttribute('required','required');
			document.getElementById('selesai').setAttribute('required','required');
			document.getElementById('durasi').setAttribute('required','required');
			document.getElementById('jabatan').setAttribute('required','required');
			document.getElementById('divisi').setAttribute('required','required');
		} else {
			f.addClass('hide');
			document.getElementById('masuk').required = false;
			document.getElementById('selesai').required = false;
			document.getElementById('durasi').required = false;
			document.getElementById('jabatan').required = false;
			document.getElementById('divisi').required = false;
		}
	}

});