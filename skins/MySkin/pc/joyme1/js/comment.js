var phpapi='http://'+window.wgWikiname+'.joyme.'+window.wgWikiCom;
document.write(unescape("%3Cscript src='"+phpapi+"/extensions/jsscripts/commenterror.js' type='text/javascript'%3E%3C/script%3E"));
$(document).ready(function () {
	if(window.articleId==0 || $("#nocommentwiki").length>0 || window.articleId==1){
		$(".wiki_comment_box").remove();
	}
	if($(".wiki_comment_box").length < 1){
		return false;
	}

    initPostMask();
	
	var domain = 6;
	var uri = document.location.href;
	var title = mw.config.get('wgTitle');
    var uniKey = window.wgWikiname+'|'+title;
	
	window.mainPageid = 1;
	window.replyPageid = 1;
	
    var jsonParam = {
        title: title,
        pic: "",
        description: "",
        uri: uri
    }

    getCommentList(uniKey, domain, jsonParam);
	
	$("#textarea_body, .discuss_text .focus").focus(function(){
		$('#reply_error').html('');
		$(".transmit span").html('');
		$(".submitbtn span").html('评论');
	});

    $('#comment_select>a').click(function () {
        var label = $(this).html().replace('<i>√</i>', '').replace('<I>√</I>', '');
        var currentLael = $('#comment_label').html();
        if (label == currentLael) {
            return;
        }

        $('#comment_select>a').removeClass('current');
        $(this).addClass('current');
        $('#comment_label').html(label);

        if ($(this).hasClass('hotest')) {
            getHotCommentList(contentid)
        } else if ($(this).hasClass('lastest')) {
            getCommentList(contentid, 'desc');
        } else if ($(this).hasClass('oldest')) {
            getCommentList(contentid, 'asc');
        }
    });

    //发表评论
    $('#comment_submit').click(function () {
        if (!window.joymeIsLogin) {
            alert('请先保存您的内容，登录之后再回来~');
            return;
        }

        var text = $.trim($('#textarea_body').val());
        if (text == null || text.length == 0 || text == '我来说两句…') {
            $('#reply_error').html('评论内容不能为空');
            return false;
        }
        if (text.length > 300) {
            $('#reply_error').html('评论内容长度不能超过300字符!');
            return false;
        }
        var body = {
            text: text,
            pic: ""
        }
        postComment(uniKey, domain, body, 0, 0);
    });

    //点赞
    $(document).on('click', 'a[id^=agreelink_], a[name=agree_num]', function () {
        if (!window.joymeIsLogin) {
            alert('请先保存您的内容，登录之后再回来~');
            return;
        }

        var rid = $(this).attr('data-commentid');
        agreeComment(uniKey, domain, rid);
    });

    //点赞
    // $(document).on('click', 'a[name=agree_num]', function () {
        // if (!window.joymeIsLogin) {
            // alert('请先保存您的内容，登录之后再回来~');
            // return;
        // }

        // var replyid = $(this).attr('data-commentid');
        // agreeComment(uniKey, domain, replyid);
    // });

    //回复遮罩
    $(document).on('click', 'a[name=togglechildrenreply_area]', function () {
        if ($(this).hasClass('putaway')) {
            $(this).parent().next().fadeOut();
            var replyNum = parseInt($(this).attr('data-replynum'));
            var html = '回复';
            if (replyNum > 0) {
                html += '(' + replyNum + ')'
            }
            $(this).html(html).removeClass();
        } else {
            $(this).parent().next().fadeIn();
            $(this).html('收起回复').attr('class', 'putaway');
        }
    });

    //回复
    $(document).on('click', 'a[name=replypost_mask]', function () {
        $(this).hide();
        var obj = $(this).next();
        obj.show();
        var textAreaObj = obj.find('textarea[id^=textarea_recomment_body_]');
        var body = textAreaObj.val();
        textAreaObj.val("").focus().val(body);
        textAreaObj.AutoHeight({maxHeight: 200});
    });

    $(document).on('click', 'a[name=link_recommentparent_mask]', function () {
        var oid = $(this).attr('data-oid');
        var pid = $(this).attr('data-pid');
        var nickname = $(this).attr('data-nick');
        var postCommentArea = $(this).parents('div[id^="children_reply_list"]').next('div');
        var replyMaskLink = postCommentArea.find('a[name=replypost_mask]');
        var submitReComment = postCommentArea.find('a[name=submit_recomment]');
        submitReComment.attr("data-pid", pid);
        submitReComment.attr("data-nick", nickname);
		postCommentArea.find('#textarea_recomment_body_' + oid).val('@' + nickname + ':');
        replyMaskLink.click();
    });

    //回复
    $(document).on('click', 'a[name=submit_recomment]', function () {
        if (!window.joymeIsLogin) {
            alert('请先保存您的内容，登录之后再回来~');
            return;
        }

        var oid = $(this).attr('data-oid');
        // var text = $.trim($('#textarea_recomment_body_' + oid).val());
		var text = $(this).parent().parent().parent().find('textarea').val();
		var postrecommentareaObj = $(this).parents('div[id^="post_recomment_area_"]');
        var submitReComment = postrecommentareaObj.find('a[name=submit_recomment]');
        if (submitReComment.length > 0) {
            var pname = submitReComment.attr('data-nick');
            text = text.replace('@' + pname + ":", '');
        }
		text = $.trim(text);
		$('span[id ^= "post_callback_msg_"]').remove();
        if (text == null || text=='' || text == '我来说两句…') {
            postrecommentareaObj.find('.submitbtn').before('<span id="post_callback_msg_" style="color: #f00; padding-top: 10px;margin-top:10px;padding-left: 10px;">评论内容不能为空</span>');
            return false;
        }
        if (text.length > 300) {
            postrecommentareaObj.find('.submitbtn').before('<span id="post_callback_msg_" style="color: #f00; padding-top: 10px;margin-top:10px;padding-left: 10px;">评论内容长度不能超过300字符!</span>');
            return false;
        }
        var body = {
            text: text,
            pic: ""
        }
        var pid = $(this).attr('data-pid');
        if (pid == null || pid.length <= 0) {
            pid = 0;
        }
        postSubComment(uniKey, domain, body, oid, pid, $(this));
    });

    //删除
    $(document).on('click', 'a[name=remove_comment]', function () {
        if (!window.joymeIsLogin) {
            alert('请先保存您的内容，登录之后再回来~');
            return;
        }

        var rid = $(this).attr('data-rid');
        var oid = $(this).attr('data-oid');
        if (oid == null || oid.length <= 0) {
            oid = 0;
        }
        if (confirm('确定要删除吗？')) {
            removeComment(uniKey, domain, rid, oid);
        }
    });

    $('#textarea_body').bind('focusin',
        function () {
            var val = $(this).val();
            if (val == '我来说两句…') {
                $(this).val('').css('color', '#333');
            }
        }).bind('focusout', function () {
            var val = $(this).val();
            if (val == null || val == '') {
                $(this).val('我来说两句…').css('color', '#ccc');
            }
        });
});

function doCommentNum(op, cnum){
	var arr = $('#totalcomments').html().match(/\d+/g);
	cnum = cnum || 1;
	if(op == '+'){
		var num = parseInt(arr[0]) + cnum;
	}else{
		var num = parseInt(arr[0]) - cnum;
		num = num < 0 ? 0 : num;
	}
	$('#reply_num a span').html(num + '条评论');
	$('#totalcomments').html('评论('+num+')');
}

function commenterrorfn(resMsg){
	if(commenterror[resMsg.rs] != undefined){
		var StopWords = resMsg.rs=='-40017' ? (':'+resMsg.result[0]) : '';
		$('#reply_error').html(commenterror[resMsg.rs]+StopWords);
	}else{
		$('#reply_error').html('系统错误，请联系管理员解决');
	}
}

// 获取楼中楼数据
function getReCommentData(unikey, domain, oid, pnum){
	$.ajax({
		url: window.joymeapi.api+"jsoncomment/reply/sublist",
		type: "post",
		async: false,
		data: {unikey:unikey, domain:domain, oid:oid, pnum:pnum, psize:10},
		dataType: "jsonp",
		jsonpCallback: "sublistcallback",
		success: function (req) {
			var resMsg = req[0];
			if(resMsg.rs == 1){
				if(resMsg.result != null){
					var reCommentHtml = '';
					for (var i = 0; i < resMsg.result.rows.length; i++) {
						reCommentHtml += getReCommentHtml(resMsg.result.rows[i]);
					}
					
				}
				rePageListHtml = '<div class="more-comment">'+getPageHtml(resMsg.result.page, oid)+'</div>';
				$('#children_reply_list_all_'+oid+', #children_reply_list_hot_'+oid).html(reCommentHtml+rePageListHtml);
			}else{
				commenterrorfn('获取列表失败');
			}
		},
		error: function () {
			commenterrorfn('getReCommentData程序错误');
		}
	});
}

// 获取主楼数据
function getCommentList(unikey, domain, jsonparam, pnum) {
    window.mainPageid = pnum ? pnum : 1;
	var flag = '';
	if(window.mainPageid == 1){
		flag = 'hot';
	}
    $.ajax({
        url: window.joymeapi.api+"jsoncomment/reply/query",
        type: "post",
        async: false,
        data: {unikey:unikey, domain:domain, jsonparam:JSON.stringify(jsonparam), pnum:window.mainPageid, psize:10, flag:flag},
        dataType: "jsonp",
        jsonpCallback: "querycallback",
        success: function (req) {
            var resMsg = req[0];
            if (resMsg.rs == '1') {
                var result = resMsg.result;
                if (result == null || result.mainreplys==null || result.mainreplys.rows==null || result.mainreplys.rows.length < 1) {
					$('.comment_all, #hot_title').hide();
                    $('#comment_list_area').html('<p style="height:50px; line-height:50px; text-align:center">目前没有评论，欢迎你发表评论</p>');
                    return;
                }
				// 热门评论
				if(result.hotlist == null || result.hotlist.length < 1){
					$('#comment_hot_list_area, #hot_title').hide();
				}else{
					var hot_html = '';
                    for (var i = 0; i < result.hotlist.length; i++) {
                        hot_html += getCommentListCallBack(result.hotlist[i], unikey, domain, 'hot');
                    }
					$('#comment_hot_list_area, #hot_title').show();
					$('#comment_hot_list_area').html(hot_html);
				}

                var replyNum = '<a href="'+window.joymeapi.www+'comment/reply/page?unikey=' + unikey + '&domain=' + domain + '&pnum=1&psize=10"><span>' + result.comment_sum + '条评论</span></a>'
                $('#reply_num').html(replyNum);
				$('#totalcomments').html('评论('+result.comment_sum+')');

                if (result.mainreplys == null || result.mainreplys.rows == null || result.mainreplys.rows.length == 0) {
                    if (result.mainreplys.page != null && result.mainreplys.page.maxPage > 1) {
                        $('#comment_list_area').html('<p style="height:50px; line-height:50px; text-align:center">当前页的评论已经被删除~</p><div class="more-comment"><a href="'+window.joymeapi.www+'comment/reply/page?unikey=' + unikey + '&domain=' + domain + '&pnum=1&psize=10">更多评论&gt;&gt;</a></div>');
//                        $('.comment-sort').show();
                    } else {
                        $('#comment_list_area').html('<p style="height:50px; line-height:50px; text-align:center">目前没有评论，欢迎你发表评论</p>');
                    }

                } else {
                    var html = '';
                    for (var i = 0; i < result.mainreplys.rows.length; i++) {
                        html += getCommentListCallBack(result.mainreplys.rows[i], unikey, domain, 'all');
                    }

                    if(result.mainreplys != null && result.mainreplys.page != null && result.mainreplys.page.maxPage > 1){
                        var moreLink = '<div class="more-comment">'+getPageHtml(result.mainreplys.page,0)+'</div>';
                        html += moreLink;
                    }
                    $('#comment_list_area').html(html);
//                    $('.comment-sort').show();
                }
            } else {
				commenterrorfn(resMsg);
                return;
            }
        },
        error: function () {
            alert('获取失败，请刷新');
        }
    });
}

function postComment(unikey, domain, body, oid, pid) {
    $.ajax({
        url: window.joymeapi.api+"jsoncomment/reply/post",
        type: "post",
        async: false,
        data: {unikey:unikey, domain:domain, body:JSON.stringify(body), oid:oid, psize:pid},
        dataType: "jsonp",
        jsonpCallback: "postcallback",
        success: function (req) {
            var resMsg = req[0];
            if (resMsg.rs == '-1') {
                alert('请先保存您的内容，登录之后再回来~');
                return;
            } else if (resMsg.rs == '1') {
                var result = resMsg.result;
                if (result == null) {
                    return;
                }
				var oid=result.reply.oid;
                var rid=result.reply.rid;
                if (oid == 0) {
                    var spanHtml = '条评论';
                    // var numHtml = $('#reply_num a span').text();
                    // var numStr = numHtml.replace(spanHtml, '');
					var arr = $('#totalcomments').html().match(/\d+/g);
                    var num = parseInt(arr[0]) + 1;
					num = num < 0 ? 0 : num;
                    $('#reply_num a span').html(num + spanHtml);
					$('#totalcomments').html('评论('+num+')');
                    $('#cont_cmt_list_all_' + rid).remove();
                } else {
                    var numStr = $('#togglechildrenreply_area_all_' + oid).attr('data-replynum');
                    $('#togglechildrenreply_area_all_' + oid).attr('data-replynum', parseInt(numStr) + 1);
                    $('#cont_recmt_list_' + rid).remove();
                }
                var commentHtml = '<div id="cont_cmt_list_all_' + result.reply.rid + '" class="area blogopinion clearfix ">' +
                    '<dl>' +
                    '<dt class="personface">' +
                    '<a title="' + result.user.name + '" name="atLink" href="javascript:void(0);">' +
                    '<img width="58" height="58" class="user" src="' + result.user.icon + '"></a>' +
                    '</dt>' +
                    '<dd class="textcon discuss_building">' +
                    '<a title="' + result.user.name + '" class="author" name="atLink" href="javascript:void(0);">' + result.user.name + '</a>' +
                    '<p>' + result.reply.body.text + '</p>' +
                    '<div class="discuss_bdfoot">' + result.reply.post_date + '&nbsp;' +
                    '<a href="javascript:void(0);" id="agreelink_' + result.reply.rid + '" data-commentid="' + result.reply.rid + '" class="dianzan">赞</a>' +
                    '<span id="agreenum_' + result.reply.rid + '">' +
                    '<a href="javascript:void(0);" name="agree_num" data-commentid="' + result.reply.rid + '"></a>' +
                    '</span><a name="remove_comment" href="javascript:void(0);" data-oid="0" data-rid="' + result.reply.rid + '">删除</a>' +
                    '<a name="togglechildrenreply_area" href="javascript:void(0);" id="togglechildrenreply_area_all_' + result.reply.rid + '" data-replynum="0">回复</a>' +
                    '</div>' +
                    '<div class="discuss_bd_list discuss_border" style="display:none">' +
                    '<div id="children_reply_list_all_' + result.reply.rid + '"></div>' +
                    '<div id="post_recomment_area_' + result.reply.rid + '" class="discuss_reply">' +
                    '<a class="discuss_text01" href="javascript:void(0);" name="replypost_mask">我也说一句</a>' +
                    '<div style="display:none" class="discuss_reply reply_box01">' +
                    '<textarea warp="off" style="font-family:Tahoma, ' + "宋体" + ';" id="textarea_recomment_body_' + result.reply.rid + '" class="discuss_text focus" rows="" cols="" name="content"></textarea>' +
                    '<div class="related clearfix">' +
                    '<div class="transmit clearfix">' +
                    '<a class="submitbtn fr" name="submit_recomment" data-oid="' + result.reply.rid + '">' +
                    '<span name="span_pinglun">评 论</span></a></div></div></div></div></div></dd></dl></div>';

                if ($('#comment_list_area div').length > 0) {
                    $('#comment_list_area div:first').before(commentHtml);
                } else {
					$('.comment_all').show();
                    $('#comment_list_area').html(commentHtml);
                }
				$("#textarea_body").val('我来说两句…').css('color', '#ccc');
				
				// 调用评论数上报
				setCommentNum(result.user.name, result.reply.post_time, 'add');
            } else {
                commenterrorfn(resMsg);
                return;
            }
        },
        error: function () {
            alert('获取失败，请刷新');
        }
    });
	$('span[name="span_pinglun"]').html('评论');
}

function postSubComment(unikey, domain, body, oid, pid, reCommentDom) {
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
                alert('请先保存您的内容，登录之后再回来~');
                return;
            } else if (resMsg.rs == '1') {
                var result = resMsg.result;
                if (result == null) {
                    return;
                }
                var html = getReCommentHtml(result);
                $('#children_reply_list_all_'+oid+', #children_reply_list_hot_'+oid).find('p').remove();
                var moreDom = $('#children_reply_list_all_'+oid+', #children_reply_list_hot_'+oid);

				$('#children_reply_list_all_'+oid).append(html);
				$('#children_reply_list_hot_'+oid).append(html.replace('cont_recmt_list_all_', 'cont_recmt_list_hot_'));
				$('textarea').val('');
                var num = parseInt($('#togglechildrenreply_area_all_' + oid).attr('data-replynum'));
                $('#togglechildrenreply_area_all_' + oid+', #togglechildrenreply_area_hot_' + oid).attr('data-replynum', (num + 1));
				$('#togglechildrenreply_area_all_' + oid+', #togglechildrenreply_area_hot_' + oid).html('回复('+(num + 1)+')');
                $('#textarea_recomment_body_' + oid).val("");
				$('span[id ^= "post_callback_msg_"]').remove();
				// 调用评论数上报
				setCommentNum(result.user.name, result.reply.post_time, 'add');
				doCommentNum('+', 1);
				reCommentDom.removeAttr('data-pid');
            } else {
				commenterrorfn(resMsg);
                $('#post_callback_msg_' + oid).remove();
                reCommentDom.before('<span style="color: #f00; padding-top: 10px;margin-top:10px;padding-left: 10px;" id="post_callback_msg_' + oid + '">' + commenterror[resMsg.rs] + '</span>');
                return;
            }
        },
        error: function () {
            alert('获取失败，请刷新');
        }
    });
}

function agreeComment(unikey, domain, rid) {
    $.ajax({
        url: window.joymeapi.api+"jsoncomment/reply/agree",
        type: "post",
        async: false,
        data: {unikey:unikey, domain:domain, rid:rid},
        dataType: "jsonp",
        jsonpCallback: "agreecallback",
        success: function (req) {
            var resMsg = req[0];
            if (resMsg.rs == '-1') {
                alert('请先保存您的内容，登录之后再回来~');
                return;
            } else if (resMsg.rs == '1') {
                var numObj = $('a[name=agree_num][data-commentid=' + rid + ']');
                var objStr = numObj.html();
                var num;
                if (numObj.length == 0 || objStr == null || objStr.length == 0) {
                    num = parseInt(1);
                } else {
                    var num = numObj.html().replace("(", '').replace(')', '');
                    num = parseInt(num);
                    num = num + 1;
                }
                numObj.html('(' + num + ')');
            } else {
				commenterrorfn(resMsg);
                return;
            }
        },
        error: function () {
            alert('获取失败，请刷新');
        }
    });
}

function initPostMask() {
    if (!window.joymeIsLogin) {
        $('#textarea_body').after('<div class="wrapper_unlogin" style="text-align:center; margin:-65px 0 65px">您需要<a id="login_link" href="javascript:loginDiv();">登录</a>后才能评论</div>');
        $('#textarea_body').attr('disabled', 'disabled');
    } else {
        $('#textarea_body').val('我来说两句…').css('color', '#ccc');
    }
}

function removeComment(unikey, domain, rid, oid) {
	var commentnum = 1;
	if(oid == 0){
		commentnum += parseInt($('#togglechildrenreply_area_all_'+rid+'').attr('data-replynum'));
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
                alert('请先保存您的内容，登录之后再回来~');
                return;
            } else if (resMsg.rs == '1') {
				var subcommenttotalnum = 0;
                if (oid == 0) {
					subcommenttotalnum = $('#togglechildrenreply_area_all_'+rid).attr('data-replynum');
					$('#cont_cmt_list_hot_' + rid+',#cont_cmt_list_all_' + rid).remove();
                } else {
                    var numStr = $('#togglechildrenreply_area_all_' + oid).attr('data-replynum');
                    $('#togglechildrenreply_area_all_' + oid+', #togglechildrenreply_area_hot_' + oid).attr('data-replynum', parseInt(numStr) - 1);
					$('#togglechildrenreply_area_all_' + oid+', #togglechildrenreply_area_hot_' + oid).html('回复('+(parseInt(numStr) - 1)+')');
                    $('#cont_recmt_list_all_' + rid+',#cont_recmt_list_hot_' + rid).remove();
                }
				doCommentNum('-', parseInt(subcommenttotalnum)+1);
				// 调用评论数上报
				var latPostUser = resMsg.result ? resMsg.result.user.name : '';
				var latPostTime = resMsg.result ? resMsg.result.reply.post_time : '';
				setCommentNum(latPostUser, latPostTime, 'del', commentnum);
            } else {
				commenterrorfn(resMsg);
                return;
            }
			if($("div [id ^= 'cont_cmt_list_']").length==0){
				$('#hot_title, #comment_hot_list_area, .comment_all').hide();
				$('#comment_list_area').html('<p style="height:50px; line-height:50px; text-align:center">目前没有评论，欢迎你发表评论</p>');
			}
        },
        error: function () {
            alert('获取失败，请刷新');
        }
    });
}


function getCommentListCallBack(commentObj, unikey, domain, type) {
    var reply = commentObj.reply;
    var reReplyArray = null;
    if (commentObj.subreplys != null) {
        reReplyArray = commentObj.subreplys.rows;
    }

    var hasRe = (reReplyArray != null && reReplyArray.length > 0);

    var reCommentListHtml = '<div id="children_reply_list_' + type + '_' + reply.reply.rid + '">';
    if (hasRe) {
        for (var i = 0; i < reReplyArray.length; i++) {
            var reCommentObj = reReplyArray[i];
            reCommentListHtml += getReCommentHtml(reCommentObj, type);
        }
        if (commentObj.subreplys.page != null && commentObj.subreplys.page.maxPage > 1) {
			reCommentListHtml += '<div class="more-comment">'+getPageHtml(commentObj.subreplys.page, reply.reply.rid)+'</div>';
        }

    } else {
        if (commentObj.subreplys != null && commentObj.subreplys.page != null && commentObj.subreplys.page.maxPage > 1) {
            reCommentListHtml += '<p style="text-align:center">当前页的评论已经被删除~</p><div class="more-comment"><a href="'+window.joymeapi.www+'comment/reply/page?unikey=' + uniKey + '&domain=' + domain + '&pnum=1&psize=10">更多回复&gt;&gt;</a></div>';
        }
    }
    reCommentListHtml += '</div>';

    var removeHtml = '';
    if (window.joymeIsLogin && window.joymeuser.uid == reply.user.uid) {
        removeHtml = '<a name="remove_comment" href="javascript:void(0);" data-oid="' + reply.reply.oid + '" data-rid="' + reply.reply.rid + '" >删除</a>'
    }

    var toogleReHtml = '<a name="togglechildrenreply_area" href="javascript:void(0);" id="togglechildrenreply_area_'+type+'_' + reply.reply.rid + '" data-replynum="' + reply.reply.sub_reply_sum + '">回复' + (reply.reply.sub_reply_sum > 0 ? ('(' + reply.reply.sub_reply_sum + ')') : '') + '</a>';

    var postReCommentHtml = '<div id="post_recomment_area_' + reply.reply.rid + '" class="discuss_reply">' +
        ' <a class="discuss_text01" href="javascript:void(0);" name="replypost_mask">我也说一句</a>' +
        '<div style="display:none" class="discuss_reply reply_box01">' +
        '<textarea warp="off" style="font-family:Tahoma, \'宋体\';" id="textarea_recomment_body_' + reply.reply.rid + '" class="discuss_text focus" rows="" cols="" name="content"></textarea>' +
        '<div class="related clearfix">' +
        '<div class="transmit clearfix">' +
        ' <a class="submitbtn fr" name="submit_recomment"  data-oid="' + reply.reply.rid + '" name="childreply_submit"><span name="span_pinglun">评 论</span></a>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>';

    var puserHtml = '';
    if (reply.puser != null && reply.puser.name != null) {
        puserHtml = '@' + reply.puser.name + ":";
    }
    var html = '<div id="cont_cmt_list_'+type+'_' + reply.reply.rid + '" class="area blogopinion clearfix ">' +
        '<dl>' +
        '<dt class="personface">' +
        '<a title="' + reply.user.name + '" name="atLink" href="javascript:void(0);">' +
        '<img width="58" height="58" class="user" src="' + reply.user.icon + '">' +
        '</a>' +
        '</dt>' +
        '<dd class="textcon discuss_building">' +
        '<a title="' + reply.user.name + '" class="author" name="atLink" href="javascript:void(0);">' + reply.user.name + '</a>' +
        '<p>' + puserHtml + reply.reply.body.text + '</p>' +
        '<div class="discuss_bdfoot">' + reply.reply.post_date + '&nbsp;<a href="javascript:void(0);" id="agreelink_' + reply.reply.rid + '" data-commentid="' + reply.reply.rid + '" class="dianzan">赞</a><span id="agreenum_' + reply.reply.rid + '"><a href="javascript:void(0);" name="agree_num" data-commentid="' + reply.reply.rid + '">' + ((reply.reply.agree_sum == null || reply.reply.agree_sum == 0) ? '' : ('(' + reply.reply.agree_sum + ')')) + '</a></span>' + removeHtml + toogleReHtml + '</div>' +
        '<div class="discuss_bd_list discuss_border" style="display:none"> ' +
        reCommentListHtml +
        postReCommentHtml +
        '</div> ' +
        '</dd>' +
        '</dl>' +
        '</div>';
    return html;
}

function getReCommentHtml(reCommentObj, type) {
    var removeHtml = '';
	type = type || 'all';
    if (window.joymeIsLogin && window.joymeuser.uid == reCommentObj.user.uid) {
        removeHtml = '<a name="remove_comment" href="javascript:void(0);" data-rid="' + reCommentObj.reply.rid + '" data-oid="' + reCommentObj.reply.oid + '">删除</a>'
    }

    var puserHtml = '';
    if (reCommentObj.puser != null && reCommentObj.puser.name != null) {
        puserHtml = '@' + reCommentObj.puser.name + ":";
    }

    var reCommentHtml = '<div style="" id="cont_recmt_list_'+type+'_' + reCommentObj.reply.rid + '" class="conmenttx clearfix">' +
        '<div class="conmentface">' +
        '<div class="commenfacecon">' +
        '<a href="javascript:void(0);" title="' + reCommentObj.user.name + '" name="atLink" class="cont_cl_left">' +
        '<img width="33px" height="33px" src="' + reCommentObj.user.icon + '">' +
        '</a>' +
        '</div>' +
        '</div>' +
        '<div class="conmentcon">' +
        '<a title="' + reCommentObj.user.name + '" name="atLink" href="javascript:void(0);">' + reCommentObj.user.name + '</a>' +
        ':' + puserHtml + reCommentObj.reply.body.text + '<div class="commontft clearfix"><span class="reply_time">' + reCommentObj.reply.post_date + '</span>' +
        '<div class="delete">' +
        '<span id="agreenum_' + reCommentObj.reply.rid + '"><a href="javascript:void(0);" id="agreelink_' + reCommentObj.reply.rid + '" data-commentid="' + reCommentObj.reply.rid + '" class="dianzan">赞</a><a href="javascript:void(0);" name="agree_num" data-commentid="' + reCommentObj.reply.rid + '">' + ((reCommentObj.reply.agree_sum == null || reCommentObj.reply.agree_sum == 0) ? '' : ('(' + reCommentObj.reply.agree_sum + ')')) + '</a></span>' +
        removeHtml +
        '<a href="javascript:void(0);"  name="link_recommentparent_mask" data-nick="' + reCommentObj.user.name + '" data-oid="' + reCommentObj.reply.oid + '" data-pid="' + reCommentObj.reply.rid + '">回复</a>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>';
    return reCommentHtml;
}

// 评论上报统计
function setCommentNum(user, time, type, num){
	var pageId = $('#pageId').val();
	var token = $('#mytoken').val();
	if(pageId==0 || token==''){
		return false;
	}
	num = num == undefined ? 1 : num;
	var typeNum = type == 'add' ? 1 : 2; // 1添加 2删除
	$.ajax({
		url: window.joymeapi.joymewiki+'?c=wikiPosts&a=setUpCommentsNum',
		type: "post",
		async: false,
		data:{wikikey:window.wgWikiname, page_id:pageId, token:token, last_comment_user:user, last_comment_time:parseInt(time/1000), type:typeNum, commentnum:num},
		dataType: "jsonp",
		jsonpCallback: "setCommentNumCallback",
		success: function (req) {
			// console.log('req', req);
		},
		error: function () {
			alert('setCommentNum程序错误');
		}
	});
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


// 拼接分页html
function getPageHtml(data, oid){

    var html = '';
    if(data==null || data.maxPage==1){
        return html;
    }

    var start = data.curPage - 4;
    if(start < 1){
        start = 1;
    }

    var end = data.curPage + 5;
    if(start == 1){
        end = 10;
    }
    if(end > data.maxPage){
        end = data.maxPage;
    }

    var arr = [];
    for(var i = start; i <= end; i++){
        var sty = '', pagen = '';
        if(data.curPage == i){
            sty = 'class="cur" ';
        }else{
            pagen = ' data-pagen="'+i+'" onclick="getComment(this)"';
            sty = 'class="page_'+oid+'" ';
        }
        var url = oid==0 ? '#wrapper' : '#tId_'+oid;
        arr.push('<a ' + sty + pagen +' href="'+url+'">'+i+'</a>');//#wrapper
    }

    html = arr.join('');
    if(data.maxPage == 2){
        return html;
    }

    var prev = '<span>&lt;前页</span>';
    var next = '<span>后页&gt;</span>';
    if(data.curPage > 1){
        prev = '<a  class="page_'+ oid +'" href="javascript:void(0);" data-pagen="'+(data.curPage-1)+'" onclick="getComment(this)">&lt;前页</a>';
    }
    if(data.curPage < data.maxPage){
        next = '<a class="page_'+ oid +'" href="javascript:void(0);" data-pagen="'+(data.curPage+1)+'" onclick="getComment(this)">后页&gt;</a>';
    }
    return prev+html+next;
}


//分页的onclick方法
function getComment(obj){
	var cname = $(obj).attr('class');
	var domain = 6;
    var uri = document.location.href;
    var title = mw.config.get('wgTitle');
    var uniKey = window.wgWikiname+'|'+title;
    var jsonParam = {
        title: title,
        pic: "",
        description: "",
        uri: uri
    }
	
	if(cname == 'page_0'){
		window.mainPageid = $(obj).attr('data-pagen');
		getCommentList(uniKey, domain, jsonParam, window.mainPageid);
	}else{
		window.replyPageid = $(obj).attr('data-pagen');
		var tmpArr = cname.split('_');
		var oid = tmpArr[1];
		getReCommentData(uniKey, domain, oid, window.replyPageid);
	}
}
