<?php
require 'vendor/autoload.php'; // Pastikan Anda telah menginstal PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Color;

// Buat objek Spreadsheet
$spreadsheet = new Spreadsheet();

// Buat lembar kerja aktif
$worksheet = $spreadsheet->getActiveSheet();

// Tambahkan header ke file Excel
$worksheet->setCellValue('A1', 'No.');
$worksheet->setCellValue('B1', 'Nama');
$worksheet->setCellValue('C1', 'Tanggal');
$worksheet->setCellValue('D1', 'Jam Masuk');
$worksheet->setCellValue('E1', 'Jam Istirahat');
$worksheet->setCellValue('F1', 'Jam Kembali');
$worksheet->setCellValue('G1', 'Jam Pulang');

// Ambil data dari database
include "koneksi.php";

date_default_timezone_set('Asia/Jakarta');
$tanggal = date('Y-m-d');

$sql = mysqli_query($konek, "select b.nama, a.tanggal, a.jam_masuk, a.jam_istirahat, a.jam_kembali, a.jam_pulang from absensi a, karyawan b where a.nokartu=b.nokartu and a.tanggal='$tanggal'");

$no = 1;
$row = 2;
while ($data = mysqli_fetch_array($sql)) {
    $worksheet->setCellValue('A' . $row, $no);
    $worksheet->setCellValue('B' . $row, $data['nama']);
    $worksheet->setCellValue('C' . $row, $data['tanggal']);

    // Periksa apakah jam masuk lebih dari jam 08:30:00
    $jamMasuk = $data['jam_masuk'];
    if (strtotime($jamMasuk) > strtotime('08:30:00')) {
        $worksheet->getStyle('D' . $row)->getFont()->getColor()->setARGB(Color::COLOR_RED);
    }

    $worksheet->setCellValue('D' . $row, $data['jam_masuk']);
    $worksheet->setCellValue('E' . $row, $data['jam_istirahat']);
    $worksheet->setCellValue('F' . $row, $data['jam_kembali']);
    $worksheet->setCellValue('G' . $row, $data['jam_pulang']);

    $no++;
    $row++;
}

// Mengatur ukuran kolom
$worksheet->getColumnDimension('A')->setWidth(5); // Kolom A, lebar 5
$worksheet->getColumnDimension('B')->setWidth(20); // Kolom B, lebar 20
$worksheet->getColumnDimension('C')->setWidth(12); // Kolom C, lebar 12
$worksheet->getColumnDimension('D')->setWidth(12); // Kolom D, lebar 12
$worksheet->getColumnDimension('E')->setWidth(12); // Kolom E, lebar 12
$worksheet->getColumnDimension('F')->setWidth(12); // Kolom F, lebar 12
$worksheet->getColumnDimension('G')->setWidth(12); // Kolom G, lebar 12

// Mengatur header untuk file Excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="rekap_absensi.xlsx"');
header('Cache-Control: max-age=0');

// Menyimpan file Excel
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
?>
