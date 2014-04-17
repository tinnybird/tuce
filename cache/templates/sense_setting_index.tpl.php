<?php if(!defined('IN_MEIU')) exit('Access Denied'); ?><?php include $this->template("block/header"); ?>
<div id="bodywrap">
    <table class="layout">
        <tr>
            <td class="left">
                <div class="mainbody" id="setting_layout">
					<?php include $this->template("setting/setting_menu"); ?>
                    <div class="innercol">
                            <div class="innerconetent">
                                <form id="setting_basic_form" action="<?php echo site_link("setting","save_basic",array()); ?>" method="post" onsubmit="return false;">
                                    <div class="settingfield">
                                        <div class="label"><?php echo lang("site_title_label"); ?></div>
                                        <div class="descinfo"><?php echo lang("site_title_tips"); ?></div>
                                        <div class="input">
                                            <input type="text" name="site[title]" class="settinginput iptw3" value="<?php echo $site['title'];?>" />
                                        </div>
                                    </div>
                                    <div class="settingfield">
                                        <div class="label"><?php echo lang("site_url_label"); ?></div>
                                        <div class="descinfo"><?php echo lang("site_url_tips"); ?></div>
                                        <div class="input">
                                            <input type="text" name="site[url]" class="settinginput iptw3" value="<?php echo $site['url'];?>" />
                                        </div>
                                    </div>
                                    <div class="settingfield">
                                        <div class="label"><?php echo lang("site_keywords_label"); ?></div>
                                        <div class="descinfo"><?php echo lang("site_keywords_tips"); ?></div>
                                        <div class="input">
                                            <input type="text" name="site[keywords]" class="settinginput iptw3" value="<?php echo $site['keywords'];?>" />
                                        </div>
                                    </div>
                                    <div class="settingfield">
                                        <div class="label"><?php echo lang("site_description_label"); ?></div>
                                        <div class="descinfo"><?php echo lang("site_description_tips"); ?></div>
                                        <div class="input">
                                            <textarea name="site[description]" class="settinginput iptw5 ipth1"><?php echo $site['description'];?></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="settingfield">
                                        <div class="label"><?php echo lang("enable_login_captcha_label"); ?></div>
                                        <div class="descinfo"><?php echo lang("enable_login_captcha_tips"); ?></div>
                                        <div class="input">
                                            <label><input type="checkbox" name="enable_login_captcha" value="1" <?php if($enable_login_captcha) { ?>checked="checked"<?php } ?> /> <?php echo lang("enable"); ?></label>
                                        </div>
                                    </div>
                                    <div class="settingfield">
                                        <div class="label"><?php echo lang("enable_comment_label"); ?></div>
                                        <div class="descinfo"><?php echo lang("enable_comment_tips"); ?></div>
                                        <div class="input">
                                            <label><input type="checkbox" name="enable_comment" value="1" <?php if($enable_comment) { ?>checked="checked"<?php } ?> /> <?php echo lang("enable"); ?></label>
                                        </div>
                                    </div>
                                    <div class="settingfield">
                                        <div class="label"><?php echo lang("enable_comment_captcha_label"); ?></div>
                                        <div class="descinfo"><?php echo lang("enable_comment_captcha_tips"); ?></div>
                                        <div class="input">
                                            <label><input type="checkbox" name="enable_comment_captcha" value="1" <?php if($enable_comment_captcha) { ?>checked="checked"<?php } ?> /> <?php echo lang("enable"); ?></label>
                                        </div>
                                    </div>
                                    
                                    <div class="settingfield">
                                        <div class="label"><?php echo lang("comment_audit_label"); ?></div>
                                        <div class="descinfo"><?php echo lang("comment_audit_tips"); ?></div>
                                        <div class="input">
                                            <select name="comment_audit">
                                                <option value="0" <?php if($comment_audit==0) { ?>selected="selected"<?php } ?>><?php echo lang("comment_audit_auto"); ?></option>
                                                <option value="1" <?php if($comment_audit==1) { ?>selected="selected"<?php } ?>><?php echo lang("comment_audit_manual"); ?></option>
                                            </select>
                                        </div>
                                    </div>
									<div class="settingfield">
                                        <div class="label"><?php echo lang("enable_auto_update"); ?></div>
                                        <div class="descinfo"><?php echo lang("enable_auto_update_tips"); ?></div>
                                        <div class="input">
                                            <label><input type="checkbox" name="enable_auto_update" value="1" <?php if($enable_auto_update) { ?>checked="checked"<?php } ?> /> <?php echo lang("enable"); ?></label>
                                        </div>
                                    </div>
                                    <div class="settingfield">
                                        <div class="label"><?php echo lang("gravatar_url_label"); ?></div>
                                        <div class="descinfo"><?php echo lang("gravatar_url_tips"); ?></div>
                                        <div class="input">
                                            <input type="text" name="gravatar_url" class="settinginput iptw6" value="<?php echo $gravatar_url;?>" />
                                        </div>
                                    </div>
                                    <div class="settingfield">
                                        <div class="label"><?php echo lang("share_title_label"); ?></div>
                                        <div class="descinfo"><?php echo lang("share_title_tips"); ?></div>
                                        <div class="input">
                                            <input type="text" name="site[share_title]" class="settinginput iptw6" value="<?php echo $site['share_title'];?>" />
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
<?php include $this->template("block/footer"); ?>