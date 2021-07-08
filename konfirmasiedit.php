<?php

include "koneksi_login.php";
session_start();

if( !isset($_SESSION["login"])){
	header("Location: menulogin.php");
}


		//PENGUJIAN TOMBOL EDIT / HAPUS DI KLIK
		if(isset($_GET['hal']))
		{
			//PENGUJIAN DATA YANG AKAN DI EDIT
			if($_GET['hal'] == "edit")
			{
				//TAMPILKAN DATA YANG AKAN DI EDIT
				$tampil = mysqli_query($koneksi, "SELECT * FROM tadm WHERE id_adm = '$_GET[id]' ");
				$data = mysqli_fetch_array($tampil);
				if($data)
				{
					//jika data ditemukan, maka data ditampung ke dalam variabel
					$vnama = $data['user'];
					$vnim = $data['pass'];
				}
			}
			else if ($_GET['hal'] == "hapus")
			{
				//Persiapan hapus data
				$hapus = mysqli_query($koneksi, "DELETE FROM tadm WHERE id_adm = '$_GET[id]' ");
				if($hapus)
				{
					echo "<script>
						alert('Hapus Data Sukses!');
						document.location='konfirmasiedit.php';
					  </script>";
			}
				}
			}
	include "session.php";		
		
?>


<!DOCTYPE html>
<html>
<head>
	<title>LOGIN SYSTEM</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container"></div>
	<h1 class="text-center">Admin Dashboard</h1>
	<h2 class="text-center">LIST USER</h2>

<!--start login table -->
	<div class="card mt-5">
  	  <div class="card-header bg-success text-white">
    List Data User
  </div>
  
  <div class="card-body">
  	<table class="table table-bordered table-black-50">
  		<tr>
  			<th>No.</th>
  			<th>Username</th>
  			<th>Password</th>
  		</tr>
  		<?php
  			$no = 1;
  			$tampil = mysqli_query($koneksi, "SELECT * from tadm order by id_adm desc");
  			while($data = mysqli_fetch_array($tampil)) :

  		?>
  		<tr>
  			<td><?=$no++;?></td>
  			<td><?=$data['user']?></td>
  			<td><?=$data['pass']?></td>
  			<td>
				<a href="edit.php?hal=edit&id=<?=$data['id_adm']?>" onclick= "return confirm('Apakah yakin ingin mengedit ?')" class="btn btn-danger"> EDIT </a>
  				<a href="konfirmasiedit.php?hal=hapus&id=<?=$data['id_adm']?>" onclick ="return confirm('Apakah yakin ingin mengahapus ?')" class="btn btn-warning"> HAPUS </a>
  			</td>
  		</tr>
  	<?php endwhile; //penutup while ?>
  	</table>
  </div>
	</div>
<!-- end login table -->


</div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>	
</body>
</html>