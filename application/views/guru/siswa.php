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
                <p><b><i>KUIS : <?php echo $ujian[0]->keterangan?></i></b></p>

                <div class="row">
                  
                  <div class="table-responsive">
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <td>NO</td>
                          <td>SOAL</td>
                          <td>LEVEL</td>
                          <td>A</td>
                          <td>B</td>
                          <td>C</td>
                          <td>D</td>
                          <td></td>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $ind=1;
                      foreach($soal as $row){
                      ?>
                        <tr>
                          <td><?php echo $ind?></td>
                          <td><?php echo $row->pertanyaan?></td>
                          <td><?php echo $row->level?></td>
                          <td><?php if($jawabana[$ind-1][0]=="1"){ echo " <p class='text-info'>".$jawaban[$ind-1][0]."</p>";} else{ echo " <p class='text-dark'>".$jawaban[$ind-1][0]."</p>";} ?></td>
                          <td><?php if($jawabana[$ind-1][1]=="1"){ echo " <p class='text-info'>".$jawaban[$ind-1][1]."</p>";} else{ echo " <p class='text-dark'>".$jawaban[$ind-1][1]."</p>";} ?></td>
                          <td><?php if($jawabana[$ind-1][2]=="1"){ echo " <p class='text-info'>".$jawaban[$ind-1][2]."</p>";} else{ echo " <p class='text-dark'>".$jawaban[$ind-1][2]."</p>";} ?></td>
                          <td><?php if($jawabana[$ind-1][3]=="1"){ echo " <p class='text-info'>".$jawaban[$ind-1][3]."</p>";} else{ echo " <p class='text-dark'>".$jawaban[$ind-1][3]."</p>";} ?></td>
                          <td><a href="<?php echo base_url('editsoal/'.$row->id)?>" class="btn btn-info btn-sm text-white">Edit</a></td>
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