<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?=@$_CONFIG['address']?>/ad-style/style.css" type="text/css" />
<title>SP-DIKA Admin</title>
</head>
<body id="all">
<div id="layout">
    <div id="body">
    <?php
	// Mendapatkan parameter notifikasi 
	@$notifikasi = $_GET[notifikasi];
	// Melakukan pengencekan data
	if(isset($notifikasi)) {
		if($notifikasi == 'kosong'){
			echo("<div align='center' id='warning'>Field Kosong</div>");
		}else if($notifikasi == 'user'){
			echo("<div align='center' id='warning'>Admin diluar jangkauan</div>");
		}else if($notifikasi == 'pass'){
			echo("<div align='center' id='warning'>Password salah</div>");
		}else if($notifikasi == 'logout'){
			echo("<div align='center' id='warning'>Anda telah keluar</div>");
		}
	}
	?>
    <form method="post" action="ad-proses/proses_login.php">
    <h1>SP-Dika Admin</h1>
    <table>
        <tr>
            <td width="250" class="font-style">User Admin</td>
            <td><input class="input" type="text" name="user_admin"/></td>
        </tr>
        <tr>
            <td class="font-style">Password</td>
            <td><input class="input" type="password" name="pass_admin"/></td>
        </tr>
        <tr>
            <td></td>
            <td height="50" valign="bottom" align="right"><input class="submit" type="submit" value="login"/></td>
        </tr>
    </table>
    </form>
    </div>
</div>
</body>
</html>
