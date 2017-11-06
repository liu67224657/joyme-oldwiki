<?php
/**
 * Description: 视频模块
 * Author: gradydong
 * Date: 2016/9/6
 * Time: 11:12
 * Copyright: Joyme.com
 */
$wgWikiname = substr($_SERVER['HTTP_HOST'], 0, strpos($_SERVER['HTTP_HOST'], '.'));

header('Content-type:text/json; charset=utf-8');

$videos = array();
if ($wgWikiname == 'pvp') {

    $videos = array(
        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀心哥视频快刀手橘右京',
            'image' => 'http://joymepic.joyme.com/wiki/images/pvp/d/dc/%E7%8E%8B%E8%80%85%E8%8D%A3%E8%80%80%E5%BF%83%E5%93%A5%E8%A7%86%E9%A2%91%E5%BF%AB%E5%88%80%E6%89%8B%E6%A9%98%E5%8F%B3%E4%BA%AC-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/pvp/633359.shtml',
            'pubtime' => strtotime("2016/9/2"),
            'playTime' => 2437,
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀职业联赛预告边路篇',
            'image' => 'http://joymepic.joyme.com/wiki/images/pvp/6/6b/%E7%8E%8B%E8%80%85%E8%8D%A3%E8%80%80%E8%81%8C%E4%B8%9A%E8%81%94%E8%B5%9B%E9%A2%84%E5%91%8A%E8%BE%B9%E8%B7%AF%E7%AF%87-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/pvp/633295.shtml',
            'pubtime' => strtotime("2016/9/2"),
            'playTime' => 70,
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '大胡子解说第十三期马可波罗19杀',
            'image' => 'http://joymepic.joyme.com/wiki/images/pvp/a/af/%E5%A4%A7%E8%83%A1%E5%AD%90%E8%A7%A3%E8%AF%B4%E7%AC%AC%E5%8D%81%E4%B8%89%E6%9C%9F%E9%A9%AC%E5%8F%AF%E6%B3%A2%E7%BD%9719%E6%9D%80-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/pvp/633034.shtml',
            'pubtime' => strtotime("2016/8/1"),
            'playTime' => 1380,
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => 'TGA大奖赛TOP10战术走位技能运用酷炫教学',
            'image' => 'http://joymepic.joyme.com/wiki/images/pvp/c/c1/TGA%E5%A4%A7%E5%A5%96%E8%B5%9BTOP10%E6%88%98%E6%9C%AF%E8%B5%B0%E4%BD%8D%E6%8A%80%E8%83%BD%E8%BF%90%E7%94%A8%E9%85%B7%E7%82%AB%E6%95%99%E5%AD%A6-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/pvp/632749.shtml',
            'pubtime' => strtotime("2016/8/31"),
            'playTime' => 274,
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀马赛解说橘右京技能出装',
            'image' => 'http://joymepic.joyme.com/wiki/images/pvp/5/53/%E7%8E%8B%E8%80%85%E8%8D%A3%E8%80%80%E9%A9%AC%E8%B5%9B%E8%A7%A3%E8%AF%B4%E6%A9%98%E5%8F%B3%E4%BA%AC%E6%8A%80%E8%83%BD%E5%87%BA%E8%A3%85-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/pvp/632928.shtml',
            'pubtime' => strtotime("2016/9/1"),
            'playTime' => 392,
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '【TGA大奖赛】集锦团结协作套路王',
            'image' => 'http://joymepic.joyme.com/wiki/images/pvp/d/d5/%E3%80%90TGA%E5%A4%A7%E5%A5%96%E8%B5%9B%E3%80%91%E9%9B%86%E9%94%A6%E5%9B%A2%E7%BB%93%E5%8D%8F%E4%BD%9C%E5%A5%97%E8%B7%AF%E7%8E%8B-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/pvp/632758.shtml',
            'pubtime' => strtotime("2016/8/31"),
            'playTime' => 345,
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '【职业联赛】预告中单篇：我是中单我怕谁',
            'image' => 'http://joymepic.joyme.com/wiki/images/pvp/8/84/%E3%80%90%E8%81%8C%E4%B8%9A%E8%81%94%E8%B5%9B%E3%80%91%E9%A2%84%E5%91%8A%E4%B8%AD%E5%8D%95%E7%AF%87%EF%BC%9A%E6%88%91%E6%98%AF%E4%B8%AD%E5%8D%95%E6%88%91%E6%80%95%E8%B0%81-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/pvp/632750.shtml',
            'pubtime' => strtotime("2016/8/31"),
            'playTime' => 1280,
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀秀第3期任革故鼎新露娜风姿依旧',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/b/b8/新露娜PVP视频.jpg?v=201609131541',
            'url' => 'http://wiki.joyme.com/pvp/634541.shtml',
            'pubtime' => strtotime('2016/9/9'),
            'playTime' => 347,
            'category' => '',
        ),

        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀超神时刻34期你问我套路有多深',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/a/a2/PVP你问我套路有多深.jpg?v=201609131541',
            'url' => 'http://wiki.joyme.com/pvp/634490.shtml',
            'pubtime' => strtotime('2016/9/9'),
            'playTime' => 321,
            'category' => '',
        ),

        array(
            'indexData' => '王者荣耀',
            'title' => '【WeFun套路上王者第三期】王者荣耀马可波罗教学',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/8/84/马可波罗哥伦布的.jpg?v=201609121715',
            'url' => 'http://wiki.joyme.com/pvp/635155.shtml',
            'pubtime' => strtotime('2016/9/9'),
            'playTime' => 1026,
            'category' => '',
        ),

        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀亚瑟出装技巧教学',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/9/93/亚瑟出装的哥伦布.jpg?v=201609121715',
            'url' => 'http://wiki.joyme.com/pvp/635076.shtml',
            'pubtime' => strtotime('2016/9/9'),
            'playTime' => 1787,
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => 'TGA大奖赛TOP10李白游走在敌军的五杀',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/5/5d/TGA%E5%A4%A7%E5%A5%96%E8%B5%9BTOP10%E6%9D%8E%E7%99%BD%E6%B8%B8%E8%B5%B0%E5%9C%A8%E6%95%8C%E5%86%9B%E7%9A%84%E4%BA%94%E6%9D%80.jpg?v=201609141743',
            'url' => 'http://wiki.joyme.com/pvp/636135.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'playTime' => 245,
            'category' => '',
        ),

        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀秀第四期：谁说坦克走位不用骚',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/e/e9/%E7%8E%8B%E8%80%85%E8%8D%A3%E8%80%80%E7%A7%80%E7%AC%AC%E5%9B%9B%E6%9C%9F%EF%BC%9A%E8%B0%81%E8%AF%B4%E5%9D%A6%E5%85%8B%E8%B5%B0%E4%BD%8D%E4%B8%8D%E7%94%A8%E9%AA%9A.jpg?v=201609141743',
            'url' => 'http://wiki.joyme.com/pvp/636134.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'playTime' => 244,
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀秀第四期：谁说坦克走位不用骚',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/5/50/坦克走位风骚111.jpg?v=201609181655',
            'url' => 'http://wiki.joyme.com/pvp/636134.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'playTime' => 264,
            'category' => '',
        ),

        array(
            'indexData' => '王者荣耀',
            'title' => 'TGA大奖赛TOP10李白游走在敌军的五杀',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/b/b6/五杀李白1111.jpg?v=201609181655',
            'url' => 'http://wiki.joyme.com/pvp/636135.shtml',
            'pubtime' => strtotime('2016/9/15'),
            'playTime' => 265,
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => 'Wefun俱乐部王者系列第四期关羽高端教学',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/4/4a/We关于视频教学.jpg?v=201609191605',
            'url' => 'http://wiki.joyme.com/pvp/636930.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'playTime' => 1536,
            'category' => '',
        ),

        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀孙尚香新皮肤末日机甲视频',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/8/82/孙尚香末日机甲视频111.jpg?v=201609191605',
            'url' => 'http://wiki.joyme.com/pvp/634319.shtml',
            'pubtime' => strtotime('2016/9/8'),
            'playTime' => 70,
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀秀第5期：三鹿毒奶瞬间奶翻五人',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/9/96/三毒奶翻了5人！.jpg?v=201609201544',
            'url' => 'http://wiki.joyme.com/pvp/637230.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'playTime' => 242,
            'category' => '',
        ),

        array(
            'indexData' => '王者荣耀',
            'title' => '超神时刻Vol35一不小心就瞎了',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/7/72/超神时刻35期！！！.jpg?v=201609201544',
            'url' => 'http://wiki.joyme.com/pvp/636133.shtml',
            'pubtime' => strtotime('2016/9/7'),
            'playTime' => 296,
            'category' => '',
        ),

    );
} elseif ($wgWikiname == 'cf') {
    $videos = array(
        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'CF手游完整剧情攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/8/80/CF视频1_副本.jpg?v=201609071829',
            'url' => 'http://wiki.joyme.com/cf/634538.shtml',
            'pubtime' => strtotime('2016/9/7'),
            'playTime' => 752,
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'CF手游攻略运输船上箱子教程',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/9/97/CF2222_副本.jpg?v=201609071829',
            'url' => 'http://wiki.joyme.com/cf/634547.shtml',
            'pubtime' => strtotime('2016/9/7'),
            'playTime' => 65,
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'CF手游 炼狱通关新手教程',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/8/80/CF3333_副本.jpg?v=201609071829',
            'url' => 'http://wiki.joyme.com/cf/634550.shtml',
            'pubtime' => strtotime('2016/9/7'),
            'playTime' => 926,
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'cf手游英雄级武器介绍',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/1/15/CF44444_副本.jpg?v=201609071829',
            'url' => 'http://wiki.joyme.com/cf/634549.shtml',
            'pubtime' => strtotime('2016/9/7'),
            'playTime' => 297,
            'category' => '',
        ),
        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'CF刀战视频，裁决刀',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/3/37/裁决刀的视频CF！.jpg?v=201609131541',
            'url' => 'http://wiki.joyme.com/cf/635902.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'playTime' => 263,
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '三头龙 世界boss 暗杀神星觉醒',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/8/8a/三头龙视频boss！.jpg?v=201609131541',
            'url' => 'http://wiki.joyme.com/cf/635906.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'playTime' => 606,
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '飞盘射击技巧让你获取ACE',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/2/26/飞盘的哥伦布的哦.jpg?v=201609121715',
            'url' => 'http://wiki.joyme.com/cf/635666.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'playTime' => 214,
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'Cf手游 雷神逆袭爆破模式',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/c/ca/雷神逆袭的哥伦布.jpg?v=201609121715',
            'url' => 'http://wiki.joyme.com/cf/635676.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'playTime' => 626,
            'category' => '',
        ),
        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '穿越火线枪战王者刀战',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/9/96/Cfv01.png?imageView/1/w/180/h/146/v=201609141912',
            'url' => 'http://wiki.joyme.com/cf/636279.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'playTime' => 66,
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '剑齿虎身法刀僵尸',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/c/cf/Cfv02.png?imageView/1/w/180/h/146/v=201609141912',
            'url' => 'http://wiki.joyme.com/cf/636285.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'playTime' => 489,
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'CF刀战视频，裁决刀',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/3/37/裁决刀的视频CF！.jpg?v=201609131541',
            'url' => 'http://wiki.joyme.com/cf/635902.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'playTime' => 263,
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '三头龙 世界boss 暗杀神星觉醒',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/8/8a/三头龙视频boss！.jpg?v=201609131541',
            'url' => 'http://wiki.joyme.com/cf/635906.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'playTime' => 606,
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '飞盘射击技巧让你获取ACE',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/2/26/飞盘的哥伦布的哦.jpg?v=201609121715',
            'url' => 'http://wiki.joyme.com/cf/635666.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'playTime' => 214,
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'Cf手游 雷神逆袭爆破模式',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/c/ca/雷神逆袭的哥伦布.jpg?v=201609121715',
            'url' => 'http://wiki.joyme.com/cf/635676.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'playTime' => 626,
            'category' => '',
        ),
        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '收割者太好使了，我ACE要收割你们',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/6/62/收割者太好使了1111.jpg?v=201609181655',
            'url' => 'http://wiki.joyme.com/cf/636828.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'playTime' => 345,
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'CF手游寒霜烈龙单刷僵尸狂潮',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/3/32/寒冰烈龙单刷1111.jpg?v=201609181655',
            'url' => 'http://wiki.joyme.com/cf/636825.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'playTime' => 2119,
            'category' => '',
        ),
        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'CF手游歼灭战西部荒野',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/8/82/歼灭！西部的视频.jpg?v=201609191605',
            'url' => 'http://wiki.joyme.com/cf/637036.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'playTime' => 211,
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => ' 穿越火线枪战王者新武器冰龙火炮亲测视频！',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/b/b5/冰龙火炮好烂的视频！.jpg?v=201609191605',
            'url' => 'http://wiki.joyme.com/cf/637043.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'playTime' => 385,
            'category' => '',
        ),
        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'CF枪战王者M4A1体验服 PVP团竞',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/3/3e/M4A1体验服！！.jpg?v=201609201544',
            'url' => 'http://wiki.joyme.com/cf/637253.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'playTime' => 785,
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'CF手游枪战王者PVP团竞 火力无限',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/3/39/CF活力无限模式！.jpg?v=201609201544',
            'url' => 'http://wiki.joyme.com/cf/637254.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'playTime' => 696,
            'category' => '',
        ),

    );
} elseif ($wgWikiname == 'pokemongo') {
    $videos = array(
        array(
            'indexData' => 'pokemon go',
            'title' => '利用属性克制打道馆',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/8/84/PMGO%E8%A7%86%E9%A2%911.png?imageView/1/w/120/h/90/v=201609080926',
            'url' => 'http://wiki.joyme.com/pokemongo/%E5%88%A9%E7%94%A8%E5%B1%9E%E6%80%A7%E5%85%8B%E5%88%B6%E6%89%93%E9%81%93%E9%A6%86',
            'pubtime' => strtotime('2016/7/22'),
            'playTime' => 232,
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '戴着Hololens眼镜玩PokemonGO',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/1/1f/PMGO%E8%A7%86%E9%A2%912.png?v/1/w/120/h/90/v=201609080926',
            'url' => 'http://wiki.joyme.com/pokemongo/%E6%88%B4%E7%9D%80Hololens%E7%9C%BC%E9%95%9C%E7%8E%A9PokemonGO',
            'pubtime' => strtotime('2016/7/25'),
            'playTime' => 61,
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '当中央公园出现一只水精灵，美国人民都疯了',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/8/83/PMGO%E8%A7%86%E9%A2%913.png?imageView/1/w/120/h/90/v=201609080926',
            'url' => 'http://wiki.joyme.com/pokemongo/%E5%BD%93%E4%B8%AD%E5%A4%AE%E5%85%AC%E5%9B%AD%E5%87%BA%E7%8E%B0%E4%B8%80%E5%8F%AA%E6%B0%B4%E7%B2%BE%E7%81%B5%EF%BC%8C%E7%BE%8E%E5%9B%BD%E4%BA%BA%E6%B0%91%E9%83%BD%E7%96%AF%E4%BA%86',
            'pubtime' => strtotime('2016/7/25'),
            'playTime' => 41,
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '十个你必须知道的游戏技巧',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/2/27/PMGO%E8%A7%86%E9%A2%914.png?v=201609080930',
            'url' => 'http://wiki.joyme.com/pokemongo/%E5%8D%81%E4%B8%AA%E4%BD%A0%E5%BF%85%E9%A1%BB%E7%9F%A5%E9%81%93%E7%9A%84%E6%B8%B8%E6%88%8F%E6%8A%80%E5%B7%A7',
            'pubtime' => strtotime('2016/7/25'),
            'playTime' => 744,
            'category' => '',
        ),
        array(
            'indexData' => 'pokemon go',
            'title' => 'Pokemon GO 最新宣传视频 宠物养成对战手游',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/8/87/1503.jpg?v=201609121847',
            'url' => 'http://wiki.joyme.com/pokemongo/%E5%A2%9E%E5%8A%A0%E7%BB%8F%E9%AA%8C%E6%B3%95',
            'pubtime' => strtotime('2016/9/12'),
            'playTime' => 184,
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => 'Pokemon GO口袋妖怪GO玩家试玩体验视频',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/2/26/1501.jpg?v=201609131010',
            'url' => 'http://wiki.joyme.com/pokemongo/%E4%BD%93%E9%AA%8C',
            'pubtime' => strtotime('2016/9/13'),
            'playTime' => 397,
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO如何抓怪 抓怪搞笑新姿势一',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/8/82/1502.jpg?v=201609131042',
            'url' => 'http://wiki.joyme.com/pokemongo/%E6%90%9E%E7%AC%91%E6%8A%93%E6%80%AA',
            'pubtime' => strtotime('2016/9/13'),
            'playTime' => 146,
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '口袋妖怪GO抓怪视频演示 抓怪技巧分享',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/5/5e/1504.jpg?v=201609131534',
            'url' => 'http://wiki.joyme.com/pokemongo/%E6%8A%93%E6%80%AA%E6%8A%80%E5%B7%A7',
            'pubtime' => strtotime('2016/9/13'),
            'playTime' => 255,
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '口袋妖怪GO鲤鱼王捕捉视频 鲤鱼王好抓吗',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/b/bc/1505.jpg?v=201609131541',
            'url' => 'http://wiki.joyme.com/pokemongo/%E9%B2%A4%E9%B1%BC%E7%8E%8B',
            'pubtime' => strtotime('2016/9/13'),
            'playTime' => 36,
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO三大实用技巧 这些你知道吗',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/4/44/1506.jpg?v=201609131553',
            'url' => 'http://wiki.joyme.com/pokemongo/%E4%B8%89%E5%A4%A7%E6%8A%80%E5%B7%A7',
            'pubtime' => strtotime('2016/9/13'),
            'playTime' => 271,
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO科尼岛冒险 科尼岛有什么精灵',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/8/82/1502.jpg?v=201609131632',
            'url' => 'http://wiki.joyme.com/pokemongo/%E7%A7%91%E5%B0%BC%E5%B2%9B',
            'pubtime' => strtotime('2016/9/13'),
            'playTime' => 1499,
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO皮卡丘抓捕 快速升级教程',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/f/f5/150.jpg?v=201609131731',
            'url' => 'http://wiki.joyme.com/pokemongo/%E6%8A%93%E6%8D%95%E7%9A%AE%E5%8D%A1%E4%B8%98',
            'pubtime' => strtotime('2016/9/13'),
            'playTime' => 825,
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => 'Pokemon GO 最新宣传视频 宠物养成对战手游',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/8/87/1503.jpg?v=201609121847',
            'url' => 'http://wiki.joyme.com/pokemongo/%E5%A2%9E%E5%8A%A0%E7%BB%8F%E9%AA%8C%E6%B3%95',
            'pubtime' => strtotime('2016/9/12'),
            'playTime' => 184,
            'category' => '',
        ),
        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO同阵营队友组队打道馆',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/5/5e/1504.jpg?v=201609141701',
            'url' => 'http://wiki.joyme.com/pokemongo/%E6%89%93%E9%81%93%E9%A6%86',
            'pubtime' => strtotime('2016/9/14'),
            'playTime' => 505,
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO精灵进化 精灵怎么进化',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/b/bc/1505.jpg?v=201609141708',
            'url' => 'http://wiki.joyme.com/pokemongo/%E7%B2%BE%E7%81%B5%E8%BF%9B%E5%8C%96',
            'pubtime' => strtotime('2016/9/14'),
            'playTime' => 757,
            'category' => '',
        ),
        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO宠物小精灵介绍',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/2/26/1501.jpg?v=201609181333',
            'url' => 'http://wiki.joyme.com/pokemongo/%E7%B2%BE%E7%81%B5%E4%BB%8B%E7%BB%8D',
            'pubtime' => strtotime('2016/9/18'),
            'playTime' => 956,
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO挑战道馆麦当劳 BUG出现',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/8/87/1503.jpg?v=201609181348',
            'url' => 'http://wiki.joyme.com/pokemongo/%E9%81%93%E9%A6%86%E9%BA%A6%E5%BD%93%E5%8A%B3',
            'pubtime' => strtotime('2016/9/18'),
            'playTime' => 1234,
            'category' => '',
        ),
        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO新版伙伴系统怎么玩?好玩吗',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/f/f5/150.jpg?v=201609190944',
            'url' => 'http://wiki.joyme.com/pokemongo/%E6%96%B0%E7%89%88%E4%BC%99%E4%BC%B4%E7%B3%BB%E7%BB%9F',
            'pubtime' => strtotime('2016/9/19'),
            'playTime' => 575,
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO VR版动画公布',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/2/26/1501.jpg?v=201609191006',
            'url' => 'http://wiki.joyme.com/pokemongo/VR%E7%89%88%E5%8A%A8%E7%94%BB',
            'pubtime' => strtotime('2016/9/19'),
            'playTime' => 106,
            'category' => '',
        ),
        array(
            'indexData' => 'pokemon go',
            'title' => '玩精灵宝可梦GO十件你不知道的秘密',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/f/f5/150.jpg?v=201609201117',
            'url' => 'http://wiki.joyme.com/pokemongo/%E4%B9%8B%E5%89%8D%E4%B9%8B%E5%90%8E',
            'pubtime' => strtotime('2016/9/20'),
            'playTime' => 356,
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO在我的世界里会怎么样',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/2/26/1501.jpg?v=201609201118',
            'url' => 'http://wiki.joyme.com/pokemongo/%E6%88%91%E7%9A%84%E4%B8%96%E7%95%8C',
            'pubtime' => strtotime('2016/9/20'),
            'playTime' => 158,
            'category' => '',
        ),

    );
} elseif ($wgWikiname == 'qmqj') {
    $videos = array(
        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》法师职业大解析',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/0/07/QQ%E6%88%AA%E5%9B%BE20160907162504.jpg?v=201609071625',
            'url' => 'http://wiki.joyme.com/qmqj/348968.shtml',
            'pubtime' => strtotime('2016/7/1'),
            'playTime' => 180,
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》剑士人物介绍',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/4/49/QQ%E6%88%AA%E5%9B%BE20160907162115.jpg?v=201609071626',
            'url' => 'http://wiki.joyme.com/qmqj/348957.shtml',
            'pubtime' => strtotime('2016/7/5'),
            'playTime' => 226,
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》弓箭手人物介绍',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/a/a7/QQ%E6%88%AA%E5%9B%BE20160907162828.jpg?v=201609071627',
            'url' => 'http://wiki.joyme.com/qmqj/348963.shtml',
            'pubtime' => strtotime('2016/7/12'),
            'playTime' => 211,
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》副本介绍',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/9/9d/QQ%E6%88%AA%E5%9B%BE20160907163151.jpg?v=201609071631',
            'url' => 'http://wiki.joyme.com/qmqj/348958.shtml',
            'pubtime' => strtotime('2016/7/24'),
            'playTime' => 232,
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》大神教你怎样快速升级',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/9/95/QQ%E6%88%AA%E5%9B%BE20160907163317.jpg?v=201609071632',
            'url' => 'http://wiki.joyme.com/qmqj/348959.shtml',
            'pubtime' => strtotime('2016/8/3'),
            'playTime' => 170,
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》游戏中的那些特色',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/d/d3/QQ%E6%88%AA%E5%9B%BE20160907163459.jpg?v=201609071634',
            'url' => 'http://wiki.joyme.com/qmqj/348969.shtml',
            'pubtime' => strtotime('2016/8/6'),
            'playTime' => 224,
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》钻石的合理使用',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/4/4e/QQ%E6%88%AA%E5%9B%BE20160907163639.jpg?v=201609071636',
            'url' => 'http://wiki.joyme.com/qmqj/348976.shtml',
            'pubtime' => strtotime('2016/8/10'),
            'playTime' => 251,
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》新版介绍',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/e/eb/QQ%E6%88%AA%E5%9B%BE20160907163843.jpg?v=201609071638',
            'url' => 'http://wiki.joyme.com/qmqj/348965.shtml',
            'pubtime' => strtotime('2016/8/15'),
            'playTime' => 221,
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》巴洛克王室抢先看',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/d/da/QQ%E6%88%AA%E5%9B%BE20160907164155.jpg?v=201609071642',
            'url' => 'http://wiki.joyme.com/qmqj/348962.shtml',
            'pubtime' => strtotime('2016/8/22'),
            'playTime' => 82,
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》三大职业全解析',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/7/72/QQ%E6%88%AA%E5%9B%BE20160907164141.jpg?v=201609071642',
            'url' => 'http://wiki.joyme.com/qmqj/348953.shtml',
            'pubtime' => strtotime('2016/8/28'),
            'playTime' => 216,
            'category' => '',
        ),
        array(
            'indexData' => '全民奇迹',
            'title' => '弓手展示',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/0/0b/QQ%E6%88%AA%E5%9B%BE20160913134449.jpg?v=201609131357',
            'url' => 'http://wiki.joyme.com/qmqj/95013.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'playTime' => 181,
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '法师连招技巧',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/e/e2/QQ%E6%88%AA%E5%9B%BE20160913134443.jpg?v=201609131357',
            'url' => 'http://wiki.joyme.com/qmqj/95004.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'playTime' => 216,
            'category' => '',
        ),
        array(
            'indexData' => '全民奇迹',
            'title' => '战士连招技巧',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/3/32/QQ%E6%88%AA%E5%9B%BE20160914105745.jpg?v=201609141100',
            'url' => 'http://wiki.joyme.com/qmqj/94993.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'playTime' => 46,
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '全民手游 奇迹再现',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/a/ac/QQ%E6%88%AA%E5%9B%BE20160914105729.jpg?v=201609141100',
            'url' => 'http://wiki.joyme.com/qmqj/348987.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'playTime' => 45,
            'category' => '',
        ),
        array(
            'indexData' => '全民奇迹',
            'title' => '我们的《全民奇迹》',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/9/9c/QQ%E6%88%AA%E5%9B%BE20160918134145.jpg?v=201609181346',
            'url' => 'http://wiki.joyme.com/qmqj/349002.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'playTime' => 640,
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '全民奇迹15秒宣传片',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/d/d8/QQ%E6%88%AA%E5%9B%BE20160918134138.jpg?v=201609181346',
            'url' => 'http://wiki.joyme.com/qmqj/348984.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'playTime' => 15,
            'category' => '',
        ),
        array(
            'indexData' => '全民奇迹',
            'title' => '全民奇迹的记忆',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/7/74/QQ%E6%88%AA%E5%9B%BE20160919135631.jpg?v=201609191408',
            'url' => 'http://wiki.joyme.com/qmqj/348986.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'playTime' => 1756,
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '组团灭杀冰霜巨蛛',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/6/68/QQ%E6%88%AA%E5%9B%BE20160919135623.jpg?v=201609191408',
            'url' => 'http://wiki.joyme.com/qmqj/349021.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'playTime' => 361,
            'category' => '',
        ),
        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》三大职业PK',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/7/74/QQ%E6%88%AA%E5%9B%BE20160919135631.jpg?v=201609191408',
            'url' => 'http://wiki.joyme.com/qmqj/348952.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'playTime' => 19,
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => ' 《全民奇迹》经验副本',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/6/68/QQ%E6%88%AA%E5%9B%BE20160919135623.jpg?v=201609191408',
            'url' => 'http://wiki.joyme.com/qmqj/348972.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'playTime' => 180,
            'category' => '',
        ),

    );
} elseif ($wgWikiname == 'lol') {
    $videos = array(
        array(
            'indexData' => '英雄联盟',
            'title' => '放学后的屠正直1 震惊！碾压智商的兹若特传送门',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/8/8e/%E6%94%BE%E5%AD%A6%E5%90%8E%E7%9A%84%E5%B1%A0%E6%AD%A3%E7%9B%B41_%E9%9C%87%E6%83%8A%EF%BC%81%E7%A2%BE%E5%8E%8B%E6%99%BA%E5%95%86%E7%9A%84%E5%85%B9%E8%8B%A5%E7%89%B9%E4%BC%A0%E9%80%81%E9%97%A8.jpg?v=201609072337',
            'url' => 'http://wiki.joyme.com/lol/%E6%94%BE%E5%AD%A6%E5%90%8E%E7%9A%84%E5%B1%A0%E6%AD%A3%E7%9B%B41_%E9%9C%87%E6%83%8A%EF%BC%81%E7%A2%BE%E5%8E%8B%E6%99%BA%E5%95%86%E7%9A%84%E5%85%B9%E8%8B%A5%E7%89%B9%E4%BC%A0%E9%80%81%E9%97%A8',
            'pubtime' => strtotime('2016/9/7'),
            'playTime' => 472,
            'category' => '',
        ),

        array(
            'indexData' => '英雄联盟',
            'title' => '放学后的屠正直10 小学生皇子花式EQ，一局才死40次！',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/1/1b/%E6%94%BE%E5%AD%A6%E5%90%8E%E7%9A%84%E5%B1%A0%E6%AD%A3%E7%9B%B410_%E5%B0%8F%E5%AD%A6%E7%94%9F%E7%9A%87%E5%AD%90%E8%8A%B1%E5%BC%8FEQ%EF%BC%8C%E4%B8%80%E5%B1%80%E6%89%8D%E6%AD%BB40%E6%AC%A1%EF%BC%81.jpg?v=201609072338',
            'url' => 'http://wiki.joyme.com/lol/%E6%94%BE%E5%AD%A6%E5%90%8E%E7%9A%84%E5%B1%A0%E6%AD%A3%E7%9B%B410_%E5%B0%8F%E5%AD%A6%E7%94%9F%E7%9A%87%E5%AD%90%E8%8A%B1%E5%BC%8FEQ%EF%BC%8C%E4%B8%80%E5%B1%80%E6%89%8D%E6%AD%BB40%E6%AC%A1%EF%BC%81',
            'pubtime' => strtotime('2016/9/7'),
            'playTime' => 328,
            'category' => '',
        ),

        array(
            'indexData' => '英雄联盟',
            'title' => '放学后的屠正直11 LOL国服第一狗熊越塔的一生',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/1/13/%E6%94%BE%E5%AD%A6%E5%90%8E%E7%9A%84%E5%B1%A0%E6%AD%A3%E7%9B%B411_LOL%E5%9B%BD%E6%9C%8D%E7%AC%AC%E4%B8%80%E7%8B%97%E7%86%8A%E8%B6%8A%E5%A1%94%E7%9A%84%E4%B8%80%E7%94%9F.jpg?v=201609072338',
            'url' => 'http://wiki.joyme.com/lol/%E6%94%BE%E5%AD%A6%E5%90%8E%E7%9A%84%E5%B1%A0%E6%AD%A3%E7%9B%B411_LOL%E5%9B%BD%E6%9C%8D%E7%AC%AC%E4%B8%80%E7%8B%97%E7%86%8A%E8%B6%8A%E5%A1%94%E7%9A%84%E4%B8%80%E7%94%9F',
            'pubtime' => strtotime('2016/9/7'),
            'playTime' => 327,
            'category' => '',
        ),

        array(
            'indexData' => '英雄联盟',
            'title' => '放学后的屠正直12 岩雀完美开大！一招坑死所有队友',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/d/dc/%E6%94%BE%E5%AD%A6%E5%90%8E%E7%9A%84%E5%B1%A0%E6%AD%A3%E7%9B%B412_%E5%B2%A9%E9%9B%80%E5%AE%8C%E7%BE%8E%E5%BC%80%E5%A4%A7%EF%BC%81%E4%B8%80%E6%8B%9B%E5%9D%91%E6%AD%BB%E6%89%80%E6%9C%89%E9%98%9F%E5%8F%8B.jpg?v=201609072337',
            'url' => 'http://wiki.joyme.com/lol/%E6%94%BE%E5%AD%A6%E5%90%8E%E7%9A%84%E5%B1%A0%E6%AD%A3%E7%9B%B412_%E5%B2%A9%E9%9B%80%E5%AE%8C%E7%BE%8E%E5%BC%80%E5%A4%A7%EF%BC%81%E4%B8%80%E6%8B%9B%E5%9D%91%E6%AD%BB%E6%89%80%E6%9C%89%E9%98%9F%E5%8F%8B',
            'pubtime' => strtotime('2016/9/7'),
            'playTime' => 387,
            'category' => '',
        ),

        array(
            'indexData' => '英雄联盟',
            'title' => '放学后的屠正直13 智障主播钟爱牛头，四名队友不敢近身！',
            'image' => 'http://joymepic.joyme.com/wiki/images/lol/f/f9/123123%E5%A4%B4%EF%BC%8C%E5%9B%9B%E5%90%8D%E9%98%9F%E5%8F%8B%E4%B8%8D%E6%95%A2%E8%BF%91%E8%BA%AB%EF%BC%81.jpg?v=201609081005',
            'url' => 'http://wiki.joyme.com/lol/%E6%94%BE%E5%AD%A6%E5%90%8E%E7%9A%84%E5%B1%A0%E6%AD%A3%E7%9B%B413_%E6%99%BA%E9%9A%9C%E4%B8%BB%E6%92%AD%E9%92%9F%E7%88%B1%E7%89%9B%E5%A4%B4%EF%BC%8C%E5%9B%9B%E5%90%8D%E9%98%9F%E5%8F%8B%E4%B8%8D%E6%95%A2%E8%BF%91%E8%BA%AB%EF%BC%81',
            'pubtime' => strtotime('2016/9/7'),
            'playTime' => 361,
            'category' => '',
        ),
    );
} elseif ($wgWikiname == 'qlz') {
    $videos = array(
        array(
            'indexData' => '龙珠激斗',
            'title' => '30年七龙珠正版回归！再燃宇宙最强战士传说',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/c/ce/%E8%A7%86%E9%A2%91%E7%BC%A91.png?imageView/1/w/120/h/90/v=201609071626',
            'url' => 'http://wiki.joyme.com/qlz/591802.shtml',
            'pubtime' => strtotime('2016/3/25'),
            'playTime' => 207,
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '30年经典重现！龙珠激斗宇宙集结令发布',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/b/b6/%E8%A7%86%E9%A2%91%E7%BC%A92.png?imageView/1/w/120/h/90/v=201609071626',
            'url' => 'http://wiki.joyme.com/qlz/591803.shtml',
            'pubtime' => strtotime('2016/3/25'),
            'playTime' => 759,
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '《龙珠激斗》变身赛亚人，召唤神龙',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/d/d0/%E8%A7%86%E9%A2%91%E7%BC%A93.png?imageView/1/w/120/h/90/v=201609071626',
            'url' => 'http://wiki.joyme.com/qlz/591804.shtml',
            'pubtime' => strtotime('2016/3/25'),
            'playTime' => 238,
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '《七龙珠》真爱粉必看！据说这幅图感动了鸟山明',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/9/9b/%E8%A7%86%E9%A2%91%E7%BC%A94.png?imageView/1/w/120/h/90/v=201609071626',
            'url' => 'http://wiki.joyme.com/qlz/591752.shtml',
            'pubtime' => strtotime('2016/3/25'),
            'playTime' => 89,
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '龙珠激斗热血来袭 教你如何变身赛亚人',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/b/b3/%E8%A7%86%E9%A2%91%E7%BC%A95.png?imageView/1/w/120/h/90/v=201609071828',
            'url' => 'http://wiki.joyme.com/qlz/634544.shtml',
            'pubtime' => strtotime('2016/9/7'),
            'playTime' => 224,
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '龙珠激斗速成教学 帮你赢在起跑线!',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/6/64/%E8%A7%86%E9%A2%91%E7%BC%A96.png?imageView/1/w/120/h/90/v=201609071828',
            'url' => 'http://wiki.joyme.com/qlz/634545.shtml',
            'pubtime' => strtotime('2016/9/7'),
            'playTime' => 1460,
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '《龙珠激斗》:史上特效最好的卡牌养成游戏',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/c/c5/%E8%A7%86%E9%A2%91%E7%BC%A97.png?imageView/1/w/120/h/90/v=201609071828',
            'url' => 'http://wiki.joyme.com/qlz/634540.shtml',
            'pubtime' => strtotime('2016/9/7'),
            'playTime' => 1233,
            'category' => '',
        ),
        array(
            'indexData' => '龙珠激斗',
            'title' => '龙珠激斗: 这才是真龙珠',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/4/4c/%E7%BC%A9%E7%95%A5%E5%9B%BE011.jpg?v=201609131651',
            'url' => 'http://qlz.joyme.com/635802.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'playTime' => 191,
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '七星小特六星悟天合战',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/e/ed/%E7%BC%A9%E7%95%A5%E5%9B%BE012.jpg?v=201609131651',
            'url' => 'http://qlz.joyme.com/635769.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'playTime' => 63,
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '龙珠激斗手游悟天克斯玩法测评',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/c/c4/%E7%BC%A9%E7%95%A5%E5%9B%BE55.jpg?v=201609121732',
            'url' => 'http://wiki.joyme.com/qlz/635661.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'playTime' => 1664,
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '龙珠激斗用尽所有办法超赛悟空!',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/8/8d/%E7%BC%A9%E7%95%A5%E5%9B%BE66.jpg?v=201609121732',
            'url' => 'http://wiki.joyme.com/qlz/635754.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'playTime' => 397,
            'category' => '',
        ),
        array(
            'indexData' => '龙珠激斗',
            'title' => '龙珠激斗蛇道通关教程',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/b/b9/%E7%BC%A9%E7%95%A5%E5%9B%BE0017.jpg?v=201609141637',
            'url' => 'http://wiki.joyme.com/qlz/636186.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'playTime' => 90,
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '龙珠激斗手游:看望地府悟空',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/8/81/%E7%BC%A9%E7%95%A5%E5%9B%BE0018.jpg?v=201609141637',
            'url' => 'http://wiki.joyme.com/qlz/636237.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'playTime' => 1329,
            'category' => '',
        ),
        array(
            'indexData' => '龙珠激斗',
            'title' => '龙珠激斗手游贝吉特夭寿了',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/6/66/Q0023.jpg?v=201609181747',
            'url' => 'http://wiki.joyme.com/qlz/636844.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'playTime' => 1293,
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '龙珠激斗手游悟天克斯测评',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/1/1b/Q0024.jpg?v=201609181747',
            'url' => 'http://wiki.joyme.com/qlz/636845.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'playTime' => 1664,
            'category' => '',
        ),
        array(
            'indexData' => '龙珠激斗',
            'title' => '龙珠激斗舒克贝吉特实战秒杀视频',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/4/45/Q0029.jpg?v=201609191646',
            'url' => 'http://wiki.joyme.com/qlz/636977.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'playTime' => 85,
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '【龙珠激斗】玩转伙伴系统阵容实力不用愁!',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/d/d5/Q0030.jpg?v=201609191646',
            'url' => 'http://wiki.joyme.com/qlz/636981.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'playTime' => 55,
            'category' => '',
        ),
        array(
            'indexData' => '龙珠激斗',
            'title' => '龙珠激斗家族战详解',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/9/9e/Q0035.jpg?v=201609201645',
            'url' => 'http://wiki.joyme.com/qlz/637208.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'playTime' => 237,
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '龙珠激斗Z时代的终结者',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/5/58/Q0036.jpg?v=201609201646',
            'url' => 'http://wiki.joyme.com/qlz/637207.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'playTime' => 97,
            'category' => '',
        ),

    );
} elseif ($wgWikiname == 'qjnn') {
    $videos = array(
        array(
            'indexData' => '奇迹暖暖',
            'title' => '《奇迹暖暖》公主级S级攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/0/0c/%E6%9C%AA%E6%A0%87%E9%A2%98-2.jpg?v=201609071741%8B%E6%A9%98%E5%8F%B3%E4%BA%AC-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/qjnn/390376.shtml',
            'pubtime' => strtotime('2015/8/24'),
            'playTime' => 244,
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖公主级6-4运动少女奥萝43S级搭配',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/a/ac/%E6%9C%AA%E6%A0%87%E9%A2%98-2g31.jpg?v=201609071748%B9%E8%B7%AF%E7%AF%87-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/qjnn/363225.shtml',
            'pubtime' => strtotime('2015/7/8'),
            'playTime' => 105,
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖公主级4-支2我要吃披萨S级搭配',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/9/93/%E6%9C%AA%E6%A0%87%E9%A2%98we-1.jpg?v=201609071752',
            'url' => 'http://wiki.joyme.com/qjnn/363226.shtml',
            'pubtime' => strtotime('2015/7/8'),
            'playTime' => 99,
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => ' 奇迹暖暖公主级6-9古楼四战秋霜S级搭配',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/5/54/%E6%9C%AA%E6%A0%87%E9%A2%98-we1.jpg?v=201609071755',
            'url' => 'http://wiki.joyme.com/qjnn/363229.shtml',
            'pubtime' => strtotime('2015/7/8'),
            'playTime' => 79,
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖公主级6-2神秘少年拂苏S级搭配',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/3/39/%E6%9C%AA%E6%A0%87%E9%A2%98qw-1.jpg?v=201609071758',
            'url' => 'http://wiki.joyme.com/qjnn/363230.shtml',
            'pubtime' => strtotime('2015/7/8'),
            'playTime' => 111,
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖5-支3性感医生S级搭配',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/5/54/%E6%9C%AA%E6%A0%87%E9%A2%98-we1.jpg?v=201609071801',
            'url' => 'http://wiki.joyme.com/qjnn/363231.shtml',
            'pubtime' => strtotime('2016/7/8'),
            'playTime' => 75,
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖4-8白色天使S级搭配',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/c/c5/%E6%9C%AA%E6%A0%87er%E9%A2%98-1.jpg?v=201609071804%87%EF%BC%9A%E6%88%91%E6%98%AF%E4%B8%AD%E5%8D%95%E6%88%91%E6%80%95%E8%B0%81-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/qjnn/363234.shtml',
            'pubtime' => strtotime('2015/7/8'),
            'playTime' => 64,
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖第六章全S攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/d/d9/%E6%9C%AA%E6%A0%87%E9%A2%98-et1.jpg?v=2016090718081.jpg?v=201609071804%87%EF%BC%9A%E6%88%91%E6%98%AF%E4%B8%AD%E5%8D%95%E6%88%91%E6%80%95%E8%B0%81-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/qjnn/363235.shtml',
            'pubtime' => strtotime('2015/7/8'),
            'playTime' => 1928,
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖第五章全S攻略含支线',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/5/5e/%E6%9C%AA%E6%A0%87%E9%A2%98df-1.jpg?v=2016090718121.jpg?v=201609071804%87%EF%BC%9A%E6%88%91%E6%98%AF%E4%B8%AD%E5%8D%95%E6%88%91%E6%80%95%E8%B0%81-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/qjnn/363237.shtml',
            'pubtime' => strtotime('2015/7/8'),
            'playTime' => 1238,
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖4-11白色天使S级搭配',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/d/db/%E6%9C%AA%E6%A0%87sd2.jpg?v=2016090718141.jpg?v=201609071804%87%EF%BC%9A%E6%88%91%E6%98%AF%E4%B8%AD%E5%8D%95%E6%88%91%E6%80%95%E8%B0%81-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/qjnn/363238.shtml',
            'pubtime' => strtotime('2015/7/8'),
            'playTime' => 108,
            'category' => '',
        ),
        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖公主级5-3奇怪的女子S级搭配',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/a/ac/%E6%9C%AA%E6%A0%87%E9%A2%98awq-1.jpg?v=201609131703',
            'url' => 'http://wiki.joyme.com/qjnn/363025.shtml',
            'pubtime' => strtotime('2015/7/7'),
            'playTime' => 86,
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖公主级5-12新的旅程平民S级搭配',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/b/b4/%E6%9C%AA%E6%A0%87%E9%A2%98-AWQ1.jpg?v=201609131705',
            'url' => 'http://wiki.joyme.com/qjnn/363027.shtml',
            'pubtime' => strtotime('2015/7/7'),
            'playTime' => 108,
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖5-8极寒国度的冬装S级搭配',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/3/3b/%E6%9C%AAgfjhrt%E9%A2%98-1.jpg?v=201609121545',
            'url' => 'http://wiki.joyme.com/qjnn/362992.shtml',
            'pubtime' => strtotime('2015/7/7'),
            'playTime' => 100,
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖5-9OL薇雅3省钱平民S级搭配',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/c/c7/%E6%9C%AA%E6%A0%87fdn_h%E9%A2%98-1.jpg?v=201609121548',
            'url' => 'http://wiki.joyme.com/qjnn/362991.shtml',
            'pubtime' => strtotime('2015/7/7'),
            'playTime' => 77,
            'category' => '',
        ),
        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖少女级2-8去剧院看彩排S级搭配',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/f/fb/%E6%9C%AA%E6%A0%87qwq%E9%A2%98-1.jpg?v=201609141714',
            'url' => 'http://wiki.joyme.com/qjnn/362993.shtml',
            'pubtime' => strtotime('2015/7/7'),
            'playTime' => 76,
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖少女3-4S级搭配',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/a/ab/%E6%9C%AA%E6%A0%87%E9%A2%98ewe-1.jpg?v=201609141715',
            'url' => 'http://wiki.joyme.com/qjnn/362996.shtml',
            'pubtime' => strtotime('2015/7/7'),
            'playTime' => 63,
            'category' => '',
        ),
        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖5-10宿命的对手登场S级搭配',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/e/e8/%E6%9C%AA%E6%A0%87%E9%A2%98%E9%98%BF%E5%B0%94-2.jpg?v=201609181720',
            'url' => 'http://wiki.joyme.com/qjnn/362637.shtml',
            'pubtime' => strtotime('2015/7/6'),
            'playTime' => 78,
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖4-11情侣档S级搭配',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/a/a2/%E6%9C%AA%E6%A0%87%E9%98%BF%E5%B0%94%E9%A2%98-2.jpg?v=201609181722',
            'url' => 'http://wiki.joyme.com/qjnn/362636.shtml',
            'pubtime' => strtotime('2015/7/6'),
            'playTime' => 72,
            'category' => '',
        ),
        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖4-支1孩子们的点心师S搭配',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/c/c5/%E6%9C%AA%E6%A0%87aewq%E9%A2%98-1.jpg?v=201609191728',
            'url' => 'http://wiki.joyme.com/qjnn/360362.shtml',
            'pubtime' => strtotime('2015/7/2'),
            'playTime' => 78,
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖公主级2-支1S搭配',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/f/f9/%E6%9C%AA%E6%A0%87awer%E9%A2%98-1.jpg?v=201609191730',
            'url' => 'http://wiki.joyme.com/qjnn/360360.shtml',
            'pubtime' => strtotime('2015/7/2'),
            'playTime' => 82,
            'category' => '',
        ),
        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖公主级3-9偷星之海S级搭配攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/f/f2/%E6%9C%AA%E6%A0%87aw3eq%E9%A2%98-1.jpg?v=201609201706',
            'url' => 'http://wiki.joyme.com/qjnn/362649.shtml',
            'pubtime' => strtotime('2015/7/6'),
            'playTime' => 100,
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖1-3少女级S级搭配',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/e/e0/%E6%9C%AAaweq1.jpg?v=201609201708',
            'url' => 'http://wiki.joyme.com/qjnn/360668.shtml',
            'pubtime' => strtotime('2015/7/3'),
            'playTime' => 303,
            'category' => '',
        ),

    );
} elseif ($wgWikiname == 'qmcs') {
    $videos = array(
        array(
            'indexData' => '全民超神',
            'title' => '《全民超神》萝莉猎手：灵狐公主',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/4/4e/%E8%A7%86%E9%A2%91%E7%BC%A9%E7%95%A53.png?v=201609071836',
            'url' => 'http://wiki.joyme.com/qmcs/408390.shtml',
            'pubtime' => strtotime('2016/9/2'),
            'playTime' => 243,
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '《全民超神》极光女神无限超神',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/4/4a/%E8%A7%86%E9%A2%91%E7%BC%A9%E7%95%A51.png?v=201609071836',
            'url' => 'http://wiki.joyme.com/qmcs/408384.shtml',
            'pubtime' => strtotime('2016/9/2'),
            'playTime' => 244,
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '良心小编实测腾讯MOBA手游《全民超神》',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/e/e2/%E3%80%90%E6%B8%B8%E7%8C%8E%E5%A4%A9%E4%B8%8B%E3%80%91%E8%89%AF%E5%BF%83%E5%B0%8F%E7%BC%96%E5%AE%9E%E6%B5%8B%E8%85%BE%E8%AE%AFMOBA%E6%89%8B%E6%B8%B8%E3%80%8A%E5%85%A8%E6%B0%91%E8%B6%85%E7%A5%9E%E3%80%8B.jpg?v=201609071833',
            'url' => 'http://wiki.joyme.com/qmcs/634556.shtml',
            'pubtime' => strtotime('2016/8/1'),
            'playTime' => 241,
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '《全民超神》1v1制胜宝典',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/2/27/%E8%A7%86%E9%A2%91%E7%BC%A9%E7%95%A52.png?v=201609071836',
            'url' => 'http://wiki.joyme.com/qmcs/408385.shtml',
            'pubtime' => strtotime('2016/8/31'),
            'playTime' => 290,
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '《全民超神》肉盾之圣战神',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/3/3d/%E8%A7%86%E9%A2%91%E7%BC%A9%E7%95%A54.png?v=201609071836',
            'url' => 'http://wiki.joyme.com/qmcs/408389.shtml',
            'pubtime' => strtotime('2016/9/1'),
            'playTime' => 283,
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '《全民超神》你值得拥有，掌中妙计51期',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/6/69/%E3%80%8A%E5%85%A8%E6%B0%91%E8%B6%85%E7%A5%9E%E3%80%8B%E4%BD%A0%E5%80%BC%E5%BE%97%E6%8B%A5%E6%9C%89%EF%BC%8C%E6%8E%8C%E4%B8%AD%E5%A6%99%E8%AE%A151%E6%9C%9F.jpg?v=201609071833',
            'url' => 'http://wiki.joyme.com/qmcs/634555.shtml',
            'pubtime' => strtotime('2016/8/31'),
            'playTime' => 244,
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '【全民超神】BIGBANG10.15开黑直播预告片',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/1/14/%E8%B6%85%E7%A5%9E%E5%9C%A3%E8%AF%9E%E7%89%88_%E3%80%8AJingle_Bells%E3%80%8B.jpg?v=201609071833',
            'url' => 'http://wiki.joyme.com/qmcs/634554.shtml',
            'pubtime' => strtotime('2016/9/1'),
            'playTime' => 32,
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '全民超神猴年新版本，大圣领衔闹新春',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/a/a9/%E5%85%A8%E6%B0%91%E8%B6%85%E7%A5%9E%E7%8C%B4%E5%B9%B4%E6%96%B0%E7%89%88%E6%9C%AC.jpg?v=201609071833',
            'url' => 'http://wiki.joyme.com/qmcs/634553.shtml',
            'pubtime' => strtotime('2016/9/5'),
            'playTime' => 173,
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '超神圣诞版 《Jingle Bells》魔性Rap',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/1/14/%E8%B6%85%E7%A5%9E%E5%9C%A3%E8%AF%9E%E7%89%88_%E3%80%8AJingle_Bells%E3%80%8B.jpg?v=201609071833',
            'url' => 'http://wiki.joyme.com/qmcs/634724.shtml',
            'pubtime' => strtotime('2016/8/26'),
            'playTime' => 72,
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '《全民超神》8月18日不删档发布完整版视频',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/b/b6/%E3%80%8A%E5%85%A8%E6%B0%91%E8%B6%85%E7%A5%9E%E3%80%8B8%E6%9C%8818%E6%97%A5%E4%B8%8D%E5%88%A0%E6%A1%A3%E5%8F%91%E5%B8%83%E5%AE%8C%E6%95%B4%E7%89%88%E8%A7%86%E9%A2%91.jpg?v=201609071833',
            'url' => 'http://wiki.joyme.com/qmcs/634551.shtml',
            'pubtime' => strtotime('2016/8/18'),
            'playTime' => 296,
            'category' => '',
        ),
        array(
            'indexData' => '全民超神',
            'title' => '暗影舞者 在刀刃上跳舞的魔鬼',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/8/8e/I%24-%25Z1%28ZK6T1Q34V7M-%28BQ7.png?v=201609131415',
            'url' => 'http://wiki.joyme.com/qmcs/635975.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'playTime' => 502,
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '七海之王 神出鬼没 兴风作浪',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/9/9c/9Q7C%60UHDC_-KPJ%28Q-K%289%40-Q.png?v=201609131415',
            'url' => 'http://wiki.joyme.com/qmcs/635976.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'playTime' => 687,
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '全民超神8月赛，主宰比赛无人能挡',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/0/06/112121212.png?v=201609121809',
            'url' => 'http://wiki.joyme.com/qmcs/635646.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'playTime' => 176,
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '全民超神8月赛GJ比赛视频',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/8/81/22121324324.png?v=201609121809',
            'url' => 'http://wiki.joyme.com/qmcs/635651.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'playTime' => 157,
            'category' => '',
        ),
        array(
            'indexData' => '全民超神',
            'title' => '土狗三千能奈我何 虎威将军赵云来也',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/d/d5/Rer4545.png?v=201609141533',
            'url' => 'http://wiki.joyme.com/qmcs/636219.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'playTime' => 290,
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '改版兽人之神 大锤收割秀四杀',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/f/fb/Rerweq88481.png?v=201609141533',
            'url' => 'http://wiki.joyme.com/qmcs/636220.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'playTime' => 555,
            'category' => '',
        ),
        array(
            'indexData' => '全民超神',
            'title' => '8月赛勝者为王 2-0 power战队',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/f/f0/7L3Z76%40AG8%25NS%24_9-WW%40VTP.png?v=201609181520',
            'url' => 'http://wiki.joyme.com/qmcs/636811.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'playTime' => 157,
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '阿拉丁自带反甲 肉盾之王',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/a/ac/BIM%290X%29UOTRRBNNJXD1WJJ.png?v=201609181520',
            'url' => 'http://wiki.joyme.com/qmcs/636812.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'playTime' => 1062,
            'category' => '',
        ),
        array(
            'indexData' => '全民超神',
            'title' => '改版无双飞将 一刺一冲一条命',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/3/33/C5Z91YCBHDEGF%40E~%40YKFDR9.png?v=201609191449',
            'url' => 'http://wiki.joyme.com/qmcs/637030.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'playTime' => 699,
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '爆破萝莉 小公主可不好惹',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/c/ca/XS7ER9G-%29CK~5-R-RAK6C43.png?v=201609191449',
            'url' => 'http://wiki.joyme.com/qmcs/637031.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'playTime' => 548,
            'category' => '',
        ),
        array(
            'indexData' => '全民超神',
            'title' => '光速小子三杀 我就是救世主',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/7/71/DX_5PMW0ULLVHBJ%258%29OLWU0.png?v=201609201622',
            'url' => 'http://wiki.joyme.com/qmcs/637277.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'playTime' => 735,
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '改版牛头人之神 抗揍超神',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/8/8a/3NZA32O%40PA-%25-C%60-W~~%298-H.png?v=201609201622',
            'url' => 'http://wiki.joyme.com/qmcs/637278.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'playTime' => 924,
            'category' => '',
        ),

    );
} elseif ($wgWikiname == 'qmtj') {
    $videos = array(
        array(
            'indexData' => '全民突击',
            'title' => '全民突击闯关模式困难1-1超级部队视频',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/4/44/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E9%97%AF%E5%85%B3%E6%A8%A1%E5%BC%8F%E5%9B%B0%E9%9A%BE1-1%E8%B6%85%E7%BA%A7%E9%83%A8%E9%98%9F%E8%A7%86%E9%A2%91.jpg?imageView/1/w/120/h/90/v=201609071626',
            'url' => 'http://wiki.joyme.com/qmtj/397391.shtml',
            'pubtime' => strtotime('2016/9/2'),
            'playTime' => 78,
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击闯关模式困难3-1地铁惊魂视频',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/5/56/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E9%97%AF%E5%85%B3%E6%A8%A1%E5%BC%8F%E5%9B%B0%E9%9A%BE3-1%E5%9C%B0%E9%93%81%E6%83%8A%E9%AD%82%E8%A7%86%E9%A2%91.jpg?imageView/1/w/120/h/90/v=201609071626',
            'url' => 'http://wiki.joyme.com/qmtj/396606.shtml',
            'pubtime' => strtotime('2016/9/2'),
            'playTime' => 76,
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击闯关模式困难3-5尖峰时刻视频',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/3/36/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E9%97%AF%E5%85%B3%E6%A8%A1%E5%BC%8F%E5%9B%B0%E9%9A%BE3-5%E5%B0%96%E5%B3%B0%E6%97%B6%E5%88%BB%E8%A7%86%E9%A2%91.jpg?imageView/1/w/120/h/90/v=201609071626',
            'url' => 'http://wiki.joyme.com/qmtj/396360.shtml',
            'pubtime' => strtotime('2016/8/1'),
            'playTime' => 113,
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击合作模式孤岛激战困难通关视频',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/6/69/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E5%90%88%E4%BD%9C%E6%A8%A1%E5%BC%8F%E5%AD%A4%E5%B2%9B%E6%BF%80%E6%88%98%E5%9B%B0%E9%9A%BE%E9%80%9A%E5%85%B3%E8%A7%86%E9%A2%91.jpg?imageView/1/w/120/h/90/v=201609071626',
            'url' => 'http://wiki.joyme.com/qmtj/395790.shtml',
            'pubtime' => strtotime('2016/8/31'),
            'playTime' => 1451,
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击阵地PK神一样的队友',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/c/c1/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E9%98%B5%E5%9C%B0PK%E7%A5%9E%E4%B8%80%E6%A0%B7%E7%9A%84%E9%98%9F%E5%8F%8B.jpg?imageView/1/w/120/h/90/v=201609071626',
            'url' => 'http://wiki.joyme.com/qmtj/395387.shtml',
            'pubtime' => strtotime('2016/9/1'),
            'playTime' => 186,
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击阵地PK精彩瞬间集锦',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/0/0b/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E9%98%B5%E5%9C%B0PK%E7%B2%BE%E5%BD%A9%E7%9E%AC%E9%97%B4%E9%9B%86%E9%94%A6.jpg?imageView/1/w/120/h/90/v=201609071626',
            'url' => 'http://wiki.joyme.com/qmtj/394999.shtml',
            'pubtime' => strtotime('2016/8/31'),
            'playTime' => 86,
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击神一样驰骋的步狙',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/6/61/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E7%A5%9E%E4%B8%80%E6%A0%B7%E9%A9%B0%E9%AA%8B%E7%9A%84%E6%AD%A5%E7%8B%99.jpg?imageView/1/w/120/h/90/v=201609071626',
            'url' => 'http://wiki.joyme.com/qmtj/394350.shtml',
            'pubtime' => strtotime('2016/8/31'),
            'playTime' => 157,
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击惊涛骇浪PK20杀',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/1/17/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E6%83%8A%E6%B6%9B%E9%AA%87%E6%B5%AAPK20%E6%9D%80.jpg?imageView/1/w/120/h/90/v=201609071626',
            'url' => 'http://wiki.joyme.com/qmtj/392807.shtml',
            'pubtime' => strtotime('2016/7/30'),
            'playTime' => 207,
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击跑狙似魔鬼的步伐',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/1/17/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E8%B7%91%E7%8B%99%E4%BC%BC%E9%AD%94%E9%AC%BC%E7%9A%84%E6%AD%A5%E4%BC%90.jpg?imageView/1/w/120/h/90/v=201609071626',
            'url' => 'http://wiki.joyme.com/qmtj/392786.shtml',
            'pubtime' => strtotime('2016/7/28'),
            'playTime' => 128,
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击挑战模式15-39关带鱼解说',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/6/64/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E6%8C%91%E6%88%98%E6%A8%A1%E5%BC%8F15-39%E5%85%B3%E5%B8%A6%E9%B1%BC%E8%A7%A3%E8%AF%B4.jpg?imageView/1/w/120/h/90/v=201609071626',
            'url' => 'http://wiki.joyme.com/qmtj/392556.shtml',
            'pubtime' => strtotime('2016/7/20'),
            'playTime' => 2754,
            'category' => '',
        ),
        array(
            'indexData' => '全民突击',
            'title' => '全民突击挑战42关',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/4/43/QQ%E5%9B%BE%E7%89%8720160913173418.jpg?v/1/w/120/h/90/v=201609131740',
            'url' => 'http://wiki.joyme.com/qmtj/636025.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'playTime' => 163,
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击-挑战模式',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/d/df/QQ%E5%9B%BE%E7%89%8720160913173431_%E5%89%AF%E6%9C%AC.jpg?v/1/w/120/h/90/v=201609131740',
            'url' => 'http://wiki.joyme.com/qmtj/636024.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'playTime' => 1122,
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击-解放者新机枪',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/8/8e/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E8%A7%A3%E6%94%BE%E8%80%85%E6%96%B0%E6%9E%AA1.jpg?imageView/1/w/120/h/90/v=201609121559',
            'url' => 'http://wiki.joyme.com/qmtj/635673.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'playTime' => 163,
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击挑战31-42关',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/b/b0/%E6%8C%91%E6%88%983142%E5%85%B3.jpg?imageView/1/w/120/h/90/v=201609121559',
            'url' => 'http://wiki.joyme.com/qmtj/635672.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'playTime' => 1122,
            'category' => '',
        ),
        array(
            'indexData' => '全民突击',
            'title' => '全民突击解放者新机枪',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/9/92/%E8%A7%A3%E6%94%BE%E8%80%85%E8%A7%86%E9%A2%91.jpg?imageView/1/w/120/h/90/v=201609141400',
            'url' => 'http://wiki.joyme.com/qmtj/636179.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'playTime' => 163,
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击地狱通关',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/4/4f/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E5%9C%B0%E7%8B%B1%E9%80%9A%E5%85%B3%E8%A7%86%E9%A2%91.jpg?v/1/w/120/h/90/v=201609141358',
            'url' => 'http://wiki.joyme.com/qmtj/636178.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'playTime' => 449,
            'category' => '',
        ),
        array(
            'indexData' => '全民突击',
            'title' => '全民突击兵临城下防守篇',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/0/0b/%E5%9F%8E%E4%B8%8B%E9%98%B2%E5%AE%88.jpg?v/1/w/120/h/90/v=201609181512',
            'url' => 'http://wiki.joyme.com/qmtj/636792.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'playTime' => 351,
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击枪神降临',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/5/52/%E6%9E%AA%E7%A5%9E%E5%86%8D%E4%B8%B4.jpg?v/1/w/120/h/90/v=201609181512',
            'url' => 'http://wiki.joyme.com/qmtj/636791.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'playTime' => 1202,
            'category' => '',
        ),
        array(
            'indexData' => '全民突击',
            'title' => '全民突击挑战视频35—42关',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/7/72/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB35-42.jpg?v/1/w/120/h/90/v=201609191139',
            'url' => 'http://wiki.joyme.com/qmtj/636969.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'playTime' => 930,
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击合作模式最高难度',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/8/82/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E6%9C%80%E9%AB%98%E9%9A%BE%E5%BA%A6%E8%A7%86%E9%A2%91.jpg?v/1/w/120/h/90/v=201609191139',
            'url' => 'http://wiki.joyme.com/qmtj/636972.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'playTime' => 811,
            'category' => '',
        ),
        array(
            'indexData' => '全民突击',
            'title' => '全民突击欢乐斗铂金AK实战',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/2/2c/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E6%AC%A2%E4%B9%90%E6%96%97%E9%93%82%E9%87%91AK%E5%AE%9E%E6%88%98.jpg?v/1/w/120/h/90/v=201609201033',
            'url' => 'http://wiki.joyme.com/qmtj/637164.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'playTime' => 141,
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击铂金AK47丛林野战',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/5/57/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E9%93%82%E9%87%91AK47%E4%B8%9B%E6%9E%97%E9%87%8E%E6%88%98.jpg?v/1/w/120/h/90/v=201609201033',
            'url' => 'http://wiki.joyme.com/qmtj/637163.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'playTime' => 39,
            'category' => '',
        ),

    );
} elseif ($wgWikiname == 'kof98') {
    $videos = array(
        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '拳皇98终极之战OL特色关卡之资源获取',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/7/7f/%E6%8B%B3%E7%9A%8798%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98OL%E7%89%B9%E8%89%B2%E5%85%B3%E5%8D%A1%E4%B9%8B%E8%B5%84%E6%BA%90%E8%8E%B7%E5%8F%96-%E5%9B%BE.jpg?v=201609071618',
            'url' => 'http://wiki.joyme.com/kof98/395905.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'playTime' => 314,
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '拳皇98终极之战OL格斗家战位攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/b/b3/%E6%8B%B3%E7%9A%8798%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98OL%E6%A0%BC%E6%96%97%E5%AE%B6%E6%88%98%E4%BD%8D%E6%94%BB%E7%95%A5-%E5%9B%BE.jpg?v=201609071618',
            'url' => 'http://wiki.joyme.com/kof98/392964.shtml',
            'pubtime' => strtotime('2016/9/1'),
            'playTime' => 284,
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '《拳皇98终极之战OL》宣传视频',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/9/99/%E3%80%8A%E6%8B%B3%E7%9A%8798%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98OL%E3%80%8B%E5%AE%A3%E4%BC%A0%E8%A7%86%E9%A2%91-%E5%9B%BE.jpg?v=201609071618',
            'url' => 'http://wiki.joyme.com/kof98/378129.shtml',
            'pubtime' => strtotime('2016/7/30'),
            'playTime' => 92,
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '情怀无价，拳皇再临',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/8/83/%E6%83%85%E6%80%80%E6%97%A0%E4%BB%B7%EF%BC%8C%E6%8B%B3%E7%9A%87%E5%86%8D%E4%B8%B4-%E5%9B%BE.jpg?v=201609071618',
            'url' => 'http://wiki.joyme.com/kof98/367813.shtml',
            'pubtime' => strtotime('2016/7/24'),
            'playTime' => 271,
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '拳皇98终极之战OL巅峰对决系统展示',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/d/db/%E6%8B%B3%E7%9A%8798%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98OL%E5%B7%85%E5%B3%B0%E5%AF%B9%E5%86%B3%E7%B3%BB%E7%BB%9F%E5%B1%95%E7%A4%BA-%E5%9B%BE.jpg?v=201609071618',
            'url' => 'http://wiki.joyme.com/kof98/407746.shtml',
            'pubtime' => strtotime('2016/8/4'),
            'playTime' => 280,
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '人气八神重出江湖，英雄介绍分析',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/8/88/%E4%BA%BA%E6%B0%94%E5%85%AB%E7%A5%9E%E9%87%8D%E5%87%BA%E6%B1%9F%E6%B9%96%EF%BC%8C%E8%8B%B1%E9%9B%84%E4%BB%8B%E7%BB%8D%E5%88%86%E6%9E%90-%E5%9B%BE.jpg?v=201609071618',
            'url' => 'http://wiki.joyme.com/kof98/407747.shtml',
            'pubtime' => strtotime('2016/8/4'),
            'playTime' => 253,
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '掌上拳皇全靠它，阵容搭配分析',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/5/5a/%E6%8E%8C%E4%B8%8A%E6%8B%B3%E7%9A%87%E5%85%A8%E9%9D%A0%E5%AE%83%EF%BC%8C%E9%98%B5%E5%AE%B9%E6%90%AD%E9%85%8D%E5%88%86%E6%9E%90-%E5%9B%BE.jpg?v=201609071637',
            'url' => 'http://wiki.joyme.com/kof98/407748.shtml',
            'pubtime' => strtotime('2016/8/4'),
            'playTime' => 270,
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '拳皇98新版宣传片，暴走不限量热血来袭！',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/2/20/%E6%8B%B3%E7%9A%8798%E6%96%B0%E7%89%88%E5%AE%A3%E4%BC%A0%E7%89%87%EF%BC%8C%E6%9A%B4%E8%B5%B0%E4%B8%8D%E9%99%90%E9%87%8F%E7%83%AD%E8%A1%80%E6%9D%A5%E8%A2%AD%EF%BC%81-%E5%9B%BE.jpg?v=201609071618',
            'url' => 'http://wiki.joyme.com/kof98/367841.shtml',
            'pubtime' => strtotime('2016/7/24'),
            'playTime' => 60,
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '拳皇98终极之战OL SNK欠我们一个救世主',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/2/26/%E6%8B%B3%E7%9A%8798%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98OL-SNK%E6%AC%A0%E6%88%91%E4%BB%AC%E4%B8%80%E4%B8%AA%E6%95%91%E4%B8%96%E4%B8%BB-%E5%9B%BE.jpg?v=201609071618',
            'url' => 'http://wiki.joyme.com/kof98/409960.shtml',
            'pubtime' => strtotime('2015/11/12'),
            'playTime' => 416,
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '拳皇98终极之战OL 孔明找你约一架（炮）',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/5/5d/%E6%8B%B3%E7%9A%8798%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98OL-%E5%AD%94%E6%98%8E%E6%89%BE%E4%BD%A0%E7%BA%A6%E4%B8%80%E6%9E%B6%EF%BC%88%E7%82%AE%EF%BC%89-%E5%9B%BE.jpg?v=201609071618',
            'url' => 'http://wiki.joyme.com/kof98/409961.shtml',
            'pubtime' => strtotime('2015/11/12'),
            'playTime' => 183,
            'category' => '',
        ),
        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '拳皇98终极之战ol超肉的小七',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/0/09/%E6%8B%B3%E7%9A%8798%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98ol%E8%B6%85%E8%82%89%E7%9A%84%E5%B0%8F%E4%B8%83-%E5%9B%BE.jpg?v=201609131832',
            'url' => 'http://wiki.joyme.com/kof98/635993.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'playTime' => 260,
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '汤米酱拳皇98终极之战OL日常第一期',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/3/30/%E6%B1%A4%E7%B1%B3%E9%85%B1%E6%8B%B3%E7%9A%8798%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98OL%E6%97%A5%E5%B8%B8%E7%AC%AC%E4%B8%80%E6%9C%9F-%E5%9B%BE.jpg?v=201609131832',
            'url' => 'http://wiki.joyme.com/kof98/635990.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'playTime' => 3290,
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '交流战斗两不误，拳皇98ol社交系统介绍',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/9/91/%E4%BA%A4%E6%B5%81%E6%88%98%E6%96%97%E4%B8%A4%E4%B8%8D%E8%AF%AF%EF%BC%8C%E6%8B%B3%E7%9A%8798ol%E7%A4%BE%E4%BA%A4%E7%B3%BB%E7%BB%9F%E4%BB%8B%E7%BB%8D-%E5%9B%BE.jpg?v=201609121648',
            'url' => 'http://wiki.joyme.com/kof98/407765.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'playTime' => 297,
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '站位阵容缺一不可，拳皇98ol站位及阵容推荐',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/7/77/%E7%AB%99%E4%BD%8D%E9%98%B5%E5%AE%B9%E7%BC%BA%E4%B8%80%E4%B8%8D%E5%8F%AF%EF%BC%8C%E6%8B%B3%E7%9A%8798ol%E7%AB%99%E4%BD%8D%E5%8F%8A%E9%98%B5%E5%AE%B9%E6%8E%A8%E8%8D%90-%E5%9B%BE.jpg?v=201609121648',
            'url' => 'http://wiki.joyme.com/kof98/407763.shtml',
            'pubtime' => strtotime('2016/9/10'),
            'playTime' => 386,
            'category' => '',
        ),
        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '拳皇98OL 8月赛(iOS)KOF 黑店 2-0 童年天天',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/f/f7/%E6%8B%B3%E7%9A%8798OL-8%E6%9C%88%E8%B5%9B%28iOS%29KOF-%E9%BB%91%E5%BA%97-2-0-%E7%AB%A5%E5%B9%B4%E5%A4%A9%E5%A4%A9.jpg?v=201609141651',
            'url' => 'http://wiki.joyme.com/pvp/kof98/636246.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'playTime' => 124,
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '汤米酱拳皇98终极之战OL日常第二期',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/d/d8/%E6%B1%A4%E7%B1%B3%E9%85%B1%E6%8B%B3%E7%9A%8798%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98OL%E6%97%A5%E5%B8%B8%E7%AC%AC%E4%BA%8C%E6%9C%9F.jpg?v=201609141651',
            'url' => 'http://wiki.joyme.com/pvp/kof98/636243.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'playTime' => 4091,
            'category' => '',
        ),
        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '98拳皇终极之战OL草稚京六门展示',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/9/9e/98%E6%8B%B3%E7%9A%87%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98OL%E8%8D%89%E7%A8%9A%E4%BA%AC%E5%85%AD%E9%97%A8%E5%B1%95%E7%A4%BA.jpg?v=201609181746',
            'url' => 'http://wiki.joyme.com/kof98/636839.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'playTime' => 87,
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '拳皇98OL终极之战两个高V对决',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/f/fb/%E6%8B%B3%E7%9A%8798OL%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98%E4%B8%A4%E4%B8%AA%E9%AB%98V%E5%AF%B9%E5%86%B3.jpg?v=201609181746',
            'url' => 'http://wiki.joyme.com/kof98/636841.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'playTime' => 111,
            'category' => '',
        ),
        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '风流格斗家34期：蓝色忧郁-布鲁玛丽',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/6/6d/%E9%A3%8E%E6%B5%81%E6%A0%BC%E6%96%97%E5%AE%B634%E6%9C%9F%EF%BC%9A%E8%93%9D%E8%89%B2%E5%BF%A7%E9%83%81-%E5%B8%83%E9%B2%81%E7%8E%9B%E4%B8%BD.jpg?v=201609191729',
            'url' => 'http://wiki.joyme.com/kof98/637054.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'playTime' => 178,
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '七万战包子小哥狂吞包子耗死黑草',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/4/4c/%E4%B8%83%E4%B8%87%E6%88%98%E5%8C%85%E5%AD%90%E5%B0%8F%E5%93%A5%E7%8B%82%E5%90%9E%E5%8C%85%E5%AD%90%E8%80%97%E6%AD%BB%E9%BB%91%E8%8D%89.jpg?v=201609191729',
            'url' => 'http://wiki.joyme.com/kof98/637059.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'playTime' => 89,
            'category' => '',
        ),
        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '拳皇98终极之战ol草稚京无式霸气',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/9/9e/%E6%8B%B3%E7%9A%8798%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98ol%E8%8D%89%E7%A8%9A%E4%BA%AC%E6%97%A0%E5%BC%8F%E9%9C%B8%E6%B0%94.jpg?v=201609201802',
            'url' => 'http://wiki.joyme.com/kof98/637287.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'playTime' => 129,
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '拳皇98终极之战ol八神爆炒炎克',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/d/db/%E6%8B%B3%E7%9A%8798%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98ol%E5%85%AB%E7%A5%9E%E7%88%86%E7%82%92%E7%82%8E%E5%85%8B.jpg?v=201609201802',
            'url' => 'http://wiki.joyme.com/kof98/637289.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'playTime' => 47,
            'category' => '',
        ),

    );
}
elseif ($wgWikiname == 'ttkp') {
    $videos = array(
        array(
            'indexData' => '天天酷跑',
            'title' => '《天天酷跑》2015新春版宣传视频',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/0/01/%E6%9C%AA%E6%A0%87%E9%A2%98er-3.jpg?v=201609071916',
            'url' => 'http://wiki.joyme.com/ttkp/342552.shtml',
            'pubtime' => strtotime('2015/2/10'),
            'playTime' => 60,
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '《天天酷跑》大乐斗视频曝光',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/9/99/%E6%9C%AA%E6%A0%87drt%E9%A2%98-4.jpg?v=201609071918',
            'url' => 'http://wiki.joyme.com/ttkp/96361.shtml',
            'pubtime' => strtotime('2014/12/17'),
            'playTime' => 103,
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '《天天酷跑》新版本视频抢先看',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/a/a4/%E6%9C%AA%E6%A0%87swr%E9%A2%98-5.jpg?v=201609071919',
            'url' => 'http://wiki.joyme.com/ttkp/350398.shtml',
            'pubtime' => strtotime('2015/6/1'),
            'playTime' => 20,
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑2015新春版宣传视频',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/5/5f/%E6%9C%AA%E6%A0%87%E9%A2%98dt-6.jpg?v=201609071922',
            'url' => 'http://wiki.joyme.com/ttkp/342585.shtml',
            'pubtime' => strtotime('2015/2/6'),
            'playTime' => 60,
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '进击模式prefect教学视频',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/4/42/%E6%9C%AA%E6%A0%87%E9%A2%98sedr7.jpg?v=201609071925',
            'url' => 'http://wiki.joyme.com/ttkp/100665.shtml',
            'pubtime' => strtotime('2015/1/19'),
            'playTime' => 168,
            'category' => '',
        ),
        array(
            'indexData' => '天天酷跑',
            'title' => '神宠路西法实测',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/d/d6/%E6%9C%AA%E6%A0%87ereq%E9%A2%98-1.jpg?v=201609121656',
            'url' => 'http://wiki.joyme.com/ttkp/100666.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'playTime' => 394,
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '《天天酷跑》小魔女技能展示',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/4/44/%E6%9C%AA%E6%A0%87etue%E9%A2%98-1.jpg?v=201609121659',
            'url' => 'http://wiki.joyme.com/ttkp/87658.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'playTime' => 141,
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑皇家狮鹫搭配视频',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/c/c9/%E6%9C%AA%E6%A0%87asdf%E9%A2%98-1.jpg?v=201609131633',
            'url' => 'http://wiki.joyme.com/ttkp/636009.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'playTime' => 308,
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '宙斯合成与技能测试',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/f/f8/%E6%9C%AA%E6%A0%87sdfqw%E9%A2%98-1.jpg?v=201609131636',
            'url' => 'http://wiki.joyme.com/ttkp/100641.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'playTime' => 196,
            'category' => '',
        ),
        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑超神宠炎龙战神多人对战视频',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/2/2c/%E6%9C%AAweq%E6%A0%87%E9%A2%98-1.jpg?v=201609141332',
            'url' => 'http://wiki.joyme.com/ttkp/636174.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'playTime' => 200,
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑之吸血伯爵多人评测',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/0/03/%E6%9C%AA%E6%A0%87%E9%A2%98we4t-1.jpg?v=201609141651',
            'url' => 'http://wiki.joyme.com/ttkp/636249.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'playTime' => 212,
            'category' => '',
        ),
        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑三周年萌装坐骑小小兔简单测试',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/1/14/24343.jpg?v=201609181615',
            'url' => 'http://wiki.joyme.com/ttkp/636824.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'playTime' => 752,
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑罗杰正义绵羊,经典,急速,双模式7000米爆分',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/7/78/%E6%9C%AA%E8%AF%B7%E6%B8%A9%E6%9F%94%E6%A0%87%E9%A2%98-1.jpg?v=201609181625',
            'url' => 'http://wiki.joyme.com/ttkp/636827.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'playTime' => 811,
            'category' => '',
        ),
        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑熊猫剑客帽子先生得分能力测试',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/6/6e/%E6%9C%AA%E6%A0%87sdf%E9%A2%98-1.jpg?v=201609191530',
            'url' => 'http://wiki.joyme.com/ttkp/637037.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'playTime' => 646,
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑暗黑大圣多人经典战1分51秒',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/8/86/%E6%9C%AA%E6%A0%87ea%E9%A2%98-1.jpg?v=201609191538',
            'url' => 'http://wiki.joyme.com/ttkp/637044.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'playTime' => 128,
            'category' => '',
        ),
        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑炫装小帅初测试',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/1/1a/%E6%9C%AA%E6%A0%87w32%E9%A2%98-1.jpg?v=201609201719',
            'url' => 'http://wiki.joyme.com/ttkp/637242.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'playTime' => 502,
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑暴走罗杰5980米爆分',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/2/2d/%E6%9C%AA21q121.jpg?v=201609201722',
            'url' => 'http://wiki.joyme.com/ttkp/637250.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'playTime' => 230,
            'category' => '',
        ),

    );
}
elseif ($wgWikiname == 'vg') {
    $videos = array(
        array(
            'indexData' => '虚荣',
            'title' => '虚荣小贱,隐狐塔卡最强教学,刺客の艺术!!',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/4/4c/%E7%BC%A9%E7%95%A5%E5%9B%BE011.jpg?v=201609131646',
            'url' => 'http://wiki.joyme.com/vg/635962.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'playTime' => 1085,
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '虚荣空白辅助配合至关重要!',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/e/ed/%E7%BC%A9%E7%95%A5%E5%9B%BE012.jpg?v=201609131646',
            'url' => 'http://wiki.joyme.com/vg/635964.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'playTime' => 60,
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '【虚荣】月亮公主星乐斯视频展示',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/c/c4/%E7%BC%A9%E7%95%A5%E5%9B%BE55.jpg?v=201609121704',
            'url' => 'http://wiki.joyme.com/vg/635605.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'playTime' => 60,
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '【虚荣】对线天使压制之王!!虚荣vainglory',
            'image' => 'http://wiki.joyme.com/mxm2/%E6%96%87%E4%BB%B6:%E7%BC%A9%E7%95%A5%E5%9B%BE66.jpg',
            'url' => 'http://wiki.joyme.com/vg/635643.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'playTime' => 1021,
            'category' => '',
        ),
        array(
            'indexData' => '虚荣',
            'title' => '《虚荣》影狐塔卡英雄教学视频',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/1/18/Q0017.jpg?v=201609141658',
            'url' => 'http://wiki.joyme.com/vg/636152.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'playTime' => 289,
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '《虚荣》超音速丝凯伊二皮',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/f/f5/Q0018.jpg?v=201609141658',
            'url' => 'http://wiki.joyme.com/vg/636153.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'playTime' => 74,
            'category' => '',
        ),
        array(
            'indexData' => '虚荣',
            'title' => '【虚荣】隐狐塔卡,游走在伪装之下的利爪',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/6/66/Q0023.jpg?v=201609181726',
            'url' => 'http://wiki.joyme.com/vg/636729.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'playTime' => 1009,
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '【虚荣】鹰眼凯斯卓,杀人何必需要第二只箭',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/1/1b/Q0024.jpg?v=201609181726',
            'url' => 'http://wiki.joyme.com/vg/636736.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'playTime' => 121,
            'category' => '',
        ),
        array(
            'indexData' => '虚荣',
            'title' => '【虚荣】星际战士巴隆',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/4/45/Q0029.jpg?v=201609191659',
            'url' => 'http://wiki.joyme.com/vg/636960.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'playTime' => 1311,
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '【虚荣】时光追忆莱拉',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/d/d5/Q0030.jpg?v=201609191659',
            'url' => 'http://wiki.joyme.com/vg/636961.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'playTime' => 59,
            'category' => '',
        ),
        array(
            'indexData' => '虚荣',
            'title' => '【虚荣】见人就杀的莱拉英雄',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/9/9e/Q0035.jpg?v=201609201622',
            'url' => 'http://wiki.joyme.com/vg/637196.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'playTime' => 1119,
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '【虚荣】金灯莱拉英雄进阶教学视频',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/5/58/Q0036.jpg?v=201609201622',
            'url' => 'http://wiki.joyme.com/vg/637198.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'playTime' => 338,
            'category' => '',
        ),

    );
}


if ($videos) {
    foreach ($videos as $video) {
        echo json_encode($video);
        echo "\n";
    }
}