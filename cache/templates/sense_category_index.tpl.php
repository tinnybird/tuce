<?php if(!defined('IN_MEIU')) exit('Access Denied'); ?><?php include $this->template("block/header"); ?>

<div id="bodywrap">
    <table class="layout">
        <tr>
            <td class="left">
                <div class="mainbody">
                    <div class="col titbg">
                        <h1 class="f_left"><?php echo lang("all_category"); ?></h1>
                        <h4 class="f_left"></h4>
                        <div class="f_right mt5">
                            <?php if($loggedin) { ?><a href="<?php echo site_link("category","manage",array()); ?>"><?php echo lang("category_manage"); ?></a><?php } ?>
                        </div>
                    </div>
                    <div class="innercol">
                       <div class="innerconetent">
                            <ul class="category_list">
                            <?php if(is_array($categorylist)) foreach($categorylist AS $row) { ?>
                            <li>
                                <?php for($i=1;$i<=$row['deep'];$i++) { ?>
                                    <span class="treebg tree<?php echo $i;?>"></span>
                                <?php } ?>
                                <a href="<?php echo site_link("albums","index",array('cate'=>$row['id'])); ?>"><?php echo $row['name'];?></a> 
                            </li>
                            <?php } ?>
                            <li><a href="<?php echo site_link("albums","index",array('cate'=>'0')); ?>"><?php echo lang("no_cate_album"); ?></a></li>
                            </ul>
                       </div>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>

<?php include $this->template("block/footer"); ?>