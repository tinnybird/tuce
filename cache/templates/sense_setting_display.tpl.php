<?php if(!defined('IN_MEIU')) exit('Access Denied'); ?><?php include $this->template("block/header"); ?>
<script src="<?php echo $statics_path;?>js/ajaxfileupload.js" type="text/javascript"></script>
<div id="bodywrap">
    <table class="layout">
        <tr>
            <td class="left">
                <div class="mainbody" id="setting_layout">
					<?php include $this->template("setting/setting_menu"); ?>
                    <div class="innercol">
                            <div class="innerconetent">
                                <form id="setting_basic_form" action="<?php echo site_link("setting","save_display",array()); ?>" method="post" onsubmit="return false;">
                                    <div class="settingfield">
                                        <div class="label"><?php echo lang("site_logo_label"); ?></div>
                                        <div class="descinfo"><?php echo lang("site_logo_tips"); ?></div>
                                        <div class="input">
                                            <input type="text" id="logo_img" name="site[logo]" class="settinginput iptw3" value="<?php if(isset($site['logo'])) { ?><?php echo $site['logo'];?><?php } ?>" />
                                            <a href="javascript:void(0)" onclick="upload_logo()"><?php echo lang("upload"); ?></a>
                                        </div>
                                    </div>
                                    <div class="settingfield">
                                        <div class="label"><?php echo lang("site_footer_label"); ?></div>
                                        <div class="descinfo"><?php echo lang("site_footer_tips"); ?></div>
                                        <div class="input">
                                            <textarea name="site[footer]" class="settinginput iptw5 ipth1"><?php echo $site['footer'];?></textarea>
                                        </div>
                                    </div>
                                    <div class="settingfield">
                                        <div class="label"><?php echo lang("show_process_info_label"); ?></div>
                                        <div class="descinfo"><?php echo lang("show_process_info_tips"); ?></div>
                                        <div class="input">
                                            <label><input type="checkbox" name="show_process_info" value="1" <?php if($show_process_info) { ?>checked="checked"<?php } ?> /> <?php echo lang("enable"); ?></label>
                                        </div>
                                    </div>

                                    <div class="settingfield">
                                        <div class="label"><?php echo lang("album_sort_default_label"); ?></div>
                                        <div class="input">
                                            <select name="display[album_sort_default]">
												<?php if(is_array($album_sort_list)) foreach($album_sort_list AS $key => $value) { ?>
												<option value="<?php echo $value;?>_desc" <?php if($album_sort_default==$value."_desc") { ?>selected="selected"<?php } ?>><?php echo $key;?>-<?php echo lang("desc"); ?></option>
												<option value="<?php echo $value;?>_asc" <?php if($album_sort_default==$value."_asc") { ?>selected="selected"<?php } ?>><?php echo $key;?>-<?php echo lang("asc"); ?></option>
												<?php } ?>
											</select>
                                        </div>
                                    </div>
									<div class="settingfield">
                                        <div class="label"><?php echo lang("album_pageset_label"); ?></div>
                                        <div class="input">
                                            <select name="display[album_pageset]">
												<option value="12" <?php if($album_pageset==12) { ?>selected="selected"<?php } ?>>12</option>
												<option value="30" <?php if($album_pageset==30) { ?>selected="selected"<?php } ?>>30</option>
												<option value="56" <?php if($album_pageset==56) { ?>selected="selected"<?php } ?>>56</option>
											</select>
                                        </div>
                                    </div>
									<div class="settingfield">
                                        <div class="label"><?php echo lang("photo_sort_default_label"); ?></div>
                                        <div class="input">
                                            <select name="display[photo_sort_default]">
												<?php if(is_array($photo_sort_list)) foreach($photo_sort_list AS $key => $value) { ?>
												<option value="<?php echo $value;?>_desc" <?php if($photo_sort_default==$value."_desc") { ?>selected="selected"<?php } ?>><?php echo $key;?>-<?php echo lang("desc"); ?></option>
												<option value="<?php echo $value;?>_asc" <?php if($photo_sort_default==$value."_asc") { ?>selected="selected"<?php } ?>><?php echo $key;?>-<?php echo lang("asc"); ?></option>
												<?php } ?>
											</select>
                                        </div>
                                    </div>
                                    <div class="settingfield">
                                        <div class="label"><?php echo lang("photo_pageset_label"); ?></div>
                                        <div class="input">
                                            <select name="display[photo_pageset]">
												<option value="12" <?php if($photo_pageset==12) { ?>selected="selected"<?php } ?>>12</option>
												<option value="30" <?php if($photo_pageset==30) { ?>selected="selected"<?php } ?>>30</option>
												<option value="56" <?php if($photo_pageset==56) { ?>selected="selected"<?php } ?>>56</option>
											</select>
                                        </div>
                                    </div>
                                    
                                    <div class="ctl_button">
                                        <input type="submit" name="submit" class="ylbtn" value="<?php echo lang("save_setting"); ?>" onclick="Mui.form.sendPop('setting_basic_form')" />
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>
<script>
function upload_logo(){
    var newuploadwin = '<div class="box_title titbg"><div onclick="Mui.box.close()" class="closer sprite i_close"></div><?php echo lang("upload"); ?></div><div class="box_container"><input id="fileToUpload" type="file" size="25" name="fileToUpload"> <button class="ylbtn1" id="buttonUpload" onclick="return ajaxFileUpload();"><?php echo lang("upload"); ?></button> <input class="ylbtn1" type="button" value="<?php echo lang("cancel"); ?>" onclick="Mui.box.close();" /></div>';
    Mui.box.setData(newuploadwin,true);
}

function ajaxFileUpload(){
    $.ajaxFileUpload
    (
        {
            url:'<?php echo site_link("setting","fileupload",array()); ?>',
            secureuri:false,
            fileElementId:'fileToUpload',
            dataType: 'json',
            data:{upaction:'logo'},
            success: function (data, status)
            {
                if(typeof(data.error) != 'undefined'){
                    if(data.error != ''){
                        alert(data.error);
                    }else{
                        $('#logo_img').val(data.msg);
                        Mui.box.close();
                    }
                }
            },
            error: function (data, status, e){
                alert(e);
            }
        }
    )
    
    return false;
    
}
</script>
<?php include $this->template("block/footer"); ?>