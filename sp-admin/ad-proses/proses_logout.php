<?php
// Proses untuk melakukan logout
@session_start();
if(isset($_SESSION['user_admin'])) {
	@session_destroy();
	echo("<script>window.location='../?notifikasi=logout';</script>");
}


 