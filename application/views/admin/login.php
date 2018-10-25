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
    <title><?php echo $judul ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    
    <link rel="stylesheet" type="text/css" href="<?= base_url().'asset/admin/css/dashboard.css'; ?>">
  </head>
  <body class="">
    <div class="page">
      <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col col-login mx-auto">
              <div class="text-center mb-6">
                <img src="<?= base_url().'asset/admin/images/mylogo3.png' ?>" alt="">
              </div>
              <?php  
                echo form_open('login/loginProcess', 'class="card"');
              ?>
                <div class="card-body p-6">
                  <div class="card-title">Login to your account</div>

                  <?php
                    $message = $this->session->flashdata('error');
                    if ($message) {
                        echo "<div class='alert alert-icon alert-danger'>
                                <i class='fe fe-alert-triangle mr-2' aria-hidden='true'></i> $message
                              </div>";
                    }
                  ?>

                  <div class="form-group">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter username" autocomplete="off" required>
                  </div>
                  <div class="form-group">
                    <label class="form-label">
                      Password
                    </label>
                    <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off" required>
                  </div>
                  <div class="form-footer">
                    <input type="submit" class="btn btn-primary btn-block" name="login">
                  </div>
                </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>

  <script src="<?= base_url().'asset/admin/js/vendors/jquery-3.2.1.min.js' ?>"></script>
  <script src="<?= base_url().'asset/admin/js/vendors/bootstrap.bundle.min.js' ?>"></script>
  </body>
</html>