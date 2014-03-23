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
    	<td rowspan="6" width="280"><img src="images/<?=@$show[7];?>" width="250" height="350"/><br><br><a href="?page=edit-foto">Ingin mengganti Foto..?</a></td>
        <td height="25">Nama</td>
        <td><input type="text" value="<?=@$show[1];?>" name="nama" /></td>
    </tr>
    <tr>
        <td height="25">Alamat</td>
        <td><input type="text" value="<?=@$show[2];?>" name="alamat"/></td>
    </tr>
    <tr>
    	<td height="25">Tanggal Lahir</td>
        <td><input type="text" id="datepicker" value="<?=@$show[3];?>" name="tgl_lahir"/></td>
    </tr>
    <tr>
    	<td height="25">Username</td>
        <td><input type="text" value="<?=@$show[5];?>" name="user"/></td>
    </tr>
     <tr>
    	<td height="25">Password</td>
        <td><input type="password" value="<?=@$show[6];?>" name="pass"/></td>
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

