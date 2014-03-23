<?php
// Proses untuk melakukan logout
@session_start();
if(isset($_SESSION['user'])) {
	@session_destroy();
	echo("<script>window.location='../?notifikasi=logout';</script>");
}


 