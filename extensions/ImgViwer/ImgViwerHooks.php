<?php
class ImgViwerHooks{
	public static function onSkinAfterContent(&$data, $skin = null){
		$host = $_SERVER['HTTP_HOST'];
		$data.= <<<eot
<link href="http://{$host}/extensions/ImgViwer/modules/jquery.fancybox.css" rel="stylesheet"/>
<script type="text/javascript" src="http://{$host}/extensions/ImgViwer/modules/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="http://{$host}/extensions/ImgViwer/modules/jquery.fancybox.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
			$('.image').fancybox();
		});
	</script>
eot;
		return true;
	}
	
}