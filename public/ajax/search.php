<?php
if ( !function_exists( 'version_compare' ) || version_compare( phpversion(), '5.3.2' ) < 0 ) {
	// We need to use dirname( __FILE__ ) here cause __DIR__ is PHP5.3+
	require dirname( __FILE__ ) . '/includes/PHPVersionError.php';
	wfPHPVersionError( 'index.php' );
}

require __DIR__ . '/includes/WebStart.php';

echo 'please wait';

//http://wiki.enjoyf.com/index.php?title=Joyme_searchservice_structure#.E6.9F.A5.E8.AF.A2.E6.8E.A5.E5.8F.A3

//solr 数据内网 http://172.16.75.30:38000/solr/#/wikipages/query
$searchSrv = new searchService('web001.dev',38080);
//wiki页面搜索
//数据结构
/*
  <field name="id"     md5(wiki_title)
  <field name="wiki"   wiki名字   
  <field name="title"     页面page
  <field name="searchtext" 文本内容
  <field name="tags"      搜索标签
  <field name="pageid"  pageid
*/

$q = '(wiki:wikidev)(tags:男)';  //搜 tag 中包含男的
$q = '(wiki:wikidev)(tags:男)(seachtext:圣者)';
$q = '(wiki:wikidev)(searchtext:圣者)';
$ret = $searchSrv->query($q);
var_dump($ret);