<?php
# This file was automatically generated by the MediaWiki 1.25.1
# installer. If you make manual changes, please keep track in case you
# need to recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# https://www.mediawiki.org/wiki/Manual:Configuration_settings

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## https://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath = "";
$wgScriptExtension = ".php";

## alpha beta com
$com = substr($_SERVER['HTTP_HOST'], strrpos($_SERVER['HTTP_HOST'], '.') + 1);
$wgWikiCom = $com;


## The protocol and server name to use in fully-qualified URLs
$wgWikiname = substr($_SERVER['HTTP_HOST'], 0, strpos($_SERVER['HTTP_HOST'], '.'));

if($wgWikiname == 'pgcwikicdn'){
	$urlarr = explode('/' , $_SERVER['REQUEST_URI']);
	
	$wgWikiname = empty($urlarr[1])?'':$urlarr[1];
	
	if(empty($wgWikiname)){
		die('no wikiname');
	}
}


$wgIsUgcWiki = true;
$wgUserEditStatus = true;
$wgMobileIndexStatus = false;
//site info
$wgSiteGameTitle = '';
$wgSitename = '';
$wgMetaNamespace = '';
$wgSiteSEOKeywords = '';
$wgSiteSEODescription = '';


$wgPhpServer = "http://$wgWikiname.joyme." . $com;
$wgWikiStatic = $wgPhpServer;

$wgPhpNumWikis = array('krsma','ms');


## The relative URL path to the skins directory
$wgStylePath = "$wgWikiStatic/skins";
$wgResourceBasePath = $wgScriptPath;
$wgShowExceptionDetails = true;

$wgLocalStylePath = "$wgWikiStatic/skins";

$wgExtensionAssetsPath = "$wgWikiStatic/extensions";

## The relative URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogo = "$wgResourceBasePath/resources/assets/wiki.png";

## UPO means: this is also a user preference option

$wgEnableEmail = false;
$wgEnableUserEmail = true; # UPO

$wgEmergencyContact = "to_group@staff.joyme.com";
$wgPasswordSender = "to_group@staff.joyme.com";

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = false; # UPO
$wgEmailAuthentication = true;

## Database settings

# MySQL specific settings
$wgDBprefix = "";

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=utf8";

# Experimental charset support for MySQL 5.0.
$wgDBmysql5 = false;

## Shared memory settings
$wgMainCacheType = CACHE_NONE;
$wgMemCachedServers = array();

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = true;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";
$wgUploadPath = "$wgScriptPath/wiki/images/$wgWikiname";
$wgUploadDirectory = "$IP/wiki/images/$wgWikiname";
$wgAllowExternalImages = true;
$wgAllowCopyUploads = true;
$wgFileExtensions = array('png', 'gif', 'jpg', 'jpeg');

# InstantCommons allows wiki to use images from http://commons.wikimedia.org
$wgUseInstantCommons = false;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale
$wgShellLocale = "en_US.utf8";

# Site language code, should be one of the list in ./languages/Names.php
$wgLanguageCode = "zh-cn";

$wgSecretKey = "57a6cdbc995233cbbff99fd89b8926e15c7a89e297de854d1341066a00687a6c";

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = "572fee820c6228fd";

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "";
$wgRightsText = "";
$wgRightsIcon = "";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

# The following permissions were set based on your choice in the installer
$wgGroupPermissions['*']['createaccount'] = false;

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'vector', 'monobook':
//$wgDefaultSkin = "vector";

# Enabled skins.
# The following skins were automatically enabled:
//wfLoadSkin( 'Vector' );


## If you want to use image uploads under safe mode,
## create the directories images/archive, images/thumb and
## images/temp, and make them all writable. Then uncomment
## this, if it's not already uncommented:
#$wgHashedUploadDirectory = false;

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'standard', 'nostalgia', 'cologneblue', 'monobook', 'vector':
$wgDefaultSkin = "joyme1";

$wiki_skin_cookie = $wgWikiname . '-device';

$skin_cookie = empty($_COOKIE[$wiki_skin_cookie]) ? '' : $_COOKIE[$wiki_skin_cookie];

if (!empty($_GET['device']) && ctype_alnum($_GET['device'])) {
    $skin_cookie = $_GET['device'];
    setcookie($wiki_skin_cookie, $skin_cookie, time() + 86400 * 30, '/');
}

require_once( "extensions/Mobile/Mobile.php");

//先判读cookie中的模板 在判读是否移动设备 isMobile();
if (!empty($skin_cookie)) {
    $wgDevice = $skin_cookie;
} elseif (!empty($_SERVER['HTTP_JPARAM'])) {
    $wgDevice = 'app';
} elseif (isMobile()) {
    $wgDevice = 'mobile';
}elseif(isset ($_SERVER["HTTP_WIKITYPE"])){
    $wgDevice = 'mobile';
}
else {
    $wgDevice = 'pc';
}

$wgDefaultDevice = 'pc';
# 讨论区目前没有手机版
if (strpos($_SERVER['QUERY_STRING'], urlencode('讨论区'))) {
    $wgDevice = 'pc';
}

if (file_exists("$IP/skins/MySkin/$wgDevice/$wgWikiname.php")) {
    $wgDefaultSkin = "$wgWikiname";
    $wgDefaultDevice = "$wgDevice";
    $wgValidSkinNames[$wgWikiname] = "$wgWikiname";
    require_once( "$IP/skins/MySkin/$wgDevice/$wgWikiname.php" );
} elseif (file_exists("$IP/skins/MySkin/pc/$wgWikiname.php") && $wgDevice =='pc' ) {
    $wgDefaultSkin = "$wgWikiname";
    $wgDefaultDevice = "pc";
    $wgValidSkinNames[$wgWikiname] = "$wgWikiname";
    require_once( "$IP/skins/MySkin/pc/$wgWikiname.php" );
}else{
	if($wgDevice == 'pc'){
		$wgDefaultSkin = "joyme1";
		$wgDefaultDevice = "pc";
		$wgValidSkinNames['joyme1'] = "joyme1";
		require_once( "$IP/skins/MySkin/pc/Joyme1.php" );
	}else{
		$wgDefaultSkin = "joyme1";
		$wgDefaultDevice = "mobile";
		$wgValidSkinNames['joyme1'] = "joyme1";
		require_once( "$IP/skins/MySkin/mobile/joyme1.php" );
	}
}

# End of automatically generated settings.
# Add more configuration options below.

$wgLoadphpCache = false;

$wgNamespacesWithSubpages = array_fill(
		0, 200, true
);
# End of automatically generated settings.
# Add more configuration options below.

#自定义插件
require_once( "extensions/JoymePlugin/JoymeButton.php");
require_once( "extensions/JoymePlugin/JoymeHiddenId.php");
require_once( "extensions/JoymePlugin/JoymeLevelDiv.php");
require_once( "extensions/JoymePlugin/JoymeMovie.php");
require_once( "extensions/JoymePlugin/JoymeScript.php");
require_once( "extensions/JoymePlugin/JoymeSelect.php");
require_once( "extensions/JoymePlugin/JoymeSeo.php");
require_once( "extensions/JoymePlugin/JoymeSharePf.php");
require_once( "extensions/JoymePlugin/JoymeShowDiv.php");
require_once( "extensions/JoymePlugin/JoymeShowSpan.php");
require_once( "extensions/JoymePlugin/JoymeTabTag.php");
require_once( "extensions/JoymePlugin/JoymeTagSelect.php");
require_once( "extensions/JoymePlugin/JoymeViewAll.php");
require_once( "extensions/JoymePlugin/JoymeCarousel.php");
require_once( "extensions/JoymePlugin/JoymeShowWeekId.php");
require_once( "extensions/JoymePlugin/JoymeImgChange.php"); // 图片转换插件
require_once( "extensions/JoymePlugin/JoymeCanvas.php"); // 蜘蛛网图插件
require_once( "extensions/JoymePlugin/JoymeZhenrong.php"); // 阵容插件
require_once( "extensions/JoymePlugin/JoymeCardCompare.php"); // 卡牌对比插件
require_once( "extensions/JoymePlugin/JoymeCardComepareSel.php"); //卡牌对比选择插件
require_once( "extensions/JoymePlugin/JoymeIframe.php"); //iframe
require_once( "extensions/JoymePlugin/JoymeFormStart.php"); //form 开头
require_once( "extensions/JoymePlugin/JoymeFormEnd.php"); //form 结束
require_once( "extensions/JoymePlugin/JoymeAudio.php"); //audio
require_once( "extensions/JoymePlugin/JoymeChangeInfo.php"); //最近修改页面数据
require_once( "extensions/JoymePlugin/JoymePopularPages.php"); //热门页面
require_once( "extensions/JoymePlugin/JoymeCategory.php"); //调用分类
require_once( "extensions/MobileDetect/MobileDetect.php"); //调用分类



require_once( "extensions/AJAXPoll/AJAXPoll.php"); //投票
require_once( "extensions/FileUpload/fileUpload.php"); //图片同步
require_once( "extensions/FileUpload/revisionChange.php"); //版本同步
// require_once( "extensions/simplehtml/simple_html_dom.php" );
require_once( "extensions/MsUpload/MsUpload.php" );
require_once( "extensions/ConfirmEdit/ConfirmEdit.php" );
require_once( "extensions/Tabber/Tabber.php" );
require_once( "extensions/SeoSettings/SeoSettings.php" );
require_once( "extensions/Discussion/Discussion.php" );


wfLoadExtension( 'Cite' );
wfLoadExtension( 'CiteThisPage' );
wfLoadExtension( 'Gadgets' );
wfLoadExtension( 'ImageMap' );
wfLoadExtension( 'InputBox' );
wfLoadExtension( 'Interwiki' );
wfLoadExtension( 'LocalisationUpdate' );
wfLoadExtension( 'Nuke' );
wfLoadExtension( 'ParserFunctions' );
//require_once( "extensions/ParserFunctions/ParserFunctions.php" );
$wgPFEnableStringFunctions = true;

wfLoadExtension( 'PdfHandler' );
wfLoadExtension( 'Poem' );
#wfLoadExtension( 'Renameuser' );
wfLoadExtension( 'SpamBlacklist' );
wfLoadExtension( 'SyntaxHighlight_GeSHi' );
wfLoadExtension( 'TitleBlacklist' );

#新装皮肤
wfLoadSkin( 'Modern' );
wfLoadSkin( 'CologneBlue' );
wfLoadSkin( 'MonoBook' );
wfLoadSkin( 'GreyStuff' );
wfLoadSkin( 'erudite' );
wfLoadSkin( 'Metrolook' );

wfLoadExtension( 'WikiEditor' );
//内置编辑器
//require_once( "$IP/extensions/WikiEditor/WikiEditor.php" );
# Enables/disables use of WikiEditor by default but still allow users to disable it in preferences
$wgDefaultUserOptions['usebetatoolbar'] = 1;
$wgDefaultUserOptions['usebetatoolbar-cgd'] = 1;

# Displays the Preview and Changes tabs
$wgDefaultUserOptions['wikieditor-preview'] = 0;

# Displays the Publish and Cancel buttons on the top right side
$wgDefaultUserOptions['wikieditor-publish'] = 0;
//ImgViwer查看器
require_once( "extensions/ImgViwer/ImgViwer.php");

//数组
include_once "$IP/extensions/Arrays/Arrays.php";

require_once "$IP/extensions/Variables/Variables.php";

//五星投票
require_once "$IP/extensions/VoteNY/VoteNY.php";

//SMW
require_once "$IP/extensions/SemanticMediaWiki/SemanticMediaWiki.php";
enableSemantics( 'joyme.'.$com );
include_once "$IP/extensions/SemanticForms/SemanticForms.php";
include_once "$IP/extensions/SemanticResultFormats/SemanticResultFormats.php";

//lua
require_once "$IP/extensions/Scribunto/Scribunto.php";
$wgScribuntoDefaultEngine = 'luastandalone';


$wgNoFollowLinks = false;

//评论
$wgComment = true;

// 讨论区
$wgThread = false;

//用户中心
$joyme_u_status = 'on';
$joyme_u_adminid = array(3403834);

//redis solor 默认配置
$wgRedis_host = '127.0.0.1';
$wgRedis_port = 6379;

$wgEnvFile = dirname(__FILE__).'/conf/'.$wgWikiCom.".php";
if (!file_exists($wgEnvFile)) {
	die('no this environment');
}
require_once($wgEnvFile);

$wgUGCWikis = array();

//siteinfo
if($wgWikiname != 'wikiedit'){
	SiteInfo::load();
}

if($wgIsUgcWiki == false){
	
	$wgArticlePath = "/wiki/$1";
	$wgServer = "http://$wgWikiname.joyme." . $com;
	
	//$wgScript = "$wgScriptPath/index$wgScriptExtension";
	$wgLoadScript = "http://pgcwikicdn.joyme.{$com}/{$wgWikiname}/load{$wgScriptExtension}";
	//$wgResourceBasePath = "http://pgcwikicdn.joyme.{$wgWikiCom}";
	
	if(in_array($wgWikiname,$wgPhpNumWikis)){
		$wgDefaultSkin = "simple2";
		$wgDefaultDevice = "pc";
		$wgValidSkinNames['simple2'] = "simple2";
		require_once( "$IP/skins/MySkin/pc/simple2.php" );
	}else{
		$wgDefaultSkin = "simple";
		$wgDefaultDevice = "pc";
		$wgValidSkinNames['simple'] = "simple";
		require_once( "$IP/skins/MySkin/pc/simple.php" );
	}
	
	
}else{
	$wgUGCWikis = array($wgWikiname);
	
	$wgArticlePath = "/$wgWikiname/$1";
	if (isMobile()){
		$wgServer = "http://m.wiki.joyme." . $com . "/$wgWikiname";
//		$wgSquidServer = "http://m.wiki.joyme." . $com;
	}else{
		$wgServer = "http://wiki.joyme." . $com . "/$wgWikiname";
//		$wgSquidServer = "http://wiki.joyme." . $com ;
	}
}

if (isMobile() && $wgMobileIndexStatus) {
	if ($_SERVER['REQUEST_URI'] == '/'.$wgWikiname.'/' || urldecode($_SERVER['REQUEST_URI']) == '/'.$wgWikiname.'/首页' || $_SERVER['REQUEST_URI'] == '/%e9%a6%96%e9%a1%b5') {
		header('location:/' . $wgWikiname . '/手机版首页');
	}
}

if($wgUserEditStatus == true){
	$wgGroupPermissions['user'] = $wgGroupPermissions['lguser'];
}

//可视化编辑器
//定义可视化编辑器的wiki
$wgVisualWikis = $wgUGCWikis;
//op,marvel,naruto不支持可视化编辑器，模板需要调整
/*
$wgNoVisualWikis = array('op','marvel','naruto');

if ($wgIsUgcWiki && !in_array($wgWikiname,$wgNoVisualWikis)) {

	require_once( "extensions/VisualEditor/VisualEditor.php");
	// Enable by default for everybody
	$wgDefaultUserOptions['visualeditor-enable'] = 1;
	//// Don't allow users to disable it
	$wgHiddenPrefs[] = 'visualeditor-enable';
	//	$wgVisualEditorSupportedSkins = array( 'vector', 'joyme1' ,'op','marvel','naruto');
	$wgVisualEditorSupportedSkins = array( 'vector', 'joyme1');

	$wgVisualEditorParsoidPrefix = 'wiki25';
	$wgVisualEditorParsoidURL = 'http://node.joyme.'.$wgWikiCom;

	$wgVisualEditorParsoidForwardCookies = true;

}
*/
## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publically accessible from the web.
#$wgCacheDirectory = "$IP/cache";
$wgCacheDirectory = "$IP/cache/{$wgWikiname}/{$wgDefaultDevice}";
$wgResourceLoaderMaxQueryLength = -1;



$wgUseFileCache = true;
$wgFileCacheDirectory = "$IP/cache/{$wgWikiname}/{$wgDefaultDevice}";

if(in_array($wgWikiname, $wgPhpNumWikis)){
	$wgUseFileCache = false;
}

#$wgUseLocalMessageCache = true;
//数字站热门page
$wgNewHotCacheDirectory = "$IP/cache/{$wgWikiname}/newhotloop";


#################### 钩子开始################
require_once(dirname(__FILE__) . '/conf/hooks.php');

################钩子结束######################
# 用户登录

use Joyme\core\JoymeUser;

JoymeUser::initByRequest();
$wgIsLogin = JoymeUser::isLogin();
if($wgIsLogin){
	$wgJoymeUserInfo = array('uid'=>JoymeUser::getUid(),'uno'=>JoymeUser::getUno());
}


# Query string length limit for ResourceLoader. You should only set this if
# your web server has a query string length limit (then set it to that limit),
# or if you have suhosin.get.max_value_length set in php.ini (then set it to
# that value)

$wgShowIPinHeader = false;
$wgExternalLinkTarget = "_blank";

## ExtraNamespaces
$wgTalkNamespace = 'THREAD';
$wgExtraNamespaces = array(
		'1000' => 'THREAD'
);
// 数字站 最新最热屏蔽词
$wgShieldWords = array('首页','沙盒');

// ugc wiki 静态化接口
$wgAPIModules['shtml'] = 'ApiShtmlHelp';
//设置讨论区热帖缓存时间
$wgHotDataCacheExpiredTime = 60*60;
//设置接口请求域名
$wgRequestInterfaceUrl = "http://joymewiki.joyme.".$wgWikiCom."/";
//设置缓存目录
$wgPostsCachePath = $IP.'/cache/'.$wgWikiname.'/pc/wikiposts';
//
$wgStaticUrl = 'http://static.joyme.'.$wgWikiCom;

$wgImageCachePath = $IP.'/cache/'.$wgWikiname.'/imgname';


$wgGroupPermissions['*']['edit'] = false;
//设置允许标签库的wiki
$wgAllowTagLibrary = array('krsma','ms');
