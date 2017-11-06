<?php
/**
*图片转换插件 调用方式
*/

$wgExtensionFunctions[] = "joymeImgChange"; 
function joymeImgChange() { 
   global $wgParser;
   $wgParser->setHook( "joymeimgchange", "imgdata" );
} 

function imgdata( $input, $argv ) {
	return '<script type="text/javascript">$(function(){var wikiImgChange = new imgChange('.json_encode($argv).');wikiImgChange.run();});</script>';
} 



