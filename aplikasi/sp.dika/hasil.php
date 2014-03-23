<html>
<head>
<title>Hasil Analisis</title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../../js/date-time.js"></script>
</head>
<body>
<?php
@session_start();
@$session_name = $_SESSION[user];
@$session_id = $_SESSION[id];  
if(isset($session_name)){
#-----------------------------------------------------------------------------------------------------------------------------------------------------------
include 'php/php_koneksi.php';
include 'php/php_fungsi.php';
include '../date-time/index.php';

// Memperoleh ip dari index pertanyaan yang kemudian dijadikan variable
$ip = $_GET['ip'];

echo("<h1>HASIL ANALISIS MENYATAKAN</h1>");
echo("<hr>");
echo("<br>");
echo("Gejala yang anda alami antara lain :");
echo(" ");
echo("<ol>");
// Menampilkan Hasil penyakit
$query_gejala = mysql_query("select gejala.* from gejala,
												  temp_gejala where gejala.id_gejala=temp_gejala.id_gejala and 
												                    temp_gejala.ip='$ip' and 
																	temp_gejala.id_pasien='$session_id' order by gejala.id_gejala desc");
while ($show_gejala = mysql_fetch_array($query_gejala)) {
	echo "<li>" . $show_gejala[1] . "</li>";
}
echo("</ol>");
echo("Maka Sistem menyimpulkan bahwa : ");
// Menampilkan Hasil penyakit
$query_penyakit = mysql_query("select penyakit.* from penyakit,
													  temp_penyakit where penyakit.id_penyakit=temp_penyakit.id_penyakit and 
													                      temp_penyakit.ip='$ip' and 
																		  temp_penyakit.id_pasien='$session_id' order by penyakit.id_penyakit limit 1");
$show_penyakit = mysql_fetch_array($query_penyakit);
	echo("<ul>");
	echo "<li>Penyakit yang di derita adalah : " . $show_penyakit[1] . "</li>";
	echo "<li>Definisi  : " . $show_penyakit[2] . "</li>";
	echo "<li>Solusi yang diberikan : </br>" . $show_penyakit[3] . "</li>";
	echo("</ul>");	

// Membuat suatu laporan
mysql_query("insert into laporan(id_pasien,pasien,hasil_konsultasi,tgl_konsultasi)values('$session_id','$session_name','$show_penyakit[1]','$date_time')");
?>
<a href="index.php">Kembali</a>
</body>
</html>
<? #---------------------------------------------------------------------------------------------------------------------------------------------------------- 
} else { ?>
	<div id="warning">Akses ditutup. Anda harus login terlebih dahulu</div><?
}