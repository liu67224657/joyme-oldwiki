<?php 
// This is the hook function. It adds the tag to the wiki parser and tells it what callback function to use.
function wfAddSeoHook() {
	global $wgParser;
	# register the extension with the WikiText parser
	$wgParser->setHook( "paddseo", "addSeo" );
}
# The callback function for converting the input text to HTML output
function addSeo( $input ,$argv ) {
	$title = $keywords = $description = '';
	if(!empty($argv['ptitle']))
	{
		$title = '<span id="seo_hidden_title">'.$argv['ptitle'].'</span>';
	}
	if(!empty($argv['pkey']))
	{
		$keywords = '<span id="seo_hidden_keywords">'.$argv['pkey'].'</span>';
	}
	if(!empty($argv['pdes']))
	{
		$description = '<span id="seo_hidden_description">'.$argv['pdes'].'</span>';
	}
	return '<div style="display:none;" id="seo_hidden">'.$title.$keywords.$description.'</div>'; 
}

$wgExtensionFunctions[] = "wfAddSeoHook";

?>