<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title;?></title>
<link rel="stylesheet" href="<?php echo $_CONFIG['address'];?>/sp-templates/<?php echo $_CONFIG['template_name'];?>/widget/topmenu/css/styles_menus.css"/>
<link rel="stylesheet" href="<?php echo $_CONFIG['address'];?>/style/tanggal.css" />
<link rel="stylesheet" href="<?php echo $_CONFIG['address'];?>/style/ui-lightness/jquery.ui.all.css" /> 
<script language="javascript" src="<?php echo $_CONFIG['address'];?>/sp-templates/<?php echo $_CONFIG['template_name'];?>/widget/topmenu/js/jquery.js"></script>
<script language="javascript" src="<?php echo $_CONFIG['address'];?>/sp-templates/<?php echo $_CONFIG['template_name'];?>/widget/topmenu/js/interface.js"></script>
<script language="javascript" src="<?php echo $_CONFIG['address'];?>/js/jquery.ui.core.js"></script>
<script language="javascript" src="<?php echo $_CONFIG['address'];?>/js/jquery.ui.widget.js"></script>
<script language="javascript" src="<?php echo $_CONFIG['address'];?>/js/jquery.ui.datapicter.js"></script>
<script language="javascript">
	$(function() {
		$( "#datepicker" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
	});
</script>
<script type="text/javascript">	
	$(document).ready(
		function() {
			$('#dock').Fisheye(
				{
					maxWidth: 50,
					items: 'a', // menunjuk pada <a></a>
					itemsText: 'span', // menunjuk pada <span></span>
					container: '.dock-container', // class
					itemWidth: 40, 
					proximity: 90, // besar animasi icon
					halign : 'left' // Posisi horizontal menu 
				}
			)
		}
	);
</script>
</head>
<body id="all">
<div id="layout">
	<div id="body-All">
		<? // Header ----------------------------------------------------------------------------------------------------------------- ?>
		<div id="header">
			<div id="logo"><img src="<?php echo $_CONFIG['address'];?>/images/palang_merah.png" width="147" height="116" /></div>
			<div id="judul" class="judul"></div>
			<div id="deskripsi" class="deskripsi"></div>
			<div id="garis"></div>
            <div id="backgroun-logo"></div>
            <?php // Menampilkan Foto Anggota
			@session_start();
			@$session_name = $_SESSION[user];
			@$session_id = $_SESSION[id];
			if(isset($session_id)){
				$query = mysql_query("select foto from pasien where id_pasien='$session_id'");
				$show = mysql_fetch_array($query);
				echo("<div id='foto_account'><a href='?page=profile'><img src='images/$show[0]' width='100' height='120'></a></div>");
			}else{
				
			}
			?>
		</div>
		<? // Content ----------------------------------------------------------------------------------------------------------------- ?>
		<div id="content">
			<div id="topmenu" align="center">
				<?php  // Login field area deskription 
				if(isset($session_name)){
					// Mengincludekan menu_login
					require('widget/topmenu/menu_login.php');
					$salam = 'Selamat datang ' . $session_name . ' - ';
					// Membuat salam pembuka saat user berhasil login ?>
					<div id='account' align='left'>
						<?=@$salam;?><a href='sp-proses/proses_logout.php'>Ingin keluar..?</a>
                        <div id='clock'>
                        	00:00:00
                        </div>
                   	</div><?
				} else {
					// Mengincludekan menu_index
					require('widget/topmenu/menu_index.php');
					if(@$_GET[notifikasi] == 'logout'){
						// Jika logout maka akan menampilkan pesan logout ?>
						<div id='account' align='left'>
                        	Anda telah keluar
                            <div id='clock'>
                            	00:00:00
                            </div>
                        </div><?
					} else {
						// Jika Field tidak mengandung aksi ?>
						<div id='account' align='left'>
                        	SP-DIKA - Untuk berkonsultasi Anda harus <a href="<?php echo $_CONFIG['address'];?>/?page=login">Login</a> 
                            <div id='clock'>
                            	00:00:00
                            </div>
                        </div><?
					}
				}
				?>
				<!-- hiasan -->
				<div id="hiasan_02s"></div>
			</div>
			<!-- Content Text -->
			<div id="content-text">
				<!-- Sidebar -->
				<div id="sidebar">
					<div id="sidebar-text">
						<div id="berita-berjalan">
							<iframe src="<?php echo $_CONFIG['address'];?>/sp-templates/<?php echo $_CONFIG['template_name'];?>/widget/scroll-artikel/index.php" 
                            frameborder="0" width="280" height="220"></iframe>
						</div>
						<div id="tgl">
							<iframe src="<?php echo $_CONFIG['address'];?>/sp-templates/<?php echo $_CONFIG['template_name'];?>/widget/date/index.php" frameborder="0" 
                            width="242" height="320"></iframe>
						</div>
					</div>
					<div id="sidebar-text"></div>
				</div>
				<div id="content-icon" class="font-body">
					{BODY}
				</div>
			</div>
		</div>
		<? // Footer ----------------------------------------------------------------------------------------------------------------- ?>
		<div align="center" id="footer">
			<?=@$_CONFIG['footer'];?>
		</div>
	</div>
</div> 
<br/><br/>
</body>
</html>