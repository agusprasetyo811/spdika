<?php
@session_start();
@$session_name = $_SESSION[user_admin];
@$session_id = $_SESSION[id_admin];
if(isset($session_name)){
	// Proses Edit Penyakit
	include '../ad-php/php_connection.php';
	// Menangkap variable inputan edit
	$kode = $_POST['kode'];
	$gejala = $_POST['gejala'];
	// Melakukan Update table
	mysql_query("update gejala set gejala='$gejala' where id_gejala='$kode'");
	echo("<script>window.location='../?page=gejala&notifikasi=sukses'</script>");
}else{
	echo("<script>window.location='../?';</script>");
}
