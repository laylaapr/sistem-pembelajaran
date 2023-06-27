<!DOCTYPE html>
<html>
<head>
	<?php
	include"head.php"
	?>
	  <link href="<?php echo base_url('assets/css/temp/nucleo-icons.css')?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/temp/nucleo-svg.css')?>" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="<?php echo base_url('assets/css/temp/material-dashboard.css?v=3.0.2')?>" rel="stylesheet" />

  <title></title>
</head>
<body>

  <?php
		include "navbaradmin.php";
	?>
	<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">

          </div>
          <ul class="navbar-nav  justify-content-end">

          	<li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <!-- Notif Atas -->
    <div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-12 col-md-12 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <h5 class="text-white pl-2">Navigation </h5>
              </div>
            </div>
            <div class="card-body">
                <?php
                  include "navigation.php";
                ?>
            </div>
          </div>
        </div>
        
      </div>
      <!-- End Notif Atas -->

      <!-- info kedua -->

      <div class="row">
        <div class="col-lg-12 col-md-12 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <h5 class="text-white pl-2">Tambah Guru</h5>
              </div>
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo base_url('aksitambahguruadmin')?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" name="i1" required>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" required name="i2" required>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIP Guru</label>
                        <input type="text" class="form-control" name="i3" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Guru</label>
                        <input type="text" class="form-control" name="i4" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jenis Kelamin</label>
                        <select class="form-control" name="i5">
                            <option values="Laki-Laki">Laki-Laki</option>
                            <option values="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">No Telpon</label>
                        <input type="text" class="form-control" name="i6" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <input type="text" class="form-control" name="i7" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Agama</label>
                        <select class="form-control" name="i8">
                            <option values="Islam">Islam</option>
                            <option values="Kristen">Kristen</option>
                            <option values="Hindhu">Hindhu</option>
                            <option values="Buddha">Buddha</option>
                            <option values="Kong Hu Cu">Kong Hu Cu</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>      
            </div>
          </div>
        </div>
        
      </div>

      <!-- End info kedua -->
      
       <?php
    include "footer.php";
  ?>
    </div>
  </main>


</body>
</html>