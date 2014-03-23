<?php 
// Proses_Daftar
include '../sp-php/php_connection.php';
$nama = $_POST['nama_pasien'];
$alamat = $_POST['alamat_pasien'];
$tgl = $_POST['tanggal'];
$user = $_POST['user_pasien'];
$pass = $_POST['pass_pasien'];
$c_pass = $_POST['con_pass_pasien'];

$tahun_lahir = substr($tgl,-4);
$tahun_sekarang = date('Y');
$umur_pasien = $tahun_sekarang - $tahun_lahir;

echo $umur_pasien;

// Melakukan pengecekan
if($nama==""|| $alamat=="" || $tgl=="" || $user=="" || $pass==""){
	echo "<script>window.location='../?page=daftar&notifikasi=kosong';</script>";
} else if ($pass != $c_pass){
	echo "<script>window.location='../?page=daftar&notifikasi=not_same';</script>";
} else {
	mysql_query("insert into pasien(nama_lengkap,alamat,tgl_lahir,umur,user,pass)values('$nama','$alamat','$tgl','$umur_pasien','$user','$c_pass')");
	echo "<script>window.location='../?page=daftar&notifikasi=ok';</script>";
} 	