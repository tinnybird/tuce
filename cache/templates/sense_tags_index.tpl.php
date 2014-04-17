<?php if(!defined('IN_MEIU')) exit('Access Denied'); ?><?php include $this->template("block/header"); ?>

<div id="bodywrap">
    <table class="layout">
        <tr>
            <td class="left">
                <div class="mainbody">
                    <div class="tab f_left mb10 wide">
                       <ul>
                           <li <?php if(!$tag_type) { ?>class="current"<?php } ?>><a href="<?php echo site_link("tags","index",array()); ?>"><?php echo lang("all"); ?></a></li>
                           <li <?php if($tag_type==1) { ?>class="current"<?php } ?>><a href="<?php echo site_link("tags","index",array('type'=>'1')); ?>"><?php echo lang("album"); ?></a></li>
                           <li <?php if($tag_type==2) { ?>class="current"<?php } ?>><a href="<?php echo site_link("tags","index",array('type'=>'2')); ?>"><?php echo lang("photo"); ?></a></li>
                       </ul>
                   </div>
                    <div class="clear"></div>
                    <div class="innercol">
                       <div class="innerconetent">
                           <ul class="taglist">
                               <?php if($tag_list) { ?>
                               <?php if(is_array($tag_list)) foreach($tag_list AS $v) { ?>
                               <li><a href="<?php if($v['type']==1) { ?><?php echo site_link("albums","index",array('tag'=>$v['name'])); ?><?php } else { ?><?php echo site_link("photos","search",array('tag'=>$v['name'])); ?><?php } ?>"><?php echo $v['name'];?></a></li>
                               <?php } ?>
                               <?php } else { ?>
                                <div style="padding:20px"><?php echo lang("no_tags"); ?></div>
                               <?php } ?>
                           </ul>
                       </div>
                       <div class="paginator">
                          <?php echo $pagestr;?>
                       </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>

<?php include $this->template("block/footer"); ?>