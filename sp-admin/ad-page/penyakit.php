<?php
@session_start();
@$session_name = $_SESSION[user_admin];
@$session_id = $_SESSION[id_admin];
if(isset($session_name)){
#isi-konten-disini------------------------------------------------------------------------------------------------------------------------------------------------?>
<?php 
@$notifikasi = $_GET[notifikasi];
if(isset($notifikasi)){
	if($notifikasi == 'sukses'){
		echo("<div align='center' id='sukses'>Data Berhasil di Edit</div>");
	}
}
?>
<h1>Daftar penyakit beserta Keterangannya</h1><hr /><br />
<table class="table" align="center" border="1" width="98%">
	<thead>
		<tr>
        	<td>Kode</td>
            <td width="100">Nama</td>
            <td width="430">Definisi</td>
            <td>Solusi</td>
            <td width="90">Aksi</td>
        </tr>
    </tr>
<?php 
$query = mysql_query("select * from penyakit");
while($show = mysql_fetch_array($query)){?>
	<tbody valign="top">
    	<tr>
        	<td><?=@$show[0];?></td>
            <td><?=@$show[1];?></td>
            <td><?=@$show[2];?></td>
            <td><?=@$show[3];?></td>
            <td><a class="button-b" href="?page=edit-penyakit&id_penyakit=<?=@$show[0];?>">Edit Penyakit</a></td>
        </tr>
    </tbody>
<? } ?>
</table>
<br /><br />
<? #---------------------------------------------------------------------------------------------------------------------------------------------------------------
}else{
	echo("<script>window.location='?';</script>");
}