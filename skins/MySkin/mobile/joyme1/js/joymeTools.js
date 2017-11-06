// JavaScript Document
var module=(function(mod){
	mod.onclick='touchstart';
	mod.int=function(){
		module.SliderBtn();
		module.navSlider();
		module.checkCatalog();
		module.tableWrap();
	},
	//����������
	mod.navSlider=function(){
		var navBtn=$('.navBtn');
		var sBtn=$('.searchBtn');
		var markBox=$('<div>').addClass('markBox');
		//���������ť��
		navBtn.on(module.onclick,function(){
			$('#quickbar').show();
			$('#main').append(markBox);
		});
		//���h3
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
		//�������������
		$('.tagmenu li').on(module.onclick,function(e){
			if($(this).children('ul').length){
				$(this).children('a').hide();
			    $(this).children('ul.submenu').show();
			    $(this).siblings().hide();
			}
		});
		//�������һ��
		$('.tagmenu li.tagBack').on(module.onclick,function(ev){
			ev.preventDefault();
			ev.stopPropagation();
			$(this).parent('ul.tagmenu').hide();
			$(this).parent().prev().show();
			$(this).parents('.portlet').siblings().show();
		});
		//������ض���
		$('.submenu li.subBack').on(module.onclick,function(ev){
			ev.preventDefault();
			ev.stopPropagation();
			$(this).parent('ul.submenu').hide();
			$(this).parent().prev().show();
			$(this).parents('.tagmenu').children('li').show();
		});
		//���������ť
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
		//�������
		$('body').on(module.onclick,'.markBox',function(e){
			e.preventDefault();
			$(this).remove();
			$('#quickbar,#p-search').hide();
		});
	},

	//�����
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
	//���Ŀ¼
	mod.checkCatalog=function(){
		var catalog=$('#toc');
		if(catalog.length){
			$('.sideNav').show();
		}else{
			$('.sideNav').hide();
		}
	},
	//�ڱ�������һ������
	mod.tableWrap=function(){
		$('table.wikitable').wrap("<div class='wpm-tag-table'></div>");
	}
	return mod;
	
})(window.module || {});
//����
module.int();


