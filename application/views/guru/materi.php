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
		include "navbarguru.php";
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
<!--       <div class="row">
      	<div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">money</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize"><b class="text-info">IN</b> <?php echo date('Y-m-d')?></p>
                <h5 class="mb-0 text-info"><?php echo number_format($masuk,0,",",".")?></h5>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span></p>
            </div>
          </div>
        </div>

        
      </div> -->
      <!-- End Notif Atas -->

      <!-- info kedua -->
      <div class="row">
        <div class="col-lg-12 col-md-12 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
              	<h5 class="text-white pl-2">Mata Pelajaran : <?php echo $_SESSION['namamatpel']?></h5>

                  
                
              </div>
            </div>
            <div class="card-body">
              	<h6 class="mb-0 "></h6>
                <?php include "navigation.php" ?>
                <hr>
              	<form method="post" action="<?php echo base_url('tambahmateri')?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">JUDUL</label>
                        <input style="border:1px solid;width: 100%" type="text" class="form-control" name="judul" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">DESKRIPSI</label>
                        <input style="border:1px solid;width: 100%" type="text" class="form-control" name="deskripsi" >
                    </div>
                    <div class="form-group">
                      <label for="berkas" class="form-label">Berkas</label>
                      <input type="file" class="form-control" id="berkas" name="berkas">
                    </div>
        			<button type="submit" class="btn btn-info btn-block">TAMBAH</button>
        		</form>
                <div class="row">
                
                  <?php
                  foreach($materi as $row){
                  ?>
                  <div class="col-lg-12 col-md-4 mt-2">
                        <div class="card">
                            <div class="card-header bg-danger text-white">
                            <a href="<?php echo base_url('hapusmateri/'.$row->id_materi)?>"><i class="fa fa-trash text-white"></i></a>
                            </div>
                            <div class="card-body">
                            <p class="card-tittle"><i><b><?php echo $row->judul?></b></i></p>
                            <p class="card-text"><?php echo $row->deskripsi?></p>
                            <a href="<?php echo base_url('downloadmateri/'.$row->file)?>"><?php echo $row->file?></a>
                            </div>
                        </div>
                  </div>
                  
                  <?php
                  }
                  ?>
                </div>
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
