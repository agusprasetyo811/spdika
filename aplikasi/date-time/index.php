<?php
// Waktu indonesia
$date_server = mktime(date('G'),date('i'),date('s'),date('n'),date('j'),date('Y'));
// Waktu server
$time_server = date('H:i:s',$date_server);
// Mengambil perbedaan waktu server dengan GMT
$gmt_match = substr(date('O',$date_server),1,2);
// Karena perbedaan waktu adalah dalam jam, maka dijadikan detik
$gmt_match_second = 60*60*$gmt_match;
// Menghitung perbedaan GMT
if(substr(date('O',$date_server),0,1)=='+'){
	$date_gmt = $date_server-$gmt_match_second; 
}else{
	$date_gmt = $date_server+$gmt_match_second; 
}
// Waktu GMT
$time_gmt = date('H:i:s',$date_gmt);
// Menyesuaikan dengan waktu indonesia(GMT + 7)
$date_match_indo = 60*60*7;
$date_indo = $date_gmt+$date_match_indo;
// waktu indonesia 
$time_indonesia = date('H:i:s',$date_indo);
// Membuat tanggal
$tanggal = date('j');
$bulan = date('m');
$tahun = date('Y'); 
// Tanggal
$date = $tanggal.'/'.$bulan.'/'.$tahun;
// Tanggal dan waktu
$date_time = $date . ' - ' . $time_indonesia;