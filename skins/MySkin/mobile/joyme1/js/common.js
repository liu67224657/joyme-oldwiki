
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
				'width': '100%',
				'height':'100%',
				'position':'fixed',
				'top':0,
				'left':0,
				'z-index':99
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

$(function(){
	imgShow();
}) 

