<nav class="navbar navbar-inverse">
	<div class="containe-fluid">
		<div class="navbar-header">
			<a href="#" class="navbar-brand">ABSENSI</a>
		</div>
		<ul class="nav navbar-nav">
			<li> <a href="index.php"> HOME </a> </li>
			<li> <a href="datakaryawan.php"> Data Karyawan </a> </li>
			<li> <a href="absensi.php"> Rekapitulasi Absensi</a> </li>
			<li> <a href="scan.php"> Scan Kartu </a> </li>
		</ul>
	</div>
	
</nav>
<style>
	/* Add a hover effect to the navbar links */
	.navbar-nav li a {
		transition: transform 0.3s; /* Add a smooth transition effect */
	}

	/* Define the hover effect */
	.navbar-nav li a:hover {
		transform: scale(1.1); /* Scale the link to 110% of its original size */
		color: red; /* Change the color when hovered (optional) */
	}
</style>