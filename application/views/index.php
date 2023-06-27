<!DOCTYPE html>
<html>
<head>
	<?php
	include"head.php"
	?>

  <title></title>
</head>
<body>
	<?php
	include"navbar.php"
	?>

	<section class="bg-white p-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<img src="<?php echo base_url('assets/picture/img.png')?>" class="img-fluid" alt="Responsive image">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="card">
					  <div class="card-header" style="background-color: #8280a3;">
					    <h1 class="text-center" style="color: white; font-size: 24px;">SELAMAT DATANG</h1>
					  </div>
					  <div class="card-body">
					    <form method="post" action="<?php echo base_url('login')?>">
						  <div class="form-group">
						    <label for="exampleInputEmail1">USERNAME</label>
						    <input name="un" type="text" class="form-control">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Password</label>
						    <input name="pass" type="password" class="form-control">
						  </div>
						  <button type="submit" class="btn btn-info btn-block" style="background-color: #8280a3;">LOGIN</button>
						</form>
					  </div>
					</div>
					
				</div>
			</div>
			
		</div>
	</section>

	<?php
		include "footer.php";
	?>


</body>
</html>