<?php
@session_start();
@$session_name = $_SESSION[user_admin];
@$session_id = $_SESSION[id_admin];
if(isset($session_name)){
#isi-konten-disini------------------------------------------------------------------------------------------------------------------------------------------------?>
    
    Welcome <?=@$session_name;?>. Silahkan atur penyakit sepuas keinginan Anda. Jika perlu buat penyakit baru!

<? #---------------------------------------------------------------------------------------------------------------------------------------------------------------
}else{
	echo("<script>window.location='?';</script>");
}