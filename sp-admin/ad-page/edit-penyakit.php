<?php 
@session_start();
@$session_name = $_SESSION[user_admin];
@$session_id = $_SESSION[id_admin]; 
// Field Edit Penyakit
@$id_penyakit = $_GET['id_penyakit'];
$query = mysql_query("select * from penyakit where id_penyakit = '$id_penyakit'");
$show = mysql_fetch_array($query);
if(isset($session_name)){
#isi-konten-disini------------------------------------------------------------------------------------------------------------------------------------------------?>
<form method="post" action="ad-proses/proses_edit_penyakit.php">
    <table>
        <tr>
            <td>Kode</td>
            <td><input type="text" name="kode" readonly value="<?=@$show[0]?>" /></td>
        </tr>
        <tr>
            <td>Nama Penyakit</td>
            <td><input type="text" name="nama_penyakit" value="<?=@$show[1]?>" /></td>
        </tr>
        <tr>
            <td>Definisi</td>
            <td><textarea name="definisi"><?=@$show[2]?></textarea></td>
        </tr>
        <tr>
            <td>Solusi</td>
            <td><textarea name="solusi"><?=@$show[3]?></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Perbaharui"/></td>
        </tr>
    </table>
    </form>
<? #---------------------------------------------------------------------------------------------------------------------------------------------------------------
}else{
	echo("<script>window.location='?';</script>");
}
