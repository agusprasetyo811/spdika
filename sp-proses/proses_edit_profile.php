<?php
include '../sp-php/php_connection.php';
include '../sp-php/php_upload_function.php';
// Menangkap Variable
@$id_pasien = $_POST['id_pasien'];
@$file = $_FILES['file'];
@$nama = $_POST['nama'];
@$alamat = $_POST['alamat'];
@$tgl_lahir = $_POST['tgl_lahir'];
@$user = $_POST['user'];
@$pass = $_POST['pass'];

@$tahun_lahir = substr($tgl_lahir,-4);
@$tahun_sekarang = date('Y');
@$umur_pasien = $tahun_sekarang - $tahun_lahir;

// Melakukan proses update
if($file!=""){
	$upload = upload($file,'../images/','pasien');	
	if(isset($upload)){
		mysql_query("update pasien set  foto = '$upload' 
									where id_pasien = '$id_pasien'");
		echo("<script>window.location='..?page=edit-profile&notifikasi=sukses'</script>");
	}
} else {
	mysql_query("update pasien set  nama_lengkap = '$nama', 
									alamat = '$alamat', 
									tgl_lahir = '$tgl_lahir',
									umur = '$umur_pasien', 
									user = '$user', 
									pass = '$pass'
									where id_pasien = '$id_pasien'");
	echo("<script>window.location='..?page=profile&notifikasi=sukses'</script>");
}


