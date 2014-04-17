<?php if(!defined('IN_MEIU')) exit('Access Denied'); ?><?php include $this->template("block/header"); ?>

<div id="bodywrap">
    <table class="layout">
        <tr>
            <td class="left">
                <div class="mainbody" id="setting_layout">
                    <?php include $this->template("setting/setting_menu"); ?>
                    <div class="innercol">
                            <div class="innerconetent">
                                <div class="sysinfo">
                                 <div class="btns"><?php echo lang("cache_size"); ?> <span id="cache_size">?</span> &nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onclick="get_cache_size()"><?php echo lang("get_cache_size"); ?></a> <input class="ml10 ylbtn" type="button" onclick="Mui.box.show('<?php echo site_link("setting","clear_cache",array()); ?>')" value="<?php echo lang("clear_all_cache"); ?>" /> <input class="ml10 ylbtn" type="button" onclick="Mui.box.show('<?php echo site_link("setting","check_update",array()); ?>',true)" value="<?php echo lang("check_update"); ?>" /></div>
                                 
                                 <form id="recounter" action="<?php echo site_link("setting","counter",array()); ?>" method="post" onsubmit="return false;">
                                     <div class="section"><?php echo lang("recounter"); ?></div>
                                     <table class="info">
                                         <tr>
                                             <td>
                                                <label><input type="checkbox" value="1" name="counter[comments]" /> <?php echo lang("comment_recounter"); ?> </label>
                                                <label><input type="checkbox" value="1" name="counter[photos]" /> <?php echo lang("photo_recounter"); ?></label>
                                                <label><input type="checkbox" value="1" name="counter[tags]" /> <?php echo lang("tag_recounter"); ?></label>
                                             </td>
                                         </tr>
                                         <tr>
                                              <td>
                                                <input type="submit" class="ylbtn" onclick="Mui.form.sendPop('recounter')" value="<?php echo lang("confirm"); ?>" />
                                              </td>
                                         </tr>
                                     </table>
                                 </form>

                                 <div class="section"><?php echo lang("thank_list"); ?></div>
                                 <table class="info">
                                     <tr>
                                        <td>
                                            <h4>感谢以下用户的支持:</h4> 
                                            <br>EFUN XIANG、吴海啸、刘杨兵、李凯旋、兄弟工作室、颜秉谦、陈子彬、蔡明珠、郭小林、余康正、Worldfar、肖旺煦、李鹏<br>
                                            <br>
                                            <?php echo lang("donatenow"); ?>
                                        </td>
                                     </tr>
                                 </table>

                                 <div class="section"><?php echo lang("system_info"); ?></div>
                                 <table class="info">
                                     <?php if(is_array($info)) foreach($info AS $v) { ?>
                                     <tr>
                                         <th><?php echo $v['title'];?></th><td><?php echo $v['value'];?> </td>
                                     </tr>
                                     <?php } ?>
                                 </table> 
                                 <div class="moreinfo"><?php echo lang("more_system_info"); ?> <a href="<?php echo site_link("setting","phpinfo",array()); ?>" target="_blank">phpinfo()</a></div>
                                </div>
                            </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>
<script>
function get_cache_size(){
	$('#cache_size').text('...');
	$.post('<?php echo site_link("setting","get_cache_size",array()); ?>',{},function(data){
		$('#cache_size').text(data);
	});
}
</script>
<?php include $this->template("block/footer"); ?>