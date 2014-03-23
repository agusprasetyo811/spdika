<?php
// Proses insert arikel
include('../ad-php/php_connection.php');
@$judul = $_POST['judul'];
@$artikel = $_POST['artikel'];
@$tgl = $_POST['date'];
@$id_artikel = $_POST['id_artikel'];
@$id_artikel_hapus = $_GET['id_artikel_hapus'];

if($id_artikel!=""){
	mysql_query("update artikel set judul='$judul',isi='$artikel' where id_artikel = '$id_artikel'");
	echo("<script>window.location='../?page=artikel&notifikasi=sukses_update';</script>");
}elseif($id_artikel_hapus!=""){
	mysql_query("delete from artikel where id_artikel = '$id_artikel_hapus'");
	echo("<script>window.location='../?page=artikel&notifikasi=sukses_delete';</script>");
}else{
	if($judul == ""){
	echo("<script>window.location='../?page=artikel-tambah&notifikasi=kosong';</script>");
	}else{
		mysql_query("insert into artikel(judul,isi,tgl)values('$judul','$artikel','$tgl')");
		echo("<script>window.location='../?page=artikel&notifikasi=sukses_insert';</script>");
	}
}