// JavaScript Document
window.onload=function(){
		var wp=document.getElementById('focus_img');
		var pic=document.getElementById('imgs');
		var oLi=pic.getElementsByTagName('img');
		var nums=document.getElementById('nums');
		var btn=nums.getElementsByTagName('span');
		var iNub=0;
		var times=null;
		for(var j=0;j<btn.length;j++)
		{
			btn[j].index=j;
			btn[j].onclick=show;
		}
		focus_img.onmouseover=function(){
			clearInterval(times);
			}
		focus_img.onmouseout=function(){
			times=setInterval(function(){
			next();
			},2000);
		}
		//tab切换
		function show(){
			 for(var j=0;j<btn.length;j++){
				 btn[j].className='';
				 oLi[j].className='';
				 this.className='sel';
				 oLi[this.index].className='show';
				 iNub=this.index;
			}
		}
		function next(){
			iNub=iNub+1;
			if(iNub>=btn.length){
				iNub=0;
			}
			soll();
		}
		//播放
		function soll(){
			for(var i=0;i<btn.length;i++){
				btn[i].className="";
				oLi[i].className="";
			}
			btn[iNub].className="sel";
			oLi[iNub].className="show";
		}
		times=setInterval(function(){
			next();
			},2000);
		}