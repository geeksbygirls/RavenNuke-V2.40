<?php

/********************************************************/
/* NukeSentinel(tm)                                     */
/* By: NukeScripts(tm) (http://www.nukescripts.net)     */
/* Copyright � 2000-2008 by NukeScripts(tm)             */
/* See CREDITS.txt for ALL contributors                 */
/********************************************************/

if(!defined('NUKE_FILE') && !defined('BLOCK_FILE')) { header("Location: ../index.php"); }
global $prefix, $db, $user, $admin, $ab_config, $nsnst_const;
$content = '';
$content .= '<script type="text/javascript" src="includes/nukesentinel4.js"></script>'."\n";
$content .= '<center>'._AB_LISTBANNEDIPS.'</center><hr />'."\n";
$content .= '<center><div id="marqueecontainer" style="position:relative; height:150px; overflow:hidden;" onmouseover="copyspeed=pausespeed" onmouseout="copyspeed=marqueespeed">';
$content .= '<div id="vmarquee" style="position: absolute; width: 98%;">'."\n";
$result = $db->sql_query('SELECT `ip_addr`, `reason` FROM `'.$prefix.'_nsnst_blocked_ips` ORDER BY `date` DESC LIMIT 0,20');
while (list($ip_addr, $ip_reason) = $db->sql_fetchrow($result)) {
  if((is_admin($admin) AND $ab_config['display_link']==1) OR ((is_user($user) OR is_admin($admin)) AND $ab_config['display_link']==2) OR $ab_config['display_link']==3) {
    $lookupip = str_replace('*', '0', $ip_addr);
    $content .= '<strong><big>&middot;</big></strong>&nbsp;<a href="'.$ab_config['lookup_link'].$lookupip.'" target="_blank">'.$ip_addr.'</a>'."\n";
  } else {
    $content .= '<strong><big>&middot;</big></strong>&nbsp;'.$ip_addr."\n";
  }
  if((is_admin($admin) AND $ab_config['display_reason']==1) OR ((is_user($user) OR is_admin($admin)) AND $ab_config['display_reason']==2) OR $ab_config['display_reason']==3) {
    $result2 = $db->sql_query('SELECT `reason` FROM `'.$prefix.'_nsnst_blockers` WHERE `blocker`=\''.$ip_reason.'\' LIMIT 0,1');
    list($reason) = $db->sql_fetchrow($result2);
    $reason = str_replace('Abuse-','',$reason);
    $content .= '&nbsp;-&nbsp;'.$reason."\n";
  }
  $content .= '<br />'."\n";
}
$content .= '</div></div></center>'."\n";
$content .= '<hr /><center><a href="http://www.nukescripts.net" title="'._AB_AVAILABLEAT.'" target="_blank">'._AB_NUKESENTINEL.'</a></center>'."\n";

?>