<?php
@session_start();
@$session_name = $_SESSION[user_admin];
@$session_id = $_SESSION[id_admin];
if(isset($session_name)){
#isi-konten-disini------------------------------------------------------------------------------------------------------------------------------------------------?>
<h1 align="center">Laporan Konsultasi Pasien</h1>
<table class="table" align="center" border="1" >
<thead>
    <tr>
    	<td>No</td>
        <td width="150">Nama Pasien</td>
        <td width="150">Hasil Analisa</td>
        <td>Tanggal Konsultasi</td>
        <td>Aksi</td>
    </tr>
</thead>
<tbody>
<?php 
// Mengeluarkan isi laporan
$query_laporan = mysql_query("select * from laporan order by id_laporan desc");
$i=1;
while($show_laporan = mysql_fetch_array($query_laporan)){?>
	<tr>
        <td><?=@$i;?></td>
        <td><a href="?page=pasien-detail&id_pasien=<?=@$show_laporan[1];?>"><?=@$show_laporan[2];?></a></td>
        <td><?=@$show_laporan[3];?></td>
        <td><?=@$show_laporan[4];?></td>
        <td><a href="ad-proses/proses_delete_laporan.php?id_laporan=<?=@$show_laporan[0];?>">Hapus</a></td>
    </tr>
<?
$i++;
}
?>
</tbody>
</table>
<? #---------------------------------------------------------------------------------------------------------------------------------------------------------------
}else{
	echo("<script>window.location='?';</script>");
}