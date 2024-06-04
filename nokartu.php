<?php
include "koneksi.php";

$sql = mysqli_query($konek, "select * from tmprfid");
$data = mysqli_fetch_array($sql);

$nokartu = isset($data['nokartu']) ? $data['nokartu'] :'';
?>

<div class="form-group">
	<label>No.Kartu</label>
	<input type="text" name="nokartu" id="nokartu" placeholder="scan kartu RFID anda" class="form-control" style="width: 200px" value="<?php echo $nokartu; ?>">
</div>