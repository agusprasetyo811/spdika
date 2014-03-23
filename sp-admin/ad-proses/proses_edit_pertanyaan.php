<?php
@session_start();
@$session_name = $_SESSION[user_admin];
@$session_id = $_SESSION[id_admin];
if(isset($session_name)){
	// Proses Edit Penyakit
	include '../ad-php/php_connection.php';
	// Menangkap variable inputan edit
	$kode = $_POST['kode'];
	$pertanyaan = $_POST['pertanyaan'];
	// Melakukan Update table
	mysql_query("update pertanyaan set pertanyaan='$pertanyaan' where id_pertanyaan='$kode'");
	echo("<script>window.location='../?page=pertanyaan&notifikasi=sukses'</script>");
}else{
	echo("<script>window.location='?';</script>");
}

