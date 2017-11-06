<?php

/**
 * Description of wfPageEdit
 * 
 * 
 * @author clarkzhao  
 * @date 2015-07-23 16:03:23
 * @update 2015.07.23
 * @copyright joyme.com
 * 监听redis 获取 wiki 编辑数据， 更新缓存和刷新搜索 需要在后台长期运行
 */

//Fatal run-time errors. Errors that can not be recovered from. Execution of the script is halted
error_reporting(1);
$env = $argv[1];
if (!in_array($env, array('alpha', 'beta', 'com'))) {
	die("env error");
}

ini_set('default_socket_timeout', -1);

$_SERVER['HTTP_HOST'] = 'op.joyme.' . $env;
$_SERVER['REQUEST_TIME_FLOAT'] = time();


//wiki=wikidev&title=Testpage
require_once dirname( __FILE__ ) . '/includes/PHPVersionCheck.php';
wfEntryPointCheck( 'index.php' );

require_once dirname( __FILE__ ) . '/includes/WebStart.php';


global $wgUGCWikis, $wgRedis_host, $wgRedis_port;

use Joyme\net\RedisHelper;
use Joyme\net\solr\Apache_Solr_Service;
use Joyme\net\solr\Apache_Solr_Document;
use Joyme\net\Simple_html_dom;
use Joyme\core\Log;

Log::config(Log::ERROR);

$redisHelper = new RedisHelper($wgRedis_host, $wgRedis_port);


Log::setfile('/opt/servicelogs/phplog/wfPageEdit.log');
Log::error($wgRedis_host.":".$wgRedis_port." server start \n");


while (true) {
    $textval = $redisHelper->blPop('wikiedits', 0, false);
    if(empty($textval)){
        Log::error("timeout  continue\n");
        continue;
    }
    $fields = explode('|', $textval);
    updateSolr4WikiPages($fields[1], $fields[2], $fields[3], $fields[4]);
}

function updateSolr4WikiPages($wikiname, $namespace, $pagetitle, $pageid) {
    global $wgDBservers, $wgSolrConfig, $wgWikiWebIps, $wgRedis_host, $wgRedis_port;

    $config = $wgDBservers[0];
    $config['port'] = 3306;
    $conn = @mysql_connect($config['host'] . ":" . $config['port'], $config['user'], $config['password']);
    if (!$conn) {
        Log::error('连接建立错误: ' . mysql_error() . "\n");
        return;
    }
    list($dbname, $com) = explode('.', $wikiname);
    $config['dbName'] = $dbname;
    $config['dbname'] = $dbname;
    mysql_select_db($dbname, $conn);
    $pages = array();
    $pages = queryWikiPages( $conn, $wikiname, $namespace, $pagetitle, $pageid, $pages);
    mysql_close($conn);

    $configSolr = $wgSolrConfig;
    $solr = new Apache_Solr_Service($configSolr['host'], $configSolr['port'], $configSolr['path']);
    if (!$solr->ping()) {
        Log::error("solr service not responding\n");
    }
    //wikidevwiki:pcache:idhash:29-0!*!*!*!*!*!*
    $redis = new Redis();

    global $wgObjectCaches,$wgUGCWikis;
    
    
    if(empty($wgObjectCaches['redis'])){
    	Log::error("wiki wgObjectCaches is null\n");
    	return;
    }
    
    $wikiredis = explode(':',$wgObjectCaches['redis']['servers'][0]);
    
    $rs = $redis->connect($wikiredis[0],intval($wikiredis[1]));
    
    if($rs == false){
    	Log::error("wiki redis connect false\n");
    	return;
    }
    
    foreach ($pages as $key => $val) {
        clearWikiFileCache($wgWikiWebIps, $wikiname, $key);
        //删除页面缓存
        $rediskey = $config['dbName'] . ':pcache:idhash:' . $val;
        
        $redis->del($rediskey);
        //获取页面 新生产缓存
        $host = substr($dbname, 0, -4);
        if (in_array($host, $wgUGCWikis)) {
            file_get_contents('http://' . $host . ".joyme." . $com . "/$host/" . $key);
        } else {
            file_get_contents('http://' . $host . ".joyme." . $com . "/wiki/" . $key);
        }
        $sdoc = doWikiPageSearch($redis, $wikiname, $config['dbName'], $key, $val);
        $solr->addDocument($sdoc);
        try {
            //提交
            $solr->commit();
        } catch (Exception $e) {
            Log::error($e->getMessage() . "\n");
        }
    }
}

function unserialize_wiki($data) {
    // Ignore digit strings and ints so INCR/DECR work
    return ( is_int($data) || ctype_digit($data) ) ? $data : unserialize($data);
}

function doWikiPageSearch($redis, $wikstring, $dbname, $pagetitle, $pageid) {
    $doc = new Apache_Solr_Document();
    list($wikiname, $com) = explode('.', $wikstring);
    $doc->id = md5($wikiname . '_' . $pagetitle);
    $doc->wiki = $wikiname;
    $doc->title = $pagetitle;
    $searchtext = $pagetitle;
    $doc->tags = '';
    $doc->pageid = $pageid;
    $rediskey = $dbname . ':pcache:idhash:' . $pageid;

    if ($redis) {
        $pagecache = $redis->get($rediskey);
        $pagecacheObj = unserialize_wiki($pagecache);
        if ("object" == gettype($pagecacheObj))
            $text = "" . $pagecacheObj->mText;
        else
            $text = "";
        $pattern = '|!--(.*)--|is';
        $hit = preg_match_all($pattern, $text, $matches, PREG_PATTERN_ORDER);
        if ($hit) {
            foreach ($matches[1] as $match) {
                $text = str_replace('<!--' . $match . '-->', '', $text);
            }
        }
        $html = new simple_html_dom();
        $html->load($text);
        $searchtext.= ' ' . $html->plaintext;
        $div_search = $html->find("#search-engine", 0);
        if ($div_search) {
            $doc->tags.= $div_search->getAttribute('data-search-tag');
            $searchtext.=' ' . $div_search->getAttribute('data-search-text');
        }
    }

    $doc->searchtext = $searchtext;
    return $doc;
}

function queryWikiPages( $conn, $wikiname, $namespace, $pagetitle, $pageid, $pages) {
    Log::error(__FUNCTION__ . " $pageid $pagetitle \n");
    //模板
    if ($namespace == 10) {
    	$pagetitle = str_replace(' ', '_', $pagetitle);
        $querySQL = "SELECT page_namespace,page_title,page_id  FROM `templatelinks`,`page`   WHERE tl_namespace = '10' AND tl_title = '" . $pagetitle . "' AND (page_id=tl_from)  ORDER BY tl_from";

        $result = mysql_query($querySQL, $conn);
        if ($result != false) {//查询成功
            if (mysql_num_rows($result) == 0) {
                Log::error("empty mysql_query \n");
            }
            while ($row = mysql_fetch_array($result)) {
                if ($row['page_namespace'] == 10) {
                    if ($pagetitle == $row['page_title'])
                        continue;
                    //$pages = queryWikiPages( $conn, $wikiname, $row['page_namespace'], $row['page_title'], $row['page_id'], $pages);
                }
                //page
                if ($row['page_namespace'] == 0) {
                    $pages[$row['page_title']] = $row['page_id'];
                }
            }
            mysql_free_result($result);
        } else {
            Log::error("mysql_query " . mysql_error() . "\n");
        }
    }
    //page
    if ($namespace == 0) {
        $pages[$pagetitle] = $pageid;
    }
    return $pages;
}

function clearWikiFileCache($webips, $wikiname, $pagetitle) {
    list($wiki, $com) = explode('.', $wikiname);
    if ($com == 'com')
        $com = 'prod';
    foreach ($webips as $webip) {
        $url = "http://{$webip}/{$com}/public/del.php?wiki=" . $wiki . "&title=" . $pagetitle;
        $ret = file_get_contents($url);
        Log::error("clearWikiFileCache " . $url . " " . $ret . "\n");
    }
}

class ParserOutput {

    var $mText, # The output text
            $mLanguageLinks, # List of the full text of language links, in the order they appear
            $mCategories, # Map of category names to sort keys
            $mTitleText, # title text of the chosen language variant
            $mLinks = array(), # 2-D map of NS/DBK to ID for the links in the document. ID=zero for broken.
            $mTemplates = array(), # 2-D map of NS/DBK to ID for the template references. ID=zero for broken.
            $mTemplateIds = array(), # 2-D map of NS/DBK to rev ID for the template references. ID=zero for broken.
            $mImages = array(), # DB keys of the images used, in the array key only
            $mFileSearchOptions = array(), # DB keys of the images used mapped to sha1 and MW timestamp
            $mExternalLinks = array(), # External link URLs, in the key only
            $mInterwikiLinks = array(), # 2-D map of prefix/DBK (in keys only) for the inline interwiki links in the document.
            $mNewSection = false, # Show a new section link?
            $mHideNewSection = false, # Hide the new section link?
            $mNoGallery = false, # No gallery on category page? (__NOGALLERY__)
            $mHeadItems = array(), # Items to put in the <head> section
            $mModules = array(), # Modules to be loaded by the resource loader
            $mModuleScripts = array(), # Modules of which only the JS will be loaded by the resource loader
            $mModuleStyles = array(), # Modules of which only the CSSS will be loaded by the resource loader
            $mModuleMessages = array(), # Modules of which only the messages will be loaded by the resource loader
            $mJsConfigVars = array(), # JavaScript config variable for mw.config combined with this page
            $mOutputHooks = array(), # Hook tags as per $wgParserOutputHooks
            $mWarnings = array(), # Warning text to be returned to the user. Wikitext formatted, in the key only
            $mSections = array(), # Table of contents
            $mEditSectionTokens = false, # prefix/suffix markers if edit sections were output as tokens
            $mProperties = array(), # Name/value pairs to be cached in the DB
            $mTOCHTML = '', # HTML of the TOC
            $mTimestamp, # Timestamp of the revision
            $mTOCEnabled = true;          # Whether TOC should be shown, can't override __NOTOC__
    private $mIndexPolicy = '';       # 'index' or 'noindex'?  Any other value will result in no change.
    private $mAccessedOptions = array(); # List of ParserOptions (stored in the keys)
    private $mSecondaryDataUpdates = array(); # List of DataUpdate, used to save info from the page somewhere else.
    private $mExtensionData = array(); # extra data used by extensions
    private $mLimitReportData = array(); # Parser limit report data
    private $mParseStartTime = array(); # Timestamps for getTimeSinceStart()
    private $mPreventClickjacking = false; # Whether to emit X-Frame-Options: DENY

}
