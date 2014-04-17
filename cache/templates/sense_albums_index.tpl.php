<?php if(!defined('IN_MEIU')) exit('Access Denied'); ?><?php include $this->template("block/header"); ?>
<div id="bodywrap">
    <?php if($_config['showlistbtns'] || $_config['showalbumsearch']) { ?>
	<div class="filter">
        <?php if($_config['showalbumsearch']) { ?>
		<div class="search f_right ml10">
			<form id="album_search" action="<?php echo site_link("albums","index",array()); ?>" method="post">
			    <input type="text" name="sname" value="<?php echo $search['name'];?>" placeholder="<?php echo lang("search_albums"); ?>" />
			    <button type="submit" name="submit"></button>
			</form>
		</div>
        <?php } ?>
        <?php if($_config['showlistbtns']) { ?>
		<div class="f_right">
			<select id="par_id" name="par_id" onchange="window.location.href=this.value">
                <option value="<?php echo site_link("albums","index",array('cate'=>'0')); ?>"><?php echo lang("no_cate_album"); ?></option>
				<?php if(is_array($categorylist)) foreach($categorylist AS $row) { ?>
					<option value="<?php echo site_link("albums","index",array('cate'=>$row['id'])); ?>" <?php if($row['id']==$search['cate_id']) { ?>selected="selected"<?php } ?>><?php echo str_repeat('--',$row['deep']); ?><?php echo $row['name'];?></option>
				<?php } ?>
            </select>
		</div>
		<div class="display_setting f_left">
			<?php echo $album_col_menu;?>
		</div>
        <?php } ?>
	</div>
    <?php } ?>

    <?php if($loggedin && $albums) { ?>
    <div class="admin_bar">
        <div class="f_left">
            <label><input type="checkbox" value="1" onclick="Madmin.check_all('.selitem',this.checked)" /><?php echo lang("sel_all"); ?></label> <span class="i_trash_sp sprite"></span><a href="javascript:void(0)" onclick="Madmin.checked_action('.selitem','<?php echo site_link("albums","confirm_delete_batch",array()); ?>');"><?php echo lang("delete_selected"); ?></a>
            <?php echo $album_multi_opt;?>
        </div>
        <div class="f_right">
            <div class="bigbutton"><a href="javascript:void(0)" onclick="<?php if($search['cate_id']!='') { ?>Mui.box.show('<?php echo site_link("albums","create",array('cate'=>$search['cate_id'])); ?>',true);<?php } else { ?>Mui.box.show('<?php echo site_link("albums","create",array()); ?>',true);<?php } ?>"><span><?php echo lang("create_new_album"); ?></span></a></div>
        </div>
        <div class="clear"></div>
    </div>
    <?php } ?>
    <?php echo $album_sidebar;?>
    <table class="layout">
        <tr>
            <td class="left">
                <div class="mainbody">
                    <?php if($albums) { ?>
                    <div class="innercol grid">
                        <div class="gallary_wrap">
                            <?php if(is_array($albums)) foreach($albums AS $k => $v) { ?>
                            <div class="gallary_item album">
                                <div class="item">
                                    <div class="pic_box">
                                        
                                        <table>
                                            <tr>
                                                <td>
                                                    <?php if(!$loggedin && $v['priv_type']!=0) { ?>
                                        <a href="<?php echo site_link("photos","index",array('aid'=>$v['id'])); ?>" onclick="Mui.box.show('<?php echo site_link("photos","auth_priv",array('aid'=>$v['id'])); ?>',true);return false;">
                                        <img src="<?php echo $base_path;?>statics/img/lock.gif" />
                                        </a>
                                        <?php } else { ?>
                                        <a href="<?php echo site_link("photos","index",array('aid'=>$v['id'])); ?>"><?php if($v['cover_id']) { ?><img alt="<?php echo $v['name'];?>" src="<?php echo img_path($v['cover_path']);?>" /><?php } else { ?><img src="<?php echo $base_path;?>statics/img/nophoto.gif" /><?php } ?></a>
                                        <?php } ?>
                                                    
                                                </td>
                                            </tr>
                                        </table>
                                        
                                    </div>
                                    <?php if($loggedin) { ?>
                                    <div class="pic_ctl">
                                        <ul class="btns">
                                            <li><a href="javascript:void(0)" onclick="Mui.box.show('<?php echo site_link("albums","confirm_delete",array('id'=>$v['id'])); ?>',true);" title="<?php echo lang("move_to_trash"); ?>"><span class="i_littletrash sprite"></span></a></li>
                                            <li><a href="javascript:void(0)" onclick="Mui.box.show('<?php echo site_link("albums","modify",array('id'=>$v['id'])); ?>',true);" title="<?php echo lang("modify"); ?>"><span class="i_edit sprite"></span></a></li>
                                            <?php echo $v['album_control_icons'];?>
                                        </ul>
                                    </div>
                                    <?php } ?>
                                    <div class="clear">
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="title">
                                    <?php if($loggedin) { ?>
                                    <input class="selitem" type="checkbox" name="sel_id[<?php echo $v['id'];?>]" value="1" /> <span class="name"><a nid="<?php echo $v['id'];?>" title="<?php echo lang("click_to_rename"); ?>" href="javascript:void(0)" onclick="Madmin.rename(this,'<?php echo site_link("albums","rename",array('id'=>$v['id'])); ?>')"><?php echo $v['name'];?></a></span>
                                    <?php } else { ?>
                                    <span class="name"><a href="<?php echo site_link("photos","index",array('aid'=>$v['id'])); ?>"><?php echo $v['name'];?></a></span>
                                    <?php } ?>
                                    </div>
                                    <div class="info_col">
                                        <p class="gray"><?php echo lang("photos_num","{$v['photos_num']}"); ?>
                                        , 
                                        <?php if($show_uptime) { ?>
                                            <?php echo lang("in_upload_time"); ?><?php echo date('Y-m-d',$v['up_time']); ?>
                                            <?php } else { ?>
                                            <?php echo lang("in_create_time"); ?><?php echo date('Y-m-d',$v['create_time']); ?>
                                            <?php } ?>
                                        </p>
										<p><?php if($loggedin) { ?><span class="i_greenicn sprite"></span><?php echo enum_priv_type($v['priv_type']); ?><?php } ?> <?php if($v['enable_comment'] && $v['comments_num']) { ?><a href="<?php echo site_link("photos","index",array('aid'=>$v['id'])); ?>#comments" class="gray"><?php echo lang("comments_num","{$v['comments_num']}"); ?></a><?php } ?>&nbsp; </p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="clear"></div>
                        </div>
                        <div class="paginator">
                            <?php echo $pagestr;?>
                        </div>
                    </div>
                    <?php } else { ?>
                        <div class="no_data_info">
                            <?php if($is_search) { ?>
                            <div class="pic no_album_search png"></div>
                            <div class="data_msg">
                                <div><?php echo lang("no_album_search_notice"); ?></div >
                                <div class="button"><a href="<?php echo site_link("albums","index",array()); ?>"><?php echo lang("view_all_album"); ?></a></div>
                            </div>
                            <div class="clear"></div>
                            <?php } else { ?>
                            <div class="pic no_album png"></div>
                            <div class="data_msg">
                                <?php if($loggedin && $search['cate_id']!='') { ?>
                                <div><?php echo lang("no_cate_album_notice"); ?></div >
                                <div class="button"><div class="bigbutton"><a href="javascript:void(0)" onclick="Mui.box.show('<?php echo site_link("albums","create",array('cate'=>$search['cate_id'])); ?>',true);"><span><?php echo lang("create_new_album"); ?></span></a></div></div>
                                <?php } elseif ($loggedin && empty($search['cate_id'])) { ?>
                                <div><?php echo lang("no_album_notice"); ?></div >
                                <div class="button"><div class="bigbutton"><a href="javascript:void(0)" onclick="Mui.box.show('<?php echo site_link("albums","create",array()); ?>',true);"><span><?php echo lang("create_new_album"); ?></span></a></div></div>
                                <?php } elseif (!$loggedin && $search['cate_id']!='') { ?>
                                <div><?php echo lang("no_cate_album_notice_notlogin"); ?></div>
                                <div class="button"><a href="javascript:void(0);" onclick="Mui.box.show('<?php echo site_link("users","login",array()); ?>',true);"><?php echo lang("create_after_login"); ?></a></div>
                                <?php } elseif (!$loggedin && empty($search['cate_id'])) { ?>
                                <div><?php echo lang("no_album_notice_notlogin"); ?></div>
                                <div class="button"><a href="javascript:void(0);" onclick="Mui.box.show('<?php echo site_link("users","login",array()); ?>',true);"><?php echo lang("create_after_login"); ?></a></div>
                                <?php } ?>
                            </div>
                            <div class="clear"></div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </td>
        </tr>
    </table>
</div>
<?php include $this->template("block/footer"); ?>