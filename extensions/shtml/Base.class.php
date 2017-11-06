<?php
/**
 * 基础数据类
 *
*/
class Base{
	
	public static $header = '';
	public static $wikinav = '';
	public static $comment = false;
	public static $shtmlhideid = array();
	const SHTMLMD5 = '5617cb756c6a9eeebf6a672115dca230';
	
	public function __construct(){}
	
	public function doparam($param){
		if($param == ''){
			return array();
		}
		$arr = array_filter(explode(' ', $param));
		$parr = array();
		foreach($arr as $val){
			if(strpos($val, '=') !== false){
				$tmp = explode('=', $val);
				$parr[$tmp[0]] = $tmp[1];
			}
		}
		return $parr;
	}
	
	public function doUrlParam($param){
		if(strpos($param, '?') !== false){
			$r = explode('?', $param);
			$param = $r[1];
		}else if($param == ''){
			return array();
		}
		$arr = array_filter(explode('&', $param));
		$parr = array();
		foreach($arr as $val){
			if(strpos($val, '=') !== false){
				$tmp = explode('=', $val);
				$parr[$tmp[0]] = $tmp[1];
			}
		}
		return $parr;
	}
}