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
                <h5 class="text-white pl-2">Siswa/Siswi <?php echo $siswa[0]->nama?></h5>
              </div>
            </div>
            <div class="card-body">
                <form method="post" action="<?php echo base_url('aksieditsiswaadmin')?>">
                    <div class="form-group">
                        <input name="i1" value="<?php echo $siswa[0]->nis?>" hidden>
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" name="i2" class="form-control" style="border:1px solid;padding:5px" required value="<?php echo $siswa[0]->nama?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Lahir</label>
                        <input type="date" name="i3" class="form-control" style="border:1px solid;padding:5px" required value="<?php echo $siswa[0]->tgl_lahir?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Jenis Kelamin</label>
                        <select name="i4" class="form-control" style="border:1px solid;padding:5px">
                            <option <?php if($siswa[0]->jenis_kelamin=="Laki-Laki"){echo "selected";}?> value="Laki-Laki">Laki-Laki</option>
                            <option <?php if($siswa[0]->jenis_kelamin=="Perempuan"){echo "selected";}?> value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Kelas</label>
                        <select name="i5" class="form-control" style="border:1px solid;padding:5px">
                            <?php
                            foreach($kelas as $row){
                            ?>
                            <option <?php if($row->id==$siswa[0]->id_kelas){echo "selected";}?> value="<?php echo $row->id?>"><?php echo $row->nama?> <?php echo $row->keterangan?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="i6" class="form-control" style="border:1px solid;padding:5px" required value="<?php echo $siswa[0]->username?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Password Baru</label>
                        <input type="text" name="i7" class="form-control" style="border:1px solid;padding:5px">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">UBAH</button>
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