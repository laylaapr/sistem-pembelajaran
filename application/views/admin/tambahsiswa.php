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
                <h5 class="text-white pl-2">Tambah Siswa</h5>
              </div>
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo base_url('aksitambahsiswaadmin')?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" name="i1" required style="border:1px solid;padding:5px">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" required name="i2" required style="border:1px solid;padding:5px">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIS</label>
                        <input type="text" class="form-control" name="i3" required style="border:1px solid;padding:5px">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" class="form-control" name="i4" required style="border:1px solid;padding:5px">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="i5" required style="border:1px solid;padding:5px">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jenis Kelamin</label>
                        <select class="form-control" name="i6" style="border:1px solid;padding:5px">
                            <option values="Laki-Laki">Laki-Laki</option>
                            <option values="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kelas</label>
                        <select name="i7" class="form-control" style="border:1px solid;padding:5px">
                            <?php
                            foreach($kelas as $row){
                            ?>
                            <option value="<?php echo $row->id?>"><?php echo $row->nama?> <?php echo $row->keterangan?></option>
                            <?php
                            }
                            ?>
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