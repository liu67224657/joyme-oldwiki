<?php
/**
 * 手机版wiki评论
 */
header('content-type:text/html;charset=utf-8');
// session_start();
require_once dirname( __FILE__ ) . '/includes/PHPVersionCheck.php';
wfEntryPointCheck( 'index.php' );
require __DIR__ . '/includes/WebStart.php';

$title = $wgRequest->getText( 'title' );
$_SESSION['formhash'] = $formhash = substr(md5('!@#$#%&^'.rand(1000, 9999).time()), 0, 9);
include(__DIR__ . '/skins/MySkin/mobile/wapcomment.html');
