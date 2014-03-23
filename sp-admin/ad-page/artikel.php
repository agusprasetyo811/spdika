<?php
@session_start();
@$session_name = $_SESSION[user_admin];
@$session_id = $_SESSION[id_admin];
if(isset($session_name)){
// Include date time
include '../aplikasi/date-time/index.php';
@$id_artikel = $_GET['id_artikel'];
if(isset($id_artikel)){
	$query_artikel = mysql_query("select * from artikel where id_artikel = '$id_artikel'");
	$show_artikel = mysql_fetch_array($query_artikel);
} 
#isi-konten-disini------------------------------------------------------------------------------------------------------------------------------------------------?>
<h1 align="center">Input artikel</h1>
<form name="formName" method="post" action="ad-proses/proses_artikel.php">
<table align="center">
<tr>
	<td>Judul : </td>
</tr>
<tr>
	<td><input type="text" size="60" name="judul" value="<?=@$show_artikel[1];?>" /></td>
</tr>
<tr>
	<td>Artikel : </td>
</tr>
<tr>
	<td><textarea name="artikel" id="area2" cols="60" rows="20"><?=@$show_artikel[2];?></textarea></td>
</tr>
<tr>
	<td>
    <input type="submit" value="Simpan" />
    <input type="hidden" name="id_artikel" value="<?=@$id_artikel;?>"/>
    <input type="hidden" name="date" value="<?=@$date_time;?>"/>
    </td>
</tr>
</table>
</form>
<? #---------------------------------------------------------------------------------------------------------------------------------------------------------------
}else{
	echo("<script>window.location='/';</script>");
}