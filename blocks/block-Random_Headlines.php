<?php
/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2002 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/
/*         Additional security & Abstraction layer conversion           */
/*                           2003 chatserv                              */
/*      http://www.nukefixes.com -- http://www.nukeresources.com        */
/************************************************************************/
/************************************************************************/
/* Additional code clean-up, performance enhancements, and W3C and      */
/* XHTML compliance fixes by Raven and Montego.                         */
/************************************************************************/
if (!defined('BLOCK_FILE')) {
	Header('Location: ../index.php');
	die();
}
global $prefix, $multilingual, $currentlang, $db, $tipath, $cookie;
if ($multilingual == 1) {
	$querylang = 'AND (alanguage=\'' . $currentlang . '\' OR alanguage=\'\')'; // The OR is needed to display stories who are posted to ALL languages
} else {
	$querylang = '';
}
$sql = 'SELECT topicid FROM ' . $prefix . '_topics';
$query = $db->sql_query($sql);
$numrows = $db->sql_numrows($query);
$topic_array = ''; // Fix notice issue - montego
if ($numrows > 1) {
	while (list($topicid) = $db->sql_fetchrow($query)) {
		$topicid = intval($topicid);
		$topic_array .= $topicid . '-';
	}
	$r_topic = explode('-', $topic_array);
	mt_srand((double)microtime() *1000000);
	$numrows = $numrows-1;
	$topic = mt_rand(0, $numrows);
	$topic = $r_topic[$topic];
} else {
	$topic = 1;
}
$sql2 = 'SELECT topicimage, topictext FROM ' . $prefix . '_topics WHERE topicid=\'' . $topic . '\'';
$query2 = $db->sql_query($sql2);
list($topicimage, $topictext) = $db->sql_fetchrow($query2);
$content = '<br /><center><a href="modules.php?name=News&amp;new_topic=' . $topic . '"><img src="' . $tipath . $topicimage . '" border="0" alt="' . $topictext . '" title="' . $topictext . '" /></a><br />[ <a href="modules.php?name=Search&amp;topic=' . $topic . '">' . $topictext . '</a> ]</center><br />';
$content .= '<table border="0" width="100%"><tr><td valign="top">';
$sql3 = 'SELECT sid, title FROM ' . $prefix . '_stories WHERE topic=\'' . $topic . '\' ' . $querylang . ' ORDER BY sid DESC LIMIT 0,9';
$result3 = $db->sql_query($sql3);
while (list($sid, $title) = $db->sql_fetchrow($result3)) {
	$content .= '<strong><big>&middot;</big></strong>&nbsp;<a href="modules.php?name=News&amp;file=article&amp;sid=' . $sid . '">' . $title . '</a><br />';
}
$content .= '</td></tr></table>';
?>