<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?=@$_CONFIG['address']?>/ad-templates/<?=@$_CONFIG['template_name']?>/css/style.css" type="text/css" />
<title><?php echo $title;?></title>
<script language="javascript" src="ad-js/jquery.js"></script>
<script language="javascript" src="ad-js/nicEdit.js"></script>
<script language="javascript">
bkLib.onDomLoaded(function() {
	new nicEditor({fullPanel : true}).panelInstance('area2');
	new nicEditor({fullPanel : true}).panelInstance('area3');
});
</script>
<script language="javascript" src="ad-js/date-time.js"></script>
<?php 
@session_start();
@$session_name = $_SESSION[user_admin];
@$session_id = $_SESSION[id_admin];
?>
</head>
<body id="all">
<div id="layout">
<div id="body">
<div id="header"></div>
<div id="menu">
<?php #top-menu---------------------------------------------------------------------------------------------------------------------------------------
require('widget/menus/index.php');
#content--------------------------------------------------------------------------------------------------------------------------------------------?>
<div id="menu-admin">
<?php 
if(isset($session_name)){
#--------------------------------------------------------------------?>
	Welcome <a href="?page=profile"><?=@$session_name;?></a> - <a class="button" href="ad-proses/proses_logout.php">Keluar</a> 
<? #------------------------------------------------------------------- 
}
?>
</div>
</div>
<div id="content">{BODY}</div>
<? #footer------------------------------------------------------------------------------------------------------------------------------------------?>
<div id="footer"><?=@$_CONFIG['footer'];?></div>
</div>
</div>
</body>
</html>