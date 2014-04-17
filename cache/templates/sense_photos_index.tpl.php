<?php if(!defined('IN_MEIU')) exit('Access Denied'); ?><?php include $this->template("block/header"); ?>
<div id="bodywrap">
    <?php if($_config['showlistbtns'] || $_config['showphotosearch']) { ?>
    <div class="filter">
        <?php if($_config['showphotosearch']) { ?>
		<form id="photo_search" action="<?php echo site_link("photos","search",array()); ?>" method="post">
        <div class="search f_right ml10">
             <input type="hidden" name="album_id" value="<?php echo $album_info['id'];?>" />            
             <input type="text" name="sname" value="<?php echo $search['name'];?>" placeholder="<?php echo lang("search_photos"); ?>" />
             <button type="submit" name="submit"></button>
        </div>
		<div class="f_right mt5">
             <label><input type="checkbox" name="searchtype" value="album" checked="checked" /> <?php echo lang("current_album"); ?></label>
        </div>
		</form>
        <?php } ?>
        <?php if($_config['showlistbtns']) { ?>
        <div class="display_setting f_left">
            <?php echo $photo_col_menu;?>
			<ul class="tab show_type f_left">
				<li class="current tile"><a href="javascript:void(0);" title="<?php echo lang("flat_mode"); ?>"><span class="png">&nbsp;</span></a></li>
				<li class="slideshow"><a href="<?php echo site_link("photos","slide",array('aid'=>$album_info['id'])); ?>" title="<?php echo lang("slide_mode"); ?>"><span class="png">&nbsp;</span></a></li>
			</ul>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
    <?php if($loggedin && $photos) { ?>
    <div class="admin_bar">
        <div class="f_left">
            <label><input type="checkbox" value="1" onclick="Madmin.check_all('.selitem',this.checked)" /><?php echo lang("sel_all"); ?></label> <span class="i_trash_sp sprite"></span> <a href="javascript:void(0)" onclick="Madmin.checked_action('.selitem','<?php echo site_link("photos","confirm_delete_batch",array()); ?>');"><?php echo lang("delete_selected"); ?></a> <span class="i_move_sp sprite"></span> <a href="javascript:void(0)" onclick="Madmin.checked_action('.selitem','<?php echo site_link("photos","move_batch",array()); ?>');"><?php echo lang("move_selected"); ?></a>
            <?php echo $photo_multi_opt;?>
        </div>
        <div class="f_right">
            <div class="bigbutton"><a href="<?php echo site_link("upload","multi",array('aid'=>$album_info['id'])); ?>"><span><?php echo lang("upload_new_photo"); ?></span></a></div>
        </div>
    </div>
    <?php } ?>
    <div class="album_desc">
    <?php if($loggedin) { ?>
        <div class="inline_edit" title="<?php echo lang("click_editable"); ?>" onclick="Madmin.inline_edit(this,'<?php echo site_link("albums","modify_desc_inline",array('id'=>$album_info['id'])); ?>')"><?php if($album_info['desc']) { ?><?php echo $album_info['desc'];?><?php } else { ?><?php echo lang("no_album_desc"); ?><?php } ?>
            <span class="i_editinfo sprite"></span>
        </div>
    <?php } else { ?>
        <?php if($album_info['desc']) { ?>
        <div class="inline">
            <?php echo mycutstr(strip_tags($album_info['desc']),250,'... <a href="javascript:void(0)" onclick="$(\'.album_desc .inline_full\').show();$(\'.album_desc .inline\').hide();" class="blue">'.lang('show_all').'</a>'); ?>
        </div>
        <div class="inline_full" style="display:none;">
            <?php echo $album_info['desc'];?>
        </div>
        <?php } ?>
    <?php } ?>
    </div>
    <?php echo $photo_sidebar;?>
    <table class="layout">
        <tr>
            <td class="left">
                <div class="mainbody">
                    <?php if($photos) { ?>
                    <div class="innercol grid">
                        <div class="gallary_wrap">
                            <?php if(is_array($photos)) foreach($photos AS $k => $v) { ?>
                            <div class="gallary_item">
                                <div class="item">
                                    <div class="pic_box">
                                        <table>
                                            <tr>
                                                <td>
                                                    <?php echo $v['img_thumb'];?>
                                                </td>
                                            </tr>
                                        </table>
                                        
                                    </div>
                                    <?php if($loggedin) { ?>
                                    <div class="pic_ctl">
                                        <ul class="btns">
                                            <li><a href="javascript:void(0)" onclick="Mui.box.show('<?php echo site_link("photos","confirm_delete",array('id'=>$v['id'])); ?>',true);" title="<?php echo lang("move_to_trash"); ?>"><span class="i_littletrash sprite"></span></a></li>
                                            <li><a href="javascript:void(0)" onclick="Mui.box.show('<?php echo site_link("photos","modify",array('id'=>$v['id'])); ?>',true);" title="<?php echo lang("modify"); ?>"><span class="i_edit sprite"></span></a></li>
                                            <li><a href="javascript:void(0)" onclick="Mui.box.show('<?php echo site_link("albums","update_cover",array('pic_id'=>$v['id'])); ?>');" title="<?php echo lang("set_cover"); ?>"><span class="i_cover sprite"></span></a></li>
                                            <li><a href="javascript:void(0)" onclick="Mui.box.show('<?php echo site_link("photos","rotate",array('id'=>$v['id'])); ?>',true);" title="<?php echo lang("rotate_image"); ?>"><span class="i_rotate sprite"></span></a></li>
                                            <li><a href="javascript:void(0)" onclick="Mui.box.show('<?php echo site_link("photos","move",array('id'=>$v['id'])); ?>',true);" title="<?php echo lang("move_photo"); ?>"><span class="i_moveto sprite"></span></a></li>
                                            <li><a href="javascript:void(0)" onclick="Mui.box.show('<?php echo site_link("photos","reupload",array('id'=>$v['id'])); ?>',true);" title="<?php echo lang("reupload_photo"); ?>"><span class="i_reupload sprite"></span></a></li>
                                            <?php echo $v['photo_control_icons'];?>
                                        </ul>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="info">
                                    <div class="title">
                                    <?php if($loggedin) { ?><input class="selitem" type="checkbox" name="sel_id[<?php echo $v['id'];?>]" value="1" /><span class="name"><a nid="<?php echo $v['id'];?>" title="<?php echo lang("click_to_rename"); ?>" href="javascript:void(0)" onclick="Madmin.rename(this,'<?php echo site_link("photos","rename",array('id'=>$v['id'])); ?>')"><?php echo $v['name'];?></a></span>
                                    <?php } else { ?>
                                    <span class="name"><a href="<?php echo site_link("photos","view",array('id'=>$v['id'])); ?>"><?php echo $v['name'];?></a></span>
                                    <?php } ?>
                                    </div>
                                    <div class="info_col">
                                        <p class="gray"><?php echo lang("view_nums","{$v['hits']}"); ?> ,
                                        <?php if($show_takentime && $v['taken_time']) { ?>
                                        <?php echo lang("in_taken_time"); ?><?php echo date('Y-m-d',$v['taken_time']); ?>
                                        <?php } else { ?>
                                        <?php echo lang("in_upload_time"); ?><?php echo date('Y-m-d',$v['create_time']); ?>
                                        <?php } ?></p>
                                        <p><?php if($v['comments_num'] && $enable_comment) { ?><a href="<?php echo site_link("photos","view",array('id'=>$v['id'])); ?>#comments"><?php echo lang("comments_num","{$v['comments_num']}"); ?></a><?php } ?> <?php if($v['is_cover']) { ?><span class="cover"><?php echo lang("cover"); ?></span><?php } ?>&nbsp;</p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="clear"></div>
                        </div>
                        <div class="paginator">
                            <?php echo $pagestr;?>
                        </div>
                        
                    <?php if($enable_comment) { ?>
                    <div class="comment_wrap">
                        <div class="bd-b">
                            <h2 class="hd bd-a">
                                <?php if($loggedin) { ?>
                                <span class="f_right" style="margin-top:7px;">
                                    <?php echo lang("loginwith","<span class=\"gray\">{$u_info['user_nicename']}</span>"); ?><a href="<?php echo site_link("users","logout",array()); ?>"  onclick="Mui.box.show(this.href);return false;"><?php echo lang("logout"); ?></a> 
                                </span>
                                <?php } ?>
                                <strong><?php echo lang("all_album_comments"); ?></strong>
                                <span><?php echo lang("t_comments_num","{$album_info['comments_num']}"); ?></span>
                            </h2>
                        </div>
                        <div class="innetcol">
                            <div class="comment_form bd-b">
                                <form id="album_comment_form" action="<?php echo site_link("comments","post",array()); ?>" method="post" onsubmit="return false;" class="bd-a">
                                    <input type="hidden" name="ref_id" value="<?php echo $ref_id;?>" />
                                    <input type="hidden" name="type" value="<?php echo $comments_type;?>" />
                                    <?php if($loggedin) { ?>
                                    <input type="hidden" name="email" value="<?php if(isset($u_extrainfo['email'])) { ?><?php echo $u_extrainfo['email'];?><?php } ?>" />
                                    <input type="hidden" name="author" value="<?php echo $u_info['user_nicename'];?>" />
                                    <?php } else { ?>
                                    <div class="field">
                                        <div class="label"><?php echo lang("email"); ?></div>
                                        <div class="ipts"><input type="text" class="inputstyle iptw2" name="email" /></div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="field">
                                        <div class="label"><?php echo lang("comment_user"); ?> *</div>
                                        <div class="ipts"><input type="text" class="inputstyle iptw2" name="author" /></div>
                                        <div class="clear"></div>
                                    </div>
									<?php if($enable_comment_captcha) { ?>
                                    <div class="field">
                                        <div class="label"><?php echo lang("captcha_code"); ?> *</div>
                                        <div class="ipts"><input type="text" class="inputstyle iptw1" name="captcha" /> <img src="<?php echo site_link("captcha","index",array()); ?>" align="absmiddle" class="captcha" title="<?php echo lang("click_to_reload"); ?>" onclick="reload_captcha(this)" /></div>
                                        <div class="clear"></div>
                                    </div>
                                    <?php } ?>
                                    <?php } ?>
                                    <div class="field">
                                        <div class="label"><?php echo lang("comment_content"); ?> *</div>
                                        <div class="ipts"><textarea class="inputstyle ipttextarea" name="content"></textarea></div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="field">
                                        <div class="label"> &nbsp;</div>
                                        <div class="ipts"><input type="submit" name="submit" class="ylbtn f_left" value="<?php echo lang("post_comments"); ?>" onclick="Mui.box.callback=function(){ reload_comments('<?php echo site_link("comments","more",array('ref_id'=>$ref_id,'type'=>$comments_type)); ?>');$('#album_comment_form').get(0).reset(); };Mui.form.sendAuto('album_comment_form');" /></div>
                                        <div class="clear"></div>
                                    </div>
                                </form>
                            </div>
                            <div class="comment_list">
                                <?php include $this->template("comments/more"); ?>
                            </div>
                            <div class="clear"></div>
                        </div>
                    <?php } ?>
                    </div>
                    <?php } else { ?>
                        <div class="no_data_info">
                            <?php if($is_search) { ?>
                            <div class="pic no_photo_search png"></div>
                            <div class="data_msg">
                                <div><?php echo lang("no_photo_search_notice"); ?></div >
                                <div class="button"><a href="<?php echo site_link("photos","index",array('aid'=>$album_info['id'])); ?>"><?php echo lang("all_photo_this_album"); ?></a></div>
                            </div>
                            <div class="clear"></div>
                            <?php } else { ?>
                            <div class="pic no_picture png"></div>
                            <div class="data_msg">
                                
                                <?php if($loggedin) { ?>
                                <div><?php echo lang("no_photo_notice"); ?></div >
                                <div class="button"><div class="bigbutton"><a href="<?php echo site_link("upload","multi",array('aid'=>$album_info['id'])); ?>"><span><?php echo lang("upload_new_photo"); ?></span></a></div></div>
                                <?php } else { ?>
                                <div><?php echo lang("no_photo_notice_notlogin"); ?></div >
                                <div class="button"><a href="<?php echo site_link("albums","index",array()); ?>"><?php echo lang("view_all_album"); ?></a></div>
                                <?php } ?>
                            </div>
                            <?php } ?>
                            
                            <div class="clear"></div>
                        </div>
                    <?php } ?>
                </div>
            </td>
        </tr>
    </table>
</div>
<?php include $this->template("block/footer"); ?>