<?php
// include Config PHP dan koneksi 
include('sp-php/php_config.php');
include('sp-php/php_connection.php');
include('sp-php/php_fungsi.php');
// Menangkap variabel page untuk mendapatkan inisial halaman
@$page = $_GET['page'];
$template_name = $_CONFIG['template_name'];
// Melakukan percabangan halaman
if(!isset($page)) {
	$title = 'Welcome';
	$id=1; 
	$CONTENT_FILE='sp-page/home';
} else if($page == 'profile') {
	$title='Profile';
	$id=1; 
	$CONTENT_FILE='sp-page/profile';
} else if($page == 'edit-profile') {
	$title='Edit Profile';
	$id=1; 
	$CONTENT_FILE='sp-page/edit_profile';
} else if($page == 'edit-foto') {
	$title='Edit Foto';
	$id=1; 
	$CONTENT_FILE='sp-page/edit_foto';
} else if($page == 'pakar') {
	$title='Konsultasi';
	$id=1; 
	$CONTENT_FILE='sp-page/konsultasi';
} else if($page == 'login') {
	$title='Login';
	$id=1; 
	$CONTENT_FILE='sp-page/login';
} else if($page == 'daftar') {
	$title='Daftar';
	$id=1; 
	$CONTENT_FILE='sp-page/daftar';
} else if($page == 'help') {
	$title='Help';
	$id=1; 
	$CONTENT_FILE='sp-page/help';
}
$SITE_TEMPLATE='sp-templates/'.$template_name.'/index';
include ('sp-php/php_templates.php');