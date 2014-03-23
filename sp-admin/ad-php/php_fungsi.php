<?php
//fungsi insert
function insert($table_name,$parameter,$isi){
	mysql_query("insert into $table_name($parameter)values($isi)");
	}
	
//fungsi edit
function edit($table_name,$parameter,$isi,$id_table_name,$id) {
	mysql_query("update $table_name set $parameter = '$isi' where $id_table_name='$id'");
}

//fungsi edit any
function editAny($table_name,$isi,$id_table_name,$id) {
	mysql_query("update $table_name set $isi where $id_table_name='$id'");
}

//fungsi delete all
function deleteAll($table_name) {
	mysql_query("Delete from $table_name");
}

//fungsi delete item
function deleteItem($table_name,$id_table_name,$id) {
	mysql_query("Delete from $table_name where $id_table_name='$id'");
}

//fungsi show jumlah table
function show_num($table_name) {
	$query = mysql_query("select * from $table_name");
	$jumlah = mysql_num_rows($query);
	return $jumlah;
}

//fungsi analisis penelusuran jawaban
function analysis($ip,$id_gejala) {
	$query_aturan_gejala = mysql_query("select * from aturan where id_gejala='id_gejala'");
	while ($show_aturan_gejala = mysql_fetch_array($query_aturan_gejala)) { //menyeleksi id_penyakit sesuai dengan id_gejala dari jawaban yang dipilih
	$query_aturan_penyakit = mysql_query("select * from aturan where id_penyakit = '$show_aturan_gejala[0]' GROUP BY id_penyakit"); 
	while ($show_aturan_penyakit = mysql_fetch_array($query_aturan_penyakit)) {
	//memasukkan id_penyakit yang mungkin ke dalam temp_penyakit
	mysql_query("insert into temp_penyakit(ip,id_penyakit) values('$ip','$show_aturan_gejala[0]')");
	}
}
}