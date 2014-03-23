<?php
// Proses Login
include '../ad-php/php_connection.php';
@$user_admin = $_POST[user_admin];
@$pass_admin = $_POST[pass_admin];
// Mengeluarkan data admin
$query = mysql_query("select user,pass from admin where user = '$user_admin'");
$show = mysql_fetch_object($query);
// Melakukan pengecekan
if($user_admin==""||$pass_admin==""){
	echo("<script>window.location='../?notifikasi=kosong';</script>");
}else if($show->user != $user_admin){
	echo("<script>window.location='../?notifikasi=user';</script>");
}else if($show->pass != $pass_admin){
	echo("<script>window.location='../?notifikasi=pass';</script>");
}else{
	@session_start();
	@$_SESSION[user_admin] = $user_admin;
	@$_SESSION[id_admin] = $show->id_admin;
	echo("<script>window.location='../';</script>");
}