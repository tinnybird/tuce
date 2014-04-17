<?php if(!defined('IN_MEIU')) exit('Access Denied'); ?><ul class="tab pset f_left">
	<?php if(is_array($pageset_menu)) foreach($pageset_menu AS $v) { ?>
		<li <?php if($pageset_menu_current==$v) { ?>class="current"<?php } ?>><a href="javascript:void(0);" onclick="page_setting('<?php echo $pageset_menu_type;?>',<?php echo $v;?>);"><span><?php echo $v;?></span></a></li>
	<?php } ?>
</ul>
