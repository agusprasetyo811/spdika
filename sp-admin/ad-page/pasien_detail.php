<?php
@session_start();
@$session_name = $_SESSION[user_admin];
@$session_id = $_SESSION[id_admin];
if(isset($session_name)){
#isi-konten-disini------------------------------------------------------------------------------------------------------------------------------------------------?>
<?php
// Memperoleh parameter pasien
@$id_pasien = $_GET['id_pasien'];
$query_pasien = mysql_query("select * from pasien where id_pasien = '$id_pasien'");
$show_pasien = mysql_fetch_array($query_pasien);
?>

<h1 align="center">Selengkapnya Tentang <?=@$show_pasien[1];?></h1>
<table align="center" border="1">
	<tr>
    	<td rowspan="6" colspan="2"><img width="250" height="300" src="../images/<?=@$show_pasien[7];?>" /></td><td colspan="2">Keterangan</td>
    </tr>
    <tr>
    	<td>Nama : </td>
        <td><?=@$show_pasien[1];?></td>
    </tr>
    <tr>
    	<td>Alamat : </td>
    	<td><?=@$show_pasien[2];?></td>
    </tr>
    <tr>
    	<td>Tanggal Lahir : </td>
    	<td><?=@$show_pasien[3];?></td>
    </tr>
    <tr>
    	<td>Umur : </td>
    	<td><?=@$show_pasien[4];?> Tahun</td>
    </tr>
    <tr>
    	<td>Username : </td>
    	<td><?=@$show_pasien[5];?></td>
    </tr>
    <tr>
    	<td colspan="4"><a href="?page=pasien">Kembali</a></td>
    </tr>
</table>

<? #---------------------------------------------------------------------------------------------------------------------------------------------------------------
}else{
	echo("<script>window.location='?';</script>");
}