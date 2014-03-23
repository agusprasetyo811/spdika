<?php 
// Menangkap parameter notifikasi
@$notifikasi = $_GET['notifikasi'];
if(isset($notifikasi)){
	if($notifikasi == 'kosong'){
		echo("<div align='center' style='color:red;'>Field Kosong</div>");
	} else if($notifikasi == 'user'){
		echo("<div align='center' style='color:red;'>User Salah</div>");
	} else if($notifikasi == 'pass'){
		echo("<div align='center' style='color:red'>Password Salah</div>");
	}
}
?>
<form method="post" action="sp-proses/proses_login.php">
	<div align="center" id="login"><br/><br/><br/>
	<div id="loggo"><img src="<?php echo $_CONFIG['address'];?>/images/login.png" width="160" height="130"/></div>
	<div id="login-text"></div>
	<table border="0" >
		<tr>
			<td colspan="2"></td>
			<td>&nbsp;</td>
		</tr>
		<tr> 
			<td class="login1">Username</td>
			<td>:</td>
			<td><input class="field" type="text" name="name" value="" size="30" /></td>
		</tr>
		<tr> 
			<td class="login1">Password</td>
			<td>:</td>
			<td><input class="field" type="password" name="pass" value="" size="30" /></td>
		</tr>
		<tr>
			<td colspan="3" align="right">
            	<div style="position:absolute;margin-top:10px;margin-left:70px;">Tidak punya Akun..? <a href="?page=daftar">klik disini</a></div>
            	<input class="button" type="submit" name="login" value="LOGIN" />
            </td>
		</tr>
	</table>
	</div>
</form>
