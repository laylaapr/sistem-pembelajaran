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
              	<h5 class="text-white pl-2">Nilai Siswa</h5>
                
                  
                
              </div>
            </div>
            <div class="card-body">
              <h3>SKOR ANDA : <?php echo $nilai?></h3>
              <a class="btn btn-danger btn-sm" href="<?php echo base_url('ujiansiswa')?>"x>BACK</a>
               <div class="table-responsive">
                <table class="table table-responsive">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Soal</th>
                    <th>Level</th>
                    <th>Jawaban Anda</th>
                    <th>Jawaban Benar</th>
                    
                  </tr>
                </thead>
                <tbody>
                        <?php
                        $ind=0;
                        foreach($jawaban as $row){
                        ?>
                        <tr>
                            <td><?php echo  $ind+1?></td>
                            <td><?php echo substr($row->pertanyaan,0,100)?>...</td>
                            <td> <?php echo $row->level?></td>
                            <td> <?php if ($row->keterangan==1){echo "Benar";}else{ echo "Salah";}?></td>
                            <td> <?php echo $row->jawaban?></td>
                            
                            
                        </tr>
                        <?php
                        $ind++;
                        }
                        ?>
                    </tbody>
                </table>
                <Button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">Lihat Soal</Button>
                
            </div>
          </div>
        </div>
        
      </div>
    </div>
    
          
        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Soal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             <table class="table table-responsive">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Soal</th>
                  </tr>
                </thead>
                <tbody>
                        <?php
                        $ind=0;
                        foreach($jawaban as $row){
                        ?>
                        <tr>
                            <td><?php echo  $ind+1?></td>
                            <td><?php echo $row->pertanyaan?></td>
                            
                        </tr>
                        <?php
                        $ind++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
        </div>

      <!-- End info kedua -->
      
     <?php
    include "footer.php";
  ?>

  </main>

</body>
</html>