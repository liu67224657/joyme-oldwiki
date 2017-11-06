<?php 
// This is the hook function. It adds the tag to the wiki parser and tells it what callback function to use.
function wfAddCarouselHook() {
	global $wgParser;
	# register the extension with the WikiText parser
	$wgParser->setHook( "lunbo", "addCarousel" );
}
# The callback function for converting the input text to HTML output
function addCarousel( $input ,$argv ) {
	$width = empty($argv['width'])?400:intval($argv['width']);
	$height = empty($argv['height'])?300:intval($argv['height']);
	$ptime = empty($argv['ptime'])?3000:intval($argv['ptime']);
	$host = $_SERVER['HTTP_HOST'];	
	$html ='<style type="text/css">#focus_img{position:relative; clear:both; font-size:12px; text-align:center; line-height:0}#focus_img img{display:none; /*margin:0 auto;*/}#focus_img span{display:block; padding:2px 0 1px 10px; line-height:12px; background:url(http://sy.joyme.com/templets/default/img/alpha50.png) repeat; text-align:center; position:absolute; bottom:10px; left:50%; border-radius:8px;}#focus_img i{display:inline-block; width:10px; height:10px; border-radius:10px; background-color:#666; margin-right:10px;}#focus_img i.current{background-color:#333}</style>
	<input type="hidden" id="plooptime" value="'.$ptime.'" />
	<script src="http://'.$host.'/extensions/jsscripts/lunbo.js" language="javascript"></script>';
	return $html;
}

$wgExtensionFunctions[] = "wfAddCarouselHook";

?>