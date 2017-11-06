<?php
/**
 * Description:资讯模块
 * Author: gradydong
 * Date: 2016/9/6
 * Time: 11:12
 * Copyright: Joyme.com
 */
$wgWikiname = substr($_SERVER['HTTP_HOST'], 0, strpos($_SERVER['HTTP_HOST'], '.'));

header('Content-type:text/json; charset=utf-8');

$news = array();
if($wgWikiname == 'pvp'){
    $news = array(
        array(
            'indexData' => '王者荣耀',
            'title' => '《王者荣耀》KPL职业联赛总奖金高达185万冠军独揽80万',
            'image' => 'http://joymepic.joyme.com/wiki/images/pvp/3/32/%E3%80%8A%E7%8E%8B%E8%80%85%E8%8D%A3%E8%80%80%E3%80%8BKPL%E8%81%8C%E4%B8%9A%E8%81%94%E8%B5%9B%E6%80%BB%E5%A5%96%E9%87%91%E9%AB%98%E8%BE%BE185%E4%B8%87%E5%86%A0%E5%86%9B%E7%8B%AC%E6%8F%BD80%E4%B8%87-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/pvp/632467.shtml',
            'pubtime' => strtotime("2016/8/30"),
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '职业联赛首赛季奖总奖金今日公布',
            'image' => 'http://joymepic.joyme.com/wiki/images/pvp/e/e7/%E8%81%8C%E4%B8%9A%E8%81%94%E8%B5%9B%E9%A6%96%E8%B5%9B%E5%AD%A3%E5%A5%96%E6%80%BB%E5%A5%96%E9%87%91%E4%BB%8A%E6%97%A5%E5%85%AC%E5%B8%83-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/pvp/632947.shtml',
            'pubtime' => strtotime("2016/9/1"),
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '体验服资格申请活动第四期即将开启',
            'image' => 'http://joymepic.joyme.com/wiki/images/pvp/4/45/%E4%BD%93%E9%AA%8C%E6%9C%8D%E8%B5%84%E6%A0%BC%E7%94%B3%E8%AF%B7%E6%B4%BB%E5%8A%A8%E7%AC%AC%E5%9B%9B%E6%9C%9F%E5%8D%B3%E5%B0%86%E5%BC%80%E5%90%AF-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/pvp/633278.shtml',
            'pubtime' => strtotime("2016/9/2"),
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀韩信皮肤白龙吟8月26震撼上线',
            'image' => 'http://joymepic.joyme.com/wiki/images/pvp/b/bc/%E7%8E%8B%E8%80%85%E8%8D%A3%E8%80%80%E9%9F%A9%E4%BF%A1%E7%9A%AE%E8%82%A4%E7%99%BD%E9%BE%99%E5%90%9F8%E6%9C%8826%E9%9C%87%E6%92%BC%E4%B8%8A%E7%BA%BF-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/pvp/631668.shtml',
            'pubtime' => strtotime("2016/8/26"),
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '“神代重临”版本已知问题说明',
            'image' => 'http://joymepic.joyme.com/wiki/images/pvp/c/c5/%E2%80%9C%E7%A5%9E%E4%BB%A3%E9%87%8D%E4%B8%B4%E2%80%9D%E7%89%88%E6%9C%AC%E5%B7%B2%E7%9F%A5%E9%97%AE%E9%A2%98%E8%AF%B4%E6%98%8E-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/pvp/629357.shtml',
            'pubtime' => strtotime("2016/8/25"),
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀雅典娜圣域余晖即将上线',
            'image' => 'http://joymepic.joyme.com/wiki/images/pvp/5/5d/%E7%8E%8B%E8%80%85%E8%8D%A3%E8%80%80%E9%9B%85%E5%85%B8%E5%A8%9C%E5%9C%A3%E5%9F%9F%E4%BD%99%E6%99%96%E5%8D%B3%E5%B0%86%E4%B8%8A%E7%BA%BF-1.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/pvp/623308.shtml',
            'pubtime' => strtotime("2016/8/1"),
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '【红包分享】8月31日18:00全区开放公告说明',
            'image' => 'http://joymepic.joyme.com/wiki/images/pvp/6/64/%E3%80%90%E7%BA%A2%E5%8C%85%E5%88%86%E4%BA%AB%E3%80%918%E6%9C%8831%E6%97%A51800%E5%85%A8%E5%8C%BA%E5%BC%80%E6%94%BE%E5%85%AC%E5%91%8A%E8%AF%B4%E6%98%8E-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/pvp/632902.shtml',
            'pubtime' => strtotime("2016/8/31"),
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀抢先服是什么',
            'image' => 'http://joymepic.joyme.com/wiki/images/pvp/4/4a/%E7%8E%8B%E8%80%85%E8%8D%A3%E8%80%80%E6%8A%A2%E5%85%88%E6%9C%8D%E6%98%AF%E4%BB%80%E4%B9%88-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/pvp/633980.shtml',
            'pubtime' => strtotime("2016/9/5"),
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '9月1日体验服停机更新公告',
            'image' => 'http://joymepic.joyme.com/wiki/images/pvp/e/e7/9%E6%9C%881%E6%97%A5%E4%BD%93%E9%AA%8C%E6%9C%8D%E5%81%9C%E6%9C%BA%E6%9B%B4%E6%96%B0%E5%85%AC%E5%91%8A-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/pvp/633020.shtml',
            'pubtime' => strtotime("2016/9/1"),
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀公众号开学活动赢得白龙吟皮肤',
            'image' => 'http://joymepic.joyme.com/wiki/images/pvp/d/d8/%E7%8E%8B%E8%80%85%E8%8D%A3%E8%80%80%E5%85%AC%E4%BC%97%E5%8F%B7%E5%BC%80%E5%AD%A6%E6%B4%BB%E5%8A%A8%E8%B5%A2%E5%BE%97%E7%99%BD%E9%BE%99%E5%90%9F%E7%9A%AE%E8%82%A4-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/pvp/632724.shtml',
            'pubtime' => strtotime("2016/8/31"),
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '9月13日全服不停机更新公告',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/a/a8/官方13公告！！.jpg?v=201609131541',
            'url' => 'http://wiki.joyme.com/pvp/635893.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀9月7日体验服停机更新公告',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/a/ae/97PVP停机公告！.jpg?v=201609131541',
            'url' => 'http://wiki.joyme.com/pvp/634760.shtml',
            'pubtime' => strtotime('2016/9/7'),
            'category' => '',
        ),

        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀职业联赛分组赛程公布',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/3/3a/王者PVPPP联赛哥伦布.jpg?v=201609121715',
            'url' => 'http://wiki.joyme.com/pvp/635146.shtml',
            'pubtime' => strtotime('2016/9/9'),
            'category' => '',
        ),

        array(
            'indexData' => '王者荣耀',
            'title' => '《王者荣耀》禁止iOS第三方代充公告',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/f/f1/哥伦布禁止代充.jpg?v=201609121715',
            'url' => 'http://wiki.joyme.com/pvp/634766.shtml',
            'pubtime' => strtotime('2016/9/8'),
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '9月14日体验服停机更新公告',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/a/ac/9%E6%9C%8814%E6%97%A5%E4%BD%93%E9%AA%8C%E6%9C%8D%E5%81%9C%E6%9C%BA%E6%9B%B4%E6%96%B0%E5%85%AC%E5%91%8A.jpg?v=201609141743',
            'url' => 'http://wiki.joyme.com/pvp/636264.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),

        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀城市赛南京站战报出炉',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/5/54/%E7%8E%8B%E8%80%85%E8%8D%A3%E8%80%80%E5%9F%8E%E5%B8%82%E8%B5%9B%E5%8D%97%E4%BA%AC%E7%AB%99%E6%88%98%E6%8A%A5%E5%87%BA%E7%82%89.jpg?v=201609141743',
            'url' => 'http://wiki.joyme.com/pvp/636124.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '《王者荣耀》KPL职业联赛战报 DL苦战三局拿下XQ',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/0/07/DLVSXQ1111.jpg?v=201609181655',
            'url' => 'http://wiki.joyme.com/pvp/636730.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),

        array(
            'indexData' => '王者荣耀',
            'title' => '《王者荣耀》KPL职业联赛战报 MU让一追二击败超玩会',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/f/f5/MU超玩会1111.jpg?v=201609181655',
            'url' => 'http://wiki.joyme.com/pvp/636731.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '《王者荣耀》KPL联赛揭幕战战报 eStar2：0击溃VgHow',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/2/25/VGhow1estar.jpg?v=201609191605',
            'url' => 'http://wiki.joyme.com/pvp/636732.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),

        array(
            'indexData' => '王者荣耀',
            'title' => '《王者荣耀》KPL职业联赛正式开赛 AR技术点亮现场',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/d/d2/AR技术亮点.jpg?v=201609191605',
            'url' => 'http://wiki.joyme.com/pvp/636733.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '9月18日体验服停机更新公告',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/6/64/9.18停机更新！.jpg?v=201609201544',
            'url' => 'http://wiki.joyme.com/pvp/637038.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),

        array(
            'indexData' => '王者荣耀',
            'title' => 'S4赛季即将结束王者印记开启',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/c/c8/王者荣耀S4奖励！！.jpg?v=201609201544',
            'url' => 'http://wiki.joyme.com/pvp/637217.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

    );
}
elseif ($wgWikiname == 'cf'){
    $news =  array(
        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'CF手游9月新版本上线 新BOSS三头龙介绍',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/2/2f/CF手游9月新版本上线_新BOSS三头龙介绍1.jpg?v=201609071606',
            'url' => 'http://wiki.joyme.com/cf/633809.shtml',
            'pubtime' => strtotime('2016/8/30'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'CF手游M14武器介绍 男人枪带来M14实测',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/8/88/CF手游M14武器介绍_男人枪带来M14实测2.jpg?v=201609071606',
            'url' => 'http://wiki.joyme.com/cf/633810.shtml',
            'pubtime' => strtotime('2016/9/1'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'CF手游8月公开赛决赛结果 竞猜奖励丰富',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/2/2d/CF手游8月公开赛决赛结果_竞猜奖励丰富3.jpg?v=201609071606',
            'url' => 'http://wiki.joyme.com/cf/633811.shtml',
            'pubtime' => strtotime('2016/9/2'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'CF手游9月版本更新 登录即送88钻',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/d/d4/CF手游9月版本更新_登录即送88钻4.jpg?v=201609071606',
            'url' => 'http://wiki.joyme.com/cf/633812.shtml',
            'pubtime' => strtotime('2016/8/21'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => ' CF手游英雄武器狂欢周活动',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/4/42/CF手游英雄武器狂欢周活动5.jpg?v=201609071606',
            'url' => 'http://wiki.joyme.com/cf/633805.shtml',
            'pubtime' => strtotime('2016/8/20'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '积分赛限时开放公告',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/b/bb/积分赛限时开放公告6.jpg?v=201609071606',
            'url' => 'http://wiki.joyme.com/cf/420977.shtml',
            'pubtime' => strtotime('2016/8/1'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '《穿越火线：枪战王者》同时在线突破100万 注册用户突破1000万',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/7/76/注册用户突破1000万7.jpg?v=201609071606',
            'url' => 'http://wiki.joyme.com/cf/421480.shtml',
            'pubtime' => strtotime('2016/8/15'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => ' 黄金之夜 回馈千万玩家',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/0/09/黄金之夜_回馈千万玩家8.jpg?v=201609071606',
            'url' => 'http://wiki.joyme.com/cf/421479.shtml',
            'pubtime' => strtotime('2016/8/27'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '黄金周末惊喜连连亿万红包等你来拿！',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/e/e2/黄金周末惊喜连连亿万红包等你来拿！9.jpg?v=201609071606',
            'url' => 'http://wiki.joyme.com/cf/506485.shtml',
            'pubtime' => strtotime('2016/8/11'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '公测版本《僵尸狂潮》更新公告',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/1/16/公测版本《僵尸狂潮》更新公告10.jpg?v=201609071606',
            'url' => 'http://wiki.joyme.com/cf/506477.shtml',
            'pubtime' => strtotime('2016/8/12'),
            'category' => '',
        ),
        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '超级联赛全明星赛完美落幕',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/d/d3/CF完美谢幕！！.jpg?v=201609131541',
            'url' => 'http://wiki.joyme.com/cf/635885.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '超级联赛A组尘埃落定 仙阁凌冲无缘晋级',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/9/94/仙阁无缘晋级！.jpg?v=201609131541',
            'url' => 'http://wiki.joyme.com/cf/635907.shtml',
            'pubtime' => strtotime('2016/9/8'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '刀王、爆头大乱斗上线',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/c/c3/一钻优惠的刀王的哥伦布.jpg?v=201609121715',
            'url' => 'http://wiki.joyme.com/cf/635587.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'CF手游开学季大狂欢',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/c/c3/开学拿枪的哥伦布.jpg?v=201609121715',
            'url' => 'http://wiki.joyme.com/cf/635531.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),
        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'CF手游战队联盟成立：合作推动移动电竞健康发展',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/3/39/Cfs91403.png?imageView/1/w/120/h/120/v=201609141912',
            'url' => 'http://wiki.joyme.com/cf/636287.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '超级联赛全明星赛完美落幕 携中信银行发布CFer至尊卡',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/d/da/Cfs91404.png?imageView/1/w/120/h/120/v=201609141912',
            'url' => 'http://wiki.joyme.com/cf/636292.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '超级联赛全明星赛完美落幕',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/d/d3/CF完美谢幕！！.jpg?v=201609131541',
            'url' => 'http://wiki.joyme.com/cf/635885.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '超级联赛A组尘埃落定 仙阁凌冲无缘晋级',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/9/94/仙阁无缘晋级！.jpg?v=201609131541',
            'url' => 'http://wiki.joyme.com/cf/635907.shtml',
            'pubtime' => strtotime('2016/9/8'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '刀王、爆头大乱斗上线',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/c/c3/一钻优惠的刀王的哥伦布.jpg?v=201609121715',
            'url' => 'http://wiki.joyme.com/cf/635587.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'CF手游开学季大狂欢',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/c/c3/开学拿枪的哥伦布.jpg?v=201609121715',
            'url' => 'http://wiki.joyme.com/cf/635531.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),
        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '9.21新版本抢先看',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/8/8b/921大更新1111.jpg?v=201609181655',
            'url' => 'http://wiki.joyme.com/cf/636815.shtml',
            'pubtime' => strtotime('2016/9/16'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '1亿CFer共战全新“推车”玩法',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/e/e4/推车玩法1111.jpg?v=201609181655',
            'url' => 'http://wiki.joyme.com/cf/636809.shtml',
            'pubtime' => strtotime('2016/9/16'),
            'category' => '',
        ),
        array(
            'indexData' => '穿越火线枪战王者',
            'title' => ' 超级联赛B组循环赛开启 激战一触即发',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/a/af/B组循环一触即发！.jpg?v=201609191605',
            'url' => 'http://wiki.joyme.com/cf/637045.shtml',
            'pubtime' => strtotime('2016/9/17'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'CF正版手游中秋送永久武器 一亿Cfer好玩节共狂欢！',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/9/93/9.15好完结中秋送武器.jpg?v=201609191605',
            'url' => 'http://wiki.joyme.com/cf/637047.shtml',
            'pubtime' => strtotime('2016/9/16'),
            'category' => '',
        ),
        array(
            'indexData' => '穿越火线枪战王者',
            'title' => '新武器提前曝光 CF手游“生化统领”版本即将上线',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/b/b3/生化同龄上限！！！.jpg?v=201609201544',
            'url' => 'http://wiki.joyme.com/cf/637256.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),

        array(
            'indexData' => '穿越火线枪战王者',
            'title' => 'CF手游战队联盟成立：合作推动移动电竞健康发展',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/3/3a/CF手游战队联盟成立！.jpg?v=201609201544',
            'url' => 'http://wiki.joyme.com/cf/636287.shtml',
            'pubtime' => strtotime('2016/9/15'),
            'category' => '',
        ),

    );
}
elseif ($wgWikiname == 'pokemongo'){
    $news =   array(
        array(
            'indexData' => 'pokemon go',
            'title' => 'Pokemon GO全球大热，美国国家公园邀请玩家入园抓精灵',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/e/e0/PMGO%E6%96%B0%E9%97%BB1.png?imageView/1/w/120/h/120/v=201609080931',
            'url' => 'http://wiki.joyme.com/pokemongo/Pokemon_GO%E5%85%A8%E7%90%83%E5%A4%A7%E7%83%AD%EF%BC%8C%E7%BE%8E%E5%9B%BD%E5%9B%BD%E5%AE%B6%E5%85%AC%E5%9B%AD%E9%82%80%E8%AF%B7%E7%8E%A9%E5%AE%B6%E5%85%A5%E5%9B%AD%E6%8A%93%E7%B2%BE%E7%81%B5',
            'pubtime' => strtotime('2016/7/25'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => 'PokemonGO Plus手环跳票 9月才能与玩家见面',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/7/74/PMGO%E6%96%B0%E9%97%BB2.png?imageView/1/w/120/h/120/v=201609080931',
            'url' => 'http://wiki.joyme.com/pokemongo/PokemonGO_Plus%E6%89%8B%E7%8E%AF%E8%B7%B3%E7%A5%A8_9%E6%9C%88%E6%89%8D%E8%83%BD%E4%B8%8E%E7%8E%A9%E5%AE%B6%E8%A7%81%E9%9D%A2',
            'pubtime' => strtotime('2016/7/27'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => 'PokemonGo0.31.0升级更新 修复电池保护程序闪退',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/b/b2/PMGO%E6%96%B0%E9%97%BB3.png?imageView/1/w/120/h/120/v=201609080931',
            'url' => 'http://wiki.joyme.com/pokemongo/PokemonGo0.31.0%E5%8D%87%E7%BA%A7%E6%9B%B4%E6%96%B0_%E4%BF%AE%E5%A4%8D%E7%94%B5%E6%B1%A0%E4%BF%9D%E6%8A%A4%E7%A8%8B%E5%BA%8F%E9%97%AA%E9%80%80',
            'pubtime' => strtotime('2016/8/1'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '微信惊现网页版PokemonGo 高度还原试玩需谨慎',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/3/3b/PMGO%E6%96%B0%E9%97%BB4.png?imageView/1/w/120/h/120/v=201609080931',
            'url' => 'http://wiki.joyme.com/pokemongo/%E5%BE%AE%E4%BF%A1%E6%83%8A%E7%8E%B0%E7%BD%91%E9%A1%B5%E7%89%88PokemonGo_%E9%AB%98%E5%BA%A6%E8%BF%98%E5%8E%9F%E8%AF%95%E7%8E%A9%E9%9C%80%E8%B0%A8%E6%85%8E',
            'pubtime' => strtotime('2016/8/1'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '澳洲男子驾车玩PokemonGo 失控撞进校园',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/3/30/PMGO%E6%96%B0%E9%97%BB5.png?imageView/1/w/120/h/120/v=201609080931',
            'url' => 'http://wiki.joyme.com/pokemongo/%E6%BE%B3%E6%B4%B2%E7%94%B7%E5%AD%90%E9%A9%BE%E8%BD%A6%E7%8E%A9PokemonGo_%E5%A4%B1%E6%8E%A7%E6%92%9E%E8%BF%9B%E6%A0%A1%E5%9B%AD',
            'pubtime' => strtotime('2016/8/2'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => 'WP玩家发起WP版PokemonGO请愿 签名数已超十万',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/e/e7/PMGO%E6%96%B0%E9%97%BB6.png?imageView/1/w/120/h/120/v=201609080931',
            'url' => 'http://wiki.joyme.com/pokemongo/WP%E7%8E%A9%E5%AE%B6%E5%8F%91%E8%B5%B7WP%E7%89%88PokemonGO%E8%AF%B7%E6%84%BF%E7%AD%BE%E5%90%8D%E6%95%B0%E5%B7%B2%E8%B6%85%E5%8D%81%E4%B8%87',
            'pubtime' => strtotime('2016/8/2'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => 'Niantic被批傲慢与偏见 PokemonGo遭差评退款',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/c/c4/PMGO%E6%96%B0%E9%97%BB7.png?imageView/1/w/120/h/120/v=201609080931',
            'url' => 'http://wiki.joyme.com/pokemongo/Niantic%E8%A2%AB%E6%89%B9%E5%82%B2%E6%85%A2%E4%B8%8E%E5%81%8F%E8%A7%81_PokemonGo%E9%81%AD%E5%B7%AE%E8%AF%84%E9%80%80%E6%AC%BE',
            'pubtime' => strtotime('2016/8/5'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '奥运会运动员福利到！PokemonGO已登录巴西地区',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/8/8d/PMGO%E6%96%B0%E9%97%BB8.png?imageView/1/w/120/h/120/v=201609080931',
            'url' => 'http://wiki.joyme.com/pokemongo/%E5%A5%A5%E8%BF%90%E4%BC%9A%E8%BF%90%E5%8A%A8%E5%91%98%E7%A6%8F%E5%88%A9%E5%88%B0%EF%BC%81PokemonGO%E5%B7%B2%E7%99%BB%E5%BD%95%E5%B7%B4%E8%A5%BF%E5%9C%B0%E5%8C%BA',
            'pubtime' => strtotime('2016/8/5'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => 'PokemonGo国服上架 部分国服区域已解锁',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/0/0a/PMGO%E6%96%B0%E9%97%BB9.png?imageView/1/w/120/h/120/v=201609080931',
            'url' => 'http://wiki.joyme.com/pokemongo/PokemonGo%E5%9B%BD%E6%9C%8D%E4%B8%8A%E6%9E%B6_%E9%83%A8%E5%88%86%E5%9B%BD%E6%9C%8D%E5%8C%BA%E5%9F%9F%E5%B7%B2%E8%A7%A3%E9%94%81',
            'pubtime' => strtotime('2016/8/8'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '柬埔寨一博物馆严禁PokemonGO玩家',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/6/67/PMGO%E6%96%B0%E9%97%BB10.png?imageView/1/w/120/h/120/v=201609080931',
            'url' => 'http://wiki.joyme.com/pokemongo/%E6%9F%AC%E5%9F%94%E5%AF%A8%E4%B8%80%E5%8D%9A%E7%89%A9%E9%A6%86%E4%B8%A5%E7%A6%81PokemonGO%E7%8E%A9%E5%AE%B6',
            'pubtime' => strtotime('2016/8/11'),
            'category' => '',
        ),
        array(
            'indexData' => 'pokemon go',
            'title' => 'Niantic：《精灵宝可梦Go》迎来Buddy系统更新',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/f/f5/150.jpg?v=201609121814',
            'url' => 'http://wiki.joyme.com/pokemongo/Buddy',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => 'Pokemon go精灵宝可梦GO不再支持越狱设备',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/2/26/1501.jpg?v=201609121818',
            'url' => 'http://wiki.joyme.com/pokemongo/%E4%B8%8D%E6%94%AF%E6%8C%81%E8%B6%8A%E7%8B%B1%E8%AE%BE%E5%A4%87',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO iOS/Android更新内容有哪些',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/8/82/1502.jpg?v=201609121825',
            'url' => 'http://wiki.joyme.com/pokemongo/%E7%B2%BE%E7%81%B5%E5%AE%9D%E5%8F%AF%E6%A2%A6GO%E6%9B%B4%E6%96%B0%E5%86%85%E5%AE%B9',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO伙伴系统介绍 怎么玩',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/f/f5/150.jpg?v=201609131334',
            'url' => 'http://wiki.joyme.com/pokemongo/%E4%BC%99%E4%BC%B4%E7%B3%BB%E7%BB%9F',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '口袋妖怪GO将登陆Android Wear',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/8/82/1502.jpg?v=201609131353',
            'url' => 'http://wiki.joyme.com/pokemongo/%E5%85%A8%E5%B9%B3%E5%8F%B0%E9%80%9A%E5%90%83',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '日本借助口袋妖怪GO改善家里蹲问题',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/f/f5/150.jpg?v=201609131409',
            'url' => 'http://wiki.joyme.com/pokemongo/%E5%AE%B6%E9%87%8C%E8%B9%B2',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO遭遇滑铁卢 国内仍在期待',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/8/87/1503.jpg?v=201609131645',
            'url' => 'http://wiki.joyme.com/pokemongo/%E6%BB%91%E9%93%81%E5%8D%A2',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO精灵拟人化图欣赏 简直萌化了',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/f/f5/150.jpg?v=201609131705',
            'url' => 'http://wiki.joyme.com/pokemongo/%E7%B2%BE%E7%81%B5%E6%8B%9F%E4%BA%BA%E5%8C%96',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => 'Niantic：《精灵宝可梦Go》迎来Buddy系统更新',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/f/f5/150.jpg?v=201609121814',
            'url' => 'http://wiki.joyme.com/pokemongo/Buddy',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => 'Pokemon go精灵宝可梦GO不再支持越狱设备',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/2/26/1501.jpg?v=201609121818',
            'url' => 'http://wiki.joyme.com/pokemongo/%E4%B8%8D%E6%94%AF%E6%8C%81%E8%B6%8A%E7%8B%B1%E8%AE%BE%E5%A4%87',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO iOS/Android更新内容有哪些',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/8/82/1502.jpg?v=201609121825',
            'url' => 'http://wiki.joyme.com/pokemongo/%E7%B2%BE%E7%81%B5%E5%AE%9D%E5%8F%AF%E6%A2%A6GO%E6%9B%B4%E6%96%B0%E5%86%85%E5%AE%B9',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),
        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO新版本 皮卡丘跳上肩膀',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/f/f5/150.jpg?v=201609141606',
            'url' => 'http://wiki.joyme.com/pokemongo/%E6%96%B0%E7%89%88%E6%9C%AC',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO下一站中国/印度 难度比较大',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/2/26/1501.jpg?v=201609141620',
            'url' => 'http://wiki.joyme.com/pokemongo/%E8%BF%9B%E5%85%A5%E4%B8%AD%E5%9B%BD',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),
        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO Plus在日发售 两小时抢购一空',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/f/f5/150.jpg?v=201609180921',
            'url' => 'http://wiki.joyme.com/pokemongo/PokemongoPLUS',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '口袋妖怪GO流失79%付费玩家 仍为吸金法宝',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/2/26/1501.jpg?v=201609181001',
            'url' => 'http://wiki.joyme.com/pokemongo/%E5%90%B8%E9%87%91%E6%B3%95%E5%AE%9D',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),
        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO公益广告 开车不玩游戏',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/f/f5/150.jpg?v=201609191018',
            'url' => 'http://wiki.joyme.com/pokemongo/%E5%85%AC%E7%9B%8A%E5%B9%BF%E5%91%8A',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO洲际限定精灵汇总 CP值多少',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/8/82/1502.jpg?v=201609191032',
            'url' => 'http://wiki.joyme.com/pokemongo/%E9%99%90%E5%AE%9A%E7%B2%BE%E7%81%B5',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),
        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO玩家12级台风时海边抓精灵',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/f/f5/150.jpg?v=201609200924',
            'url' => 'http://wiki.joyme.com/pokemongo/%E6%8A%93%E7%B2%BE%E7%81%B5',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

        array(
            'indexData' => 'pokemon go',
            'title' => '精灵宝可梦GO PLUS上手体验 有望重回巅峰',
            'image' => 'http://joymepic.joyme.com/wiki/images/pokemongo/f/f5/150.jpg?v=201609201011',
            'url' => 'http://wiki.joyme.com/pokemongo/GOPlus',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

    );
}
elseif ($wgWikiname == 'qmqj'){
    $news =   array(
        array(
            'indexData' => '全民奇迹',
            'title' => '全民奇迹MU周年大事盘点 国民级3DMMORPG手游的奇迹',
            'image' => 'http://joymepic.joyme.com/wiki/images/lol/a/ab/%E5%91%A8%E5%B9%B4%E5%A4%A7%E4%BA%8B%E7%9B%98%E7%82%B910.jpg?v=201609071524',
            'url' => 'http://wiki.joyme.com/qmqj/420705.shtml',
            'pubtime' => strtotime('2016/8/1'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '全民奇迹MU十年相伴 奇迹再续',
            'image' => 'http://joymepic.joyme.com/wiki/images/lol/c/c6/%E5%8D%81%E5%B9%B4%E7%9B%B8%E4%BC%B42.jpg?v=201609071527',
            'url' => 'http://wiki.joyme.com/qmqj/420707.shtml',
            'pubtime' => strtotime('2016/8/3'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '全民奇迹MU霸占排行榜Top10 5小时充值破千万',
            'image' => 'http://joymepic.joyme.com/wiki/images/lol/9/9b/%E9%9C%B8%E5%8D%A0%E6%8E%92%E8%A1%8C%E6%A6%9C1.jpg?v=201609071530',
            'url' => 'http://wiki.joyme.com/qmqj/420708.shtml',
            'pubtime' => strtotime('2016/8/5'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '全民奇迹MU外挂事件 零容忍痛击外挂',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/2/24/%E5%9B%9E%E9%A1%BE06.jpg?v=201609071533',
            'url' => 'http://wiki.joyme.com/qmqj/420630.shtml',
            'pubtime' => strtotime('2016/8/6'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '全民奇迹MU闪亮2014 扬帆2015',
            'image' => 'http://joymepic.joyme.com/wiki/images/lol/5/5a/%E9%97%AA%E4%BA%AE1.jpg?v=201609071514',
            'url' => 'http://wiki.joyme.com/qmqj/420706.shtml',
            'pubtime' => strtotime('2016/8/19'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '团队塔防恶魔来袭 《全民奇迹MU》点燃守备烽火',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/9/9b/T143.jpg?v=201609071705',
            'url' => 'http://wiki.joyme.com/qmqj/351406.shtml',
            'pubtime' => strtotime('2016/8/22'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '刘谦本人惊现《全民奇迹MU》 魔法大礼开启跨服盛宴',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/f/f0/T126.jpg?v=201609071705',
            'url' => 'http://wiki.joyme.com/qmqj/350361.shtml',
            'pubtime' => strtotime('2016/8/24'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '奇迹不留任何遗憾 《全民奇迹MU》新版月卡带你领跑新区',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/2/26/T122.jpg?v=201609071705',
            'url' => 'http://wiki.joyme.com/qmqj/350360.shtml',
            'pubtime' => strtotime('2016/8/27'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '刘谦帝都鉴证《全民奇迹MU》第二弹：奇迹无需等待',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/8/8f/T121.jpg?v=201609071705',
            'url' => 'http://wiki.joyme.com/qmqj/350250.shtml',
            'pubtime' => strtotime('2016/8/29'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '登顶港澳台韩畅销榜 《全民奇迹MU》下一步战略布局曝光',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/6/63/T112.jpg?v=201609071705',
            'url' => 'http://wiki.joyme.com/qmqj/350252.shtml',
            'pubtime' => strtotime('2016/9/1'),
            'category' => '',
        ),
        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》版本更新 挑战再升级',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/8/88/%E3%80%8A%E5%85%A8%E6%B0%91%E5%A5%87%E8%BF%B9%E3%80%8B%E7%89%88%E6%9C%AC%E6%9B%B4%E6%96%B0.jpg?v=201609131352',
            'url' => 'http://wiki.joyme.com/qmqj/95515.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》你从未见过的那些“神秘”NPC',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/7/71/412314.jpg?v=201609131352',
            'url' => 'http://wiki.joyme.com/qmqj/95514.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '后宫添新人 《全民奇迹MU》女性佳丽降临',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/0/0e/782a0316fdfaaf51d5ebbb14845494eef11f7ac6_%E5%89%AF%E6%9C%AC.jpg?v=201609121624',
            'url' => 'http://wiki.joyme.com/qmqj/635534.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '感恩老师 《全民奇迹MU》哪些敢于分享的老司机',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/7/73/%E6%84%9F%E6%81%A9%E8%80%81%E5%B8%88_%E3%80%8A%E5%85%A8%E6%B0%91%E5%A5%87%E8%BF%B9MU%E3%80%8B%E5%93%AA%E4%BA%9B%E6%95%A2%E4%BA%8E%E5%88%86%E4%BA%AB%E7%9A%84%E8%80%81%E5%8F%B8%E6%9C%BA1_%E5%89%AF%E6%9C%AC.jpg?v=201609121624',
            'url' => 'http://wiki.joyme.com/qmqj/635535.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹MU》9月12日合区公告',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/d/d5/20160911223628_80112_%E5%89%AF%E6%9C%AC.png?v=201609121624',
            'url' => 'http://wiki.joyme.com/qmqj/635649.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹MU》2.3.0体验服关服公告',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/a/ad/%E6%84%9F%E6%81%A9%E8%80%81%E5%B8%88_%E3%80%8A%E5%85%A8%E6%B0%91%E5%A5%87%E8%BF%B9MU%E3%80%8B%E5%93%AA%E4%BA%9B%E6%95%A2%E4%BA%8E%E5%88%86%E4%BA%AB%E7%9A%84%E8%80%81%E5%8F%B8%E6%9C%BA3_%E5%89%AF%E6%9C%AC.jpg?v=201609121624',
            'url' => 'http://wiki.joyme.com/qmqj/635645.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),
        array(
            'indexData' => '全民奇迹',
            'title' => '用力剖析 《全民奇迹》你看不到的深层花絮',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/5/52/%E3%80%8A%E5%85%A8%E6%B0%91%E5%A5%87%E8%BF%B9%E3%80%8B%E4%BD%A0%E7%9C%8B%E4%B8%8D%E5%88%B0%E7%9A%84%E6%B7%B1%E5%B1%82%E8%8A%B1%E7%B5%AE.jpg?v=201609141058',
            'url' => 'http://wiki.joyme.com/qmqj/95513.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '兄弟情 奇迹梦 《全民奇迹》战盟创辉煌',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/8/8e/%E5%A5%87%E8%BF%B9%E6%A2%A6_%E3%80%8A%E5%85%A8%E6%B0%91%E5%A5%87%E8%BF%B9%E3%80%8B%E6%88%98%E7%9B%9F%E5%88%9B%E8%BE%89%E7%85%8C.jpg?v=201609141058',
            'url' => 'http://wiki.joyme.com/qmqj/95512.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),
        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》 被遗忘的魔法之道',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/1/12/%E3%80%8A%E5%85%A8%E6%B0%91%E5%A5%87%E8%BF%B9%E3%80%8B_%E8%A2%AB%E9%81%97%E5%BF%98%E7%9A%84%E9%AD%94%E6%B3%95%E4%B9%8B%E9%81%93.jpg?v=201609181346',
            'url' => 'http://wiki.joyme.com/qmqj/95511.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》 那些可爱的精灵MM',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/2/2c/%E3%80%8A%E5%85%A8%E6%B0%91%E5%A5%87%E8%BF%B9%E3%80%8B_%E9%82%A3%E4%BA%9B%E5%8F%AF%E7%88%B1%E7%9A%84%E7%B2%BE%E7%81%B5MM.jpg?v=201609181346',
            'url' => 'http://wiki.joyme.com/qmqj/95510.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),
        array(
            'indexData' => '全民奇迹',
            'title' => '《全民奇迹》 有一种职业叫战士',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/6/60/%E3%80%8A%E5%85%A8%E6%B0%91%E5%A5%87%E8%BF%B9%E3%80%8B_%E6%9C%89%E4%B8%80%E7%A7%8D%E8%81%8C%E4%B8%9A%E5%8F%AB%E6%88%98%E5%A3%AB.jpg?v=201609191408',
            'url' => 'http://wiki.joyme.com/qmqj/95509.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => ' 痛快！《全民奇迹》史诗动作 引领前茅',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/2/23/%E3%80%8A%E5%85%A8%E6%B0%91%E5%A5%87%E8%BF%B9%E3%80%8B%E5%8F%B2%E8%AF%97%E5%8A%A8%E4%BD%9C_%E5%BC%95%E9%A2%86%E5%89%8D%E8%8C%85.jpg?v=201609191408',
            'url' => 'http://wiki.joyme.com/qmqj/95508.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),
        array(
            'indexData' => '全民奇迹',
            'title' => '日久见人心 《全民奇迹》玩家故事',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/6/60/%E3%80%8A%E5%85%A8%E6%B0%91%E5%A5%87%E8%BF%B9%E3%80%8B_%E6%9C%89%E4%B8%80%E7%A7%8D%E8%81%8C%E4%B8%9A%E5%8F%AB%E6%88%98%E5%A3%AB.jpg?v=201609191408',
            'url' => 'http://wiki.joyme.com/qmqj/95507.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

        array(
            'indexData' => '全民奇迹',
            'title' => ' 冬天里的一把火！《全民奇迹》动作手游典范',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/2/23/%E3%80%8A%E5%85%A8%E6%B0%91%E5%A5%87%E8%BF%B9%E3%80%8B%E5%8F%B2%E8%AF%97%E5%8A%A8%E4%BD%9C_%E5%BC%95%E9%A2%86%E5%89%8D%E8%8C%85.jpg?v=201609191408',
            'url' => 'http://wiki.joyme.com/qmqj/95506.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

    );
}
elseif ($wgWikiname == 'lol'){
    $news =   array(
        array(
            'indexData' => '英雄联盟',
            'title' => '三次迈向世界赛 Bjergsen或创造历史',
            'image' => 'http://joymepic.joyme.com/wiki/images/lol/f/f5/QQ%E5%9B%BE%E7%89%8720160904170252.png?v=201609071800',
            'url' => 'http://wiki.joyme.com/lol/%E7%AC%AC%E4%B8%89%E6%AC%A1%E8%BF%88%E5%90%91%E4%B8%96%E7%95%8C%E8%B5%9B_Bjergsen%E6%88%96%E5%88%9B%E9%80%A0%E5%8E%86%E5%8F%B2',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '英雄联盟',
            'title' => 'LOL EDG战队退出NEST比赛 全力备战S6',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/5/50/QQ%E6%88%AA%E5%9B%BE20160904132149.jpg?v=201609072332',
            'url' => 'http://wiki.joyme.com/lol/LOL_EDG%E6%88%98%E9%98%9F%E9%80%80%E5%87%BANEST%E6%AF%94%E8%B5%9B_%E5%85%A8%E5%8A%9B%E5%A4%87%E6%88%98S6',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '英雄联盟',
            'title' => 'LOL S6总决赛时间已确定 地点在美国',
            'image' => 'http://joymepic.joyme.com/wiki/images/jx3/6/60/LOL_S6%E6%80%BB%E5%86%B3%E8%B5%9B%E6%97%B6%E9%97%B4.jpg?v=201609072332',
            'url' => 'http://wiki.joyme.com/lol/LOL_S6%E6%80%BB%E5%86%B3%E8%B5%9B%E6%97%B6%E9%97%B4%E5%B7%B2%E7%A1%AE%E5%AE%9A_%E5%9C%B0%E7%82%B9%E5%9C%A8%E7%BE%8E%E5%9B%BD',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),
    );
}
elseif ($wgWikiname == 'qlz'){
    $news =   array(
        array(
            'indexData' => '龙珠激斗',
            'title' => '伙伴系统上线 挑战新极限',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/6/67/%E6%96%B0%E9%97%BB%E7%BC%A9%E7%95%A5%E5%9B%BE1.png?imageView/1/w/120/h/120/v=201609071603',
            'url' => 'http://wiki.joyme.com/qlz/633315.shtml',
            'pubtime' => strtotime('2016/9/2'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '掌控东宇宙的王者，神级辅助东界王神即将降临',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/3/34/%E6%96%B0%E9%97%BB%E7%BC%A9%E7%95%A5%E5%9B%BE9.png?imageView/1/w/120/h/120/v=201609071828',
            'url' => 'http://wiki.joyme.com/qlz/634546.shtml',
            'pubtime' => strtotime('2016/8/22'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '《龙珠激斗》第一位合体战士——悟天克斯耀世上线',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/f/f7/%E6%96%B0%E9%97%BB%E7%BC%A9%E7%95%A5%E5%9B%BE10.png?imageView/1/w/120/h/120/v=201609071828',
            'url' => 'http://wiki.joyme.com/qlz/629412.shtml',
            'pubtime' => strtotime('2016/8/19'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '“贝吉塔”抵达ChinaJoy现场！熟悉声线瞬间引燃回忆！',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/0/07/%E6%96%B0%E9%97%BB%E7%BC%A9%E7%95%A5%E5%9B%BE2.png?imageView/1/w/120/h/120/v=201609071603',
            'url' => 'http://wiki.joyme.com/qlz/623274.shtml',
            'pubtime' => strtotime('2016/7/29'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '《龙珠激斗》夏日狂欢节来临！多重活动嗨翻夏日！',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/8/86/%E6%96%B0%E9%97%BB%E7%BC%A9%E7%95%A5%E5%9B%BE3.png?imageView/1/w/120/h/120/v=201609071603',
            'url' => 'http://wiki.joyme.com/qlz/621887.shtml',
            'pubtime' => strtotime('2016/7/25'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '《龙珠激斗》最强公测！ 欲与粉丝共庆七龙珠三十周年！',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/2/2f/%E6%96%B0%E9%97%BB%E7%BC%A9%E7%95%A5%E5%9B%BE4.png?imageView/1/w/120/h/120/v=201609071603',
            'url' => 'http://wiki.joyme.com/qlz/604683.shtml',
            'pubtime' => strtotime('2016/5/25'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '《龙珠激斗》登顶AppStore免费榜第一',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/1/1d/%E6%96%B0%E9%97%BB%E7%BC%A9%E7%95%A5%E5%9B%BE5.png?imageView/1/w/120/h/120/v=201609071603',
            'url' => 'http://wiki.joyme.com/qlz/592935.shtml',
            'pubtime' => strtotime('2016/3/31'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '《龙珠激斗》3月19日版本更新公告',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/7/72/%E6%96%B0%E9%97%BB%E7%BC%A9%E7%95%A5%E5%9B%BE6.png?imageView/1/w/120/h/120/v=201609071603',
            'url' => 'http://wiki.joyme.com/qlz/591345.shtml',
            'pubtime' => strtotime('2016/3/22'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '《龙珠激斗》3月16日版本更新公告',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/e/ec/%E6%96%B0%E9%97%BB%E7%BC%A9%E7%95%A5%E5%9B%BE7.png?imageView/1/w/120/h/120/v=201609071603',
            'url' => 'http://wiki.joyme.com/qlz/591350.shtml',
            'pubtime' => strtotime('2016/3/16'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '《龙珠激斗》正版七龙珠手游删档测试，热血来袭！',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/e/ec/%E6%96%B0%E9%97%BB%E7%BC%A9%E7%95%A5%E5%9B%BE8.png?imageView/1/w/120/h/120/v=201609071603',
            'url' => 'http://wiki.joyme.com/qlz/591351.shtml',
            'pubtime' => strtotime('2016/3/22'),
            'category' => '',
        ),
        array(
            'indexData' => '龙珠激斗',
            'title' => '龙珠激斗最值得期待的赛亚人战士',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/4/42/%E7%BC%A9%E7%95%A5%E5%9B%BE007.jpg?v=201609131650',
            'url' => 'http://wiki.joyme.com/qlz/635764.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '迎半年庆 龙珠激斗九月狂欢活动五连弹',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/8/85/%E7%BC%A9%E7%95%A5%E5%9B%BE008.jpg?v=201609131651',
            'url' => 'http://wiki.joyme.com/qlz/635987.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '龙珠激斗伙伴系统大解析',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/f/f1/%E7%BC%A9%E7%95%A5%E5%9B%BE11.jpg?v=201609121731',
            'url' => 'http://wiki.joyme.com/qlz/635652.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '迎半年庆 龙珠激斗福利月惊喜抢先曝光',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/a/a9/%E7%BC%A9%E7%95%A5%E5%9B%BE22.jpg?v=201609121731',
            'url' => 'http://qlz.joyme.com/635755.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),
        array(
            'indexData' => '龙珠激斗',
            'title' => ' 龙珠激斗开启新模式打怪升级宝箱奖励',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/e/ea/%E7%BC%A9%E7%95%A5%E5%9B%BE0013.jpg?v=201609141636',
            'url' => 'http://wiki.joyme.com/qlz/636184.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '龙珠激斗贝吉特即将登场战士能力大猜想',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/6/6a/%E7%BC%A9%E7%95%A5%E5%9B%BE0014.jpg?v=201609141637',
            'url' => 'http://wiki.joyme.com/qlz/636185.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),
        array(
            'indexData' => '龙珠激斗',
            'title' => '龙珠激斗贝吉特中秋觉醒贝吉特实力大增',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/a/aa/Q0019.jpg?v=201609181746',
            'url' => 'http://wiki.joyme.com/qlz/636846.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '龙珠激斗手Q平台贝吉特充值送福利活动补偿公告',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/1/1d/Q0020.jpg?v=201609181746',
            'url' => 'http://wiki.joyme.com/qlz/636768.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),
        array(
            'indexData' => '龙珠激斗',
            'title' => '宿命对决龙珠激斗宿敌的最终归宿',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/a/aa/Q0025.jpg?v=201609191646',
            'url' => 'http://wiki.joyme.com/qlz/636974.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '龙珠激斗最可爱的女孩人斑斑定位解析',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/0/04/Q0026.jpg?v=201609191646',
            'url' => 'http://wiki.joyme.com/qlz/636976.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),
        array(
            'indexData' => '龙珠激斗',
            'title' => '《龙珠激斗》跨服武道,巅峰对决',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/6/6a/Q0031.jpg?v=201609201644',
            'url' => 'http://wiki.joyme.com/qlz/637228.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

        array(
            'indexData' => '龙珠激斗',
            'title' => '【龙珠激斗】半年庆典七重豪华福利曝光',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/8/87/Q0032.jpg?v=201609201645',
            'url' => 'http://wiki.joyme.com/qlz/637280.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

    );
}
elseif ($wgWikiname == 'qjnn'){
    $news =   array(
        array(
            'indexData' => '奇迹暖暖',
            'title' => '浮梦岛长期开放 累积充值送好礼',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/e/e3/%E6%B5%AE%E6%A2%A6%E5%B2%9B234.jpg?v=201609071654',
            'url' => 'http://wiki.joyme.com/qjnn/632916.shtml',
            'pubtime' => strtotime('2016/9/1'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖登录即送套装',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/2/27/%E5%B0%A4%E5%85%8B%E9%87%8C%E9%87%8C.jpg?v=201609071656',
            'url' => 'http://wiki.joyme.com/qjnn/632306.shtml',
            'pubtime' => strtotime('2016/8/30'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖第十五章漫画剧情抢先知',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/7/71/%E6%BC%AB%E7%94%BB.jpg?v=201609071657%9B%E6%9C%9F%E5%8D%B3%E5%B0%86%E5%BC%80%E5%90%AF-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/qjnn/632348.shtml',
            'pubtime' => strtotime('2016/8/29'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖第十五章剧情套装大爆料',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/d/d6/%E7%AC%AC%E5%8D%81%E4%BA%94%E7%AB%A0%E5%89%A7%E6%83%85.jpg?v=201609071658%9F8%E6%9C%8826%E9%9C%87%E6%92%BC%E4%B8%8A%E7%BA%BF-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/qjnn/632290.shtml',
            'pubtime' => strtotime('2016/8/29'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '七夕神秘活动大爆料之夏末海歌',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/8/82/%E5%A4%8F%E6%B2%AB%E6%B5%B7%E6%AD%8C.jpg?v=201609071658%AE%E9%A2%98%E8%AF%B4%E6%98%8E-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/qjnn/625197.shtml',
            'pubtime' => strtotime('2016/8/8'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '定格光影,今夏游光',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/a/ab/%E6%B8%B8%E5%85%89.jpg?v=201609071659',
            'url' => 'http://wiki.joyme.com/qjnn/620832.shtml',
            'pubtime' => strtotime('2016/7/22'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖新功能,助你清爽一夏',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/c/ca/%E6%B8%85%E7%88%BD%E4%B8%80%E5%A4%8F.jpg?v=201609071700A%E5%BC%80%E6%94%BE%E5%85%AC%E5%91%8A%E8%AF%B4%E6%98%8E-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/qjnn/626053.shtml',
            'pubtime' => strtotime('2016/8/11'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖新套装鹦鹉公主活动分析',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/6/64/%E6%9C%AA%E6%A0%87%E9%A2%98-1.jpg?v=201609071704',
            'url' => 'http://wiki.joyme.com/qjnn/630637.shtml',
            'pubtime' => strtotime('2016/8/25'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '双倍充值累计送套装',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/7/76/%E5%8F%8C%E5%80%8D%E7%B4%AF%E8%AE%A1.jpg?v=20160907170591%8A-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/qjnn/625428.shtml',
            'pubtime' => strtotime('2016/8/9'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖奥运会活动爆料',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/e/ef/%E6%9C%AA%E6%A0%87%E9%A2%98-12.jpg?v=201609071708',
            'url' => 'http://wiki.joyme.com/qjnn/624396.shtml',
            'pubtime' => strtotime('2016/8/5'),
            'category' => '',
        ),
        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖中秋桂花糕获得方式及作用',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/5/5f/%E6%9C%AA%E6%A0%87%E9%A2%98wewq-1.jpg?v=201609131650',
            'url' => 'http://wiki.joyme.com/qjnn/635980.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '公主级双倍 中秋开启',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/e/e4/%E6%9C%AA%E6%A0%87sdfg%E9%A2%98-1.jpg?v=201609131655',
            'url' => 'http://wiki.joyme.com/qjnn/635911.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '中秋佳节 月下舞会降临',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/d/d7/%E6%9C%AA%E6%A0%87%E9%A2%98dfg-1.jpg?v=201609121535',
            'url' => 'http://wiki.joyme.com/qjnn/635498.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '中秋新套装 福利提前享',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/4/4e/%E6%9C%AA%E6%A0%87sd%E9%A2%98-1.jpg?v=201609121537',
            'url' => 'http://wiki.joyme.com/qjnn/635500.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),
        array(
            'indexData' => '奇迹暖暖',
            'title' => '周年庆充值送套装',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/0/02/124.jpg?v=201609141702',
            'url' => 'http://wiki.joyme.com/qjnn/602288.shtml',
            'pubtime' => strtotime('2016/5/12'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '全服分享送【金色阳光】',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/d/d4/Qw3r.jpg?v=201609141704',
            'url' => 'http://wiki.joyme.com/qjnn/602295.shtml',
            'pubtime' => strtotime('2016/5/5'),
            'category' => '',
        ),
        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖周年庆活动大全',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/e/eb/%E6%9C%AA%E6%A0%87%E5%8E%BB%E6%97%A0%E4%BA%BA%E5%8C%BA%E9%A2%98-1.jpg?v=201609181710',
            'url' => 'http://wiki.joyme.com/qjnn/602011.shtml',
            'pubtime' => strtotime('2016/5/19'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '【倒计时3天】周年限时优惠~领略全新风格碰撞',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/e/e3/%E6%9C%AA%E6%A0%87%E5%85%A8%E6%96%87%E9%A2%98-1.jpg?v=201609181713',
            'url' => 'http://wiki.joyme.com/qjnn/601798.shtml',
            'pubtime' => strtotime('2016/5/10'),
            'category' => '',
        ),
        array(
            'indexData' => '奇迹暖暖',
            'title' => '【2.19~2.23】灯火阑珊 元宵夕夜',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/8/87/%E6%9C%AA%E6%A0%87%E9%A2%98serw-1.jpg?v=201609191718',
            'url' => 'http://wiki.joyme.com/qjnn/562339.shtml',
            'pubtime' => strtotime('2016/2/28'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '【预告】新春之际，梦幻大使再度归来啦！',
            'image' => 'http://wiki.joyme.com/qjnn/517084.shtml',
            'url' => 'http://wiki.joyme.com/qjnn/517084.shtml',
            'pubtime' => strtotime('2016/1/27'),
            'category' => '',
        ),
        array(
            'indexData' => '奇迹暖暖',
            'title' => '奇迹暖暖周年庆活动大全',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/0/0d/%E6%9C%AA%E6%A0%87sewww%E9%A2%98-1.jpg?v=201609201654',
            'url' => 'http://wiki.joyme.com/qjnn/602011.shtml',
            'pubtime' => strtotime('2016/5/19'),
            'category' => '',
        ),

        array(
            'indexData' => '奇迹暖暖',
            'title' => '周年庆充值送套装',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/b/b5/%E6%9C%AAaerqw%E9%A2%98-1.jpg?v=201609201656',
            'url' => 'http://wiki.joyme.com/qjnn/602288.shtml',
            'pubtime' => strtotime('2016/5/12'),
            'category' => '',
        ),

    );
}
elseif ($wgWikiname == 'qmcs'){
    $news =   array(
        array(
            'indexData' => '全民超神',
            'title' => '《全民超神》新版宝石页早知道，让你对战快人一步',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/9/98/%E7%BC%A9%E7%95%A51.png?v=201609071725',
            'url' => 'http://wiki.joyme.com/qmcs/629121.shtml',
            'pubtime' => strtotime('2016/8/24'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '《全民超神》新版本系统优化 对战更畅快翻盘更容易',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/3/36/%E7%BC%A9%E7%95%A52.png?v=201609071725',
            'url' => 'http://wiki.joyme.com/qmcs/629160.shtml',
            'pubtime' => strtotime('2016/8/24'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '《全民超神》周年版本打响公会战 莲华奥运皮肤登场',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/0/02/%E7%BC%A9%E7%95%A53.png?v=201609071725',
            'url' => 'http://wiki.joyme.com/qmcs/629161.shtml',
            'pubtime' => strtotime('2016/8/24'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '有史以来最大福利，《全民超神》周年庆活动即将到来',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/3/3a/%E7%BC%A9%E7%95%A54.png?v=201609071725',
            'url' => 'http://wiki.joyme.com/qmcs/629128.shtml',
            'pubtime' => strtotime('2016/8/16'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '《全民超神》周年版本功能前瞻：社交与举报功能优化',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/d/d6/%E7%BC%A9%E7%95%A55.jpg?v=201609071725',
            'url' => 'http://wiki.joyme.com/qmcs/627225.shtml',
            'pubtime' => strtotime('2016/8/16'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => 'MMEC城市赛，不如带着妹子来开黑！',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/1/1a/%E7%BC%A9%E7%95%A56.jpg?v=201609071725',
            'url' => 'http://wiki.joyme.com/qmcs/625762.shtml',
            'pubtime' => strtotime('2016/8/16'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '8月10日先锋体验服更新公告',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/8/87/%E7%BC%A9%E7%95%A57.jpg?v=201609071725',
            'url' => 'http://wiki.joyme.com/qmcs/625427.shtml',
            'pubtime' => strtotime('2016/8/9'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '火力全开迎奥运 这周福利Rio爽',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/d/df/%E7%BC%A9%E7%95%A58.jpg?v=201609071725',
            'url' => 'http://wiki.joyme.com/qmcs/625246.shtml',
            'pubtime' => strtotime('2016/8/8'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '全民超神5.23-5.29周免早知道',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/e/e7/%E7%BC%A9%E7%95%A59.jpg?v=201609071725',
            'url' => 'http://wiki.joyme.com/qmcs/603524.shtml',
            'pubtime' => strtotime('2016/5/20'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '全民超神5.9-5.15周免早知道',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/e/e9/%E7%BC%A9%E7%95%A510.jpg?v=201609071725',
            'url' => 'http://wiki.joyme.com/qmcs/601180.shtml',
            'pubtime' => strtotime('2016/5/6'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '全民超神牛头人之神全新皮肤上线',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/8/86/%E7%BC%A9%E7%95%A511.jpg?v=201609071725',
            'url' => 'http://wiki.joyme.com/qmcs/601182.shtml',
            'pubtime' => strtotime('2016/5/6'),
            'category' => '',
        ),
        array(
            'indexData' => '全民超神',
            'title' => '《全民超神》周年庆活动中奖名单热辣出炉',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/a/a9/%E5%91%A8%E5%B9%B4%E5%BA%86.jpg?v=201609131415',
            'url' => 'http://wiki.joyme.com/qmcs/635960.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '累充送电音玉兔礼盒活动重新上线公告',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/b/be/%E5%85%85%E5%80%BCr.jpg?v=201609131415',
            'url' => 'http://wiki.joyme.com/qmcs/635949.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => 'MMEC总决赛即将上演~本周末带你超神！',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/4/4f/Mmc11.jpg?v=201609121444',
            'url' => 'http://wiki.joyme.com/qmcs/634935.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '开学季好礼放送 公会战限时开启',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/5/55/%E5%BC%80%E5%AD%A611.jpg?v=201609121444',
            'url' => 'http://wiki.joyme.com/qmcs/635592.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),
        array(
            'indexData' => '全民超神',
            'title' => '八月月赛战报，胜者为王制霸全场，GJ势不可挡',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/3/36/%E6%9C%88%E8%B5%9B11.jpg?v=201609141533',
            'url' => 'http://wiki.joyme.com/qmcs/636175.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => 'MMEC终极开黑之战，一触即发！',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/9/92/%E5%BC%80%E9%BB%91.jpg?v=201609141533',
            'url' => 'http://wiki.joyme.com/qmcs/636182.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),
        array(
            'indexData' => '全民超神',
            'title' => '第10批消极比赛惩罚公告',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/c/ca/%E6%83%A9%E7%BD%9A.jpg?v=201609181520',
            'url' => 'http://wiki.joyme.com/qmcs/636765.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '9月8日英雄平衡性调整公告',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/5/59/%E8%B0%83%E6%95%B4.jpg?v=201609181520',
            'url' => 'http://wiki.joyme.com/qmcs/636759.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),
        array(
            'indexData' => '全民超神',
            'title' => '全民超神厄运之森丹妮莉丝新皮肤上线',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/4/47/%E5%8E%84%E8%BF%90.jpg?v=201609191449',
            'url' => 'http://wiki.joyme.com/qmcs/637015.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '5V5超神峡谷模式召唤师技能关闭公告',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/7/75/%E5%85%AC%E5%91%8A.jpg?v=201609191449',
            'url' => 'http://wiki.joyme.com/qmcs/637012.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),
        array(
            'indexData' => '全民超神',
            'title' => '全民超神》八月月赛战报，胜者为王制霸全场',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/7/75/%E6%9C%88%E8%B5%9B23u2.jpg?v=201609201622',
            'url' => 'http://wiki.joyme.com/qmcs/637269.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

        array(
            'indexData' => '全民超神',
            'title' => '《全民超神》关于打击非法外挂的公告',
            'image' => 'http://joymepic.joyme.com/wiki/images/qmcs/a/a7/1474353363_1436653066_15190_imageAddr.jpg?v=201609201622',
            'url' => 'http://wiki.joyme.com/qmcs/637262.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

    );
}
elseif ($wgWikiname == 'qmtj'){
    $news =   array(
        array(
            'indexData' => '全民突击',
            'title' => '全民突击【凛冬福利】你起床的动力都在这里哟',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/c/ca/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E3%80%90%E5%87%9B%E5%86%AC%E7%A6%8F%E5%88%A9%E3%80%91%E4%BD%A0%E8%B5%B7%E5%BA%8A%E7%9A%84%E5%8A%A8%E5%8A%9B%E9%83%BD%E5%9C%A8%E8%BF%99%E9%87%8C%E5%93%9F1.jpg?imageView/1/w/120/h/120/v=201609071528',
            'url' => 'http://wiki.joyme.com/qmtj/518227.shtml',
            'pubtime' => strtotime('2016/1/28'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击【送黄金AK】是时候聊聊年终奖的事儿了',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/1/1e/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E3%80%90%E9%80%81%E9%BB%84%E9%87%91AK%E3%80%91%E6%98%AF%E6%97%B6%E5%80%99%E8%81%8A%E8%81%8A%E5%B9%B4%E7%BB%88%E5%A5%96%E7%9A%84%E4%BA%8B%E5%84%BF%E4%BA%861.jpg?imageView/1/w/120/h/120/v=201609071528',
            'url' => 'http://wiki.joyme.com/qmtj/518343.shtml',
            'pubtime' => strtotime('2016/1/28'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击圣诞专题活动',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/0/07/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E5%9C%A3%E8%AF%9E%E4%B8%93%E9%A2%98%E6%B4%BB%E5%8A%A81.jpg?imageView/1/w/120/h/120/v=201609071528',
            'url' => 'http://wiki.joyme.com/qmtj/437627.shtml',
            'pubtime' => strtotime('2016/11/13'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击一把枪与突击王子的传说',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/7/75/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E6%9E%AA%E6%A2%B0%E6%B6%82%E8%A3%85%E5%A4%A7%E7%8C%9C%E6%83%B34.jpg?imageView/1/w/120/h/120/v=201609071528',
            'url' => 'http://wiki.joyme.com/qmtj/404314.shtml',
            'pubtime' => strtotime('2016/10/19'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击队长看这里！美眉待挑选~',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/8/82/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E9%98%9F%E9%95%BF%E7%9C%8B%E8%BF%99%E9%87%8C%EF%BC%81%E7%BE%8E%E7%9C%89%E5%BE%85%E6%8C%91%E9%80%89-1.jpg?imageView/1/w/120/h/120/v=201609071528',
            'url' => 'http://wiki.joyme.com/qmtj/402321.shtml',
            'pubtime' => strtotime('2016/10/10'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击战甲系统助你战力飙升',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/2/21/%E5%8A%A9%E4%BD%A0%E6%88%98%E5%8A%9B%E9%A3%99%E5%8D%873.jpg?imageView/1/w/120/h/120/v=201609071528',
            'url' => 'http://wiki.joyme.com/qmtj/395805.shtml',
            'pubtime' => strtotime('2016/9/9'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击8月新版孤岛激战PVE',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/9/9d/%E5%AD%A4%E5%B2%9B%E6%BF%80%E6%88%98PVE1.jpg?imageView/1/w/120/h/120/v=201609071528',
            'url' => 'http://wiki.joyme.com/qmtj/384260.shtml',
            'pubtime' => strtotime('2016/8/18'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '狙击枪主题周火爆来袭冰点折扣限时抢购',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/6/67/%E7%8B%99%E5%87%BB%E6%9E%AA%E4%B8%BB%E9%A2%98%E5%91%A82.jpg?imageView/1/w/120/h/120/v=201609071528',
            'url' => 'http://wiki.joyme.com/qmtj/363816.shtml',
            'pubtime' => strtotime('2016/7/10'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '《全民突击》五一活动最前沿',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/0/0c/%E6%8B%BF%E5%88%B0%E6%89%8B%E8%BD%AF.jpg?imageView/1/w/120/h/120/v=201609071528',
            'url' => 'http://wiki.joyme.com/qmtj/345712.shtml',
            'pubtime' => strtotime('2016/4/29'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '紫色刺羚狙击拿到手软',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/e/ed/%E5%88%BA%E7%BE%9A.jpg?imageView/1/w/120/h/120/v=201609071528',
            'url' => 'http://wiki.joyme.com/qmtj/345872.shtml',
            'pubtime' => strtotime('2016/4/20'),
            'category' => '',
        ),
        array(
            'indexData' => '全民突击',
            'title' => '全民突击灰度测试服公告2.7.0',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/4/46/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E7%81%B0%E5%BA%A6%E6%B5%8B%E8%AF%95%E6%9C%8D%E5%85%AC%E5%91%8A2701.jpg?v/1/w/120/h/120/v=201609131740',
            'url' => 'http://wiki.joyme.com/qmtj/635939.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '全民突击',
            'title' => '全民突击实名认证领奖活动',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/0/0b/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E5%AE%9E%E5%90%8D%E8%AE%A4%E8%AF%81%E9%A2%86%E5%A5%96%E6%B4%BB%E5%8A%A8.jpg?imageView/1/w/120/h/120/v=201609121559',
            'url' => 'http://wiki.joyme.com/qmtj/635580.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),
        array(
            'indexData' => '全民突击',
            'title' => 'MMEC大赛第四周全民突击战打响',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/c/c3/MMEC%E5%A4%A7%E8%B5%9B%E7%AC%AC%E5%9B%9B%E5%91%A8%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E6%88%981.jpg?v/1/w/120/h/120/v=201609141358',
            'url' => 'http://wiki.joyme.com/qmtj/636114.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),
        array(
            'indexData' => '全民突击',
            'title' => '全民突击9月18日23:00停机维护',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/6/66/%E9%93%82%E9%87%91AK47%E5%92%8CM4A1%E8%B4%AA%E7%8B%BC%E9%98%B5%E5%9C%B03.jpg?imageView/1/w/120/h/120/v=201609191139',
            'url' => 'http://wiki.joyme.com/qmtj/636926.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),
        array(
            'indexData' => '全民突击',
            'title' => '全民突击将出影视剧',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/0/0e/%E5%85%A8%E6%B0%91%E7%AA%81%E5%87%BB%E7%94%B5%E8%A7%86%E5%89%A71.jpg?v/1/w/120/h/120/v=201609201033',
            'url' => 'http://wiki.joyme.com/qmtj/637153.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

    );
}
elseif ($wgWikiname == 'kof98'){
    $news =   array(
        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '坚不可摧 盘点《拳皇98终极之战OL》免伤效果出众的格斗家',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/a/a8/%E5%9D%9A%E4%B8%8D%E5%8F%AF%E6%91%A7%E7%9B%98%E7%82%B9%E3%80%8A%E6%8B%B3%E7%9A%8798%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98OL%E3%80%8B%E5%85%8D%E4%BC%A4%E6%95%88%E6%9E%9C%E5%87%BA%E4%BC%97%E7%9A%84%E6%A0%BC%E6%96%97%E5%AE%B6-%E5%9B%BE.jpg?v=201609071618',
            'url' => 'http://wiki.joyme.com/kof98/629375.shtml',
            'pubtime' => strtotime('2016/8/25'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '体力狂欢周',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/3/3d/%E4%BD%93%E5%8A%9B%E7%8B%82%E6%AC%A2%E5%91%A8-%E5%9B%BE.jpg?v=201609071618-',
            'url' => 'http://wiki.joyme.com/kof98/621827.shtml',
            'pubtime' => strtotime('2016/7/25'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '不可或缺 盘点《拳皇98终极之战OL》那些强力辅助',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/d/d8/%E4%B8%8D%E5%8F%AF%E6%88%96%E7%BC%BA-%E7%9B%98%E7%82%B9%E3%80%8A%E6%8B%B3%E7%9A%8798%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98OL%E3%80%8B%E9%82%A3%E4%BA%9B%E5%BC%BA%E5%8A%9B%E8%BE%85%E5%8A%A9-%E5%9B%BE.jpg?v=201609071639',
            'url' => 'http://wiki.joyme.com/kof98/620977.shtml',
            'pubtime' => strtotime('2016/7/20'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '趁着周年狂欢庆典 快来领福利吧',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/4/4f/%E8%B6%81%E7%9D%80%E5%91%A8%E5%B9%B4%E7%8B%82%E6%AC%A2%E5%BA%86%E5%85%B8-%E5%BF%AB%E6%9D%A5%E9%A2%86%E7%A6%8F%E5%88%A9%E5%90%A7-%E5%9B%BE.jpg?v=201609071639',
            'url' => 'http://wiki.joyme.com/kof98/619460.shtml',
            'pubtime' => strtotime('2016/7/15'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '迅速上手 《拳皇98终极之战OL》特色玩法难关盘点',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/f/f8/%E8%BF%85%E9%80%9F%E4%B8%8A%E6%89%8B-%E3%80%8A%E6%8B%B3%E7%9A%8798%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98OL%E3%80%8B%E7%89%B9%E8%89%B2%E7%8E%A9%E6%B3%95%E9%9A%BE%E5%85%B3%E7%9B%98%E7%82%B9-%E5%9B%BE.jpg?v=201609071618',
            'url' => 'http://wiki.joyme.com/kof98/366821.shtml',
            'pubtime' => strtotime('2016/7/22'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '最正统的拳皇！尽在《拳皇98终极之战OL》',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/c/c8/%E6%9C%80%E6%AD%A3%E7%BB%9F%E7%9A%84%E6%8B%B3%E7%9A%87%EF%BC%81%E5%B0%BD%E5%9C%A8%E3%80%8A%E6%8B%B3%E7%9A%8798%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98OL%E3%80%8B-%E5%9B%BE.jpg?v=201609071618',
            'url' => 'http://wiki.joyme.com/kof98/382496.shtml',
            'pubtime' => strtotime('2016/8/13'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '拳皇98拳皇争霸赛将至',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/3/30/%E6%8B%B3%E7%9A%8798%E6%8B%B3%E7%9A%87%E4%BA%89%E9%9C%B8%E8%B5%9B%E5%B0%86%E8%87%B3-%E5%9B%BE.jpg?v=201609071618',
            'url' => 'http://wiki.joyme.com/kof98/381244.shtml',
            'pubtime' => strtotime('2016/8/10'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '全新玩法“拳皇争霸”暴走上线',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/7/7d/%E5%85%A8%E6%96%B0%E7%8E%A9%E6%B3%95%E2%80%9C%E6%8B%B3%E7%9A%87%E4%BA%89%E9%9C%B8%E2%80%9D%E6%9A%B4%E8%B5%B0%E4%B8%8A%E7%BA%BF-%E5%9B%BE.jpg?v=201609071618',
            'url' => 'http://wiki.joyme.com/kof98/381222.shtml',
            'pubtime' => strtotime('2016/8/10'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '8月5日全服停服更新公告',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/9/98/8%E6%9C%885%E6%97%A5%E5%85%A8%E6%9C%8D%E5%81%9C%E6%9C%8D%E6%9B%B4%E6%96%B0%E5%85%AC%E5%91%8A-%E5%9B%BE.jpg?v=201609071618',
            'url' => 'http://wiki.joyme.com/kof98/380355.shtml',
            'pubtime' => strtotime('2016/8/5'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '8月12日全服停服更新公告',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/b/b5/8%E6%9C%8812%E6%97%A5%E5%85%A8%E6%9C%8D%E5%81%9C%E6%9C%8D%E6%9B%B4%E6%96%B0%E5%85%AC%E5%91%8A-%E5%9B%BE.jpg?v=201609071618',
            'url' => 'http://wiki.joyme.com/kof98/382256.shtml',
            'pubtime' => strtotime('2016/8/12'),
            'category' => '',
        ),
        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '拳皇98终极之战OL贡献4.77亿',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/c/c6/%E6%8B%B3%E7%9A%8798%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98OL%E8%B4%A1%E7%8C%AE4.77%E4%BA%BF-%E5%9B%BE.jpg?v=201609131832',
            'url' => 'http://wiki.joyme.com/kof98/635984.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => 'TGA巅峰对决再启 拳皇燃点这个赛季',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/2/21/TGA%E5%B7%85%E5%B3%B0%E5%AF%B9%E5%86%B3%E5%86%8D%E5%90%AF-%E6%8B%B3%E7%9A%87%E7%87%83%E7%82%B9%E8%BF%99%E4%B8%AA%E8%B5%9B%E5%AD%A3-%E5%9B%BE.jpg?v=201609131832',
            'url' => 'http://wiki.joyme.com/kof98/636005.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '新玩法预告！属性提升《拳皇98终极之战OL》装备祝福功能介绍',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/b/bd/%E6%96%B0%E7%8E%A9%E6%B3%95%E9%A2%84%E5%91%8A%EF%BC%81%E5%B1%9E%E6%80%A7%E6%8F%90%E5%8D%87%E3%80%8A%E6%8B%B3%E7%9A%8798%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98OL%E3%80%8B%E8%A3%85%E5%A4%87%E7%A5%9D%E7%A6%8F%E5%8A%9F%E8%83%BD%E4%BB%8B%E7%BB%8D-%E5%9B%BE.jpg?v=201609121648',
            'url' => 'http://wiki.joyme.com/kof98/634908.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '9月9日停服更新公告',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/6/66/9%E6%9C%889%E6%97%A5%E5%81%9C%E6%9C%8D%E6%9B%B4%E6%96%B0%E5%85%AC%E5%91%8A-%E5%9B%BE.jpg?v=201609121650',
            'url' => 'http://wiki.joyme.com/kof98/635741.shtml',
            'pubtime' => strtotime('2016/9/9'),
            'category' => '',
        ),
        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '装备无法洗练及用户无法正常游戏公告',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/7/78/%E8%A3%85%E5%A4%87%E6%97%A0%E6%B3%95%E6%B4%97%E7%BB%83%E5%8F%8A%E7%94%A8%E6%88%B7%E6%97%A0%E6%B3%95%E6%AD%A3%E5%B8%B8%E6%B8%B8%E6%88%8F%E5%85%AC%E5%91%8A.jpg?v=201609141651',
            'url' => 'http://wiki.joyme.com/pvp/kof98/636230.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => 'IOS10系统兼容性问题公告',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/b/b4/IOS10%E7%B3%BB%E7%BB%9F%E5%85%BC%E5%AE%B9%E6%80%A7%E9%97%AE%E9%A2%98%E5%85%AC%E5%91%8A.jpg?v=201609141651',
            'url' => 'http://wiki.joyme.com/pvp/kof98/636236.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),
        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '社团大家乐开启 真ZERO吉斯碎片等你领',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/f/fa/%E7%A4%BE%E5%9B%A2%E5%A4%A7%E5%AE%B6%E4%B9%90%E5%BC%80%E5%90%AF-%E7%9C%9FZERO%E5%90%89%E6%96%AF%E7%A2%8E%E7%89%87%E7%AD%89%E4%BD%A0%E9%A2%86.jpg?v=201609181746',
            'url' => 'http://wiki.joyme.com/kof98/636843.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '拳皇98终BOSS碎片免费来源大揭秘',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/0/0e/%E6%8B%B3%E7%9A%8798%E7%BB%88BOSS%E7%A2%8E%E7%89%87%E5%85%8D%E8%B4%B9%E6%9D%A5%E6%BA%90%E5%A4%A7%E6%8F%AD%E7%A7%98.jpg?v=201609181746',
            'url' => 'http://wiki.joyme.com/kof98/636837.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),
        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '《风流拳世》之一句话暴走',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/c/c1/%E3%80%8A%E9%A3%8E%E6%B5%81%E6%8B%B3%E4%B8%96%E3%80%8B%E4%B9%8B%E4%B8%80%E5%8F%A5%E8%AF%9D%E6%9A%B4%E8%B5%B0.jpg?v=201609191729',
            'url' => 'http://wiki.joyme.com/kof98/637057.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '彩蛋还是BUG 你所不知道的坂崎琢磨',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/b/bc/%E5%BD%A9%E8%9B%8B%E8%BF%98%E6%98%AFBUG-%E4%BD%A0%E6%89%80%E4%B8%8D%E7%9F%A5%E9%81%93%E7%9A%84%E5%9D%82%E5%B4%8E%E7%90%A2%E7%A3%A8.jpg?v=201609191729',
            'url' => 'http://wiki.joyme.com/kof98/637068.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),
        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '拳皇98终极之战OL日本游戏畅销榜前20',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/e/ec/%E6%8B%B3%E7%9A%8798%E7%BB%88%E6%9E%81%E4%B9%8B%E6%88%98OL%E6%97%A5%E6%9C%AC%E6%B8%B8%E6%88%8F%E7%95%85%E9%94%80%E6%A6%9C%E5%89%8D20.jpg?v=201609201802',
            'url' => 'http://wiki.joyme.com/kof98/637290.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

        array(
            'indexData' => '拳皇98终极之战ol',
            'title' => '9月21日凌晨0:00-4:00停服更新公告',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/3/31/9%E6%9C%8821%E6%97%A5%E5%87%8C%E6%99%A8%E5%81%9C%E6%9C%8D%E6%9B%B4%E6%96%B0%E5%85%AC%E5%91%8A.jpg?v=201609201802',
            'url' => 'http://wiki.joyme.com/kof98/637291.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

    );
}
elseif ($wgWikiname == 'ttkp'){
    $news =   array(
        array(
            'indexData' => '天天酷跑',
            'title' => '《天天酷跑》降妖秘境开启 牛魔王再度来袭',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/b/bd/%E6%9C%AA%E6%A0%87d%E9%A2%98-1.jpg?v=201609071819',
            'url' => 'http://wiki.joyme.com/ttkp/629167.shtml',
            'pubtime' => strtotime('2016/8/24'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '《天天酷跑》贡献者大神YMAN2015年年度专访',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/4/4d/%E6%9C%AA%E6%A0%87%E9%A2%98dsft-1.jpg?v=201609071822',
            'url' => 'http://wiki.joyme.com/ttkp/600491.shtml',
            'pubtime' => strtotime('2016/5/3'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '《天天酷跑》帽子先生搭配异界之神经典测试',
            'image' => 'http://wiki.joyme.com/ttkp/615953.shtml%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/ttkp/615953.shtml',
            'pubtime' => strtotime('2016/7/5'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '花剑少尉横空出世天天酷跑',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/9/93/%E6%9C%AA%E6%A0%87%E9%A2%98we-1.jpg?v=201609071827',
            'url' => 'http://wiki.joyme.com/ttkp/415547.shtml',
            'pubtime' => strtotime('2015/12/3'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑勇闯酷飞大冒险',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/b/bc/%E6%9C%AA%E6%A0%87sew%E9%A2%98-1.jpg?v=201609071829',
            'url' => 'http://wiki.joyme.com/ttkp/414555.shtml',
            'pubtime' => strtotime('2015/12/1'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '《天天酷跑》大神扳子党丶小根专访！带你走进大神的世界',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/c/c5/%E6%9C%AA%E6%A0%87er%E9%A2%98-1.jpg?v=201609071832',
            'url' => 'http://wiki.joyme.com/ttkp/401478.shtml',
            'pubtime' => strtotime('2015/9/30'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑全国段位赛之奖品兑换',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/5/5f/%E6%9C%AA%E6%A0%87%E9%A2%98saer-1.jpg?v=201609071835%AF%B4%E6%98%8E-%E5%9B%BE.jpg?v=201609052222',
            'url' => 'http://wiki.joyme.com/ttkp/396875.shtml',
            'pubtime' => strtotime('2015/9/14'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '嘉年华入场券大放送',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/1/15/%E6%9C%AA%E6%A0%87sr%E9%A2%98-1.jpg?v=201609071842',
            'url' => 'http://wiki.joyme.com/ttkp/391910.shtml',
            'pubtime' => strtotime('2015/8/28'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑全新砸蛋机限时开启',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/6/63/%E6%9C%AA%E6%A0%87sar%E9%A2%98-1.jpg?v=201609071845',
            'url' => 'http://wiki.joyme.com/ttkp/411443.shtml',
            'pubtime' => strtotime('2015/11/18'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '邀请小伙伴回归送黄金奖券',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/0/03/%E6%9C%AAsdf1.jpg?v=201609071848',
            'url' => 'http://wiki.joyme.com/ttkp/382526.shtml',
            'pubtime' => strtotime('2015/8/13'),
            'category' => '',
        ),
        array(
            'indexData' => '天天酷跑',
            'title' => '酷跑3周年3天倒计时,首创国内4人同屏玩法',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/7/7e/%E6%9C%AA%E6%A0%87asere%E9%A2%98-1.jpg?v=201609121625',
            'url' => 'http://wiki.joyme.com/ttkp/635650.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '俱乐部玩法系统介绍',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/f/f1/%E6%9C%AA%E6%A0%87wser%E9%A2%98-1.jpg?v=201609121638',
            'url' => 'http://wiki.joyme.com/ttkp/635681.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '酷跑3周年 丰富活动大猜想',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/8/80/%E6%9C%AA%E6%A0%87safd%E9%A2%98-1.jpg?v=201609131551',
            'url' => 'http://wiki.joyme.com/ttkp/635999.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '酷跑3周年 3周年主题跑步盛典送福利',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/8/89/%E6%9C%AAsdgb%E6%A0%87%E9%A2%98-1.jpg?v=201609131555',
            'url' => 'http://wiki.joyme.com/ttkp/636001.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),
        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑三周年活动爆料 八大活动嗨翻天',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/6/68/%E6%9C%AArtyw4%E6%A0%87%E9%A2%98-1.jpg?v=201609141325',
            'url' => 'http://wiki.joyme.com/ttkp/636164.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '酷跑三周年 小帅炫装暖心伴你同行',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/b/bf/%E6%9C%AA%E6%A0%87%E9%A2%98weq-1.jpg?v=201609141328',
            'url' => 'http://wiki.joyme.com/ttkp/636159.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),
        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑三周年活动爆料 烟花夺宝怎么玩',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/0/0e/%E6%9C%AA%E6%A0%87%E5%AE%89%E6%B8%A9%E6%B3%89%E9%A2%98-1.jpg?v=201609181700',
            'url' => 'http://wiki.joyme.com/ttkp/636836.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑生日蜡烛获取途径',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/0/01/%E6%9C%AA%E6%A0%87%E6%90%9C%E6%88%BF%E7%BD%91%E9%A2%98-1.jpg?v=201609181701',
            'url' => 'http://wiki.joyme.com/ttkp/636819.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),
        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑充值七彩石 返利享不停',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/2/2c/%E6%9C%AA%E6%A0%87aqwre%E9%A2%98-1.jpg?v=201609191541',
            'url' => 'http://wiki.joyme.com/ttkp/637048.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '三周年盛典强势来袭 超值返利一触即发',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/f/fe/%E6%9C%AAwgd%E9%A2%98-1.jpg?v=201609191542',
            'url' => 'http://wiki.joyme.com/ttkp/637049.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),
        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑3周年新坐骑地心战熊技能属性解析',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/1/1b/%E6%9C%AA%E6%A0%87qwqq%E9%A2%98-1.jpg?v=201609201710',
            'url' => 'http://wiki.joyme.com/ttkp/637232.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

        array(
            'indexData' => '天天酷跑',
            'title' => '天天酷跑小小兔技能属性解析',
            'image' => 'http://joymepic.joyme.com/wiki/images/boli/f/f2/%E6%9C%AAq3qq%E9%A2%98-1.jpg?v=201609201712',
            'url' => 'http://wiki.joyme.com/ttkp/637235.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

    );
}
elseif ($wgWikiname == 'vg'){
    $news =  array(
        array(
            'indexData' => '虚荣',
            'title' => '虚荣金灯莱拉怎么样 战斗法师莱拉玩法攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/c/c2/%E9%87%91%E7%81%AF%E8%8E%B1%E6%8B%89%E6%94%BB%E7%95%A51.jpg?v/1/w/120/h/120/v=201609080004',
            'url' => 'http://wiki.joyme.com/vg/633841.shtml',
            'pubtime' => strtotime('2016/8/30'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '机械战姬阿尔法攻略技巧 野区战士阿尔法玩法',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/9/9d/%E9%87%8E%E5%8C%BA%E6%88%98%E5%A3%AB%E9%98%BF%E5%B0%94%E6%B3%95%E7%8E%A9%E6%B3%951.jpg?v/1/w/120/h/120/v=201609080045',
            'url' => 'http://wiki.joyme.com/vg/633779.shtml',
            'pubtime' => strtotime('2016/9/1'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '古骑士兰斯海希安城打法攻略 辅助英雄出装',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/9/93/%E8%BE%85%E5%8A%A9%E8%8B%B1%E9%9B%84%E5%85%B0%E6%96%AF%E5%87%BA%E8%A3%851.jpg?v/1/w/120/h/120/v=201609080004',
            'url' => 'http://wiki.joyme.com/vg/633778.shtml',
            'pubtime' => strtotime('2016/9/2'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '英雄盲豹格雷怎么出装 野区战士物理出装指南',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/0/0e/%E8%8B%B1%E9%9B%84%E7%9B%B2%E8%B1%B9%E6%A0%BC%E9%9B%B7%E6%80%8E%E4%B9%88%E5%87%BA%E8%A3%851.jpg?v/1/w/120/h/120/v=201609080045',
            'url' => 'http://wiki.joyme.com/vg/633777.shtml',
            'pubtime' => strtotime('2016/8/26'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '鱼人费恩怎么玩 史前巨怪坦克英雄费恩玩法',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/8/87/%E8%99%9A%E8%8D%A3%E9%B1%BC%E4%BA%BA%E8%B4%B9%E6%81%A9%E6%80%8E%E4%B9%88%E7%8E%A91.jpg?v/1/w/120/h/120/v=201609080045',
            'url' => 'http://wiki.joyme.com/vg/633780.shtml',
            'pubtime' => strtotime('2016/8/25'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '虚荣冬季赛野区全新攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/e/ef/%E8%99%9A%E8%8D%A3%E5%86%AC%E5%AD%A3%E8%B5%9B%E9%87%8E%E5%8C%BA%E5%85%A8%E6%96%B0%E6%94%BB%E7%95%A52.jpg?v/1/w/120/h/120/v=201609080045',
            'url' => 'http://wiki.joyme.com/vg/565965.shtml',
            'pubtime' => strtotime('2016/8/1'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '虚荣十大坑比特点',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/6/66/%E8%99%9A%E8%8D%A3%E5%AF%B9%E7%BA%BF%E6%8A%80%E5%B7%A71.jpg?v/1/w/120/h/120/v=201609080045',
            'url' => 'http://wiki.joyme.com/vg/565974.shtml',
            'pubtime' => strtotime('2016/8/31'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '虚荣AP天使奥达基对线攻略',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/f/fa/%E8%99%9A%E8%8D%A3AP%E5%A4%A9%E4%BD%BF%E5%A5%A5%E8%BE%BE%E5%9F%BA%E5%AF%B9%E7%BA%BF%E6%94%BB%E7%95%A5.jpg?v/1/w/120/h/120/v=201609080045',
            'url' => 'http://wiki.joyme.com/vg/565994.shtml',
            'pubtime' => strtotime('2016/9/5'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '虚荣灵猴奥佐进阶教程',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/a/a4/%E8%99%9A%E8%8D%A3%E7%81%B5%E7%8C%B4%E5%A5%A5%E4%BD%90%E8%BF%9B%E9%98%B6%E6%95%99%E7%A8%8B1.jpg?v/1/w/120/h/120/v=201609080045',
            'url' => 'http://wiki.joyme.com/vg/566001.shtml',
            'pubtime' => strtotime('2016/9/1'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '虚荣对线技巧：论一个打线英雄的基本修养',
            'image' => 'http://joymepic.joyme.com/wiki/images/doub/6/66/%E8%99%9A%E8%8D%A3%E5%AF%B9%E7%BA%BF%E6%8A%80%E5%B7%A71.jpg?v/1/w/120/h/120/v=201609080045',
            'url' => 'http://wiki.joyme.com/vg/566011.shtml',
            'pubtime' => strtotime('2016/8/31'),
            'category' => '',
        ),
        array(
            'indexData' => '虚荣',
            'title' => '【虚荣】第二届《虚荣》官方线上公开赛正式启动!',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/0/01/%E7%BC%A9%E7%95%A5%E5%9B%BE777.jpg?v=201609131618',
            'url' => 'http://wiki.joyme.com/vg/635940.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '【虚荣】电竞豪门C9加盟《虚荣》,移动电竞High爆海内外!',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/9/91/%E7%BC%A9%E7%95%A5%E5%9B%BE888.jpg?v=201609131618',
            'url' => 'http://wiki.joyme.com/vg/635948.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '【虚荣】月亮公主星乐斯(特别版皮肤)即将到来!',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/f/f1/%E7%BC%A9%E7%95%A5%E5%9B%BE11.jpg?v=201609121702',
            'url' => 'http://wiki.joyme.com/vg/635533.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '【虚荣】秋季版本新英雄首曝!星际战士高能来袭!',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/a/a9/%E7%BC%A9%E7%95%A5%E5%9B%BE22.jpg?v=201609121702',
            'url' => 'http://wiki.joyme.com/vg/635560.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),
        array(
            'indexData' => '虚荣',
            'title' => '【虚荣】周免英雄轮换(9月14日)',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/f/f8/Q0013.jpg?v=201609141657',
            'url' => 'http://wiki.joyme.com/vg/636143.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '【虚荣】1.22秋季版本更新公告',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/8/8a/Q0014.jpg?v=201609141658',
            'url' => 'http://wiki.joyme.com/vg/636145.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),
        array(
            'indexData' => '虚荣',
            'title' => '【虚荣】1.22版本抢先看,官方直播邀您做客!',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/a/aa/Q0019.jpg?v=201609181725',
            'url' => 'http://wiki.joyme.com/vg/636712.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '【虚荣】欧泊石正式曝光&初回限皮标识',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/1/1d/Q0020.jpg?v=201609181725',
            'url' => 'http://wiki.joyme.com/vg/636717.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),
        array(
            'indexData' => '虚荣',
            'title' => '【虚荣】首届世界冠军赛亮相好莱坞',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/a/aa/Q0025.jpg?v=201609191658',
            'url' => 'http://wiki.joyme.com/vg/636946.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '【虚荣】社区活动社区聚会派对召集令!',
            'image' => 'http://joymepic.joyme.com/wiki/images/mhx/0/04/Q0026.jpg?v=201609191658',
            'url' => 'http://wiki.joyme.com/vg/636948.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),
        array(
            'indexData' => '虚荣',
            'title' => '《虚荣》为电竞而生迎来了新的变革',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/6/6a/Q0031.jpg?v=201609201621',
            'url' => 'http://wiki.joyme.com/vg/637194.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

        array(
            'indexData' => '虚荣',
            'title' => '【虚荣】剑客黑羽英雄背景故事介绍',
            'image' => 'http://joymepic.joyme.com/wiki/images/mxm2/8/87/Q0032.jpg?v=201609201622',
            'url' => 'http://wiki.joyme.com/vg/637199.shtml',
            'pubtime' => strtotime('2016/9/20'),
            'category' => '',
        ),

    );
}
elseif ($wgWikiname == 'zdbjl'){
    $news =  array(
        array(
            'indexData' => '战斗吧剑灵',
            'title' => '3D动作游戏般的战斗画面！战斗吧剑灵试玩评测',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/d/d6/Zdbjl%E6%96%B0%E9%97%BB1.png?imageView/1/w/120/h/120/v=201609080959',
            'url' => 'http://wiki.joyme.com/zdbjl/100027.shtml',
            'pubtime' => strtotime('2016/1/29'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵评测 手游大作年终巨献',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/0/08/Zdbjl%E6%96%B0%E9%97%BB2.png?imageView/1/w/120/h/120/v=201609080959',
            'url' => 'http://wiki.joyme.com/zdbjl/100022.shtml',
            'pubtime' => strtotime('2016/1/29'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '重返战场，名将忽雷参上！',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/2/22/Zdbjl%E6%96%B0%E9%97%BB3.png?imageView/1/w/120/h/120/v=201609080959',
            'url' => 'http://wiki.joyme.com/zdbjl/634578.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '开学第一周，开工有好礼！',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/0/0e/Zdbjl%E6%96%B0%E9%97%BB4.png?imageView/1/w/120/h/120/v=201609080959',
            'url' => 'http://wiki.joyme.com/zdbjl/634577.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),
        array(
            'indexData' => '战斗吧剑灵',
            'title' => '3D动作游戏般的战斗画面！战斗吧剑灵试玩评测',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/d/d6/Zdbjl%E6%96%B0%E9%97%BB1.png?imageView/1/w/120/h/120/v=201609080959',
            'url' => 'http://wiki.joyme.com/zdbjl/100027.shtml',
            'pubtime' => strtotime('2016/1/29'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵评测 手游大作年终巨献',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/0/08/Zdbjl%E6%96%B0%E9%97%BB2.png?imageView/1/w/120/h/120/v=201609080959',
            'url' => 'http://wiki.joyme.com/zdbjl/100022.shtml',
            'pubtime' => strtotime('2016/1/29'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '重返战场，名将忽雷参上！',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/2/22/Zdbjl%E6%96%B0%E9%97%BB3.png?imageView/1/w/120/h/120/v=201609080959',
            'url' => 'http://wiki.joyme.com/zdbjl/634578.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '开学第一周，开工有好礼！',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/0/0e/Zdbjl%E6%96%B0%E9%97%BB4.png?imageView/1/w/120/h/120/v=201609080959',
            'url' => 'http://wiki.joyme.com/zdbjl/634577.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵情缘系统即将上线 情缘开启获得战力提升',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/4/4b/Zdbs1.png?imageView/1/w/120/h/120/v=201609121859',
            'url' => 'http://wiki.joyme.com/zdbjl/635779.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵提高战斗力最新途径 新版本新奇的设定',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/9/94/Zdbs2.png?imageView/1/w/120/h/120/v=201609121859',
            'url' => 'http://wiki.joyme.com/zdbjl/635780.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '中秋将至，小助手时装兑换开启！',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/b/b7/91303.png?imageView/1/w/120/h/120/v=201609131734',
            'url' => 'http://wiki.joyme.com/zdbjl/636020.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '金秋送福！灵芝福利第四期来啦！',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/c/cd/91304.png?imageView/1/w/120/h/120/v=201609131734',
            'url' => 'http://wiki.joyme.com/zdbjl/636026.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),
        array(
            'indexData' => '战斗吧剑灵',
            'title' => '3D动作游戏般的战斗画面！战斗吧剑灵试玩评测',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/d/d6/Zdbjl%E6%96%B0%E9%97%BB1.png?imageView/1/w/120/h/120/v=201609080959',
            'url' => 'http://wiki.joyme.com/zdbjl/100027.shtml',
            'pubtime' => strtotime('2016/1/29'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵评测 手游大作年终巨献',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/0/08/Zdbjl%E6%96%B0%E9%97%BB2.png?imageView/1/w/120/h/120/v=201609080959',
            'url' => 'http://wiki.joyme.com/zdbjl/100022.shtml',
            'pubtime' => strtotime('2016/1/29'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '重返战场，名将忽雷参上！',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/2/22/Zdbjl%E6%96%B0%E9%97%BB3.png?imageView/1/w/120/h/120/v=201609080959',
            'url' => 'http://wiki.joyme.com/zdbjl/634578.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '开学第一周，开工有好礼！',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/0/0e/Zdbjl%E6%96%B0%E9%97%BB4.png?imageView/1/w/120/h/120/v=201609080959',
            'url' => 'http://wiki.joyme.com/zdbjl/634577.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵情缘系统即将上线 情缘开启获得战力提升',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/4/4b/Zdbs1.png?imageView/1/w/120/h/120/v=201609121859',
            'url' => 'http://wiki.joyme.com/zdbjl/635779.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵提高战斗力最新途径 新版本新奇的设定',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/9/94/Zdbs2.png?imageView/1/w/120/h/120/v=201609121859',
            'url' => 'http://wiki.joyme.com/zdbjl/635780.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '中秋将至，小助手时装兑换开启！',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/b/b7/91303.png?imageView/1/w/120/h/120/v=201609131734',
            'url' => 'http://wiki.joyme.com/zdbjl/636020.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '金秋送福！灵芝福利第四期来啦！',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/c/cd/91304.png?imageView/1/w/120/h/120/v=201609131734',
            'url' => 'http://wiki.joyme.com/zdbjl/636026.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '中秋来赏月！SS飞月降临！',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/b/ba/S91401.png?imageView/1/w/120/h/120/v=201609141728',
            'url' => 'http://wiki.joyme.com/zdbjl/636257.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '超强格挡剑士！SS飞月介绍',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/5/51/S91402.png?imageView/1/w/120/h/120/v=201609141728',
            'url' => 'http://wiki.joyme.com/zdbjl/636262.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),
        array(
            'indexData' => '战斗吧剑灵',
            'title' => '3D动作游戏般的战斗画面！战斗吧剑灵试玩评测',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/d/d6/Zdbjl%E6%96%B0%E9%97%BB1.png?imageView/1/w/120/h/120/v=201609080959',
            'url' => 'http://wiki.joyme.com/zdbjl/100027.shtml',
            'pubtime' => strtotime('2016/1/29'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵评测 手游大作年终巨献',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/0/08/Zdbjl%E6%96%B0%E9%97%BB2.png?imageView/1/w/120/h/120/v=201609080959',
            'url' => 'http://wiki.joyme.com/zdbjl/100022.shtml',
            'pubtime' => strtotime('2016/1/29'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '重返战场，名将忽雷参上！',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/2/22/Zdbjl%E6%96%B0%E9%97%BB3.png?imageView/1/w/120/h/120/v=201609080959',
            'url' => 'http://wiki.joyme.com/zdbjl/634578.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '开学第一周，开工有好礼！',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/0/0e/Zdbjl%E6%96%B0%E9%97%BB4.png?imageView/1/w/120/h/120/v=201609080959',
            'url' => 'http://wiki.joyme.com/zdbjl/634577.shtml',
            'pubtime' => strtotime('2016/9/4'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵情缘系统即将上线 情缘开启获得战力提升',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/4/4b/Zdbs1.png?imageView/1/w/120/h/120/v=201609121859',
            'url' => 'http://wiki.joyme.com/zdbjl/635779.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '战斗吧剑灵提高战斗力最新途径 新版本新奇的设定',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/9/94/Zdbs2.png?imageView/1/w/120/h/120/v=201609121859',
            'url' => 'http://wiki.joyme.com/zdbjl/635780.shtml',
            'pubtime' => strtotime('2016/9/12'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '中秋将至，小助手时装兑换开启！',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/b/b7/91303.png?imageView/1/w/120/h/120/v=201609131734',
            'url' => 'http://wiki.joyme.com/zdbjl/636020.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '金秋送福！灵芝福利第四期来啦！',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/c/cd/91304.png?imageView/1/w/120/h/120/v=201609131734',
            'url' => 'http://wiki.joyme.com/zdbjl/636026.shtml',
            'pubtime' => strtotime('2016/9/13'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '中秋来赏月！SS飞月降临！',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/b/ba/S91401.png?imageView/1/w/120/h/120/v=201609141728',
            'url' => 'http://wiki.joyme.com/zdbjl/636257.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '超强格挡剑士！SS飞月介绍',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/5/51/S91402.png?imageView/1/w/120/h/120/v=201609141728',
            'url' => 'http://wiki.joyme.com/zdbjl/636262.shtml',
            'pubtime' => strtotime('2016/9/14'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '神斗士 金刚罗汉--稀有寻宝每周主打卡牌更新',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/5/5c/9182.png?imageView/1/w/120/h/120/v=201609181808',
            'url' => 'http://wiki.joyme.com/zdbjl/636859.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),

        array(
            'indexData' => '战斗吧剑灵',
            'title' => '有情有义，唤醒洪荒之力--情缘系统即将开启',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/5/56/9181.png?imageView/1/w/120/h/120/v=201609181808',
            'url' => 'http://wiki.joyme.com/zdbjl/636850.shtml',
            'pubtime' => strtotime('2016/9/18'),
            'category' => '',
        ),
        array(
            'indexData' => '战斗吧剑灵',
            'title' => '欢乐继续！集戒指换好礼！',
            'image' => 'http://joymepic.joyme.com/wiki/images/moondwellers/f/f5/Suo01.png?imageView/1/w/120/h/120/v=201609191742',
            'url' => 'http://wiki.joyme.com/zdbjl/637069.shtml',
            'pubtime' => strtotime('2016/9/19'),
            'category' => '',
        ),

    );
}

if($news){
    foreach ($news as $new){
        echo json_encode($new);
        echo "\n";
    }
}