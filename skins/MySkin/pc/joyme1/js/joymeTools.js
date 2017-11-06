// JavaScript Document
var module=(function(mod){
	mod.mouseover='mouseover';
	mod.mouseout='mouseout';
	mod.onclick='click';
	mod.int=function(){
		module.headNav();
		module.moreMove({
			headmore:'#head-more',//按钮
			findType:'span',//节点
			selClass:'selected',//添加的class
			headmenu:'.head-menu'
			});
		module.moreMove({
			headmore:'#head-contributebox',//按钮
			findType:'span',//节点
			selClass:'selected',//添加的class
			headmenu:'.head-contributemenu'
			});
		module.getTop();
		module.resize();
		//屏幕改变时执行
		$(window).resize(function(){
			module.resize();
		});
	},
	//主导航
	mod.headNav=function(){
		$('.headnav h3').each(function(idx){
    		$(this).on(module.mouseover,function(){
				$(this).parent().siblings().removeClass('action');
				$(this).parent().addClass('action');
			})
        });
		$('.tagmenu li').each(function(){
			if($(this).find('ul').length==0){
				}else{
				$(this).addClass('sel');
				$(this).on(module.mouseover,function(){
					$(this).find('ul').show().parent('li').siblings('li').find('ul').hide();
			  });
			  $(this).on(module.mouseout,function(){
				$('.submenu').hide();
			  });
		  };
			
        });
	},
	//更多
	mod.moreMove=function(config){
			$(config.headmore).on(module.mouseover,function(){
				$(this).find(config.findType).addClass(config.selClass);
				$(config.headmenu).show();
			});
			$(config.headmore).on(module.mouseout,function(){
				$(this).find(config.findType).removeClass();
				$(config.headmenu).hide();
			})
		}
	//主体宽度
	mod.resize=function(){
		var mian=$('#main');
		var screenWidth=$(window).width();
		if(screenWidth<=1280){
			mian.addClass('w960');
		}else{
			mian.removeClass('w960').addClass('wauto');
		}
	}
	//返回顶部
	mod.getTop=function(){
		var getTop=$('#getTop');
		$(window).scroll(function(){
			var wTop=$(window).scrollTop();
			if(wTop>=250){
				getTop.show();
			}else{
				getTop.hide();
			}	
		});
		getTop.on(module.onclick,function(){
			$('body,html').animate({scrollTop:0},500);
		});
	}
	return mod;
	
})(window.module || {});
//调用
module.int();


