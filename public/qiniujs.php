<?php
// require_once dirname( __FILE__ ) . '/includes/PHPVersionCheck.php';
// wfEntryPointCheck( 'index.php' );
// require __DIR__ . '/includes/WebStart.php';
$com = substr($_SERVER['HTTP_HOST'], strrpos($_SERVER['HTTP_HOST'], '.') + 1);
if ($com === 'beta') {
    $GLOBALS['libPath'] = '/opt/www/joymephplib/beta/phplib.php';
} else if ($com === 'com') {
    $GLOBALS['libPath'] = '/opt/www/joymephplib/prod/phplib.php';
} else if ($com === 'alpha') {
	$GLOBALS['libPath'] = '/opt/www/joymephplib/alpha/phplib.php';
	// $GLOBALS['libPath'] = 'D:/wamp/www/joymephplib/trunk/phplib.php';
}else {
    $GLOBALS['libPath'] = '/opt/www/joymephplib/alpha/phplib.php';
}
session_start();
if (!file_exists($GLOBALS['libPath'])) {
    die('公共库加载失败，未找到入口文件');
}
include($GLOBALS['libPath']);

$com = substr($_SERVER['HTTP_HOST'], strrpos($_SERVER['HTTP_HOST'], '.') + 1);
if($com == 'com' || $com == 'beta'){
	$bucket = 'joymepic';
}else{
	$bucket = 'joymetest';
}

use Joyme\qiniu\Qiniu_Utils;

// 获取上传token
if($_GET['do'] == 'token'){
	$uptoken = Qiniu_Utils::Qiniu_UploadToken($bucket);
	echo json_encode(array('uptoken'=>$uptoken));
}

// 删除图片
if($_GET['do'] == 'del'){
	if($_SESSION['formhash'] != $_GET['formhash']){
		die('Permission deny');
	}
	unset($_SESSION['formhash']);
	$file = $_GET['file'];
	if(!empty($file)){
		$urlInfo = parse_url($file);
		$key = ltrim($urlInfo['path'], '/');
		$res = Qiniu_Utils::Qiniu_DeleteFile($bucket, $key);
		echo 1;
	}else{
		echo 0;
	}
}
