<?php
// By Agus Prasetyo - POLITEKNIK TELKOM  2 july 2011

// Fungsi untuk upload file
function upload($file,$folder,$folder_images) {
	// Menggenerate  files
	$files = $file;	
	// Format gambar yang diupload keserver dalam bentuk array
	$format_gambar = array(	'image/jpg',
							'image/jpeg',
							'image/pjpeg',
							'image/png',
							'image/x-png',
							'image/gif'
							);
	// Melakukan pengkondisian						
	if ($files['error'] > 0) {
		$error = $files['error'];
		echo"<script>alert('Error = '+$error);javascript:history.go(-1);</script>";
	} else {
		@$pic_name = $files['name'];
		@$pic_type = $files['type'];
		@$pic_size = $files['size'] . " kb";
		@$pic_temp_name = $files['tmp_name'];
		// Get session name
		@session_start();
		$_SESSION['nama'] = $pic_name;
		$gb_nama = $_SESSION['nama'];
		$_SESSION['tipe'] = $pic_type;
		$gb_type = $_SESSION['tipe'];
		$_SESSION['size'] = $pic_size;
		$gb_size = $_SESSION['size'];
		$_SESSION['sementara'] = $pic_temp_name;
		$gb_sementara = $_SESSION['sementara'];
	}
	
	// Jika file tidak sesuai dengan format dan ukuranya terlalu besar
	if(!in_array((@$pic_type),$format_gambar)) {
		echo"<script>alert('Format file tidak cocok');javascript:history.go(-1);</script>";
		exit;
	} else if(($pic_size =!0) && ($pic_size > 30000)) {
		echo"<script>alert('File terlalu besar');javascript:history.go(-1);</script>";
		exit;
	}
	
	$oldmask = umask(0);
	// Membuat direktory folder
	@mkdir($folder.''.$folder_images, 0777);
	umask($oldmask);
	// Menggenerate file name location
	$picture = $folder.''.$folder_images.'/'.$pic_name;
	$picture_location = $folder_images.'/'.$pic_name;
	copy($pic_temp_name, $picture);
	unlink($pic_temp_name );
	
	// Mengembalikan nilai picture yaitu berupa nama gambar yang diupload
	return $picture_location;
}