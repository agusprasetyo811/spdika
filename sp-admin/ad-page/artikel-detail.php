<?php
@session_start();
@$session_name = $_SESSION[user_admin];
@$session_id = $_SESSION[id_admin];
if(isset($session_name)){
$id_artikel = $_GET['id_artikel'];
$query_artikel = mysql_query("select * from artikel where id_artikel = '$id_artikel'");
$show_artikel = mysql_fetch_array($query_artikel);
#isi-konten-disini------------------------------------------------------------------------------------------------------------------------------------------------?>
<h1 align="center">Detail Artikel</h1>
<table align="center">
	<tr>
    	<td><h1><?=@$show_artikel[1];?></h1><?=@$show_artikel[3];?></td>
    </tr>
    <tr>
       <td width="600"><?=@$show_artikel[2];?></td>
    </tr>
</table>
<? #---------------------------------------------------------------------------------------------------------------------------------------------------------------
}else{
	echo("<script>window.location='/';</script>");
}