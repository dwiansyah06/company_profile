<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <title><?= $judul ?></title>
    <link rel="stylesheet" href="<?php echo base_url().'asset/admin/plugins/font-awesome/css/font-awesome.min.css' ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    
    <link rel="stylesheet" type="text/css" href="<?= base_url().'asset/admin/css/dashboard.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url().'asset/admin/css/summernote.css' ?>">
    <link href="<?= base_url().'asset/admin/css/jquery.autocomplete.css' ?>" rel="stylesheet" />
    <script src="<?= base_url().'asset/admin/js/vendors/jquery-3.2.1.min.js' ?>"></script>
    <script src="<?= base_url().'asset/admin/js/jquery.autocomplete.js' ?>"></script>
  </head>

  <body class="">
    <div class="page">
      <div class="page-main">
        <?php echo $_header; ?>
          <div class="my-3 my-md-5">
              <div class="container">
                <div class="row">
                    <?php echo $_content; ?>
                </div>
            </div>
          </div>
      </div>
      <?php echo $_footer; ?>
    </div>
  
  <script src="<?= base_url().'asset/admin/js/vendors/bootstrap.bundle.min.js' ?>"></script>
  <script src="<?= base_url().'asset/admin/js/summernote.js' ?>"></script>
  <script src="<?= base_url().'asset/admin/js/custom.js' ?>"></script>
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

    $('#berita').summernote({
        height: 300, // set editor height
          minHeight: null, // set minimum height of editor
          maxHeight: null, // set maximum height of editor
          focus: true, // set focus to editable area after initializing summernote
          toolbar: [
              ['style', ['style']],
              ['font', ['bold', 'italic', 'underline', 'clear']],
              ['fontname', ['fontname']],
              ['color', ['color']],
              ['para', ['ul', 'ol', 'paragraph']],
              ['height', ['height']],
              ['table', ['table']],
              ['insert', ['link', 'hr']]
          ],

          onPaste: function (e) {
              var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
              e.preventDefault();
              setTimeout(function () {
                  document.execCommand('insertText', false, bufferText);
              }, 10);
           }
      });
  </script>
  <script type='text/javascript'>
        var site = "<?php echo base_url();?>";
        $(function(){
            $('#autocomplete1').autocomplete({
                serviceUrl: site+'/admin/search',
                onSelect: function (suggestion) {
                    $('#id').val(''+suggestion.id);
                    $('#txt_foto').val(''+suggestion.foto);
                    $('#foto').attr("src",site+'asset/admin/images/siswa_pelatihan/'+suggestion.foto);
                }
            });

            $('#autocomplete2').autocomplete({
                serviceUrl: site+'/admin/searchKursus',
                onSelect: function (suggestion) {
                    $('#id').val(''+suggestion.id);
                    $('#txt_foto').val(''+suggestion.foto);
                    $('#foto').attr("src",site+'asset/admin/images/siswa_kursus/'+suggestion.foto);
                }
            });
        });
    </script>

  </body>
</html>