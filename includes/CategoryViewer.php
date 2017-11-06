<?php
/**
 * List and paging of category members.
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
 * @file
 */

class CategoryViewer extends ContextSource {
	/** @var int */
	public $limit;

	/** @var array */
	public $from;

	/** @var array */
	public $until;

	/** @var string[] */
	public $articles;

	/** @var array */
	public $articles_start_char;

	/** @var array */
	public $children;

	/** @var array */
	public $children_start_char;

	/** @var bool */
	public $showGallery;

	/** @var array */
	public $imgsNoGallery_start_char;

	/** @var array */
	public $imgsNoGallery;

	/** @var array */
	public $nextPage;

	/** @var array */
	protected $prevPage;

	/** @var array */
	public $flip;

	/** @var Title */
	public $title;
	
	public $page;

	/** @var Collation */
	public $collation;

	/** @var ImageGallery */
	public $gallery;

	/** @var Category Category object for this page. */
	private $cat;

	/** @var array The original query array, to be used in generating paging links. */
	private $query;

	/**
	 * @since 1.19 $context is a second, required parameter
	 * @param Title $title
	 * @param IContextSource $context
	 * @param array $from An array with keys page, subcat,
	 *        and file for offset of results of each section (since 1.17)
	 * @param array $until An array with 3 keys for until of each section (since 1.17)
	 * @param array $query
	 */
	function __construct( $title, IContextSource $context, $from = array(),
		$until = array(), $query = array(),$page = 1
	) {
		$this->title = $title;
		$this->setContext( $context );
		$this->getOutput()->addModuleStyles( array(
			'mediawiki.action.view.categoryPage.styles'
		) );
		$this->from = $from;
		$this->until = $until;
		$this->limit = $context->getConfig()->get( 'CategoryPagingLimit' );
		$this->cat = Category::newFromTitle( $title );
		$this->query = $query;
		$this->collation = Collation::singleton();
		$this->page = $page;
		unset( $this->query['title'] );
	}

	/**
	 * Format the category data list.
	 *
	 * @return string HTML output
	 */
	public function getHTML() {
		global $wgIsUgcWiki;
		if($wgIsUgcWiki == false){
			$r = $this->getHTML2();
			return $r;
		}

		$this->showGallery = $this->getConfig()->get( 'CategoryMagicGallery' )
			&& !$this->getOutput()->mNoGallery;

		$this->clearCategoryState();
		$this->doCategoryQuery();
		$this->finaliseCategoryState();

		$r = $this->getSubcategorySection() .
			$this->getPagesSection() .
			$this->getImageSection();

		if ( $r == '' ) {
			// If there is no category content to display, only
			// show the top part of the navigation links.
			// @todo FIXME: Cannot be completely suppressed because it
			//        is unknown if 'until' or 'from' makes this
			//        give 0 results.
			$r = $r . $this->getCategoryTop();
		} else {
			$r = $this->getCategoryTop() .
				$r .
				$this->getCategoryBottom();
		}

		// Give a proper message if category is empty
		if ( $r == '' ) {
			$r = $this->msg( 'category-empty' )->parseAsBlock();
		}

		$lang = $this->getLanguage();
		$langAttribs = array( 'lang' => $lang->getHtmlCode(), 'dir' => $lang->getDir() );
		# put a div around the headings which are in the user language
		$r = Html::openElement( 'div', $langAttribs ) . $r . '</div>';

		return $r;
	}
	
	public function getHTML2(){
		$dbr = wfGetDB( DB_SLAVE );
		
		$request = $this->getContext()->getRequest();
		$page = empty($request->getVal( 'page' ))?1:intval($request->getVal( 'page' ));
		$order = empty($request->getVal( 'order' ))?'':$request->getVal( 'order' );
		
		$res = $dbr->select(
				'category',
				array('cat_id','cat_pages'),
				array('cat_title' => $this->title->getDBkey()),
				__METHOD__
		);
		$row = $dbr->fetchRow( $res );
		
		if(empty($row)){
			return '';
		}
		$znum = intval($row['cat_pages']);
		
		$r = '';
		
		$ext = '&order='.$order;
		
		//功能排序
		$r.='<div class="wiki-sort">';
		
		if($order  == 'hot'){
			$orderby = 'page_counter';
			$r.='<a href="/index.php?title=分类:'.$this->title->getDBkey().'&page=1">时间排序<i class="deep-icon"></i></a>';
			$r.='<a class="j-on" href="/index.php?title=分类:'.$this->title->getDBkey().'&page=1&order=hot">热度排序<i class="shallow-icon"></i></a>';
		}else{
			$orderby = 'page_latest';
			$r.='<a class="j-on" href="/index.php?title=分类:'.$this->title->getDBkey().'&page=1">时间排序<i class="deep-icon"></i></a>';
			$r.='<a href="/index.php?title=分类:'.$this->title->getDBkey().'&page=1&order=hot">热度排序<i class="shallow-icon"></i></a>';
		}
		
		$r.='</div>';
		
		
		
		$r.= '<div class="wiki-news fn-ovf">';
		
		//data信息
		$r.='<div class="news-list"><ul>';
		
		$pagesize = 20;
		$pagenum = ceil($znum/$pagesize);
		
		if($page <= 1){
			$page = 1;
		}else if($page >=$pagenum){
			$page = $pagenum;
		}
		$offset = $pagesize*($page-1);
		
		//取出所有的page
		$res = $dbr->select(
				array('categorylinks','page'),
				array('page_id','page_title','page_latest'),
				array('page_namespace'=>'0','cl_to'=>$this->title->getDBkey()),
				__METHOD__,
				array(
				    	'USE INDEX' => array( 'categorylinks' => 'cl_sortkey' ),
						'ORDER BY' => $orderby.' DESC',
						'OFFSET' => $offset,
						'LIMIT' => $pagesize
				),
				array(
						'page' => array( 'INNER JOIN', 'page_id = cl_from' )
				)
		);
		$datalist = array();
		$pageids = array('0');
		$revids = array('0');
		while ( $row = $res->fetchRow() ) {
			$datalist[] = $row;
			$pageids[]=$row['page_id'];
			$revids[]=$row['page_latest'];
		}
		if($datalist){
			//取出page所有的分类
			$res = $dbr->select(
					array('categorylinks'),
					array('cl_to','cl_from'),
					array('cl_type'=>'page','cl_from'=>$pageids),
					__METHOD__
			);
			$categorylist = array();
			while ( $row = $res->fetchRow() ) {
				$categorylist[] = $row;
			}
			
			//取出page所有的记录 时间
			$res = $dbr->select(
					array('revision'),
					array('rev_id','rev_timestamp'),
					array('rev_id'=>$revids),
					__METHOD__
			);
			$revlist = array();
			while ( $row = $res->fetchRow() ) {
				$revlist[] = $row;
			}
			
			foreach ($datalist as $v){
				$categorystr = '<span>文章关键字: ';
				$categoryclass = '';
				$i = 1;
				foreach ($categorylist as $p){
					if($p['cl_from'] == $v['page_id']){
						if($p['cl_to'] == 'Hot'){
							$categoryclass = '<cite class="c-'.strtolower($p['cl_to']).'"></cite>';
						}else{
							if($i>5) break;
							$i++;
							$categorystr.='<cite>'.$p['cl_to'].'</cite>';
						}
					}
				}
				$categorystr.='</span>';
				$r.='<li>';
				$r.='<a href="/wiki/'.$v['page_title'].'">'.$v['page_title'] . $categoryclass . '</a>';
				$r.=$categorystr;
				
				$edittime = date('Y-m-d H:i',time());
				foreach ($revlist as $p){
					if($p['rev_id'] == $v['page_latest']){
						$edittime = date('Y-m-d H:i',strtotime($p['rev_timestamp'])+8*3600);
						break;
					}
				}
				$r.='<code>'.$edittime.'</code>';
				$r.='</li>';
			}
		}
		$r.='</ul></div>';
		
		//分页信息
		$r.='<div class="wiki-news-page">';
		
		$pagedown = $page<=1?1:$page-1;
		$pageup = $page>=$pagenum?$pagenum:$page+1;
		
		$pagestr = '<a href="/index.php?title=分类:'.$this->title->getDBkey().'&page=1'.$ext.'">首页</a>';
		$pagestr.= '<a href="/index.php?title=分类:'.$this->title->getDBkey().'&page='.$pagedown.$ext.'">上一页</a>';
		
		
		for($i=1;$i<=$pagenum;$i++){
			if(abs($i-$page)<6){
				if($i == $page){
					$href = 'javascript:void(0);';
					$def = 'class="def"';
				}else{
					$href='/index.php?title=分类:'.$this->title->getDBkey().'&page='.$i.$ext;
					$def = '';
				}
				$pagestr.='<a href="'.$href.'" '.$def.'>'.$i.'</a>';
			}
		}
		

		$pagestr.= '<a href="/index.php?title=分类:'.$this->title->getDBkey().'&page='.$pageup.$ext.'">下一页</a>';
		$pagestr .= '<a href="/index.php?title=分类:'.$this->title->getDBkey().'&page='.$pagenum.$ext.'">尾页</a>';
		
		$r.=$pagestr;
		$r.='</div>';
		
		$r.='</div>';
		return $r;
	}

	function clearCategoryState() {
		$this->articles = array();
		$this->articles_start_char = array();
		$this->children = array();
		$this->children_start_char = array();
		if ( $this->showGallery ) {
			// Note that null for mode is taken to mean use default.
			$mode = $this->getRequest()->getVal( 'gallerymode', null );
			try {
				$this->gallery = ImageGalleryBase::factory( $mode, $this->getContext() );
			} catch ( Exception $e ) {
				// User specified something invalid, fallback to default.
				$this->gallery = ImageGalleryBase::factory( false, $this->getContext() );
			}

			$this->gallery->setHideBadImages();
		} else {
			$this->imgsNoGallery = array();
			$this->imgsNoGallery_start_char = array();
		}
	}

	/**
	 * Add a subcategory to the internal lists, using a Category object
	 * @param Category $cat
	 * @param string $sortkey
	 * @param int $pageLength
	 */
	function addSubcategoryObject( Category $cat, $sortkey, $pageLength ) {
		// Subcategory; strip the 'Category' namespace from the link text.
		$title = $cat->getTitle();

		$this->children[] = $this->generateLink(
			'subcat',
			$title,
			$title->isRedirect(),
			htmlspecialchars( $title->getText() )
		);

		$this->children_start_char[] =
			$this->getSubcategorySortChar( $cat->getTitle(), $sortkey );
	}

	function generateLink( $type, Title $title, $isRedirect, $html = null ) {
		$link = null;
		Hooks::run( 'CategoryViewer::generateLink', array( $type, $title, $html, &$link ) );
		if ( $link === null ) {
			$link = Linker::link( $title, $html );
		}
		if ( $isRedirect ) {
			$link = '<span class="redirect-in-category">' . $link . '</span>';
		}

		return $link;
	}

	/**
	 * Get the character to be used for sorting subcategories.
	 * If there's a link from Category:A to Category:B, the sortkey of the resulting
	 * entry in the categorylinks table is Category:A, not A, which it SHOULD be.
	 * Workaround: If sortkey == "Category:".$title, than use $title for sorting,
	 * else use sortkey...
	 *
	 * @param Title $title
	 * @param string $sortkey The human-readable sortkey (before transforming to icu or whatever).
	 * @return string
	 */
	function getSubcategorySortChar( $title, $sortkey ) {
		global $wgContLang;

		if ( $title->getPrefixedText() == $sortkey ) {
			$word = $title->getDBkey();
		} else {
			$word = $sortkey;
		}

		$firstChar = $this->collation->getFirstLetter( $word );

		return $wgContLang->convert( $firstChar );
	}

	/**
	 * Add a page in the image namespace
	 * @param Title $title
	 * @param string $sortkey
	 * @param int $pageLength
	 * @param bool $isRedirect
	 */
	function addImage( Title $title, $sortkey, $pageLength, $isRedirect = false ) {
		global $wgContLang;
		if ( $this->showGallery ) {
			$flip = $this->flip['file'];
			if ( $flip ) {
				$this->gallery->insert( $title );
			} else {
				$this->gallery->add( $title );
			}
		} else {
			$this->imgsNoGallery[] = $this->generateLink( 'image', $title, $isRedirect );

			$this->articles_start_char[] = strtoupper($sortkey);
//		$this->articles_start_char[] = $wgContLang->convert(
//			$this->collation->getFirstLetter( $sortkey ) );
		}
	}

	/**
	 * Add a miscellaneous page
	 * @param Title $title
	 * @param string $sortkey
	 * @param int $pageLength
	 * @param bool $isRedirect
	 */
	function addPage( $title, $sortkey, $pageLength, $isRedirect = false ) {
		global $wgContLang;

		$this->articles[] = $this->generateLink( 'page', $title, $isRedirect );

		$this->articles_start_char[] = $wgContLang->convert(
			$this->collation->getFirstLetter( $sortkey ) );
	}

	function finaliseCategoryState() {
		if ( $this->flip['subcat'] ) {
			$this->children = array_reverse( $this->children );
			$this->children_start_char = array_reverse( $this->children_start_char );
		}
		if ( $this->flip['page'] ) {
			$this->articles = array_reverse( $this->articles );
			$this->articles_start_char = array_reverse( $this->articles_start_char );
		}
		if ( !$this->showGallery && $this->flip['file'] ) {
			$this->imgsNoGallery = array_reverse( $this->imgsNoGallery );
			$this->imgsNoGallery_start_char = array_reverse( $this->imgsNoGallery_start_char );
		}
	}

	function doCategoryQuery() {
		$dbr = wfGetDB( DB_SLAVE, 'category' );

		$this->nextPage = array(
			'page' => null,
			'subcat' => null,
			'file' => null,
		);
		$this->prevPage = array(
			'page' => null,
			'subcat' => null,
			'file' => null,
		);

		$this->flip = array( 'page' => false, 'subcat' => false, 'file' => false );

		foreach ( array( 'page', 'subcat', 'file' ) as $type ) {
			# Get the sortkeys for start/end, if applicable.  Note that if
			# the collation in the database differs from the one
			# set in $wgCategoryCollation, pagination might go totally haywire.
			$extraConds = array( 'cl_type' => $type );
			if ( isset( $this->from[$type] ) && $this->from[$type] !== null ) {
				$extraConds[] = 'cl_first_letter >= '
					. $dbr->addQuotes( $this->collation->getSortKey( $this->from[$type] ) );
			} elseif ( isset( $this->until[$type] ) && $this->until[$type] !== null ) {
				$extraConds[] = 'cl_first_letter < '
					. $dbr->addQuotes( $this->collation->getSortKey( $this->until[$type] ) );
				$this->flip[$type] = true;
			}

			$res = $dbr->select(
				array( 'page', 'categorylinks', 'category' ),
				array( 'page_id', 'page_title', 'page_namespace', 'page_len',
					'page_is_redirect', 'cl_sortkey', 'cat_id', 'cat_title',
					'cat_subcats', 'cat_pages', 'cat_files',
//					'cl_sortkey_prefix', 'cl_collation' ),
					'cl_sortkey_prefix', 'cl_collation','cl_first_letter'),
				array_merge( array( 'cl_to' => $this->title->getDBkey() ), $extraConds ),
				__METHOD__,
				array(
//					'USE INDEX' => array( 'categorylinks' => 'cl_sortkey' ),
					'LIMIT' => $this->limit + 1,
					'ORDER BY' => $this->flip[$type] ? 'cl_first_letter DESC' : 'cl_first_letter',
				),
				array(
					'categorylinks' => array( 'INNER JOIN', 'cl_from = page_id' ),
					'category' => array( 'LEFT JOIN', array(
						'cat_title = page_title',
						'page_namespace' => NS_CATEGORY
					))
				)
			);

			Hooks::run( 'CategoryViewer::doCategoryQuery', array( $type, $res ) );

			$count = 0;
			foreach ( $res as $row ) {
				$title = Title::newFromRow( $row );
				if ( $row->cl_collation === '' ) {
					// Hack to make sure that while updating from 1.16 schema
					// and db is inconsistent, that the sky doesn't fall.
					// See r83544. Could perhaps be removed in a couple decades...
//					$humanSortkey = $row->cl_sortkey;
					$humanSortkey = $row->cl_first_letter;
				} else {
//					$humanSortkey = $title->getCategorySortkey( $row->cl_sortkey_prefix );
					$humanSortkey = $row->cl_first_letter;
				}

				if ( ++$count > $this->limit ) {
					# We've reached the one extra which shows that there
					# are additional pages to be had. Stop here...
					$this->nextPage[$type] = $humanSortkey;
					break;
				}
				if ( $count == $this->limit ) {
					$this->prevPage[$type] = $humanSortkey;
				}

				if ( $title->getNamespace() == NS_CATEGORY ) {
					$cat = Category::newFromRow( $row, $title );
					$this->addSubcategoryObject( $cat, $humanSortkey, $row->page_len );
				} elseif ( $title->getNamespace() == NS_FILE ) {
					$this->addImage( $title, $humanSortkey, $row->page_len, $row->page_is_redirect );
				} else {
					$this->addPage( $title, $humanSortkey, $row->page_len, $row->page_is_redirect );
				}
			}
		}
	}

	/**
	 * @return string
	 */
	function getCategoryTop() {
		$r = $this->getCategoryBottom();
		return $r === ''
			? $r
			: "<br style=\"clear:both;\"/>\n" . $r;
	}

	/**
	 * @return string
	 */
	function getSubcategorySection() {
		# Don't show subcategories section if there are none.
		$r = '';
		$rescnt = count( $this->children );
		$dbcnt = $this->cat->getSubcatCount();
		$countmsg = $this->getCountMessage( $rescnt, $dbcnt, 'subcat' );

		if ( $rescnt > 0 ) {
			# Showing subcategories
			$r .= "<div id=\"mw-subcategories\">\n";
			$r .= '<h2>' . $this->msg( 'subcategories' )->parse() . "</h2>\n";
			$r .= $countmsg;
			$r .= $this->getSectionPagingLinks( 'subcat' );
			$r .= $this->formatList( $this->children, $this->children_start_char );
			$r .= $this->getSectionPagingLinks( 'subcat' );
			$r .= "\n</div>";
		}
		return $r;
	}

	/**
	 * @return string
	 */
	function getPagesSection() {
		$ti = wfEscapeWikiText( $this->title->getText() );
		# Don't show articles section if there are none.
		$r = '';

		# @todo FIXME: Here and in the other two sections: we don't need to bother
		# with this rigmarole if the entire category contents fit on one page
		# and have already been retrieved.  We can just use $rescnt in that
		# case and save a query and some logic.
		$dbcnt = $this->cat->getPageCount() - $this->cat->getSubcatCount()
			- $this->cat->getFileCount();
		$rescnt = count( $this->articles );
		$countmsg = $this->getCountMessage( $rescnt, $dbcnt, 'article' );

		if ( $rescnt > 0 ) {
			$r = "<div id=\"mw-pages\">\n";
			$r .= '<h2>' . $this->msg( 'category_header', $ti )->parse() . "</h2>\n";
			$r .= $countmsg;
			$r .= $this->getSectionPagingLinks( 'page' );
			$r .= $this->formatList( $this->articles, $this->articles_start_char );
			$r .= $this->getSectionPagingLinks( 'page' );
			$r .= "\n</div>";
		}
		return $r;
	}

	/**
	 * @return string
	 */
	function getImageSection() {
		$r = '';
		$rescnt = $this->showGallery ? $this->gallery->count() : count( $this->imgsNoGallery );
		if ( $rescnt > 0 ) {
			$dbcnt = $this->cat->getFileCount();
			$countmsg = $this->getCountMessage( $rescnt, $dbcnt, 'file' );

			$r .= "<div id=\"mw-category-media\">\n";
			$r .= '<h2>' .
				$this->msg(
					'category-media-header',
					wfEscapeWikiText( $this->title->getText() )
				)->text() .
				"</h2>\n";
			$r .= $countmsg;
			$r .= $this->getSectionPagingLinks( 'file' );
			if ( $this->showGallery ) {
				$r .= $this->gallery->toHTML();
			} else {
				$r .= $this->formatList( $this->imgsNoGallery, $this->imgsNoGallery_start_char );
			}
			$r .= $this->getSectionPagingLinks( 'file' );
			$r .= "\n</div>";
		}
		return $r;
	}

	/**
	 * Get the paging links for a section (subcats/pages/files), to go at the top and bottom
	 * of the output.
	 *
	 * @param string $type 'page', 'subcat', or 'file'
	 * @return string HTML output, possibly empty if there are no other pages
	 */
	private function getSectionPagingLinks( $type ) {
		if ( isset( $this->until[$type] ) && $this->until[$type] !== null ) {
			// The new value for the until parameter should be pointing to the first
			// result displayed on the page which is the second last result retrieved
			// from the database.The next link should have a from parameter pointing
			// to the until parameter of the current page.
			if ( $this->nextPage[$type] !== null ) {
				return $this->pagingLinks( $this->prevPage[$type], $this->until[$type], $type );
			} else {
				// If the nextPage variable is null, it means that we have reached the first page
				// and therefore the previous link should be disabled.
				return $this->pagingLinks( null, $this->until[$type], $type );
			}
		} elseif ( $this->nextPage[$type] !== null
			|| ( isset( $this->from[$type] ) && $this->from[$type] !== null )
		) {
			return $this->pagingLinks( $this->from[$type], $this->nextPage[$type], $type );
		} else {
			return '';
		}
	}

	/**
	 * @return string
	 */
	function getCategoryBottom() {
		return '';
	}

	/**
	 * Format a list of articles chunked by letter, either as a
	 * bullet list or a columnar format, depending on the length.
	 *
	 * @param array $articles
	 * @param array $articles_start_char
	 * @param int $cutoff
	 * @return string
	 * @private
	 */
	function formatList( $articles, $articles_start_char, $cutoff = 6 ) {
		$list = '';
		if ( count( $articles ) > $cutoff ) {
			$list = self::columnList( $articles, $articles_start_char );
		} elseif ( count( $articles ) > 0 ) {
			// for short lists of articles in categories.
			$list = self::shortList( $articles, $articles_start_char );
		}

		$pageLang = $this->title->getPageLanguage();
		$attribs = array( 'lang' => $pageLang->getHtmlCode(), 'dir' => $pageLang->getDir(),
			'class' => 'mw-content-' . $pageLang->getDir() );
		$list = Html::rawElement( 'div', $attribs, $list );

		return $list;
	}

	/**
	 * Format a list of articles chunked by letter in a three-column
	 * list, ordered vertically.
	 *
	 * TODO: Take the headers into account when creating columns, so they're
	 * more visually equal.
	 *
	 * TODO: shortList and columnList are similar, need merging
	 *
	 * @param array $articles
	 * @param string[] $articles_start_char
	 * @return string
	 * @private
	 */
	static function columnList( $articles, $articles_start_char ) {
		$columns = array_combine( $articles, $articles_start_char );

		$ret = Html::openElement( 'div', array( 'class' => 'mw-category' ) );

		$colContents = array();

		# Kind of like array_flip() here, but we keep duplicates in an
		# array instead of dropping them.
		foreach ( $columns as $article => $char ) {
			if ( !isset( $colContents[$char] ) ) {
				$colContents[$char] = array();
			}
			$colContents[$char][] = $article;
		}

		foreach ( $colContents as $char => $articles ) {
			# Change space to non-breaking space to keep headers aligned
			$h3char = $char === ' ' ? '&#160;' : htmlspecialchars( $char );

			$ret .= '<div class="mw-category-group"><h3>' . $h3char;
			$ret .= "</h3>\n";

			$ret .= '<ul><li>';
			$ret .= implode( "</li>\n<li>", $articles );
			$ret .= '</li></ul></div>';

		}

		$ret .= Html::closeElement( 'div' );
		return $ret;
	}

	/**
	 * Format a list of articles chunked by letter in a bullet list.
	 * @param array $articles
	 * @param string[] $articles_start_char
	 * @return string
	 * @private
	 */
	static function shortList( $articles, $articles_start_char ) {
		$r = '<h3>' . htmlspecialchars( $articles_start_char[0] ) . "</h3>\n";
		$r .= '<ul><li>' . $articles[0] . '</li>';
		$articleCount = count( $articles );
		for ( $index = 1; $index < $articleCount; $index++ ) {
			if ( $articles_start_char[$index] != $articles_start_char[$index - 1] ) {
				$r .= "</ul><h3>" . htmlspecialchars( $articles_start_char[$index] ) . "</h3>\n<ul>";
			}

			$r .= "<li>{$articles[$index]}</li>";
		}
		$r .= '</ul>';
		return $r;
	}

	/**
	 * Create paging links, as a helper method to getSectionPagingLinks().
	 *
	 * @param string $first The 'until' parameter for the generated URL
	 * @param string $last The 'from' parameter for the generated URL
	 * @param string $type A prefix for parameters, 'page' or 'subcat' or
	 *     'file'
	 * @return string HTML
	 */
	private function pagingLinks( $first, $last, $type = '' ) {
		$prevLink = $this->msg( 'prev-page' )->text();

		if ( $first != '' ) {
			$prevQuery = $this->query;
			$prevQuery["{$type}until"] = $first;
			unset( $prevQuery["{$type}from"] );
			$prevLink = Linker::linkKnown(
				$this->addFragmentToTitle( $this->title, $type ),
				$prevLink,
				array(),
				$prevQuery
			);
		}

		$nextLink = $this->msg( 'next-page' )->text();

		if ( $last != '' ) {
			$lastQuery = $this->query;
			$lastQuery["{$type}from"] = $last;
			unset( $lastQuery["{$type}until"] );
			$nextLink = Linker::linkKnown(
				$this->addFragmentToTitle( $this->title, $type ),
				$nextLink,
				array(),
				$lastQuery
			);
		}

		return $this->msg( 'categoryviewer-pagedlinks' )->rawParams( $prevLink, $nextLink )->escaped();
	}

	/**
	 * Takes a title, and adds the fragment identifier that
	 * corresponds to the correct segment of the category.
	 *
	 * @param Title $title The title (usually $this->title)
	 * @param string $section Which section
	 * @throws MWException
	 * @return Title
	 */
	private function addFragmentToTitle( $title, $section ) {
		switch ( $section ) {
			case 'page':
				$fragment = 'mw-pages';
				break;
			case 'subcat':
				$fragment = 'mw-subcategories';
				break;
			case 'file':
				$fragment = 'mw-category-media';
				break;
			default:
				throw new MWException( __METHOD__ .
					" Invalid section $section." );
		}

		return Title::makeTitle( $title->getNamespace(),
			$title->getDBkey(), $fragment );
	}

	/**
	 * What to do if the category table conflicts with the number of results
	 * returned?  This function says what. Each type is considered independently
	 * of the other types.
	 *
	 * @param int $rescnt The number of items returned by our database query.
	 * @param int $dbcnt The number of items according to the category table.
	 * @param string $type 'subcat', 'article', or 'file'
	 * @return string A message giving the number of items, to output to HTML.
	 */
	private function getCountMessage( $rescnt, $dbcnt, $type ) {
		// There are three cases:
		//   1) The category table figure seems sane.  It might be wrong, but
		//      we can't do anything about it if we don't recalculate it on ev-
		//      ery category view.
		//   2) The category table figure isn't sane, like it's smaller than the
		//      number of actual results, *but* the number of results is less
		//      than $this->limit and there's no offset.  In this case we still
		//      know the right figure.
		//   3) We have no idea.

		// Check if there's a "from" or "until" for anything

		// This is a little ugly, but we seem to use different names
		// for the paging types then for the messages.
		if ( $type === 'article' ) {
			$pagingType = 'page';
		} else {
			$pagingType = $type;
		}

		$fromOrUntil = false;
		if ( ( isset( $this->from[$pagingType] ) && $this->from[$pagingType] !== null ) ||
			( isset( $this->until[$pagingType] ) && $this->until[$pagingType] !== null )
		) {
			$fromOrUntil = true;
		}

		if ( $dbcnt == $rescnt ||
			( ( $rescnt == $this->limit || $fromOrUntil ) && $dbcnt > $rescnt )
		) {
			// Case 1: seems sane.
			$totalcnt = $dbcnt;
		} elseif ( $rescnt < $this->limit && !$fromOrUntil ) {
			// Case 2: not sane, but salvageable.  Use the number of results.
			// Since there are fewer than 200, we can also take this opportunity
			// to refresh the incorrect category table entry -- which should be
			// quick due to the small number of entries.
			$totalcnt = $rescnt;
			$category = $this->cat;
			wfGetDB( DB_MASTER )->onTransactionIdle( function () use ( $category ) {
				$category->refreshCounts();
			} );
		} else {
			// Case 3: hopeless.  Don't give a total count at all.
			// Messages: category-subcat-count-limited, category-article-count-limited,
			// category-file-count-limited
			return $this->msg( "category-$type-count-limited" )->numParams( $rescnt )->parseAsBlock();
		}
		// Messages: category-subcat-count, category-article-count, category-file-count
		return $this->msg( "category-$type-count" )->numParams( $rescnt, $totalcnt )->parseAsBlock();
	}
}