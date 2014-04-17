<?php if(!defined('IN_MEIU')) exit('Access Denied'); ?><?php if(!$loggedin) { ?>
<a href="<?php echo site_link("users","login",array()); ?>" title="<?php echo lang("login_title"); ?>" onclick="Mui.box.show(this.href,true);return false;"><?php echo lang("login"); ?></a>
<?php } else { ?>
<a title="<?php echo lang("profile_title"); ?>" href="<?php echo site_link("users","profile",array()); ?>"><?php echo $u_info['user_nicename'];?></a>
<span class="pipe">|</span>
<a title="<?php echo lang("upload_photo"); ?>" href="<?php echo site_link("upload","index",array()); ?>"><?php echo lang("upload_photo"); ?></a>
<span class="pipe">|</span>
<a title="<?php echo lang("sys_setting_title"); ?>" href="<?php echo site_link("setting","index",array()); ?>"><?php echo lang("sys_setting"); ?></a>
<span class="pipe">|</span>
<a href="<?php echo site_link("trash","index",array()); ?>" title="<?php echo lang("trash_title"); ?>"><?php echo lang("trash"); ?></a>
<span class="pipe">|</span>
<a title="<?php echo lang("logout_title"); ?>" href="<?php echo site_link("users","logout",array()); ?>" onclick="Mui.box.show(this.href);return false;"><?php echo lang("logout"); ?></a>
<?php } ?>
