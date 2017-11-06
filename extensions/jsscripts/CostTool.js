;$(function(){
	$("#startLevel, #endLevel").change(function(){
		var select_id = $(this).attr("id");
		if(select_id == "startLevel"){
			var start = parseInt($(this).val());
			var end = parseInt($("#endLevel").val());
		}else{
			var start = parseInt($("#startLevel").val());
			var end = parseInt($(this).val());
		}
		
		if(isNaN(start) || isNaN(end)){
			return false;
		}else if(start>=end){
			alert("前一个进化级数不能大于后者");
			return false;
		}
		
		var count = parseInt($("#source_count").html());
		var c = new Array();
		for(var n=1; n<=count; n++){
			c[n] = new Array();
			for(var i=start; i<end; i++){
				var data_c = $("#level_"+i).attr("data-c"+n);
				
				var arr_c = data_c.split("_");
				
				if(c[n][arr_c[0]]){
					c[n][arr_c[0]] += parseInt(arr_c[1]);
				}else{
					c[n][arr_c[0]] = parseInt(arr_c[1]);
				}
			}
			
			var cc = new Array();
			for (key in c[n]) {
				cc[n] = cc[n] || '';
				cc[n] += $('#source_c'+n+'_'+key).text()+''+c[n][key]+'个  ';
			}
			$("#con_c"+n).html(cc[n]);
			
		}
	});
})