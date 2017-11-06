<?php
/**
 * 数据库操作类
 *
*/
namespace Joyme\db;
use Joyme\db\JoymeModel;

// joyme_template 操作类
class JoymeTemplate extends JoymeModel{
	public function __construct() {
		global $dbconfig;
		$this->db_config = $dbconfig;
		$this->tableName = 'joyme_template';
		parent::__construct();
	}
	
	public function getTpl(){
		global $isindex, $wikikey, $channel, $wikitype;
		$where = array(
			'channel' => array('eq', $channel),
			'wiki' => array('eq', $wikikey),
			'is_index' => array('eq', $isindex),
			'context_path' => array('eq', $wikitype),
			);
		$tpldata = $this->selectRow('*', $where);
		return $tpldata;
	}
}

// joyme_item 操作类
class JoymeItem extends JoymeModel{
	public function __construct() {
		global $dbconfig;
		$this->db_config = $dbconfig;
		$this->tableName = 'joyme_item';
		parent::__construct();
	}
	
	public function getCode($itemkey){
		global $isindex, $wikikey, $channel, $wikitype;
		$where = array(
			'channel' => array('eq', $channel),
			'wiki' => array('eq', $wikikey),
			'is_index' => array('eq', $isindex),
			'context_path' => array('eq', $wikitype),
			'item_key'=>array('eq', $itemkey)
			);
		$data = $this->selectRow('item_context', $where);
		if($data == null){
			$where['wiki'] = 'default';
			$data = $this->selectRow('item_context', $where);
		}
		return $data['item_context'];
	}
}

// wiki_page 操作类
class WikiPage extends JoymeModel{
	public function __construct() {
		global $dbconfig;
		$this->db_config = $dbconfig;
		$this->tableName = 'wiki_page';
		parent::__construct();
	}
	
	public function getPageId($wikiurl){
		global $wikikey;
		$where = array(
			'wiki_key' => array('eq', $wikikey),
			'wiki_url' => array('eq', $wikiurl)
			);
		$data = $this->selectRow('page_id', $where);
		if($data == null){
			$pageid = $this->insertPage($wikiurl);
		}
		return $data != null ? $data['page_id'] : $pageid;
	}
	
	public function insertPage($wikiurl){
		global $wikikey;
		$data = array(
			'wiki_key' => $wikikey,
			'wiki_url' => $wikiurl
		);
		$res = $this->insert($data);
		return $res;
	}
	
	public function getWikiUrl(){
		global $id;
		$where = array(
			'page_id' => $id
		);
		$res = $this->selectRow('wiki_url', $where);
		return $res;
	}
	
	public function getIdsByTitle($titles){
		global $wikikey;
		$where = array('wiki_key'=>array('eq', $wikikey),'wiki_url'=>array('in',$titles));
		$res = $this->select('page_id, wiki_url', $where);
		return $res;
	}
}

/****************** wiki db ******************/
// wiki_page 操作类
class OrigWikiPage extends JoymeModel{
	const PAGENS = 0;
	public function __construct() {
		global $wikidbconfig;
		$this->db_config = $wikidbconfig;
		$this->tableName = 'page';
		parent::__construct();
	}
	
	public function getRecentUpdate(){
		$order = 'page_latest desc';
		$data = $this->getTitlesByOrder($order);
		return $data;
	}
	
	public function getVisitorTop(){
		$order = 'page_counter desc';
		$data = $this->getTitlesByOrder($order);
		return $data;
	}
	
	private function getTitlesByOrder($order){
		$where = array(
			'page_namespace' => array('eq', self::PAGENS)
		);
		$data = $this->select('page_id, page_title, page_latest', $where, $order, 50);
		$OrigRevision = new OrigRevision();
		$rdata = $OrigRevision->getRevision($data);
		foreach($data as $key => $val){
			$data[$key]['time'] = $rdata[$val['page_id']]['rev_timestamp'];
		}
		return $data;
	}
}
// wiki_page 操作类
class OrigRevision extends JoymeModel{
	const PAGENS = 0;
	public function __construct() {
		global $wikidbconfig;
		$this->db_config = $wikidbconfig;
		$this->tableName = 'revision';
		parent::__construct();
	}
	
	public function getRevision($data){
		$this->table = 'revision';
		$rids = '';
		$tmp = array();
		foreach($data as $v){
			$tmp[] = $v['page_latest'];
		}
		$rids = implode(',', $tmp);
		$where = array(
			'rev_id' => array('in', $rids)
		);
		$res = $this->select('rev_page, rev_timestamp, rev_id', $where, '', 50);
		$data = array();
		foreach($res as $val){
			$data[$val['rev_page']] = $val;
		}
		return $data;
	}
}

