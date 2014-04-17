<?php if(!defined('IN_MEIU')) exit('Access Denied'); ?><ul class="tab f_left listorder">
	<?php if(is_array($sort_menu)) foreach($sort_menu AS $v) { ?>
	<li <?php if($v['is_current']) { ?>class="current"<?php } ?>><a href="javascript:void(0);" onclick="sort_setting('<?php echo $sort_menu_type;?>','<?php echo $v['field'];?>_<?php echo $v['t_sort'];?>');" class="list_<?php echo $v['c_sort'];?><?php if($v['is_current']) { ?>_on<?php } ?>"><span><?php echo $v['name'];?></span></a></li>
	<?php } ?>
</ul>