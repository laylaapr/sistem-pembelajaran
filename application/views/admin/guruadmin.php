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
                <h5 class="text-white pl-2">Guru</h5>
              </div>
            </div>
            <div class="card-body">
              <a class="btn btn-info btn-sm text-white" href="<?php echo base_url('tambahguruadmin')?>">Tambah Guru</a>
              <table class="table">
                  <thead>
                      <tr>
                          <td>No</td>
                          <td>Nama</td>
                          <td></td>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                      $ind=1;
                      foreach($guru as $row){
                      ?>
                      <tr>
                          <td><?php echo $ind?></td>
                          <td><?php echo $row->nama?></td>
                          <td><a class="btn btn-info text-white" href="<?php echo base_url('detailguru/'.$row->nip)?>" >Detail</a></td>
                      </tr>
                      <?php
                      $ind++;
                      }
                      ?>
                  </tbody>
              </table>
                    
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