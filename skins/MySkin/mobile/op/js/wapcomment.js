var phpapi='http://'+window.wgWikiname+'.joyme.'+window.wgWikiCom;
document.write(unescape("%3Cscript src='"+phpapi+"/extensions/jsscripts/commenterror.js' type='text/javascript'%3E%3C/script%3E"));
$(document).ready(function () {
	
	window.loginstr = '请先保存您的内容<br /><a href="javascript:loginDiv();">登录</a>之后再回来~';

	window.timer = null; // 定时器
	window.canTimes=null;
	window.commentTools = windowHeight();

	function windowHeight(){
		var wH=$(window).height()+100+'px';
		$('.wp-bg').height(wH);
	}

	$(window).resize(function() {
		commentTools.windowHeight();
	});

	window.pnum = 1;	// 当前页码
	window.psize = 10;	// 每页条数
	window.ptotal = 0;	// 总页数
	window.domain = 6;
	var title = window.wgTitle;
	window.uri = document.location.href;

    window.uniKey = window.wgWikiname+'|'+title;
    window.jsonParam = {
        title: title,
        pic: "",
        description: "",
        uri: uri
    }

    getCommentList(uniKey, domain, jsonParam, pnum, psize);

	txtTools();
	scroll_load();
	
	// 判断是否登录
	if (!window.joymeIsLogin) {
		$("#loginout").html('登录');
	}else{
		$("#loginout").html('退出登录');
	}
	
	// 发表评论
	$('.reply-btn').bind("click", function(){
		var text = $.trim($('#textarea_body').val());
		var oid = $('#textarea_body').attr("data-oid") || 0;
		var pid = $('#textarea_body').attr("data-pid") || 0;
		// 判断字符长度
		if(text == '' || text.length<2 || text.length>140){
			return false;
		}
		var body = {
            text: text,
            pic: ""
        }
		clearInterval(canTimes);
		canTimes=setInterval(function(){
			$('.wp-comment').show(500);
			},600);
		postComment(uniKey, domain, body, oid, pid);
	});

});

// 评论弹框
function commentAlert(obj) {
	if (!window.joymeIsLogin) {
		tips(window.loginstr);
		return;
	}
	var classname = $(obj).attr("class");
	var tmsg = '';
	if(classname == 'module-reply fr'){
		$("#textarea_body").attr("data-oid", $(obj).attr('data-id'));
		$("#textarea_body").attr("data-pid", $(obj).attr('data-id'));
		tmsg = '请输入内容，140字以内';
	}else if(classname == 'tucao'){
		$("#textarea_body").attr("data-oid", 0);
		$("#textarea_body").attr("data-pid", 0);
		tmsg = '请输入内容，140字以内';
	}else{
		$("#textarea_body").attr("data-oid", $(obj).attr('data-oid'));
		$("#textarea_body").attr("data-pid", $(obj).attr('data-id'));
		tmsg = '@'+$(obj).attr('data-author');
	}
	clearInterval(canTimes);
	$("#textarea_body").attr("placeholder", tmsg);
	$('.wp-comment').hide();
	$(".wp-bg").show();
	$(".alert-comment").show();
	$('.info-textarea').focus();
	$(".wp-bg").on('touchstart',function(ev){
		ev.stopPropagation();
		ev.preventDefault()
		});
	$(".wp-bg").on('touchmoveon',function(ev){
		ev.stopPropagation();
		ev.preventDefault()
	});
};

// 点赞
function dianzan(obj){
	if(!window.wikipage){
		if (!window.joymeIsLogin) {
			tips(window.loginstr);
            return;
        }
		var rid = $(obj).attr('data-commentid');
		if($('#hot_agreelink_' + rid, '#agreelink_' + rid).hasClass('active')){
			$('#hot_agreelink_' + rid, '#agreelink_' + rid).removeClass('active');
		}
		$('#agreelink_' + rid).addClass('active');
		$('#hot_agreelink_' + rid).addClass('active');
		var is_zan = window.localStorage.getItem(window.joymeuser.uno+'_'+uniKey+'_'+rid);
		if(is_zan != null){
			var msg = '你已经支持过了';
			tips(msg);
			return false;
		}
		agreeComment(uniKey, domain, rid);
	}
}

// 删除
function del(obj){
	if (!window.joymeIsLogin) {
		tips(window.loginstr);
		return;
	}
	var rid = $(obj).attr('data-rid');
	var oid = $(obj).attr('data-oid');
	clearInterval(timer);
	var msg = '<div class="wp_comment_tips">确定要删除吗~</div><div class="wp_comment_btn"><span class="wp_cancel">取消</span><span class="wp_confirm">确定</span></div>';
	var button = '';
	newObj = $(msg);
	newObj.find('span').click(function(){
		button = $(this).text();
		$('.wp_comment_alert').removeClass('active');
		if (button == '确定') {
			removeComment(uniKey, domain, rid, oid);
		}
	});
	$('.wp_comment_alert').html(newObj);
	$('.wp_comment_alert').addClass('active');
}

// wiki文章页点评论跳转
function toComment(){
	var url = window.wgPhpServer +'/skins/MySkin/mobile/op/wapcomment.php?wgTitle='+wgTitle;
	location.href = url;
	return;
}

// 查看更多
function moreReply(obj){
	var rpage = parseInt($(obj).attr('data-page'));
	var rid = parseInt($(obj).attr('data-rid'));
	var reply_sum = parseInt($(obj).attr('data-sum'));
	var hotid = $(obj).attr('data-hot') || '';
	var psize = 10;
	if($(obj).html()=='收起↑'){
		$('#'+hotid+'children_reply_list_'+rid+' li:gt(2)').hide();
		// $('#hot_children_reply_list_'+rid+' li:gt(2)').hide();
		$(obj).html('查看更多...');
		return;
	}
	if(rpage==1 || rpage>Math.ceil(reply_sum/psize)){
		$(obj).attr('data-page', ++rpage);
		$('#'+hotid+'children_reply_list_'+rid+' li').show();
		// $('#hot_children_reply_list_'+rid+' li').show();
	}else if(Math.ceil(reply_sum/psize)>=rpage){
		getReplyCommentList(uniKey, domain, rid, rpage, psize, hotid);
		$(obj).attr('data-page', ++rpage);
	}
	if(Math.ceil(reply_sum/psize)<rpage){
		$(obj).html('收起↑');
	}
}

// 楼中楼数据
function getReplyCommentList(unikey, domain, oid, pnum, psize, hotid){
	$.ajax({
        url: window.joymeapi.api+"jsoncomment/reply/sublist",
        type: "post",
        async: false,
        data: {unikey:unikey, domain:domain, oid:oid, pnum:pnum, psize:psize},
        dataType: "jsonp",
        jsonpCallback: "sublistcallback",
        success: function (req) {
            var resMsg = req[0];
            if (resMsg.rs == '1') {
                var result = resMsg.result;
                if (result == null) {// 没有评论
                    return;
                }

				// 楼中楼
                if (result.rows == null || result.rows.length == 0) {
                   return;
                } else {
                    var html = '';
                    for (var i = 0; i < result.rows.length; i++) {
                        html += getReCommentHtml(result.rows[i]);
                    }
                }
				$('#'+hotid+'children_reply_list_'+oid+' ul').append(html);
            } else {
				if(commenterror[resMsg.rs] != undefined){
					tips(commenterror[resMsg.rs]);
				}else{
					tips('系统错误，请联系管理员解决');
				}
                return;
            }
        },
        error: function () {
			// var msg = '获取失败，请刷新';
			// tips(msg);
        }
	});
}

// 主评论列表
function getCommentList(unikey, domain, jsonparam, pnum, psize) {
	var flag = '';
	if(pnum == 1){
		flag = 'hot';
	}
	window.pnum ++;
    $.ajax({
        url: window.joymeapi.api+"jsoncomment/reply/query",
        type: "post",
        async: false,
        data: {unikey:unikey, domain:domain, jsonparam:JSON.stringify(jsonparam), pnum:pnum, psize:psize, flag:flag},
        dataType: "jsonp",
        jsonpCallback: "querycallback",
        success: function (req) {
            var resMsg = req[0];
            if (resMsg.rs == '1') {
                var result = resMsg.result;
                if (result == null || result.mainreplys.rows.length==0 || result.mainreplys.page ==null) {// 没有评论
					$('#nocomment').show();
					$('#commentBody').hide;
					return;
                }else if((result == null || result.mainreplys.rows.length==0) && result.mainreplys.page.firstPage===true){
					$('#nocomment').show();
					$('#commentBody').hide;
					return;
				}
				// 页码
				ptotal = result.mainreplys.page != null ? result.mainreplys.page.maxPage : false;
				
				// 热门
				if (result == null || result.mainreplys.rows.length==0 || result.mainreplys.page ==null || result.hotlist=='') {
					$("#hot-tit, #hot-comment").hide();
				}else if((result == null || result.mainreplys.rows.length==0) && result.mainreplys.page.firstPage===true || result.hotlist==''){
					$("#hot-tit, #hot-comment").hide();
				}else if(result.mainreplys.page.firstPage){
					var html = '';
                    for (var i = 0; i < result.hotlist.length; i++) {
                        html += getCommentListCallBack(result.hotlist[i], unikey, domain, true);
                    }
                    $('#hot-comment').html(html);
				}
				// 内容页评论分享数
				if(window.wikipage){
					// $(".bottomBar span:eq(0)").html(resMsg.result.comment_sum);
					$(".tucao").html('已有'+resMsg.result.comment_sum+'条评论>>');
					$(".pageTime-bar a").html('已有'+resMsg.result.comment_sum+'条评论>>');
				}
				
				// 主评论
                if (result == null || result.mainreplys.rows.length==0 || result.mainreplys.page ==null) {// 没有评论
					$('#nocomment').show();
					$('#commentBody').hide;
					return;
                }else if((result == null || result.mainreplys.rows.length==0) && result.mainreplys.page.firstPage===true){
					$('#nocomment').show();
					$('#commentBody').hide;
					return;
				} else {
					$('#nocomment').hide();
					$('#commentBody').show();
                    var html = '';
                    for (var i = 0; i < result.mainreplys.rows.length; i++) {
                        html += getCommentListCallBack(result.mainreplys.rows[i], unikey, domain);
                    }
                }
				if(result.mainreplys.page!=null && result.mainreplys.page.firstPage){
					$('#all-comment').html(html);
				}else{
					$('#all-comment').append(html);
				}
            } else {
				if(commenterror[resMsg.rs] != undefined){
					tips(commenterror[resMsg.rs]);
				}else{
					tips('系统错误，请联系管理员解决');
				}
                return;
            }
        },
        error: function () {
			// var msg = '获取失败，请刷新';
			// tips(msg);
        }
    });
}

// 子评论列表
function getCommentListCallBack(commentObj, unikey, domain, ishot) {
    var reply = commentObj.reply;
    var reReplyArray = null;
    if (commentObj.subreplys != null) {
        reReplyArray = commentObj.subreplys.rows;
    }
	var is_zan = window.localStorage.getItem(window.joymeuser.uno+'_'+uniKey+'_'+reply.reply.rid);
	var zanclass = '';
	if(null != is_zan){
		zanclass = 'active';
	}
	var hotid = '';
	if(ishot){
		hotid = 'hot_';
	}
    var hasRe = (reReplyArray != null && reReplyArray.length > 0);

    var reCommentListHtml = '';
    if (hasRe) {
		reCommentListHtml += "<div class='module-double' id='"+hotid+"children_reply_list_"+reply.reply.rid+"'><div class='module-doublebar'><ul>";
		for (var i = 0; i < reReplyArray.length; i++) {
			var reCommentObj = reReplyArray[i];
			reCommentListHtml += getReCommentHtml(reCommentObj, i);
		}
		var more = '';
		if(reReplyArray.length > 3){
			more = '查看更多...';
		}
		reCommentListHtml += "</ul><div class='module-more' data-oid='"+reply.reply.oid+"' data-rid='"+reply.reply.rid+
		"' data-sum='"+reply.reply.sub_reply_sum+"' data-page='1' data-hot='"+hotid+"' onclick='moreReply(this)'>"+more+"</div></div></div>";
    }else{
		reCommentListHtml += "<div class='module-double' id='"+hotid+"children_reply_list_"+reply.reply.rid+"' style='display:none;'><div class='module-doublebar'><ul></ul><div class='module-more'></div></div></div>";
	}

    var removeHtml = '';
    if (window.joymeIsLogin && window.joymeuser.uid == reply.user.uid && window.wikipage==false) {
		removeHtml = '<span class="module-remove fr"  data-oid="'+reply.reply.oid+'" data-rid="'+reply.reply.rid+'" onclick="del(this)">删除</span>';
    }
	
	var replyHtml = '';
	if(window.wikipage==false){
		replyHtml = "<span class='module-reply fr' data-id='" + reply.reply.rid + "' onclick='commentAlert(this)'>回复</span>";
	}

	var html = "<div id='"+hotid+"cont_cmt_list_" + reply.reply.rid + "' class='module-list' "+
				(window.wikipage ? 'onclick="toComment()"' : '')+"><div class='module-infobox'>"+
				"<cite class='user-headImg'><img src='"+ reply.user.icon +"' /></cite>"+
                "<div class='module-shop'><div><em>"+ reply.user.name +"</em>"+replyHtml+
				"<span id='"+hotid+"agreelink_"+reply.reply.rid+"' data-commentid='"+reply.reply.rid+
				"' class='module-zan fr "+zanclass+"' onclick='dianzan(this)'>"+reply.reply.agree_sum+"</span>"+ removeHtml +"</div>"+
                "<div class='module-date'><span>"+ reply.reply.post_date +"</span></div></div></div>"+
                "<div class='module-txt'>"+ reply.reply.body.text +"</div>"+(window.wikipage ? '' : reCommentListHtml)+"</div>";
    return html;
}

function postComment(unikey, domain, body, oid, pid) {
	if (!window.joymeIsLogin) {
		tips(window.loginstr);
		return;
	}
	$(".wp-bg").hide();
	$(".alert-comment").hide();
    $.ajax({
        url: window.joymeapi.api+"jsoncomment/reply/post",
        type: "post",
        async: false,
        data: {unikey:unikey, domain:domain, body:JSON.stringify(body), oid:oid, pid:pid},
        dataType: "jsonp",
        jsonpCallback: "postcallback",
        success: function (req) {
            var resMsg = req[0];
            if (resMsg.rs == '-1') {
				tips(window.loginstr);
                return;
            } else if (resMsg.rs == '1') {
				var result = resMsg.result;
                if (result == null) {
                    return;
                }
				var oid=result.reply.oid;
                var rid=result.reply.rid;
				if(oid==0){// 主楼评论
					$('#nocomment').hide();
					$('#commentBody').show();
					var removeHtml = '';
					if (window.joymeIsLogin && window.joymeuser.uid == result.user.uid) {
						removeHtml = '<span class="module-remove fr"  data-oid="'+result.reply.oid+'" data-rid="'+result.reply.rid+'"  onclick="del(this)">删除</span>';
					}
					var commentHtml = "<div id='cont_cmt_list_" + result.reply.rid + "' class='module-list'><div class='module-infobox'>"+
						"<cite class='user-headImg'><img src='"+ result.user.icon +"' /></cite>"+
						"<div class='module-shop'><div><em>"+ result.user.name +"</em>"+
						"<span class='module-reply fr' data-id='" + result.reply.rid + "' onclick='commentAlert(this)'>回复</span>"+
						"<span id='agreelink_"+result.reply.rid+"' data-commentid='"+result.reply.rid+"' class='module-zan fr'  onclick='dianzan(this)'>"+
						result.reply.agree_sum+"</span>"+ removeHtml +"</div>"+
						"<div class='module-date'><span>"+ result.reply.post_date +"</span></div></div></div>"+
						"<div class='module-txt'>"+ result.reply.body.text +"</div><div class='module-double' id='children_reply_list_"+
						result.reply.rid+"'  style='display:none;'><div class='module-doublebar'><ul></ul>"+
						"<div class='module-more' onclick='moreReply(this)'></div></div></div></div>";
					if($('#all-comment div').length>0){
						$('#all-comment div:first').before(commentHtml);
					}else{
						$('#all-comment').html(commentHtml);
					}
				}else{// 楼中楼评论
					var html = getReCommentHtml(result);
					if($('#children_reply_list_' + oid + ' li').length > 0 || $('#hot_children_reply_list_' + oid + ' li').length > 0){
						$('#children_reply_list_' + oid + ' li:first').before(html);
						$('#hot_children_reply_list_' + oid + ' li:first').before(html);
					}else{
						$('#children_reply_list_' + oid + ' ul').html(html);
						$('#hot_children_reply_list_' + oid + ' ul').html(html);
					}
					$('#children_reply_list_' + oid).show();
					// var linum = $('#children_reply_list_' + oid + ' li').length;
					// if(linum>3){
						// $('#children_reply_list_' + oid + ' .module-more').html('查看更多...');
					// }
				}
				
				$("#textarea_body").val('');
				
            } else {
				if(undefined != commenterror[resMsg.rs]){
					tips(commenterror[resMsg.rs]);
				}else{
					tips('系统错误，请联系管理员解决');
				}
                return;
            }
        },
        error: function () {
			$('.wp-bg').hide();
			$('.alert-comment').hide();
			tips(window.loginstr);
        }
    });
}

function agreeComment(unikey, domain, rid) {
	if (!window.joymeIsLogin) {
		tips(window.loginstr);
		return;
	}
	window.localStorage.setItem(window.joymeuser.uno+'_'+uniKey+'_'+rid, 1);
    $.ajax({
        url: window.joymeapi.api+"jsoncomment/reply/agree",
        type: "post",
        async: false,
        data: {unikey:unikey, domain:domain, rid:rid},
        dataType: "jsonp",
        jsonpCallback: "agreecallback",
        success: function (req) {
			// window.localStorage.setItem(window.joymeuser.uno+'_'+uniKey+'_'+rid, 1);
            var resMsg = req[0];
            if (resMsg.rs == '-1') {
				tips(window.loginstr);
                return;
            } else if (resMsg.rs == '1') {
                var numObj = $('#agreelink_' + rid);
                var objStr = numObj.html();
                var num;
                if (numObj.length == 0 || objStr == null || objStr.length == 0) {
                    num = parseInt(1);
                } else {
                    var num = numObj.html();
                    num = parseInt(num);
                    num = num + 1;
                }
                numObj.html(num);
				$('#hot_agreelink_' + rid).html(num);
				// if($('#hot_agreelink_' + rid).length>0){
					
				// }
				// if(num==1){
					// numObj.addClass('active');
					// if($('#hot_agreelink_' + rid).length>0){
						// $('#hot_agreelink_' + rid).addClass('active');
					// }
				// }
            } else {
				if(undefined != commenterror[resMsg.rs]){
					tips(commenterror[resMsg.rs]);
				}else{
					tips('系统错误，请联系管理员解决');
				}
                return;
            }
        },
        error: function () {
			tips(window.loginstr);
        }
    });
}

function removeComment(unikey, domain, rid, oid) {
	if (!window.joymeIsLogin) {
		tips(window.loginstr);
		return;
	}
    $.ajax({
        url: window.joymeapi.api+"jsoncomment/reply/remove",
        type: "post",
        async: false,
        data: {unikey:unikey, domain:domain, rid:rid},
        dataType: "jsonp",
        jsonpCallback: "removecallback",
        success: function (req) {
            var resMsg = req[0];
            if (resMsg.rs == '-1') {
				tips(window.loginstr);
                return;
            } else if (resMsg.rs == '1') {
                if (oid == 0) {
                    $('#cont_cmt_list_' + rid).remove();
					$('#hot_cont_cmt_list_' + rid).remove();
					if($("#all-comment div").length<1){// 没有评论
						$('#nocomment').show();
						$('#commentBody').hide();
					}else if($("#hot-comment div").length<1){// 没有热门
						$("#hot-tit, #hot-comment").hide();
					}
                } 
            } else {
				if(undefined != commenterror[resMsg.rs]){
					tips(commenterror[resMsg.rs]);
				}else{
					tips('系统错误，请联系管理员解决');
				}
                return;
            }
        },
        error: function () {
			tips(window.loginstr);
        }
    });
}

function getReCommentHtml(reCommentObj, i) {
    var puserHtml = '';
    if (reCommentObj.puser != null && reCommentObj.puser.name != null) {
        puserHtml = '<cite>回复</cite>' + reCommentObj.puser.name + ":";
    }
	var hide = '';
	if(i>2){
		hide = 'style="display:none;"';
	}

	var reCommentHtml = '<li data-id="' + reCommentObj.reply.rid + '" data-oid="' + reCommentObj.reply.oid + 
		'" data-author="'+reCommentObj.user.name+'" '+hide+' onclick="commentAlert(this)"><span>'+reCommentObj.user.name + ((puserHtml=='') ? ':' : '') +
		'</span>'+ puserHtml + reCommentObj.reply.body.text +'</li>';
    return reCommentHtml;
}

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

function getStrlen(str) {
    if (str == null || str.length == 0) {
        return 0;
    }
    var len = str.length;
    var reLen = 0;
    for (var i = 0; i < len; i++) {
        if (str.charCodeAt(i) < 27 || str.charCodeAt(i) > 126) {
            // 全角
            reLen += 1;
        } else {
            reLen += 0.5;
        }
    }
    return Math.ceil(reLen);
}

function tips(msg){
	$(".wp-bg").hide();
	$(".alert-comment").hide();
	$('.wp_comment_alert').html(msg);
	$('.wp_comment_alert').addClass('active');
	clearInterval(timer);
	timer=setInterval(function(){
		$('.wp_comment_alert').removeClass('active');
		},3000);
}

//字数限制
function txtTools(){
	var txtobj={
		divName:'info-alert-box', //外层容器的class
		textareaName:'info-textarea', //textarea的class
		numName:'inp-num', //数字的class
		num:140, //数字的最大数目
	}
	var textareaFn=function(){
		var $onthis;
		var $divname=txtobj.divName;
		var $textareaName=txtobj.textareaName;
		var $numName=txtobj.numName;
		var $num=txtobj.num;
		var infotext=$('.'+$textareaName);
		function isChinese(str){ //判断是不是中文
			var reCh=/[u00-uff]/;
			return !reCh.test(str);
		}
		function numChange(){
			var strlen=0;
			var setNum='';
			var txtval = $.trim($onthis.val());
			var $infoBeyond=$('.info-beyond');
			var $replyBtn=$('.reply-btn');
			var $cancelBtn=$('.cancel-btn');
			var ibTime=null;
			for(var i=0;i<txtval.length;i++){
				if(isChinese(txtval.charAt(i))==true){
					strlen=strlen+2;//中文为2个字符
				}else{
					strlen=strlen+1;//英文一个字符
				}
			}
			strlen=Math.ceil(strlen/2);
			//提示2秒后关闭
			var textTips=function(){
				$infoBeyond.show();
				clearInterval(ibTime);
				ibTime=setInterval(function(){
					$infoBeyond.hide();
					},2000);
			}
			//当字数小于2或大于140
			$replyBtn.on('click',function(){
				if(txtval.length<=1){
					textTips();
					$infoBeyond.html('<span>请输入至少2个汉字</span>');
				}else if(strlen>140){
					textTips();
					$infoBeyond.html('<span>请删减后再进行回复</span>')
				}else{
					$infoBeyond.hide();
				}
			});
			$cancelBtn.on('click',function(){
				$('.wp-bg').hide();
				$('.alert-comment').hide();
				clearInterval(canTimes);
				canTimes=setInterval(function(){
					$('.wp-comment').show(500);
					},600);
			});
			//超出文字提示
			if($num-strlen<0){
				$par.show();
				$par.html('已超出<b class='+$numName+'>'+Math.abs($num-strlen)+'</b>个字');
			}else{
				if(strlen>=130){//剩余最后10个字时提示
					$par.show();
					$par.html('还可以输入<b class='+$numName+'>'+($num-strlen)+'</b>个字');
				}else{
					$par.hide();
				}
			}
			$b.html($num-strlen);
		};
		infotext.focus(function(){
			$b=$(this).parents('.'+$divname).find('.'+$numName); //获取当前的数字
			$par=$b.parent();
			$onthis=$(this);
			setNumTime=setInterval(numChange,500);
		});
		infotext.on('touchstart',function(){//防止复制粘贴的时候，手机复制框丢失
			clearInterval(setNumTime);
		});
		infotext.on('touchend',function(){
			setNumTime=setInterval(numChange,3000);
		});
	}
	textareaFn();
}

function scroll_load(){
	var wh=$(window).height();
	$('#outer-div').height(wh);
	$("#outer-div").scroll(function(){
		var sTop=$("#outer-div")[0].scrollTop;
		var sHeight=$("#outer-div")[0].scrollHeight;
		var sMainHeight=$("#outer-div").height();
		var sNum=sHeight-sMainHeight;
		if( sTop>=sNum && window.pnum <= window.ptotal){//alert(pnum);
			// $('.module-comment').append('<div>我是加载的内容</div>');
			getCommentList(uniKey, domain, jsonParam, pnum, psize);
		}
	}); 
}

function initPostMask(obj) {
	if($(obj).attr('data') == 'top'){
		var url = window.wgPhpServer + '/skins/MySkin/mobile/op/wapcomment.php?wgTitle='+wgTitle;
		location.href = url;
		return;
	}
    if (!window.joymeIsLogin) {
		loginDiv();
    } else {
		var url = window.wgPhpServer + '/skins/MySkin/mobile/op/wapcomment.php?wgTitle='+wgTitle;
		location.href = url;
    }
}

// 登录，退出
function inOut(obj){
	var userinout = $(obj).html();
	if (userinout=='登录' || !window.joymeIsLogin ) {
		loginDiv();
		// $(obj).html('退出登录');
    }else{
		clearInterval(timer);
		var msg = '<div class="wp_comment_tips">确定要退出吗~</div><div class="wp_comment_btn"><span class="wp_cancel">取消</span><span class="wp_confirm">确定</span></div>';
		var button = '';
		newObj = $(msg);
		newObj.find('span').click(function(){
			button = $(this).text();
			$('.wp_comment_alert').removeClass('active');
			if (button == '确定') {
				var url = window.joymeapi.auth+'auth/logout?reurl='+encodeURIComponent(document.location.href);
				location.href = url;
			}
		});
		$('.wp_comment_alert').html(newObj);
		$('.wp_comment_alert').addClass('active');
	}
}

$.fn.AutoHeight = function (options) {
    var defaults = {
        maxHeight: null,
        minHeight: $(this).height()
    };
    var opts = (typeof (options) === 'object') ? $.extend({}, defaults, options) : {};
    this.each(function () {
        $(this).bind("paste cut keydown keyup focus blur", function () {
            var height, style = this.style;
            this.style.height = opts.minHeight + 'px';
            if (this.scrollHeight > opts.minHeight) {
                if (opts.maxHeight && this.scrollHeight > opts.maxHeight) {
                    height = opts.maxHeight;
                    style.overflowY = 'scroll';
                } else {
                    if ('\v' == 'v') {
                        height = this.scrollHeight - 2;
                    } else {
                        height = this.scrollHeight;
                    }
                    style.overflowY = 'hidden';
                }
                style.height = height + 'px';
            }
        });
    });
    return this;
};
