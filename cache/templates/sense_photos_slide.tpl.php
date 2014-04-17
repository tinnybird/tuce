<?php if(!defined('IN_MEIU')) exit('Access Denied'); ?><?php include $this->template("block/mini_header"); ?>
<style>
body{
    background:#222;
}
#myslideshow{
    width:100%;
    height:100%;
}
.topbtn{
    position:absolute;
    top:3px;right:90px;
    padding:10px;
}
</style>
<script src="<?php echo $statics_path;?>js/swfobject.js" type="text/javascript"></script>
<div class="topbtn"><a href="<?php echo $refer;?>" class="png close"></a></div>
<div id="myslideshow">
</div>
<script type="text/javascript">
var flashvars = {};
flashvars.galleryURL = escape('<?php echo site_link("photos","gallery",array('aid'=>$album_id)); ?>');
var params = {};
params.allowfullscreen = true;
params.wmode = 'transparent';
params.allowscriptaccess = "always";
params.bgcolor = "222222";
swfobject.embedSWF("<?php echo $statics_path;?>swf/simpleviewer.swf", "myslideshow", "100%",document.documentElement.clientHeight, "9.0.124", false, flashvars, params);
</script>
</body>
</html>