<?php

/**
 * Description of del
 * 
 * 
 * @author clarkzhao zhangpeng
 * @date 2014-10-24 12:03:23
 * @update 2014.10.27
 * @copyright joyme.com
 */
//wiki=wikidev&title=Testpage

$wiki = empty($_GET['wiki'])?'':$_GET['wiki'];
$title = empty($_GET['title'])?'':$_GET['title'];

if(empty($wiki) || empty($title)){
	echo 'no wiki or no title';exit;
}

$wiki = substr($wiki,0,-4);

$title = ucfirst($title);

//判断是否是字母和数字或字母数字的组合
if(!ctype_alnum($wiki)){
	echo '只能是字母或数字的组合';exit;
}

$key = str_replace( '.', '%2E', urlencode( $title ) );



//$path = '../cache/'.$wiki."/";
$path = dirname(__FILE__) . '/../cache/'.$wiki."/";
$list = @scandir($path);

if($list){
	foreach($list as $k=>$v){
		if(is_dir($path.$v) && $v !='.' && $v!='..'){
			$filepath = '../cache/'.$wiki."/".$v."/".hashSubdirectory($title).$key.'.html';
			if(file_exists($filepath)){
				if(unlink($filepath)){
					echo 'del '.$v.' ok';
				}else{
					echo 'del '.$v.' false';
				}
			}else{
				echo 'no such '.$v.' cache file, ';
			}
		}
	}
}else{
	echo 'no this wiki cache';
}


function hashSubdirectory($title) {
	$wgFileCacheDepth = 2;

	$subdir = '';
	if ( $wgFileCacheDepth > 0 ) {
		$hash = md5( $title );
		for ( $i = 1; $i <= $wgFileCacheDepth; $i++ ) {
			$subdir .= substr( $hash, 0, $i ) . '/';
		}
	}

	return $subdir;
}
