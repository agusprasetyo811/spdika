<?php
// proses Rubah gejala
include('../ad-php/php_connection.php');
@$pilihan = $_REQUEST['pilihan'];
@$gejala_penyakit = $_REQUEST['gejala_penyakit'];
// Melakukan pengecekan
if($pilihan == ""){
	echo("<script>window.location='../?page=aturan&notifikasi=pilihan';</script>");
}elseif($gejala_penyakit == ""){
	echo("<script>window.location='../?page=aturan&notifikasi=gejala';</script>");
}else{
	$num = count($gejala_penyakit);
	if($num == 0){
		echo("<script>window.location='../?page=aturan&notifikasi=kosong';</script>");
	}else{
	
		// Menghapus pilihan yang tidak dipilih
		$query_aturan = mysql_query("select * from aturan where id_penyakit = '$pilihan'");
		while($show_aturan = mysql_fetch_array($query_aturan)){
			// Melakukan pengurangan untuk melakukan pengecekan jumlah
			for($i=0;$i<$num;++$i){
				// Melakukan pengecekan jika gejala yang dipilih tidak sama dengan gejala aturan
				if($show_aturan[1] != $gejala_penyakit[$i]){
					mysql_query("delete from aturan where id_penyakit = '$pilihan' and not id_gejala in ('$gejala_penyakit[$i]')");
					echo("<script>window.location='../?page=aturan&notifikasi=sukses';</script>");
				}
			}
		}
		
		// Menambah data gejala tambahan
		for($i=0;$i<$num;++$i){
			// Mengeluarkan data aturan
			$query_aturan = mysql_query("select * from aturan where id_penyakit = '$pilihan' and id_gejala='$gejala_penyakit[$i]'");
			$cek = mysql_num_rows($query_aturan);
			// Menyimpan gejala yang baru
			if(!$cek == 1){
				echo $cek;
				mysql_query("insert into aturan(id_penyakit,id_gejala)values('$pilihan','$gejala_penyakit[$i]')");
				echo("<script>window.location='../?page=aturan&notifikasi=sukses';</script>");
			}
		}
		// Jika tidak Terjadi Perubahan
		echo("<script>window.location='../?page=aturan&notifikasi=sukses';</script>");
	}
}