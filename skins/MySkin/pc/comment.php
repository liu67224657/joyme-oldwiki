<?php
global $wgComment,$wgWikiStatic;

if(!strstr($_SERVER['REQUEST_URI'], '%E9%A6%96%E9%A1%B5') && !strstr($_SERVER['REQUEST_URI'], ':') && !strstr($_SERVER['REQUEST_URI'], 'action') && $wgComment){
	echo '<div class="wiki_comment_box"><div class="blog_comment" id="post_reply">
		<div style="padding:10px 6px 4px" class="clearfix">
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
	<div id="comment_list_area"> </div></div>
	<!-- pc-评论js-START -->
<script src="'.$wgWikiStatic.'/extensions/jsscripts/commonfn.js"></script>
<script src="'.$wgWikiStatic.'/extensions/jsscripts/comment.js"></script>
<!-- pc-评论js-END -->';
}
?>

