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
                <h5 class="text-white pl-2">Tambah Jadwal</h5>
              </div>
            </div>
            <div class="card-body">
             <form method="post" action="<?php echo base_url('aksitambahjadwaladmin')?>">
                    <div class="form-group">
                        <label for="hari">Hari</label>
                        <select name="hari" class="form-control">
                        <option value="">--Please choose an option--</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jum'at</option>
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="jam">Jam</label>
                        <select name="jam" class="form-control" >
                        <option value="">--Please choose an option--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                      </select>
                    </div>
                    <label for="exampleInputEmail1">Guru x Mapel</label>
                    <div class="form-group">
                        <select name="i1" class="form-control" style="border:1px solid;padding:5px">
                            <?php
                            foreach($guru_x_mapel as $row){
                            ?>
                            <option value="<?php echo $row->id?>"> <?php echo $row->nama?> x <?php echo $row->namamapel?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Id Kelas</label>
                        <select name="i2" class="form-control" style="border:1px solid;padding:5px">
                            <?php
                            foreach($kelas as $row){
                            ?>
                            <option value="<?php echo $row->id?>"> <?php echo $row->nama?> <?php echo $row->keterangan?> </option>
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