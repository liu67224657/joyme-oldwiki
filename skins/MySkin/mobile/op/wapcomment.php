<?php
//配置加载PHP公共库的具体路径
$com = substr($_SERVER['HTTP_HOST'],strrpos($_SERVER['HTTP_HOST'],'.')+1);
if($com == 'com'){
	$path = 'prod';
}else{
	$path = $com;
}
$GLOBALS['libPath'] = '/opt/www/joymephplib/'.$path.'/phplib.php';
if(!file_exists($GLOBALS['libPath'])){
	die('公共库加载失败，未找到入口文件');
}
include($GLOBALS['libPath']);
# 用户登录
use Joyme\core\JoymeUser;
JoymeUser::initByRequest();
$wgIsLogin = JoymeUser::isLogin();
$wgJoymeUserInfo = JoymeUser::getUserInfo($com);

$wgWikiname = substr($_SERVER['HTTP_HOST'], 0, strpos($_SERVER['HTTP_HOST'], '.'));
$com = substr($_SERVER['HTTP_HOST'], strrpos($_SERVER['HTTP_HOST'], '.') + 1);
$wgScriptExtension = ".php";
$wgUsePathInfo = true;
$wgWikiCom = $com;

$wgUGCWikis = array('wwii','op', 'zjsn', 'gundam', 'marvel', 'natu',
    'pal', 'bio', 'bwlb', 'dc', 'dol5', 'fate', 'halo',
    'hmm', 'jc', 'klyx', 'naruto', 'pvz', 'samurai', 'singer',
    'yumaoqiu', 'gintama', 'angrybirds');
if (in_array($wgWikiname, $wgUGCWikis)) {
    $wgArticlePath = "/$wgWikiname/$1";
    $wgServer = "http://wiki.joyme." . $com . "/$wgWikiname";
    $wgPhpServer = "http://$wgWikiname.joyme." . $com;
} else {
    $wgArticlePath = "/wiki/$1";
    $wgServer = "http://$wgWikiname.joyme." . $com;
    $wgPhpServer = "http://$wgWikiname.joyme." . $com;
}
?>
<!doctype html>
<html>
<head>
<meta charset='UTF-8'>
<meta content='width=device.width, initial-scale=1.0, user-scalable=no' name='viewport'>
<meta content='yes' name='apple-mobile-web-app-capable'>
<meta content='black' name='apple-mobile-web-app-status-bar-style'>
<meta content='telephone=no' name='format-detection'>
<title>评论</title>
<?php $wgWikiname = substr($_SERVER['HTTP_HOST'],0,strpos($_SERVER['HTTP_HOST'],'.'));?>
<link href='/skins/MySkin/mobile/<?php echo $wgWikiname;?>/main.css' rel='stylesheet' type='text/css'>
<script type='text/javascript'>
	window.addEventListener('DOMContentLoaded', function () {
		document.addEventListener('touchstart', function () {return false}, true)
	}, true);
</script>
<?php
	echo '<script>window.wikipage=false; window.wgTitle="'.htmlspecialchars(addslashes($_GET['wgTitle'])).'";window.wgServer="'.$wgServer.'";window.wgPhpServer="'.$wgPhpServer.'";window.wgWikiCom="'.$com.'";window.wgWikiname="'.$wgWikiname.'"</script>';
?>
</head>
<body>
	<input type="hidden" id="joymelogin" value="<?php echo $wgIsLogin ? 'true' : 'false';?>">
	<input type="hidden" id="joymeuserinfo" value='<?php echo $wgJoymeUserInfo ? json_encode($wgJoymeUserInfo) : '';?>'>
	<div id='content'>
    	<!--outer-div-->
    	<div id="outer-div">
        	<!--module-comment-->
            <div class='module-comment clearfix' id="commentBody" style="display:none;">
                <!--hot-tit-->
                <div class='info-bar hot-tit' id="hot-tit"><a href="javascript:void(0);" class="fr" onclick="inOut(this)" id="loginout">登录</a><span>热门评论</span></div>
                <div class='comment-box clearfix' id='hot-comment'></div>
                <!--hot-tit==end-->
                <!--all-tit-->
                <div class='info-bar all-tit'><span>全部评论</span></div>
                <div class='comment-box' id='all-comment'></div>
                <!--all-tit==end-->
            </div>
			<div class='module-comment clearfix' id="nocomment" style="display:none;">
             	<!--null-comment-->
                <div class="null-comment">
                	<span>暂时还没有评论哦~</span>
                </div>
                <!--null-comment==end-->
            </div>
            <!--module-comment==end-->
         </div>
        <!--outer-div-->
        <!--wp-comment-->
        <div class='wp-comment'>
            <a href='javascript:void(0);' class="tucao" onclick="commentAlert(this)"></a>
        </div>
        <!--wp-comment==end-->
        <!--alert-comment-->
        <div class='alert-comment'>
            <div class='info-alert-box'>
                <!--info-beyond-->
                <div class='info-beyond'>
                    <span></span>
                </div>
                <!--info-beyond==end-->
                <div class='info-alert-form'>
                    <textarea class='info-textarea' placeholder='请输入内容，140字以内' id="textarea_body"></textarea>
                </div>
                <div class='info-alert-shop clearfix'>
                    <span class='fl' style='display:none'>已超出<b class='inp-num'>0</b>个字</span>
                    <div class='fr'>
                        <span class="cancel-btn">取消</span>
                        <span class="reply-btn">回复</span>
                    </div>
                </div>
            </div>
        </div>
        <!--alert-comment==end-->
        <div class='wp-bg'></div>
        <!--wp_comment_alert-->
        <div class="wp_comment_alert">
		<!--
            <div class="wp_comment_tips">您还没登录<br />请先<a href="#">登录</a>后再评论~</div>
            <div class="wp_comment_btn">
                <span class="wp_cancel">取消</span>
                <span class="wp_confirm">登录</span>
            </div>
			-->
        </div>
        <!--wp_comment_alert==end-->
  </div>
  <script src='/skins/MySkin/mobile/js/jquery-1.9.1.min.js'></script>
  <script type="text/javascript" src="/extensions/jsscripts/commonfn.js"></script>
  <script src="/skins/MySkin/mobile/op/js/wapcomment.js"></script>
</body>
</html>
