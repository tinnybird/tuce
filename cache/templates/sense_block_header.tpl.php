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
<?php } ?>
<link rel="shortcut icon" href="<?php echo $base_path;?>favicon.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="<?php echo $statics_path;?>img/main.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $style_path;?>images/style.css" />
<script src="<?php echo $statics_path;?>js/jquery.js" type="text/javascript"></script>
<!--[if IE 6]>
<script type="text/javascript" src="<?php echo $statics_path;?>js/DD_belatedPNG.js"></script>
<script type="text/javascript">
	DD_belatedPNG.fix('.sprite,.png');
</script>
<![endif]-->
</head>

<body>
<noscript>
  <div class="js_disabled_noti">
    <div class="inner">
      <?php echo lang("no_script_notice"); ?>
    </div>
  </div>
</noscript>
<?php echo $page_head;?>
<div id="header">
	<div class="wrap">
		<h1><a href="<?php echo site_link("default","index",array()); ?>"><?php if($site_logo) { ?><img src="<?php echo img_path($site_logo);?>" alt="<?php echo $site_name;?>" class="png" /><?php } else { ?><img src="<?php echo $style_path;?>images/logo.png" alt="<?php echo $site_name;?>" class="png" /><?php } ?></a></h1>
		<div id="ustatus_menu">
			<?php echo $user_status;?>
		</div>
		<?php if(isset($update_info) && $update_info) { ?>
		<div id="head_notify">
			<?php if($update_info['return'] == 'new') { ?>
				<?php echo lang("new_update_available","{$update_info['version']}","{$update_info['pubdate']}"); ?> 
				<a href="<?php echo site_link("update","core",array('version'=>$update_info['version'])); ?>"><?php echo lang("update_immediately"); ?></a> <?php echo lang("or"); ?> 
				<a href="<?php echo $update_info['package'];?>"><?php echo lang("update_manually"); ?></a>
			<?php } ?>
		</div>
		<?php } ?>
		<div id="tabs" class="nav">
			<ul id="album_tabs">
				<?php if($nav_menu) { ?>
				<?php $nav_total=count($nav_menu);?>
				<?php if(is_array($nav_menu)) foreach($nav_menu AS $k => $v) { ?>
					<?php if($k+1<=10) { ?>
						<?php if($v['type']==0) { ?>
							<li class="png item<?php if($k==0) { ?> first<?php } ?><?php if($k==$nav_total-1||$k==9) { ?> last<?php } ?><?php if($v['url']==IN_CTL) { ?> current<?php } ?>"><span><a href="<?php echo site_link("$v[url]","index",array()); ?>" title="<?php echo $v['name'];?>"><em><?php echo $v['name'];?></em></a></span></li>
						<?php } else { ?>
							<li class="png item<?php if($k==0) { ?> first<?php } ?><?php if($k==$nav_total-1||$k==9) { ?> last<?php } ?>"><span><a href="<?php echo $v['url'];?>" title="<?php echo $v['name'];?>"><em><?php echo $v['name'];?></em></a></span></li>
						<?php } ?>
					<?php } ?>
				<?php } ?>
				<?php } ?>
				<?php if($loggedin) { ?>
				<li class="manage"><a href="<?php echo site_link("setting","nav",array()); ?>" title="<?php echo lang("setting_nav"); ?>"><span class="i_setting sprite"></span></a></li>
				<?php } ?>
			</ul>
			<ul id="menu_icons" style="display:none;">
				<?php if($loggedin) { ?>
					<li class="trash"><a href="<?php echo site_link("trash","index",array()); ?>" title="<?php echo lang("trash_title"); ?>"><span class="<?php if($trash_status) { ?>i_trash_full<?php } else { ?>i_trash<?php } ?> sprite"><?php echo lang("trash"); ?></span></a></li>
				<?php } ?>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php echo $page_crumb;?>