<?php if(!defined('IN_MEIU')) exit('Access Denied'); ?><?php include $this->template("block/header"); ?>

<div id="bodywrap">
    <table class="layout">
        <tr>
            <td class="left">
                <div class="mainbody" id="setting_layout">
                    <?php include $this->template("setting/setting_menu"); ?>
                    <div class="innercol">
                            <div class="innerconetent">
                                <form id="setting_language_form" action="<?php echo site_link("setting","save_language",array()); ?>" method="post" onsubmit="return false;">
                                    <div class="settingfield">
                                        <div class="label"><?php echo lang("system_language_label"); ?></div>
                                        <div class="descinfo"><?php echo lang("system_language_tips"); ?></div>
                                        <div class="input">
                                            <select name="system[language]">
                                            <?php if(is_array($lang_list)) foreach($lang_list AS $v) { ?>
                                            <option value="<?php echo $v['name'];?>" <?php if($v['name']==$current_lang) { ?>selected="selected"<?php } ?>><?php echo $v['lang_name'];?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="settingfield">
                                        <div class="label"><?php echo lang("system_timeoffset_label"); ?></div>
                                        <div class="descinfo"><?php echo lang("system_timeoffset_tips"); ?></div>
                                        <div class="input">
                                            <select name="system[timezone]">
                                            <?php if(is_array($time_zones)) foreach($time_zones AS $k => $v) { ?>
                                            <option value="<?php echo $v;?>" <?php if($v==$current_timezone) { ?>selected="selected"<?php } ?>> <?php echo $k;?> <?php if($v>0) { ?>+<?php } ?><?php echo $v;?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="ctl_button">
                                        <input type="submit" name="submit" class="ylbtn" value="<?php echo lang("save_setting"); ?>" onclick="Mui.form.sendPop('setting_language_form')" />
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