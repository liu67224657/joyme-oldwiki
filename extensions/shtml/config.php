<?php
/**
 * 配置文件
 *
*/
// db 配置
if($com == 'com'){
	$dbconfig = array(
		'hostname'=>'alyweb005.prod',
		'username'=>'wikipage',
		'password'=>'wikipage2015',
		'database'=>'wikiurl',
	);
}else if($com == 'beta'){
	$dbconfig = array(
		'hostname'=>'alyweb002.prod',
		'username'=>'wikipage',
		'password'=>'wikipage',
		'database'=>'wikiurl',
	);
}else{
	$dbconfig = array(
		'hostname'=>'172.16.75.75',
		'username'=>'wikipage',
		'password'=>'wikipage',
		'database'=>'wikiurl',
	);
}

$tmp = $wgDBservers[0];
$wikidbconfig = array(
	'hostname'=>$tmp['host'],
	'username'=>$tmp['user'],
	'password'=>$tmp['password'],
	'database'=>$tmp['dbname'],
);

// 特殊标签
$tags = array('wiki_body', 'wiki_comment', 'wiki_wap_comment', 'wx_wiki_wap_comment', 'wiki_rank', 'wiki_recent_update', 'wiki_visitor_top', 'wiki_update_time');
// 循环标签
$looptags = array('news-loop', 'hot-loop');

// 域名配置
$domain = 'http://'.$_SERVER['HTTP_HOST'];