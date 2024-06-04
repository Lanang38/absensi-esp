<?php  
include "koneksi.php";
$sql = mysqli_query($konek, "select * from status");
$data = mysqli_fetch_array($sql);
$mode_absen = $data['mode'];

	//Uji
$mode = "";
if ($mode_absen==1){
	$mode = "Masuk";
}
else if ($mode_absen==2){
	$mode = "Istirahat";
}
else if ($mode_absen==3){
	$mode = "Kembali";
}
else if ($mode_absen==4){
	$mode = "Pulang";
}

	//Baca kartu
$baca_kartu = mysqli_query($konek, "select * from tmprfid");
$data_kartu = mysqli_fetch_array($baca_kartu);
$nokartu	= isset($data_kartu['nokartu']) ? $data_kartu['nokartu'] : null;
?>

<div class="container-fluid" style="text-align: center; background-color: white; border: 2px solid white; border-radius: 10px; max-width: max-content; margin: 0 auto;">
	<!-- Konten Anda di sini -->	<?php if($nokartu=="") { ?>
		<h3>Absen : <?php echo $mode; ?> </h3>
		<h3>Silahkan Tempelkan Kartu RFID</h3>
		<img src="images/rfid.png" style="width: 200px; margin: 20px 0;"> <br>
		<img src="images/animasi2.gif">
	<?php } else {
        //cek no kartu
		$cari_karyawan = mysqli_query($konek, "select * from karyawan where nokartu='$nokartu'");
		$jumlah_data = mysqli_num_rows($cari_karyawan);

		if ($jumlah_data==0) {
			echo "<h1>Maaf, Kartu Tidak Terdaftar</h1>";
		}
		else{
			$data_karyawan = mysqli_fetch_array($cari_karyawan);
			$nama = $data_karyawan['nama'];

            //tanggal
			date_default_timezone_set('Asia/Jakarta');
			$tanggal = date('Y-m-d');
			$jam = date('H:i:s');

            //cek
			$cari_absen = mysqli_query($konek, "select * from absensi where nokartu='$nokartu' and tanggal='$tanggal'");
            //hitung
			$jumlah_absen = mysqli_num_rows($cari_absen);
			if ($jumlah_absen == 0) 
			{
				echo "<h1>Selamat Datang <br> $nama</h1>";
				mysqli_query($konek, "insert into absensi(nokartu, tanggal, jam_masuk)values('$nokartu', '$tanggal', '$jam')");
			}
			else
			{

				if ($mode_absen == 2) 
				{
					if ($mode_absen == 2 && $mode_absen == 3) {
						echo "<h1>Anda Sudah Absen Pada Menu ini</h1>";
					}
					else{
						echo "<h1>Selamat Istirahat <br> $nama</h1>";
						mysqli_query($konek, "update absensi set jam_istirahat='$jam' where nokartu='$nokartu' and tanggal='$tanggal'");
					}
					
				}
				else if ($mode_absen == 3) 
				{
					if ($mode_absen == 3 && $mode_absen == 3) {
						echo "<h1>Anda Sudah Absen Pada Menu ini</h1>";
					}
					else{
						echo "<h1>Selamat Datang Kembali <br> $nama</h1>";
						mysqli_query($konek, "update absensi set jam_kembali='$jam' where nokartu='$nokartu' and tanggal='$tanggal'");
					}

				}
				else if ($mode_absen == 4) 
				{
					if ($mode_absen == 4 && $mode_absen == 4) {
						echo "<h1>Anda Sudah Absen Pada Menu ini</h1>";
					}
					else{
						echo "<h1>Selamat Jalan <br> $nama</h1>";
						mysqli_query($konek, "update absensi set jam_pulang='$jam' where nokartu='$nokartu' and tanggal='$tanggal'");
					}
				}
				else {
					echo "<h1>Anda Sudah Absen Pada Menu ini</h1>";
				}
			}
		}
        //Kosongkan
		mysqli_query($konek, "delete from tmprfid");
	}?>
</div>
