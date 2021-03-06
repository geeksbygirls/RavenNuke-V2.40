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

/* Block to fit perfectly in the center of the site, remember that not all
   blocks looks good on Center, just try and see yourself what fits your needs */

if ( !defined('BLOCK_FILE') ) {
    Header('Location: ../index.php');
    die();
}

global $prefix, $multilingual, $currentlang, $db;

if ($multilingual == 1) {
    $querylang = 'WHERE (alanguage=\''.$currentlang.'\' OR alanguage=\'\')';
} else {
    $querylang = '';
}

$content = '';
$sql = 'SELECT sid, title, comments, counter FROM '.$prefix.'_stories '.$querylang.' ORDER BY sid DESC LIMIT 0,5';
$result = $db->sql_query($sql);
if ($db->sql_numrows($result)) {
    $content .= '<table width="100%" border="0">';
    while (list($sid, $title, $comments, $counter) = $db->sql_fetchrow($result)) {
        $title = stripslashes($title);
        $sid = intval($sid);
        $comtotal = intval($comments);  //RN0000547
        $counter = intval($counter);
        $content .= '<tr><td align="left">';
        $content .= '<strong><big>&middot;</big></strong>';
        $content .= ' <a href="modules.php?name=News&amp;file=article&amp;sid='.$sid.'"><strong>'.$title.'</strong></a>';
        $content .= '</td></tr><tr><td align="left">';
        $content .= '[ '.$comtotal.' '._COMMENTS.' - '.$counter.' '._READS.' ]';
        $content .= '</td></tr>';
    }
    $content .= '</table>';
}
$content .= '<br /><center>[ <a href="modules.php?name=News">'._MORENEWS.'</a> ]</center>';
?>