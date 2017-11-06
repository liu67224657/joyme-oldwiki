/* 头图轮播 */
function checkTopLoop(){
    if ($('#pic-loop .swiper-slide').length > 2){
        var mySwiper = new Swiper('#pic-loop',{
            loop: true,
            pagination: '.pagination',
            paginationClickable: false,
            mode: 'horizontal',  //水平
            cssWidthAndHeight: true
        });
        setInterval(function(){mySwiper.swipeNext()}, 3000);
    }
}
//首页样式初始化
function indStyle(){
	$('.pic-loop-box').css({
		'height':'114px',
		})
	$('#pic-loop img').css({
		'height':'auto',
		'max-width':'640px',
		'height':'114px',
		});
}
//判断当前页面url
function getHref(){
	if((location.href).indexOf("/op/%E6%89%8B%E6%9C%BA%E7%89%88%E9%A6%96%E9%A1%B5"||"/op/手机版首页")!=-1){
		$('#firstHeading').hide();
		$('#content').css('padding','0');
		$('#mw-content-text').css('padding','0');
	}else{
		$('#firstHeading').show();
		$('#mw-content-text').css('padding','0 15px');
		$('#bodyContent').css('padding','0 0 70px');
		
	}
}
//初始化图片+表格
function createDiv() {
	var img = new Image();
	img.src =$('img').attr("src") ;
	var imgW = img.width;
	var imgH = img.height;
	$('img').css({
		'width': '100%',
		//'max-width':imgW,
		'height':'auto'
	})
	$('table.wikitable').wrap("<div class='wpm-tag-table'></div>");
	$('table.box img').css({
		'width':'auto',
		'min-width':'50px',
		'height':'50px'
	})
}

/* 移动目录 */
function moveMenu(){
	if ($('#toc').length){
		var c = $('#toc>ul').clone();
		$('.right-swap-con').append(c);
		$('#toc').remove();
	} else {
		$('#right-swap,.a_menu').hide();
	}
}
	/*获取屏幕高度*/
	var rw=$('#right-swap');
	var wh=$(window).height();
	function getWindowHeight(){
		rw.height(wh);
	}
	/*侧边栏*/
function asideMenu(){
	var a_btn=$('.a_menu');
	var a_close=$('.a_close');
	var a_bg=$('.right-swap-bg');
	a_btn.click(function(ev){
		ev.stopPropagation();
		ev.preventDefault();
		var estimate=true;
		if(estimate){
			estimate=false;
			rw.css('width','100%');
			$('.right-swap-bg').show();
			$('.right-swap-con').width('80%');
			$('#content').css({
				'height':wh,
				'overflow':'hidden'
			});
		}else{
			estimate=true;
		}
	})
	a_close.click(close);
	a_bg.click(close);
	$('.right-swap-con ul li a').click(function(){
		rw.css('width','0%');
		$('.right-swap-bg').hide();
		$('.right-swap-con').width('0');
		$('#content').css({
			'height':'auto',
			'overflow':'visible'
		})
	});
	function close(ev){
		ev.stopPropagation();
		ev.preventDefault();
		rw.css('width','0%');
		$('.right-swap-bg').hide();
		$('.right-swap-con').width('0');
		$('#content').css({
			'height':'auto',
			'overflow':'visible'
		})
	}
}
//返回顶部
 function getReturn() {
	$(window).scroll(function(){
		if ($(window).scrollTop()>50){
			$("#back-to-top").show();
		}
		else
		{
			$("#back-to-top").hide();
		}
	});
	document.getElementById('back-to-top').addEventListener('touchstart',function(ev){
		ev.stopPropagation();
		ev.preventDefault();
		getTop();
		},false);
	function getTop(){
		$('body,html').animate({scrollTop:0},500);
		return false;
	}
}
//图片查看器
function imgShow(){
	$('.image').each(function(i,v){
		$(v).find('img').attr('index',i);
		$('#ImgShow .ImgShow-box').append('<div class="swiper-slide">'+$(v).html()+'</div>');		
	});
	var mySwiper2 = new Swiper('#ImgShow',{
		loop: true,
		paginationClickable: false,
		mode: 'horizontal',  //水平
		cssWidthAndHeight: true,
		initialSlide:0,
	});
 	/* 图片展示翻页 */
	document.getElementById('l-btn').addEventListener('touchstart', function(ev){
		ev.stopPropagation();
		ev.preventDefault();
		mySwiper2.swipePrev();
	}, false);

	/* 图片展示翻页 */
	document.getElementById('r-btn').addEventListener('touchstart', function(ev){
		ev.stopPropagation();
		ev.preventDefault();
		mySwiper2.swipeNext();
	}, false);
	
	/*获取屏幕宽高-改变图片显示居中*/
	function getWH(){
		var pm_w=$(window).width();
		var pm_h=$(window).height();
		$('#ImgShow,.ImgShow-box div').height(pm_h);
	}
	/*点击查看*/
	function imgbtn(){
		$('.image').click(function(e){
			
			window.topy = $(document).scrollTop();
			
			var index = $(this).find('img').attr('index');
			
			mySwiper2.swipeTo(index,0,true);
			$('#content').hide();
			$('#ImgWrap').css({
				'visibility':'inherit',
				'overflow':'visible',
				});
			$('#ImgShow').show();
			getWH();
			stopPropagation(e);
		});
		$('#returnPrev').click(function(){
			$('#ImgWrap').css({
				'visibility':'hidden',
				'overflow':'hidden',
				'height':'0'
				});
			$('#ImgShow').hide();
			$('#content').show();
			$('body,html').animate({scrollTop:window.topy},0);
		})
	}
	imgbtn();
	getWH();
	$(window).resize(function(){
	  getWH();
	});
}
function stopPropagation(e) {  
    e = e || window.event;  
    if(e.stopPropagation) { //W3C阻止冒泡方法  
        e.stopPropagation();  
    } else {  
        e.cancelBubble = true; //IE阻止冒泡方法  
    }  
    e.preventDefault();
}  
//调用
moveMenu();
checkTopLoop();
asideMenu();
getWindowHeight();
getReturn();
createDiv();
getHref();
indStyle();
$(window).resize(function() {
	getWindowHeight();
});

$(function(){
	imgShow();
}) 

