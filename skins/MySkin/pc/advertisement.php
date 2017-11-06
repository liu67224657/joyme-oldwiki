<?php
    global $wgWikiname;
    if(($wgWikiname=='pocketmon'||$wgWikiname=='cq')
    ){
        echo '
<style>        
    .wiki-index-gg1{ width: 100%; height: 50px;position:relative;}
    .wiki-index-gg1 .wiki-close-btn-gg1{ width: 18px; height: 18px; display: block; background: url(http://static.joyme.com/pc/wiki/ggw/images/close-gg-btn.jpg) no-repeat;
    position: absolute; right: 0px; top: 0px; cursor: pointer;}
    .wiki-index-gg2{ width: 140px; height: 240px; position: fixed; left: 0px; top: 352px;z-index: 1001;}
    .wiki-index-gg2 .wiki-close-btn-gg2{width: 18px; height: 18px; display: block; background: url(http://static.joyme.com/pc/wiki/ggw/images/close-gg-btn.jpg) no-repeat;
    position: absolute; right: 0px; top: 0px; cursor: pointer;}
    .wiki-index-gg1 a{ width：100%; height:50px;display:block;}
    .wiki-index-gg2 a{width: 140px; height: 240px; display:block;}
</style>

<script type="text/javascript" src="http://joyme.adsame.com/s?z=joyme&c=70"></script>
<script type="text/javascript" src="http://joyme.adsame.com/s?z=joyme&c=71"></script>

<script type="text/javascript">
    //广告位关闭按钮js
    $(document).ready(function (){
        $(".wiki-close-btn-gg1").click(function () {
            $(".wiki-index-gg1").hide();
        });
        $(".wiki-close-btn-gg2").click(function () {
            $(".wiki-index-gg2").hide();
        })

    });
    //广告位关闭按钮js 结束
</script>';
    }
?>