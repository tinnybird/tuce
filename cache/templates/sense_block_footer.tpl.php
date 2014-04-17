<?php if(!defined('IN_MEIU')) exit('Access Denied'); ?><div class="footer wrap"><?php echo $footer;?>
    <?php if($show_process_info) { ?>
    &nbsp;&nbsp;
    Processed in <?php echo timer_read('page');; ?>ms
    <?php } ?>
</div>
<?php if(isset($page_foot)) { ?><?php echo $page_foot;?><?php } ?>
<script type="text/javascript">
$.Placeholder.init();
</script>
</body>
</html>