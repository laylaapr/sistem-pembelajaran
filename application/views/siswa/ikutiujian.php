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
		include "navbarsiswa.php";
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
              	<h5 class="text-white pl-2">Ujian</h5>

                  
                
              </div>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('ikutiujian/'.$id)?>" method="POST">
                <?php  
                    $ind=0;
                    $inda=0;
                   echo "Anda berada di level ".$level;
                    foreach($ujian as $row){
                        if($inda==$idnya){
                          $idds = $row->id;
                          if($ind==0){                        		
                              echo "<p class='text-dark'>". $row->pertanyaan."</p>";
                              echo '
                                <input type="radio" aria-label="Radio button for following text input" name="p'.$row->id.'" value="'.$row->idj.'" required> '.$row->jawaban.'
                                <br>'; 
                                }                              
                          
                      
                          else{

                              echo '
                                <input type="radio" aria-label="Radio button for following text input" name="p'.$row->id.'" value="'.$row->idj.'" required> '.$row->jawaban.'
                                <br>';
                          }
                      
                        
                          $ind++;                         
                          if($ind==4){
                              $ind=0;
                              $inda++;
                              
                              echo "<hr>";
                          }

                        }

                        else{
                          $inda+=0.25;
                      }

                       } 
                 ?>      
                  <p><?php echo $nosoal+1;?> dari 10 Soal</p> 
                 
                <input type="text" value="<?php echo $idds?>" name="soal" hidden>
                <br>

                <button type="submit" class="btn btn-info">Next</button>
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
