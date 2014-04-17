<?php if(!defined('IN_MEIU')) exit('Access Denied'); ?><!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]> <html class="ie7"> <![endif]-->
<!--[if IE 8 ]> <html class="ie8"> <![endif]-->
<!--[if IE 9 ]> <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html> <!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php if(isset($meu_head)) { ?>
<?php echo $meu_head;?>
<?php } else { ?>
<title><?php echo lang("system_notice"); ?></title>
<?php } ?>
<link rel="shortcut icon" href="<?php echo $base_path;?>favicon.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="<?php echo $statics_path;?>img/main.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $style_path;?>images/style.css" />
<!--[if IE]><link rel="stylesheet" type="text/css" href="<?php echo $style_path;?>images/ie.css" /><![endif]-->
<!--[if IE 6]>
<script type="text/javascript" src="<?php echo $statics_path;?>js/DD_belatedPNG.js"></script>
<script type="text/javascript">
	DD_belatedPNG.fix('.sprite,.png');
</script>
<![endif]-->
<script src="<?php echo $statics_path;?>js/jquery.js" type="text/javascript"></script>
<script src="<?php echo $statics_path;?>js/common.js" type="text/javascript"></script>
<?php if(isset($loggedin) && $loggedin) { ?>
<script src="<?php echo $statics_path;?>js/admin.js" type="text/javascript"></script>
<?php } ?>
</head>

<body>