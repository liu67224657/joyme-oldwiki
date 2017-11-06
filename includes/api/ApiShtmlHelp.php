<?php
/**
 *
 *
 */

class ApiShtmlHelp extends ApiBase {
	
	public $request = '';

	public function execute() {
		$this->request = $this->getRequest();
		$op = $this->request->getVal('op');
		if($op == 'pagecounter'){
			$this->getResult()->addValue( null, $this->getModuleName(), $this->pagecounter() );
		}else if($op == 'getnavhtml'){
			$this->getResult()->addValue( null, $this->getModuleName(), array('nav'=>$this->getNavHtml()) );
		}else{
			die('操作为空');
		}
	}
	
	public function getNavHtml(){
		$title = $this->request->getVal('title');
		if($title){
			$SkinApi = new SkinApi();
			$nav = $SkinApi->getNavArray($title);
			return $nav;
		}else{
			return '';
		}
	}
        
	//增加文章查看量
	public function pagecounter(){
		$id = $this->request->getVal('id');
		if(intval($id)>0){
			$dbw = wfGetDB( DB_MASTER );
			$counter = $dbw->selectField( 'page', 'page_counter', array('page_id'=>$id));
			$res = $dbw ->update('page', array('page_counter'=>++$counter), array('page_id'=>$id), __METHOD__);
			$dbw->commit(__METHOD__);
			return array('counter'=>$counter);
		}else{
			return array('counter'=>0);
		}
	}
        
        // Description
	public function getDescription() {
		return 'Get both nonverbal and verbal responses to your input.';
	}

	// Face parameter.
	public function getAllowedParams() {
		return array_merge( parent::getAllowedParams(), array(
			'op' => array (
				ApiBase::PARAM_TYPE => 'string',
				ApiBase::PARAM_REQUIRED => true
			),
            'id' => array (
				ApiBase::PARAM_TYPE => 'integer',
				ApiBase::PARAM_REQUIRED => false
			),
			'title' => array (
				ApiBase::PARAM_TYPE => 'string',
				ApiBase::PARAM_REQUIRED => false
			),
			'_' => array (
				ApiBase::PARAM_TYPE => 'string',
				ApiBase::PARAM_REQUIRED => false
			),
		) );
	}

	// Describe the parameter
	public function getParamDescription() {
		return array_merge( parent::getParamDescription(), array(
			'face' => 'The face you want to make to the API (e.g. o_O)'
		) );
	}

	// Get examples
	public function getExamplesMessages() {
		return array(
            // apisampleoutput-face-1 is the key to an i18n message explaining the example
			'api.php?action=apisampleoutput&face=O_o&format=xml'
			=> 'apisampleoutput-face-1'
		);
	}
}

class SkinApi extends SkinTemplate {
	
	public $title = '';
    
    public function __construct(){}
    
    public function getNavArray($title){
		global $wgUser;
		$this->title = $title;
		if($wgUser->isLoggedIn()){
			$this->loggedin = true;
		}else{
			$this->loggedin = false;
		}
		
        $navarr = $this->buildContentNavigationUrls2();
		$tmparr = array_merge($navarr['views'], $navarr['actions']);
		if($this->loggedin){
			$edithref = $tmparr['edit']['href'];
		}else{
			$edithref = $tmparr['viewsource']['href'];
		}
		
		$listActionsHTML = '<span class=""><a id="head-tips" tabindex="-1" href="'.$edithref.'">编辑源代码<i></i></a></span><div class="head-menu" style="display: none;"><ul>';
		foreach($tmparr as $key=>$val){
			$listActionsHTML .= '<li id="'.$val['id'].'"><a accesskey="d" title="'.$val['text'].'" href="'.$val['href'].'">'.$val['text'].'</a></li>';
		}
		$listActionsHTML .= '</ul></div>';
		return $listActionsHTML;
    }
    
    protected function buildContentNavigationUrls2() {
		global $wgDisableLangConversion;
		$title = Title::newFromURL( $this->title );
		$onPage = $title->equals( $this->getTitle() );

		$out = $this->getOutput();
		$request = $this->getRequest();
		$user = $this->getUser();

		$content_navigation = array(
			'namespaces' => array(),
			'views' => array(),
			'actions' => array(),
			'variants' => array()
		);

		// parameters
		$action = $request->getVal( 'action', 'view' );

		$userCanRead = $title->quickUserCan( 'read', $user );

		$preventActiveTabs = false;
		Hooks::run( 'SkinTemplatePreventOtherActiveTabs', array( &$this, &$preventActiveTabs ) );

		// Checks if page is some kind of content
		if ( $title->canExist() ) {
			// Gets page objects for the related namespaces
			$subjectPage = $title->getSubjectPage();
			$talkPage = $title->getTalkPage();

			// Determines if this is a talk page
			$isTalk = $title->isTalkPage();

			// Generates XML IDs from namespace names
			$subjectId = $title->getNamespaceKey( '' );

			if ( $subjectId == 'main' ) {
				$talkId = 'talk';
			} else {
				$talkId = "{$subjectId}_talk";
			}

			$skname = $this->skinname;

			// Adds namespace links
			$subjectMsg = array( "nstab-$subjectId" );
			if ( $subjectPage->isMainPage() ) {
				array_unshift( $subjectMsg, 'mainpage-nstab' );
			}
			$content_navigation['namespaces'][$subjectId] = $this->tabAction(
				$subjectPage, $subjectMsg, !$isTalk && !$preventActiveTabs, '', $userCanRead
			);
			$content_navigation['namespaces'][$subjectId]['context'] = 'subject';
			$content_navigation['namespaces'][$talkId] = $this->tabAction(
				$talkPage, array( "nstab-$talkId", 'talk' ), $isTalk && !$preventActiveTabs, '', $userCanRead
			);
			$content_navigation['namespaces'][$talkId]['context'] = 'talk';

			if ( $userCanRead ) {
				$isForeignFile = $title->inNamespace( NS_FILE ) && $this->canUseWikiPage() &&
					$this->getWikiPage() instanceof WikiFilePage && !$this->getWikiPage()->isLocal();

				// Adds view view link
				if ( $title->exists() || $isForeignFile ) {
					$content_navigation['views']['view'] = $this->tabAction(
						$isTalk ? $talkPage : $subjectPage,
						array( "$skname-view-view", 'view' ),
						( $onPage && ( $action == 'view' || $action == 'purge' ) ), '', true
					);
                    $content_navigation['views']['view']['href'] = $this->getViewUrl($content_navigation['views']['view']['href']);
                    // signal to hide this from simple content_actions
					$content_navigation['views']['view']['redundant'] = true;
				}

				// If it is a non-local file, show a link to the file in its own repository
				if ( $isForeignFile ) {
					$file = $this->getWikiPage()->getFile();
					$content_navigation['views']['view-foreign'] = array(
						'class' => '',
						'text' => wfMessageFallback( "$skname-view-foreign", 'view-foreign' )->
							setContext( $this->getContext() )->
							params( $file->getRepo()->getDisplayName() )->text(),
						'href' => $file->getDescriptionUrl(),
						'primary' => false,
					);
				}

				// Checks if user can edit the current page if it exists or create it otherwise
				if ( $title->quickUserCan( 'edit', $user )
					&& ( $title->exists() || $title->quickUserCan( 'create', $user ) )
				) {
					// Builds CSS class for talk page links
					$isTalkClass = $isTalk ? ' istalk' : '';
					// Whether the user is editing the page
					$isEditing = $onPage && ( $action == 'edit' || $action == 'submit' );
					// Whether to show the "Add a new section" tab
					// Checks if this is a current rev of talk page and is not forced to be hidden
					$showNewSection = !$out->forceHideNewSectionLink()
						&& ( ( $isTalk && $this->isRevisionCurrent() ) || $out->showNewSectionLink() );
					$section = $request->getVal( 'section' );

					if ( $title->exists()
						|| ( $title->getNamespace() == NS_MEDIAWIKI
							&& $title->getDefaultMessageText() !== false
						)
					) {
						$msgKey = $isForeignFile ? 'edit-local' : 'edit';
					} else {
						$msgKey = $isForeignFile ? 'create-local' : 'create';
					}
					$content_navigation['views']['edit'] = array(
						'class' => ( $isEditing && ( $section !== 'new' || !$showNewSection )
							? 'selected'
							: ''
						) . $isTalkClass,
						'text' => wfMessageFallback( "$skname-view-$msgKey", $msgKey )
							->setContext( $this->getContext() )->text(),
						'href' => $this->getPhpUrl($title->getLocalURL( $this->editUrlOptions() )),
						'primary' => !$isForeignFile, // don't collapse this in vector
					);

					// section link
					if ( $showNewSection ) {
						// Adds new section link
						//$content_navigation['actions']['addsection']
						$content_navigation['views']['addsection'] = array(
							'class' => ( $isEditing && $section == 'new' ) ? 'selected' : false,
							'text' => wfMessageFallback( "$skname-action-addsection", 'addsection' )
								->setContext( $this->getContext() )->text(),
							'href' => $this->getPhpUrl($title->getLocalURL( 'action=edit&section=new' ))
						);
					}
				// Checks if the page has some kind of viewable content
				} elseif ( $title->hasSourceText() ) {
					// Adds view source view link
					$content_navigation['views']['viewsource'] = array(
						'class' => ( $onPage && $action == 'edit' ) ? 'selected' : false,
						'text' => wfMessageFallback( "$skname-action-viewsource", 'viewsource' )
							->setContext( $this->getContext() )->text(),
						'href' => $this->getPhpUrl($title->getLocalURL( $this->editUrlOptions() )),
						'primary' => true, // don't collapse this in vector
					);
				}

				// Checks if the page exists
				if ( $title->exists() ) {
					// Adds history view link
					$content_navigation['views']['history'] = array(
						'class' => ( $onPage && $action == 'history' ) ? 'selected' : false,
						'text' => wfMessageFallback( "$skname-view-history", 'history_short' )
							->setContext( $this->getContext() )->text(),
						'href' => $this->getPhpUrl($title->getLocalURL( 'action=history' )),
					);

					if ( $title->quickUserCan( 'delete', $user ) ) {
						$content_navigation['actions']['delete'] = array(
							'class' => ( $onPage && $action == 'delete' ) ? 'selected' : false,
							'text' => wfMessageFallback( "$skname-action-delete", 'delete' )
								->setContext( $this->getContext() )->text(),
							'href' => $this->getPhpUrl($title->getLocalURL( 'action=delete' ))
						);
					}

					if ( $title->quickUserCan( 'move', $user ) ) {
						$moveTitle = SpecialPage::getTitleFor( 'Movepage', $title->getPrefixedDBkey() );
						$content_navigation['actions']['move'] = array(
							'class' => $this->getTitle()->isSpecial( 'Movepage' ) ? 'selected' : false,
							'text' => wfMessageFallback( "$skname-action-move", 'move' )
								->setContext( $this->getContext() )->text(),
							'href' => $this->getPhpUrl($moveTitle->getLocalURL())
						);
					}
				} else {
					// article doesn't exist or is deleted
					if ( $user->isAllowed( 'deletedhistory' ) ) {
						$n = $title->isDeleted();
						if ( $n ) {
							$undelTitle = SpecialPage::getTitleFor( 'Undelete', $title->getPrefixedDBkey() );
							// If the user can't undelete but can view deleted
							// history show them a "View .. deleted" tab instead.
							$msgKey = $user->isAllowed( 'undelete' ) ? 'undelete' : 'viewdeleted';
							$content_navigation['actions']['undelete'] = array(
								'class' => $this->getTitle()->isSpecial( 'Undelete' ) ? 'selected' : false,
								'text' => wfMessageFallback( "$skname-action-$msgKey", "{$msgKey}_short" )
									->setContext( $this->getContext() )->numParams( $n )->text(),
								'href' => $this->getPhpUrl($undelTitle->getLocalURL())
							);
						}
					}
				}

				if ( $title->quickUserCan( 'protect', $user ) && $title->getRestrictionTypes() &&
					MWNamespace::getRestrictionLevels( $title->getNamespace(), $user ) !== array( '' )
				) {
					$mode = $title->isProtected() ? 'unprotect' : 'protect';
					$content_navigation['actions'][$mode] = array(
						'class' => ( $onPage && $action == $mode ) ? 'selected' : false,
						'text' => wfMessageFallback( "$skname-action-$mode", $mode )
							->setContext( $this->getContext() )->text(),
						'href' => $this->getPhpUrl($title->getLocalURL( "action=$mode" ))
					);
				}

				// Checks if the user is logged in
				if ( $this->loggedin && $user->isAllowedAll( 'viewmywatchlist', 'editmywatchlist' ) ) {
					/**
					 * The following actions use messages which, if made particular to
					 * the any specific skins, would break the Ajax code which makes this
					 * action happen entirely inline. OutputPage::getJSVars
					 * defines a set of messages in a javascript object - and these
					 * messages are assumed to be global for all skins. Without making
					 * a change to that procedure these messages will have to remain as
					 * the global versions.
					 */
					$mode = $user->isWatched( $title ) ? 'unwatch' : 'watch';
					$token = WatchAction::getWatchToken( $title, $user, $mode );
					$content_navigation['actions'][$mode] = array(
						'class' => $onPage && ( $action == 'watch' || $action == 'unwatch' ) ? 'selected' : false,
						// uses 'watch' or 'unwatch' message
						'text' => $this->msg( $mode )->text(),
						'href' => $this->getPhpUrl($title->getLocalURL( array( 'action' => $mode, 'token' => $token ) ))
					);
				}
			}

			Hooks::run( 'SkinTemplateNavigation', array( &$this, &$content_navigation ) );

			if ( $userCanRead && !$wgDisableLangConversion ) {
				$pageLang = $title->getPageLanguage();
				// Gets list of language variants
				$variants = $pageLang->getVariants();
				// Checks that language conversion is enabled and variants exist
				// And if it is not in the special namespace
				if ( count( $variants ) > 1 ) {
					// Gets preferred variant (note that user preference is
					// only possible for wiki content language variant)
					$preferred = $pageLang->getPreferredVariant();
					if ( Action::getActionName( $this ) === 'view' ) {
						$params = $request->getQueryValues();
						unset( $params['title'] );
					} else {
						$params = array();
					}
					// Loops over each variant
					foreach ( $variants as $code ) {
						// Gets variant name from language code
						$varname = $pageLang->getVariantname( $code );
						// Appends variant link
						$content_navigation['variants'][] = array(
							'class' => ( $code == $preferred ) ? 'selected' : false,
							'text' => $varname,
							'href' => $title->getLocalURL( array( 'variant' => $code ) + $params ),
							'lang' => wfBCP47( $code ),
							'hreflang' => wfBCP47( $code ),
						);
					}
				}
			}
		} else {
			// If it's not content, it's got to be a special page
			$content_navigation['namespaces']['special'] = array(
				'class' => 'selected',
				'text' => $this->msg( 'nstab-special' )->text(),
				'href' => $request->getRequestURL(), // @see: bug 2457, bug 2510
				'context' => 'subject'
			);

			Hooks::run( 'SkinTemplateNavigation::SpecialPage',
				array( &$this, &$content_navigation ) );
		}

		// Equiv to SkinTemplateContentActions
		Hooks::run( 'SkinTemplateNavigation::Universal', array( &$this, &$content_navigation ) );

		// Setup xml ids and tooltip info
		foreach ( $content_navigation as $section => &$links ) {
			foreach ( $links as $key => &$link ) {
				$xmlID = $key;
				if ( isset( $link['context'] ) && $link['context'] == 'subject' ) {
					$xmlID = 'ca-nstab-' . $xmlID;
				} elseif ( isset( $link['context'] ) && $link['context'] == 'talk' ) {
					$xmlID = 'ca-talk';
				} elseif ( $section == 'variants' ) {
					$xmlID = 'ca-varlang-' . $xmlID;
				} else {
					$xmlID = 'ca-' . $xmlID;
				}
				$link['id'] = $xmlID;
			}
		}

		# We don't want to give the watch tab an accesskey if the
		# page is being edited, because that conflicts with the
		# accesskey on the watch checkbox.  We also don't want to
		# give the edit tab an accesskey, because that's fairly
		# superfluous and conflicts with an accesskey (Ctrl-E) often
		# used for editing in Safari.
		if ( in_array( $action, array( 'edit', 'submit' ) ) ) {
			if ( isset( $content_navigation['views']['edit'] ) ) {
				$content_navigation['views']['edit']['tooltiponly'] = true;
			}
			if ( isset( $content_navigation['actions']['watch'] ) ) {
				$content_navigation['actions']['watch']['tooltiponly'] = true;
			}
			if ( isset( $content_navigation['actions']['unwatch'] ) ) {
				$content_navigation['actions']['unwatch']['tooltiponly'] = true;
			}
		}

		return $content_navigation;
	}
}