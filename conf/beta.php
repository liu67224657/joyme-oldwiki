<?php
$wgDBname = $wgWikiname."wiki";
$wgDBservers = array(
		array(
				'host' => "alyweb002.prod",
				'dbname' => $wgWikiname."wiki",
				'user' => "wikiuser",
				'password' => "123456",
				'type' => "mysql",
				'flags' => DBO_DEFAULT,
				'load' => 0,
		),
);

#object cache setting

$wgObjectCaches['redis'] = array(
'class' => 'RedisBagOStuff',
'servers' => array( 'alyweb008.prod:6380' ),
'persistent' => false,
);
$wgMainCacheType = 'redis';

$wgRedis_host = 'alyweb002.prod';
$wgRedis_port = 6380;

$joyme_u_key = 'as__-d(*^(';

//配置加载PHP公共库的具体路径
$GLOBALS['libPath'] = '/opt/www/joymephplib/beta/phplib.php';
if(!file_exists($GLOBALS['libPath'])){
	die('公共库加载失败，未找到入口文件');
}
include($GLOBALS['libPath']);
use Joyme\core\Log;
Log::config(Log::DEBUG);



$wgWikiWebIps = array(
    '10.170.234.88',
    '10.170.228.21'
);
$wgSolrConfig = array(
    "host" => "172.16.75.30", // hostname 还没有配置
    "port" => "38000",
    "path" => "/solr/pages"
);



//七牛云存储配置
$wgQiNiuPath = 'joymepic.joyme.com';
$wgQiNiuBucket = 'joymepic';

//squid缓存
$wgUseSquid = true;
$wgSquidServers = array(
	'10.51.114.101'
);


?>