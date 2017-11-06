<?php
/**
 * AJAX functions used by Vote extension.
 */

$wgAjaxExportList[] = 'wfVoteStars';
function wfVoteStars( $voteValue, $pageId ) {
	global $wgUser;

	if ( !$wgUser->isAllowed( 'voteny' ) ) {
		return '';
	}

	$vote = new VoteStars( $pageId );
	if ( $vote->UserAlreadyVoted() ) {
		$vote->delete();
	}
	$vote->insert( $voteValue );

	return $vote->display();
}

$wgAjaxExportList[] = 'wfVoteStarsDelete';
function wfVoteStarsDelete( $pageId ) {
	global $wgUser;

	if ( !$wgUser->isAllowed( 'voteny' ) ) {
		return '';
	}

	$vote = new VoteStars( $pageId );
	$vote->delete();

	return $vote->display();
}
