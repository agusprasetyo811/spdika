<?php
@session_start();
@$session_name = $_SESSION[user_admin];
@$session_id = $_SESSION[id_admin];
if(isset($session_name)){
	// Proses Edit Penyakit
	include '../ad-php/php_connection.php';
	// Menangkap variable inputan edit
	$id_laporan = $_GET['id_laporan'];
	// Melakukan Update table
	mysql_query("delete from laporan where id_laporan='$id_laporan'");
	echo("<script>window.location='../?page=laporan&notifikasi=sukses'</script>");
}else{
	echo("<script>window.location='../?';</script>");
}
