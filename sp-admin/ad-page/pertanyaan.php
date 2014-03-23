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
<h1>Daftar pertanyaan</h1><hr /><br />
<table align="center" border="1" class="table">
	<thead>
		<tr>
        	<td width="100">Kode</td>
            <td width="800">Pertanyaan</td>
            <td width="100">Aksi</td>
        </tr>
    </tr>
<?php 
$query = mysql_query("select * from pertanyaan");
while($show = mysql_fetch_array($query)){?>
	<tbody>
    	<tr>
        	<td><?=@$show[0];?></td>
            <td><?=@$show[2];?></td>
            <td><a href="?page=edit-pertanyaan&id_pertanyaan=<?=@$show[0];?>">Edit Pertanyaan</a></td>
        </tr>
    </tbody>
<? } ?>
</table>
<br /><br />
<? #---------------------------------------------------------------------------------------------------------------------------------------------------------------
}else{
	echo("<script>window.location='?';</script>");
}