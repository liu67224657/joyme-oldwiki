/**
 * 公共js
 */
window.joymeIsLogin = isLogin();
window.joymeuser = {};
window.joymedomain = {};
getEnv();
getUserInfo();
window.joymeapi = {
	'domian': 'http://'+window.location.host+'/',
	'auth'	: 'http://passport.joyme.'+window.joymedomain.env+'/',
	'api'	: 'http://api.joyme.'+window.joymedomain.env+'/',
	'www'	: 'http://www.joyme.'+window.joymedomain.env+'/',
	'joymewiki'	: 'http://joymewiki.joyme.'+window.joymedomain.env+'/'
};

// 获取cookie
function getCookie(objName) {
    var arrStr = document.cookie.split("; ");
    for (var i = 0; i < arrStr.length; i++) {
        var temp = arrStr[i].split("=");
        if (temp[0] == objName && temp[1] != '\'\'' && temp[1] != "\"\"") {
            return unescape(temp[1]);
        }
    }
    return null;
}

// 是否登录 ----- 该函数必须在页面设置一个ID为joymelogin的一个隐藏域值为公共库获取的是否登录值
function isLogin(){
	var loginsetting = $('#joymelogin').val() || 'false';
	if(loginsetting == 'true'){
		return true;
	}else{
		return false;
	}
}

// 拆分域名
function getEnv(){
	// window.domainArr = window.location.host.split('.');
        // var url = document.URL;
        // var myArray = url.split('/');
	window.joymedomain.key = window.wgWikiname;//window.domainArr[0];
	window.joymedomain.env = window.wgWikiCom;
}

// 获取用户信息 ----- 该函数必须在页面设置一个ID为joymeuserinfo的一个隐藏域值为公共库获取的用户信息
function getUserInfo(){
	var userInfo = $('#joymeuserinfo').val();
	if(!userInfo) return false;
	userInfo = eval('('+userInfo+')');
	window.joymeuser.uid = userInfo.uid;
	window.joymeuser.uno = userInfo.uno;
}