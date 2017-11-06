<?php 
$wgExtensionFunctions[] = "joymeScriptExtension"; 
function joymeScriptExtension() { 
   global $wgParser;
   # register the extension with the WikiText parser
   # the first parameter is the name of the new tag.
   # In this case it defines the tag <example> ... </example>
   # the second parameter is the callback function for
   # processing the text between the tags
   $wgParser->setHook( "joymescript", "renderjoymescript" );
} 

function renderjoymescript( $input, $argv ) {
   # $argv is an array containing any arguments passed to the
   # extension like <example argument="foo" bar>..
   # Put this on the sandbox page:  (works in MediaWiki 1.5.5)
   #   <example argument="foo" argument2="bar">Testing text **example** in between the new tags</example>
   #$output = "Text passed into example extension: <br/>$input";
   #$output .= " <br/> and the value for the111 arg 'argument' is " . $argv["argument"];
   #$output .= " <br/> and the value for the arg 'argument2' is: " . $argv["argument2"];
	$host = $_SERVER['HTTP_HOST'];	
	$output = '';
	if (!empty($argv['argument'])){		
			$output.= "<script src=\"http://".$host."/extensions/jsscripts/".$argv['argument'].".js\" language=\"javascript\"></script>";
	}	
	return $output;
} 



