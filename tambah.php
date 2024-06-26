<?php 
include "koneksi.php";

if(isset($_POST['btnSimpan']))
{
	$nokartu = $_POST['nokartu'];
	$nama	 = $_POST['nama'];
	$alamat  = $_POST['alamat'];

	$simpan = mysqli_query($konek, "insert into karyawan(nokartu, nama, alamat)values('$nokartu', '$nama', '$alamat')");

	if ($simpan) 
	{
		echo "
		<script>
		alert('Tersimpan');
		location.replace('datakaryawan.php')
		</script>
		";
	}
	else
	{
		echo "
		<script>
		alert('Gagal Tersimpan');
		location.replace('datakaryawan.php')
		</script>
		";
	}
}

mysqli_query($konek, "delete from tmprfid");
?>

<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Tambah Data Karyawan</title>

	<style>
		/* CSS untuk mengatur warna latar belakang menjadi abu-abu */
		body {
			background-color: #999DA0; /* Warna abu-abu */
		}
		/* CSS untuk mengatur warna teks menjadi putih */
		body, h3, label {
			color: black; /* Warna teks putih */
		}
	</style>

	<!--pembacaan-->
	<script type="text/javascript">
		$(document).ready(function(){
			setInterval(function(){
				$("#norfid").load('nokartu.php')
			}, 0);
		});
	</script>

</head>
<body>

	<?php include "menu.php"; ?>

	<!-- isi -->
	<div class="container-fluid">
		<h3>Tambah Data Karyawan</h3>

		<!--input-->
		<form method="POST">
			<div id="norfid"></div>
			
			<div class="form-group">
				<label>Nama Karyawan</label>
				<input type="text" name="nama" id="nama" placeholder="nama karyawan" class="form-control" style="width: 400px">
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea class="form-control" name="alamat" id="alamat" placeholder="alamat"style="width: 400px;"></textarea>
			</div>

			<button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
			
		</form>
		
	</div>

	<div class="container-fluid" style="padding-top : 10%">
		<?php include "footer.php"; ?>

	</body>
	</html>