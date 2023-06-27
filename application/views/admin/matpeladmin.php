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
                <h5 class="text-white pl-2">Matpel</h5>
              </div>
            </div>
            <div class="card-body">
              <form method="POST" action="<?php echo base_url('aksitambahmatpeladmin')?>">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Mata Pelajaran</label>
                  <input type="text" class="form-control" name="mapel" style="border:1px solid;padding:5px" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
              </form>

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
                      foreach($mapel as $row){
                      ?>
                      <tr>
                          <td><?php echo $ind?></td>
                          <td>
                          <form method="POST" action="<?php echo base_url('aksieditmatpeladmin')?>">
                            <div class="form-group">
                              <input name="id" value="<?php echo $row->id?>" hidden>
                              <input type="text" class="form-control" name="mapel" style="border:1px solid;padding:5px" required value="<?php echo $row->nama ?>">
                            </div>
                          </td>
                          <td>
                            <button type="submit" class="btn btn-info ">EDIT</button>
                          </form>
                            <a class="btn btn-danger text-white" href="<?php echo base_url('hapusmatpeladmin/'.$row->id)?>" >Hapus</a></td>
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