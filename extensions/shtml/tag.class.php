<?php
/**
 * 特殊标签处理
 *
*/
class Tag extends Base{
	
	public $WikiPage = '';
	
	public function __construct(){
		$this->WikiPage = new Joyme\db\WikiPage();
		$this->OrigWikiPage = new Joyme\db\OrigWikiPage();
	}
	
	public function getWikiTitle(){
		global $id, $page;
		if($id == 'index'){
			$title = '首页';
		}else{
			$res = $this->WikiPage->getWikiUrl();
			if($res){
				$title = $res['wiki_url'];
			}else{
				@header("http/1.1 404 not found"); 
				@header("status: 404 not found"); 
				echo '404'; 
				exit();
			}
		}
		return $title;
	}
	
	public function wikiBody(){
		global $page, $order;
		$http = new Joyme\net\HttpClient($_SERVER['HTTP_HOST']);
		$html = new Joyme\net\Simple_html_dom();
		if($page && $order){
			$path = '/index.php?title='.$this->getWikiTitle().'&page='.$page.'&order='.$order;
		}else if($page){
			$path = '/index.php?title='.$this->getWikiTitle().'&page='.$page;
		}else{
			$path = '/wiki/'.$this->getWikiTitle();
		}
		$ret =$http->get($path);
		$body = '';
		if($ret){
			$content =$http->getContent($path);
			$html->load(str_replace('<br />', self::SHTMLMD5, nl2br($content)));
			$this->removeHide($html);
			$this->getShtmlHideId($html);
			// $this->replaceHref($html);
			$e2 = $html->find('head', 0);
			static::$header = $e2->innertext;
			$e3 = $html->find('div[id=joyme_crumbs]', 0);
			$titleobj = $html->find('title', 0);
			$headobj = $html->find('#firstHeading', 0);
			$title = '';
			if($headobj){
				$title = $headobj->innertext;
			}else if($titleobj){
				$title = substr($titleobj->innertext, 0, strpos($titleobj->innertext, '_'));
			}
			static::$wikinav = $e3 != null ? $e3->innertext : $title;
			$e3 != null ? $e3->outertext = '' : '';
			$e1 = $html->find('body', 0);
			$body = $e1->innertext;
		}
		return str_replace(self::SHTMLMD5,"\n",$body);
	}
	
	public function wikiComment(){
		static::$comment = true;
		$data = $this->getCommentData();
		$str = file_get_contents('extensions/shtml/html/pccomment.html');
		preg_match_all('/{joyme:([\w\-\/]+)}/', $str, $tags);
		foreach($tags[1] as $key=>$val){
			$tmp = explode('-', $val);
			$value = str_replace('/', '', $tmp[1]);
			$str = str_replace($tags[0][$key], $data[$value], $str);
		}
		return $str;
	}
	
	public function wikiWikiWapComment(){
		return $this->getCommentHtml();
	}
	
	public function wxWikiWapComment(){
		return $this->getCommentHtml();
	}
	
	public function wikiUpdateTime(){
		return '<div style="display:none" id="wikiupdatetime">'.(time()*1000).'</div>';
	}
	
	public function wikiRecentUpdate(){
		global $wgShieldWords;
		$res = $this->OrigWikiPage->getRecentUpdate();
		$num = 8;// 8条记录
		$arr = $this->dowgShieldWords($res, $wgShieldWords, $num);
		$data = $this->WikiPage->getIdsByTitle(implode(',', $arr['titles']));
		return $this->newHotHtml($data);
	}
	
	public function wikiVisitorTop(){
		global $wgShieldWords;
		$res = $this->OrigWikiPage->getVisitorTop();
		$num = 10;// 10条记录
		$arr = $this->dowgShieldWords($res, $wgShieldWords, $num);
		$data = $this->WikiPage->getIdsByTitle(implode(',', $arr['titles']));
		return $this->newHotHtml($data);
	}
	
	public function newsLoop($tagstr, $param){
		global $wgNewHotCacheDirectory;
		if(!is_dir($wgNewHotCacheDirectory)){
			mkdir($wgNewHotCacheDirectory);
		}
		$file = $wgNewHotCacheDirectory.'/newsLoopHtml.cache';
		if(file_exists($file) && filemtime($file)+3600 > time()){
			return file_get_contents($file);
		}
		$res = $this->OrigWikiPage->getRecentUpdate();
		$html = $this->getLoopHtml($tagstr, $res, $param);
		file_put_contents($file, $html);
		return $html;
	}
	
	public function hotLoop($tagstr, $param){
		global $wgNewHotCacheDirectory;
		if(!is_dir($wgNewHotCacheDirectory)){
			mkdir($wgNewHotCacheDirectory);
		}
		$file = $wgNewHotCacheDirectory.'/hotLoopHtml.cache';
		if(file_exists($file) && filemtime($file)+3600 > time()){
			return file_get_contents($file);
		}
		$res = $this->OrigWikiPage->getVisitorTop();
		$html = $this->getLoopHtml($tagstr, $res, $param);
		file_put_contents($file, $html);
		return $html;
	}
	
	// 过滤屏蔽词
	private function dowgShieldWords($titles, $shield, $num){
		$arr = array();
		foreach($titles as $val){
			$title = $val['page_title'];
			$flag = false;
			foreach($shield as $v){
				# || preg_match('/^\d+$/i', $title) || preg_match('/^\w+$/i', $title) || mb_strlen($title, 'utf-8') < 3
				if(strpos($title, $v) !== false){
					$flag = true;
				}
			}
			if(!$flag){
				$arr['titles'][] = $title;
				$arr['data'][] = $val;
			}
			if(!empty($arr['titles']) && count($arr['titles'])>=$num) break;
		}
		return $arr;
	}
	
	// 拼接热门，最新标签html
	private function newHotHtml($data){
		$str = '<ul>';
		foreach($data as $val){
			$str .= '<li><a href="'.$val['page_id'].'.shtml">'.$val['wiki_url'].'</a></li>';
		}
		$str .= '</ul>';
		return $str;
	}
	
	// replace url
	private function replaceHref($html){
		global $domain, $channel, $wikitype;
		foreach($html->find('a[href^="/wiki/"]') as $atag){
			$title = urldecode(str_replace('/wiki/', '', $atag->href));
			$pageId = $this->WikiPage->getPageId($title);
			$atag->href = $domain.'/'.$channel.'/'.$wikitype.'/'.$pageId.'.shtml';
		}
		foreach($html->find('a[href^='.$domain.'/wiki/]') as $atag){
			$title = urldecode(str_replace($domain.'/wiki/', '', $atag->href));
			$pageId = $this->WikiPage->getPageId($title);
			$atag->href = $domain.'/'.$channel.'/'.$wikitype.'/'.$pageId.'.shtml';
		}
		foreach($html->find('a[href^="/index.php"]') as $atag){
			$res = $this->doUrlParam($atag->href);
			if(!isset($res['title'])) continue;
			$title = urldecode($res['title']);
			$page = isset($res['page']) && $res['page']>1 ? '_'.$res['page'] : '';
			$pageId = $this->WikiPage->getPageId($title);
			$atag->href = $domain.'/'.$channel.'/'.$wikitype.'/'.$pageId.$page.'.shtml';
		}
		return $html;
	}
	
	// remove wiki_hide or mwiki_hide
	private function removeHide($html){
		global $wikitype;
		foreach($html->find('.'.$wikitype.'_hide') as $e){
			$e->outertext = '';
		}
		return $html;
	}
	
	private function getCommentData(){
		global $wikikey, $id;
		$data = array();
		$data['unikey'] = $wikikey.'|'.$id.'.shtml';
		$data['domain'] = 1;
		$data['uri'] = $_SERVER['REQUEST_URI'];
		$data['title'] = $this->getWikiTitle();
		return $data;
	}
	
	private function getCommentHtml(){
		global $domain;
		$data = $this->getCommentData();
		return '<a id="wap-comment-link-v2" href="'.$domain.'comment/reply/mobilepage?unikey='.$data['unikey'].'&domain='.$data['domain'].'"><span>我要评论</span><b>评论</b></a>';
	}
	
	private function getShtmlHideId($html){
		$obj = $html->find('#shtmlhide', 0);
		if($obj){
			$ids = str_replace('，', '', $obj->innertext);
			$idarr = explode(',', $ids);
			static::$shtmlhideid = $idarr;
		}
	}
	
	private function getLoopHtml($tagstr, $res, $param){
		global $wgShieldWords;
		$parr = $this->doparam($param);
		$str = '';
		$data = $arr = array();
		$num = isset($parr['num']) ? $parr['num'] : 10;
		// 过滤屏蔽词
		$res = $this->dowgShieldWords($res, $wgShieldWords, $num);
		$arr = $this->WikiPage->getIdsByTitle(implode(',', $res['titles']));
		foreach($res['data'] as $key=>$val){
			$tmp = array();
			foreach($arr as $v){
				$val['page_id'] = $v['page_id'];
				if($val['page_title'] == $v['wiki_url'])$tmp = $val;
			}
			if(!empty($tmp)){
				$data[] = $tmp;
			}else{
				$pageId = $this->WikiPage->getPageId($val['page_title']);
				$val['page_id'] = $pageId;
				$data[] = $val;
			}
		}
		preg_match_all("/{joyme:([a-z\-]+)\/}/", $tagstr, $subtags);
		foreach($data as $k=>$v){
			$str .= $tagstr;
			foreach($subtags[1] as $key => $val){
				$subtag = substr($val, strrpos($val, '-')+1);
				switch($subtag){
					case 'i' : 
						$rp = $k+1;
						break;
					case 'url' : 
						$rp = $v['page_id'].'.shtml';
						break;
					case 'text':
						$rp = $v['page_title'];
						break;
					case 'date':
						#substr($v['time'], 0, 4).'-'.
						$rp = substr($v['time'], 4, 2).'-'.substr($v['time'], 6, 2);
						break;
					case 'words':
						$argv = array('title'=>$v['page_title']);
						$argv['limit'] = isset($parr['wnum']) ? $parr['wnum'] : 5;
						$argv['nolink'] = isset($parr['nolink']) ? $parr['nolink'] : true;
						$rp = $this->showCategory($argv);
						break;
					default:
						$rp = '';
				}
				$str = str_replace($subtags[0][$key], $rp, $str);
			}
		}
		return $str;
	}
	
	private function showCategory($argv){
		global $wgServer;
		if(empty($argv['title'])){
			return 'no title';
		}
		
		$title = $argv['title'];
		$limit = empty($argv['limit'])?5:intval($argv['limit']);
		$nolink = isset($argv['nolink'])?true:false;
		
		$dbr = wfGetDB( DB_MASTER );
		
		$res = $dbr->select(
			'page',
			array('page_id'),
			array('page_title' => $title,'page_namespace'=>'0'),
			__METHOD__
		);
		$row = $dbr->fetchRow( $res );

		if(empty($row)){
			return 'no this page';
		}
		$q = $dbr->select(
				'categorylinks',
				array('cl_to'),
				array('cl_from' => $row['page_id']),
				__METHOD__
		);
		
		$catelist = array();
		while ( $row = $q->fetchRow() ) {
			$catelist[] = $row;
		}
		$html = '';
		$nocatelist = array('new','hot');
		if(!empty($catelist)){
			$catelist = array_slice($catelist, 0, 3);
			foreach ($catelist as $v){
				$title = $v['cl_to'];
				if(!in_array($title,$nocatelist)){
					if($nolink){
						$artickelink = $title;
					}else{
						$artickelink = '<a href="'.$wgServer.'/'.$title.'">'.$title.'</a>';
					}
					$html .= '<cite>'.$artickelink.'</cite>';
				}
			}
		}
		return $html;
	}
}