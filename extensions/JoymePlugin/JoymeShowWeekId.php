<?php 
// This is the hook function. It adds the tag to the wiki parser and tells it what callback function to use.
function wfAddShowWeekIdHook() {
	global $wgParser;
	# register the extension with the WikiText parser
	$wgParser->setHook( "showweekid", "showWeekId" );
}
# The callback function for converting the input text to HTML output
function showWeekId( $input ,$argv ) {
	if(empty($argv['week']))
	{
		return '';
	}
	$host = $_SERVER['HTTP_HOST'];	
	return '<input type="hidden" id="pweek" value="'.$argv['week'].'" />
	<script src="http://'.$host.'/extensions/jsscripts/week.js" language="javascript"></script>'; 
}

$wgExtensionFunctions[] = "wfAddShowWeekIdHook";

?>