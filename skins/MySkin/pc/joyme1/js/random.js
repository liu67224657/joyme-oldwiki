$(function(){
		var random = {
			init : function(opt){
				var con = opt.con;
				var container = con.find("div").eq(0);
				this.speed = opt.startSpeed || 50;
				this.prevSpeed = opt.startSpeed || 50;
				this.nextSpeed = opt.endSpeed || 200;
				var selBtn = opt.selBtn;
				this.bind({
					con : con,
					selBtn : selBtn
				});
				this.htmls = container.html();
				this.callBack = opt.callBack || function(){};
			},
			ifchoise : false,
			idx : 0,
			ifCli : false,
			bind : function(opt){
				var con = opt.con;
				var container = con.find("div").eq(0);
				var btn = opt.selBtn;
				var _this = this;
				btn.on('click',function(){
					var str = $(this).text();
					if(!_this.ifCli){
						if(str == '立即测试'){
							_this.move(container);
							$(this).text('查看结果');
						}else if(str == '再次测试'){
							container.empty().html(_this.htmls);
							con.find("ul li").hide();
							_this.move(container);
							$(this).text('查看结果');
						}else if(str == '查看结果'){
							_this.speed = _this.nextSpeed;
							_this.ifCli = true;
							var numI = 0;
							var timer = setInterval(function(){
								_this.speed += 180;
								numI += 1;
								if(numI == 7){
									_this.ifchoise = true;
									_this.ifCli = false;
									clearInterval(timer);
									_this.speed = _this.prevSpeed;
									$(btn).text('再次测试');
								}
							},500);
						}
					}
				});
			},
			move : function(container){
				var _this = this;
					var child = container.children();
					this.idx += 1;
					var len = child.length;
					if(this.idx >= len){
						this.idx = 0;
					}
					child.eq(1).addClass('random-img').animate({
						left : 0
					},this.speed,'swing',function(){
						child.eq(0).removeClass('random-img').css({left : '100%'}).appendTo(container);
						if(!_this.ifchoise){
							_this.move(container);
						}else{
							_this.callBack(_this.idx);
							_this.ifchoise = false;
							_this.idx = 0;
							return;
						}
					});
			}
		};

		random.init({
				con :$('#random-box'),
				selBtn : $('#random-btn'),
				// startSpeed : ,//选填
				// endSpeed : ,//选填
				callBack : function(i){//选填
					$(".random-result").find("li").eq(i).show();
				}
			});
	})