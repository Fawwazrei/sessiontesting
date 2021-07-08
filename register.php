<?php
		//koneksi database
		$server = "localhost";
		$user = "root";
		$pass = "";
		$database = "dlogin";


		$koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

		//Tombol simpan di klik
		if(isset($_POST['bsimpan']))
		{
				//Data akan disimpan baru
				$simpan = mysqli_query($koneksi, "INSERT INTO tadm (user, nama_lengkap, kata_sandi, posisi)
											  VALUES ('$_POST[user]', 
											  		 '$_POST[nama_lengkap]', 
											  		 '$_POST[kata_sandi]',
											  		 '$_POST[posisi]')
													   
											 ");
			if($simpan) //Jika simpan sukses
			{
				echo "<script>
						alert('Simpan Data Sukses!');
						document.location='menulogin.php';
					  </script>";
			}
			else //Jika simpan gagal
			{
				echo "<script>
						alert('Simpan Data GAGAL!');
						document.location='register.php';
					  </script>";
			}
			}
			

		
?>


<!DOCTYPE html>
<html>
<head>
	<title>REGISTER</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css" />
	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<!-- START JUMBOTRON-->
<section class="jumbotron text-center">
        <img src="img/logotelkom2.png" alt="Laboratorium Mikroprosesor" width="150" class="rounded-circle img-thumbnail" />
        <h1 class="display-4">Telkom Indonesia</h1>
        <p class="lead">Silahkan register data user yang diperlukan!</p>
      </section>
    <!-- END JUMBOTRON-->

<!--awal card form -->
	<div class="card mt-5">
  	  <div class="card-header bg-danger text-white">
    Input Register User
  </div>
  <div class="card-body">
  	<form method="post" action=" ">
	  <div class="form-group">
  			<label>Username</label>
  			<input type="text" name="user" class="form-control" placeholder="Input Username Baru" required>
  		</div>
  		<div class="form-group">
  			<label>Nama</label>
  			<input type="text" name="nama_lengkap" class="form-control" placeholder="Input Nama User Disini | ex: Administrasi 2" required>
  		</div>
  		<div class="form-group">
  			<label>Password</label>
  			<input type="password" name="kata_sandi" class="form-control" placeholder="Input Password User Disini" required>
  		</div>
  		<div class="form-group">
  			<label>Role</label>
  			<input type="text" name="posisi" class="form-control" placeholder="Input Role User Disini | ex: PIC Witel" required>
  		</div>
  		
  		<button type="submit" class="btn btn-primary" name="bsimpan">Daftar</button>
  		<button type="reset" class="btn btn-warning text-white" name="breset">Reset</button>
  	</form>
  </div>
	</div>
<!-- akhir card form -->

</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>	
</body>
</html>