<?php
@session_start();
@$session_name = $_SESSION[user_admin];
@$session_id = $_SESSION[id_admin];
if(isset($session_name)){
#isi-konten-disini------------------------------------------------------------------------------------------------------------------------------------------------?>
    ini adalah daftar profile dan pengaturanya

<? #---------------------------------------------------------------------------------------------------------------------------------------------------------------
}else{
	echo("<script>window.location='?';</script>");
}