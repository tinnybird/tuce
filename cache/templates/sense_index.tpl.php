<?php if(!defined('IN_MEIU')) exit('Access Denied'); ?><?php include $this->template("block/header"); ?>
<div id="bodywrap" class="mainbody">
	<div class="index_box">
		<div class="box_title">
			<h2><a class="f_right" href="<?php echo site_link("albums","index",array()); ?>"><?php echo lang("all_albums"); ?></a><?php echo lang("new_albums"); ?></h2>
		</div>
		<div class="gallary_wrap grid">
			<?php $tag_cache_name = md5(implode('&',array('order'=>'ct_desc','type'=>'0')).'6f4e458189d43a6245a9d273e79d66ca');$cache_lib =& loader::lib("cache"); if(!$data = $cache_lib->get($tag_cache_name)){$album_tag =& loader::model("album_tag"); if (method_exists($album_tag, 'lists')) {$data = $album_tag->lists(array('order'=>'ct_desc','type'=>'0','limit'=>'4'));}if(!empty($data)){ $cache_lib->set($tag_cache_name, $data,array("life_time" => 300));}} ?>
			<?php if($data) { ?>
			<?php if(is_array($data)) foreach($data AS $album) { ?>
			<div class="gallary_item album idx">
				<div class="item">
					<div class="pic_box">
						<!--load photo info-->
						
						<table><tr><td>
							<a href="<?php echo site_link("photos","index",array('aid'=>$album['id'])); ?>">
							<?php if($album['cover_id']) { ?>
							<?php $photo_tag =& loader::model("photo_tag"); if (method_exists($photo_tag, 'load')) {$photo = $photo_tag->load(array('id'=>$album['cover_id'],'limit'=>'20'));} ?>
							<img alt="media" src="<?php echo img_path($photo['thumb']);?>" />
							<?php } else { ?>
							<img alt="media" src="<?php echo $base_path;?>statics/img/nophoto.gif" />
							<?php } ?>
							</a>
						</td></tr></table>
						
					</div>
					<div class="clear"></div>
				</div>
				<div class="info">
					<div class="title">
						<span class="name"><a href="<?php echo site_link("photos","index",array('aid'=>$album['id'])); ?>"><?php echo $album['name'];?></a></span>
					</div>
					<p class="gray"><?php echo date('Y-m-d',$album['create_time']); ?>, <?php echo lang("photos_num","{$album['photos_num']}"); ?></p>
				</div>
			</div>
			<?php } ?>
			<?php } else { ?>
			<div class="no_records">
				 <?php echo lang("no_records"); ?>
			</div>
			<?php } ?>
			
		</div>
	</div>
</div>
<?php include $this->template("block/footer"); ?>