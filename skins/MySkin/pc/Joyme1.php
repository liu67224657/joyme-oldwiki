<?php
/**
 * Cologne Blue: A nicer-looking alternative to Standard.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @todo document
 * @file
 * @ingroup Skins
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( -1 );
}

/**
 * @todo document
 * @ingroup Skins
 */
class SkinJoyme1 extends SkinTemplate {
	var $skinname = 'joyme1', $stylename = 'joyme1',
		$template = 'Joyme1Template';
	var $useHeadElement = true;

	/**
	 * @param $out OutputPage
	 */
	function setupSkinUserCss( OutputPage $out ) {
		parent::setupSkinUserCss( $out );
		$out->addModuleStyles( 'mediawiki.skinning.interface' );
		$out->addModuleStyles( 'skins.joyme1.styles' );
	}

	/**
	 * Override langlink formatting behavior not to uppercase the language names.
	 * See otherLanguages() in Joyme1Template.
	 */
	function formatLanguageName( $name ) {
		return $name;
	}
}

class Joyme1Template extends BaseTemplate {
	function execute() {
		/*global $wgDefaultDevice;
		if($wgDefaultDevice !='pc'){
			$hide = 'mwiki_hide';
		}else{
			$hide = 'wiki_hide';
		}
		//var_dump($this->data['bodytext']);exit;
		$html = str_get_html($this->data['bodytext']);
		//var_dump($html->outertext);exit;
		$divs = $html->find('div[class='.$hide.']');
		
		$this->data['bodytext'] = $html->outertext;
		
		foreach($divs as $v){
			//$this->data['bodytext'] = str_replace($v->outertext, '',$this->data['bodytext']);
		}
		
		$html->clear();*/
		
		//var_dump($this->data['bodytext']);exit;
		// var_dump($_SERVER);exit;
		// Suppress warnings to prevent notices about missing indexes in $this->data
		wfSuppressWarnings();
		$this->html( 'headelement' );
		echo $this->beforeContent();
		$this->html( 'bodytext' );
		echo "\n";
		echo $this->afterContent();
		$this->html( 'dataAfterContent' );
		$this->printTrail();
		echo "<script src='/skins/MySkin/pc/joyme1/js/joymeTools.js'></script>";
		echo "\n</body></html>";
		wfRestoreWarnings();
	}

	/**
	 * Language/charset variant links for classic-style skins
	 * @return string
	 */
	function variantLinks() {
		$s = array();

		$variants = $this->data['content_navigation']['variants'];

		foreach ( $variants as $key => $link ) {
			$s[] = $this->makeListItem( $key, $link, array( 'tag' => 'span' ) );
		}

		return $this->getSkin()->getLanguage()->pipeList( $s );
	}

	function otherLanguages() {
		global $wgHideInterlanguageLinks;
		if ( $wgHideInterlanguageLinks ) {
			return "";
		}

		$html = '';

		// We override SkinTemplate->formatLanguageName() in SkinJoyme1
		// not to capitalize the language names.
		$language_urls = $this->data['language_urls'];
		if ( !empty( $language_urls ) ) {
			$s = array();
			foreach ( $language_urls as $key => $data ) {
				$s[] = $this->makeListItem( $key, $data, array( 'tag' => 'span' ) );
			}

			$html = wfMessage( 'otherlanguages' )->text()
				. wfMessage( 'colon-separator' )->text()
				. $this->getSkin()->getLanguage()->pipeList( $s );
		}

		$html .= $this->renderAfterPortlet( 'lang' );

		return $html;
	}

	/**
	 * @param string $name
	 */
	protected function renderAfterPortlet( $name ) {
		$content = '';
		wfRunHooks( 'BaseTemplateAfterPortlet', array( $this, $name, &$content ) );

		$html = $content !== '' ? "<div class='after-portlet after-portlet-$name'>$content</div>" : '';

		return $html;
	}

	function pageTitleLinks() {
		$s = array();
		$footlinks = $this->getFooterLinks();

		foreach ( $footlinks['places'] as $item ) {
			$s[] = $this->data[$item];
		}

		return $this->getSkin()->getLanguage()->pipeList( $s );
	}

	/**
	 * Used in bottomLinks() to eliminate repetitive code.
	 *
	 * @param $key string Key to be passed to makeListItem()
	 * @param $navlink array Navlink suitable for processNavlinkForDocument()
	 * @param $message string Key of the message to use in place of standard text
	 *
	 * @return string
	 */
	function processBottomLink( $key, $navlink, $message = null ) {
		if ( !$navlink ) {
			// Empty navlinks might be passed.
			return null;
		}

		if ( $message ) {
			$navlink['text'] = wfMessage( $message )->escaped();
		}

		return $this->makeListItem( $key, $this->processNavlinkForDocument( $navlink ), array( 'tag' => 'span' ) );
	}

	function bottomLinks() {
		$toolbox = $this->getToolbox();
		$content_nav = $this->data['content_navigation'];

		$lines = array();

		if ( $this->getSkin()->getOutput()->isArticleRelated() ) {
			// First row. Regular actions.
			$element = array();

			$editLinkMessage = $this->getSkin()->getTitle()->exists() ? 'editthispage' : 'create-this-page';
			$element[] = $this->processBottomLink( 'edit', $content_nav['views']['edit'], $editLinkMessage );
			$element[] = $this->processBottomLink( 'viewsource', $content_nav['views']['viewsource'], 'viewsource' );

			$element[] = $this->processBottomLink( 'watch', $content_nav['actions']['watch'], 'watchthispage' );
			$element[] = $this->processBottomLink( 'unwatch', $content_nav['actions']['unwatch'], 'unwatchthispage' );

			$element[] = $this->talkLink();

			$element[] = $this->processBottomLink( 'history', $content_nav['views']['history'], 'history' );
			$element[] = $this->processBottomLink( 'info', $toolbox['info'] );
			$element[] = $this->processBottomLink( 'whatlinkshere', $toolbox['whatlinkshere'] );
			$element[] = $this->processBottomLink( 'recentchangeslinked', $toolbox['recentchangeslinked'] );

			$element[] = $this->processBottomLink( 'contributions', $toolbox['contributions'] );
			$element[] = $this->processBottomLink( 'emailuser', $toolbox['emailuser'] );

			$lines[] = $this->getSkin()->getLanguage()->pipeList( array_filter( $element ) );

			// Second row. Privileged actions.
			$element = array();

			$element[] = $this->processBottomLink( 'delete', $content_nav['actions']['delete'], 'deletethispage' );
			$element[] = $this->processBottomLink( 'undelete', $content_nav['actions']['undelete'], 'undeletethispage' );

			$element[] = $this->processBottomLink( 'protect', $content_nav['actions']['protect'], 'protectthispage' );
			$element[] = $this->processBottomLink( 'unprotect', $content_nav['actions']['unprotect'], 'unprotectthispage' );

			$element[] = $this->processBottomLink( 'move', $content_nav['actions']['move'], 'movethispage' );

			$lines[] = $this->getSkin()->getLanguage()->pipeList( array_filter( $element ) );

			// Third row. Language links.
			$lines[] = $this->otherLanguages();
		}

		return implode( array_filter( $lines ), "<br />\n" ) . "<br />\n";
	}

	function talkLink() {
		$title = $this->getSkin()->getTitle();

		if ( $title->getNamespace() == NS_SPECIAL ) {
			// No discussion links for special pages
			return "";
		}

		$companionTitle = $title->isTalkPage() ? $title->getSubjectPage() : $title->getTalkPage();
		$companionNamespace = $companionTitle->getNamespace();

		// TODO these messages are only be used by Joyme1,
		// kill and replace with something more sensibly named?
		$nsToMessage = array(
			NS_MAIN => 'articlepage',
			NS_USER => 'userpage',
			NS_PROJECT => 'projectpage',
			NS_FILE => 'imagepage',
			NS_MEDIAWIKI => 'mediawikipage',
			NS_TEMPLATE => 'templatepage',
			NS_HELP => 'viewhelppage',
			NS_CATEGORY => 'categorypage',
			NS_FILE => 'imagepage',
		);

		// Find out the message to use for link text. Use either the array above or,
		// for non-talk pages, a generic "discuss this" message.
		// Default is the same as for main namespace.
		if ( isset( $nsToMessage[$companionNamespace] ) ) {
			$message = $nsToMessage[$companionNamespace];
		} else {
			$message = $companionTitle->isTalkPage() ? 'talkpage' : 'articlepage';
		}

		// Obviously this can't be reasonable and just return the key for talk namespace, only for content ones.
		// Thus we have to mangle it in exactly the same way SkinTemplate does. (bug 40805)
		$key = $companionTitle->getNamespaceKey( '' );
		if ( $companionTitle->isTalkPage() ) {
			$key = ( $key == 'main' ? 'talk' : $key . "_talk" );
		}

		// Use the regular navigational link, but replace its text. Everything else stays unmodified.
		$namespacesLinks = $this->data['content_navigation']['namespaces'];
		return $this->processBottomLink( $message, $namespacesLinks[$key], $message );
	}

	/**
	 * Takes a navigational link generated by SkinTemplate in whichever way
	 * and mangles attributes unsuitable for repeated use. In particular, this modifies the ids
	 * and removes the accesskeys. This is necessary to be able to use the same navlink twice,
	 * e.g. in sidebar and in footer.
	 *
	 * @param $navlink array Navigational link generated by SkinTemplate
	 * @param $idPrefix mixed Prefix to add to id of this navlink. If false, id is removed entirely. Default is 'cb-'.
	 */
	function processNavlinkForDocument( $navlink, $idPrefix = 'cb-' ) {
		if ( $navlink['id'] ) {
			$navlink['single-id'] = $navlink['id']; // to allow for tooltip generation
			$navlink['tooltiponly'] = true; // but no accesskeys

			// mangle or remove the id
			if ( $idPrefix === false ) {
				unset( $navlink['id'] );
			} else {
				$navlink['id'] = $idPrefix . $navlink['id'];
			}
		}

		return $navlink;
	}

	/**
	 * @return string
	 */
	function beforeContent() {
		global $wgIsLogin, $wgJoymeUserInfo,$wgPhpServer,$wgWikiStatic;
		ob_start();
?>
<input type="hidden" id="joymelogin" value="<?php echo $wgIsLogin ? 'true' : 'false';?>">
<input type="hidden" id="joymeuserinfo" value='<?php echo $wgJoymeUserInfo ? json_encode($wgJoymeUserInfo) : '';?>'>
<link href="<?php echo $wgWikiStatic;?>/skins/MySkin/pc/joyme1/joymecomment.css" rel="stylesheet" />
<?php include('common.php');?>
<?php include('advertisement.php');?>
<div id="wrapper" class="fn-ovf">
  <div id='main' class="fn-ma fn-clear wauto">
  		<!--header-->
		<div id="header" class="wiki-header">
			<div id="mw-navigation">
				<!--<h2><?php echo wfMessage( 'navigation-heading' )->escaped() ?></h2>==取消显示标题-->
				<div id='logo' class="wiki-logo"><a href="/<?php global $wgWikiname; echo $wgWikiname; ?>/">返回首页</a></div>
				<?php $quickBar = $this->quickBar();echo $quickBar[0]; ?>
			</div>
		</div>
		<!--header==end-->
		<!--content-->
		<div id="content" class="wiki-content">
			<div id="article" class="mw-body" role="main">
				<?php if ( $this->getSkin()->getSiteNotice() ) { ?>
				<div id="siteNotice"><?php echo $this->getSkin()->getSiteNotice() ?></div>
				<?php } ?>
				<h1 id="firstHeading" class="fn-clear" lang="<?php
						$this->data['pageLanguage'] = $this->getSkin()->getTitle()->getPageViewLanguage()->getHtmlCode();
						$this->text( 'pageLanguage' );
					?>">
					<em class="" dir="auto">
						<?php global $wgSiteGameTitle;
							if(!empty($wgSiteGameTitle) && urlencode($this->data['thispage']) == '%E9%A6%96%E9%A1%B5'  ){
								echo $wgSiteGameTitle;
							}else{
								echo $this->data['title'];
							}
						 ?>
					</em>
					<?php if(!empty($this->data['content_navigation']['views'])){
						echo $quickBar[1];
					}?>
					
					<?php 
					global $wgComment;
					if(!strstr($_SERVER['REQUEST_URI'], '%E9%A6%96%E9%A1%B5') && !strstr($_SERVER['REQUEST_URI'], ':') && !strstr($_SERVER['REQUEST_URI'], 'action') && !strstr($_SERVER['REQUEST_URI'], '%E7%89%B9%E6%AE%8A') && $wgComment){
						echo '<div id="head-comments"><span><a id="totalcomments" href="#post_reply">评论(0)</a></span></div>';
					}?>
				</h1>
				<!--<?php if ( $this->translator->translate( 'tagline' ) ) { ?>
				<p class="tagline"><?php echo htmlspecialchars( $this->translator->translate( 'tagline' ) ) ?></p>
				<?php } ?>==显示调用的模板名称-->
				<?php if ( $this->getSkin()->getOutput()->getSubtitle() ) { ?>
				<p class="subtitle"><?php echo $this->getSkin()->getOutput()->getSubtitle() ?></p>
				<?php } ?>
				<?php if ( $this->getSkin()->subPageSubtitle() ) { ?>
				<p class="subpages"><?php echo $this->getSkin()->subPageSubtitle() ?></p>
				<?php } ?>
				<!--<input type="text" name="title" value="THREAD:测试1" />-->

	<?php
			$s = ob_get_contents();
			ob_end_clean();

			return $s;
		}

		/**
		 * @return string
		 */
		function afterContent() {
			ob_start();
	?>
			</div>
			
		</div>
		<!--center==end-->
		
		<!--footer-info-->
		<?php if ( $this->data['catlinks'] ) { ?>
					<?php $this->html( 'catlinks' ); ?>
					<?php } ?>
		<div id="footer-info" class="fn-center" role="contentinfo">
			<?php
			// Standard footer info
			$footlinks = $this->getFooterLinks();
			if ($footlinks['info'] && !strstr($_SERVER['REQUEST_URI'], '%E9%A6%96%E9%A1%B5')) {
				foreach ( $footlinks['info'] as $item ) {
					echo $this->data[$item] . ' ';
				}
			}
			?>
		</div>
		<?php 
			global $wgComment, $wgTalkNamespace,$wgPhpServer;

			if(!strstr($_SERVER['REQUEST_URI'], '%E9%A6%96%E9%A1%B5') && !strstr($_SERVER['REQUEST_URI'], ':') && !strstr($_SERVER['REQUEST_URI'], 'action') && $wgComment){
				echo '<div class="wiki_comment_box"><div class="blog_comment" id="post_reply">
					<div style="padding:0 0 8px" class="clearfix">
						<span class="fl">评论</span>
						<span id="reply_num" class="fr"></span></div>

					<form method="post" action="">
						<div class="talk_wrapper clearfix">
							<textarea name="body" id="textarea_body" class="talk_text" style="font-family:Tahoma, \'宋体\';" warp="off"></textarea>
						</div>
						<div class="related clearfix">
							<div class="transmit_pic clearfix">

								<a href="javascript:void(0);" id="comment_submit" class="submitbtn fr"><span>评 论</span></a>
								<span id="reply_error" style="color: #f00; padding-top: 2px; float: right;margin-top: 6px;margin-right: 4px;"></span>
							</div>
						</div>
					</form>
				</div>
				<a id="ap_comment" name="ap_comment"></a>
				<!--hot start-->
				<div id="hot_title">热门评论</div>
				<div id="comment_hot_list_area"></div>
				<!--hot end-->
				<div class="comment_all">所有评论</div>
				<div id="comment_list_area"> </div></div>
				<!-- pc-评论js-START -->
			<script src="'.$wgWikiStatic.'/skins/MySkin/pc/joyme1/js/comment.js"></script>
			<!-- pc-评论js-END -->';
			}
		?>
		<!--footer-info==end-->
		<!--hot-tag-->
		<div class="hot-tag fn-clear">
			<h6>热门WIKI</h6>
			<div class="hot-wikiList">
				<a href="http://wiki.joyme.com/dq10/%E9%A6%96%E9%A1%B5">
					<span>
						<img src="http://static.joyme.com/pc/ugcwiki/images/wiki-img-5_2.jpg" alt="" title="" />
						<b><font>勇者斗恶龙10</font><i>日本国民RPG的正统续作网游 </i></b>
					</span>
				</a>
				<a href="http://wiki.joyme.com/mxw/%E9%A6%96%E9%A1%B5">
					<span>
						<img src="http://static.joyme.com/pc/ugcwiki/images/wiki-img-1.jpg" alt="" title="" />
						<b><font>冒险与挖矿</font><i>全球首款地心探险“沙盒”游戏</i></b>
					</span>
				</a>
				<a href="http://wiki.joyme.com/pocketmon/%E9%A6%96%E9%A1%B5">
					<span>
						<img src="http://static.joyme.com/pc/ugcwiki/images/wiki-img-2.jpg" alt="" title="" />
						<b><font>口袋妖怪复刻</font><i>最高原度的《口袋妖怪》手游</i></b>
					</span>
				</a>
				<a href="http://wiki.joyme.com/cq/%E9%A6%96%E9%A1%B5">
					<span>
						<img src="http://static.joyme.com/pc/ugcwiki/images/wiki-img-3.jpg" alt="" title="" />
						<b><font>克鲁赛德战记</font><i>首创即时战斗消除系统游戏</i></b>
					</span>
				</a>
				<a href="http://wiki.joyme.com/hzsg/%E9%A6%96%E9%A1%B5">
					<span>
						<img src="http://static.joyme.com/pc/ugcwiki/images/wiki-img-4_1.jpg" alt="" title="" />
						<b><font>合战三国</font><i>也许是最讲究的战争策略游戏</i></b>
					</span>
				</a>
			</div>
		</div>
		<!--hot-tag==end-->
	    <!--con-banner-->
	  	<div class="con-banner">
	  		<a href="http://wiki.joyme.com/344604.shtml"><img src="http://static.joyme.com/pc/ugcwiki/images/cj-banner.jpg" alt="申请创建wiki" title="申请创建wiki" /></a>
	  	</div>
	  	<!--con-banner==end-->
	</div>
	<!--footer-->
	<div id="footer">
			<div class="footerbar"> 
		        <!-- //底部模板 --> 
		        <span>© 2011－2015 joyme.com, all rights reserved</span> 
		        <span> 京ICP备11029291号</span> 
		        <a target="_blank" href="http://www.joyme.com/help/aboutus" rel="nofollow">关于着迷</a> | 
		        <a target="_blank" href="http://www.joyme.com/about/job/zhaopin" rel="nofollow">工作在着迷</a> | 
		        <a target="_blank" href="http://www.joyme.com/about/contactus" rel="nofollow">商务合作</a> | 
		        <a href="mailto:contactus@joyme.com">联系我们</a>| 
		        <a href="http://www.joyme.com/sitemap.htm">网站地图</a> 
		    </div>
	</div>
	<!--footer==end-->
	<!--getTop-->
	<div id="getTop">
		<span>返回顶部↑</span>
	</div>
	<!--getTop-->
</div>
<!--热力图-->
<script src='http://stat.joyme.com/clickheat/js/clickheat.js'></script>
<script>
window.clickheat = true;
</script>
<!--发帖插件调用-->
<script src='/extensions/jsscripts/commonfn.js'></script>
<script src='/extensions/jsscripts/fatie.js'></script>
<script>
var ns = mw.config.get('wgCanonicalNamespace') == '' && mw.config.get('wgPageName')=='THREAD' ? 'THREAD' : mw.config.get('wgCanonicalNamespace');
var title = mw.config.get('wgTitle');
var action = mw.config.get('wgAction');
if(ns != '' && ns==title && action=='edit'){
	$('#wpTextbox1').val('');
	wikiThread.init(action, ns);
}
 function checkurl(){
    var url=window.location.href;
    var indes='&veaction=edit';
    if(url.indexOf(indes)>0){
    	$('#mw-content-text').hide();
    }else{
    	$('#mw-content-text').show();
    	clearInterval(times);
    }
 }
 //var times=setInterval(function(){
// 	checkurl();
 //},500)
</script>
<?php
		$s = ob_get_contents();
		ob_end_clean();

		return $s;
	}

	/**
	 * @return string
	 */
	function sysLinks() {
		/*$s = array(
			/*$this->getSkin()->mainPageLink(),

			Linker::linkKnown(
				Title::newFromText( wfMessage( 'aboutpage' )->inContentLanguage()->text() ),
				wfMessage( 'about' )->text()
			),
			Linker::makeExternalLink(
				Skin::makeInternalOrExternalUrl( wfMessage( 'helppage' )->inContentLanguage()->text() ),
				wfMessage( 'help' )->text(),
				false
			),
			Linker::linkKnown(
				Title::newFromText( wfMessage( 'faqpage' )->inContentLanguage()->text() ),
				wfMessage( 'faq' )->text()
			),
		);
		*/
		$personalUrls = $this->getPersonalTools();
		foreach ( array( 'logout', 'createaccount', 'login' ) as $key ) {
			if ( $personalUrls[$key] ) {
				$s[] = $this->makeListItem( $key, $personalUrls[$key], array( 'tag' => 'span' ) );
			}
		}

		return $this->getSkin()->getLanguage()->pipeList( $s );
	}

	/**
	 * Adds Joyme1-specific items to the sidebar: qbedit, qbpageoptions and qbmyoptions menus.
	 *
	 * @param $bar sidebar data
	 * @return array modified sidebar data
	 */
	function sidebarAdditions( $bar ) {
		// "This page" and "Edit" menus
		// We need to do some massaging here... we reuse all of the items, except for $...['views']['view'],
		// as $...['namespaces']['main'] and $...['namespaces']['talk'] together serve the same purpose.
		// We also don't use $...['variants'], these are displayed in the top menu.
		$content_navigation = $this->data['content_navigation'];
		$qbpageoptions = array_merge(
			$content_navigation['namespaces'],
			array(
				'history' => $content_navigation['views']['history'],
				'watch' => $content_navigation['actions']['watch'],
				'unwatch' => $content_navigation['actions']['unwatch'],
			)
		);
		$content_navigation['actions']['watch'] = null;
		$content_navigation['actions']['unwatch'] = null;
		$qbedit = array_merge(
			array(
				'edit' => $content_navigation['views']['edit'],
				'addsection' => $content_navigation['views']['addsection'],
			),
			$content_navigation['actions']
		);

		// Personal tools ("My pages")
		$qbmyoptions = $this->getPersonalTools();
		foreach ( array( 'logout', 'createaccount', 'login', ) as $key ) {
			$qbmyoptions[$key] = null;
		}

		// Use the closest reasonable name
		$bar['cactions'] = $qbedit;
		$bar['pageoptions'] = $qbpageoptions; // this is a non-standard portlet name, but nothing fits
		$bar['personal'] = $qbmyoptions;

		return $bar;
	}

	/**
	 * Compute the sidebar
	 * @access private
	 *
	 * @return string
	 */
	function quickBar() {
		global $wgWikiname,$wgComment, $head_more,$wgRequest,$numbersite;
		
		$action = $wgRequest->getText('action');
		//搜索
		$s = '';
		
		$s.= '<div role="search" id="p-search" class="portlet">';
		$s.= '<h3><span>查找</span></h3>';
				
		$s.=$this->searchForm( 'sidebar' );
		
		$s.='</div>';
		//操作
		$s.= '<div role="search" id="p-cactions" class="portlet fn-clear">';

		//统计
		$s.= '<div role="wiki-pages" id="wiki-pages" class="fn-left">';
		
		$s.= '<span>'.SiteStats::pages().'</span><cite><b>词条</b><font>已创建</font><cite>';
		
		$s.='</div>';

		$listViewHTML = "";
		foreach($this->data['content_navigation']['views'] as $key=>$link){
			if( $key == 'view' ) continue;
			if($key == 'edit'){
				$jmurl = $link['href'];
				$jmmsg = '编辑源代码';
				continue;
			}else if($key=='viewsource'){
				$jmurl = $link['href'];
				$jmmsg = '编辑源代码';
				continue;
			}
			$this->data['content_navigation']['actions'][$key] = $link;
		}
		if ( $listViewHTML ) {
			$listViewHTML = "<ul class=\"wiki-taglist\">$listViewHTML</ul>";
			$s .= "\n$listViewHTML\n";
		}
		
		$listActionsHTML = "";
		foreach($this->data['content_navigation']['actions'] as $key=>$link){
			$listActionsHTML.= $this->makeListItem( $key, $link );
		}
                global $wgUser,$wgPhpServer,$wgServer,$wgWikiname, $wgUGCWikis;
                if (in_array($wgWikiname, $wgUGCWikis)){
					$rooturl =$wgServer;
				}else{
					$rooturl=$wgPhpServer."/wiki/";
				}
		if ( $listActionsHTML ) {
			$listActionsHTML = "<div class='head-menu'><ul>$listActionsHTML</ul></div>";
		
			$s.='<div id="head-contributebox">
				<span><a href="#" tabindex="-1" class="head-contribute"><i></i>贡献</a></span>
				<div class="head-contributemenu" style="display: none;">
					<ul>
						<li>
							<a href="'.$rooturl.'/创建页面">创建页面</a>
						</li>
						<li>
							<a href="'.$rooturl.'/特殊:上传文件" title="">上传图片</a>
						</li>
					</ul>
				</div>
			</div>';
		}
    	$headingHTML = "<span><a href=\"$jmurl\" tabindex=\"-1\" id=\"head-tips\">$jmmsg<i></i></a></span>";
		// $s .= "<div id=\"head-more\">\n$headingHTML\n$listActionsHTML\n</div>\n";
		$head_more = "<div id=\"head-more\">\n$headingHTML\n$listActionsHTML\n</div>\n";
		// if(!strstr($_SERVER['REQUEST_URI'], '%E9%A6%96%E9%A1%B5') && !strstr($_SERVER['REQUEST_URI'], ':') && !strstr($_SERVER['REQUEST_URI'], 'action') && $wgComment){
			// $s .= '<div id="haed-comments"><span><a id="totalcomments">评论(0)</a></span></div>';
		// }
		$s .="</div>\n";
		
		
		//导航
		$bari = 1;
		$s .= "<div id='quickbar' class='fn-clear'>";

		//var_dump($this->data['sidebar']);exit;
		foreach ($this->data['sidebar'] as $key => $val) {
			if($bari == 1){
				$s.= '<div class="portlet headnav action" role="sidebar"><h3><span><a class="top" href="'. $val['info']["href"] .'">' . $val['info']["text"] . ' </a></span></h3>';
				$bari = 0;
			}else{
				$s.= '<div class="portlet headnav" role="sidebar"><h3><span><a class="top" href="'. $val['info']["href"] .'">' . $val['info']["text"] . ' </a></span></h3>';
			}
			if (!empty($val['list'])){
				$s.=  '<ul class="tagmenu">';/*2级导航*/
				foreach ($val['list'] as $b) {
					$s.=  '<li><a href="' . $b['info']["href"] . '">' . $b['info']["text"] . '</a>';
					if (!empty($b['list'])){
						$s.=  '<ul class="submenu">';/*3级导航*/
						foreach ($b['list'] as $c) {
							$s.=  '<li><a href="' . $c['info']["href"] . '">' . $c['info']["text"] . '</a></li>';
						};
						$s.=  '</ul>';
					}
					$s.="</li>";
				
				};
				$s.=  '</ul>';
			}
			$s.=  '<b class="headnav-bg"></b></div>';
		} // 
		$s .= "</div>";
		
		return array($s, $head_more);
	}
	
	function quickBar_bak() {
		// Massage the sidebar. We want to:
		// * place SEARCH at the beginning
		// * add new portlets before TOOLBOX (or at the end, if it's missing)
		// * remove LANGUAGES (langlinks are displayed elsewhere)
		$orig_bar = $this->data['sidebar'];
		$bar = array();
		$hasToolbox = false;

		// Always display search first
		$bar['SEARCH'] = true;
		// Copy everything except for langlinks, inserting new items before toolbox
		foreach ( $orig_bar as $heading => $data ) {
			if ( $heading == 'TOOLBOX' ) {
				// Insert the stuff
				$bar = $this->sidebarAdditions( $bar );
				$hasToolbox = true;
			}

			if ( $heading != 'LANGUAGES' ) {
				$bar[$heading] = $data;
			}
		}
		// If toolbox is missing, add our items at the end
		if ( !$hasToolbox ) {
			$bar = $this->sidebarAdditions( $bar );
		}

		// Fill out special sidebar items with content
		$orig_bar = $bar;
		$bar = array();
		foreach ( $orig_bar as $heading => $data ) {
			if ( $heading == 'SEARCH' ) {
				$bar['search'] = $this->searchForm( 'sidebar' );
			} elseif ( $heading == 'TOOLBOX' ) {
				$bar['tb'] = $this->getToolbox();
			} else {
				$bar[$heading] = $data;
			}
		}

		// Output the sidebar
		// Joyme1 uses custom messages for some portlets, but we should keep the ids for consistency
		$idToMessage = array(
			'search' => 'qbfind',
			'navigation' => 'qbbrowse',
			'tb' => 'toolbox',
			'cactions' => 'qbedit',
			'personal' => 'qbmyoptions',
			'pageoptions' => 'qbpageoptions',
		);

		$s = "<div id='quickbar' class='fn-clear'>";

		$bari = 1;

		$bar['cactions'] = $this->data['content_navigation']['views'];

		foreach ( $bar as $heading => $data ) {
			$portletId = Sanitizer::escapeId( "p-$heading" );
			$headingMsg = wfMessage( $idToMessage[$heading] ? $idToMessage[$heading] : $heading );
			$headingHTML = "<h3><span>" . ( $headingMsg->exists() ? $headingMsg->escaped() : htmlspecialchars( $heading ) ) . "</span></h3>";
			$listHTML = "";

			if ( is_array( $data ) ) {
				// $data is an array of links
				foreach ( $data as $key => $link ) {
					// Can be empty due to how the sidebar additions are done
					if ( $link ) {
						$listHTML .= $this->makeListItem( $key, $link );
					}
				}
				if ( $listHTML ) {
					$listHTML = "<ul>$listHTML</ul>";
				}
			} else {
				// $data is a HTML <ul>-list string
				$listHTML = $data;
			}

			if ( $listHTML ) {
				$heading_menu = array('search','cactions','pageoptions','personal');
				$role = in_array($heading, $heading_menu)?$heading:'navigation';
				
				if($role == 'navigation'){
					if($bari == 1){
						$headingHTML = "<h3 class=\"h-sel\"><span>". ( $headingMsg->exists() ? $headingMsg->escaped() : htmlspecialchars( $heading ) ) . "</span></h3>";
						$bari = 0;
					}
					$s .= "<div class=\"portlet headnav\" id=\"$portletId\" role=\"$role\">\n$headingHTML\n$listHTML\n<b class=\"headnav-bg\"></b></div>\n";
				}elseif($role == 'cactions'){
					$s .="<div class=\"portlet fn-clear\" id=\"$portletId\" role=\"$role\"><div class=\"wiki-toolsbar fn-right fn-clear\">";
					$listViewHTML = "";
					foreach($this->data['content_navigation']['views'] as $key=>$link){
						$listViewHTML.= $this->makeListItem( $key, $link );
					}
					if ( $listViewHTML ) {
						$listViewHTML = "<ul class=\"wiki-taglist\">$listViewHTML</ul>";
						$s .= "\n$listViewHTML\n";
					}
					
					$listActionsHTML = "";
					foreach($this->data['content_navigation']['actions'] as $key=>$link){
						$listActionsHTML.= $this->makeListItem( $key, $link );
					}
					if ( $listActionsHTML ) {
						$listActionsHTML = "<div class='head-menu'><ul>$listActionsHTML</ul></div>";
						$headingHTML = "<span><a href=\"#\" tabindex=\"-1\" id=\"head-tips\">更多<i></i></a></span>";
						$s .= "<div id=\"head-more\">\n$headingHTML\n$listActionsHTML\n</div>\n";
					}
					$s .="</div>\n</div>\n";
					
				}elseif($role =='personal' || $role == 'pageoptions'){
					$s .='';
				}else{
					$s .= "<div class=\"portlet\" id=\"$portletId\" role=\"$role\">\n$headingHTML\n$listHTML\n</div>\n";
				}
				
			}
			//var_dump($this->data['sidebar']);exit;	
			$s .= $this->renderAfterPortlet( $heading );
		}

		$s .= "</div>";
		return $s;
	}

	/**
	 * @param $label string
	 * @return string
	 */
	function searchForm( $which ) {
		global $wgUseTwoButtonsSearchForm;

		$search = $this->getSkin()->getRequest()->getText( 'search' );
		$action = $this->data['searchaction'];
		$s = "<form id=\"searchform-" . htmlspecialchars( $which ) . "\" method=\"get\" class=\"inline\" action=\"$action\">";
		if ( $which == 'footer' ) {
			$s .= wfMessage( 'qbfind' )->text() . ": ";
		}

		$s .= $this->makeSearchInput( array( 'class' => 'mw-searchInput', 'type' => 'text', 'size' => '14' ) );
		$s .= ( $which == 'footer' ? " " : "" );
		/*
		 *查找按钮
			$s .= $this->makeSearchButton( 'go', array( 'class' => 'searchButton' ) );
		*/
		if ( $wgUseTwoButtonsSearchForm ) {
			$s .= $this->makeSearchButton( 'fulltext', array( 'class' => 'searchButton' ) );
		} else {
			$s .= '<div><a href="' . $action . '" rel="search">' . wfMessage( 'powersearch-legend' )->escaped() . "</a></div>\n";
		}

		$s .= '</form>';

		return $s;
	}
}
