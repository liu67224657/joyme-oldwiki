<?php 
// This is the hook function. It adds the tag to the wiki parser and tells it what callback function to use.
function wfAddIframeHook() {
	global $wgParser;
	# register the extension with the WikiText parser
	$wgParser->setHook( "iframe", "addIframe" );
}
# The callback function for converting the input text to HTML output
function addIframe( $input ,$argv ) {
	if(!empty($argv['src']))
	{
		$src = $argv['src'];
	}else{
		return '';
	}
	$height = isset($argv['height']) ? $argv['height']: 428;
	$width = isset($argv['width']) ? $argv['width']: 320;
	return '<iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="auto" src="'.$src.'" style="background:transparent;"></iframe>';
	//return '<a href="'.$src.'" target="_blank">请点此链接观看视频</a>';
}

$wgExtensionFunctions[] = "wfAddIframeHook";

?>