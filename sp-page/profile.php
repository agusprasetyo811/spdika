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
<table border="0" width="530">
	<tr>
    	<td width="270" rowspan="6"><img src="images/<?=@$show[7];?>" width="250" height="350"/></td>
        <td height="25">Nama</td>
        <td><?=@$show[1];?></td>
    </tr>
    <tr>
        <td height="25">Alamat</td>
        <td><?=@$show[2];?></td>
    </tr>
    <tr>
    	<td height="25">Tanggal Lahir</td>
        <td><?=@$show[3];?></td>
    </tr>
     <tr>
    	<td height="25">Umur</td>
        <td><?=@$show[4] . ' Tahun';?> </td>
    </tr>
    <tr>
    	<td height="25">Username</td>
        <td><?=@$show[5];?></td>
    </tr>
    <tr>
    	<td></td>
        <td></td>
    </tr>
</table>
<? #---------------------------------------------------------------------------------------------------------------------------------------------------------- 
} else { ?>
	<div id="warning">Akses ditutup. Anda harus login terlebih dahulu</div><?
}

