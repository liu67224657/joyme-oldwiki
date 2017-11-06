<?php
/**
 * Description:资料模块
 * Author: gradydong
 * Date: 2016/9/6
 * Time: 11:12
 * Copyright: Joyme.com
 */
$wgWikiname = substr($_SERVER['HTTP_HOST'], 0, strpos($_SERVER['HTTP_HOST'], '.'));

header('Content-type:text/json; charset=utf-8');

$datas = array();

if($wgWikiname == 'pvp'){

    $datas = array(
        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀马可波罗',
            'image' => 'http://joymepic.joyme.com/wiki/images/pvp/6/65/%E9%A9%AC%E5%8F%AF%E6%B3%A2%E7%BD%97.png?v=201609060052',
            'url' => 'http://wiki.joyme.com/pvp/631771.shtml',
            'pubtime' => strtotime("2016/8/25"),
            'category' => '',
            'childCategory' => '',
        ),
        array(
            'indexData' => '王者荣耀',
            'title' => '王者荣耀雅典娜',
            'image' => 'http://joymepic.joyme.com/wiki/images/pvp/d/d4/%E9%9B%85%E5%85%B8%E5%A8%9C.png?imageView/1/w/120/h/120/v=201609060052',
            'url' => 'http://wiki.joyme.com/pvp/623448.shtml',
            'pubtime' => strtotime("2016/8/2"),
            'category' => '',
            'childCategory' => '',
        ),
    );

}


if($datas){
    foreach ($datas as $data){
        echo json_encode($data);
        echo "\n";
    }
}