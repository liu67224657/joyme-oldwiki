<?php
/**
 * This is the main web entry point for MediaWiki.
 *
 * If you are reading this in your web browser, your server is probably
 * not configured correctly to run PHP applications!
 *
 * See the README, INSTALL, and UPGRADE files for basic setup instructions
 * and pointers to the online documentation.
 *
 * https://www.mediawiki.org/
 *
 * ----------
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

// Bail on old versions of PHP, or if composer has not been run yet to install
// dependencies. Using dirname( __FILE__ ) here because __DIR__ is PHP5.3+.
require_once dirname( __FILE__ ) . '/includes/PHPVersionCheck.php';
wfEntryPointCheck( 'index.php' );

require __DIR__ . '/includes/WebStart.php';

$mediaWiki = new MediaWiki();
##帖子页跳转
$title = empty($_GET['title'])?'':$_GET['title'];
$namespace = strpos($title, 'THREAD') !== false ? 1000 : 0;
if(strpos($title, 'THREAD') !== false && str_replace('THREAD:', '', $title) && count($_GET) == 1){
    $title = str_replace('THREAD:', '', $title);
    header('Location: '.$wgServer.'/?title=特殊:Wiki讨论区&details='.$title.'&namespace='.$namespace);exit;
}
$mediaWiki->run();


