<?php

/**
 * Description of loadcache
 * 
 * 
 * @author clarkzhao
 * @date 2015-07-11 12:51:53
 * @copyright joyme.com
 */
if (!function_exists('version_compare') || version_compare(phpversion(), '5.3.2') < 0) {
    // We need to use dirname( __FILE__ ) here cause __DIR__ is PHP5.3+
    require dirname(__FILE__) . '/includes/PHPVersionError.php';
    wfPHPVersionError('index.php');
}

require __DIR__ . '/includes/WebStart.php';
$q = pathinfo($_SERVER['REQUEST_URI']);
$name = $q['filename'];
$extension = $q['extension'];

$cachepath = "cache/".$wgWikiname."/loadcache";

if(!empty($_GET['action']) && $_GET['action'] == 'del'){
	$dh=opendir($cachepath);
	while ($file=readdir($dh)) {
		if($file!="." && $file!="..") {
			$fullpath=$cachepath."/".$file;
			if(!is_dir($fullpath)) {
				unlink($fullpath);
			}
		}
	}
	
	closedir($dh);
	echo 'clear over';exit;
}

$cachefile = $cachepath.'/'.$name.'.'.$extension;

if(file_exists($cachefile)){
	$content = file_get_contents($cachefile);
}else{
	$content = file_get_contents($wgLoadScript . base64_decode($name));
	if(!file_exists($cachepath)){
		mkdir($cachepath);
	}
	@file_put_contents($cachefile, $content);
}


//强制缓存
header("Cache-Control: public");
header("Pragma: cache");
//如果是css 不设置 Content-Type 似乎不起效 
if (strstr('css', $extension)) {
    header("Content-Type:text/css; charset=utf-8");
}
if (strstr('js', $extension)) {
    header("Content-Type:application/javascript");
}
$offset = 30 * 60 * 60 * 24; // cache 1 month
$ExpStr = "Expires: " . gmdate("D, d M Y H:i:s", time() + $offset) . " GMT";
header($ExpStr);
//echo $wgLoadScript . base64_decode($name);
echo $content;
exit;
