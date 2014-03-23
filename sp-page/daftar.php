<?php 
@$notifikasi = $_GET['notifikasi'];
if(isset($notifikasi)){
	if($notifikasi == 'kosong') {
		echo("<div align='center' style='color:red;'>Field Kosong</div>");
	} else if($notifikasi == 'not_same') {
		echo("<div align='center' style='color:red;'>Password tidak Cocok</div>");
	} else if($notifikasi == 'ok') {
		echo("<div align='center' style='color:green'>Sukses untuk mendaftar. Silahkan Login dengan username anda untuk berkonsultasi</div>");
	}
}
?>

<h2>Daftar Pasien </h2>
<form method="post" action="sp-proses/proses_daftar.php">
<table width="400"> 
<tr>
	<td>Nama</td>
   	<td>:</td>
    <td><input class="field" type="text" value="" name="nama_pasien" size="30" /></td>
</tr>
<tr>
	<td>Alamat</td>
    <td>:</td>
    <td><input class="field" type="text" value="" name="alamat_pasien" size="30" /></td>
</tr>
<tr>
	<td>Tanggal Lahir</td>
    <td>:</td>
    <td><input type="text" id="datepicker" class="field" name="tanggal"/></td>
</tr>
<tr>
	<td>Username</td>
    <td>:</td>
    <td><input class="field" type="text" name="user_pasien" size="30" /></td>
</tr>
<tr>
	<td>Password</td>
    <td>:</td>
    <td><input class="field" type="password" name="pass_pasien" size="30" /></td>
</tr>
<tr>
	<td>Confirm Password</td>
    <td>:</td>
    <td><input class="field" type="password" name="con_pass_pasien" size="30" /></td>
</tr>
<tr>
	<td colspan="3" align="right"><input class="button" type="submit" name="daftar" value="Daftar" />&nbsp; &nbsp;<input class="button" type="reset" name="reset" value="Reset" /></td></tr>
</table>
</form>