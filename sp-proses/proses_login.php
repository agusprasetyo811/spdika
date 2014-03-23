<?php
// Proses Login
include '../sp-php/php_connection.php';
@$nama = $_POST['name'];
@$pass = $_POST['pass'];
$query = mysql_query("select id_pasien,user,pass from pasien where user = '$nama'");
$show = mysql_fetch_object($query);
// Melakukan pengkondisian
if($nama==""||$pass==""){
	echo("<script>window.location='../?page=login&notifikasi=kosong';</script>");
} else if($show->user != $nama) {
	echo("<script>window.location='../?page=login&notifikasi=user';</script>");
} else if($show->pass != $pass) {
	echo("<script>window.location='../?page=login&notifikasi=pass';</script>");
} else {
	@session_start();
	@$_SESSION[user] = $show->user;
	@$_SESSION[id] = $show->id_pasien;
	echo("<script>window.location='../index.php';</script>");
}