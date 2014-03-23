<?php 
// Field Anggota
@session_start();
@$session_name = $_SESSION[user];
@$session_id = $_SESSION[id];  
if(isset($session_name)){
	// Mengosongkan table jawaban berdasarkan id user
	deleteItem("jawaban", "id_pasien", "$session_id");
	// Mengosongkan table temp_gejala berdasarkan id user
	deleteItem("temp_gejala", "id_pasien", "$session_id");
	// Mengosongkan table temp_penyakit berdasarkan id user
	deleteItem("temp_penyakit", "id_pasien", "$session_id");
	?>
	<iframe frameborder="0" width="500" height="400" src="<?php echo $_CONFIG['address'];?>/aplikasi/sp.dika/index.php"></iframe><?
} else { ?>
	<div id="warning">Akses ditutup. Anda harus login terlebih dahulu</div><?
}

