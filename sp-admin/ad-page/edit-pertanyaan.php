<?php 
@session_start();
@$session_name = $_SESSION[user_admin];
@$session_id = $_SESSION[id_admin]; 
// Field Edit Penyakit
@$id_pertanyaan = $_GET['id_pertanyaan'];
$query = mysql_query("select * from pertanyaan where id_pertanyaan = '$id_pertanyaan'");
$show = mysql_fetch_array($query);
if(isset($session_name)){
#isi-konten-disini------------------------------------------------------------------------------------------------------------------------------------------------?>
<form method="post" action="ad-proses/proses_edit_pertanyaan.php">
<table width="900">
	<tr>
    	<td>Kode</td>
        <td><input type="text" name="kode" readonly value="<?=@$show[0]?>" /></td>
    </tr>
    <tr>
    	<td>Pertanyaan</td>
        <td><textarea name="pertanyaan"><?=@$show[2]?></textarea></td>
    </tr>
    <tr>
    	<td></td>
        <td><input type="submit" value="Perbaharui"/></td>
    </tr>
</table>
</form>
<? #---------------------------------------------------------------------------------------------------------------------------------------------------------------
}else{
	echo("<script>window.location='?';</script>");
}

