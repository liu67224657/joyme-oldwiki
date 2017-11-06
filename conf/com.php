<?php

$wgDBname = $wgWikiname . "wiki";
$wgDBservers = array(
	array(
		'host' => "rdsnu7brenu7bre.mysql.rds.aliyuncs.com",
		'dbname' => $wgWikiname . "wiki",
		'user' => "wikiuser",
		'password' => "123456",
		'type' => "mysql",
		'flags' => DBO_DEFAULT,
		'load' => 0,
	),
);
$wgAlyDBserversWikis = array('6l','9lz');
if(in_array($wgWikiname, $wgAlyDBserversWikis)){
	$wgDBservers = array(
		array(
			'host' => "10.251.0.252",
			'dbname' => $wgWikiname . "wiki",
			'user' => "wikiuser",
			'password' => "123456",
			'type' => "mysql",
			'flags' => DBO_DEFAULT,
			'load' => 0,
		),
	);
}

#object cache setting

$wgObjectCaches['redis'] = array(
    'class' => 'RedisBagOStuff',
    'servers' => array('alyweb001.prod:6380'),
    'persistent' => false,
);
$wgMainCacheType = 'redis';

$wgRedis_host = 'alyweb002.prod';
$wgRedis_port = 6380;

$joyme_u_key = 'as__-d(*^(';





$wgWikiWebIps = array(
    '10.171.101.30',
    '10.171.101.226'
);
$wgSolrConfig = array(
    "host" => "10.171.101.30", // hostname 还没有配置
    "port" => "38000",
    "path" => "/wikipages"
);




//七牛云存储配置
$wgQiNiuPath = 'joymepic.joyme.com';
$wgQiNiuBucket = 'joymepic';

//配置加载PHP公共库的具体路径
$GLOBALS['libPath'] = '/opt/www/joymephplib/prod/phplib.php';
if (!file_exists($GLOBALS['libPath'])) {
    die('公共库加载失败，未找到入口文件');
}
include($GLOBALS['libPath']);

use Joyme\core\Log;

Log::config(Log::ERROR);

//squid缓存
$wgUseSquid = true;
$wgSquidServers = array(
	'10.172.82.206',
	'10.51.113.180',
);


?>