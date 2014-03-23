<?php
@session_start();
@$session_name = $_SESSION[user_admin];
@$session_id = $_SESSION[id_admin];
if(isset($session_name)){
	// Proses Edit Penyakit
	include '../ad-php/php_connection.php';
	// Menangkap variable inputan edit
	$kode = $_POST['kode'];
	$nama_penyakit = $_POST['nama_penyakit'];
	$definisi = $_POST['definisi'];
	$solusi = $_POST['solusi'];
	// Melakukan Update table
	mysql_query("update penyakit set penyakit='$nama_penyakit',definisi='$definisi',solusi='$solusi' where id_penyakit='$kode'");
	echo("<script>window.location='../?page=penyakit&notifikasi=sukses'</script>");
}else{
	echo("<script>window.location='?';</script>");
}

