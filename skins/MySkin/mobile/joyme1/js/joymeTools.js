// JavaScript Document
var module=(function(mod){
	mod.onclick='touchstart';
	mod.int=function(){
		module.SliderBtn();
		module.navSlider();
		module.checkCatalog();
		module.tableWrap();
	},
	//导航和搜索
	mod.navSlider=function(){
		var navBtn=$('.navBtn');
		var sBtn=$('.searchBtn');
		var markBox=$('<div>').addClass('markBox');
		//点击导航按钮；
		navBtn.on(module.onclick,function(){
			$('#quickbar').show();
			$('#main').append(markBox);
		});
		//点击h3
		$('.portlet').on(module.onclick,function(e){
			if($(this).children('ul').length){
				$(this).children('h3').hide();
			    $(this).children('ul.tagmenu').show();
			    $(this).siblings().hide();
			}else{
				$('#quickbar').hide();
			}
			
		});
		$('.portlet a').on(module.onclick,function(e){
			e.stopPropagation();
		});
		//点击二级出三级
		$('.tagmenu li').on(module.onclick,function(e){
			if($(this).children('ul').length){
				$(this).children('a').hide();
			    $(this).children('ul.submenu').show();
			    $(this).siblings().hide();
			}
		});
		//点击返回一级
		$('.tagmenu li.tagBack').on(module.onclick,function(ev){
			ev.preventDefault();
			ev.stopPropagation();
			$(this).parent('ul.tagmenu').hide();
			$(this).parent().prev().show();
			$(this).parents('.portlet').siblings().show();
		});
		//点击返回二级
		$('.submenu li.subBack').on(module.onclick,function(ev){
			ev.preventDefault();
			ev.stopPropagation();
			$(this).parent('ul.submenu').hide();
			$(this).parent().prev().show();
			$(this).parents('.tagmenu').children('li').show();
		});
		//点击搜索按钮
		sBtn.on(module.onclick,function(e){
			e.preventDefault();
			if($('#quickbar').css('display')==='block'){
				$('#quickbar').hide();
			}
			$('#p-search').show();
			$('#main').append(markBox);
		});
		$('.mw-searchInput').focus(function(e){
           e.preventDefault();
           e.stopPropagation();
		});
		//点击遮罩
		$('body').on(module.onclick,'.markBox',function(e){
			e.preventDefault();
			$(this).remove();
			$('#quickbar,#p-search').hide();
		});
	},

	//侧边栏
	mod.SliderBtn=function(){
		var slidB=$('.sideNav');
		var markBox=$('<div>').addClass('markBox zIndex');
		slidB.on(module.onclick,function(e){
			e.preventDefault();
			$('#toc,.toc').show();
			$('body').append(markBox)
			$('.toctoggle').html('');
			$('.toctoggle,.markBox').on(module.onclick,function(ev){
				ev.preventDefault();
				setTimeout(function(){
					$('#toc,.toc').hide();
				    markBox.remove();
				},1)
			})
		})
	},
	//检测目录
	mod.checkCatalog=function(){
		var catalog=$('#toc');
		if(catalog.length){
			$('.sideNav').show();
		}else{
			$('.sideNav').hide();
		}
	},
	//在表格外面加一个盒子
	mod.tableWrap=function(){
		$('table.wikitable').wrap("<div class='wpm-tag-table'></div>");
	}
	return mod;
	
})(window.module || {});
//调用
module.int();


