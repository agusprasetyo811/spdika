<?php
// Koneksi Ke database
include 'php_konfigurasi.php';
$query = mysql_connect($db_type,$db_user,$db_pass) or die("Database Error ");
mysql_select_db($db_name,$query) or die("DataBase kosong");