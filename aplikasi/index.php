<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SP Dika</title>
<link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<h1>SISTEM PAKAR DIAGNOSA DEMAM BERDARAH</h1>
    <hr />
    <?php 
	//include koneksi dan fungsi dari folder php
	include 'php/php_koneksi.php';
	include 'php/php_fungsi.php';
	//membuat varable pertanyaan untuk memperoleh parameter pertanyaan
	$pertanyaan = $_GET['pertanyaan'];
	//membuat variabel ip untuk memperoleh nilai ip dimana komputer berada
	$ip = $_SERVER['REMOTE_ADDR'];
	//membuat suatu kondisi jika pertanyaan pertama maka tidak mengambil variabel pertanyaan terlebih dulu
	if (!isset($pertanyaan)) {
		echo("<p>Jawablah pertanyaan berikut ini sesuai dengan gejala-gejala yang anda alami:</p>");
		//membuat parameter pertanyaan dengan ketentuan id_pertanyaan pertama
		$pertanyaan = 'PR01';
		if ($pertanyaan == 'PR01') {
			//langkah pertama mengkosongkan tabel jawaban, temp_gejala dan temp_penyakit
			deleteAll("jawaban");
			deleteAll("temp_gejala");
			deleteAll("temp_penyakit");
			//mengeluarkan pertanyaan 1 
			$result = mysql_query("select id_gejala,pertanyaan from pertanyaan where id_pertanyaan = '$pertanyaan'");
			$show = mysql_fetch_array($result);
			echo "1.".$show[1];
			echo("<br><br>");
			//membuat pilihan jawaban
			echo("&nbsp;&nbsp;&nbsp;&nbsp;");
			echo("<a href='index.php?pertanyaan=PR02&g=$show[0]&j=Y'>Ya</a>");
			echo("");
			echo("<a href='keluar.php'>Tidak</a>");
			echo("");
		}
	else if($pertanyaan == "PR02") { //jika mengeset parameter pertanyaan
	//mendapatkan parameter gejala pertama dan jawaban kedua
	@$g= $_GET['g'];
	@$j= $_GET['j'];
	//memasukkan jawaban ke dalam tabel jawaban jika mengeset $g
	if(isset($g)) {
		//untuk menghindari duplikat jawaban karena refresh maka dilakukan perintah delete item
		deleteItem("jawaban","id_gejala","$g");
		//memasukkan jawaban ke dalam tabel
		insert("jawaban","id_gejala,jawaban","''$g','$j'");
		//mengeluarkan isi jawaban yang benar 
		$query_jawaban_Y = mysql_query("select id_gejala,jawaban from jawaban where jawaban like '%Y%' order by id_jawaban desc");
	
	?>
</body>
</html>
