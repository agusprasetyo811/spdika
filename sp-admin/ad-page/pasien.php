<?php
@session_start();
@$session_name = $_SESSION[user_admin];
@$session_id = $_SESSION[id_admin];
if(isset($session_name)){
#isi-konten-disini------------------------------------------------------------------------------------------------------------------------------------------------?>
<h1>Daftar pasien</h1><hr><br />
<table class="table" align="center" border="1" >
<thead>
    <tr>
    	<td>No</td>
        <td width="200">Nama Pasien</td>
        <td width="300">Alamat</td>
        <td width="150">Tanggal lahir</td>
        <td width="100">Umur</td>
        <td width="100">Username</td>
        <td width="100">Password</td>
        <td width="200">Aksi</td>
    </tr>
</thead>
<tbody>
<?php
$query_pasien = mysql_query("select * from pasien order by id_pasien desc");
$i=1;
while($show_pasien = mysql_fetch_array($query_pasien)){?>
	<tr>
    	<td><?=@$i;?></td>
        <td><?=@$show_pasien[1];?></td>
        <td><?=@$show_pasien[2];?></td>
        <td><?=@$show_pasien[3];?></td>
        <td><?=@$show_pasien[4];?> Tahun</td>
        <td><?=@$show_pasien[5];?></td>
        <td><?=@$show_pasien[6];?></td>
        <td>
        <a href="?page=pasien-detail&id_pasien=<?=@$show_pasien[0];?>">Lihat Detail</a> -
        <a href="id_pasien=<?=@$show_pasien[0];?>">Edit</a> - 
        <a href="id_pasien=<?=@$show_pasien[0];?>">Hapus</a>
        </td>
    </tr>
<?
$i++;
}
?>
</tbody>
</table>
<br /><br />
<? #---------------------------------------------------------------------------------------------------------------------------------------------------------------
}else{
	echo("<script>window.location='?';</script>");
}