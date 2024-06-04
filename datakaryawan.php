<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Data Karyawan</title>
	<style>
		/* CSS untuk mengatur warna latar belakang menjadi abu-abu */
		body {
			background-color: #999DA0; /* Warna abu-abu */
		}
		/* CSS untuk mengatur tulisan "Data Karyawan" menjadi putih */
		h3 {
			color: black; /* Warna teks putih */
		}
		/* CSS untuk mengatur tulisan "footer" menjadi putih */
		#footer {
			color: black; /* Warna teks putih */
		}
		/* CSS untuk mengatur tombol ke tengah */
		.center-button {
			text-align: center;
			padding: 10px;
		}
	</style>
</head>
<body>

	<?php include "menu.php"; ?>

	<!--isi-->
	<div class="container-fluid">
		<h3>Data Karyawan</h3>
		<table class="table table-bordered">
			<thead>
				<tr style="background-color: purple; color: yellow;">
					<th style="width: 10px; text-align: center; border: 2px solid black;">No.</th>
					<th style="width: 200px; text-align: center; border: 2px solid black;">No.Kartu</th>
					<th style="width: 400px; text-align: center; border: 2px solid black;">Nama</th>
					<th style="text-align: center; border: 2px solid black;">Alamat</th>
					<th style="width: 10px; text-align: center; border: 2px solid black;">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
                //database
				include "koneksi.php";
                //baca
				$sql = mysqli_query($konek, "select * from karyawan");
				$no = 0;
				while ($data = mysqli_fetch_array($sql))
				{
					$no++;
					?>
					<tr style="background-color: white; color: black;">
						<td style="border: 2px solid black;"> <?php echo $no; ?></td>
						<td style="border: 2px solid black;"> <?php echo $data['nokartu']; ?></td>
						<td style="border: 2px solid black;"> <?php echo $data['nama']; ?></td>
						<td style="border: 2px solid black;"> <?php echo $data['alamat']; ?></td>
						<td style="border: 2px solid black;">
							<a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> | <a href="hapus.php?id=<?php echo $data['id']; ?>">Hapus</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>



		<!--tombol tambah di tengah -->
		<div class="center-button">
			<a href="tambah.php"> <button class="btn btn-primary">Tambah Data Karyawan</button> </a>
		</div>
	</div>

	<div class="container-fluid" style="padding-top : 10%">
		<div id="footer">
			<?php include "footer.php"; ?>
		</div>
	</div>
</body>
</html>
