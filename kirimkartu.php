<?php  
include "koneksi.php";

$nokartu = $_GET['nokartu'];
mysqli_query($konek, "delete from tmprfid");

$simpan = mysqli_query($konek, "insert into tmprfid(nokartu)values('$nokartu')");
if($simpan)
	echo "Berhasil";
else
	echo "Gagal";

?>