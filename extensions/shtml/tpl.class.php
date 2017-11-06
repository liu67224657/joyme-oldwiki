<?php
/**
 * 模板处理类
 *
*/

class Tpl extends Base{
	
	public $tplhtml = '';
	public $wikitags = array();
	private $tpldom = '';
	
	public function __construct(){
		$this->getTplData();
		$this->loopTagReplace();
		$this->getTag();
		$this->tagReplace();
		$this->cssAndJs();
	}
	
	private function getTplData(){
		$JoymeTemplateDb = new Joyme\db\JoymeTemplate();
		$data = $JoymeTemplateDb->getTpl();
		if($data == null) exit('没有模板');
		$this->tplhtml = $data['template_context'];
	}
	
	private function getTag(){
		preg_match_all('/{joyme:([\w]+)}/', $this->tplhtml, $tags);
		$this->wikitags = $tags;
	}
	
	private function tagReplace(){
		global $tags;
		$item = new Joyme\db\JoymeItem();
		$tag = new tag();
		foreach($this->wikitags[1] as $key => $val){
			if(in_array($val, $tags)){
				$fnname = $this->tagFnName($val);
				$str = $tag->$fnname();
			}else{
				$str = $item->getCode(str_replace('wiki_', '', $val));
			}
			if($str !== null){
				$this->tplhtml = str_replace($this->wikitags[0][$key], $str, $this->tplhtml);
			}
		}
	}
	
	public function loopTagReplace(){
		global $looptags;
		$tag = new tag();
		foreach($looptags as $val){
			$fnname = $this->tagFnName($val);
			preg_match_all("/{joyme:$val([\s\w\=]*)}(.+){\/joyme:$val}/s", $this->tplhtml, $tags);
			if(!empty($tags[2])){
				$param = trim($tags[1][0]);
				$str = $tag->$fnname($tags[2][0], $param);
				$this->tplhtml = str_replace($tags[0][0], $str, $this->tplhtml);
			}
			
		}
	}
	
	private function tagFnName($tag){
		$fnname = '';
		if(strpos($tag, '-') !== false){
			$tmparr = explode('-', $tag);
		}else{
			$tmparr = explode('_', $tag);
		}
		$pre = array_shift($tmparr);
		foreach($tmparr as $val){
			$fnname .= ucwords($val);
		}
		return $pre.$fnname;
	}
	
	// 处理css, js, 特殊数据
	private function cssAndJs(){
		global $jquery, $wikikey;
		$html = new Joyme\net\Simple_html_dom();
		$html->load(str_replace('<br />', self::SHTMLMD5, nl2br($this->tplhtml)));
		$this->tpldom = $this->replaceHref($html);
		$this->addCommentJs();
		$this->addWikiHead();
		$this->shtmlHideModule();
		// 处理nav
		$e1 = $this->tpldom->find('h2[class=fn-left]', 0);
		$e1 != null ? $e1->innertext = $this->doNavUrl() : '';
		$this->tplhtml = str_replace(self::SHTMLMD5,"\n",$this->tpldom);
	}
	
	private function shtmlHideModule(){
		if(empty(static::$shtmlhideid)){
			return;
		}
		foreach(static::$shtmlhideid as $val){
			$obj = $this->tpldom->find('#'.$val, 0);
			if($obj){
				$obj->outertext = '';
			}
		}
	}
	
	private function doNavUrl(){
		$html = new Joyme\net\Simple_html_dom();
		$html->load(str_replace('<br />', self::SHTMLMD5, nl2br(static::$wikinav)));
		$html = $this->replaceHref($html);
		return str_replace(self::SHTMLMD5,"\n",$html);
	}
	
	private function addCommentJs(){
		global $wgStaticUrl;
		$iscommentjsexists = false;
		// 添加jquery
		foreach($this->tpldom -> find('script') as $e){
			if(strpos($e->src, 'comment') !== false){
				$iscommentjsexists = true;
			}
		}
		$obj = $this->tpldom -> find('body', 0);
		if(!$iscommentjsexists && static::$comment){
			$obj->innertext = $obj->innertext.'<script src="'.$wgStaticUrl.'/js/comment.js"></script>';
		}
	}
	
	private function addWikiHead(){
		global $wgStaticUrl;
		// 公共js方法
		$shtmlcommonwikijs = '<script src="'.$wgStaticUrl.'/js/shtmlcommonwiki.js"></script>';
		$obj = $this->tpldom -> find('head', 0);
		$obj->innertext = static::$header.$shtmlcommonwikijs.$obj->innertext;
	}
	
	// replace url
	private function replaceHref($html){
		global $domain, $homedomain, $wikikey, $channel, $wikitype;
		$tag = new tag();
		foreach($html->find('a[href^="/wiki"]') as $atag){
			$title = urldecode(str_replace('/wiki/', '', $atag->href));
			$pageId = $tag->WikiPage->getPageId($title);
			$atag->href = $homedomain.'/'.$wikikey.'/'.$channel.'/'.$wikitype.'/'.$pageId.'.shtml';
		}
		foreach($html->find('a[href^=http]') as $atag){
			$atag->href = str_replace('&#58;', ':', $atag->href);
			if(strpos($atag->href, $domain.'/wiki/') !== false){
				$title = urldecode(str_replace($domain.'/wiki/', '', $atag->href));
				$pageId = $tag->WikiPage->getPageId($title);
				$atag->href = $homedomain.'/'.$wikikey.'/'.$channel.'/'.$wikitype.'/'.$pageId.'.shtml';
			}
		}
		foreach($html->find('a[href^="/index.php"]') as $atag){
			$res = $this->doUrlParam($atag->href);
			if(empty($res['title'])) continue;
			$title = urldecode($res['title']);
			$page = !empty($res['page']) && $res['page']>0 ? '_'.$res['page'] : '';
			$order = !empty($res['order']) ? '_'.$res['order'] : '';
			$page = !empty($order) && empty($page) ? '_1' : $page;
			
			$pageId = $tag->WikiPage->getPageId($title);
			$atag->href = $homedomain.'/'.$wikikey.'/'.$channel.'/'.$wikitype.'/'.$pageId.$page.$order.'.shtml';
		}
		return $html;
	}
}