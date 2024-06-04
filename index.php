<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Menu Utama</title>
	<style>
		/* Define the animation keyframes */
		@keyframes scaleAnimation {
			0% {
				transform: scale(0.8);
			}
			50% {
				transform: scale(1);
			}
			100% {
				transform: scale(0.8);
			}
		}

		/* Apply the animation to the image */
		#animatedImage {
			animation: scaleAnimation 2s infinite; /* Change the duration and other properties as needed */
		}

		/* Set the background image */
		body {
			background-image: url('images/kampus.png'); /* Change 'your-background-image.jpg' to the path of your background image */
				background-size: cover;
				background-repeat: no-repeat;
				background-attachment: fixed;
				background-color: rgba(0, 0, 0, 0.7); /* Add a semi-transparent black overlay with 70% opacity */
				color: white; /* Set text color to white for better visibility */
			}

			.container {
				padding: 20px;
				border-radius: 5px; /* Add rounded corners to the border */
			}

			.container h1 {
				border-bottom: 1px solid white; /* Add a white border under the h1 text */
				padding-bottom: 10px; /* Add padding under the h1 text */
			}

			/* Style for menu buttons */
			.menu-button {
				display: inline-block;
				margin: 10px;
				padding: 10px 20px;
				background-color: #007BFF; /* Button background color */
				color: white; /* Button text color */
				text-decoration: none; /* Remove underline from links */
				border-radius: 5px;
				transition: background-color 0.3s ease; /* Add a smooth transition effect */
			}

			.menu-button:hover {
				background-color: #0056b3; /* Change button background color on hover */
			}

			/* Style for menu items */
			.menu-item {
				background-color: rgba(0, 0, 0, 0.5); /* Set background color for menu items */
				padding: 10px;
				border-radius: 5px;
				margin: 10px; /* Add margin to create space between menu items */
			}

			/* Style for border of menu items */
			.menu-item h3 {
				border-bottom: 1px solid white; /* Add a white border under the h3 text */
				padding-bottom: 10px; /* Add padding under the h3 text */
			}

		</style>
	</head>
	<body>
		<?php include "menu.php"; ?>

		<!-- isi -->
		<div class="container-fluid" style="padding-top: 10%; text-align: center; background-color: rgba(0, 0, 0, 0.5); border: 2px; border-radius: 10px; padding: 20px; margin: 20px;">
			<img id="animatedImage" src="images/amikom.png" style="width: 200px"> <br>
			<h1 style="font-size: 36px;">
				<strong>SISTEM ABSENSI KARYAWAN</strong><br>
				<strong>BERBASIS RFID</strong><br>
			</h1>
		</div>


		
		<!-- Menambahkan penjelasan menu -->
		<div class="container" style="text-align: center">
			<div class="menu-item">
				<h3><strong>PENGANTAR</strong></h3>
				<p>
				Sistem absen berbasis RFID adalah metode pencatatan kehadiran yang menggunakan teknologi RFID (Radio-Frequency Identification) untuk mengidentifikasi individu dan mencatat waktu kehadiran. Ini melibatkan penggunaan tag RFID yang membawa informasi unik, pembaca RFID untuk membaca tag tersebut, dan perangkat lunak manajemen untuk mencatat dan mengelola data kehadiran. Dengan teknologi ini, absensi dapat dicatat tanpa kontak fisik dan dengan tingkat akurasi yang tinggi, membantu dalam manajemen sumber daya manusia dan pengelolaan kehadiran individu.</p>
			</div>
			<div class="menu-item">
				<h3><strong>Data Karyawan</strong></h3>
				<p>Data karyawan adalah informasi atau rekaman yang berkaitan dengan setiap individu yang bekerja di sebuah perusahaan atau organisasi. Data karyawan ini mencakup berbagai informasi yang relevan dengan tenaga kerja perusahaan dan dapat mencakup hal-hal yang mencangkup data identitas</p>
				<p>Data karyawan memiliki banyak kepentingan dalam berbagai aspek manajemen sumber daya manusia dan operasi perusahaan.</p>
				<strong>Beberapa alasan mengapa data karyawan sangat penting:</strong></p>
				<div class="container" style="text-align: left;">
					<ul style="list-style-type: none; padding-left: 15%;">
						<li>&#8226; Memudahkan proses rekrutmen karyawan baru.</li>
						<li>&#8226; Memungkinkan perencanaan dan pengelolaan sumber daya manusia yang efisien.</li>
						<li>&#8226; Memberikan dasar untuk penggajian, tunjangan, dan manfaat karyawan.</li>
						<li>&#8226; Mendukung evaluasi kinerja dan pengembangan karir karyawan.</li>
						<li>&#8226; Memastikan perusahaan mematuhi peraturan ketenagakerjaan.</li>
					</ul>
				</div>
				<a class="menu-button" href="datakaryawan.php">Data Karyawan</a>
			</div>
			<div class="menu-item">
				<h3><strong>Rekapitulasi Absensi</strong></h3>
				<p>Rekapitulasi absensi adalah langkah dalam manajemen sumber daya manusia yang melibatkan pengumpulan, analisis, dan penyajian data kehadiran individu dalam organisasi selama periode waktu tertentu. Tujuannya adalah untuk memberikan wawasan yang komprehensif tentang pola kehadiran karyawan, termasuk jam kerja, izin, cuti, dan absen. Data ini digunakan untuk penggajian, perencanaan tenaga kerja, evaluasi kinerja, dan memastikan pemenuhan peraturan ketenagakerjaan.</p>
				<a class="menu-button" href="absensi.php">Rekapitulasi Absensi</a>
			</div>
			<div class="menu-item">
				<h3><strong>Scan Kartu</strong></h3>
				<p>Scan kartu adalah proses penggunaan teknologi pemindaian untuk membaca informasi yang terkandung dalam kartu khusus, seperti kartu identitas atau kartu akses. Informasi ini dapat digunakan untuk otentikasi, akses, atau pencatatan data. Teknologi pemindaian ini umumnya digunakan dalam berbagai aplikasi, termasuk kontrol akses fisik, absensi, atau verifikasi identitas. Prosesnya melibatkan perangkat pemindai yang membaca dan memproses data dari kartu secara cepat dan efisien.</p>
				<a class="menu-button" href="scan.php">Scan Kartu</a>
			</div>
		</div>

		<div class="container-fluid" style="padding-top: 10%; text-align: center; background-color: rgba(0, 0, 0, 0.5); border: 2px; border-radius: 10px; padding: 20px; margin: 20px;">
			<?php include "footer.php"; ?>
		</div>
	</body>
	</html>
