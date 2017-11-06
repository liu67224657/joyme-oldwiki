<?php
if ( !defined( 'MEDIAWIKI' ) ) die();

$wgExtensionCredits['other'][] = array(
		'path'           => __FILE__,
		'name'           => 'ImgViwer',
		'author'         => 'peng zhang',
		'url'            => 'null',
		'descriptionmsg' => 'imagemap_desc',
);

$wgAutoloadClasses['ImgViwerHooks'] = __DIR__ . '/ImgViwerHooks.php';
$wgHooks['SkinAfterContent'][] = 'ImgViwerHooks::onSkinAfterContent';

?>