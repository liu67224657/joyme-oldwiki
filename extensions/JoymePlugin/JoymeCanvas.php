<?php
/**
* 蜘蛛网图
*/
$wgExtensionFunctions[] = "CanvasTag";
function CanvasTag() { 
	global $wgParser; 
	$wgParser->setHook( "canvas", "CanvasData" ); 
} 

function CanvasData( $input, $argv ) {
	$host = $_SERVER['HTTP_HOST'];
	return '<canvas id="'.$argv['id'].'" height="'.$argv['height'].'" width="'.$argv['width']
			.'" data-msg="'.$argv['msg'].'" data-bgcolor="'.$argv['bgcolor']
			.'" data-color="'.$argv['color'].'" data-size="'.$argv['size']
			.'">canvas</canvas><script src="http://'.$host.'/extensions/jsscripts/canvas.js"></script>'
			.'<script>var radarTest = new RadarChart("'.$argv['id'].'");radarTest.draw();</script>';
}