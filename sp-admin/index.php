<?php
@session_start();
@$session_name=$_SESSION[user_admin];
@$session_id=$_SESSION[id_admin];
// include Config PHP dan koneksi
include('ad-php/php_config.php');
include('ad-php/php_connection.php');
// Menangkap variabel page untuk mendapatkan inisial halaman
@$page = $_GET['page'];
// Melakukan Pengecekan jika login
if(isset($session_name)){
	$template_name = $_CONFIG['template_name'];
	// Melakukan percabangan halaman
	if(!isset($page)){
		$title = 'Welcome Admin';
		$CONTENT_FILE='ad-page/home';
	} else if($page=='home') {
		$title = 'Welcome Admin';
		$CONTENT_FILE='ad-page/home';
	} else if($page=='profile') {
		$title = 'Profile Admin';
		$CONTENT_FILE='ad-page/profile';
	} else if($page == 'penyakit') {
		$title='Daftar Penyakit';
		$CONTENT_FILE='ad-page/penyakit';
	} else if($page == 'pasien') {
		$title='Daftar Pasien';
		$CONTENT_FILE='ad-page/pasien';
	} else if($page == 'pasien-detail') {
		$title='Pasien';
		$CONTENT_FILE='ad-page/pasien_detail';
	} else if($page=='edit-penyakit') {
		$title = 'Edit Penyakit';
		$CONTENT_FILE='ad-page/edit-penyakit';
	} else if($page == 'pertanyaan') {
		$title='Daftar Pertanyaan';
		$CONTENT_FILE='ad-page/pertanyaan';
	} else if($page == 'edit-pertanyaan') {
		$title='Edit Pertanyaan';
		$CONTENT_FILE='ad-page/edit-pertanyaan';
	} else if($page == 'gejala') {
		$title='Daftar Gejala';
		$CONTENT_FILE='ad-page/gejala';
	} else if($page == 'edit-gejala') {
		$title='Edit Gejala';
		$CONTENT_FILE='ad-page/edit-gejala';
	} else if($page == 'aturan') {
		$title='Aturan';
		$CONTENT_FILE='ad-page/aturan';
	} else if($page == 'artikel') {
		$title='Artikel';
		$CONTENT_FILE='ad-page/artikel-daftar';
	} else if($page == 'artikel-tambah') {
		$title='Artikel';
		$CONTENT_FILE='ad-page/artikel';
	} else if($page == 'artikel-detail') {
		$title='Artikel';
		$CONTENT_FILE='ad-page/artikel-detail';
	} else if($page == 'laporan') {
		$title='laporan';
		$CONTENT_FILE='ad-page/laporan';
	} else if($page == 'help') {
		$title='Help';
		$CONTENT_FILE='ap-page/help';
	}
	$SITE_TEMPLATE='ad-templates/'.$template_name.'/index';
	include ('ad-php/php_templates.php');
}else{
	// Require login page 
	require('ad-page/login.php');
}