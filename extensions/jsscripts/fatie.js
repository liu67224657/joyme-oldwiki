var wikiThread = {
	"title"		: '',
	"wordNum"	: 30, // 限制标题长度30个字
	"ns"		: '',
	
	"init" : function (action, ns){
		var isLoginIn = isLogin();
		if(isLoginIn === false){
			loginDiv();
			return false;
		}
		$("#mw-editform-cancel").attr('href', 'http://'+window.location.host+'/'+window.wgWikiname+'/?title=特殊:Wiki讨论区');
		
		var _this = wikiThread;
		_this.ns = ns=='THREAD' ? 'THREAD:' : '';
		_this.addInput();
		_this.formCheck();
	},
	
	"addInput" : function(){
		var _this = wikiThread;
		$("#firstHeading, #p-cactions, .mw-newarticletext.plainlinks").hide();
		var obj = $('<div>标题：<input type="text" name="title" id="title" autocomplete="off"/><span id="word_number"></span></div>');
		$("#firstHeading").before(obj);
		obj.find('#title').focus();
		obj.find('#title').keyup(function(){
			_this.title = $.trim($(this).val());
			var postUrl = window.wgPhpServer+"/index.php?title="+_this.ns+encodeURIComponent(_this.title)+"&action=submit";
			$("#editform").attr('action', postUrl);

			if(_this.wordNum >= _this.title.length){
				$("#word_number").html("还可以输入"+(_this.wordNum-_this.title.length)+"字");
			}else{
				$("#word_number").html("你已超过"+(_this.title.length-_this.wordNum)+"字");
			}
		});
		
	},
	
	"formCheck" : function(){
		var _this = wikiThread;
		$("#editform").submit(function(){
			if(_this.title == '' || _this.title.length>_this.wordNum){
				$("#title").focus();
				alert('标题长度不符合要求（不能为空不能多于'+_this.wordNum+'个字）');
				return false;
			}else if(!wikiThread.checkRepeat()){
				return false;
			}else if(!wikiThread.specialCharacter()){
				return false;
			}else{
				if(window.localStorage){
					var time = new Date().getTime();
					window.localStorage.setItem('uid', getCookie('jmuc_u'));
					window.localStorage.setItem('postTime', time);
				}
			}
		});
	},
	
	'checkRepeat' : function(){

		var _this = wikiThread;
		var time = new Date().getTime();
		if(window.localStorage){
			var uid = window.localStorage.getItem('uid');
			var postTime = window.localStorage.getItem('postTime');
		}
		var titleRepeat = false;
		$.ajax({
			type: "POST",
			url: '/'+window.wgWikiname+'/api.php?action=query&prop=info&format=json',
			data: {'titles':_this.ns+_this.title},
			async: false,
			success: function(resData){
				if(resData && resData.query && resData.query.pages){
					var data = resData.query.pages;
					for(var i in data){
						if(i != -1){
							titleRepeat = true;
						}
					}
				}
			}
		});
		if(titleRepeat){
			alert('标题重复');
			return false;
		}else if(window.uid == uid && parseInt(postTime)+60000 > time ){
			alert('1分钟内不能连续发帖');
			return false;
		}else{
			return true;
		}
	},
	
	"specialCharacter" : function(){
		var _this = wikiThread;
		var reg = /[\s\#\~\`\$\%\^\&\*\,\/\;\:\'\"\<\>\?\\]+/;
		var res = reg.test(_this.title);
		if(res){
			alert('不能含有空格和[#~`$%^&*,/;:\'"<>?]特殊字符');
			return false;
		}
		return true;
	}
}
