<?php
/**
 * Description:攻略模块
 * Author: gradydong
 * Date: 2016/9/6
 * Time: 11:12
 * Copyright: Joyme.com
 */
$wgWikiname = substr($_SERVER['HTTP_HOST'], 0, strpos($_SERVER['HTTP_HOST'], '.'));

header('Content-type:text/json; charset=utf-8');

$strategys = array();

if ($wgWikiname == 'pvp') {

    $strategys = array(
        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀老夫子，一个被忽视的暴力选手',
            'image' => 'http://joymepic.joyme.com/wiki/images/pvp/2/2a/%E7%8E%8B%E8%80%85%E8%8D%A3%E8%80%80%E8%80%81%E5%A4%AB%E5%AD%90%EF%BC%8C%E4%B8%80%E4%B8%AA%E8%A2%AB%E5%BF%BD%E8%A7%86%E7%9A%84%E6%9A%B4%E5%8A%9B%E9%80%89%E6%89%8B-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/pvp/619623.shtml',
            'pubtime' => strtotime("2016/7/15"),
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀马可波罗全方位攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/pvp/8/8a/%E7%8E%8B%E8%80%85%E8%8D%A3%E8%80%80%E9%A9%AC%E5%8F%AF%E6%B3%A2%E7%BD%97%E5%85%A8%E6%96%B9%E4%BD%8D%E6%94%BB%E7%95%A5-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/pvp/629110.shtml',
            'pubtime' => strtotime("2016/8/24"),
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀成吉思汗体验服前瞻',
            'image' => 'http://joymepic.joyme.com/wiki/images/pvp/3/39/%E7%8E%8B%E8%80%85%E8%8D%A3%E8%80%80%E6%88%90%E5%90%89%E6%80%9D%E6%B1%97%E4%BD%93%E9%AA%8C%E6%9C%8D%E5%89%8D%E7%9E%BB-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/pvp/632459.shtml',
            'pubtime' => strtotime("2016/8/30"),
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀新英雄橘右京出装攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/pvp/d/d4/%E7%8E%8B%E8%80%85%E8%8D%A3%E8%80%80%E6%96%B0%E8%8B%B1%E9%9B%84%E6%A9%98%E5%8F%B3%E4%BA%AC%E5%87%BA%E8%A3%85%E6%94%BB%E7%95%A5-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/pvp/633259.shtml',
            'pubtime' => strtotime("2016/9/2"),
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀孙尚香新手上分攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/pvp/1/14/%E7%8E%8B%E8%80%85%E8%8D%A3%E8%80%80%E5%AD%99%E5%B0%9A%E9%A6%99%E6%96%B0%E6%89%8B%E4%B8%8A%E5%88%86%E6%94%BB%E7%95%A5-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/pvp/627834.shtml',
            'pubtime' => strtotime("2016/8/16"),
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀菜刀队之十大必玩的职业',
            'image' => 'http://joymepic.joyme.com/wiki/images/pvp/b/bf/%E7%8E%8B%E8%80%85%E8%8D%A3%E8%80%80%E8%8F%9C%E5%88%80%E9%98%9F%E4%B9%8B%E5%8D%81%E5%A4%A7%E5%BF%85%E7%8E%A9%E7%9A%84%E8%81%8C%E4%B8%9A-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/pvp/626117.shtml',
            'pubtime' => strtotime("2016/8/11"),
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀体验服新英雄橘右京评测',
            'image' => 'http://joymepic.joyme.com/wiki/images/pvp/9/98/%E7%8E%8B%E8%80%85%E8%8D%A3%E8%80%80%E4%BD%93%E9%AA%8C%E6%9C%8D%E6%96%B0%E8%8B%B1%E9%9B%84%E6%A9%98%E5%8F%B3%E4%BA%AC%E8%AF%84%E6%B5%8B-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/pvp/625764.shtml',
            'pubtime' => strtotime("2016/8/10"),
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀刺客娜可露露纯肉攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/pvp/e/e9/%E7%8E%8B%E8%80%85%E8%8D%A3%E8%80%80%E5%88%BA%E5%AE%A2%E5%A8%9C%E5%8F%AF%E9%9C%B2%E9%9C%B2%E7%BA%AF%E8%82%89%E6%94%BB%E7%95%A5-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/pvp/624451.shtml',
            'pubtime' => strtotime("2016/8/5"),
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀曹操另类出装攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/pvp/4/42/%E7%8E%8B%E8%80%85%E8%8D%A3%E8%80%80%E6%9B%B9%E6%93%8D%E5%8F%A6%E7%B1%BB%E5%87%BA%E8%A3%85%E6%94%BB%E7%95%A5-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/pvp/623660.shtml',
            'pubtime' => strtotime("2016/8/3"),
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀夏侯淳出装及对战攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/pvp/f/f2/%E7%8E%8B%E8%80%85%E8%8D%A3%E8%80%80%E5%A4%8F%E4%BE%AF%E6%B7%B3%E5%87%BA%E8%A3%85%E5%8F%8A%E5%AF%B9%E6%88%98%E6%94%BB%E7%95%A5-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/pvp/620939.shtml',
            'pubtime' => strtotime("2016/7/20"),
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀橘右京符文出装攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/a/ab/橘石京！！！攻略.jpg?v=201609131541',
            'url' => 'http://wiki.joyme.com/pvp/634668.shtml',
            'pubtime' => strtotime('2016/9/9'),
            'category' => '',
        ),

        array(
            'indexData' => '王者荣耀',
            'title' => '进击的女神露娜教学攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/9/9e/露娜教学攻略！！！.jpg?v=201609131541',
            'url' => 'http://wiki.joyme.com/pvp/622503.shtml',
            'pubtime' => strtotime('2016/9/1'),
            'category' => '',
        ),

        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀杨戬体验服评测分析',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/f/f8/杨戬体验服评测-1哥伦布.jpg?v=201609121715',
            'url' => 'http://wiki.joyme.com/pvp/635517.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '王者荣耀',
            'title' => '王者姬驾到十六期杨戬算什么？',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/d/d1/王者鸡哥伦布.jpg?v=201609121715',
            'url' => 'http://wiki.joyme.com/pvp/634907.shtml',
            'pubtime' => strtotime('2016/9/9'),
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '王者姬驾到第十七期请接黄金狗粮',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/a/a4/%E7%8E%8B%E8%80%85%E5%A7%AC%E9%A9%BE%E5%88%B0%E7%AC%AC%E5%8D%81%E4%B8%83%E6%9C%9F%E8%AF%B7%E6%8E%A5%E9%BB%84%E9%87%91%E7%8B%97%E7%B2%AE.jpg?v=201609141743',
            'url' => 'http://wiki.joyme.com/pvp/636155.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),

        array(
            'indexData' => '王者荣耀',
            'title' => '王者故事第七章 一代鬼神 吕布',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/0/05/%E7%8E%8B%E8%80%85%E6%95%85%E4%BA%8B%E7%AC%AC%E4%B8%83%E7%AB%A0_%E4%B8%80%E4%BB%A3%E9%AC%BC%E7%A5%9E_%E5%90%95%E5%B8%83.jpg?v=201609141743',
            'url' => 'http://wiki.joyme.com/pvp/635995.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '王者姬驾到第十二期孙尚香进化篇',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/6/64/孙尚香1111.jpg?v=201609181655',
            'url' => 'http://wiki.joyme.com/pvp/632325.shtml',
            'pubtime' => strtotime('2016/9/9'),
            'category' => '',
        ),

        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀菜刀队之十大必玩的职业',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/c/c1/菜刀队1111.jpg?v=201609181655',
            'url' => 'http://wiki.joyme.com/pvp/626117.shtml',
            'pubtime' => strtotime('2016/9/1'),
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀杨戬体验服前瞻',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/2/2b/杨戬体验服的1.jpg?v=201609191605',
            'url' => 'http://wiki.joyme.com/pvp/636937.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),

        array(
            'indexData' => '王者荣耀',
            'title' => '王者姬驾到18期走向末日的感情',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/2/22/王者鸡的18期.jpg?v=201609191605',
            'url' => 'http://wiki.joyme.com/pvp/636869.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '王者姬驾到第十期 风油精是什么鬼',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/7/7a/王者鸡第十期！.jpg?v=201609201544',
            'url' => 'http://wiki.joyme.com/pvp/628004.shtml',
            'pubtime' => strtotime('2016/9/10'),
            'category' => '',
        ),

        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀曹操另类出装攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/b/b4/曹操的非主流！.jpg?v=201609201544',
            'url' => 'http://wiki.joyme.com/pvp/623660.shtml',
            'pubtime' => strtotime('2016/9/7'),
            'category' => '',
        ),

    );

} elseif ($wgWikiname == 'cf') {
    $strategys =  array(
        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '穿越火线各类武器齐上阵 武器大乱斗模式详解',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/f/f1/穿越火线各类武器齐上阵_武器大乱斗模式详解111.jpg?v=201609071617',
            'url' => 'http://wiki.joyme.com/cf/599630.shtml',
            'pubtime' => strtotime('2016/8/15'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'CF手游大桥激战用什么武器好',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/3/3d/CFDE2222222222222222222222.jpg?v=201609071617',
            'url' => 'http://wiki.joyme.com/cf/633799.shtml',
            'pubtime' => strtotime('2016/8/24'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'CF手游火箭筒大乱斗攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/b/bc/CF的33333333333333.jpg?v=201609071617',
            'url' => 'http://wiki.joyme.com/cf/633798.shtml',
            'pubtime' => strtotime('2016/8/27'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'CF手游UZI处女座怎么获得',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/a/a0/CFDE_4444444444.jpg?v=201609071617',
            'url' => 'http://wiki.joyme.com/cf/633790.shtml',
            'pubtime' => strtotime('2016/9/2'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'CF手游沙漠灰打法攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/a/a7/CFDE_555555555.jpg?v=201609071617',
            'url' => 'http://wiki.joyme.com/cf/633782.shtml',
            'pubtime' => strtotime('2016/8/16'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'CF手游异域小镇怎么打',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/3/3b/CfDE566666666666.jpg?v=201609071617',
            'url' => 'http://wiki.joyme.com/cf/633784.shtml',
            'pubtime' => strtotime('2016/8/17'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'CF手游卫星基地用什么枪好',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/6/61/CFDE_77777777.jpg?v=201609071617',
            'url' => 'http://wiki.joyme.com/cf/633783.shtml',
            'pubtime' => strtotime('2016/8/10'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'CF手游雷霆山庄狙击点位攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/9/99/Cfde88888888.jpg?v=201609071617',
            'url' => 'http://wiki.joyme.com/cf/633785.shtml',
            'pubtime' => strtotime('2016/8/7'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '穿越火线手游刀王大乱斗模式打法',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/2/26/CFDE99999999.jpg?v=201609071617',
            'url' => 'http://wiki.joyme.com/cf/599616.shtml',
            'pubtime' => strtotime('2016/8/12'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '枪王大神上分指南，简单玩转椰岛之颠',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/b/b9/Cfde_100000.jpg?v=201609071617',
            'url' => 'http://wiki.joyme.com/cf/562419.shtml',
            'pubtime' => strtotime('2016/7/27'),
            'category' => '',
        ),
        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '穿越火线CF手游激战大桥之上',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/9/97/CF大桥基站！！！.jpg?v=201609131541',
            'url' => 'http://wiki.joyme.com/cf/635655.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'CF手游火箭筒大乱斗攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/d/df/火箭筒大乱斗.jpg?v=201609131541',
            'url' => 'http://wiki.joyme.com/cf/633798.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '空间站的杀戮我们无所畏惧 拿起家伙大战到底',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/9/93/空间站的沙拉才CD哥伦布.jpg?v=201609121715',
            'url' => 'http://wiki.joyme.com/cf/635598.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '翻开个人狙战的神兵宝典 让神兵利器伴你征战天涯',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/7/7b/神兵的哥伦布.jpg?v=201609121715',
            'url' => 'http://wiki.joyme.com/cf/635675.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),
        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '穿越火线枪战王者牡丹套装系列汇总',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/6/6e/Cfs91402.png?imageView/1/w/120/h/120/v=201609141912',
            'url' => 'http://wiki.joyme.com/cf/636275.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '穿越火线枪战王者新版生化统领玩法分解',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/0/00/Cfs91401.png?imageView/1/w/120/h/120/v=201609141912',
            'url' => 'http://wiki.joyme.com/cf/636276.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '穿越火线CF手游激战大桥之上',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/9/97/CF大桥基站！！！.jpg?v=201609131541',
            'url' => 'http://wiki.joyme.com/cf/635655.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'CF手游火箭筒大乱斗攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/d/df/火箭筒大乱斗.jpg?v=201609131541',
            'url' => 'http://wiki.joyme.com/cf/633798.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '空间站的杀戮我们无所畏惧 拿起家伙大战到底',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/9/93/空间站的沙拉才CD哥伦布.jpg?v=201609121715',
            'url' => 'http://wiki.joyme.com/cf/635598.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '翻开个人狙战的神兵宝典 让神兵利器伴你征战天涯',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/7/7b/神兵的哥伦布.jpg?v=201609121715',
            'url' => 'http://wiki.joyme.com/cf/635675.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),
        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '穿越火线手游火箭筒大乱斗攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/f/f3/火箭筒大乱斗11111.jpg?v=201609181655',
            'url' => 'http://wiki.joyme.com/cf/636747.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '穿越火线手游团队模式龙城地图点位详解',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/f/fe/龙城地图详解1111.jpg?v=201609181655',
            'url' => 'http://wiki.joyme.com/cf/603474.shtml',
            'pubtime' => strtotime('2016/8/23'),
            'category' => '',
        ),
        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'CF手游UZI处女座怎么获得',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/9/90/UZI射的不停.jpg?v=201609191605',
            'url' => 'http://wiki.joyme.com/cf/633790.shtml_',
            'pubtime' => strtotime('2016/9/10'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'CF手游新年广场bug大全',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/4/44/新年广场的BUGG.jpg?v=201609191605',
            'url' => 'http://wiki.joyme.com/cf/633787.shtml',
            'pubtime' => strtotime('2016/8/27'),
            'category' => '',
        ),
        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '穿越火线手游小地图怎么看 小地图功能详解',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/0/0c/教你怎么看地图！！！.jpg?v=201609201544',
            'url' => 'http://wiki.joyme.com/cf/409785.shtml',
            'pubtime' => strtotime('2016/9/1'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '穿越火线手游狙击如何精通 狙击切换时间详解',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/3/3f/教你如何使用狙击！！.jpg?v=201609201544',
            'url' => 'http://wiki.joyme.com/cf/410591.shtml',
            'pubtime' => strtotime('2016/8/12'),
            'category' => '',
        ),

    );
} elseif ($wgWikiname == 'pokemongo') {
    $strategys =  array(
        array(
            'indexData' => 'pokemon go',
            'title' => '口袋妖怪GO先强化还是先进化',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/8/80/PMGO%E6%94%BB%E7%95%A51.png?imageView/1/w/240/h/236/v=201609080922',
            'url' => 'http://wiki.joyme.com/pokemongo/%E5%8F%A3%E8%A2%8B%E5%A6%96%E6%80%AAGO%E5%85%88%E5%BC%BA%E5%8C%96%E8%BF%98%E6%98%AF%E5%85%88%E8%BF%9B%E5%8C%96',
            'pubtime' => strtotime('2016/7/22'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '口袋妖怪GO什么是CP',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/d/df/PMGO%E6%94%BB%E7%95%A52.png?imageView/1/w/240/h/234/v=201609080922',
            'url' => 'http://wiki.joyme.com/pokemongo/%E5%8F%A3%E8%A2%8B%E5%A6%96%E6%80%AAGO%E4%BB%80%E4%B9%88%E6%98%AFCP',
            'pubtime' => strtotime('2016/7/26'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '口袋妖怪GO精灵死了怎么办',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/f/fc/PMGO%E6%94%BB%E7%95%A53.png?imageView/1/w/240/h/234/v=201609080922',
            'url' => 'http://wiki.joyme.com/pokemongo/%E5%8F%A3%E8%A2%8B%E5%A6%96%E6%80%AAGO%E7%B2%BE%E7%81%B5%E6%AD%BB%E4%BA%86%E6%80%8E%E4%B9%88%E5%8A%9E',
            'pubtime' => strtotime('2016/7/27'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => 'PokemonGo新手宠物选哪只好',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/b/b9/PMGO%E6%94%BB%E7%95%A54.png?imageView/1/w/180/h/173/v=201609080922',
            'url' => 'http://wiki.joyme.com/pokemongo/PokemonGo%E6%96%B0%E6%89%8B%E5%AE%A0%E7%89%A9%E9%80%89%E5%93%AA%E5%8F%AA%E5%A5%BD',
            'pubtime' => strtotime('2016/8/3'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => 'PokemonGO新版本实力前十小精灵',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/5/5b/PMGO%E6%94%BB%E7%95%A55.png?imageView/1/w/240/h/216/v=201609080922',
            'url' => 'http://wiki.joyme.com/pokemongo/PokemonGO%E6%96%B0%E7%89%88%E6%9C%AC%E5%AE%9E%E5%8A%9B%E5%89%8D%E5%8D%81%E5%B0%8F%E7%B2%BE%E7%81%B5',
            'pubtime' => strtotime('2016/8/9'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => 'PokemonGo不小心放生了精灵怎么办',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/a/a7/PMGO%E6%94%BB%E7%95%A56.png?imageView/1/w/240/h/236/v=201609080922',
            'url' => 'http://wiki.joyme.com/pokemongo/PokemonGo%E4%B8%8D%E5%B0%8F%E5%BF%83%E6%94%BE%E7%94%9F%E4%BA%86%E7%B2%BE%E7%81%B5%E6%80%8E%E4%B9%88%E5%8A%9E',
            'pubtime' => strtotime('2016/8/15'),
            'category' => '',
        ),
        array(
            'indexData' => 'pokemon go',
            'title' => 'Pokemon GO精灵宝可梦GO卡比兽克星 攻道馆宝可梦',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/8/82/1502.jpg?v=201609121900',
            'url' => 'http://wiki.joyme.com/pokemongo/%E5%85%8B%E6%98%9F',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO最佳防守精灵 哪只技能最强',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/8/87/1503.jpg?v=201609131054',
            'url' => 'http://wiki.joyme.com/pokemongo/%E6%9C%80%E4%BD%B3%E5%AE%A0%E7%89%A9',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO新手精灵技能搭配分析',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/5/5e/1504.jpg?v=201609131128',
            'url' => 'http://wiki.joyme.com/pokemongo/%E7%B2%BE%E7%81%B5%E6%8A%80%E8%83%BD%E6%90%AD%E9%85%8D',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO卡比兽克星及方法 攻击道馆宝可梦推荐',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/f/f5/150.jpg?v=201609131154',
            'url' => 'http://wiki.joyme.com/pokemongo/%E6%AF%94%E5%8D%A1%E5%85%BD',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '口袋妖怪GO道馆如何升级?道馆系统分析',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/8/82/1502.jpg?v=201609131425',
            'url' => 'http://wiki.joyme.com/pokemongo/%E9%81%93%E9%A6%86%E5%8D%87%E7%BA%A7',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO成就攻略 有哪些成就',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/8/87/1503.jpg?v=201609131520',
            'url' => 'http://wiki.joyme.com/pokemongo/%E6%88%90%E5%B0%B1%E6%94%BB%E7%95%A5',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO补给站有隐藏小技巧 左转右转',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/f/f5/150.jpg?v=201609131626',
            'url' => 'http://wiki.joyme.com/pokemongo/%E9%9A%90%E8%97%8F%E6%8A%80%E5%B7%A7',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO升级背包容量 需要哪些条件',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/8/82/1502.jpg?v=201609131716',
            'url' => 'http://wiki.joyme.com/pokemongo/%E6%8F%90%E5%8D%87%E8%83%8C%E5%8C%85%E5%AE%B9%E9%87%8F',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => 'Pokemon GO精灵宝可梦GO卡比兽克星 攻道馆宝可梦',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/8/82/1502.jpg?v=201609121900',
            'url' => 'http://wiki.joyme.com/pokemongo/%E5%85%8B%E6%98%9F',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),
        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO快龙防守道馆怎么打',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/8/82/1502.jpg?v=201609141629',
            'url' => 'http://wiki.joyme.com/pokemongo/%E6%89%93%E5%BF%AB%E9%BE%99%E9%81%93%E9%A6%86',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO快速免费获得星尘/金币攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/8/87/1503.jpg?v=201609141649',
            'url' => 'http://wiki.joyme.com/pokemongo/%E6%98%9F%E5%B0%98%E9%87%91%E5%B8%81',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),
        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO卡蒂狗捕捉攻略 在哪可以抓到',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/f/f5/150.jpg?v=201609181058',
            'url' => 'http://wiki.joyme.com/pokemongo/%E5%8D%A1%E8%92%82%E7%8B%97',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO快速升级攻略技巧 10分钟足矣',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/f/f5/150.jpg?v=201609181126',
            'url' => 'http://wiki.joyme.com/pokemongo/%E5%BF%AB%E9%80%9F%E5%8D%87%E7%BA%A7',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),
        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO道馆胜率提升60% 如何搭配精灵',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/f/f5/150.jpg?v=201609191046',
            'url' => 'http://wiki.joyme.com/pokemongo/%E6%88%98%E8%83%9C%E7%8E%87',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO精灵排行榜 哪些值得培养',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/8/82/1502.jpg?v=201609191103',
            'url' => 'http://wiki.joyme.com/pokemongo/%E7%B2%BE%E7%81%B5%E6%8E%92%E8%A1%8C%E6%A6%9C',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),
        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO精灵里数清单 多远可获得糖果',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/f/f5/150.jpg?v=201609201028',
            'url' => 'http://wiki.joyme.com/pokemongo/%E7%B2%BE%E7%81%B5%E9%87%8C%E6%95%B0',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO锁区孵蛋可以吗',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/f/f5/150.jpg?v=201609201449',
            'url' => 'http://wiki.joyme.com/pokemongo/%E9%94%81%E5%8C%BA%E5%AD%B5%E8%9B%8B',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

    );
} elseif ($wgWikiname == 'qmqj') {
    $strategys =  array(
        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》异常属性怎么玩 梅林之书技巧',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/7/7f/W3.png?v=201609071547',
            'url' => 'http://wiki.joyme.com/qmqj/398642.shtml',
            'pubtime' => strtotime('2016/6/19'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》卡转玩法利弊解析',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/5/59/Q75.png?v=201609071553',
            'url' => 'http://wiki.joyme.com/qmqj/393071.shtml',
            'pubtime' => strtotime('2016/6/27'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》经验副本攻略剖析',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/3/30/Q72.png?v=201609071558',
            'url' => 'http://wiki.joyme.com/qmqj/393063.shtml',
            'pubtime' => strtotime('2016/7/4'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》水晶幻境攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/3/37/Q69.png?v=201609071600',
            'url' => 'http://wiki.joyme.com/qmqj/392803.shtml',
            'pubtime' => strtotime('2016/7/7'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》万魔塔登天攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/e/e7/Q67.png?v=201609071600',
            'url' => 'http://wiki.joyme.com/qmqj/392787.shtml',
            'pubtime' => strtotime('2016/7/25'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》主流精灵盘点',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/4/40/Q64.png?v=201609071606',
            'url' => 'http://wiki.joyme.com/qmqj/392580.shtml',
            'pubtime' => strtotime('2016/7/29'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》浅谈战盟兑换价比',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/8/8c/Q56.jpg?v=201609071608',
            'url' => 'http://wiki.joyme.com/qmqj/391915.shtml',
            'pubtime' => strtotime('2016/8/3'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》额外奖励获得技巧',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/0/0a/Q51.png?v=201609071609',
            'url' => 'http://wiki.joyme.com/qmqj/392607.shtml',
            'pubtime' => strtotime('2016/8/10'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》可爱又凶残星辰',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/d/db/Q59.jpg?v=201609071610',
            'url' => 'http://wiki.joyme.com/qmqj/391919.shtml',
            'pubtime' => strtotime('2016/8/15'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》玩家祈福技巧',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/5/5c/Q17.jpg?v=201609071612',
            'url' => 'http://wiki.joyme.com/qmqj/391337.shtml',
            'pubtime' => strtotime('2016/8/22'),
            'category' => '',
        ),
        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》全民奇迹法师职业历史前瞻',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/4/41/234.jpg?v=201609131352',
            'url' => 'http://wiki.joyme.com/qmqj/95003.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》弓箭手养成记之装备篇',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/5/54/%E3%80%8A%E5%85%A8%E6%B0%91%E5%A5%87%E8%BF%B9%E3%80%8B%E5%BC%93%E7%AE%AD%E6%89%8B%E5%85%BB%E6%88%90%E8%AE%B0%E4%B9%8B%E8%A3%85%E5%A4%87%E7%AF%87.png?v=201609131352',
            'url' => 'http://wiki.joyme.com/qmqj/95011.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》新版本转职系统解析（1）',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/8/85/%E6%96%B0%E7%89%88%E6%9C%AC%E8%BD%AC%E8%81%8C%E7%B3%BB%E7%BB%9F%E8%A7%A3%E6%9E%901.jpg?v=201609121624',
            'url' => 'http://wiki.joyme.com/qmqj/635588.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》新版本转职系统解析（2）',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/9/96/2b2763faaf51f3de93ba83cf9ceef01f3b2979c6_%E5%89%AF%E6%9C%AC.jpg?v=201609121624',
            'url' => 'http://wiki.joyme.com/qmqj/635659.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),
        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》战士职业怎么玩 勇者大陆剑士称霸',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/4/4c/%E5%8B%87%E8%80%85%E5%A4%A7%E9%99%86%E5%89%91%E5%A3%AB%E7%A7%B0%E9%9C%B8.png?v=201609141058',
            'url' => 'http://wiki.joyme.com/qmqj/94992.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》强势法爷对比弓手深度讲解',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/8/88/%E6%B3%95%E5%B8%88.jpg?v=201609141058',
            'url' => 'http://wiki.joyme.com/qmqj/95001.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),
        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》法师职业优劣势分析',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/a/aa/1431313.jpg?v=201609181346',
            'url' => 'http://wiki.joyme.com/qmqj/95000.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '有种单挑 《全民奇迹》战士PK“葵花宝典”',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/7/76/%E3%80%8A%E5%85%A8%E6%B0%91%E5%A5%87%E8%BF%B9%E3%80%8B%E6%88%98%E5%A3%ABPK%E2%80%9C%E8%91%B5%E8%8A%B1%E5%AE%9D%E5%85%B8%E2%80%9D.jpg?v=201609181346',
            'url' => 'http://wiki.joyme.com/qmqj/94991.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),
        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》战士职业技能加点攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/9/98/2434234.jpg?v=201609191408',
            'url' => 'http://wiki.joyme.com/qmqj/94990.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '揭秘《全民奇迹》弓箭手套装',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/8/85/%E3%80%8A%E5%85%A8%E6%B0%91%E5%A5%87%E8%BF%B9%E3%80%8B%E5%BC%93%E7%AE%AD%E6%89%8B%E5%A5%97%E8%A3%85.jpg?v=201609191408',
            'url' => 'http://wiki.joyme.com/qmqj/94982.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),
        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》弓箭手职业技能加点秘籍',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/9/98/2434234.jpg?v=201609191408',
            'url' => 'http://wiki.joyme.com/qmqj/94981.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => ' 两台手机成就《全民奇迹》牛逼剑士',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/8/85/%E3%80%8A%E5%85%A8%E6%B0%91%E5%A5%87%E8%BF%B9%E3%80%8B%E5%BC%93%E7%AE%AD%E6%89%8B%E5%A5%97%E8%A3%85.jpg?v=201609191408',
            'url' => 'http://wiki.joyme.com/qmqj/94977.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

    );
} elseif ($wgWikiname == 'lol') {
    $strategys =  array(
        array(
            'indexData' => '英雄联盟',
            'title' => '2016 LOL战斗之夜时间确定9月12日 奖励皮肤',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/8/8b/%E6%88%98%E6%96%97%E4%B9%8B%E5%A4%9C.jpg?imageView/1/w/120/h/120/v=201609080947',
            'url' => 'http://wiki.joyme.com/lol/2016_LOL%E6%88%98%E6%96%97%E4%B9%8B%E5%A4%9C%E6%97%B6%E9%97%B4%E7%A1%AE%E5%AE%9A9%E6%9C%8812%E6%97%A5_%E5%A5%96%E5%8A%B1%E7%9A%AE%E8%82%A4',
            'pubtime' => strtotime('2016/9/2'),
            'category' => '',
        ),

        array(
            'indexData' => '英雄联盟',
            'title' => '2016年LOL第133位新英雄语音曝光 又是打野？',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/d/d3/2016%E5%B9%B4LOL%E7%AC%AC133%E4%BD%8D%E6%96%B0%E8%8B%B1%E9%9B%84.jpg?imageView/1/w/120/h/120/v=201609080947',
            'url' => 'http://wiki.joyme.com/lol/2016%E5%B9%B4LOL%E7%AC%AC133%E4%BD%8D%E6%96%B0%E8%8B%B1%E9%9B%84%E8%AF%AD%E9%9F%B3%E6%9B%9D%E5%85%89_%E5%8F%88%E6%98%AF%E6%89%93%E9%87%8E%EF%BC%9F',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '英雄联盟',
            'title' => '2016 LOL源计划头像领取地址及任务条件',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/a/a3/%E4%BB%BB%E5%8A%A1%E6%BA%90%E8%AE%A1%E5%88%92.jpg?imageView/1/w/120/h/120/v=201609080947',
            'url' => 'http://wiki.joyme.com/lol/2016_LOL%E6%BA%90%E8%AE%A1%E5%88%92%E5%A4%B4%E5%83%8F%E9%A2%86%E5%8F%96%E5%9C%B0%E5%9D%80%E5%8F%8A%E4%BB%BB%E5%8A%A1%E6%9D%A1%E4%BB%B6',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '英雄联盟',
            'title' => 'LOL厨师系列皮肤新加4款 含阿卡丽潘森',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/c/ce/LOL%E5%8E%A8%E5%B8%88%E7%9A%AE%E8%82%A4%E6%96%B0%E5%A2%9E4%E6%AC%BE.jpg?imageView/1/w/120/h/120/v=201609080947',
            'url' => 'http://wiki.joyme.com/lol/LOL%E5%8E%A8%E5%B8%88%E7%B3%BB%E5%88%97%E7%9A%AE%E8%82%A4%E6%96%B0%E5%8A%A04%E6%AC%BE_%E5%90%AB%E9%98%BF%E5%8D%A1%E4%B8%BD%E6%BD%98%E6%A3%AE',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '英雄联盟',
            'title' => 'LOL 6.17小法符文天赋推荐 后期最强中单',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/2/29/%E9%82%AA%E6%81%B6%E5%B0%8F%E6%B3%95%E5%B8%88%E7%BB%B4%E5%98%89%E5%8E%9F%E7%94%BB.jpg?imageView/1/w/120/h/120/v=201609080947',
            'url' => 'http://wiki.joyme.com/lol/LOL_6.17%E5%B0%8F%E6%B3%95%E7%AC%A6%E6%96%87%E5%A4%A9%E8%B5%8B%E6%8E%A8%E8%8D%90_%E5%90%8E%E6%9C%9F%E6%9C%80%E5%BC%BA%E4%B8%AD%E5%8D%95',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '英雄联盟',
            'title' => 'LOL 6.17中单飞机天赋符文推荐 强势中单',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/4/48/%E8%8B%B1%E5%8B%87%E6%8A%95%E5%BC%B9%E6%89%8B%E5%BA%93%E5%A5%87.jpg?imageView/1/w/120/h/120/v=201609080947',
            'url' => 'http://wiki.joyme.com/lol/LOL_6.17%E4%B8%AD%E5%8D%95%E9%A3%9E%E6%9C%BA%E5%A4%A9%E8%B5%8B%E7%AC%A6%E6%96%87%E6%8E%A8%E8%8D%90_%E5%BC%BA%E5%8A%BF%E4%B8%AD%E5%8D%95',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '英雄联盟',
            'title' => 'LOL 9月轮换模式日程表2016 吉格斯实验室预测',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/e/ee/9%E6%9C%88%E8%BD%AE%E6%8D%A2%E6%A8%A1%E5%BC%8F%E8%A1%A8.jpg?imageView/1/w/120/h/120/v=201609080947',
            'url' => 'http://wiki.joyme.com/lol/LOL_9%E6%9C%88%E8%BD%AE%E6%8D%A2%E6%A8%A1%E5%BC%8F%E6%97%A5%E7%A8%8B%E8%A1%A82016_%E5%90%89%E6%A0%BC%E6%96%AF%E5%AE%9E%E9%AA%8C%E5%AE%A4%E9%A2%84%E6%B5%8B',
            'pubtime' => strtotime('2016/9/5'),
            'category' => '',
        ),

        array(
            'indexData' => '英雄联盟',
            'title' => 'LOL电玩阿狸、EZ、库奇限时出售',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/3/3f/%E5%85%A8%E6%96%B0%E7%94%B5%E7%8E%A9%E7%9A%AE%E8%82%A4%E7%A4%BC%E5%8C%85.jpg?imageView/1/w/120/h/120/v=201609080947',
            'url' => 'http://wiki.joyme.com/lol/LOL%E7%94%B5%E7%8E%A9%E9%98%BF%E7%8B%B8%E3%80%81EZ%E3%80%81%E5%BA%93%E5%A5%87%E9%99%90%E6%97%B6%E5%87%BA%E5%94%AE',
            'pubtime' => strtotime('2016/9/2'),
            'category' => '',
        ),

        array(
            'indexData' => '英雄联盟',
            'title' => 'LOL 6.17 VN出装推荐 暴力薇恩出装',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/a/a4/VNgonglve.jpg?imageView/1/w/120/h/120/v=201609080947',
            'url' => 'http://wiki.joyme.com/lol/LOL_6.17_VN%E5%87%BA%E8%A3%85%E6%8E%A8%E8%8D%90_%E6%9A%B4%E5%8A%9B%E8%96%87%E6%81%A9%E5%87%BA%E8%A3%85',
            'pubtime' => strtotime('2016/9/2'),
            'category' => '',
        ),

        array(
            'indexData' => '英雄联盟',
            'title' => 'LOL 6.17船长天赋符文 上单出装推荐',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/0/0b/%E6%B5%B7%E6%B4%8B%E4%B9%8B%E7%81%BE%E6%99%AE%E6%9C%97%E5%85%8B.jpg?imageView/1/w/120/h/120/v=201609080947',
            'url' => 'http://wiki.joyme.com/lol/LOL_6.17%E8%88%B9%E9%95%BF%E5%A4%A9%E8%B5%8B%E7%AC%A6%E6%96%87_%E4%B8%8A%E5%8D%95%E5%87%BA%E8%A3%85%E6%8E%A8%E8%8D%90',
            'pubtime' => strtotime('2016/9/2'),
            'category' => '',
        ),
    );
} elseif ($wgWikiname == 'qlz') {
    $strategys =  array(
        array(
            'indexData' => '龙珠激斗',
            'title' => '龙珠激斗悟天克斯怎么得 悟天克斯值得培养吗',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/0/08/%E6%9F%90%E7%BC%A9%E7%95%A5%E5%9B%BE1.png?v=201609071524',
            'url' => 'http://wiki.joyme.com/qlz/634082.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '龙珠激斗伙伴系统怎么玩 伙伴系统玩法攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/d/d0/%E6%9F%90%E7%BC%A9%E7%95%A5%E5%9B%BE2.png?imageView/1/w/120/h/120/v=201609071545',
            'url' => 'http://wiki.joyme.com/qlz/634083.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '龙珠激斗孙悟空值得培养吗 孙悟空技能羁绊解析',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/9/9a/%E6%9F%90%E7%BC%A9%E7%95%A5%E5%9B%BE3.png?imageView/1/w/120/h/120/v=201609071545',
            'url' => 'http://wiki.joyme.com/qlz/634084.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '【玩法】合体有诀窍！技能搭配盘点',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/1/1a/%E6%9F%90%E7%BC%A9%E7%95%A5%E5%9B%BE4.png?imageView/1/w/120/h/120/v=201609071545',
            'url' => 'http://wiki.joyme.com/qlz/622452.shtml',
            'pubtime' => strtotime('2016/7/26'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '龙珠激斗蛇道极限挑战 策略赢取积分',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/6/66/%E6%9F%90%E7%BC%A9%E7%95%A5%E5%9B%BE5.png?imageView/1/w/120/h/120/v=201609071545',
            'url' => 'http://wiki.joyme.com/qlz/599290.shtml',
            'pubtime' => strtotime('2016/4/26'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '神上神，界王神的祝福',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/5/56/%E6%9F%90%E7%BC%A9%E7%95%A5%E5%9B%BE6.png?v/1/w/120/h/120/v=201609071545',
            'url' => 'http://wiki.joyme.com/qlz/631772.shtml',
            'pubtime' => strtotime('2016/8/26'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '神级辅助东界王神降临',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/a/a1/%E6%9F%90%E7%BC%A9%E7%95%A5%E5%9B%BE7.png?imageView/1/w/120/h/120/v=201609071545',
            'url' => 'http://wiki.joyme.com/qlz/628861.shtml',
            'pubtime' => strtotime('2016/8/23'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '合理利用每一分钟 每日活动最优路线',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/b/bb/%E6%9F%90%E7%BC%A9%E7%95%A5%E5%9B%BE8.png?imageView/1/w/120/h/120/v=201609071545',
            'url' => 'http://wiki.joyme.com/qlz/633316.shtml',
            'pubtime' => strtotime('2016/9/2'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '平民至上 《龙珠激斗》竞技场小众卡组推荐',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/c/c5/%E6%9F%90%E7%BC%A9%E7%95%A5%E5%9B%BE9.png?imageView/1/w/120/h/120/v=201609071545',
            'url' => 'http://wiki.joyme.com/qlz/632772.shtml',
            'pubtime' => strtotime('2016/8/31'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '来八一八《龙珠激斗》到底哪种称号适合你？',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/b/b5/%E6%9F%90%E7%BC%A9%E7%95%A5%E5%9B%BE10.png?imageView/1/w/120/h/120/v=201609071545',
            'url' => 'http://wiki.joyme.com/qlz/627629.shtml',
            'pubtime' => strtotime('2016/8/17'),
            'category' => '',
        ),
        array(
            'indexData' => '龙珠激斗',
            'title' => '龙珠激斗最可爱的少女 人小鬼大斑斑定位',
            'image' => 'http://wiki.joyme.com/mhx/%E6%96%87%E4%BB%B6:%E7%BC%A9%E7%95%A5%E5%9B%BE009.jpg',
            'url' => 'http://wiki.joyme.com/qlz/635842.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '龙珠激斗超赛孙悟空技能实战效果分析',
            'image' => 'http://wiki.joyme.com/mhx/%E6%96%87%E4%BB%B6:%E7%BC%A9%E7%95%A5%E5%9B%BE010.jpg',
            'url' => 'http://wiki.joyme.com/qlz/635765.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '【VIP召唤】破碎苍穹,绝代王者沙鲁来袭',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/4/4e/%E7%BC%A9%E7%95%A5%E5%9B%BE33.jpg?v=201609121732',
            'url' => 'http://wiki.joyme.com/qlz/635644.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '伙伴系统对龙珠阵容影响解析',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/f/fb/%E7%BC%A9%E7%95%A5%E5%9B%BE44.jpg?v=201609121732',
            'url' => 'http://wiki.joyme.com/qlz/635654.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),
        array(
            'indexData' => '龙珠激斗',
            'title' => '人造人军团大改革 全新技能盘点',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/f/f0/%E7%BC%A9%E7%95%A5%E5%9B%BE0015.jpg?v=201609141637',
            'url' => 'http://wiki.joyme.com/qlz/635985.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '超好用！平民向竞技场推荐卡组',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/a/a0/%E7%BC%A9%E7%95%A5%E5%9B%BE0016.jpg?v=201609141637',
            'url' => 'http://wiki.joyme.com/qlz/635979.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),
        array(
            'indexData' => '龙珠激斗',
            'title' => '龙珠激斗战士技能搭配大解析',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/1/17/Q0021.jpg?v=201609181746',
            'url' => 'http://wiki.joyme.com/qlz/636757.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '龙珠激斗竞技场最佳阵容解析',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/e/e2/Q0022.jpg?v=201609181747',
            'url' => 'http://wiki.joyme.com/qlz/636762.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),
        array(
            'indexData' => '龙珠激斗',
            'title' => '龙珠激斗仁者之心获得方法介绍',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/8/87/Q0027.jpg?v=201609191646',
            'url' => 'http://wiki.joyme.com/qlz/636938.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '最强战士贝吉特——你准备好了吗？',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/9/9e/Q0028.jpg?v=201609191646',
            'url' => 'http://wiki.joyme.com/qlz/636936.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),
        array(
            'indexData' => '龙珠激斗',
            'title' => '龙珠激斗完美的战士VS不完美的主角',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/3/33/Q0033.jpg?v=201609201645',
            'url' => 'http://wiki.joyme.com/qlz/637225.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '龙珠激斗龟仙人玩法解析',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/7/71/Q0034.jpg?v=201609201645',
            'url' => 'http://wiki.joyme.com/qlz/637229.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

    );
} elseif ($wgWikiname == 'qjnn') {
    $strategys =  array(
        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖第十五章精品攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/6/6c/%E6%9C%AA%E6%A0%87%E9%A2%98-111.jpg?v=201609071721',
            'url' => 'http://wiki.joyme.com/qjnn/632706.shtml',
            'pubtime' => strtotime('2016/8/31'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖第十四章完整版高分攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/8/84/%E6%9C%AA%E6%A0%87%E9%A2%98-1_14.jpg?v=201609071721%8D%E6%94%BB%E7%95%A5-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/qjnn/617243.shtml',
            'pubtime' => strtotime('2016/7/8'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖第十三章高分过关攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/7/73/%E6%9C%AA%E6%A0%87%E9%A2%98-13.jpg?v=201609071723',
            'url' => 'http://wiki.joyme.com/qjnn/598022.shtml',
            'pubtime' => strtotime('2016/4/21'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖最新联盟第四章攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/b/b4/%E6%9C%AA%E6%A0%87%E9%A2%98-15.jpg?v=201609071726%BA%E8%A3%85%E6%94%BB%E7%95%A5-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/qjnn/628793.shtml',
            'pubtime' => strtotime('2016/8/23'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '那些必买的暖暖鞋子精选',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/b/bd/%E6%9C%AA%E6%A0%87%E9%A2%98-id.jpg?v=201609071728%86%E6%94%BB%E7%95%A5-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/qjnn/631691.shtml',
            'pubtime' => strtotime('2016/8/26'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖套装分析之夕夜迢迢',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/d/de/%E6%9C%AA%E6%A0%87%E9%A2%98-123.jpg?v=201609071729',
            'url' => 'http://wiki.joyme.com/qjnn/629384.shtml',
            'pubtime' => strtotime('2016/8/25'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '满天繁星二期最强攻略大全',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/0/0a/%E6%9C%AA%E6%A0%87%E9%A2%98-231.jpg?v=201609071730',
            'url' => 'http://wiki.joyme.com/qjnn/617004.shtml',
            'pubtime' => strtotime('2016/7/8'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '满天繁星4之姻缘之宿高分攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/8/8f/%E6%9C%AA%E6%A0%87%E9%A2%98-134.jpg?v=201609071732%AF%E8%82%89%E6%94%BB%E7%95%A5-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/qjnn/617560.shtml',
            'pubtime' => strtotime('2016/7/11'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '满天繁星5之神鸟为乌高分攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/1/1c/%E6%9C%AA%E6%A0%87%E9%A2%98er-1.jpg?v=201609071734%BB%E7%95%A5-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/qjnn/617807.shtml',
            'pubtime' => strtotime('2016/7/12'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '满天繁星6之宿分九野高分攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/9/94/%E6%9C%AA%E6%A0%87%E9%A2%98-df1.jpg?v=201609071735%B9%E6%88%98%E6%94%BB%E7%95%A5-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/qjnn/618119.shtml',
            'pubtime' => strtotime('2016/7/13'),
            'category' => '',
        ),
        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖竞技场 排名前十技巧',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/1/16/Asefw%E6%A0%87%E9%A2%98-1.jpg?v=201609131658',
            'url' => 'http://wiki.joyme.com/qjnn/635974.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖竞技场攻略之奇幻童话园高分搭配',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/1/1e/%E6%9C%AA%E6%A0%87awq%E9%A2%98-1.jpg?v=201609131700',
            'url' => 'http://wiki.joyme.com/qjnn/632278.shtml',
            'pubtime' => strtotime('2016/8/29'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '【织梦人学会】拂苏·花田往事 攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/b/b0/%E6%9C%AA%E6%A0%87fdgter%E9%A2%98-1.jpg?v=201609121539',
            'url' => 'http://wiki.joyme.com/qjnn/635080.shtml',
            'pubtime' => strtotime('2016/9/9'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '【织梦人学会】克洛里斯·镜中奇缘 攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/5/58/%E6%9C%AA%E6%A0%87edrt_%E9%A2%98-1.jpg?v=201609121541',
            'url' => 'http://wiki.joyme.com/qjnn/635147.shtml',
            'pubtime' => strtotime('2016/9/9'),
            'category' => '',
        ),
        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖中秋节月下蹁跹最全攻略宝典',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/8/80/%E6%9C%AA%E6%A0%87sdgee%E9%A2%98-1.jpg?v=201609141708',
            'url' => 'http://wiki.joyme.com/qjnn/636198.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖竞技场顶配替换一览表',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/6/63/%E6%9C%AA%E6%A0%87qawer%E9%A2%98-1.jpg?v=201609141710',
            'url' => 'http://wiki.joyme.com/qjnn/593952.shtml',
            'pubtime' => strtotime('2016/4/5'),
            'category' => '',
        ),
        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖塔罗牌师套装攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/2/2f/%E6%9C%AA%E6%A0%87%E6%81%A9%E7%88%B1%E9%A2%98-1.jpg?v=201609181715',
            'url' => 'http://wiki.joyme.com/qjnn/390831.shtml',
            'pubtime' => strtotime('2015/8/26'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖怪盗蓝宝石套装攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/e/e1/%E6%9C%AA%E5%85%A8%E6%96%87%E6%A0%87%E9%A2%98-1.jpg?v=201609181717',
            'url' => 'http://wiki.joyme.com/qjnn/390586.shtml',
            'pubtime' => strtotime('2015/8/25'),
            'category' => '',
        ),
        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖织梦人学会攻略大全',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/7/7d/%E6%9C%AA%E6%A0%87setw%E9%A2%98-1.jpg?v=201609191723',
            'url' => 'http://wiki.joyme.com/qjnn/636973.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖织梦人学会攻略成长的遗憾',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/6/63/%E6%9C%AA%E6%A0%87%E9%A2%98sew-1.jpg?v=201609191725',
            'url' => 'http://wiki.joyme.com/qjnn/636968.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),
        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖此时此夜难为情搭配攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/1/17/%E6%9C%AA%E6%A0%87weww%E9%A2%98-1.jpg?v=201609201658',
            'url' => 'http://wiki.joyme.com/qjnn/637221.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖织梦人学会克洛里斯攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/1/17/%E6%9C%AA%E6%A0%87weww%E9%A2%98-1.jpg?v=201609201658',
            'url' => 'http://wiki.joyme.com/qjnn/636984.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),

    );
} elseif ($wgWikiname == 'qmcs') {
    $strategys =  array(
        array(
            'indexData' => '全民超神',
            'title' => '全民超神海鲨之王怎么样 海鲨之王技能介绍',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/a/ac/%E7%BC%A9%E7%95%A5%E5%9B%BE1.jpg?v=201609071739',
            'url' => 'http://wiki.joyme.com/qmcs/633818.shtml',
            'pubtime' => strtotime('2016/9/3'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '全民超神阿格尔怎么出装 海鲨之王出装推荐',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/e/e0/%E7%BC%A9%E7%95%A5%E5%9B%BE2.jpg?v=201609071739',
            'url' => 'http://wiki.joyme.com/qmcs/633819.shtml',
            'pubtime' => strtotime('2016/8/25'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '全民超神海鲨之王5V5怎么打 海鲨之王团战技巧',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/d/d6/%E7%BC%A9%E7%95%A5%E5%9B%BE3.jpg?v=201609071739',
            'url' => 'http://wiki.joyme.com/qmcs/633820.shtml',
            'pubtime' => strtotime('2016/8/23'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '新手英雄也要逆袭 地精皮奇1V1完全不虚',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/c/cf/%E7%BC%A9%E7%95%A5%E5%9B%BE4.jpg?v=201609071739',
            'url' => 'http://wiki.joyme.com/qmcs/623891.shtml',
            'pubtime' => strtotime('2016/8/21'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '劲爆暑期，贞德带你秀翻乱斗3v3',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/4/40/%E7%BC%A9%E7%95%A5%E5%9B%BE5.jpg?v=201609071739',
            'url' => 'http://wiki.joyme.com/qmcs/623667.shtml',
            'pubtime' => strtotime('2016/8/18'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '维京龙骑carry之路 大神使用姿势',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/b/b8/%E7%BC%A9%E7%95%A5%E5%9B%BE6.jpg?v=201609071739',
            'url' => 'http://wiki.joyme.com/qmcs/623446.shtml',
            'pubtime' => strtotime('2016/8/12'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '细数那些逆风局带领团队翻盘的英雄',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/3/34/%E7%BC%A9%E7%95%A5%E5%9B%BE7.jpg?v=201609071739',
            'url' => 'http://wiki.joyme.com/qmcs/622854.shtml',
            'pubtime' => strtotime('2016/8/9'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '超神第一AP路西法 大神使用姿势',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/5/56/%E7%BC%A9%E7%95%A5%E5%9B%BE8.png?v=201609071739',
            'url' => 'http://wiki.joyme.com/qmcs/622603.shtml',
            'pubtime' => strtotime('2016/8/7'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '团战的黑马强力AP——美杜莎大神使用姿势',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/0/03/%E7%BC%A9%E7%95%A5%E5%9B%BE9.jpg?v=201609071739',
            'url' => 'http://wiki.joyme.com/qmcs/622587.shtml',
            'pubtime' => strtotime('2016/9/5'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '限免英雄秒升大杀器—英雄属性继承',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/a/a0/%E7%BC%A9%E7%95%A5%E5%9B%BE10.jpg?v=201609071739',
            'url' => 'http://wiki.joyme.com/qmcs/622403.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),
        array(
            'indexData' => '全民超神',
            'title' => '萌萌哒辅助 睡眠之神邦妮团战搭配',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/c/ce/%E7%9D%A1%E7%9C%A0%E4%B9%8B%E7%A5%9E.jpg?v=201609131415',
            'url' => 'http://wiki.joyme.com/qmcs/635972.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '打不动的肉盾 阿拉丁乱斗3V3乱斗技巧',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/4/44/%E9%98%BF%E6%8B%89%E4%B8%81.png?v=201609131415',
            'url' => 'http://wiki.joyme.com/qmcs/635973.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '最强法师路西法团战阵容搭配',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/6/60/%E5%A5%BD%E6%B1%8911.png?v=201609121444',
            'url' => 'http://wiki.joyme.com/qmcs/635611.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '9.12-9.18船长与露西娅牵手，虐狗节奏开启',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/3/33/%E5%91%A8%E5%85%8D111.png?v=201609121444',
            'url' => 'http://wiki.joyme.com/qmcs/635525.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),
        array(
            'indexData' => '全民超神',
            'title' => '无敌肉盾也有害怕之英雄？阿拉丁克制篇',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/f/fb/%E5%85%8B%E5%88%B6.png?v/1/w/180/h/180/v=201609141533',
            'url' => 'http://wiki.joyme.com/qmcs/636210.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '无敌肉盾永夜灯神阿拉丁强势到来',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/3/35/%E5%88%B0%E6%9D%A5.png?v=201609141533',
            'url' => 'http://wiki.joyme.com/qmcs/636208.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),
        array(
            'indexData' => '全民超神',
            'title' => '周免早知道 偷塔狂魔强势袭来',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/b/b3/%E5%91%A8%E5%85%8D847848.png?v=201609181520',
            'url' => 'http://wiki.joyme.com/qmcs/636806.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '全民超神防御塔如何使用 防御塔作用详解',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/1/11/%E9%98%B2%E5%BE%A1%E5%A1%941.jpg?v=201609181520',
            'url' => 'http://wiki.joyme.com/qmcs/636702.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),
        array(
            'indexData' => '全民超神',
            'title' => '强力突脸和高输出的玉面剑魔1V1佛挡杀佛',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/2/25/%E7%8E%89%E9%9D%A2.png?v=201609191449',
            'url' => 'http://wiki.joyme.com/qmcs/637004.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '灵活的胖子海皇波塞冬带你玩转大乱斗',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/2/2e/%E5%A4%A7%E4%B9%B1%E6%96%972133.png?v=201609191449',
            'url' => 'http://wiki.joyme.com/qmcs/637011.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),
        array(
            'indexData' => '全民超神',
            'title' => '《全民超神》禁魔领域下无敌王者路西法详解',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/1/17/%E5%A4%A9%E4%BD%BF.jpg?v=201609201622',
            'url' => 'http://wiki.joyme.com/qmcs/637261.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '《全民超神》肉盾哪家强？看狮王莱昂怎么样！',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/5/56/%E7%8B%AE%E7%8E%8B.png?v=201609201622',
            'url' => 'http://wiki.joyme.com/qmcs/637259.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

    );
} elseif ($wgWikiname == 'qmtj') {
    $strategys =  array(
        array(
            'indexData' => '全民突击',
            'title' => '佣兵暗夜狂刀详细评测',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/f/f9/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E4%BD%A3%E5%85%B5%E6%96%B0%E5%8A%9B%E9%87%8F%E6%9A%97%E5%A4%9C%E7%8B%82%E5%88%801.jpg?imageView/1/w/120/h/120/v=201609071554',
            'url' => 'http://wiki.joyme.com/qmtj/634366.shtml',
            'pubtime' => strtotime('2016/9/6'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '阵地PK赛游击打法-跑狙流',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/e/e6/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E8%B7%91%E7%8B%99%E6%B5%81%E6%89%93%E6%B3%95%E8%AF%A6%E8%A7%A3.jpg?imageView/1/w/120/h/120/v=201609071554',
            'url' => 'http://wiki.joyme.com/qmtj/634111.shtml',
            'pubtime' => strtotime('2016/9/5'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '雷神和斗士MK3谁比较好',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/a/a4/%E9%9B%B7%E7%A5%9E%E5%92%8C%E6%96%97%E5%A3%ABMK3%E8%B0%81%E6%AF%94%E8%BE%83%E5%A5%BD2.jpg?imageView/1/w/120/h/120/v=201609071554',
            'url' => 'http://wiki.joyme.com/qmtj/633731.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '斗士MK3铂金AK47谁与争锋',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/e/ef/%E6%96%97%E5%A3%ABMK3%E9%93%82%E9%87%91AK47%E8%B0%81%E4%B8%8E%E4%BA%89%E9%94%8B1.jpg?imageView/1/w/120/h/120/v=201609071554',
            'url' => 'http://wiki.joyme.com/qmtj/633730.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '斗士MK3阵地伤害测试',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/5/54/%E6%96%97%E5%A3%ABMK3%E9%98%B5%E5%9C%B0%E4%BC%A4%E5%AE%B3%E6%B5%8B%E8%AF%951.jpg?imageView/1/w/120/h/120/v=201609071554',
            'url' => 'http://wiki.joyme.com/qmtj/633729.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => 'VIP商城Shopping指南',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/7/71/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BBS%E7%BA%A7%E7%8B%99%E5%87%BB%E6%9E%AA%E8%B5%A4%E7%82%8E%E6%9C%B1%E9%9B%80.jpg?imageView/1/w/120/h/120/v=201609071554',
            'url' => 'http://wiki.joyme.com/qmtj/633091.shtml',
            'pubtime' => strtotime('2016/9/1'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击佣兵组合效果测试',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/2/28/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E5%8D%83%E9%B8%9F%2B%E6%9C%BA%E6%A2%B0%E6%88%98%E8%AD%A6%2B%E9%9B%AA%E7%8B%90_%281%29.jpg?imageView/1/w/120/h/120/v=201609071554',
            'url' => 'http://wiki.joyme.com/qmtj/632783.shtml',
            'pubtime' => strtotime('2016/8/31'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击黑夜激战实战技巧推荐',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/6/63/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E7%85%A7%E6%98%8E%E5%BC%B9%E5%8F%AF%E4%BB%A5%E6%8F%90%E5%89%8D%E8%BA%B2%E9%81%BF.jpg?imageView/1/w/120/h/120/v=201609071554',
            'url' => 'http://wiki.joyme.com/qmtj/618850.shtml',
            'pubtime' => strtotime('2016/7/14'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击助阵佣兵搭配 佣兵组合推荐',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/2/2a/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E4%BD%A3%E5%85%B5%EF%BC%9A%E8%89%BE%E8%96%87%E5%84%BF%E3%80%81%E7%96%AF%E7%8B%82%E5%8D%9A%E5%A3%AB%E3%80%81%E8%99%AB%E6%97%8F%E5%A5%B3%E7%8E%8B.jpg?imageView/1/w/120/h/120/v=201609071554',
            'url' => 'http://wiki.joyme.com/qmtj/618912.shtml',
            'pubtime' => strtotime('2016/7/14'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击贪狼和G36EPVP伤害对比',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/f/f2/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB_G36E%EF%BC%9A260%E4%BC%A4%E5%AE%B3.jpg?imageView/1/w/120/h/120/v=201609071554',
            'url' => 'http://wiki.joyme.com/qmtj/614650.shtml',
            'pubtime' => strtotime('2016/7/13'),
            'category' => '',
        ),
        array(
            'indexData' => '全民突击',
            'title' => '全民突击AF-12阵地伤害解析',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/9/93/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E9%9C%B0%E5%BC%B9%E6%9E%AAAF-12%E9%98%B5%E5%9C%B0%E5%B0%84%E5%87%BB%E4%BC%A4%E5%AE%B3%E8%A7%A3%E6%9E%900.jpg?v/1/w/120/h/120/v=201609131740',
            'url' => 'http://wiki.joyme.com/qmtj/635966.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击版本最合理佣兵组合',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/4/4f/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E7%9B%AE%E5%89%8D%E7%89%88%E6%9C%AC%E6%9C%80%E5%90%88%E7%90%86%E4%BD%A3%E5%85%B5%E7%BB%84%E5%90%88%E6%8E%A8%E8%8D%901.jpg?v/1/w/120/h/120/v=201609131740',
            'url' => 'http://wiki.joyme.com/qmtj/635981.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击手雷的正确使用方法',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/d/d1/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E5%A6%82%E4%BD%95%E6%AD%A3%E7%A1%AE%E4%BD%BF%E7%94%A8%E6%89%8B%E9%9B%B7.jpg?v/1/w/120/h/120/v=201609131740',
            'url' => 'http://wiki.joyme.com/qmtj/636014.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击解放者售价及获得方法',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/a/ab/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E8%A7%A3%E6%94%BE%E8%80%85%E5%94%AE%E4%BB%B7%E5%8F%8A%E8%8E%B7%E5%BE%97%E6%96%B9%E6%B3%95%E6%94%BB%E7%95%A51.jpg?imageView/1/w/120/h/120/v=201609121559',
            'url' => 'http://wiki.joyme.com/qmtj/635536.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击孤岛合作模式要领',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/6/6c/%E6%B0%91%E7%AA%81%E5%87%BB%E5%AD%A4%E5%B2%9B%E5%90%88%E4%BD%9C%E6%A8%A1%E5%BC%8F%E8%A6%81%E9%A2%86.jpg?imageView/1/w/120/h/120/v=201609121559',
            'url' => 'http://wiki.joyme.com/qmtj/635081.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '新挑战模式得高分技巧',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/e/e0/%E9%AB%98%E5%88%86%E6%8A%80%E5%B7%A7111.jpg?imageView/1/w/120/h/120/v=201609121559',
            'url' => 'http://wiki.joyme.com/qmtj/634738.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),
        array(
            'indexData' => '全民突击',
            'title' => '锯齿KAC觉醒启锯齿变雷神',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/5/51/%E9%94%AF%E9%BD%BFKAC%E8%A7%89%E9%86%92%E5%BC%80%E5%90%AF1.jpg?v/1/w/120/h/68/v=201609141400',
            'url' => 'http://wiki.joyme.com/qmtj/636119.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '最新机关枪解放者属性技能分析',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/7/75/%E6%9C%80%E6%96%B0%E6%9C%BA%E5%85%B3%E6%9E%AA%E8%A7%A3%E6%94%BE%E8%80%85%E5%B1%9E%E6%80%A7%E6%8A%80%E8%83%BD%E5%88%86%E6%9E%901.jpg?v/1/w/120/h/68/v=201609141400',
            'url' => 'http://wiki.joyme.com/qmtj/636154.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '沉默之鹰获取途径介绍 ',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/0/04/%E6%B2%89%E9%BB%98%E4%B9%8B%E9%B9%B0%E5%94%AF%E4%B8%80%E8%8E%B7%E5%8F%96%E9%80%94%E5%BE%841.jpg?v/1/w/120/h/68/v=201609141358',
            'url' => 'http://wiki.joyme.com/qmtj/636176.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),
        array(
            'indexData' => '全民突击',
            'title' => '斗士MK3弹道测试',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/4/49/%E6%96%97%E5%A3%ABMK3%E5%BC%B9%E9%81%93%E6%B5%8B%E8%AF%951.jpg?v/1/w/120/h/120/v=201609181512',
            'url' => 'http://wiki.joyme.com/qmtj/636766.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '红桃K觉醒分析',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/c/c5/%E7%BA%A2%E6%A1%83K%E8%A7%89%E9%86%921.jpg?v/1/w/120/h/120/v=201609181512',
            'url' => 'http://wiki.joyme.com/qmtj/636758.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '欢乐战场狂轰滥炸介绍',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/5/58/%E6%AC%A2%E4%B9%90%E6%88%98%E5%9C%BA%E7%8B%82%E8%BD%B0%E6%BB%A5%E7%82%B81.jpg?v/1/w/120/h/120/v=201609181512',
            'url' => 'http://wiki.joyme.com/qmtj/636750.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击本周突击步枪选择攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/3/3f/%E6%9C%AC%E5%91%A8%E7%AA%81%E5%87%BB%E6%AD%A5%E6%9E%AA%E8%B4%AD%E4%B9%B0%E6%8E%A8%E8%8D%901.jpg?v/1/w/120/h/120/v=201609181512',
            'url' => 'http://wiki.joyme.com/qmtj/636737.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),
        array(
            'indexData' => '全民突击',
            'title' => '合作模式斗士MK3和雷神伤害对比',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/3/30/%E5%90%88%E4%BD%9C%E6%A8%A1%E5%BC%8F%E6%96%97%E5%A3%ABMK3%E5%92%8C%E9%9B%B7%E7%A5%9E%E4%BC%A4%E5%AE%B3%E5%AF%B9%E6%AF%941.jpg?v/1/w/120/h/120/v=201609191139',
            'url' => 'http://wiki.joyme.com/qmtj/636935.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击长弓APS和赤炎朱雀对比',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/c/c6/%E9%95%BF%E5%BC%93APS%E5%92%8C%E8%B5%A4%E7%82%8E%E6%9C%B1%E9%9B%801.jpg?v/1/w/120/h/120/v=201609191139',
            'url' => 'http://wiki.joyme.com/qmtj/636941.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击铂金AK47和M4A1对比',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/6/66/%E9%93%82%E9%87%91AK47%E5%92%8CM4A1%E8%B4%AA%E7%8B%BC%E9%98%B5%E5%9C%B03.jpg?v/1/w/120/h/120/v=201609191139',
            'url' => 'http://wiki.joyme.com/qmtj/636942.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),
        array(
            'indexData' => '全民突击',
            'title' => '全民突击铂金AK47觉醒性价比',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/a/aa/%E8%A7%89%E9%86%92%E9%93%82%E9%87%91AK471.jpg?v/1/w/120/h/120/v=201609201033',
            'url' => 'http://wiki.joyme.com/qmtj/637159.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击道具流PVP实战测试',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/8/85/%E9%81%93%E5%85%B7%E6%B5%81%E9%87%8E%E9%A9%AC%E5%8A%A0%E9%95%BF%E5%BC%931.jpg?v/1/w/120/h/120/v=201609201033',
            'url' => 'http://wiki.joyme.com/qmtj/637156.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击AF-12最实用霰弹枪',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/3/31/AF-12%E6%9C%80%E5%AE%9E%E7%94%A8%E9%9C%B0%E5%BC%B9%E6%9E%AA1.jpg?v/1/w/120/h/120/v=201609201033',
            'url' => 'http://wiki.joyme.com/qmtj/637154.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

    );
} elseif ($wgWikiname == 'kof98') {
    $strategys = array(
        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '《拳皇98终极之战OL》降攻控怒流阵容推荐',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/6/6e/%E3%80%8A%E6%8B%B3%E7%9A%8798%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98OL%E3%80%8B%E9%99%8D%E6%94%BB%E6%8E%A7%E6%80%92%E6%B5%81%E9%98%B5%E5%AE%B9%E6%8E%A8%E8%8D%90-%E5%9B%BE.jpg?v=201609071618',
            'url' => 'http://wiki.joyme.com/kof98/633978.shtml',
            'pubtime' => strtotime('2016/9/5'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '传说之狼 八门时代特瑞评测',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/f/f8/%E4%BC%A0%E8%AF%B4%E4%B9%8B%E7%8B%BC-%E5%85%AB%E9%97%A8%E6%97%B6%E4%BB%A3%E7%89%B9%E7%91%9E%E8%AF%84%E6%B5%8B-%E5%9B%BE.jpg?v=201609071618',
            'url' => 'http://wiki.joyme.com/kof98/633115.shtml',
            'pubtime' => strtotime('2016/9/1'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '虎魂崛起竞技场虎魂当道原因分析详解',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/2/28/%E8%99%8E%E9%AD%82%E5%B4%9B%E8%B5%B7%E7%AB%9E%E6%8A%80%E5%9C%BA%E8%99%8E%E9%AD%82%E5%BD%93%E9%81%93%E5%8E%9F%E5%9B%A0%E5%88%86%E6%9E%90%E8%AF%A6%E8%A7%A3-%E5%9B%BE.jpg?v=201609071618',
            'url' => 'http://wiki.joyme.com/kof98/632435.shtml',
            'pubtime' => strtotime('2016/8/30'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '输出安逸 双重解控流阵容推荐',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/0/0a/%E8%BE%93%E5%87%BA%E5%AE%89%E9%80%B8-%E5%8F%8C%E9%87%8D%E8%A7%A3%E6%8E%A7%E6%B5%81%E9%98%B5%E5%AE%B9%E6%8E%A8%E8%8D%90-%E5%9B%BE.jpg?v=201609071618',
            'url' => 'http://wiki.joyme.com/kof98/631679.shtml',
            'pubtime' => strtotime('2016/8/26'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '《拳皇98终极之战OL》减攻格斗家当前形势与分析',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/9/9d/%E3%80%8A%E6%8B%B3%E7%9A%8798%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98OL%E3%80%8B%E5%87%8F%E6%94%BB%E6%A0%BC%E6%96%97%E5%AE%B6%E5%BD%93%E5%89%8D%E5%BD%A2%E5%8A%BF%E4%B8%8E%E5%88%86%E6%9E%90-%E5%9B%BE.jpg?v=201609071618',
            'url' => 'http://wiki.joyme.com/kof98/629100.shtml',
            'pubtime' => strtotime('2016/8/24'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => "暴力秒杀《拳皇98终极之战OL》K'景门新必杀来袭",
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/1/19/%E6%9A%B4%E5%8A%9B%E7%A7%92%E6%9D%80%E3%80%8A%E6%8B%B3%E7%9A%8798%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98OL%E3%80%8BK%27%E6%99%AF%E9%97%A8%E6%96%B0%E5%BF%85%E6%9D%80%E6%9D%A5%E8%A2%AD-%E5%9B%BE.jpg?v=201609071625',
            'url' => 'http://wiki.joyme.com/kof98/628425.shtml',
            'pubtime' => strtotime('2016/8/22'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '真ZERO来临 《拳皇98终极之战OL》三防阵容推荐',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/3/3c/%E7%9C%9FZERO%E6%9D%A5%E4%B8%B4-%E3%80%8A%E6%8B%B3%E7%9A%8798%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98OL%E3%80%8B%E4%B8%89%E9%98%B2%E9%98%B5%E5%AE%B9%E6%8E%A8%E8%8D%90-%E5%9B%BE.jpg?v=201609071618',
            'url' => 'http://wiki.joyme.com/kof98/627199.shtml',
            'pubtime' => strtotime('2016/8/16'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '息吹之岚老牌BOSS高尼茨现状分析',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/2/27/%E6%81%AF%E5%90%B9%E4%B9%8B%E5%B2%9A%E8%80%81%E7%89%8CBOSS%E9%AB%98%E5%B0%BC%E8%8C%A8%E7%8E%B0%E7%8A%B6%E5%88%86%E6%9E%90-%E5%9B%BE.jpg?v=201609071618',
            'url' => 'http://wiki.joyme.com/kof98/626366.shtml',
            'pubtime' => strtotime('2016/8/12'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '八门系列 《拳皇98终极之战OL》97参赛队点评解析',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/8/81/%E5%85%AB%E9%97%A8%E7%B3%BB%E5%88%97-%E3%80%8A%E6%8B%B3%E7%9A%8798%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98OL%E3%80%8B97%E5%8F%82%E8%B5%9B%E9%98%9F%E7%82%B9%E8%AF%84%E8%A7%A3%E6%9E%90-%E5%9B%BE.jpg?v=201609071639',
            'url' => 'http://wiki.joyme.com/kof98/625757.shtml',
            'pubtime' => strtotime('2016/8/10'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '《拳皇98终极之战OL》八门大蛇的崛起',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/6/6d/%E3%80%8A%E6%8B%B3%E7%9A%8798%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98OL%E3%80%8B%E5%85%AB%E9%97%A8%E5%A4%A7%E8%9B%87%E7%9A%84%E5%B4%9B%E8%B5%B7-%E5%9B%BE.jpg?v=201609071618',
            'url' => 'http://wiki.joyme.com/kof98/625419.shtml',
            'pubtime' => strtotime('2016/8/9'),
            'category' => '',
        ),
        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '第二十一章音巢守卫者噩梦关卡攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/2/2d/%E7%AC%AC%E4%BA%8C%E5%8D%81%E4%B8%80%E7%AB%A0%E9%9F%B3%E5%B7%A2%E5%AE%88%E5%8D%AB%E8%80%85%E5%99%A9%E6%A2%A6%E5%85%B3%E5%8D%A1%E6%94%BB%E7%95%A5-%E5%9B%BE.jpg?v=201609131832',
            'url' => 'http://wiki.joyme.com/kof98/635997.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '地动山摇第十三章噩梦轮回副本通关攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/9/93/%E5%9C%B0%E5%8A%A8%E5%B1%B1%E6%91%87%E7%AC%AC%E5%8D%81%E4%B8%89%E7%AB%A0%E5%99%A9%E6%A2%A6%E8%BD%AE%E5%9B%9E%E5%89%AF%E6%9C%AC%E9%80%9A%E5%85%B3%E6%94%BB%E7%95%A5-%E5%9B%BE.jpg?v=201609131832',
            'url' => 'http://wiki.joyme.com/kof98/635988.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '四魂先手六必杀阵容推荐',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/8/8d/%E5%9B%9B%E9%AD%82%E5%85%88%E6%89%8B%E5%85%AD%E5%BF%85%E6%9D%80%E9%98%B5%E5%AE%B9%E6%8E%A8%E8%8D%90-%E5%9B%BE.jpg?v=201609121648',
            'url' => 'http://wiki.joyme.com/kof98/635516.shtml',
            'pubtime' => strtotime('2016/9/9'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '《拳皇98终极之战OL》轮回关卡通关攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/2/29/%E3%80%8A%E6%8B%B3%E7%9A%8798%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98OL%E3%80%8B%E8%BD%AE%E5%9B%9E%E5%85%B3%E5%8D%A1%E9%80%9A%E5%85%B3%E6%94%BB%E7%95%A5-%E5%9B%BE.jpg?v=201609121648',
            'url' => 'http://wiki.joyme.com/kof98/635726.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),
        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '音巢守卫者精英关卡第二十一章通关攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/4/47/%E9%9F%B3%E5%B7%A2%E5%AE%88%E5%8D%AB%E8%80%85%E7%B2%BE%E8%8B%B1%E5%85%B3%E5%8D%A1%E7%AC%AC%E4%BA%8C%E5%8D%81%E4%B8%80%E7%AB%A0%E9%80%9A%E5%85%B3%E6%94%BB%E7%95%A5.jpg?v=201609141651',
            'url' => 'http://wiki.joyme.com/pvp/kof98/636226.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '平民拳皇争霸龟魂防卡分析',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/7/7f/%E5%B9%B3%E6%B0%91%E6%8B%B3%E7%9A%87%E4%BA%89%E9%9C%B8%E9%BE%9F%E9%AD%82%E9%98%B2%E5%8D%A1%E5%88%86%E6%9E%90.jpg?v=201609141651',
            'url' => 'http://wiki.joyme.com/pvp/kof98/636218.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),
        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '拳皇98终极之战OL鞭子女王薇普华丽登场',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/8/8d/%E6%8B%B3%E7%9A%8798%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98OL%E9%9E%AD%E5%AD%90%E5%A5%B3%E7%8E%8B%E8%96%87%E6%99%AE%E5%8D%8E%E4%B8%BD%E7%99%BB%E5%9C%BA.jpg?v=201609181746',
            'url' => 'http://wiki.joyme.com/kof98/636833.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '拳皇98终极之战OL时装属性大盘点',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/c/cb/%E6%8B%B3%E7%9A%8798%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98OL%E6%97%B6%E8%A3%85%E5%B1%9E%E6%80%A7%E5%A4%A7%E7%9B%98%E7%82%B9.jpg?v=201609181746',
            'url' => 'http://wiki.joyme.com/kof98/636830.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),
        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '开门上阵浅谈K优缺点分析',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/d/d5/%E5%BC%80%E9%97%A8%E4%B8%8A%E9%98%B5%E6%B5%85%E8%B0%88K%E4%BC%98%E7%BC%BA%E7%82%B9%E5%88%86%E6%9E%90.jpg?v=201609191729',
            'url' => 'http://wiki.joyme.com/kof98/637061.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '拳皇98终极之战ol单卡分析之矢吹真吾',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/9/94/%E6%8B%B3%E7%9A%8798%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98ol%E5%8D%95%E5%8D%A1%E5%88%86%E6%9E%90%E4%B9%8B%E7%9F%A2%E5%90%B9%E7%9C%9F%E5%90%BE.jpg?v=201609191729',
            'url' => 'http://wiki.joyme.com/kof98/637066.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),
        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '倒数第三天伊格尼兹即将到来',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/5/53/%E5%80%92%E6%95%B0%E7%AC%AC%E4%B8%89%E5%A4%A9%E4%BC%8A%E6%A0%BC%E5%B0%BC%E5%85%B9%E5%8D%B3%E5%B0%86%E5%88%B0%E6%9D%A5.jpg?v=201609201802',
            'url' => 'http://wiki.joyme.com/kof98/637263.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '拳皇98终极之战OL八门雷夏现状分析',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/f/f0/%E6%8B%B3%E7%9A%8798%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98OL%E5%85%AB%E9%97%A8%E9%9B%B7%E5%A4%8F%E7%8E%B0%E7%8A%B6%E5%88%86%E6%9E%90.jpg?v=201609201802',
            'url' => 'http://wiki.joyme.com/kof98/637292.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

    );
} elseif ($wgWikiname == 'ttkp') {
    $strategys = array(
        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑多人对战卡滑翔技巧',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/b/b4/%E6%9C%AA%E6%A0%87WTR%E9%A2%98-1.jpg?v=201609071851',
            'url' => 'http://wiki.joyme.com/ttkp/633821.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑小龙女技能详解',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/f/f5/%E6%9C%AA%E6%A0%87SWTGF%E9%A2%98-1.jpg?v=201609071853',
            'url' => 'http://wiki.joyme.com/ttkp/633748.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑巅峰挑战怎么玩',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/6/62/%E6%9C%AA%E6%A0%87AR%E9%A2%98-2.jpg?v=201609071855',
            'url' => 'http://wiki.joyme.com/ttkp/633749.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑暑假作业怎么完成',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/c/c2/%E6%9C%AA%E6%A0%87SDGF2.jpg?v=201609071857',
            'url' => 'http://wiki.joyme.com/ttkp/633750.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑威廉学长详解',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/b/b9/%E6%9C%AASG%E9%A2%98-2.jpg?v=201609071859',
            'url' => 'http://wiki.joyme.com/ttkp/633751.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑水力型宝炫装怎么搭配',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/b/b3/%E6%9C%AA%E6%A0%87%E9%A2%98AWER-2.jpg?v=201609071900',
            'url' => 'http://wiki.joyme.com/ttkp/633752.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑女警小兔炭烧章鱼加入神秘商店',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/5/5f/%E6%9C%AA%E6%A0%87%E9%A2%98ST-2.jpg?v=201609071903',
            'url' => 'http://wiki.joyme.com/ttkp/611555.shtml',
            'pubtime' => strtotime('2016/6/15'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑多人道具战搭配推荐',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/2/21/%E6%9C%AAwert%E9%A2%98-2.jpg?v=201609071905',
            'url' => 'http://wiki.joyme.com/ttkp/600999.shtml',
            'pubtime' => strtotime('2015/5/5'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑威廉学长全新S级宝物测频',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/1/14/%E6%9C%AAth%E9%A2%98-2.jpg?v=201609071908',
            'url' => 'http://wiki.joyme.com/ttkp/608286.shtml',
            'pubtime' => strtotime('2016/6/2'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑女警小兔搭配小丑库卡得分测试',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/9/9e/%E6%9C%AAwert%E6%A0%87%E9%A2%98-2.jpg?v=201609071910',
            'url' => 'http://wiki.joyme.com/ttkp/602865.shtml',
            'pubtime' => strtotime('2016/5/17'),
            'category' => '',
        ),
        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑紫翼神龙VS星空宗主对比评测',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/7/7a/%E6%9C%AA%E6%A0%87sefw%E9%A2%98-1.jpg?v=201609121621',
            'url' => 'http://wiki.joyme.com/ttkp/613219.shtml',
            'pubtime' => strtotime('2016/6/22'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑炎龙战神技能属性解析',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/6/6f/%E6%9C%AAsdtg%E6%A0%87%E9%A2%98-1.jpg?v=201609121612',
            'url' => 'http://wiki.joyme.com/ttkp/611554.shtml',
            'pubtime' => strtotime('2016/6/15'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑天天酷跑光之子合成配方推荐',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/7/7f/%E6%9C%AA%E6%A0%87awrd%E9%A2%98-1.jpg?v=201609131557',
            'url' => 'http://wiki.joyme.com/ttkp/598924.shtml',
            'pubtime' => strtotime('2016/4/25'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑九色鹿VS小丑库卡对比评测',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/e/e7/%E6%9C%AAawe2%E9%A2%98-1.jpg?v=201609131559',
            'url' => 'http://wiki.joyme.com/ttkp/600998.shtml',
            'pubtime' => strtotime('2016/5/5'),
            'category' => '',
        ),
        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑冰火之神得分解析',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/c/c9/Q21.jpg?v=201609141654',
            'url' => 'http://wiki.joyme.com/ttkp/610983.shtml',
            'pubtime' => strtotime('2016/6/13'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑皇家狮鹫满级属性技能解析',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/8/85/%E6%9C%AA1q%E6%A0%87awq%E9%A2%98-1.jpg?v=201609141657',
            'url' => 'http://wiki.joyme.com/ttkp/609433.shtml',
            'pubtime' => strtotime('2016/6/6'),
            'category' => '',
        ),
        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑多人对战暴走罗杰跑法分享',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/2/22/%E6%9C%AA%E6%A0%87%E9%98%BF%E5%B0%94%E9%A2%98-1.jpg?v=201609181703',
            'url' => 'http://wiki.joyme.com/ttkp/603127.shtml',
            'pubtime' => strtotime('2016/6/18'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑威廉学长全新S级宝物测频',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/3/32/%E6%9C%AA%E6%A0%87%E5%A5%A5%E5%A8%81%E5%B0%94%E9%A2%98-1.jpg?v=201609181706',
            'url' => 'http://wiki.joyme.com/ttkp/608286.shtml',
            'pubtime' => strtotime('2016/6/26'),
            'category' => '',
        ),
        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑多人道具战搭配推荐',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/a/af/%E6%9C%AA%E6%A0%87qrqtq-1.jpg?v=201609191545',
            'url' => 'http://wiki.joyme.com/ttkp/600999.shtml',
            'pubtime' => strtotime('2016/5/5'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑炭烧章鱼螃蟹护盾流解析',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/5/55/%E6%9C%AA%E6%A0%87atgs%E9%A2%98-1.jpg?v=201609191546',
            'url' => 'http://wiki.joyme.com/ttkp/603551.shtml',
            'pubtime' => strtotime('2016/5/20'),
            'category' => '',
        ),
        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑猪八戒获取方式详解',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/b/b4/Swew%E6%A0%87%E9%A2%98-1.jpg?v=201609201715',
            'url' => 'http://wiki.joyme.com/ttkp/597420.shtml',
            'pubtime' => strtotime('2016/4/19'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑冰火之神属性解析',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/e/e5/%E6%9C%AA%E6%A0%87qw2q%E9%A2%98-1.jpg?v=201609201716',
            'url' => 'http://wiki.joyme.com/ttkp/597421.shtml',
            'pubtime' => strtotime('2016/4/19'),
            'category' => '',
        ),

    );
} elseif ($wgWikiname == 'vg') {
    $strategys = array(
        array(
            'indexData' => '虚荣',
            'title' => '虚荣莱拉新皮肤时光追忆亮相 超稀有独角兽之角',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/e/e6/%E8%99%9A%E8%8D%A3%E8%8E%B1%E6%8B%89%E6%96%B0%E7%9A%AE%E8%82%A4%E6%97%B6%E5%85%89%E8%BF%BD%E5%BF%86%E4%BA%AE%E7%9B%B81.jpg?v/1/w/120/h/120/v=201609080045',
            'url' => 'http://wiki.joyme.com/vg/634048.shtml',
            'pubtime' => strtotime('2016/7/15'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '虚荣兰斯新皮肤"幽冥骑士"登场 霸气盔甲双手剑',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/1/1a/%E8%99%9A%E8%8D%A3%E5%85%B0%E6%96%AF%E6%96%B0%E7%9A%AE%E8%82%A4%E5%B9%BD%E5%86%A5%E9%AA%91%E5%A3%AB%E7%99%BB%E5%9C%BA1.jpg?v/1/w/120/h/120/v=201609080045',
            'url' => 'http://wiki.joyme.com/vg/634047.shtml',
            'pubtime' => strtotime('2016/8/24'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '《虚荣》周免英雄8.31-9.6 猫女柯思卡金灯莱拉',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/1/1e/%E3%80%8A%E8%99%9A%E8%8D%A3%E3%80%8B%E5%91%A8%E5%85%8D%E8%8B%B1%E9%9B%848.31-9.61.jpg?v/1/w/120/h/120/v=201609080004',
            'url' => 'http://wiki.joyme.com/vg/634045.shtml',
            'pubtime' => strtotime('2016/8/30'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '虚荣夏季赛季额外奖励公布 夏日派对卡片',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/0/06/%E8%99%9A%E8%8D%A3%E5%A4%8F%E5%AD%A3%E8%B5%9B%E5%AD%A3%E9%A2%9D%E5%A4%96%E5%A5%96%E5%8A%B1%E5%85%AC%E5%B8%831.jpg?v/1/w/120/h/120/v=201609080045',
            'url' => 'http://wiki.joyme.com/vg/634046.shtml',
            'pubtime' => strtotime('2016/9/2'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '名门Cloud9收编《虚荣》战队NEMESIS HYDRA',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/d/d7/%E5%90%8D%E9%97%A8Cloud9%E6%94%B6%E7%BC%961.jpg?v/1/w/120/h/120/v=201609080004',
            'url' => 'http://wiki.joyme.com/vg/634044.shtml',
            'pubtime' => strtotime('2016/8/16'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '手游电竞盛典 2016 CIG《虚荣》全国报名通道全面开启',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/6/6c/%E6%8A%A5%E5%90%8D1.jpg?v/1/w/120/h/120/v=201609080045',
            'url' => 'http://wiki.joyme.com/vg/634043.shtml',
            'pubtime' => strtotime('2016/8/11'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '虚荣全新征召模式上线公告',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/0/0e/%E8%99%9A%E8%8D%A3%E5%85%A8%E6%96%B0%E5%BE%81%E5%8F%AC%E6%A8%A1%E5%BC%8F%E4%B8%8A%E7%BA%BF%E5%85%AC%E5%91%8A.jpg?v/1/w/120/h/120/v=201609080052',
            'url' => 'http://wiki.joyme.com/vg/547276.shtml',
            'pubtime' => strtotime('2016/8/10'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '虚荣牵手网娱大师网吧行',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/2/20/%E8%99%9A%E8%8D%A3%E7%89%B5%E6%89%8B%E7%BD%91%E5%A8%B1%E5%A4%A7%E5%B8%88%E7%BD%91%E5%90%A7%E8%A1%8C1.jpg?v/1/w/120/h/120/v=201609080045',
            'url' => 'http://wiki.joyme.com/vg/547281.shtml',
            'pubtime' => strtotime('2016/8/5'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '虚荣虚荣1.14.1更新修复亚丹大招秒杀等BUG',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/0/0d/%E8%99%9A%E8%8D%A3%E8%99%9A%E8%8D%A31.14.1%E6%9B%B4%E6%96%B0%E4%BF%AE%E5%A4%8D%E4%BA%9A%E4%B8%B9%E5%A4%A7%E6%8B%9B%E7%A7%92%E6%9D%80%E7%AD%89BUG.jpg?v/1/w/120/h/120/v=201609080045',
            'url' => 'http://wiki.joyme.com/vg/547287.shtml',
            'pubtime' => strtotime('2016/8/3'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '虚荣屡获AppStore力推 虚荣春节版本内容拆解',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/0/00/%E8%99%9A%E8%8D%A3%E6%98%A5%E8%8A%82%E7%89%88%E6%9C%AC%E5%86%85%E5%AE%B9%E6%8B%86%E8%A7%A32.jpg?v/1/w/120/h/120/v=201609080045',
            'url' => 'http://wiki.joyme.com/vg/547308.shtml',
            'pubtime' => strtotime('2016/7/20'),
            'category' => '',
        ),
        array(
            'indexData' => '虚荣',
            'title' => '【虚荣】攻略战场走位须知',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/e/e9/%E7%BC%A9%E7%95%A5%E5%9B%BE999.jpg?v=201609131618',
            'url' => 'http://wiki.joyme.com/vg/635958.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '【虚荣】机械战姬阿尔法基础攻略!',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/8/80/%E7%BC%A9%E7%95%A5%E5%9B%BE1000.jpg?v=201609131618',
            'url' => 'http://wiki.joyme.com/vg/635961.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '【虚荣】MOBA手游《虚荣》金灯莱拉小白攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/4/4e/%E7%BC%A9%E7%95%A5%E5%9B%BE33.jpg?v=201609121703',
            'url' => 'http://wiki.joyme.com/vg/635586.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '【虚荣】古骑士兰斯大型攻略——全能光头带你称霸海希安!',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/f/fb/%E7%BC%A9%E7%95%A5%E5%9B%BE44.jpg?v=201609121703',
            'url' => 'http://wiki.joyme.com/vg/635591.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),
        array(
            'indexData' => '虚荣',
            'title' => '【虚荣】大乱斗王者!《虚荣》坦克英雄鱼人使用要点!',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/6/60/Q0015.jpg?v=201609141658',
            'url' => 'http://wiki.joyme.com/vg/636149.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '【虚荣】玩家攻略-千场老鬼剑教你真正掌握回旋大',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/5/57/Q0016.jpg?v=201609141658',
            'url' => 'http://wiki.joyme.com/vg/636150.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),
        array(
            'indexData' => '虚荣',
            'title' => '【虚荣】Vainglory灵猴奥佐出装加点攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/1/17/Q0021.jpg?v=201609181725',
            'url' => 'http://wiki.joyme.com/vg/636719.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '【虚荣】大乱斗王者虚荣坦克英雄鱼人使用要点',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/e/e2/Q0022.jpg?v=201609181725',
            'url' => 'http://wiki.joyme.com/vg/636720.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),
        array(
            'indexData' => '虚荣',
            'title' => '虚荣巴隆背景故事II:巴隆的抉择',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/8/87/Q0027.jpg?v=201609191658',
            'url' => 'http://wiki.joyme.com/vg/636956.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '【虚荣】巴隆背景故事:丝凯伊',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/9/9e/Q0028.jpg?v=201609191658',
            'url' => 'http://wiki.joyme.com/vg/636958.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),
        array(
            'indexData' => '虚荣',
            'title' => '【虚荣】打野盲豹格雷出装顺序',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/3/33/Q0033.jpg?v=201609201622',
            'url' => 'http://wiki.joyme.com/vg/637197.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '《虚荣》能和黑羽对抗的英雄',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/7/71/Q0034.jpg?v=201609201622',
            'url' => 'http://wiki.joyme.com/vg/637195.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

    );
} elseif ($wgWikiname == 'zdbjl') {
    $strategys = array(
        array(
            'indexData' => '战斗吧剑灵',
            'title' => '反伤流怎么搭配阵容 明月金燕搭配技巧',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/4/49/Zdbjl%E6%94%BB%E7%95%A51.png?imageView/1/w/120/h/120/v=201609081001',
            'url' => 'http://wiki.joyme.com/zdbjl/633761.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵情缘推荐',
            'image' => 'http://wiki.joyme.com/moondwellers/index.php?title=%E7%94%A8%E6%88%B7:%E6%97%A5%E5%9D%82%E8%8F%9C%E4%B9%83&action=history',
            'url' => 'http://wiki.joyme.com/zdbjl/633756.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵血浪鲨湾怎么打',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/b/b4/Zdbjl%E6%94%BB%E7%95%A53.png?imageView/1/w/120/h/120/v=201609081001',
            'url' => 'http://wiki.joyme.com/zdbjl/633825.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵螺旋迷宫三星攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/4/4d/Zdbjl%E6%94%BB%E7%95%A54.png?imageView/1/w/120/h/120/v=201609081001',
            'url' => 'http://wiki.joyme.com/zdbjl/633829.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),
        array(
            'indexData' => '战斗吧剑灵',
            'title' => '反伤流怎么搭配阵容 明月金燕搭配技巧',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/4/49/Zdbjl%E6%94%BB%E7%95%A51.png?imageView/1/w/120/h/120/v=201609081001',
            'url' => 'http://wiki.joyme.com/zdbjl/633761.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵情缘推荐',
            'image' => 'http://wiki.joyme.com/moondwellers/index.php?title=%E7%94%A8%E6%88%B7:%E6%97%A5%E5%9D%82%E8%8F%9C%E4%B9%83&action=history',
            'url' => 'http://wiki.joyme.com/zdbjl/633756.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵血浪鲨湾怎么打',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/b/b4/Zdbjl%E6%94%BB%E7%95%A53.png?imageView/1/w/120/h/120/v=201609081001',
            'url' => 'http://wiki.joyme.com/zdbjl/633825.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵螺旋迷宫三星攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/4/4d/Zdbjl%E6%94%BB%E7%95%A54.png?imageView/1/w/120/h/120/v=201609081001',
            'url' => 'http://wiki.joyme.com/zdbjl/633829.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵极限魔王幽兰怎么打',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/4/44/Zdbs3.png?imageView/1/w/120/h/120/v=201609121859',
            'url' => 'http://wiki.joyme.com/zdbjl/635777.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵佣兵如何派遣技巧',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/2/21/Zdbs4.png?imageView/1/w/120/h/120/v=201609121859',
            'url' => 'http://wiki.joyme.com/zdbjl/635778.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵千魂灵妖怎么样 千魂灵妖值得培养么',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/1/11/91301.png?imageView/1/w/120/h/120/v=201609131734',
            'url' => 'http://wiki.joyme.com/zdbjl/636029.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵什么情缘值得培养 绝对不能错过的情缘推荐',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/5/57/91302.png?imageView/1/w/120/h/120/v=201609131734',
            'url' => 'http://wiki.joyme.com/zdbjl/636028.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),
        array(
            'indexData' => '战斗吧剑灵',
            'title' => '反伤流怎么搭配阵容 明月金燕搭配技巧',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/4/49/Zdbjl%E6%94%BB%E7%95%A51.png?imageView/1/w/120/h/120/v=201609081001',
            'url' => 'http://wiki.joyme.com/zdbjl/633761.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵情缘推荐',
            'image' => 'http://wiki.joyme.com/moondwellers/index.php?title=%E7%94%A8%E6%88%B7:%E6%97%A5%E5%9D%82%E8%8F%9C%E4%B9%83&action=history',
            'url' => 'http://wiki.joyme.com/zdbjl/633756.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵血浪鲨湾怎么打',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/b/b4/Zdbjl%E6%94%BB%E7%95%A53.png?imageView/1/w/120/h/120/v=201609081001',
            'url' => 'http://wiki.joyme.com/zdbjl/633825.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵螺旋迷宫三星攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/4/4d/Zdbjl%E6%94%BB%E7%95%A54.png?imageView/1/w/120/h/120/v=201609081001',
            'url' => 'http://wiki.joyme.com/zdbjl/633829.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵极限魔王幽兰怎么打',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/4/44/Zdbs3.png?imageView/1/w/120/h/120/v=201609121859',
            'url' => 'http://wiki.joyme.com/zdbjl/635777.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵佣兵如何派遣技巧',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/2/21/Zdbs4.png?imageView/1/w/120/h/120/v=201609121859',
            'url' => 'http://wiki.joyme.com/zdbjl/635778.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵千魂灵妖怎么样 千魂灵妖值得培养么',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/1/11/91301.png?imageView/1/w/120/h/120/v=201609131734',
            'url' => 'http://wiki.joyme.com/zdbjl/636029.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵什么情缘值得培养 绝对不能错过的情缘推荐',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/5/57/91302.png?imageView/1/w/120/h/120/v=201609131734',
            'url' => 'http://wiki.joyme.com/zdbjl/636028.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵浮岛总舵第二关阵容攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/a/a6/S91403.png?imageView/1/w/120/h/120/v=201609141728',
            'url' => 'http://wiki.joyme.com/zdbjl/636266.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵浑天教刺客怎么打',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/7/77/S91404.png?imageView/1/w/120/h/120/v=201609141728',
            'url' => 'http://wiki.joyme.com/zdbjl/636267.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),
        array(
            'indexData' => '战斗吧剑灵',
            'title' => '反伤流怎么搭配阵容 明月金燕搭配技巧',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/4/49/Zdbjl%E6%94%BB%E7%95%A51.png?imageView/1/w/120/h/120/v=201609081001',
            'url' => 'http://wiki.joyme.com/zdbjl/633761.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵情缘推荐',
            'image' => 'http://wiki.joyme.com/moondwellers/index.php?title=%E7%94%A8%E6%88%B7:%E6%97%A5%E5%9D%82%E8%8F%9C%E4%B9%83&action=history',
            'url' => 'http://wiki.joyme.com/zdbjl/633756.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵血浪鲨湾怎么打',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/b/b4/Zdbjl%E6%94%BB%E7%95%A53.png?imageView/1/w/120/h/120/v=201609081001',
            'url' => 'http://wiki.joyme.com/zdbjl/633825.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵螺旋迷宫三星攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/4/4d/Zdbjl%E6%94%BB%E7%95%A54.png?imageView/1/w/120/h/120/v=201609081001',
            'url' => 'http://wiki.joyme.com/zdbjl/633829.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵极限魔王幽兰怎么打',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/4/44/Zdbs3.png?imageView/1/w/120/h/120/v=201609121859',
            'url' => 'http://wiki.joyme.com/zdbjl/635777.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵佣兵如何派遣技巧',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/2/21/Zdbs4.png?imageView/1/w/120/h/120/v=201609121859',
            'url' => 'http://wiki.joyme.com/zdbjl/635778.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵千魂灵妖怎么样 千魂灵妖值得培养么',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/1/11/91301.png?imageView/1/w/120/h/120/v=201609131734',
            'url' => 'http://wiki.joyme.com/zdbjl/636029.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵什么情缘值得培养 绝对不能错过的情缘推荐',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/5/57/91302.png?imageView/1/w/120/h/120/v=201609131734',
            'url' => 'http://wiki.joyme.com/zdbjl/636028.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵浮岛总舵第二关阵容攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/a/a6/S91403.png?imageView/1/w/120/h/120/v=201609141728',
            'url' => 'http://wiki.joyme.com/zdbjl/636266.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵浑天教刺客怎么打',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/7/77/S91404.png?imageView/1/w/120/h/120/v=201609141728',
            'url' => 'http://wiki.joyme.com/zdbjl/636267.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵白雾森林第10关详细攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/c/c6/9183.png?imageView/1/w/120/h/120/v=201609181808',
            'url' => 'http://wiki.joyme.com/zdbjl/636855.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵千飞鹤阵容搭配 千飞鹤强不强',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/c/c6/9183.png?imageView/1/w/120/h/120/v=201609181808',
            'url' => 'http://wiki.joyme.com/zdbjl/636858.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),
        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵永久时装平凡之旅免费获得攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/0/0c/Suo02.png?imageView/1/w/120/h/120/v=201609191742',
            'url' => 'http://wiki.joyme.com/zdbjl/637073.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵新版资源副本势力战材料获得方法',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/b/bb/Suo03.png?imageView/1/w/120/h/120/v=201609191742',
            'url' => 'http://wiki.joyme.com/zdbjl/637075.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵魔王战英雄阵容选择攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/a/aa/Suo04.png?imageView/1/w/120/h/120/v=201609191742',
            'url' => 'http://wiki.joyme.com/zdbjl/637074.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),
        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵传说副本虚张声势道无息阵容攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/8/87/S201.png?imageView/1/w/120/h/120/v=201609201739',
            'url' => 'http://wiki.joyme.com/zdbjl/637295.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵传说副本39关攻略 狼神公主西风怎么打',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/d/de/S202.png?imageView/1/w/120/h/120/v=201609201739',
            'url' => 'http://wiki.joyme.com/zdbjl/637298.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵魔王战即将开启 BOSS千飞鹤解析',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/a/a9/S203.png?imageView/1/w/120/h/120/v=201609201739',
            'url' => 'http://wiki.joyme.com/zdbjl/637297.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵英雄如何觉醒 介绍觉醒玩法',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/b/b6/S204.png?imageView/1/w/120/h/120/v=201609201739',
            'url' => 'http://wiki.joyme.com/zdbjl/637296.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

    );
}

if ($strategys) {
    foreach ($strategys as $strategy) {
        echo json_encode($strategy);
        echo "\n";
    }
}