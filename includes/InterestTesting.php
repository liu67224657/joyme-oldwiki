<?php
/**
 * Created by PhpStorm.
 * User: xinshi
 * Date: 2015/6/15
 * Time: 16:31
 */

class InterestTesting{

    function setTestingValue($vals,$len){

        global $wgRedis_host,$wgRedis_port,$com;

        $wikiid = wfWikiID();
        $Prefix = $wikiid."|".$com."|". __CLASS__ ."| ".$vals;

        $redis = new Redis();
        $redis->connect($wgRedis_host, $wgRedis_port);
        if(!$redis){
            return false;
        }
        if(!$redis->exists($Prefix) || ($redis->exists($Prefix) && $redis->get($Prefix)=='')){
            $num = mt_rand(0,$len);
            if($num>=0){
                $redis->set($Prefix,$num);
                $redis->expire($Prefix,$this->expiresTestingTime());
                $result = $num;
            }else{
                $result = false;
            }
        }else{
            $result = $redis->get($Prefix);
        }
        return $result;
    }

    //计算有效期
    function expiresTestingTime(){
        //获取零点的时间戳
        $time = mktime(00,00,00,date("m"),date("d")+1,date("Y"))-time();
        return $time;
    }
}

