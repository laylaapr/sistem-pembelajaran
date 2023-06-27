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

      <?php
        for($x=0;$x<count($hari);$x++){
      ?>
      <div class="row">
        <div class="col-lg-12 col-md-12 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <h5 class="text-white pl-2">Hari : <?php echo $hari[$x]?></h5>
              </div>
            </div>
            <div class="card-body">
              
                <div class="row">
                    <?php
                    for($y=1;$y<9;$y++){
                    ?>
                    <div class="col-lg-3 col-md-4 mt-4 mb-4">
                        <div class="card z-index-2 ">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                                <div class="bg-gradient-secondary shadow-primary border-radius-lg py-3 pe-1">
                                    <h5 class="text-white pl-2">Jam : <?php echo $y ?></h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php 
                                  if ($jadwal[$x][$y-1]==array()){?>
                                <p>NAN</p>
                                <p>NAN</p>
                                <?php
                                
                                  }
                                  else{
                                ?>
                                <p><?php echo $jadwal[$x][$y-1][0]->mapel ?></p>
                                <p>Bapak/Ibu<?php echo $jadwal[$x][$y-1][0]->nama ?></p>
                                <?php
                                  }
                                ?>
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
      <?php
        }
      ?>
      <!-- End info kedua -->
      
      <?php
    include "footer.php";
  ?>
    </div>
  </main>


</body>
</html>