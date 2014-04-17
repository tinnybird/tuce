<?php if(!defined('IN_MEIU')) exit('Access Denied'); ?><div id="crumb" class="wrap">
	<div class="co png">
    <?php $total_crumb=count($crumb_nav)?>
    <?php if(is_array($crumb_nav)) foreach($crumb_nav AS $k => $v) { ?>
        <?php if($k+1==$total_crumb) { ?>
        <span><?php echo $v['name'];?></span>
        <?php } else { ?>
        <a href="<?php echo $v['link'];?>" class="b"><?php echo $v['name'];?></a> <em>&gt;</em>
        <?php } ?>
    <?php } ?>
	</div>
</div>