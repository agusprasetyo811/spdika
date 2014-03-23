<?php 
// Field Anggota
@session_start();
@$session_name = $_SESSION[user];
@$session_id = $_SESSION[id];  
if(isset($session_name)){
#-----------------------------------------------------------------------------------------------------------------------------------------------------------?>
<h1>Profile <?=@$session_name;?> | <a href="?page=edit-profile">Ingin Merubah Profile..?</a></h1>
<?php
$query = mysql_query("select * from pasien where id_pasien = '$session_id'");
$show = mysql_fetch_array($query);
?>
<form method="post" enctype="multipart/form-data" action="sp-proses/proses_edit_profile.php">
<table border="0" width="530">
	<tr>
    	<td rowspan="6" width="280"><img src="images/<?=@$show[7];?>" width="250" height="350"/></td>
        <td height="25">Buka File dan pilih foto anda</td>
        <td></td>
    </tr>
    <tr>
        <td height="25"><input type="file" name="file" /></td>
        <td></td>
    </tr>
    <tr>
    	<td height="25"><a href="?page=edit-profile">Kembali</a></td>
        <td></td>
    </tr>
    <tr>
    	<td height="25"></td>
        <td></td>
    </tr>
     <tr>
    	<td height="25"></td>
        <td></td>
    </tr>
     <tr>
    	<td></td>
        <td></td>
    </tr>
    <tr>
    	<td align="right" colspan="3"><input type="submit" value="Perbaharui Data"/><input type="hidden" name="id_pasien" value="<?=@$show[0];?>"/></td>
    </tr>
</table>
</form>
<? #---------------------------------------------------------------------------------------------------------------------------------------------------------- 
} else { ?>
	<div id="warning">Akses ditutup. Anda harus login terlebih dahulu</div><?
}

