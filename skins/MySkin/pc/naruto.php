<?php
/**
 * Vector - Modern version of MonoBook with fresh look and many usability
 * improvements.
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
 * SkinTemplate class for Vector skin
 * @ingroup Skins
 */
class SkinNaruto extends SkinTemplate {

	protected static $bodyClasses = array( 'naruto-animateLayout' );

	var $skinname = 'naruto', $stylename = 'naruto',
		$template = 'NarutoTemplate', $useHeadElement = true;

	/**
	 * Initializes output page and sets up skin-specific parameters
	 * @param $out OutputPage object to initialize
	 */
	public function initPage( OutputPage $out ) {
		global $wgLocalStylePath;

		parent::initPage( $out );

		// Append CSS which includes IE only behavior fixes for hover support -
		// this is better than including this in a CSS file since it doesn't
		// wait for the CSS file to load before fetching the HTC file.
		$min = $this->getRequest()->getFuzzyBool( 'debug' ) ? '' : '.min';
		$out->addHeadItem( 'csshover',
			'<!--[if lt IE 7]><style type="text/css">body{behavior:url("' .
				htmlspecialchars( $wgLocalStylePath ) .
				"/vector/csshover{$min}.htc\")}</style><![endif]-->"
		);

		$out->addModules( array( 'skins.vector.js', 'skins.vector.collapsibleNav' ) );
	}

	/**
	 * Loads skin and user CSS files.
	 * @param $out OutputPage object
	 */
	function setupSkinUserCss( OutputPage $out ) {
		parent::setupSkinUserCss( $out );

		$styles = array( 'mediawiki.skinning.interface', 'skins.naruto.styles' );
		wfRunHooks( 'SkinVectorStyleModules', array( $this, &$styles ) );
		$out->addModuleStyles( $styles );
	}

	/**
	 * Adds classes to the body element.
	 *
	 * @param $out OutputPage object
	 * @param &$bodyAttrs Array of attributes that will be set on the body element
	 */
	function addToBodyAttributes( $out, &$bodyAttrs ) {
		if ( isset( $bodyAttrs['class'] ) && strlen( $bodyAttrs['class'] ) > 0 ) {
			$bodyAttrs['class'] .= ' ' . implode( ' ', static::$bodyClasses );
		} else {
			$bodyAttrs['class'] = implode( ' ', static::$bodyClasses );
		}
	}
}

/**
 * QuickTemplate class for Vector skin
 * @ingroup Skins
 */
class NarutoTemplate extends BaseTemplate {

	/* Functions */

	/**
	 * Outputs the entire contents of the (X)HTML page
	 */
	public function execute() {
		global $wgVectorUseIconWatch, $wgIsLogin, $wgJoymeUserInfo;

		// Build additional attributes for navigation urls
		$nav = $this->data['content_navigation'];

		if ( $wgVectorUseIconWatch ) {
			$mode = $this->getSkin()->getUser()->isWatched( $this->getSkin()->getRelevantTitle() ) ? 'unwatch' : 'watch';
			if ( isset( $nav['actions'][$mode] ) ) {
				$nav['views'][$mode] = $nav['actions'][$mode];
				$nav['views'][$mode]['class'] = rtrim( 'icon ' . $nav['views'][$mode]['class'], ' ' );
				$nav['views'][$mode]['primary'] = true;
				unset( $nav['actions'][$mode] );
			}
		}

		$xmlID = '';
		foreach ( $nav as $section => $links ) {
			foreach ( $links as $key => $link ) {
				if ( $section == 'views' && !( isset( $link['primary'] ) && $link['primary'] ) ) {
					$link['class'] = rtrim( 'collapsible ' . $link['class'], ' ' );
				}

				$xmlID = isset( $link['id'] ) ? $link['id'] : 'ca-' . $xmlID;
				$nav[$section][$key]['attributes'] =
					' id="' . Sanitizer::escapeId( $xmlID ) . '"';
				if ( $link['class'] ) {
					$nav[$section][$key]['attributes'] .=
						' class="' . htmlspecialchars( $link['class'] ) . '"';
					unset( $nav[$section][$key]['class'] );
				}
				if ( isset( $link['tooltiponly'] ) && $link['tooltiponly'] ) {
					$nav[$section][$key]['key'] =
						Linker::tooltip( $xmlID );
				} else {
					$nav[$section][$key]['key'] =
						Xml::expandAttributes( Linker::tooltipAndAccesskeyAttribs( $xmlID ) );
				}
			}
		}
		$this->data['namespace_urls'] = $nav['namespaces'];
		$this->data['view_urls'] = $nav['views'];
		$this->data['action_urls'] = $nav['actions'];
		$this->data['variant_urls'] = $nav['variants'];

		// Reverse horizontally rendered navigation elements
		if ( $this->data['rtl'] ) {
			$this->data['view_urls'] =
				array_reverse( $this->data['view_urls'] );
			$this->data['namespace_urls'] =
				array_reverse( $this->data['namespace_urls'] );
			$this->data['personal_urls'] =
				array_reverse( $this->data['personal_urls'] );
		}
		// Output HTML Page
		$this->html( 'headelement' );
?>
		<?php include('common.php');?>
		<link href="<?php  global $wgServer,$wgWikiStatic;  echo $wgWikiStatic;?>/skins/Vector/joymecomment.css" rel="stylesheet"/>
	<input type="hidden" id="joymelogin" value="<?php echo $wgIsLogin ? 'true' : 'false';?>">
<input type="hidden" id="joymeuserinfo" value='<?php echo $wgJoymeUserInfo ? json_encode($wgJoymeUserInfo) : '';?>'>
<script type="text/javascript" src="<?php  echo $wgWikiStatic;?>/extensions/jsscripts/commonfn.js"></script>
	<!--wrap-->
	<div id="wrap">
		<div class="wiki_header">
			<!-- 下拉菜单 -->
			<div class="slideMenu">
				<ul class="clearfix">
					<li><a class="top" href="<?php echo $wgServer."/";?>">首页</a>
				<?php
					foreach ($this->data['sidebar'] as $key => $val) {
						echo '<li><a class="top" href="'.$wgServer.'/'. $key .'">' . $key . ' </a>';
						if (!empty($val)){
							echo '<div>';
							foreach ($val as $b) {
								echo '<a href="' . $b["href"] . '">' . $b["text"] . '</a>';
							};
							echo '</div>';
						}
						echo '</li>';
					}
				?>
				</ul>
			</div>
			<!--搜索编辑-->
			<div id="mw-navigation">
				<h2><?php $this->msg( 'navigation-heading' ) ?></h2>
				<div id="mw-head">
					<div id="right-navigation">
						<?php $this->renderNavigation( array('VIEWS', 'ACTIONS' ) ); ?>
					</div>
					<?php $this->renderNavigation( array(  'SEARCH' ) ); ?>
				</div>
			</div>
			<!--搜索编辑-->
			<!--mw-tit-->
			<div class="mw-tit"><span>火影忍者WIKI</span></div>
			<!--mw-tit==end-->
		</div>
		<!--wiki_body-->
        <div class="wiki_body clearfix">
		
			<div id="content" class="mw-body" role="main">
				<a id="top"></a>
				<div id="mw-js-message" style="display:none;"<?php $this->html( 'userlangattributes' ) ?>></div>
				<?php if ( $this->data['sitenotice'] ) { ?>
				<div id="siteNotice"><?php $this->html( 'sitenotice' ) ?></div>
				<?php } ?>
				<h1 id="firstHeading" class="firstHeading" lang="<?php
					$this->data['pageLanguage'] = $this->getSkin()->getTitle()->getPageViewLanguage()->getHtmlCode();
					$this->text( 'pageLanguage' );
				?>"><span dir="auto" style="float:left;"><?php $this->html( 'title' ) ?></span>
				<?php global $wgComment;?>
				<?php if(!strstr($_SERVER['REQUEST_URI'], '%E9%A6%96%E9%A1%B5') && !strstr($_SERVER['REQUEST_URI'], ':') && !strstr($_SERVER['REQUEST_URI'], 'action') && $wgComment):?>
				<div id="head-comments" style="float:left;"><span style="text-indent:10px; line-height:24px; font-size:14px;"><a id="totalcomments" href="#post_reply">(0条评论)</a></span></div>
				<?php endif;?></h1>
				<?php $this->html( 'prebodyhtml' ) ?>
				<div id="bodyContent" class="clearfix">
					<?php if ( $this->data['isarticle'] ) { ?>
					<div id="siteSub"><?php $this->msg( 'tagline' ) ?></div>
					<?php } ?>
					<div id="contentSub"<?php $this->html( 'userlangattributes' ) ?>><?php $this->html( 'subtitle' ) ?></div>
					<?php if ( $this->data['undelete'] ) { ?>
					<div id="contentSub2"><?php $this->html( 'undelete' ) ?></div>
					<?php } ?>
					<?php if ( $this->data['newtalk'] ) { ?>
					<div class="usermessage"><?php $this->html( 'newtalk' ) ?></div>
					<?php } ?>
					<div id="jump-to-nav" class="mw-jump">
						<?php $this->msg( 'jumpto' ) ?>
						<a href="#mw-navigation"><?php $this->msg( 'jumptonavigation' ) ?></a><?php $this->msg( 'comma-separator' ) ?>
						<a href="#p-search"><?php $this->msg( 'jumptosearch' ) ?></a>
					</div>
					<?php $this->html( 'bodycontent' ) ?>
					<?php if ( $this->data['printfooter'] ) { ?>
					<div class="printfooter">
					<?php $this->html( 'printfooter' ); ?>
					</div>
					<?php } ?>
					<?php if ( $this->data['catlinks'] ) { ?>
					<?php $this->html( 'catlinks' ); ?>
					<?php } ?>
					<?php if ( $this->data['dataAfterContent'] ) { ?>
					<?php $this->html( 'dataAfterContent' ); ?>
					<?php } ?>
					<div class="visualClear"></div>
					<?php $this->html( 'debughtml' ); ?>
					
					<!--我是内容-->
					
					<!--我是内容==end-->
					<?php include('comment.php');?>
				</div>
			</div>
		
		</div>
		<!--wiki_body==end-->

		<!--wiki_banner-->
        <div id="wiki_banner">
            <span class="bg_1"></span>
            <span class="bg_2"></span>
            <span class="bg_3"></span>
            <span class="bg_4"></span>
            <span class="bg_5"></span>
            <span class="bg_6"></span>
            <span class="bg_7"></span>
            <span class="bg_8"></span>
            <span class="bg_9"></span>
        </div>
        <!--wiki_banner==end-->
	</div>

	<!-- footer --> 
	<div class="footercon clearfix"> 
	    <div class="footer"> 
	        <!-- //底部模板 --> 
	        <span>&copy; 2011－2014 joyme.com, all rights reserved</span> 
	        <span> 京ICP备11029291号</span> 
	        <a target="_blank" href="http://www.joyme.com/help/aboutus" rel="nofollow">关于着迷</a> | 
	        <a target="_blank" href="http://www.joyme.com/about/job/zhaopin" rel="nofollow">工作在着迷</a> | 
	        <a target="_blank" href="http://www.joyme.com/note/1CGoLChZ18yHHQJW_jVV1S" rel="nofollow">着迷认证</a> | 
	        <a target="_blank" href="http://www.joyme.com/about/contactus" rel="nofollow">商务合作</a> | 
	        <a href="../../../news/blue/201403/mailto:contactus@joyme.com">联系我们</a>| 
	        <a href="http://www.joyme.com/sitemap.htm">网站地图</a> 
	    </div> 
	</div>

	<!-- 返回顶部 -->
	<a href="javascript:returnTop();" id="returntop"></a>

	<!-- 右侧快捷导航 -->
	<div id="right-swap">
		<div class="right-swap-con"></div>
		<div id="right-swap-btn" class="state-open"></div>
	</div>

	<!--wrap==end-->
	<?php $this->printTrail(); ?>
	
	<!--<script type="text/javascript" src="/extensions/jsscripts/perfect-scrollbar.min.js"></script>-->
	<script type="text/javascript">
		var itimer = null;
		var iidx = 0;
		
		window.onscroll = function(){
			var top = document.documentElement.scrollTop || document.body.scrollTop;
			var returnbtn = document.getElementById('returntop');
			if(top > 100){
				if(returnbtn.style.display != 'block'){
					returnbtn.style.display = 'block';
				}
			}else{
				document.getElementById('returntop').style.display = 'none';
			}
		};
		function returnTop(){
			document.documentElement.scrollTop = 0;
			document.body.scrollTop = 0;
			document.getElementById('returntop').style.display = 'none';
		};
		$('#tag-nav div').click(function(){
			var idx = $(this).index();
			$(this).addClass('current').siblings().removeClass();
			$('#tag-wrapper>div').hide().eq(idx).show();

		});
		document.getElementById('right-swap-btn').onclick = function(){
	        if(!this.isclose){
	            document.getElementById('right-swap').style.right='0px';
	            this.isclose=true;
	            this.className='state-close';
	        }else{
	            document.getElementById('right-swap').style.right= (0-document.getElementById('right-swap').offsetWidth) + 'px';
	            this.isclose=false;
	            this.className='state-open'
	        }
	    }

	    /* 移动目录 */
	    if ($('#toc').length){
	        var c = $('#toc ul').clone();
	        $('.right-swap-con').append(c);
	        $('#toc').remove();
	    } else {
			$('#right-swap').hide();
		}

	    /* 添加自定义滚动条 
	    $('.result-box').perfectScrollbar();
	    $('.right-swap-con').perfectScrollbar();
		*/
		$('.cardSelectOption').bind('click',function(){
			if($(this).hasClass('current')){
				$(this).removeClass('current');
				$(this).parent().parent().parent().find('em').html($(this).parent().parent().parent().find('em').attr('data-type-text'));
			}else{
				$(this).parent().find('.cardSelectOption').removeClass('current');
				$(this).addClass('current');
				$(this).css('color','#8f6600');
				$(this).parent().parent().parent().find('em').html($(this).html());
			}
			$('.result-box').scrollTop(0);
		});
		
		/* 图片轮播 */
		if ($('#pic-ctrl span').length > 1 && $('#pic-ctrl span').length == $('.pic-box').length) {
		    setLoop();
		    $('.pic').hover(function(){clearInterval(itimer)}, function(){setLoop()});
		    $('#pic-ctrl span').each(function(e){
		        $(this).mouseover(function(){changePicFocus(e)})
		    })
		}

		function changePicFocus(idx) {
		    $('#pic-ctrl span').removeClass().eq(idx).addClass('current');
		    $('.pic-box').hide().eq(idx).show();
		    iidx = idx;
		};

		function setLoop() {
		    itimer = setInterval(function(){
		        iidx==$('#pic-ctrl span').length-1 ? iidx=0 : iidx++;
		        changePicFocus(iidx);
		    }, 2000);
		};
		//图片滑过显示下方提示
     	function hoverImage(){
			$('.imageSlider').mouseover(function(){
				$(this).children('span').stop().animate({'height':'26px'},200);
			})
			$('.imageSlider').mouseout(function(){
				$(this).children('span').stop().animate({'height':'0px'},200);
			})
		}
		hoverImage();
	</script>
	<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//stat.joyme.com/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 7]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//stat.joyme.com/piwik.php?idsite=7" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->

	</body>
</html>
<?php
	}

	/**
	 * Render a series of portals
	 *
	 * @param $portals array
	 */
	protected function renderPortals( $portals ) {
		// Force the rendering of the following portals
		if ( !isset( $portals['SEARCH'] ) ) {
			$portals['SEARCH'] = true;
		}
		if ( !isset( $portals['TOOLBOX'] ) ) {
			$portals['TOOLBOX'] = true;
		}
		if ( !isset( $portals['LANGUAGES'] ) ) {
			$portals['LANGUAGES'] = true;
		}
		// Render portals
		foreach ( $portals as $name => $content ) {
			if ( $content === false ) {
				continue;
			}

			switch ( $name ) {
				case 'SEARCH':
					break;
				case 'TOOLBOX':
					//$this->renderPortal( 'tb', $this->getToolbox(), 'toolbox', 'SkinTemplateToolboxEnd' );
					break;
				case 'LANGUAGES':
					if ( $this->data['language_urls'] !== false ) {
						$this->renderPortal( 'lang', $this->data['language_urls'], 'otherlanguages' );
					}
					break;
				default:
					$this->renderPortal( $name, $content );
				break;
			}
		}
	}

	/**
	 * @param $name string
	 * @param $content array
	 * @param $msg null|string
	 * @param $hook null|string|array
	 */
	protected function renderPortal( $name, $content, $msg = null, $hook = null ) {
		if ( $msg === null ) {
			$msg = $name;
		}
		$msgObj = wfMessage( $msg );
		?>
<div class="portal" role="navigation" id='<?php echo Sanitizer::escapeId( "p-$name" ) ?>'<?php echo Linker::tooltip( 'p-' . $name ) ?> aria-labelledby='<?php echo Sanitizer::escapeId( "p-$name-label" ) ?>'>
	<h3<?php $this->html( 'userlangattributes' ) ?> id='<?php echo Sanitizer::escapeId( "p-$name-label" ) ?>'><?php echo htmlspecialchars( $msgObj->exists() ? $msgObj->text() : $msg ); ?></h3>
	<div class="body">
<?php
		if ( is_array( $content ) ) { ?>
		<ul>
<?php
			foreach ( $content as $key => $val ) { ?>
			<?php echo $this->makeListItem( $key, $val ); ?>

<?php
			}
			if ( $hook !== null ) {
				wfRunHooks( $hook, array( &$this, true ) );
			}
			?>
		</ul>
<?php
		} else { ?>
		<?php
			echo $content; /* Allow raw HTML block to be defined by extensions */
		}

		$this->renderAfterPortlet( $name );
		?>
	</div>
</div>
<?php
	}

	/**
	 * Render one or more navigations elements by name, automatically reveresed
	 * when UI is in RTL mode
	 *
	 * @param $elements array
	 */
	protected function renderNavigation( $elements ) {
		global $wgVectorUseSimpleSearch;

		// If only one element was given, wrap it in an array, allowing more
		// flexible arguments
		if ( !is_array( $elements ) ) {
			$elements = array( $elements );
		// If there's a series of elements, reverse them when in RTL mode
		} elseif ( $this->data['rtl'] ) {
			$elements = array_reverse( $elements );
		}
		// Render elements
		foreach ( $elements as $name => $element ) {
			switch ( $element ) {
				case 'NAMESPACES':
?>
<div id="p-namespaces" role="navigation" class="vectorTabs<?php if ( count( $this->data['namespace_urls'] ) == 0 ) { echo ' emptyPortlet'; } ?>" aria-labelledby="p-namespaces-label">
	<h3 id="p-namespaces-label"><?php $this->msg( 'namespaces' ) ?></h3>
	<ul<?php $this->html( 'userlangattributes' ) ?>>
		<?php foreach ( $this->data['namespace_urls'] as $link ) { ?>
			<li <?php echo $link['attributes'] ?>><span><a href="<?php echo htmlspecialchars( $link['href'] ) ?>" <?php echo $link['key'] ?>><?php echo htmlspecialchars( $link['text'] ) ?></a></span></li>
		<?php } ?>
	</ul>
</div>
<?php
				break;
				case 'VARIANTS':
?>
<div id="p-variants" role="navigation" class="vectorMenu<?php if ( count( $this->data['variant_urls'] ) == 0 ) { echo ' emptyPortlet'; } ?>" aria-labelledby="p-variants-label">
	<h3 id="mw-vector-current-variant">
	<?php foreach ( $this->data['variant_urls'] as $link ) { ?>
		<?php if ( stripos( $link['attributes'], 'selected' ) !== false ) { ?>
			<?php echo htmlspecialchars( $link['text'] ) ?>
		<?php } ?>
	<?php } ?>
	</h3>
	<h3 id="p-variants-label"><span><?php $this->msg( 'variants' ) ?></span><a href="#"></a></h3>
	<div class="menu">
		<ul>
			<?php foreach ( $this->data['variant_urls'] as $link ) { ?>
				<li<?php echo $link['attributes'] ?>><a href="<?php echo htmlspecialchars( $link['href'] ) ?>" lang="<?php echo htmlspecialchars( $link['lang'] ) ?>" hreflang="<?php echo htmlspecialchars( $link['hreflang'] ) ?>" <?php echo $link['key'] ?>><?php echo htmlspecialchars( $link['text'] ) ?></a></li>
			<?php } ?>
		</ul>
	</div>
</div>
<?php
				break;
				case 'VIEWS':
?>
	<?php $this->html( 'userlangattributes' ) ?>
		<?php foreach ( $this->data['view_urls'] as $link ) { ?>
			<a href="<?php echo htmlspecialchars( $link['href'] ) ?>" <?php echo $link['key'] ?>><?php
				// $link['text'] can be undefined - bug 27764
				if ( array_key_exists( 'text', $link ) ) {
					echo array_key_exists( 'img', $link ) ? '<img src="' . $link['img'] . '" alt="' . $link['text'] . '" />' : htmlspecialchars( $link['text'] );
				}
				?></a>
		<?php } ?>
<?php
				break;
				case 'ACTIONS':
?>
		
			<?php foreach ( $this->data['action_urls'] as $link ) { ?>
				<a href="<?php echo htmlspecialchars( $link['href'] ) ?>" <?php echo $link['key'] ?>><?php echo htmlspecialchars( $link['text'] ) ?></a>
			<?php } ?>
<?php
				break;
				case 'SEARCH':
?>
<!--搜索-->
<div id="p-search" role="search">
	<h3<?php $this->html( 'userlangattributes' ) ?>><label for="searchInput"><?php $this->msg( 'search' ) ?></label></h3>
	<form action="<?php $this->text( 'wgScript' ) ?>" id="searchform">
		<?php if ( $wgVectorUseSimpleSearch ) { ?>
			<div id="simpleSearch">
		<?php } else { ?>
			<div>
		<?php } ?>
			<?php
			echo $this->makeSearchInput( array( 'id' => 'searchInput' ) );
			echo Html::hidden( 'title', $this->get( 'searchtitle' ) );
			// We construct two buttons (for 'go' and 'fulltext' search modes), but only one will be
			// visible and actionable at a time (they are overlaid on top of each other in CSS).
			// * Browsers will use the 'fulltext' one by default (as it's the first in tree-order), which
			//   is desirable when they are unable to show search suggestions (either due to being broken
			//   or having JavaScript turned off).
			// * The mediawiki.searchSuggest module, after doing tests for the broken browsers, removes
			//   the 'fulltext' button and handles 'fulltext' search itself; this will reveal the 'go'
			//   button and cause it to be used.
			echo $this->makeSearchButton( 'fulltext', array( 'id' => 'mw-searchButton', 'class' => 'searchButton mw-fallbackSearchButton' ) );
			echo $this->makeSearchButton( 'go', array( 'id' => 'searchButton', 'class' => 'searchButton' ) );
			?>
		</div>
	</form>
</div>
<!--搜索==-->
<?php

				break;
			}
		}
	}
}
