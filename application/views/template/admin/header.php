<div class="header py-4">
  <div class="container">
    <div class="d-flex">
      <a class="header-brand" href="">
        <img src="<?= base_url().'asset/admin/images/mylogo3.png' ?>" class="header-brand-img" alt="tabler logo">
      </a>
      <div class="d-flex order-lg-2 ml-auto">
        <div class="dropdown">
          <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown" style="padding: 1rem;">

            <?php foreach($user as $value): ?>
              <span class="avatar" style="background-image: url(<?= base_url().'asset/admin/images/foto/'.$value->foto; ?>)"></span>
              <span class="ml-2 d-none d-lg-block">
                <span class="text-default"><?php echo $value->username ?></span>
                <small class="text-muted d-block mt-1">Administrator</small>
              </span>
            <?php endforeach; ?>

          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
            <a class="dropdown-item" href="#">
              <i class="dropdown-icon fe fe-user"></i> Profile
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <i class="dropdown-icon fe fe-help-circle"></i> Need help?
            </a>
            <a class="dropdown-item" href="<?php echo base_url().'admin/logout/' ?>">
              <i class="dropdown-icon fe fe-log-out"></i> Sign out
            </a>
          </div>
        </div>
      </div>
      <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
        <span class="header-toggler-icon"></span>
      </a>
    </div>
  </div>
</div>

<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg order-lg-first">
        <ul class="nav nav-tabs border-0 flex-column flex-lg-row">

          <li class="nav-item">
            <a href="<?php echo base_url().'admin/' ?>" class="nav-link active"><i class="fe fe-home"></i> Home</a>
          </li>

          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-users"></i> Pelatihan</a>
            <div class="dropdown-menu dropdown-menu-arrow">
              <a href="<?php echo base_url().'admin/listPelatihan/' ?>" class="dropdown-item">List Pelatihan</a>
              <a href="<?php echo base_url().'admin/siswaPelatihan/' ?>" class="dropdown-item">Daftar Peserta Pelatihan</a>
            </div>
          </li>

          <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-users"></i> Kursus</a>
            <div class="dropdown-menu dropdown-menu-arrow">
              <a href="<?php echo base_url().'admin/kursus/' ?>" class="dropdown-item">List Kursus</a>
              <a href="<?php echo base_url().'admin/siswaKursus/' ?>" class="dropdown-item ">Daftar Peserta Kursus</a>
            </div>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url().'admin/galeri/' ?>" class="nav-link"><i class="fe fe-image"></i> Galeri</a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url().'admin/berita/' ?>" class="nav-link"><i class="fe fe-file-text"></i> Berita</a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url().'admin/testimoni/' ?>" class="nav-link"><i class="fe fe-user-check"></i> Testimoni</a>
          </li>

        </ul>
      </div>
    </div>
  </div>
</div>