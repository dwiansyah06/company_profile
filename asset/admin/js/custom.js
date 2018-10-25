$(document).ready(function() {
	// var path = window.location.href;
 //      $('ul li a').each(function(){
 //        if (this.href === path) {
 //          $(this).closest('li').addClass('active');
 //        }
 //      });

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

	testiPelatihan = function(val){
		var i = $("#txtPelatihan");
		var gmbr = $("#foto");
		if (val.checked == true) {
			i.removeClass('hide');
			gmbr.removeClass('hide');
			document.getElementById('testi_kursus').setAttribute('disabled','disabled');
			document.getElementById('autocomplete1').setAttribute('required','required');
			document.getElementById('testi_kursus').required = false;
		} else {
			i.addClass('hide');
			gmbr.addClass('hide');
			document.getElementById('testi_kursus').disabled = false;
			document.getElementById('testi_kursus').setAttribute('required','required');
			document.getElementById('autocomplete1').value = null;
			document.getElementById('id').value = null;
			document.getElementById('txt_foto').value = null;
		}
	}

	testiKursus = function(val){
		var j = $("#txtKursus");
		var gmbr = $("#foto");
		if (val.checked == true) {
			j.removeClass('hide');
			gmbr.removeClass('hide');
			document.getElementById('testi_pelatihan').setAttribute('disabled','disabled');
			document.getElementById('autocomplete1').setAttribute('required','required');
			document.getElementById('testi_pelatihan').required = false;
		} else {
			j.addClass('hide');
			gmbr.addClass('hide');
			document.getElementById('testi_pelatihan').disabled = false;
			document.getElementById('testi_pelatihan').setAttribute('required','required');
			document.getElementById('autocomplete1').value = null;
			document.getElementById('id').value = null;
			document.getElementById('txt_foto').value = null;
		}
	}

});