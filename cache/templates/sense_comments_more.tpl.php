<?php if(!defined('IN_MEIU')) exit('Access Denied'); ?>    <?php if(is_array($comments_list)) foreach($comments_list AS $v) { ?>
    <div class="cmt_item bd-b" id="comment-<?php echo $v['id'];?>">
    <div class="bd-a">
        <div class="f_left cmt_fce">
            <img src="<?php echo get_avatar($v); ?>" />
        </div>
        <div class="thde">
            <span class="f_right">
                <?php echo date('Y-m-d H:i:s',$v['post_time']); ?>
            </span>
            <div class="tt">
                <span class="title_c"><?php echo $v['author'];?></span>
            </div>
            <div class="cnt">
                <?php echo $v['content'];?>
            </div>
            <div class="ctlbtn">
                <a href="javascript:void(0);" onclick="reply_comment(this,'<?php echo site_link("comments","reply",array('id'=>$v['id'])); ?>');"><?php echo lang("reply"); ?></a>  <?php if($loggedin) { ?><a href="javascript:void(0)" onclick="Mui.box.show('<?php echo site_link("comments","confirm_delete",array('id'=>$v['id'])); ?>',true)"><?php echo lang("delete"); ?></a>  <a href="javascript:void(0)" onclick="Mui.box.show('<?php echo site_link("comments","block",array('id'=>$v['id'])); ?>')"><?php echo lang("block"); ?></a><?php } ?>
            </div>
            <?php if(is_array($v['sub_comments'])) foreach($v['sub_comments'] AS $vv) { ?>
            <div class="cmt_item bdwt sub" id="comment-<?php echo $vv['id'];?>">
                <div class="f_left cmt_fce">
                    <img src="<?php echo get_avatar($vv); ?>" />
                </div>
                <div class="thde">
                    <span class="f_right">
                        <?php echo date('Y-m-d H:i:s',$vv['post_time']); ?>
                    </span>
                    <div class="tt">
                        <span class="title_c"><?php echo $vv['author'];?></span> <?php echo lang("reply"); ?> <span class="title_c"><?php echo $vv['reply_author'];?></span>
                    </div>
                    <div class="cnt">
                        <?php echo $vv['content'];?>
                    </div>
                    <div class="ctlbtn">
                        <a href="javascript:void(0);" onclick="reply_comment(this,'<?php echo site_link("comments","reply",array('id'=>$vv['id'])); ?>');"><?php echo lang("reply"); ?></a>  <?php if($loggedin) { ?><a href="javascript:void(0)" onclick="Mui.box.show('<?php echo site_link("comments","confirm_delete",array('id'=>$vv['id'])); ?>',true)"><?php echo lang("delete"); ?></a>  <a href="javascript:void(0)" onclick="Mui.box.show('<?php echo site_link("comments","block",array('id'=>$vv['id'])); ?>')"><?php echo lang("block"); ?></a><?php } ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    </div>
    <?php } ?>
    <?php if($comments_total_page > $comments_current_page) { ?>
    <?php $page=$comments_current_page+1;?>
    <div class="more_comments" onclick="load_comments('<?php echo site_link("comments","more",array('ref_id'=>$ref_id,'type'=>$comments_type,'page'=>$page)); ?>')"><?php echo lang("load_more_comments"); ?> (<?php echo $comments_current_page;?>/<?php echo $comments_total_page;?>)</div>
    <?php } ?>
