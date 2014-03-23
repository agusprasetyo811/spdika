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
		echo("<div align='center' id='sukses'>Gejala belum dipilih</div>");
	}
}
?>
<h1>Daftar gejala penyakit</h1><hr /><br />
<table align="center" border="1" class="table">
	<thead>
		<tr>
        	<td>Kode</td>
            <td width="400">Gejala</td>
            <td width="100">Aksi</td>
        </tr>
    </tr>
<?php 
$query = mysql_query("select * from gejala");
while($show = mysql_fetch_array($query)){?>
	<tbody>
    	<tr>
        	<td><?=@$show[0];?></td>
            <td><?=@$show[1];?></td>
            <td><a href="?page=edit-gejala&id_gejala=<?=@$show[0];?>">Edit Gejala</a></td>
        </tr>
    </tbody>
<? } ?>
</table>
<br /><br />
<? #---------------------------------------------------------------------------------------------------------------------------------------------------------------
}else{
	echo("<script>window.location='?';</script>");
}