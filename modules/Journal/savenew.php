<?php
/************************************************************************/
/* Journal &#167 ZX                                                     */
/* ================                                                     */
/*                                                                      */
/* Original work done by Joseph Howard known as Member's Journal, which */
/* was based on Trevor Scott's vision of Atomic Journal.                */
/*                                                                      */
/* Modified on 25 May 2002 by Paul Laudanski (paul@computercops.biz)    */
/* Copyright (c) 2002 Modifications by Computer Cops.                   */
/* http://computercops.biz                                              */
/*                                                                      */
/* Required: PHPNuke 5.5 ( http://www.phpnuke.org/ ) and phpbb2         */
/* ( http://bbtonuke.sourceforge.net/ ) forums port.                    */
/*                                                                      */
/* Member's Journal did not work on a PHPNuke 5.5 portal which had      */
/* phpbb2 port integrated.  Thus was Journal &#167 ZX created with the  */
/* Member's Journal author's blessings.                                 */
/*                                                                      */
/* To install, backup everything first and then FTP the Journal package */
/* files into your site's module directory.  Also run the tables.sql    */
/* script so the proper tables and fields can be created and used.  The */
/* default table prefix is "nuke" which is hard-coded throughout the    */
/* entire system as a left-over from Member's Journal.  If a demand     */
/* exists, that can be changed for a future release.                    */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/
/* Journal 2.0 Enhanced and Debugged 2004                               */
/* by sixonetonoffun -- http://www.netflake.com --                      */
/* Images Created by GanjaUK -- http://www.GanjaUK.com                  */
/************************************************************************/
/************************************************************************/
/* Additional code clean-up, performance enhancements, bug fixes, and   */
/* W3C XHTML compliance fixes by Montego - http://montegoscripts.com.   */
/************************************************************************/
if (!defined('MODULE_FILE')) {
	die('You can\'t access this file directly...');
}

csrf_check();

$module_name = basename(dirname(__FILE__));
get_lang($module_name);
$pagetitle = '- ' . _USERSJOURNAL;
include_once('header.php');
include_once('modules/' . $module_name . '/functions.php');
startjournal();
echo '<br />';
OpenTable();

if (empty($title) OR empty($jbodytext) OR empty($status)) {
	echo '<center><b>' . _YOUMUSTFILLFIELDS . '</b><br /><br />' . _GOBACK . '</center>';
	CloseTable();
	echo '<br />';
	journalfoot();
	die();
} elseif (is_user($user)) {
	getusrinfo($user);
	$username = $userinfo['username'];
} else {
	$username = '';
}

if (!is_user($user)) {
	echo '<center><b>' . _YOUMUSTBEMEMBER . '</b></center>';
} else {
	$htime = date('h');
	$mtime = date('i');
	$ntime = date('a');
	$mtime = $htime . ':' . $mtime . ' ' . $ntime;
	$mdate = date('m');
	$ddate = date('d');
	$ydate = date('Y');
	$ndate = $mdate . '-' . $ddate . '-' . $ydate;
	$pdate = $ndate;
	$ptime = $mtime;
	echo '<div align="center" class="title">' . _ENTRYADDED . '</div><br /><br />';
	echo '<div align="center"> [ <a href="modules.php?name=' . $module_name . '&amp;file=edit">' . _RETURNJOURNAL . '</a> ]</div>';
	$title = addslashes(check_html($title, 'nohtml'));
	$jbodytext = addslashes(check_html($jbodytext, ''));
	if (isset($mood)) {
		$mood = addslashes(check_html($mood, 'nohtml'));
	} else {
		$mood = '';
	}
	if (isset($status) && $status == 'no') {
	} else {
		$status = 'yes';
	}
	$sql = 'INSERT INTO ' . $prefix . '_journal (jid,aid,title,bodytext,mood,pdate,ptime,status,mtime,mdate) VALUES (NULL,\'' . $username . '\',\'' . $title . '\',\'' . $jbodytext . '\',\'' . $mood . '\',\'' . $pdate . '\',\'' . $ptime . '\',\'' . $status . '\',\'' . $mtime . '\',\'' . $ndate . '\')';
	$db->sql_query($sql);
	update_points(1);
	$sql = 'SELECT * FROM ' . $prefix . '_journal_stats WHERE joid = \'' . $username . '\'';
	$result = $db->sql_query($sql);
	$row_count = $db->sql_numrows($result);
	if ($row_count == 0) {
		$query = 'INSERT INTO ' . $prefix . '_journal_stats (id,joid,nop,ldp,ltp,micro) VALUES (NULL,\'' . $username . '\',\'1\',now(),\'' . $mtime . '\',now())';
		$db->sql_query($query);
	} else {
		$row = $db->sql_fetchrow($result);
		$nnop = $row['nop'];
		$nnnop = $nnop + 1;
		$micro = date('U');
		$nnnop = check_html($nnnop, 'nohtml');
		$ndate = check_html($ndate, 'nohtml');
		$mtime = check_html($mtime, 'nohtml');
		$micro = check_html($micro, 'nohtml');
		$query = 'UPDATE ' . $prefix . '_journal_stats SET nop=\'' . $nnnop . '\', ldp=\'' . $ndate . '\', ltp=\'' . $mtime . '\', micro=\'' . $micro . '\' WHERE joid=\'' . $username . '\'';
		$db->sql_query($query);
	}
}

CloseTable();
echo '<br />';
journalfoot();

?>