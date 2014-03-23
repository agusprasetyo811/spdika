<?php
@session_start();
@$session_name = $_SESSION[user_admin];
@$session_id = $_SESSION[id_admin];
if(isset($session_name)){
$query_artikel = mysql_query("select * from artikel");
#isi-konten-disini------------------------------------------------------------------------------------------------------------------------------------------------?>
<h1 align="center">Daftar Artikel</h1>
<table align="center" border="1">
	<tr>
    	<td colspan="5"><a href="?page=artikel-tambah">Tambah Artikel</a></td>
    </tr>
    <tr>
    	<td>No</td>
    	<td>Judul Artikel</td>
        <td width="500">isi</td>
        <td>Tanggal Masuk</td>
        <td>Aksi</td>
    </tr>
    <? $i=1; while($show_artikel = mysql_fetch_array($query_artikel)) { ?>
    <tr>
    	<td><?=@$i;?></td>
    	<td><?=@$show_artikel[1];?></td>
        <td><?=@substr($show_artikel[2],0,70);?></td>
        <td><?=@$show_artikel[3];?></td>
        <td>
        	<a href="?page=artikel-detail&id_artikel=<?=@$show_artikel[0];?>">Detail</a> | 
        	<a href="?page=artikel-tambah&id_artikel=<?=@$show_artikel[0];?>">Edit</a> | 
        	<a href="ad-proses/proses_artikel.php?id_artikel_hapus=<?=@$show_artikel[0];?>">Hapus</a> 
        </td>
    </tr>
    <? $i++;}?>
</table>
<? #---------------------------------------------------------------------------------------------------------------------------------------------------------------
}else{
	echo("<script>window.location='/';</script>");
}