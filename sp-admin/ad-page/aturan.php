<?php
@session_start();
@$session_name = $_SESSION[user_admin];
@$session_id = $_SESSION[id_admin];
if(isset($session_name)){
@$notifikasi=$_GET['notifikasi'];
if(isset($notifikasi)){
	if($notifikasi=='pilihan'){
		echo("<div align='center' id='warning'>Penyakit belum dipilih</div>");
	}elseif($notifikasi=='gejala'){
		echo("<div align='center' id='warning'>Gejala belum dipilih</div>");
	}elseif($notifikasi=='sukses'){
		echo("<div align='center' id='sukses'>Relasi Aturan berhasil dirubah</div>");
	}
}
#isi-konten-disini------------------------------------------------------------------------------------------------------------------------------------------------?>
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>
<h1>Daftar Penyakit Peserta Gejala-gejalanya</h1><hr />
<?php
// Mendeskripsikan variable
@$penyakit = $_REQUEST['id_penyakit'];
$query_penyakit = mysql_query("select * from penyakit");
?>
<form method="post" action="ad-proses/proses_edit_aturan.php">

Pilih penyakit untuk melihat gejalanya - 
<select name="penyakit" onchange="MM_jumpMenu('parent',this,0)">
	<option value="<?=@$_SERVER['PHP_SELF'];?>">Pilih penyakit</option>
    <?php 
	while($show_penyakit = mysql_fetch_array($query_penyakit)){
		// Membuat kondisi penyakit yang terpilih
		if($show_penyakit[0] == $id_penyakit){
			$selected = "selected";
		}else{
			$selected = "";
		}
	?>
    <option value="?page=aturan&id_penyakit=<?=@$show_penyakit[0];?>"<?=@$selected;?>><?=@$show_penyakit[1];?></option>
    <? } ?>
</select><br /><hr /><br />

<input type="hidden" name="pilihan" value="<?=@$penyakit;?>"/>
<?php 
//Menampilkan Name Penyakit
$query_name_penyakit = mysql_query("select penyakit from penyakit where id_penyakit = '$penyakit'");
$show_name_penyakit = mysql_fetch_array($query_name_penyakit);
?>
<table>
<tr>
	<td height="30" valign="top" colspan="2">Jenis Penyakit  <?=@$show_name_penyakit[0];?> mempunyai gejala antara lain :</td>
</tr>
<?php
// Menampilkan gejala dari tabel aturan 
$query_gejala = mysql_query("select * from gejala");
while($show_gejala = mysql_fetch_array($query_gejala)){
	$query_aturan = mysql_query("select * from aturan where id_penyakit = '$penyakit' and id_gejala = '$show_gejala[0]'");
	$cek = mysql_num_rows($query_aturan);
	if($cek == 1){
		$cek = "checked";
	}else{
		$cek = "";
	}?>
	<tr>
		<td><input name="gejala_penyakit[]" type="checkbox" value="<?=@$show_gejala[0];?>"<?=@$cek;?>></td><td><?=@$show_gejala[1];?></td>
    </tr><? 
} ?>
</table>
<br /><br />
<input type="submit" value="Perbaharui Data"> <input type="reset" value="Reset" />
</form>
<br /><br />
<? #---------------------------------------------------------------------------------------------------------------------------------------------------------------
}else{
	echo("<script>window.location='?';</script>");
}