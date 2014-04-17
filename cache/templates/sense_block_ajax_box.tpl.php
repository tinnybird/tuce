<?php if(!defined('IN_MEIU')) exit('Access Denied'); ?><div class="box_title titbg">
    <div class="closer sprite i_close" onclick="Mui.box.close()"></div>
    <?php echo $title;?>
</div>
<div class="box_container">
<?php echo $content;?>
</div>
<?php if($close_time > 0) { ?>
<script defer="defer">
<?php if($forward=='') { ?>
    setTimeout(function (){
        Mui.box.close()
    },<?php echo $close_time*1000; ?>);
<?php } else { ?>
    setTimeout(function (){
        window.location.href = '<?php echo addslashes($forward); ?>'
    },<?php echo $close_time*1000; ?>);
<?php } ?>
</script>
<?php } ?>