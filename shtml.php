<?php

/**
 * Description of shtml
 * 
 * 
 * @author clarkzhao
 * @date 2015-09-15 03:46:59
 * @copyright joyme.com
 */
header('Content-type: text/html; charset=utf-8');
$arr = explode('?', $_SERVER['REQUEST_URI']);
$paramstr = array_shift($arr);
$paramarr = explode('/', substr($paramstr, 1));
$homedomain = 'http://'.$_SERVER['HTTP_HOST'];
$env = explode('.', $_SERVER['HTTP_HOST']);
$com = array_pop($env);
$_SERVER['HTTP_HOST'] = $paramarr[0].'.joyme.'.$com;
require_once dirname( __FILE__ ) . '/includes/PHPVersionCheck.php';
wfEntryPointCheck( 'index.php' );
require __DIR__ . '/includes/WebStart.php';
$channel = $paramarr[1];
$wikitype = $paramarr[2];
$idarr = explode('.', $paramarr[3]);
if($idarr[1] != 'shtml'){
	@header("http/1.1 404 not found"); 
	@header("status: 404 not found"); 
	echo '404'; 
	exit();
}
$id = $idarr[0];
$page = '';
if(strpos($id, '_') !== false){
	$tmparr = explode('_', $id);
	$id = $tmparr[0];
	$page = $tmparr[1];
	$order = !empty($tmparr[2]) ? $tmparr[2] : '';
}
$wikikey = $paramarr[0];
$isindex = 0;
if($id == 'index'){
	$isindex = 1;
}else if(is_numeric($id)){
	$isindex = 2;
}else{
	$isindex = 1;
}

include('extensions/shtml/config.php');
include('extensions/shtml/db.class.php');
include('extensions/shtml/Base.class.php');
include('extensions/shtml/tpl.class.php');
include('extensions/shtml/tag.class.php');
$tpl = new Tpl();
echo $tpl->tplhtml;
