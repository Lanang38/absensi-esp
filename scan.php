<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title></title>

	<style>
		/* CSS untuk mengatur warna latar belakang */
		body {
			background-color: #999DA0; /* Warna abu-abu */
		}
		
	</style>

	<!--scan-->
	<script type="text/javascript">
		$(document).ready(function(){
			setInterval(function(){
				$("#cekkartu").load('bacakartu.php')
			}, 2000);
		});
	</script>
</head>
<body>

	<?php include "menu.php"; ?>

	<!--isi-->
	<div class="container-fluid" style="padding-top : 10%">
		<div id="cekkartu"></div>
		
	</div>
	<br>
	
	<?php include "footer.php"; ?>

</body>
</html>