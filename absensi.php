<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Rekapitulasi Absensi</title>
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
		}/* CSS untuk mengatur tombol ke tengah */
		.center-button {
			text-align: center;
		}
	</style>
</head>
<body>

	<?php include "menu.php"; ?>

	<!--isi-->
	<div class="container-fluid">
		<h3>Rekap Absensi</h3>
		<table class="table table-bordered">
			<thead>
				<tr style="background-color: purple; color: yellow">
					<th style="width: 10px; text-align: center; border: 2px solid black">No.</th>
					<th style="text-align: center; border: 2px solid black">Nama</th>
					<th style="text-align: center; border: 2px solid black">Tanggal</th>
					<th style="text-align: center; border: 2px solid black">Jam Masuk</th>
					<th style="text-align: center; border: 2px solid black">Jam Istirahat</th>
					<th style="text-align: center; border: 2px solid black">Jam Kembali</th>
					<th style="text-align: center; border: 2px solid black">Jam Pulang</th>
				</tr>
			</thead>
			<tbody>
				<?php
				include "koneksi.php";

				date_default_timezone_set('Asia/Jakarta');
				$tanggal = date('Y-m-d');

				$sql = mysqli_query($konek, "select b.nama, a.tanggal, a.jam_masuk, a.jam_istirahat, a.jam_kembali, a.jam_pulang from absensi a, karyawan b where a.nokartu=b.nokartu and a.tanggal='$tanggal'");

				$no = 0;
				while($data = mysqli_fetch_array($sql))
				{

					$no++;
					?>
					<tr style="background-color: white; color: black;">
						<td style="border: 2px solid black;"> <?php echo $no; ?> </td>
						<td style="border: 2px solid black;"> <?php echo $data['nama']; ?> </td>
						<td style="border: 2px solid black;"> <?php echo $data['tanggal']; ?> </td>
						<td style="border: 2px solid black; <?php echo (strtotime($data['jam_masuk']) > strtotime('08:30:00')) ? 'color: red;' : ''; ?>"> <?php echo $data['jam_masuk']; ?> </td>
						<td style="border: 2px solid black;"> <?php echo $data['jam_istirahat']; ?> </td>
						<td style="border: 2px solid black;"> <?php echo $data['jam_kembali']; ?> </td>
						<td style="border: 2px solid black;"> <?php echo $data['jam_pulang'] ?> </td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<!-- Tombol di tengah -->
		<div class="center-button">
			<button id="cetakButton" class="btn btn-primary">Cetak Data</button>
		</div>
	</div>
	
	<div class="container-fluid" style="padding-top : 10%">
		<?php include "footer.php"; ?>

		<script>
			document.getElementById('cetakButton').addEventListener('click', function () {
    // Mengarahkan ke skrip PHP yang akan menghasilkan file Excel
				window.location.href = 'export-to-excel.php';
			});
		</script>

	</body>
	</html>
