<?php if(!defined('IN_MEIU')) exit('Access Denied'); ?><?php include $this->template("block/header"); ?>

<div id="bodywrap">
    <table class="layout">
        <tr>
            <td class="left">
                <div class="mainbody" id="setting_layout">
                    <?php include $this->template("setting/setting_menu"); ?>
                    <div class="innercol">
                            <div class="innerconetent">
                                <form id="setting_upload_form" action="<?php echo site_link("setting","save_upload",array()); ?>" method="post" onsubmit="return false;">
                                    
                                    <div class="settingfield">
                                        <div class="label"><?php echo lang("old_imgname_label"); ?></div>
                                        <div class="descinfo"><?php echo lang("old_imgname_tips"); ?></div>
                                        <div class="input">
                                            <label><input type="checkbox" id="use_old_imgname" name="use_old_imgname" value="1" <?php if($upload['use_old_imgname']) { ?>checked="checked"<?php } ?> /> <?php echo lang("enable"); ?></label>
                                        </div>
                                    </div>
                                    <div class="settingfield">
                                        <div class="label"><?php echo lang("upload_allow_size_label"); ?></div>
                                        <div class="descinfo"><?php echo lang("upload_allow_size_tips"); ?></div>
                                        <div class="input">
                                             <select name="upload[allow_size]">
                                                 <option value="512K" <?php if($upload['allow_size']=='512K') { ?>selected="selected"<?php } ?>>512K</option>
                                                 <option value="1M" <?php if($upload['allow_size']=='1M') { ?>selected="selected"<?php } ?>>1M</option>
                                                 <option value="2M" <?php if($upload['allow_size']=='2M') { ?>selected="selected"<?php } ?>>2M</option>
                                                 <option value="5M" <?php if($upload['allow_size']=='5M') { ?>selected="selected"<?php } ?>>5M</option>
                                                 <option value="0"  <?php if($upload['allow_size']=='0') { ?>selected="selected"<?php } ?>><?php echo lang("no_limit"); ?></option>
                                             </select>
                                        </div>
                                    </div>
									<div class="settingfield">
                                        <div class="label"><?php echo lang("upload_resize_quality_label"); ?></div>
                                        <div class="descinfo"><?php echo lang("upload_resize_quality_tips"); ?></div>
                                        <div class="input">
                                            <input type="text" name="upload[resize_quality]" class="settinginput iptw0" value="<?php echo $upload['resize_quality'];?>" />
                                        </div>
                                    </div>
									<div class="settingfield">
                                        <div class="label"><?php echo lang("enable_pre_resize_label"); ?></div>
                                        <div class="descinfo"><?php echo lang("enable_pre_resize_tips"); ?></div>
                                        <div class="input">
                                            <label><input type="checkbox" id="enable_pre_resize" name="enable_pre_resize" value="1" onclick="switch_div(this,'pre_resize')" <?php if($upload['enable_pre_resize']) { ?>checked="checked"<?php } ?> /> <?php echo lang("enable"); ?></label>
                                        </div>
                                    </div>
                                    <div id="pre_resize">
                                    <div class="settingfield">
                                        <div class="label"><?php echo lang("upload_pre_resize_label"); ?></div>
                                        <div class="descinfo"><?php echo lang("upload_pre_resize_tips"); ?></div>
                                        <div class="input">
                                            <input type="text" name="upload[resize_width]" class="settinginput iptw0" value="<?php echo $upload['resize_width'];?>" />  ×  <input type="text" name="upload[resize_height]" class="settinginput iptw0" value="<?php echo $upload['resize_height'];?>" />
                                        </div>
                                    </div>
                                    </div>
                                    <script>
                                        if($('#enable_pre_resize').get(0).checked){
                                            $("#pre_resize").show();
                                        }else{
                                            $("#pre_resize").hide();
                                        }

										function switch_extra(o,d){
											if(o.checked){
												$("#"+d).hide();
											}else{
												$("#"+d).show();
											}
										}
                                    </script>
                                    <div class="settingfield">
                                        <div class="label"><?php echo lang("enable_cut_big_pic_label"); ?></div>
                                        <div class="descinfo"><?php echo lang("enable_cut_big_pic_tips"); ?></div>
                                        <div class="input">
                                            <label><input type="checkbox" id="enable_cut_big_pic" name="enable_cut_big_pic" value="1" onclick="switch_div(this,'cut_big_pic')" <?php if($upload['enable_cut_big_pic']) { ?>checked="checked"<?php } ?> /> <?php echo lang("enable"); ?></label>
                                        </div>
                                    </div>
									<div id="cut_big_pic">
									<div class="settingfield">
                                        <div class="label"><?php echo lang("max_picture_size_label"); ?></div>
                                        <div class="descinfo"><?php echo lang("max_picture_size_tips"); ?></div>
                                        <div class="input">
                                             <input type="text" name="upload[max_width]" class="settinginput iptw0" value="<?php echo $upload['max_width'];?>" /> ×  <input type="text" name="upload[max_height]" class="settinginput iptw0" value="<?php echo $upload['max_height'];?>" /> 
                                        </div>
                                    </div>
									</div>
									<script>
                                        if($('#enable_cut_big_pic').get(0).checked){
                                            $("#cut_big_pic").show();
                                        }else{
                                            $("#cut_big_pic").hide();
                                        }
                                    </script>
									
                                    <div class="settingfield">
                                        <div class="label"><?php echo lang("thumb_size_label"); ?></div>
                                        <div class="descinfo"><?php echo lang("thumb_size_tips"); ?></div>
                                        <div class="input">
                                             <input type="text" name="upload[thumb_width]" class="settinginput iptw0" value="<?php echo $upload['thumb_width'];?>" /> <span id="thumb_size_extra">×  <input type="text" name="upload[thumb_height]" class="settinginput iptw0" value="<?php echo $upload['thumb_height'];?>" /></span> <label><input type="checkbox" id="enable_thumb_cut" name="enable_thumb_cut" value="1" <?php if($upload['enable_thumb_cut']) { ?>checked="checked"<?php } ?> /> <?php echo lang("cut_thumb"); ?></label>
                                        </div>
                                    </div>
									
                                    <div class="ctl_button">
                                        <input type="submit" name="submit" class="ylbtn" value="<?php echo lang("save_setting"); ?>" onclick="Mui.form.sendPop('setting_upload_form')" />
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>

<?php include $this->template("block/footer"); ?>