<?php
@session_start();
@@$session_name = $_SESSION[user];
@$session_id = $_SESSION[id];  

include '../../sp-php/php_connection.php';
include '../../sp-php/php_fungsi.php';

if(isset($session_id)){

// inisialisasi ip pasien --------------------------------------------------------------------------------------------------------
@$ip = $_SERVER['REMOTE_ADDR'];

// inisialisasi pertanyaan -------------------------------------------------------------------------------------------------------
@$question = $_GET['question'];

// Menentukan default pertanyaan yang dimunculkan --------------------------------------------------------------------------------
if(!isset($question)){
	$show_question = 1;
}else {
	$show_question = $question;
}

// Menentukan jumlah pertanyaan yang ditampilkan ---------------------------------------------------------------------------------
$max_question = 1;
$limit = (($show_question * $max_question) - $max_question);

// Mengeluarkan pertanyaan database ----------------------------------------------------------------------------------------------
$query_pertanyaan = mysql_query("select pertanyaan from pertanyaan order by id_pertanyaan limit $limit,$max_question");
while($show_pertanyaan = mysql_fetch_array($query_pertanyaan)){
	echo $show_question . " - " . $show_pertanyaan[0];
}

// mengeluarkan pilihan jawaban --------------------------------------------------------------------------------------------------
$total_result = mysql_result(mysql_query("select count(*) as num from pertanyaan"),0);
$total_question = ceil($total_result / $max_question);
$total_question = $total_question + 1;
echo("<br><br>");

// Mengelola jawaban -------------------------------------------------------------------------------------------------------------
$query_gejala = mysql_query("select id_gejala from pertanyaan order by id_pertanyaan limit $limit,$max_question");
$show_gejala = mysql_fetch_array($query_gejala);
if(!isset($question)){
	$next = 2;
	echo "<a href='?question=$next&g=$show_gejala[0]&j=YA'>YA</a> | "; 
	echo "<a href='#'>TIDAK</a>";
}elseif($question < $total_question){
	$next = ($question + 1);
	echo "<a href='?question=$next&g=$show_gejala[0]&j=YA'>YA</a> | ";
	echo "<a href='?question=$next&g=$show_gejala[0]&j=TIDAK'>TIDAK</a>";
}else{
	echo "<a href='hasil.php?ip=$ip'>LIHAT HASIL</a>";
}

// Memasukan Jawaban ke table jawaban ---------------------------------------------------------------------------------------------
@$gejala = $_GET['g'];
@$jawaban = $_GET['j'];

if(isset($gejala)){
	// Untuk menghindari duplikat jawaban karena refrash maka dilakukan perintah delete item
	mysql_query("delete from jawaban where id_gejala = '$gejala' and id_pasien = '$session_id'");
	// Memasukan jawaban kedalam tabel
	insert("jawaban", "id_gejala,jawaban,id_pasien", "'$gejala','$jawaban','$session_id'");
	// Mengeluarkan isi jawaban Yang benar (YA)
	$query_jawaban_Y = mysql_query("select id_gejala,jawaban from jawaban where jawaban like '%YA%' and id_pasien = '$session_id' order by id_jawaban desc");
	$show_jawaban_Y = mysql_fetch_array($query_jawaban_Y);
	// Mengosongkan table temp_penyakit
	deleteItem("temp_penyakit","id_pasien","$session_id");
	// Mulai melakukan analisis untuk memperkirakan penyakit yang mungkin terjangkit dengan fungsi analysis
	analysis($ip, $show_jawaban_Y[0], $session_id);
	// Menghindari duplikat temp_gejala karena refrash
	mysql_query("delete from temp_gejala where id_gejala = '$gejala' and id_pasien = '$session_id'");
	// Memasukan gejala sementara Yang dipilh kedalam temp_gejala jika jawaban (YA)
	if ($jawaban == 'YA') {
		insert("temp_gejala", "ip,id_gejala,id_pasien", "'$ip','$gejala','$session_id'");
	}
}

}else{?>
	<h1>Pasien Ilegal</h1>
<? }?>